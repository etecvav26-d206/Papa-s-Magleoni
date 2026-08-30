<?php
    require_once __DIR__ . '/includes/auth.php';
    require_admin();
    require_once __DIR__ . '/config/conexao.php';

    // Somente nomes desta lista entram no SQL; dados do usuário usam placeholders.
    $entities = [
        'pizzas' => [
            'title' => 'Pizzas',
            'singular' => 'pizza',
            'new' => 'Nova pizza',
            'fields' => [
                'categoria_id' => 'Categoria',
                'nome' => 'Nome',
                'descricao' => 'Descrição',
                'preco' => 'Preço',
                'badge' => 'Selo',
                'imagem' => 'Imagem',
            ],
        ],
        'categorias' => [
            'title' => 'Categorias',
            'singular' => 'categoria',
            'new' => 'Nova categoria',
            'fields' => [
                'nome' => 'Nome',
                'descricao' => 'Descrição',
            ],
        ],
        'depoimentos' => [
            'title' => 'Depoimentos',
            'singular' => 'depoimento',
            'new' => 'Novo depoimento',
            'fields' => [
                'nome' => 'Cliente',
                'texto' => 'Depoimento',
                'nota' => 'Nota (1 a 5)',
            ],
        ],
    ];
    $entity = $entity ?? ($_GET['entity'] ?? 'pizzas');
    $action = $_GET['action'] ?? 'list';
    if (!is_string($entity) || !isset($entities[$entity]) || !is_string($action)
    || !in_array($action, ['list', 'create', 'edit', 'delete'], true)) {
        http_response_code(404);
        exit('Cadastro ou ação não encontrado.');
    }

    $method = $_SERVER['REQUEST_METHOD'];
    if (
    !in_array($method, ['GET', 'POST'], true)
    || ($method === 'POST' && $action === 'list')
    ) {
        header('Allow: GET, POST');
        http_response_code(405);
        exit('Método não permitido.');
    }

    if ($method === 'POST') {
        verify_csrf();
    }

    $meta = $entities[$entity];
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    $categories = $pdo
    ->query('SELECT id, nome FROM categorias ORDER BY nome')
    ->fetchAll();
    $images = pizza_images();
    $item = [];
    $error = '';
    $limits = [
        'nome' => $entity === 'categorias' ? 80 : 100,
        'badge' => 50,
        'descricao' => $entity === 'categorias' ? 255 : 5000,
        'texto' => 5000,
    ];

    function url(string $entity, string $action = 'list', ?int $id = null): string
    {
        $pages = [
            'pizzas' => 'gerenciar.php',
            'categorias' => 'categorias.php',
            'depoimentos' => 'depoimentos.php',
        ];

        $query = http_build_query(array_filter([
            'action' => $action,
            'id' => $id,
        ], fn($value) => $value !== null));

        return $pages[$entity] . '?' . $query;
    }

    if (in_array($action, ['edit', 'delete'], true)) {
        if (!$id) {
            http_response_code(404);
            exit('Registro não encontrado.');
        }

        $stmt = $pdo->prepare("SELECT * FROM $entity WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch();

        if (!$item) {
            http_response_code(404);
            exit('Registro não encontrado.');
        }
    }

    if ($method === 'POST' && $action === 'delete') {
        $pdo->prepare("DELETE FROM $entity WHERE id = ?")->execute([$id]);
        $_SESSION['flash'] = 'Registro excluído com sucesso.';
        header('Location: ' . url($entity), true, 303);
        exit;
    }

    if ($method === 'POST' && in_array($action, ['create', 'edit'], true)) {
        // Não reaproveite array_values($item): o SELECT também traz id e criado_em.
        $data = [];
        foreach ($meta['fields'] as $field => $label) {
            $raw = $_POST[$field] ?? '';
            if (!is_string($raw)) {
                $error = 'Formato de campo inválido.';
                $raw = '';
            }

            $data[$field] = trim($raw);
            if (isset($limits[$field])) {
                $length = preg_match_all('/./us', $data[$field]);
                if ($length === false || $length > $limits[$field]) {
                    $error = $label . ': use no máximo ' . $limits[$field] . ' caracteres válidos.';
                }
            }
        }

        if ($data['nome'] === '') {
            $error = 'Informe o nome.';
        }

        if ($entity === 'pizzas') {
            $data['preco'] = str_replace(',', '.', $data['preco']);
            if (!preg_match('/^\d{1,8}(\.\d{1,2})?$/D', $data['preco'])) {
                $error = 'Informe um preço de 0 a 99999999,99, com até duas casas decimais.';
            }

            if ($data['descricao'] === '') {
                $error = 'Informe a descrição da pizza.';
            }

            if (!isset($images[$data['imagem']])) {
                $error = 'Selecione uma imagem da lista.';
            }

            if ($data['categoria_id'] === '') {
                $data['categoria_id'] = null;
            } elseif (
            !ctype_digit($data['categoria_id'])
            || !in_array(
            (int) $data['categoria_id'],
            array_map('intval', array_column($categories, 'id')),
            true
            )
            ) {
                $error = 'Selecione uma categoria existente.';
            } else {
                $data['categoria_id'] = (int) $data['categoria_id'];
            }
        }

        if ($entity === 'depoimentos') {
            if ($data['texto'] === '' || !preg_match('/^[1-5]$/D', $data['nota'])) {
                $error = 'Informe o depoimento e uma nota inteira entre 1 e 5.';
            }
        }
        $item = $data;
        if ($error === '') {
            $fields = array_keys($meta['fields']);
            $values = array_map(fn($field) => $data[$field], $fields);

            if ($action === 'create') {
                $columns = implode(',', $fields);
                $placeholders = implode(',', array_fill(0, count($fields), '?'));
                $sql = "INSERT INTO $entity ($columns) VALUES ($placeholders)";
            } else {
                $assignments = implode(',', array_map(fn($field) => "$field = ?", $fields));
                $sql = "UPDATE $entity SET $assignments WHERE id = ?";
                $values[] = $id;
            }

            try {
                $pdo->prepare($sql)->execute($values);
                $_SESSION['flash'] = $action === 'create' ? 'Registro criado com sucesso.' : 'Registro atualizado com sucesso.';
                header('Location: ' . url($entity), true, 303);
                exit;
            } catch (PDOException $exception) {
                error_log('Falha ao salvar cadastro Magleoni: ' . $exception->getCode());
                $error = 'Não foi possível salvar. Confira os dados e tente novamente.';
            }
        }
        http_response_code(422);
    }

    $items = [];
    if ($action === 'list') {
        $sql = $entity === 'pizzas'
        ? 'SELECT pizzas.*, categorias.nome AS categoria_nome
        FROM pizzas
        LEFT JOIN categorias ON categorias.id = pizzas.categoria_id
        ORDER BY pizzas.id DESC'
        : "SELECT * FROM $entity ORDER BY id DESC";
        $items = $pdo
        ->query($sql)
        ->fetchAll();
    }
    $flash = $_SESSION['flash'] ?? '';
    unset($_SESSION['flash']);
?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= e($meta['title']) ?> — Administração Magleoni</title>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="icon" type="image/png" href="images/logo-magleoni.png">
    </head>
    <body>
        <header class="admin-bar">
            <a class="admin-brand" href="index.php">
                <span class="logo-seal">
                    <img
                    src="images/logo-magleoni.png"
                    alt="Logo oficial Papa's Magleoni"
                    width="56"
                    height="56"
                    >
                </span>
                <span>PAPA'S MAGLEONI <small>ADMINISTRAÇÃO</small></span>
            </a>
            <nav class="admin-nav" aria-label="Administração">
                <?php foreach ($entities as $key => $info): ?>
                    <a
                    href="<?= e(url($key)) ?>"
                    <?= $entity === $key ? 'aria-current="page"' : '' ?>
                    >
                    <?= e($info['title']) ?>
                </a>
                <?php endforeach; ?>
                <a href="index.php">Ver site ↗</a>
                <form method="post" action="logout.php">
                    <?= csrf_field() ?>
                    <button class="logout-button">Sair</button>
                </form>
            </nav>
        </header>
        <main class="admin-main">
            <?php if ($action === 'list'): ?>
                <section class="admin-head">
                    <div>
                        <p class="admin-kicker">CRUD completo</p>
                        <h1><?= e($meta['title']) ?></h1>
                        <p>Cadastre, consulte, edite e exclua <?= e(strtolower($meta['title'])) ?>.</p>
                    </div>
                    <div class="admin-actions">
                        <a class="button-admin button-outline" href="index.php">Voltar ao site</a>
                        <a class="button-admin" href="<?= e(url($entity, 'create')) ?>">
                            + <?= e($meta['new']) ?>
                        </a>
                    </div>
                </section>
                <?php if ($flash): ?>
                    <p class="notice" role="status"><?= e($flash) ?></p>
                    <?php endif; ?>
                    <div class="admin-table-wrap" tabindex="0" role="region" aria-label="Lista de <?= e(strtolower($meta['title'])) ?>">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col"><?= $entity === 'depoimentos' ? 'Cliente' : 'Nome' ?></th>
                                    <th scope="col">Detalhes</th>
                                    <?php if ($entity === 'pizzas'): ?>
                                        <th scope="col">Preço</th>
                                        <?php endif; ?>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $row): ?>
                                        <tr>
                                            <td>#<?= e($row['id']) ?></td>
                                            <td>
                                                <?php if ($entity === 'pizzas'): ?>
                                                    <img class="admin-thumb" src="<?= e(pizza_image($row['imagem'])) ?>" alt="">
                                                    <?php endif; ?>
                                                    <?= e($row['nome']) ?>
                                                </td>
                                                <td class="record-details">
                                                    <?php if ($entity === 'pizzas'): ?>
                                                        <strong><?= e($row['categoria_nome'] ?? 'Sem categoria') ?></strong>
                                                        <br><?= e($row['descricao']) ?>
                                                        <?php if ($row['badge']): ?>
                                                            <br><small><?= e($row['badge']) ?></small>
                                                            <?php endif; ?>
                                                        <?php elseif ($entity === 'categorias'): ?>
                                                            <?= e($row['descricao']) ?>
                                                        <?php else: ?>
                                                            <span aria-label="Nota <?= (int) $row['nota'] ?> de 5">
                                                                <?= str_repeat('★', max(0, min(5, (int) $row['nota']))) ?>
                                                            </span>
                                                            <br><?= e($row['texto']) ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <?php if ($entity === 'pizzas'): ?>
                                                            <td><?= e(money($row['preco'])) ?></td>
                                                            <?php endif; ?>
                                                            <td>
                                                                <a href="<?= e(url($entity, 'edit', $row['id'])) ?>">Editar</a>
                                                                <a href="<?= e(url($entity, 'delete', $row['id'])) ?>">Excluir</a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php if (!$items): ?>
                                                            <tr>
                                                                <td colspan="<?= $entity === 'pizzas' ? 5 : 4 ?>">Ainda não há registros.</td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php else: ?>
                                                <section class="admin-head">
                                                    <div>
                                                        <p class="admin-kicker">CRUD completo</p>
                                                        <h1>
                                                            <?= e($action === 'create'
                                                            ? $meta['new']
                                                            : ($action === 'delete' ? 'Excluir ' : 'Editar ') . $meta['singular']) ?>
                                                        </h1>
                                                        <p>
                                                            <?= $action === 'delete'
                                                            ? 'Esta ação precisa de confirmação.'
                                                            : 'Preencha os dados abaixo. Os campos opcionais estão indicados.' ?>
                                                        </p>
                                                    </div>
                                                    <a class="button-admin button-outline" href="<?= e(url($entity)) ?>">Voltar</a>
                                                </section>
                                                <?php if ($error): ?>
                                                    <p class="notice error" role="alert"><?= e($error) ?></p>
                                                    <?php endif; ?>
                                                    <form class="admin-form" method="post">
                                                        <?= csrf_field() ?>
                                                        <?php if ($action === 'delete'): ?>
                                                            <p>Tem certeza que deseja excluir <strong><?= e($item['nome']) ?></strong>?</p>
                                                            <?php if ($entity === 'categorias'): ?>
                                                                <p>As pizzas desta categoria serão mantidas como “Sem categoria”.</p>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php foreach ($meta['fields'] as $field => $label):
                                                                $optional = $field === 'badge' || $field === 'categoria_id' || ($entity === 'categorias' && $field === 'descricao');
                                                                $required = $optional ? '' : 'required';
                                                                $maxlength = isset($limits[$field]) ? 'maxlength="' . $limits[$field] . '"' : '';
                                                                ?>
                                                                <div class="field">
                                                                    <label for="<?= e($field) ?>">
                                                                        <?= e($label) ?><?= $optional ? ' (opcional)' : '' ?>
                                                                    </label>
                                                                    <?php if (in_array($field, ['descricao', 'texto'], true)): ?>
                                                                        <textarea
                                                                        id="<?= e($field) ?>"
                                                                        name="<?= e($field) ?>"
                                                                        <?= $required ?>
                                                                        <?= $maxlength ?>
                                                                        ><?= e($item[$field] ?? '') ?></textarea>
                                                                <?php elseif ($field === 'categoria_id'): ?>
                                                                    <select id="categoria_id" name="categoria_id">
                                                                        <option value="">Sem categoria</option>
                                                                        <?php foreach ($categories as $category): ?>
                                                                            <option
                                                                            value="<?= e($category['id']) ?>"
                                                                            <?= (string) ($item[$field] ?? '') === (string) $category['id'] ? 'selected' : '' ?>
                                                                            >
                                                                            <?= e($category['nome']) ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                <?php elseif ($field === 'imagem'): ?>
                                                                    <select id="imagem" name="imagem" required>
                                                                        <?php foreach ($images as $path => $name): ?>
                                                                            <option
                                                                            value="<?= e($path) ?>"
                                                                            <?= ($item[$field] ?? '') === $path ? 'selected' : '' ?>
                                                                            >
                                                                            <?= e($name) ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                <?php else: ?>
                                                                    <input
                                                                    id="<?= e($field) ?>"
                                                                    name="<?= e($field) ?>"
                                                                    value="<?= e($item[$field] ?? '') ?>"
                                                                    <?= $field === 'preco'
                                                                    ? 'type="number" min="0" max="99999999.99" step="0.01"'
                                                                    : ($field === 'nota'
                                                                    ? 'type="number" min="1" max="5" step="1"'
                                                                    : 'type="text"') ?>
                                                                    <?= $required ?>
                                                                    <?= $maxlength ?>
                                                                    >
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                                <div class="form-footer">
                                                                    <a class="button-admin button-outline" href="<?= e(url($entity)) ?>">Cancelar</a>
                                                                    <button class="button-admin <?= $action === 'delete' ? 'button-danger' : '' ?>">
                                                                        <?= $action === 'delete' ? 'Excluir permanentemente' : 'Salvar ' . e($meta['singular']) ?>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                            <?php endif; ?>
                                                        </main>
                                                        <footer class="admin-footer">Papa's Magleoni · Painel administrativo escolar</footer>
                                                    </body>
                                                </html>
