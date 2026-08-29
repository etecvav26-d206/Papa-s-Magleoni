# Instalação no XAMPP


### 1. Preparar o projeto

Extraia a pasta `Papa-s-Magleoni` do ZIP para `C:\xampp\htdocs\Papa-s-Magleoni`. Se essa pasta já existir, faça backup e use outra pasta para não sobrescrever seu trabalho.

No painel do XAMPP, inicie **Apache** e **MySQL**. O botão MySQL pode executar MariaDB; ambos usam o driver `pdo_mysql` deste projeto. O PHP precisa das extensões PDO e pdo_mysql. Não é necessário Node, npm ou Docker.

### 2. Configurar o acesso ao banco

Copie `config/local.example.php` para `config/local.php` e ajuste host, porta, banco, usuário e senha. Para uma instalação local padrão: banco `papas_magleoni`, porta `3306`, usuário `root` e senha vazia. Se seu XAMPP tiver senha ou porta diferente, informe os valores reais.

`config/local.php` é ignorado pelo Git e não deve ser enviado ao GitHub. Variáveis de ambiente de mesmo nome têm prioridade sobre esse arquivo.

### 3. Instalar um banco NOVO

Abra o phpMyAdmin pelo botão **Admin** ao lado do MySQL e importe `database.sql`. O arquivo cria o banco `papas_magleoni`, as três tabelas e exemplos: 7 pizzas, 3 categorias e 2 depoimentos.

Se você já tem o banco da versão oficial, não use esta etapa como migração: siga a seção seguinte. `CREATE TABLE IF NOT EXISTS` não adiciona colunas às tabelas que já existem.

### 4. Atualizar um banco ANTIGO

Exporte um backup pelo phpMyAdmin antes de qualquer migração. Confirme que `config/local.php` aponta para o banco que você deseja atualizar. Na pasta do projeto, execute no PowerShell:

```powershell
& C:\xampp\php\php.exe .\scripts\migrar.php
```

O script cria as tabelas ausentes, acrescenta `categoria_id` e `criado_em` à tabela antiga de pizzas, instala a chave estrangeira e insere exemplos que ainda não existem. Não muda os nomes, preços e descrições já cadastrados. Pizzas antigas permanecem sem categoria até serem classificadas no painel. A migração pode ser repetida sem duplicar os exemplos; ela não apaga tabelas. Alterações estruturais do MySQL não são integralmente transacionais: o backup continua indispensável.

### 5. Definir a senha do painel

Ao copiar `config/local.example.php`, o acesso de demonstração fica **admin / admin**. A senha é armazenada como hash, não como texto puro. Use essa credencial somente no ambiente local da apresentação.

Para trocar por uma senha exclusiva antes de qualquer publicação, execute:

```powershell
& C:\xampp\php\php.exe .\scripts\gerar-senha.php
```

Digite uma senha exclusiva com pelo menos 12 caracteres. Ela fica visível no terminal; não compartilhe a tela enquanto digita. Copie **somente o hash gerado** para `ADMIN_PASSWORD_HASH` no arquivo `config/local.php`. Defina `ADMIN_USER` nesse mesmo arquivo. O gerador exige 12 caracteres para novas senhas; a credencial curta do exemplo é exclusiva da demonstração.

### 6. Abrir

- Site: [localhost/Papa-s-Magleoni](http://localhost/Papa-s-Magleoni/).
- Painel: [localhost/Papa-s-Magleoni/login.php](http://localhost/Papa-s-Magleoni/login.php).

Não abra `index.php` por duplo clique: o arquivo precisa ser processado pelo servidor PHP. Se a porta do Apache não for 80, ajuste a URL.

Se aparecer “Banco de dados indisponível”, confira MySQL iniciado, nome do banco, porta, credenciais e extensão pdo_mysql. Se o painel informar que o acesso não está configurado, preencha o hash da senha.


[Voltar ao README](../README.md)

## Login e abas administrativas

O login é compartilhado entre as abas do mesmo navegador. Após entrar uma vez, pizzas, categorias e depoimentos não pedem senha novamente. A página de login redireciona ao painel quando a sessão está válida. O site público não exige login.

Use **Sair** para encerrar o acesso em todas as abas dessa sessão; páginas já abertas podem continuar visíveis até serem atualizadas, mas novas consultas e alterações exigem login. A sessão expira após 30 minutos sem atividade administrativa. Alterar o usuário ou o hash da senha invalida as sessões anteriores na próxima requisição.
