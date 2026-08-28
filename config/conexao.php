<?php
require_once __DIR__ . '/settings.php';
$dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
    setting('DB_HOST', '127.0.0.1'), setting('DB_PORT', '3306'), setting('DB_NAME', 'papas_magleoni'));
try {
    $pdo = new PDO($dsn, setting('DB_USER', 'root'), setting('DB_PASS'), [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $error) {
    error_log('Falha na conexão com o banco Magleoni. Código: ' . $error->getCode());
    http_response_code(503);
    exit('Banco de dados indisponível. Confira a configuração e a instalação descritas no README.');
}
