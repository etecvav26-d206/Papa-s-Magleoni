<?php require_once __DIR__ . '/includes/catalogo.php'; ?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="theme-color" content="#171512">
        <title>Magleoni — Pizza de verdade</title>
        <meta name="description" content="Pizzas artesanais de fermentação lenta, assadas no forno e entregues quentinhas.">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" type="image/png" href="images/logo-magleoni.png">
    </head>
    <body>
        <?php require __DIR__ . '/includes/header_site.php'; ?>
        <main>
            <section class="hero">
                <div class="hero-copy">
                    <p class="eyebrow">PIZZARIA ARTESANAL</p>
                    <h1>Papa's <em>Magleoni</em></h1>
                    <p class="lead">Pizzas artesanais com massa de fermentação lenta e ingredientes frescos. Conheça nossos sabores e os horários de atendimento.</p>
                    <div class="actions">
                        <a class="button dark" href="cardapio.php">Ver cardápio <i>→</i>
                        </a>
                        <a class="text-link" href="sobre.php">Sobre a pizzaria</a>
                    </div>

                </div>
                <div class="hero-image hero-video">
                    <video
                    tabindex="-1"
                    disablepictureinpicture
                    disableremoteplayback
                    poster="images/pizza-margherita.png"
                    autoplay
                    muted
                    loop
                    playsinline
                    preload="metadata"
                    aria-label="Montagem de uma pizza Margherita"
                    >
                    <source src="videos/montagem-margherita.mp4" type="video/mp4">Seu navegador não suporta vídeo em HTML5.</video>
                <div class="note">
                    <b>01</b>
                    <p>
                        <strong>Montada na hora</strong>
                        <br>ingrediente por ingrediente</p>
                </div>
            </div>
        </section>

        <section class="menu" id="cardapio">
            <div class="section-head">
                <div>
                    <p class="eyebrow">CARDÁPIO</p>
                    <h2>Alguns sabores do cardápio</h2>
                </div>
                <p>Confira os ingredientes e os preços de algumas pizzas da casa.</p>
            </div>
            <?php require __DIR__ . '/includes/destaques.php'; ?>
            <a class="full-menu" href="cardapio.php">Ver cardápio completo →</a>
        </section>
        <section class="home-about">
            <h2>Sobre a pizzaria</h2>
            <p>A Magleoni é uma pizzaria fictícia criada para o projeto de Sistemas Web. A proposta é apresentar o cardápio, as informações da casa e um painel para gerenciar os produtos.</p>
            <a class="text-link" href="sobre.php">Conheça a casa →</a>
        </section>
        <?php require __DIR__ . '/includes/depoimentos_publicos.php'; ?>
        <section class="cta" id="contato">
            <div>
                <p class="eyebrow">CONTATO</p>
                <h2>Horários e contato</h2>
            </div>
            <div>
                <p>Atendimento de terça a domingo, das 18h à meia-noite. Consulte a página de contato para mais informações.</p>
                <a class="button light" href="https://wa.me/5511999999999" target="_blank" rel="noopener">Pedir pelo WhatsApp →</a>
                <small>Rua das Pizzas, 123 · Centro · São Paulo/SP<br>Terça a domingo · 18h às 00h</small>
            </div>
        </section>
        <section class="ai-disclosure" id="declaracao-ia">
            <details>
                <summary>DECLARAÇÃO DE USO DE INTELIGÊNCIA ARTIFICIAL</summary>
                <p>Usamos o Codex (OpenAI) para tirar dúvidas, localizar erros e revisar os cadastros.</p>
                <p>Também usamos o Gemini como apoio no vídeo e o ChatGPT Images 2 como apoio na criação da logo.</p>
                <p>Depois, conferimos o site, o banco de dados e os três CRUDs no ambiente local.</p>
                <a class="text-link" href="docs/DECLARACAO-IA.md">Ler declaração completa →</a>
            </details>
        </section>
    </main>
    <?php require __DIR__ . '/includes/footer_site.php'; ?>
</body>
</html>
