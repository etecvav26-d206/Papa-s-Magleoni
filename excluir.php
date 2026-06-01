<?php
require_once 'config/conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: gerenciar.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("DELETE FROM pizzas WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: gerenciar.php?msg=excluido");
        exit;
    } catch (\PDOException $e) {
        $error = "Erro ao excluir pizza do banco de dados: " . $e->getMessage();
    }
}

// Buscar dados da pizza para confirmar
try {
    $stmt = $pdo->prepare("SELECT * FROM pizzas WHERE id = ?");
    $stmt->execute([$id]);
    $pizza = $stmt->fetch();
} catch (\PDOException $e) {
    $pizza = false;
    $error = "Erro ao buscar informações: " . $e->getMessage();
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
            <h1 class="admin-title" style="text-shadow: 2px 2px 0 var(--red-dark);">Confirmar Exclusão</h1>
            <p class="admin-subtitle">Confirme se deseja realmente remover esta pizza do cardápio.</p>
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

    <section class="glass-card" style="max-width: 600px; margin: 0 auto; text-align: center;">
        <div style="margin-bottom: 24px;">
            <img src="<?= htmlspecialchars($pizza['imagem']) ?>" alt="<?= htmlspecialchars($pizza['nome']) ?>" style="width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 4px solid var(--red); box-shadow: var(--shadow); margin-bottom: 16px;">
            
            <h3 style="font-family:'Montserrat',sans-serif; font-size: 1.6rem; font-weight:700; color: var(--cream); margin-bottom: 8px;">
                <?= htmlspecialchars($pizza['nome']) ?>
            </h3>
            
            <p style="font-size: 0.95rem; opacity: 0.8; line-height: 1.6; margin-bottom: 12px;">
                <?= htmlspecialchars($pizza['descricao']) ?>
            </p>

            <span style="display:inline-block; background: rgba(178,43,43,0.15); border: 1px solid var(--red); color: var(--cream); padding: 6px 16px; border-radius: 20px; font-weight: 700; font-size: 1.1rem; letter-spacing: 0.5px;">
                R$ <?= number_format($pizza['preco'], 2, ',', '.') ?>
            </span>
        </div>

        <p style="color: var(--red); font-weight: 600; font-size: 0.9rem; margin-bottom: 32px; border-top: 1px solid rgba(255,255,255,0.06); padding-top: 20px;">
            ⚠️ Atenção: Esta ação é permanente e não poderá ser desfeita!
        </p>

        <form action="excluir.php?id=<?= $pizza['id'] ?>" method="post" style="display: flex; justify-content: center; gap: 16px;">
            <a class="btn-outline-admin btn-sm" href="gerenciar.php" style="text-decoration:none; padding:12px 30px; font-weight:600;">Cancelar</a>
            <button class="btn-primary btn-sm btn-danger" type="submit" style="padding:12px 30px; font-size:1rem; font-weight:600; cursor:pointer;">Excluir Permanentemente</button>
        </form>
    </section>
</main>

<?php require_once 'includes/footer_admin.php'; ?>
