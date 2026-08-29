# Responsividade e mobile first

A folha pública `assets/css/styles.css` define primeiro a apresentação em telas pequenas. As regras com `min-width` acrescentam colunas e navegação horizontal conforme o espaço disponível.

| Largura | Apresentação |
| --- | --- |
| Abaixo de 760 px | Uma coluna, menu por botão e formulários empilhados |
| A partir de 760 px | Apresentação e cardápio em duas colunas; campos do formulário lado a lado |
| A partir de 961 px | Links do cabeçalho em linha, sem botão de menu |
| A partir de 1020 px | Cardápio em três colunas |

O menu móvel abre por botão e fecha ao selecionar um link ou pressionar Escape. A página atual recebe indicação visual e `aria-current`. A mesma navegação aparece nas cinco páginas públicas.

Imagens e vídeo se ajustam aos seus espaços com `object-fit: cover`. A legenda do vídeo fica dentro do quadro. Os títulos têm tamanhos moderados e os cartões permitem quebra de textos longos.

As preferências de movimento reduzido desativam transições e rolagem suave. O vídeo permanece mudo e em loop, sem controle próprio de pausa, conforme a apresentação solicitada; essa opção é uma limitação de acessibilidade a rever.

Antes da apresentação, conferir o site em celulares reais, teclado e diferentes larguras.
