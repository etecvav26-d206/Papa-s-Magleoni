<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../config/conexao.php';
$pizzas = $pdo
    ->query(
        'SELECT pizzas.*, categorias.nome AS categoria_nome
         FROM pizzas
         LEFT JOIN categorias ON categorias.id = pizzas.categoria_id
         ORDER BY pizzas.id'
    )
    ->fetchAll();

$categories = $pdo
    ->query('SELECT id, nome, descricao FROM categorias ORDER BY nome')
    ->fetchAll();

$testimonials = $pdo
    ->query('SELECT nome, texto, nota FROM depoimentos ORDER BY id DESC LIMIT 6')
    ->fetchAll();
