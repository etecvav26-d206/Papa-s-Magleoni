<?php
// Executar apenas no terminal, depois de fazer backup do banco existente.
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

require_once __DIR__ . '/../config/conexao.php';
$sql = preg_replace('/^--.*$/m', '', file_get_contents(__DIR__ . '/../database.sql'));
$statements = array_filter(array_map('trim', explode(';', $sql)));
try {
    // CREATE IF NOT EXISTS não altera tabelas antigas: primeiro cria as novas.
    foreach ($statements as $statement) {
        if (preg_match('/^CREATE TABLE /i', $statement)) {
            $pdo->exec($statement);
        }
    }

    $columns = array_column($pdo->query('SHOW COLUMNS FROM pizzas')->fetchAll(), 'Field');
    if (!in_array('categoria_id', $columns, true)) {
        $pdo->exec('ALTER TABLE pizzas ADD categoria_id INT UNSIGNED NULL');
    }
    if (!in_array('criado_em', $columns, true)) {
        $pdo->exec('ALTER TABLE pizzas ADD criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
    }
    $foreignKeys = $pdo
        ->query(
            "SELECT CONSTRAINT_NAME
             FROM information_schema.KEY_COLUMN_USAGE
             WHERE TABLE_SCHEMA = DATABASE()
               AND TABLE_NAME = 'pizzas'
               AND COLUMN_NAME = 'categoria_id'
               AND REFERENCED_TABLE_NAME = 'categorias'"
        )
        ->fetchAll();

    if (!$foreignKeys) {
        $pdo->exec(
            'ALTER TABLE pizzas
             ADD CONSTRAINT fk_pizzas_categoria
             FOREIGN KEY (categoria_id) REFERENCES categorias(id)
             ON DELETE SET NULL'
        );
    }

    $pdo->beginTransaction();
    foreach ($statements as $statement) {
        if (preg_match('/^INSERT INTO /i', $statement)) {
            $pdo->exec($statement);
        }
    }
    $pdo->commit();
    echo "Migração concluída. Registros existentes preservados; pizzas antigas sem categoria podem ser classificadas no painel.\n";
} catch (PDOException $error) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    fwrite(STDERR, "Não foi possível concluir a migração. Código: " . $error->getCode() . ". Confira o esquema e o backup.\n");
    exit(1);
}
