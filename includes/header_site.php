<?php
    require_once __DIR__ . '/helpers.php';
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    $publicPages = [
        'index.php' => 'Início',
        'cardapio.php' => 'Cardápio',
        'sobre.php' => 'A casa',
        'diferenciais.php' => 'Diferenciais',
        'contato.php' => 'Contato',
    ];
?>
<header class="site-header" id="inicio">
    <a class="brand" href="index.php" aria-label="Magleoni — página inicial">
        <span class="logo-seal">
            <img
            src="images/logo-magleoni.png"
            alt="Logo oficial Papa's Magleoni"
            width="72"
            height="72"
            >
        </span>
        <span>
            PAPA'S MAGLEONI
            <small>PIZZARIA</small>
        </span>
    </a>
    <button class="menu-toggle" type="button" aria-label="Abrir menu" aria-expanded="false" aria-controls="menu-principal">☰</button>
    <nav id="menu-principal" aria-label="Menu principal">
        <?php foreach ($publicPages as $path => $label): ?>
            <a
            href="<?= e($path) ?>"
            <?= $currentPage === $path ? 'aria-current="page"' : '' ?>
            >
            <?= e($label) ?>
        </a>
        <?php endforeach; ?>
    </nav>
    <a class="order" href="cardapio.php">Pedir agora <i aria-hidden="true">↗</i></a>
</header>
