<?php
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function pizza_images(): array
{
    return [
        'images/pizza-margherita.png' => 'Margherita',
        'images/pizza-pepperoni.png' => 'Pepperoni',
        'images/pizza-quatro-queijos.png' => 'Quatro queijos',
        'images/pizza-portuguesa.png' => 'Portuguesa',
        'images/pizza-especial.png' => 'Especial da casa',
        'images/pizza-calzone.png' => 'Calzone',
    ];
}

function pizza_image($path): string
{
    return isset(pizza_images()[$path]) ? $path : 'images/pizza-margherita.png';
}

function money($value): string
{
    return 'R$ ' . number_format((float) $value, 2, ',', '.');
}
