<?php
require_once 'config/conexao.php';

// Buscar pizzas do banco de dados
try {
    $stmt = $pdo->query("SELECT * FROM pizzas ORDER BY id ASC");
    $pizzas = $stmt->fetchAll();
} catch (\PDOException $e) {
    $pizzas = [];
    $error_msg = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Papa's Magleoni — Pizzaria Artesanal</title>
  <meta name="description" content="Papa's Magleoni Pizzaria — Sabor artesanal que reúne, momentos que ficam. Pizzas feitas em forno a lenha com ingredientes selecionados.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/svg+xml" href="images/favicon.svg">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <a href="#" class="nav-logo">
    <img src="images/logo-magleoni.png" alt="Logo" class="nav-logo-icon">
    PAPA'S <span class="accent">MAGLEONI</span>
  </a>
  <ul class="nav-links">
    <li><a href="#inicio">Início</a></li>
    <li><a href="#cardapio">Destaques</a></li>
    <li><a href="#contato">Contato</a></li>
    <li><a href="gerenciar.php" style="color: var(--red); border: 1px solid rgba(178,43,43,0.3); padding: 4px 12px; border-radius: 15px; transition: all 0.3s;" onmouseover="this.style.background='var(--red)'; this.style.color='var(--cream)';" onmouseout="this.style.background='transparent'; this.style.color='var(--red)';">Painel Admin</a></li>
  </ul>
</nav>

<!-- HERO -->
<section class="hero" id="inicio">
  <div class="hero-bg-pattern"></div>
  <div class="hero-container">
    <!-- Coluna de Texto -->
    <div class="hero-text-col">
      <span class="hero-badge">
        <svg class="badge-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 11h.01"/><path d="M11 15h.01"/><path d="M16 16h.01"/><path d="m2 16 20 6-6-20A20 20 0 0 0 2 16"/><path d="M5.71 17.11a17.04 17.04 0 0 1 11.4-11.4"/>
        </svg>
        Pizzaria Artesanal
      </span>
      <h1 class="hero-title">PAPA'S<br><span class="red">MAGLEONI</span></h1>
      <p class="hero-subtitle">• P I Z Z A R I A •</p>
      <p class="hero-tagline">Sabor que reúne, momentos que ficam.</p>
      <div class="hero-features">
        <span class="feature-pill">
          <svg class="pill-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>
          </svg>
          Forno a Lenha
        </span>
        <span class="feature-pill">
          <svg class="pill-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/>
          </svg>
          Ingredientes Frescos
        </span>
        <span class="feature-pill">
          <svg class="pill-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
          </svg>
          Fermentação 72h
        </span>
      </div>
      <div class="hero-cta-group">
        <a href="#cardapio" class="btn-primary">VER CARDÁPIO</a>
        <a href="#contato" class="btn-secondary">ONDE ESTAMOS</a>
      </div>
    </div>
    <!-- Coluna da Imagem -->
    <div class="hero-image-col">
      <div class="hero-pizza-glow"></div>
      <div class="hero-pizza-wrap">
        <img src="images/pizza-pepperoni.png" alt="Pizza Pepperoni Artesanal" class="hero-pizza-img">
      </div>
      <span class="hero-pizza-label">Pepperoni Especial</span>
    </div>
  </div>
  
</section>

<div class="checker-divider"></div>

<!-- MENU (DESTAQUES) -->
<section class="menu section" id="cardapio">
  <div class="section-header">
    <span class="section-label">Nossos Sabores</span>
    <h2 class="section-title">Destaques do Cardápio</h2>
    <p class="section-desc">Cada pizza é uma obra-prima — massa artesanal, ingredientes frescos e o calor do forno a lenha.</p>
  </div>
  <div class="menu-grid">
    <?php if (empty($pizzas)): ?>
      <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--brown);">
        <p>Nenhuma pizza cadastrada no momento ou erro ao conectar com o banco de dados.</p>
        <?php if (isset($error_msg)): ?>
          <small style="opacity: 0.7; display: block; margin-top: 10px;">Erro: <?= htmlspecialchars($error_msg) ?></small>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <?php foreach ($pizzas as $pizza): ?>
        <div class="pizza-card">
          <div class="pizza-card-img-wrap">
            <img class="pizza-card-img" src="<?= htmlspecialchars($pizza['imagem']) ?>" alt="Pizza <?= htmlspecialchars($pizza['nome']) ?>" loading="lazy">
            <?php if (!empty($pizza['badge'])): ?>
              <span class="pizza-card-badge"><?= htmlspecialchars($pizza['badge']) ?></span>
            <?php endif; ?>
          </div>
          <div class="pizza-card-body">
            <h3><?= htmlspecialchars($pizza['nome']) ?></h3>
            <p><?= htmlspecialchars($pizza['descricao']) ?></p>
            <div class="pizza-card-footer">
              <span class="pizza-price">R$ <?= number_format($pizza['preco'], 2, ',', '.') ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<div class="checker-divider"></div>

