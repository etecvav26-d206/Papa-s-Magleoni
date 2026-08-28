<?php
require_once __DIR__ . '/includes/auth.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit('Utilize o botão Sair do painel.');
}
verify_csrf();
$_SESSION = [];
session_destroy();
header('Location: login.php', true, 303);
