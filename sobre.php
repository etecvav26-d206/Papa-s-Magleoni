<?php require_once __DIR__ . '/includes/catalogo.php'; ?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Sobre nós — Magleoni</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" type="image/png" href="images/logo-magleoni.png">
    </head>
    <body>
        <?php require __DIR__ . '/includes/header_site.php'; ?>
        <main>
            <section class="page-hero">
                <p class="eyebrow">— CONHEÇA A MAGLEONI</p>
                <h1>Sobre a Magleoni</h1>
                <p>Pizza boa é encontro. É a mesa que demora para esvaziar e a conversa que pede mais uma fatia.</p>
            </section>
            <section class="about-grid">
                <img src="images/pizza-especial.png" alt="Pizza especial da Magleoni">
                <div>
                    <p class="eyebrow">— NOSSA HISTÓRIA</p>
                    <h2>Da massa à mesa,<br>
                        <em>sem atalhos.</em>
                    </h2>
                    <p>
                        Nascemos com uma ideia simples: preparar pizzas artesanais que as pessoas
                        tenham vontade de repetir. Nossa massa descansa por 72 horas e os
                        ingredientes são selecionados para trazer sabor de verdade a cada pedaço.
                    </p>
                    <p>O resultado é uma pizza leve, generosa e feita para acompanhar seus melhores momentos.</p>
                </div>
            </section>
            <section class="numbers">
                <div>
                    <b>2026</b>
                    <span>projeto escolar</span>
                </div>
                <div>
                    <b>
                        <?= count($pizzas) ?>
                    </b>
                    <span>sabores no cardápio</span>
                </div>
                <div>
                    <b>72h</b>
                    <span>fermentação da massa</span>
                </div>
            </section>

        </main>
        <?php require __DIR__ . '/includes/footer_site.php'; ?>
    </body>
</html>