<!-- CONTACT -->
<section class="contact section" id="contato">
  <div class="section-header">
    <span class="section-label">Fale Conosco</span>
    <h2 class="section-title">Entre em Contato</h2>
  </div>
  <div class="contact-grid">
    <div class="contact-info" style="grid-column: 1 / -1; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px; max-width: 1000px; margin: 0 auto; width: 100%;">
      <div class="contact-item">
        <div class="contact-item-icon">
          <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div class="contact-item-text">
          <h4>Endereço</h4>
          <p>Rua das Pizzas, 123 — Centro<br>Jundiaí, SP — CEP 13201-000</p>
        </div>
      </div>
      <div class="contact-item">
        <div class="contact-item-icon">
          <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        </div>
        <div class="contact-item-text">
          <h4>Telefone</h4>
          <p>(11) 99999-9999</p>
        </div>
      </div>
      <div class="contact-item">
        <div class="contact-item-icon">
          <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <div class="contact-item-text">
          <h4>Horário</h4>
          <p>Terça a Domingo: 18h — 00h<br>Segunda: Fechado</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="checker-divider"></div>

<!-- FOOTER -->
<footer class="footer">
  <div class="footer-logo" style="display: flex; align-items: center; justify-content: center; gap: 8px;">
    <img src="images/logo-magleoni.png" alt="Logo" class="footer-logo-icon" style="height: 40px; width: auto; object-fit: contain;">
    PAPA'S <span class="accent">MAGLEONI</span>
  </div>
  <p class="footer-tagline">Desenvolvido em 2026 para fins didáticos (Trabalho Escolar)</p>
  
  <div class="collaborators-container" style="max-width: 600px; margin: 24px auto; padding: 16px; border-top: 1px solid rgba(255,255,255,0.1); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <h4 style="font-family: 'Montserrat', sans-serif; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; color: var(--red); margin-bottom: 8px;">Colaboradores</h4>
    <p style="font-size: 0.9rem; opacity: 0.85; line-height: 1.6;">
      Otávio Biazzi &nbsp;·&nbsp; Pedro Miranda &nbsp;·&nbsp; Laura Gonçalves da Cruz &nbsp;·&nbsp; Pedro Godoi
    </p>
  </div>

  <div class="footer-bottom">
    <p>© 2026 Papa's Magleoni. Projeto Acadêmico Sem Fins Lucrativos.</p>
  </div>
</footer>

<script>
  // Script para mudar fotos no Hero interativamente se existirem
  const pizzaImages = [
    'images/pizza-pepperoni.png',
    'images/pizza-margherita.png',
    'images/pizza-quatro-queijos.png'
  ];
  const pizzaLabels = [
    'Pepperoni Especial',
    'Margherita Clássica',
    'Quatro Queijos Suprema'
  ];
  let currentImgIndex = 0;
  
  const heroImg = document.querySelector('.hero-pizza-img');
  const heroLabel = document.querySelector('.hero-pizza-label');
  
  if (heroImg && heroLabel) {
    heroImg.addEventListener('click', () => {
      currentImgIndex = (currentImgIndex + 1) % pizzaImages.length;
      heroImg.style.opacity = '0';
      heroImg.style.transform = 'rotate(90deg) scale(0.8)';
      
      setTimeout(() => {
        heroImg.src = pizzaImages[currentImgIndex];
        heroLabel.textContent = pizzaLabels[currentImgIndex];
        heroImg.style.opacity = '1';
        heroImg.style.transform = 'rotate(0deg) scale(1)';
      }, 300);
    });
    
    // cursor pointers
    heroImg.style.cursor = 'pointer';
    heroImg.title = 'Clique para mudar o sabor!';
  }
</script>

</body>
</html>
