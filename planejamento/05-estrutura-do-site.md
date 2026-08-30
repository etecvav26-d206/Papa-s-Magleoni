# Estrutura do site

## Páginas públicas

| Página | Conteúdo |
| --- | --- |
| `index.php` | Apresentação, vídeo, pizzas em destaque, depoimentos e contato |
| `cardapio.php` | Pizzas separadas por categoria |
| `sobre.php` | História fictícia da pizzaria |
| `diferenciais.php` | Características da pizzaria |
| `contato.php` | Contatos e demonstração de reserva |

## Área administrativa

| Página | Função |
| --- | --- |
| `login.php` | Entrada no painel |
| `gerenciar.php` | CRUD de pizzas |
| `categorias.php` | CRUD de categorias |
| `depoimentos.php` | CRUD de depoimentos |

As páginas públicas compartilham cabeçalho e rodapé. Os três cadastros administrativos usam as operações de `crud.php`.

No banco, uma categoria pode possuir várias pizzas. Os depoimentos são independentes.
