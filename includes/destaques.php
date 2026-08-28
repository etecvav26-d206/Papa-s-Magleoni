<div class="cards">
<?php foreach (array_slice($pizzas, 0, 3) as $position => $pizza): ?>
    <article class="pizza-highlight">
        <img
            src="<?= e(pizza_image($pizza['imagem'])) ?>"
            alt="<?= e($pizza['nome']) ?>"
            loading="lazy"
        >
        <div>
            <small><?= $position + 1 ?></small>
            <section>
                <h3><?= e($pizza['nome']) ?></h3>
                <p><?= e($pizza['descricao']) ?></p>
            </section>
            <b>
                <?= e(money($pizza['preco'])) ?>
                <i>35 cm</i>
            </b>
        </div>
    </article>
<?php endforeach; ?>
<?php if (!$pizzas): ?><p>Nosso cardápio está sendo atualizado. Volte em breve.</p><?php endif; ?>
</div>
