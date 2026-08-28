<?php
// Não adicione senhas aqui. Use variáveis de ambiente ou local.php.
$local = is_file(__DIR__ . '/local.php') ? require __DIR__ . '/local.php' : [];
function setting(string $key, string $default = ''): string
{
    global $local;
    $value = getenv($key);
    return $value !== false ? $value : (string) ($local[$key] ?? $default);
}
