# Papa's Magleoni

**Sistemas Web · 2D · Etec VAV · 2026**

Site de uma pizzaria fictícia com cardápio dinâmico e painel administrativo. Desenvolvido em **PHP, PDO e MySQL/MariaDB**, com HTML, CSS e JavaScript, para execução local pelo **XAMPP**. Sem dependências de npm ou frameworks.

## Navegue pela documentação

| Documento | Conteúdo |
| --- | --- |
| [Instalação no XAMPP](docs/INSTALACAO.md) | Configuração, importação do banco, migração e senha administrativa |
| [Declaração de IA](docs/DECLARACAO-IA.md) | Ferramenta, partes do trabalho, finalidades e validação |
| [Planejamento](planejamento/01-tema-e-proposta.md) | Tema, público, identidade visual e estrutura do site |

## Funcionalidades

- **Pizzas:** cadastrar, consultar, editar e excluir nome, descrição, categoria, preço, selo e imagem.
- **Categorias:** organizar o cardápio; excluir uma categoria preserva suas pizzas como “Sem categoria”.
- **Depoimentos:** gerenciar cliente, texto e nota, com exibição na página inicial.
- **Administração:** login, hash de senha, sessão com expiração por inatividade, proteção CSRF e validação no servidor.
- **Site:** páginas Início, Cardápio, A casa, Diferenciais e Contato com a mesma navegação e rodapé; menu móvel; vídeo automático, mudo e em loop.
- **Banco:** dados de exemplo e migração que preserva os registros da estrutura anterior.

O cardápio, os destaques e os depoimentos consultam o banco por PDO. Nomes de tabelas vêm de uma lista fixa; entradas de formulários usam parâmetros nas consultas e escape ao serem exibidas no HTML.

## Começar

1. Coloque a pasta do projeto em `C:\xampp\htdocs\Papa-s-Magleoni` e inicie Apache e MySQL no XAMPP.
2. Copie `config/local.example.php` para `config/local.php` e ajuste o acesso ao banco.
3. Em banco novo, importe `database.sql` pelo phpMyAdmin. Para banco existente, faça backup e siga a [migração](docs/INSTALACAO.md).
4. Para a demonstração local, o exemplo já configura usuário **admin** e senha **admin**. Para trocar, use `php scripts/gerar-senha.php` e atualize `ADMIN_PASSWORD_HASH`.
5. Acesse [o site local](http://localhost/Papa-s-Magleoni/) ou [o painel](http://localhost/Papa-s-Magleoni/login.php).

**Acesso demonstrativo: admin / admin. Use somente em ambiente local.** Antes de publicar na internet, substitua a senha por uma exclusiva e forte. Nunca envie `config/local.php`, senhas, logs ou dados pessoais ao GitHub. Se a pasta ou o banco já existirem, faça backup antes de alterar qualquer conteúdo.

## Organização dos arquivos

```text
Papa-s-Magleoni/
├── index.php, cardapio.php, sobre.php, diferenciais.php, contato.php
├── login.php, logout.php, crud.php
├── gerenciar.php, categorias.php, depoimentos.php
├── cadastro.php, editar.php, excluir.php  # rotas de compatibilidade
├── assets/
│   ├── css/                             # estilos públicos e administrativos
│   ├── fonts/                           # fontes originais e licenças
│   └── js/                              # navegação e interações
├── config/                              # conexão PDO e exemplo de configuração
├── includes/                            # cabeçalho/rodapé, consultas e componentes
├── docs/                                # instalação, testes, entrega e IA
├── planejamento/                        # proposta acadêmica
├── images/, videos/                     # mídias utilizadas pelo site
├── imagens/, logo/, referencias/        # materiais de identidade e referências
├── scripts/                             # migração e geração de hash da senha
├── database.sql
├── .gitignore, .gitattributes
└── LICENSE
```

As imagens mantêm seus caminhos para preservar a compatibilidade com os registros existentes no banco. Cabeçalho e rodapé públicos são compartilhados em `includes/header_site.php` e `includes/footer_site.php`, evitando diferenças entre páginas.

## Estado e limites

Os três CRUDs foram verificados localmente. A versão preparada ainda precisa de revisão do grupo e demonstração no ambiente da apresentação.

Contatos, depoimentos iniciais e empresa são fictícios. A reserva é apenas uma prévia no navegador, sem envio ou armazenamento. Bebidas são conteúdo fixo. Não há carrinho, pagamento, upload de imagens, recuperação de senha ou múltiplos usuários. A configuração local não deve ser exposta à internet como sistema comercial.

## Integrantes

Contribuições registradas na documentação original; este registro não substitui a participação e a validação de cada integrante:

| Integrante | Área registrada |
| --- | --- |
| Otávio Biazzi | Frontend, banco de dados e integração da logo |
| Laura Gonçalves da Cruz | Identidade visual, planejamento e Markdown |
| Pedro Godoi (phznorte777) | Backend PHP/PDO, CRUD e validação |
| Pedro Miranda (M1randaPHM) | Layout, responsividade e testes |

## DECLARAÇÃO DE USO DE INTELIGÊNCIA ARTIFICIAL

Foi utilizado **Codex (OpenAI)** para auxiliar na identificação de erros em funções PHP, na revisão dos três CRUDs, na implementação de melhorias e nos testes do Papa's Magleoni. A assistência também incluiu pesquisa dos requisitos, ajustes de navegação e organização da documentação. O **Gemini (Google)** auxiliou na produção do vídeo da página inicial, e o **ChatGPT Images 2** auxiliou na criação da logo oficial.

Durante essa revisão assistida, foram realizadas verificações automatizadas e inspeção local. A revisão, reprodução dos testes e aprovação pelos integrantes ainda precisam ser realizadas e registradas pelo grupo, responsável por compreender e explicar o projeto.

A [declaração completa](docs/DECLARACAO-IA.md) relaciona as partes do trabalho, as finalidades e as verificações. Um resumo recolhível também está disponível ao final da página Início do site. O nome exato do modelo usado no vídeo deve ser conferido no histórico da ferramenta.

## Licença e fontes

Consulte [LICENSE](LICENSE) e [referências do projeto](referencias/referencias.md). A origem e a licença das imagens e do vídeo existentes devem ser conferidas pelo grupo antes de publicação pública. Os requisitos acadêmicos estão no [repositório do professor](https://github.com/ronildo-ferreira/ronildo-human-layer/tree/main/01-EtecVAV/2D/sweb-sistemas-web).
