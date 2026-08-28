<?php
$groups = [];
foreach ($categories as $category) {
    $groups[(string) $category['id']] = $category + ['pizzas' => []];
}
foreach ($pizzas as $pizza) {
    $key = (string) ($pizza['categoria_id'] ?? 'sem-categoria');
    if (!isset($groups[$key])) {
        $groups[$key] = ['id' => 'sem-categoria', 'nome' => 'Sem categoria', 'descricao' => 'Outros sabores da casa', 'pizzas' => []];
    }
    $groups[$key]['pizzas'][] = $pizza;
}
?>
<nav class="menu-tabs" aria-label="Categorias do cardápio">
    <?php foreach ($groups as $group): ?>
        <a href="#categoria-<?= e($group['id']) ?>">
            <?= e($group['nome']) ?>
        </a>
    <?php endforeach; ?>
    <a href="#bebidas">Bebidas</a>
</nav>
<section class="menu-real">
    <div class="menu-note">
        <p>
            <b>O seu jeito.</b>
            Todas as nossas pizzas podem ser meio a meio. Consulte disponibilidade
            de ingredientes no momento do pedido.
        </p>
    </div>
    <?php if (!$pizzas): ?><p>Nosso cardápio está sendo atualizado. Volte em breve.</p><?php endif; ?>
    <?php foreach ($groups as $group): ?>
    <section id="categoria-<?= e($group['id']) ?>" class="food-category">
        <div class="category-head">
            <div>
                <p class="eyebrow">— CARDÁPIO DA CASA</p>
                <h2><?= e($group['nome']) ?></h2>
            </div>
            <p><?= e($group['descricao']) ?></p>
        </div>
        <div class="food-grid">
        <?php foreach ($group['pizzas'] as $pizza): ?>
            <article class="food-card">
                <img
                    src="<?= e(pizza_image($pizza['imagem'])) ?>"
                    alt="<?= e($pizza['nome']) ?>"
                    loading="lazy"
                >
                <div class="food-info">
                    <?php if ($pizza['badge']): ?>
                        <span class="tag"><?= e($pizza['badge']) ?></span>
                    <?php endif; ?>
                    <h3><?= e($pizza['nome']) ?></h3>
                    <p><?= e($pizza['descricao']) ?></p>
                    <div>
                        <b><?= e(money($pizza['preco'])) ?></b>
                        <small>serve 1–2 pessoas</small>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
        <?php if (!$group['pizzas']): ?><p>Nenhum sabor cadastrado nesta categoria.</p><?php endif; ?>
        </div>
    </section>
    <?php endforeach; ?>
    <section id="bebidas" class="drinks">
        <div>
            <p class="eyebrow">— PARA ACOMPANHAR</p>
            <h2>Bebidas</h2>
            <p>Itens ilustrativos do projeto escolar.</p>
        </div>
        <div>
            <article><span>Refrigerante lata</span><b>R$ 7,00</b></article>
            <article><span>Suco natural</span><b>R$ 10,00</b></article>
            <article><span>Água com ou sem gás</span><b>R$ 5,00</b></article>
            <article><span>Cerveja long neck</span><b>R$ 12,00</b></article>
        </div>
    </section>
</section>
