<?php
require_once __DIR__ . '/../config/settings.php';
require_once __DIR__ . '/helpers.php';
ini_set('session.use_strict_mode', '1');
session_set_cookie_params([
    'httponly' => true,
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'samesite' => 'Lax',
]);
session_start();
header('Cache-Control: no-store');
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf" value="' . e($_SESSION['csrf']) . '">';
}

function verify_csrf(): void
{
    $token = $_POST['csrf'] ?? null;
    if (!is_string($token) || !hash_equals($_SESSION['csrf'], $token)) {
        http_response_code(403);
        exit('Sessão ou formulário inválido. Recarregue a página e tente novamente.');
    }
}

function admin_credential_key(): string
{
    return hash('sha256', setting('ADMIN_USER', 'admin') . "\0" . setting('ADMIN_PASSWORD_HASH'));
}

function admin_authenticated(): bool
{
    $key = $_SESSION['credential_key'] ?? null;
    return !empty($_SESSION['admin'])
        && ($_SESSION['last_activity'] ?? 0) >= time() - 1800
        && is_string($key) && hash_equals(admin_credential_key(), $key);
}

function require_admin(): void
{
    if (!admin_authenticated()) {
        unset($_SESSION['admin'], $_SESSION['last_activity'], $_SESSION['credential_key']);
        header('Location: login.php');
        exit;
    }
    $_SESSION['last_activity'] = time();
}
