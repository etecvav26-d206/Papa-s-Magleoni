# DECLARAÇÃO DE USO DE INTELIGÊNCIA ARTIFICIAL

**Projeto:** [Papa's Magleoni](https://github.com/etecvav26-d206/Papa-s-Magleoni)  
**Disciplina:** Sistemas Web — 2D  
**Registro da revisão:** 28 de agosto de 2026  
**Ferramentas de apoio:** Codex (OpenAI), na revisão técnica; Gemini (Google), no vídeo; ChatGPT Images 2, na logo oficial.

## Como a IA participou

A IA da OpenAI, por meio do Codex, foi utilizada durante o desenvolvimento do projeto para auxiliar na identificação de erros em funções PHP, na revisão dos cadastros de pizzas, categorias e depoimentos e na implementação de melhorias. Também auxiliou na pesquisa dos requisitos, nos ajustes de navegação e na organização da documentação.

O Gemini (Google) foi utilizado para auxiliar na produção do vídeo de montagem da pizza exibido na página inicial.

O ChatGPT Images 2 foi utilizado para auxiliar na criação da logo oficial da Papa's Magleoni. A imagem original do projeto foi preservada e aplicada no cabeçalho, rodapé e área administrativa.

## Partes do trabalho e finalidades

| Parte do projeto | Uso da IA | Verificação registrada |
| --- | --- | --- |
| `crud.php` — pizzas, categorias e depoimentos | Apoio à identificação do erro na montagem dos parâmetros de edição e à implementação da correção; revisão das operações de cadastro, consulta e exclusão | Testes HTTP de criação, edição, consulta e exclusão nos três cadastros |
| Formulários administrativos | Análise de entradas inválidas e ajustes de campos opcionais, limite de caracteres, preço, categoria, imagem e nota | Casos com valores fora do limite, formatos incorretos e registros inexistentes |
| `includes/auth.php`, `login.php` e `logout.php` | Auxílio à implementação de autenticação, sessão, proteção CSRF e uso de hash para a senha | Verificações de acesso anônimo, token inválido, saída e bloqueio após logout |
| `includes/catalogo.php` e componentes públicos | Apoio à correção da integração do banco ao cardápio, aos destaques e aos depoimentos | Conferência de alterações do painel refletidas no site e dos preços exibidos |
| `scripts/migrar.php` e `database.sql` | Auxílio à preparação da atualização da estrutura do banco e dos dados iniciais | Importação e migração repetidas em banco isolado, com preservação de dados existentes |
| Cabeçalho, rodapé e arquivos de interface | Padronização da navegação, organização de componentes compartilhados e ajustes de apresentação solicitados durante a revisão | Conferência das rotas e inspeção da interface no navegador |
| Documentação do repositório | Consulta às orientações do professor; organização das instruções de instalação, funcionamento, testes e entrega | Comparação com os arquivos do projeto e com os resultados registrados |
| `images/logo-magleoni.png` | Auxílio do ChatGPT Images 2 na criação da logo oficial | Arquivo conferido com a logo do repositório oficial; imagem preservada sem redesenho |
| `videos/montagem-margherita.mp4` | Apoio do Gemini à produção do vídeo, conforme relato do responsável pelo projeto | Reprodução conferida no navegador; origem, termos de uso e adequação do conteúdo a revisar pelo grupo |

O apoio foi utilizado na produção e no ajuste de trechos de código, na elaboração de testes e na organização de explicações. Esse registro delimita a assistência recebida em partes específicas do projeto, sem atribuir à ferramenta a produção integral do trabalho.

## Validação e responsabilidade

Durante a revisão assistida, foram executadas verificações automatizadas em ambiente local, com dados demonstrativos e banco separado. Essas verificações não substituem a análise dos integrantes nem representam uma validação humana já concluída.

Antes da entrega, cabe ao grupo revisar os ajustes, reproduzir os testes no ambiente da apresentação, avaliar as sugestões e registrar sua própria validação. Cada integrante deve compreender o projeto como um todo e ser capaz de explicar os CRUDs, as consultas PDO, o relacionamento entre tabelas e as principais decisões de implementação, com maior domínio de sua contribuição direta.

O grupo permanece responsável pela seleção, adaptação e entrega do conteúdo. A assistência da ferramenta não comprova contribuição individual, não substitui fontes de pesquisa e não garante ausência de erros ou segurança para uso comercial.

## Referência

[Política de Uso de Inteligência Artificial em Atividades Acadêmicas — Ronildo Ferreira](https://github.com/ronildo-ferreira/ronildo-human-layer/blob/main/01-EtecVAV/politica-de-uso-de-ia.md), consultada em 28/08/2026. A política orienta declarar ferramenta, etapa, finalidade e validação, mantendo o título desta seção.
