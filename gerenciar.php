<?php
require_once 'config/conexao.php';

// Buscar todas as pizzas
try {
    $stmt = $pdo->query("SELECT * FROM pizzas ORDER BY id ASC");
    $pizzas = $stmt->fetchAll();
} catch (\PDOException $e) {
    $pizzas = [];
    $error_msg = $e->getMessage();
}

$msg = $_GET['msg'] ?? '';

require_once 'includes/header_admin.php';
?>

<main class="admin-main">
    <section class="admin-header">
        <div>
            <h1 class="admin-title">Gerenciar Pizzas</h1>
            <p class="admin-subtitle">Painel de controle para cadastrar, editar e remover pizzas do cardápio.</p>
        </div>

        <a class="btn-primary btn-sm" href="cadastro.php">
            + Nova Pizza
        </a>
    </section>

    <?php if ($msg === 'cadastrado'): ?>
        <div class="alert alert-success">🍕 Pizza cadastrada com sucesso!</div>
    <?php elseif ($msg === 'atualizado'): ?>
        <div class="alert alert-success">📝 Pizza atualizada com sucesso!</div>
    <?php elseif ($msg === 'excluido'): ?>
        <div class="alert alert-success">🗑️ Pizza removida do cardápio com sucesso!</div>
    <?php endif; ?>

    <?php if (isset($error_msg)): ?>
        <div class="alert alert-danger" style="background: rgba(220, 53, 69, 0.15); border: 1px solid #dc3545; color: #dc3545;">
            Erro de Banco de Dados: <?= htmlspecialchars($error_msg) ?>
        </div>
    <?php endif; ?>

    <section class="glass-card">
        <?php if (empty($pizzas)): ?>
            <p style="text-align: center; padding: 20px; opacity: 0.7;">Nenhuma pizza cadastrada no momento.</p>
        <?php else: ?>
            
            <!-- Versão Desktop (Tabela) -->
            <div class="desktop-table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Selo / Badge</th>
                            <th>Preço</th>
                            <th style="text-align: right;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pizzas as $pizza): ?>
                            <tr>
                                <td>
                                    <img class="pizza-thumb" src="<?= htmlspecialchars($pizza['imagem']) ?>" alt="<?= htmlspecialchars($pizza['nome']) ?>">
                                </td>
                                <td><span style="opacity: 0.6;">#<?= str_pad($pizza['id'], 3, '0', STR_PAD_LEFT) ?></span></td>
                                <td><strong><?= htmlspecialchars($pizza['nome']) ?></strong></td>
                                <td>
                                    <?php if (!empty($pizza['badge'])): ?>
                                        <span style="background: var(--red); padding: 4px 10px; border-radius: 10px; font-size: 0.75rem; text-transform: uppercase; font-weight:700;"><?= htmlspecialchars($pizza['badge']) ?></span>
                                    <?php else: ?>
                                        <span style="opacity: 0.4; font-style: italic;">Nenhum</span>
                                    <?php endif; ?>
                                </td>
                                <td><strong style="color: var(--red);">R$ <?= number_format($pizza['preco'], 2, ',', '.') ?></strong></td>
                                <td style="text-align: right;">
                                    <a class="btn-outline-admin btn-sm" href="editar.php?id=<?= $pizza['id'] ?>" style="text-decoration:none; margin-right: 8px; font-weight:600;">Editar</a>
                                    <a class="btn-danger btn-sm" href="excluir.php?id=<?= $pizza['id'] ?>" style="text-decoration:none; font-weight:600;">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Versão Mobile (Cards Compactos) -->
            <div class="admin-cards-container">
                <?php foreach ($pizzas as $pizza): ?>
                    <div class="admin-mobile-card">
                        <div class="admin-mobile-card-header">
                            <img class="pizza-thumb" src="<?= htmlspecialchars($pizza['imagem']) ?>" alt="<?= htmlspecialchars($pizza['nome']) ?>">
                            <div>
                                <h3 style="font-family:'Montserrat',sans-serif; font-size: 1.1rem; font-weight:700;"><?= htmlspecialchars($pizza['nome']) ?></h3>
                                <p style="font-size: 0.8rem; opacity: 0.6; margin-top: 2px;">#<?= str_pad($pizza['id'], 3, '0', STR_PAD_LEFT) ?></p>
                            </div>
                        </div>
                        <div>
                            <p style="font-size: 0.85rem; opacity: 0.8;"><?= htmlspecialchars($pizza['descricao']) ?></p>
                            <div style="margin-top: 10px; display:flex; justify-content:space-between; align-items:center;">
                                <span style="font-size: 0.85rem;">Preço: <strong style="color: var(--red);">R$ <?= number_format($pizza['preco'], 2, ',', '.') ?></strong></span>
                                <?php if (!empty($pizza['badge'])): ?>
                                    <span style="background: var(--red); padding: 2px 8px; border-radius: 8px; font-size: 0.7rem; text-transform: uppercase; font-weight:700;"><?= htmlspecialchars($pizza['badge']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="admin-mobile-card-actions">
                            <a class="btn-outline-admin btn-sm" href="editar.php?id=<?= $pizza['id'] ?>" style="text-decoration:none; flex: 1; text-align:center; font-weight:600;">Editar</a>
                            <a class="btn-danger btn-sm" href="excluir.php?id=<?= $pizza['id'] ?>" style="text-decoration:none; flex: 1; text-align:center; font-weight:600;">Excluir</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </section>
</main>

<?php require_once 'includes/footer_admin.php'; ?>
