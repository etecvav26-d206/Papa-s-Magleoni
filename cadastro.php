<?php
require_once 'config/conexao.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome      = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco     = $_POST['preco'] ?? '';
    $badge     = $_POST['badge'] ?? '';
    $imagem    = $_POST['imagem'] ?? '';

    // Tratar badge vazio como NULL
    if (empty($badge)) {
        $badge = null;
    }

    if (!empty($nome) && !empty($descricao) && !empty($preco) && !empty($imagem)) {
        try {
            $sql = "INSERT INTO pizzas (nome, descricao, preco, badge, imagem) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $descricao, $preco, $badge, $imagem]);

            header("Location: gerenciar.php?msg=cadastrado");
            exit;
        } catch (\PDOException $e) {
            $error = "Erro ao cadastrar no banco de dados: " . $e->getMessage();
        }
    } else {
        $error = "Por favor, preencha todos os campos obrigatórios.";
    }
}

require_once 'includes/header_admin.php';
?>

<main class="admin-main">
    <section class="admin-header">
        <div>
            <h1 class="admin-title">Cadastrar Nova Pizza</h1>
            <p class="admin-subtitle">Formulário para adicionar um novo sabor ao cardápio.</p>
        </div>

        <a class="btn-outline-admin btn-sm" href="gerenciar.php" style="text-decoration:none;">
            Voltar ao Painel
        </a>
    </section>

    <?php if (!empty($error)): ?>
        <div class="alert" style="background: rgba(220, 53, 69, 0.15); border: 1px solid #dc3545; color: #dc3545;">
            ⚠️ <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <section class="glass-card">
        <form action="cadastro.php" method="post">
            <div class="form-grid-admin">
                <div class="form-group-admin full">
                    <label class="form-label-admin" for="nome">Nome da Pizza *</label>
                    <input class="form-control-admin" type="text" id="nome" name="nome" placeholder="Ex: Portuguesa Especial" required>
                </div>

                <div class="form-group-admin full">
                    <label class="form-label-admin" for="descricao">Descrição dos Ingredientes *</label>
                    <textarea class="form-control-admin" id="descricao" name="descricao" rows="3" placeholder="Ex: Molho de tomate fresco, mussarela, presunto cozido, ovos, cebola roxa, azeitonas pretas e orégano." required style="resize:vertical;"></textarea>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="preco">Preço (R$) *</label>
                    <input class="form-control-admin" type="number" step="0.01" min="0" id="preco" name="preco" placeholder="0.00" required>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="badge">Selo / Badge (Opcional)</label>
                    <input class="form-control-admin" type="text" id="badge" name="badge" placeholder="Ex: Favorita, Novidade, Especial">
                </div>

                <div class="form-group-admin full">
                    <label class="form-label-admin" for="imagem">Escolha a Imagem da Pizza *</label>
                    <select class="form-control-admin" id="imagem" name="imagem" required>
                        <option value="" disabled selected>Selecione uma imagem pré-carregada...</option>
                        <option value="images/pizza-margherita.png">pizza-margherita.png (Margherita)</option>
                        <option value="images/pizza-pepperoni.png">pizza-pepperoni.png (Pepperoni)</option>
                        <option value="images/pizza-quatro-queijos.png">pizza-quatro-queijos.png (Quatro Queijos)</option>
                        <option value="images/pizza-calzone.png">pizza-calzone.png (Calzone)</option>
                        <option value="images/pizza-portuguesa.png">pizza-portuguesa.png (Portuguesa)</option>
                        <option value="images/pizza-especial.png">pizza-especial.png (Especial da Casa)</option>
                    </select>
                </div>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:16px; margin-top:32px;">
                <a class="btn-outline-admin btn-sm" href="gerenciar.php" style="text-decoration:none; padding:12px 30px;">Cancelar</a>
                <button class="btn-primary btn-sm" type="submit" style="padding:12px 30px; font-size:1rem; cursor:pointer;">Salvar Pizza</button>
            </div>
        </form>
    </section>
</main>

<?php require_once 'includes/footer_admin.php'; ?>

<!-- Validação de seleção corrigida por phznorte777 -->
