<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo — Papa's Magleoni</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="images/favicon.svg">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos adicionais específicos para o CRUD (estética limpa/glassmorphism do taste-skill) */
        .admin-main {
            max-width: 1200px;
            margin: 120px auto 60px;
            padding: 0 24px;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }
        .admin-title {
            font-size: 2.5rem;
            color: var(--cream);
            text-shadow: 2px 2px 0 var(--red);
        }
        .admin-subtitle {
            font-size: 0.9rem;
            opacity: 0.75;
            margin-top: 4px;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 32px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1), var(--shadow);
            backdrop-filter: blur(12px);
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            color: var(--cream);
            margin-top: 20px;
        }
        .admin-table th {
            text-align: left;
            padding: 16px;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.2rem;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--red);
            color: var(--red);
        }
        .admin-table td {
            padding: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            font-size: 0.9rem;
        }
        .admin-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }
        .pizza-thumb {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        /* Botões adicionais */
        .btn-sm {
            padding: 8px 16px;
            font-size: 0.9rem;
            border-radius: 20px;
            letter-spacing: 1px;
        }
        .btn-danger {
            background: var(--red);
            color: var(--cream);
            border: none;
            transition: all 0.3s;
        }
        .btn-danger:hover {
            background: var(--red-dark);
            transform: translateY(-2px);
        }
        .btn-outline-admin {
            background: transparent;
            color: var(--cream);
            border: 1px solid rgba(255,255,255,0.3);
            transition: all 0.3s;
        }
        .btn-outline-admin:hover {
            background: rgba(255,255,255,0.08);
            border-color: var(--cream);
        }
        /* Formulários */
        .form-grid-admin {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        @media(max-width: 768px) {
            .form-grid-admin {
                grid-template-columns: 1fr;
            }
        }
        .form-group-admin {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .form-group-admin.full {
            grid-column: 1 / -1;
        }
        .form-label-admin {
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: var(--cream);
        }
        .form-control-admin {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 12px 16px;
            color: var(--cream);
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        .form-control-admin:focus {
            outline: none;
            border-color: var(--red);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 10px rgba(178, 43, 43, 0.2);
        }
        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .alert-success {
            background: rgba(40, 167, 69, 0.15);
            border: 1px solid #28a745;
            color: #28a745;
        }
        .admin-cards-container {
            display: none;
        }
        @media(max-width: 768px) {
            .desktop-table-wrapper {
                display: none;
            }
            .admin-cards-container {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
                margin-top: 20px;
            }
            .admin-mobile-card {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.06);
                border-radius: 12px;
                padding: 20px;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }
            .admin-mobile-card-header {
                display: flex;
                align-items: center;
                gap: 16px;
            }
            .admin-mobile-card-actions {
                display: flex;
                gap: 10px;
                margin-top: 8px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar" style="background: rgba(30,61,43,0.98);">
  <a href="index.php" class="nav-logo">
    PAPA'S <span class="accent">MAGLEONI</span> <span style="font-size: 0.9rem; font-family:'Montserrat',sans-serif; font-weight: 500; opacity: 0.6; margin-left: 10px;">(PAINEL ADMIN)</span>
  </a>
  <ul class="nav-links">
    <li><a href="index.php">Ver Site</a></li>
    <li><a href="gerenciar.php" style="color: var(--red); font-weight:700;">Gerenciar Pizzas</a></li>
    <li><a href="cadastro.php" style="background: var(--red); color: var(--cream); padding: 4px 12px; border-radius: 15px; border: 1px solid var(--red);">Nova Pizza</a></li>
  </ul>
</nav>
