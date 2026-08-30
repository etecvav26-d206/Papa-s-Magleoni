# Papa's Magleoni

**Sistemas Web · Turma 2D · Etec VAV · 2026**

Papa's Magleoni é o site de uma pizzaria fictícia criado para a disciplina de Sistemas Web. O projeto apresenta a pizzaria e seu cardápio para o cliente e possui uma área administrativa com três CRUDs completos.

## Requisitos do trabalho

O projeto foi organizado de acordo com as orientações da turma 2D:

- página `index.php` visível para o cliente;
- três CRUDs administrativos: pizzas, categorias e depoimentos;
- conexão com banco de dados usando PHP, PDO e MySQL/MariaDB;
- layout responsivo seguindo o conceito Mobile First;
- planejamento do tema, público-alvo, identidade visual e páginas;
- organização do projeto e participação dos integrantes pelo GitHub.

## Funcionalidades

- Site com as páginas Início, Cardápio, A casa, Diferenciais e Contato.
- Cardápio carregado do banco e separado por categorias.
- Vídeo automático, mudo e em loop na página inicial.
- Menu adaptado para celular.
- Login da área administrativa.
- Cadastro, consulta, edição e exclusão de pizzas.
- Cadastro, consulta, edição e exclusão de categorias.
- Cadastro, consulta, edição e exclusão de depoimentos.

## Tecnologias

- PHP e PDO
- MySQL ou MariaDB
- HTML
- CSS
- JavaScript

O projeto não usa frameworks ou npm.

## Como executar

1. Coloque a pasta em `C:\xampp\htdocs\Papa-s-Magleoni`.
2. Inicie Apache e MySQL no XAMPP.
3. Importe `database.sql` pelo phpMyAdmin.
4. Copie `config/local.example.php` para `config/local.php`.
5. Confira os dados do banco em `config/local.php`.
6. Acesse `http://localhost/Papa-s-Magleoni/`.

O acesso de demonstração ao painel é:

- usuário: `admin`
- senha: `admin`

Mais detalhes estão em [docs/INSTALACAO.md](docs/INSTALACAO.md).

## Banco de dados

O arquivo `database.sql` cria o banco `papas_magleoni` e as tabelas:

- `pizzas`;
- `categorias`;
- `depoimentos`.

O relacionamento entre categorias e pizzas permite que uma categoria tenha várias pizzas. O arquivo também inclui alguns registros para demonstração.

## Estrutura do projeto

```text
Papa-s-Magleoni/
├── css/                  # estilos do site e do painel
├── js/                   # menu, reserva demonstrativa e vídeo
├── fonts/                # fontes e licenças
├── images/               # logo e imagens das pizzas
├── videos/               # vídeo da página inicial
├── config/               # configuração e conexão com o banco
├── includes/             # partes compartilhadas do PHP
├── docs/                 # instalação e declaração de IA
├── planejamento/         # etapas do planejamento solicitado
├── referencias/          # fontes consultadas
├── index.php             # página inicial
├── cardapio.php          # cardápio público
├── sobre.php             # página sobre a pizzaria
├── diferenciais.php      # diferenciais da pizzaria
├── contato.php           # contato e reserva demonstrativa
├── gerenciar.php         # CRUD de pizzas
├── categorias.php        # CRUD de categorias
├── depoimentos.php       # CRUD de depoimentos
├── crud.php              # operações usadas pelos três cadastros
└── database.sql          # estrutura e dados iniciais do banco
```

## Planejamento

Os documentos da pasta [planejamento](planejamento/) apresentam:

- tema e proposta;
- público-alvo;
- aplicação de Mobile First;
- identidade visual;
- páginas e navegação;
- recursos utilizados.

## Integrantes

| Integrante | Participação principal |
| --- | --- |
| Otávio Biazzi | Frontend, banco de dados e integração da logo |
| Pedro Henrique Miranda | Layout, responsividade e CRUD de pizzas |
| Laura Cristina Cruz | Identidade visual, planejamento e páginas públicas |
| Pedro Henrique Dalle Molle Godoi | PHP, PDO, categorias e depoimentos |

## DECLARAÇÃO DE USO DE INTELIGÊNCIA ARTIFICIAL

Durante o trabalho, usamos o Codex para tirar dúvidas, localizar erros e revisar os CRUDs. Também usamos o Gemini como apoio no vídeo e o ChatGPT Images 2 como apoio na criação da logo. Depois, conferimos o código, as páginas, o banco de dados e os três CRUDs no ambiente local.

A declaração completa está em [docs/DECLARACAO-IA.md](docs/DECLARACAO-IA.md) e também aparece de forma resumida na página inicial.

## Referências

- [Orientações da turma 2D](https://github.com/ronildo-ferreira/ronildo-human-layer/tree/main/01-EtecVAV/2D/sweb-sistemas-web)
- [Política de uso de IA](https://github.com/ronildo-ferreira/ronildo-human-layer/blob/main/01-EtecVAV/politica-de-uso-de-ia.md)
- [Referências técnicas do projeto](referencias/referencias.md)
