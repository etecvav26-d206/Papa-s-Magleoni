<?php require_once __DIR__ . '/includes/catalogo.php'; ?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="Cardápio artesanal da Magleoni Pizzaria.">
<title>Cardápio — Magleoni</title>
<link rel="stylesheet" href="css/styles.css">
<link rel="icon" type="image/png" href="images/logo-magleoni.png">
</head>
<body>
<?php require __DIR__ . '/includes/header_site.php'; ?>
<main>
<section class="menu-cover">
<div>
<p class="eyebrow">— CARDÁPIO MAGLEONI</p>
<h1>Nosso <em>cardápio</em></h1>
<p>Veja os sabores disponíveis, os ingredientes e os preços.</p>
<div class="menu-details">
<span>🍕 Pizzas de 35 cm</span>
<span>↗ Entrega ou retirada</span>
</div>
</div>
<img src="images/pizza-especial.png" alt="Pizza artesanal recém-preparada">
</section>
<?php require __DIR__ . '/includes/cardapio_publico.php'; ?>
<section class="menu-bottom">
<div>
<p class="eyebrow">— BATEU A FOME?</p>
<h2>Gostou de algum sabor?</h2>
</div>
<a class="button light" href="https://wa.me/5511999999999?text=Olá!%20Gostaria%20de%20fazer%20um%20pedido." target="_blank" rel="noopener">Fazer pedido →</a>
</section>
</main>
<?php require __DIR__ . '/includes/footer_site.php'; ?>
</body>
</html>
