<?php if ($testimonials): ?>
    <section class="customer-reviews" id="depoimentos">
        <p class="eyebrow">AVALIAÇÕES</p>
        <h2>Depoimentos</h2>
        <div class="reviews-grid">
            <?php foreach ($testimonials as $testimonial): ?>
                <blockquote>
                    <span aria-label="Nota <?= (int) $testimonial['nota'] ?> de 5">
                        <?= str_repeat('★', max(0, min(5, (int) $testimonial['nota']))) ?>
                    </span>
                    <p><?= e($testimonial['texto']) ?></p>
                    <cite><?= e($testimonial['nome']) ?></cite>
                </blockquote>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
