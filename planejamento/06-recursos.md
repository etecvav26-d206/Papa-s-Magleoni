# Recursos — estado verificado em 28/08/2026

## Implementados

- Três CRUDs em PHP/PDO: pizzas, categorias e depoimentos.
- Login administrativo com hash de senha, sessão com expiração por inatividade e proteção CSRF.
- Validação no servidor para tipos, limites, preço, categoria existente, imagem permitida e nota de 1 a 5.
- Escape de conteúdo ao exibir dados no HTML.
- Cardápio agrupado por categoria, destaques e depoimentos consultados no banco.
- Vídeo local automático, mudo e em loop, sem controles, na página inicial; imagens locais do cardápio e estados vazios. A reprodução depende das permissões de autoplay do navegador.
- Menu compartilhado com estado acessível e Escape; animações CSS respeitam a preferência por movimento reduzido.
- Prévia de reserva apenas no navegador, explicitamente sem envio ou persistência.

## Não implementados / não devem ser apresentados como concluídos

- Envio real de reservas, e-mail ou integração de pedidos com WhatsApp.
- Carrinho, pagamentos, upload de imagem, gestão de usuários e CRUD de bebidas.
- Página de demonstração de criptografia exigida em uma atividade separada.
- Mapa, gráficos, seletores animados de pizza e contadores animados da documentação antiga.
- Proteção contra força bruta, papéis de usuário e infraestrutura de produção.

O site usa Playfair Display e DM Sans hospedadas localmente, sem depender de conexão com Google Fonts. As imagens e o vídeo precisam de revisão de licença e autoria pelo grupo antes de publicação pública. O uso do Gemini no vídeo, informado pelo responsável, está registrado na declaração de IA. O foco desta revisão é demonstração local escolar, não operação comercial.
