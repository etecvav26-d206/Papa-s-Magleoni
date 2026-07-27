<?php
require_once 'config/conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: gerenciar.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome      = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco     = $_POST['preco'] ?? '';
    $badge     = $_POST['badge'] ?? '';
    $imagem    = $_POST['imagem'] ?? '';

    if (empty($badge)) {
        $badge = null;
    }

    if (!empty($nome) && !empty($descricao) && !empty($preco) && !empty($imagem)) {
        try {
            $sql = "UPDATE pizzas SET nome = ?, descricao = ?, preco = ?, badge = ?, imagem = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $descricao, $preco, $badge, $imagem, $id]);

            header("Location: gerenciar.php?msg=atualizado");
            exit;
        } catch (\PDOException $e) {
            $error = "Erro ao atualizar dados: " . $e->getMessage();
        }
    } else {
        $error = "Por favor, preencha todos os campos obrigatórios.";
    }
}

// Buscar dados atuais da pizza
try {
    $stmt = $pdo->prepare("SELECT * FROM pizzas WHERE id = ?");
    $stmt->execute([$id]);
    $pizza = $stmt->fetch();
} catch (\PDOException $e) {
    $pizza = false;
    $error = "Erro ao buscar informações da pizza: " . $e->getMessage();
}

if (!$pizza) {
    header("Location: gerenciar.php");
    exit;
}

require_once 'includes/header_admin.php';
?>

<main class="admin-main">
    <section class="admin-header">
        <div>
            <h1 class="admin-title">Editar Pizza</h1>
            <p class="admin-subtitle">Atualize as informações do sabor selecionado.</p>
        </div>

        <a class="btn-outline-admin btn-sm" href="gerenciar.php" style="text-decoration:none;">
            Voltar ao Painel
        </a>
    </section>

    <?php if (!empty($error)): ?>
        <div class="alert" style="background: rgba(220, 53, 69, 0.15); border: 1px solid #dc3545; color: #dc3545;">
            ⚠️ <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <section class="glass-card">
        <form action="editar.php?id=<?= $pizza['id'] ?>" method="post">
            <div class="form-grid-admin">
                <div class="form-group-admin full">
                    <label class="form-label-admin" for="nome">Nome da Pizza *</label>
                    <input class="form-control-admin" type="text" id="nome" name="nome" value="<?= htmlspecialchars($pizza['nome']) ?>" required>
                </div>

                <div class="form-group-admin full">
                    <label class="form-label-admin" for="descricao">Descrição dos Ingredientes *</label>
                    <textarea class="form-control-admin" id="descricao" name="descricao" rows="3" required style="resize:vertical;"><?= htmlspecialchars($pizza['descricao']) ?></textarea>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="preco">Preço (R$) *</label>
                    <input class="form-control-admin" type="number" step="0.01" min="0" id="preco" name="preco" value="<?= $pizza['preco'] ?>" required>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="badge">Selo / Badge (Opcional)</label>
                    <input class="form-control-admin" type="text" id="badge" name="badge" value="<?= htmlspecialchars($pizza['badge']) ?>" placeholder="Ex: Favorita, Novidade, Especial">
                </div>

                <div class="form-group-admin full">
                    <label class="form-label-admin" for="imagem">Escolha a Imagem da Pizza *</label>
                    <select class="form-control-admin" id="imagem" name="imagem" required>
                        <option value="images/pizza-margherita.png" <?= $pizza['imagem'] === 'images/pizza-margherita.png' ? 'selected' : '' ?>>pizza-margherita.png (Margherita)</option>
                        <option value="images/pizza-pepperoni.png" <?= $pizza['imagem'] === 'images/pizza-pepperoni.png' ? 'selected' : '' ?>>pizza-pepperoni.png (Pepperoni)</option>
                        <option value="images/pizza-quatro-queijos.png" <?= $pizza['imagem'] === 'images/pizza-quatro-queijos.png' ? 'selected' : '' ?>>pizza-quatro-queijos.png (Quatro Queijos)</option>
                        <option value="images/pizza-calzone.png" <?= $pizza['imagem'] === 'images/pizza-calzone.png' ? 'selected' : '' ?>>pizza-calzone.png (Calzone)</option>
                        <option value="images/pizza-portuguesa.png" <?= $pizza['imagem'] === 'images/pizza-portuguesa.png' ? 'selected' : '' ?>>pizza-portuguesa.png (Portuguesa)</option>
                        <option value="images/pizza-especial.png" <?= $pizza['imagem'] === 'images/pizza-especial.png' ? 'selected' : '' ?>>pizza-especial.png (Especial da Casa)</option>
                    </select>
                </div>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:16px; margin-top:32px;">
                <a class="btn-outline-admin btn-sm" href="gerenciar.php" style="text-decoration:none; padding:12px 30px;">Cancelar</a>
                <button class="btn-primary btn-sm" type="submit" style="padding:12px 30px; font-size:1rem; cursor:pointer;">Atualizar Pizza</button>
            </div>
        </form>
    </section>
</main>

<?php require_once 'includes/footer_admin.php'; ?>
