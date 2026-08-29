# Estrutura atual do site

Esta versão é um site PHP com várias páginas renderizadas no servidor; não é uma SPA.

| Página | Conteúdo |
| --- | --- |
| index.php | Apresentação, vídeo, três primeiras pizzas cadastradas, resumo do projeto, depoimentos, contato e declaração de IA |
| cardapio.php | Todas as pizzas agrupadas por categoria do banco; bebidas demonstrativas fixas |
| sobre.php | História fictícia e quantidade real de sabores |
| diferenciais.php | Informações institucionais |
| contato.php | Contatos fictícios e prévia local de solicitação de reserva |
| login.php | Acesso administrativo |
| crud.php | Criar, consultar, editar e excluir pizzas, categorias e depoimentos |

O menu comum liga as páginas públicas. O rodapé oferece acesso ao painel. A navegação móvel abre por botão e fecha por Escape ou seleção de link. `categorias.php`, `depoimentos.php` e `gerenciar.php` reaproveitam o controlador dos cadastros.

Modelo: categorias (1) → pizzas (N); depoimentos independentes. Ao excluir uma categoria, suas pizzas continuam cadastradas sem categoria. Veja o README para instalar e migrar o banco.
