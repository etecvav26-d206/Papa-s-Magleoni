<?php
require_once __DIR__ . '/includes/auth.php';
$error = '';
$configured = setting('ADMIN_PASSWORD_HASH') !== '';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && admin_authenticated()) {
    require_admin();
    header('Location: gerenciar.php', true, 303);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $user = $_POST['usuario'] ?? '';
    $password = $_POST['senha'] ?? '';
    if ($configured && is_string($user) && is_string($password)
        && hash_equals(setting('ADMIN_USER', 'admin'), $user)
        && password_verify($password, setting('ADMIN_PASSWORD_HASH'))) {
        session_regenerate_id(true);
        $_SESSION['admin'] = true;
        $_SESSION['credential_key'] = admin_credential_key();
        $_SESSION['last_activity'] = time();
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
        header('Location: gerenciar.php', true, 303);
        exit;
    }
    $error = 'Usuário ou senha inválidos.';
    http_response_code(401);
}
?>
<!doctype html>
<html lang="pt-BR">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Entrar — Magleoni</title><link rel="stylesheet" href="assets/css/admin.css"><link rel="icon" type="image/png" href="images/logo-magleoni.png"></head>
<body><main class="admin-main">
<section class="admin-head"><div><span class="logo-seal login-logo"><img src="images/logo-magleoni.png" alt="Logo oficial Papa's Magleoni" width="88" height="88"></span><p class="admin-kicker">Papa's Magleoni</p><h1>Acesso administrativo</h1><p>Entre para gerenciar pizzas, categorias e depoimentos.</p></div></section>
<?php if (!$configured): ?>
<p class="notice error">O acesso ainda não foi configurado. Siga o README para definir o usuário e o hash da senha em config/local.php.</p>
<?php else: ?>
<?php if ($error): ?><p class="notice error" role="alert"><?= e($error) ?></p><?php endif; ?>
<form method="post" class="admin-form">
<?= csrf_field() ?>
<div class="field"><label for="usuario">Usuário</label><input id="usuario" name="usuario" autocomplete="username" required></div>
<div class="field"><label for="senha">Senha</label><input id="senha" name="senha" type="password" autocomplete="current-password" required></div>
<button class="button-admin">Entrar</button>
</form>
<?php endif; ?>
<p><a href="index.php">Voltar ao site</a></p>
</main></body></html>
