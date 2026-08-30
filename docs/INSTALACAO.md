# Instalação no XAMPP

## 1. Copiar o projeto

Coloque a pasta do projeto em:

```text
C:\xampp\htdocs\Papa-s-Magleoni
```

## 2. Iniciar o servidor

Abra o XAMPP e inicie:

- Apache;
- MySQL.

## 3. Criar o banco

Abra o phpMyAdmin e importe o arquivo `database.sql`. Ele cria o banco, as três tabelas e os registros de exemplo.

## 4. Configurar a conexão

Copie `config/local.example.php` para `config/local.php`.

Na instalação padrão do XAMPP, a configuração é:

- banco: `papas_magleoni`;
- usuário: `root`;
- senha do banco: vazia;
- porta: `3306`.

Se o seu XAMPP usa outros dados, altere o arquivo `config/local.php`.

## 5. Abrir o projeto

- Site: `http://localhost/Papa-s-Magleoni/`
- Painel: `http://localhost/Papa-s-Magleoni/login.php`
- Usuário do painel: `admin`
- Senha do painel: `admin`

Se aparecer a mensagem “Banco de dados indisponível”, confira se o MySQL está iniciado e se os dados de `config/local.php` estão corretos.

[Voltar ao README](../README.md)
