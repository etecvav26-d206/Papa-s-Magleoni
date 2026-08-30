<?php
// Não adicionar senhas aqui
$local = is_file(__DIR__ . '/local.php') ? require __DIR__ . '/local.php' : [];
function setting(string $key, string $default = ''): string
{
    global $local;
    $value = getenv($key);
    return $value !== false ? $value : (string) ($local[$key] ?? $default);
}
