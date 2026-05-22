# 7️⃣ Recursos do Site

---

## 🛠️ Recursos Utilizados e Planejados

O site da Papa's Magleoni utiliza diversos recursos modernos de desenvolvimento web para criar uma experiência completa e profissional.

---

## ✅ Recursos Já Implementados

### 1. Menu Responsivo (Hambúrguer)

O site possui um menu que se adapta ao tamanho da tela:

- **Desktop**: links de navegação visíveis na horizontal
- **Mobile**: botão hambúrguer (3 barras) que abre o menu

```css
.menu-toggle { display: none; }

@media(max-width: 900px) {
  .nav-links { display: none; }
  .menu-toggle { display: block; }
}
```

---

### 2. Galeria de Imagens Interativa

O hero possui um **seletor de pizzas** com 3 opções:

- Pepperoni
- Margherita
- Quatro Queijos

O usuário clica em um thumbnail circular e a imagem principal troca com uma **animação de fade + rotate**, criando uma experiência interativa.

---

### 3. Animações e Micro-interações

| Animação | Elemento | Efeito |
|----------|----------|--------|
| `fadeInUp` | Hero, seções | Elementos aparecem de baixo para cima ao carregar |
| `float-plate` | Pizza principal | Pizza flutuando suavemente (up/down) |
| `glow-pulse` | Glow da pizza | Brilho pulsante atrás da pizza |
| `pulse-badge` | Badge "Pizzaria Artesanal" | Pulsação sutil no box-shadow |
| `bounce` | Seta de scroll | Seta quicando para baixo |
| `float-el` | Elementos decorativos | Ícones flutuando com rotação suave |
| `reveal` | Todas as seções | Elementos aparecem ao entrar na viewport (Intersection Observer) |
| Hover cards | Cards do cardápio | Elevação + zoom na imagem |
| Hover botões | Botões CTA | Elevação + mudança de cor |
| Hover navbar | Links | Underline animada |

---

### 4. Contadores Animados

Na seção "Sobre", os números são animados de 0 até o valor final:

- **15+** Anos de Tradição
- **30+** Sabores no Cardápio
- **50k+** Pizzas Servidas

Implementado com **Intersection Observer** + contagem progressiva em JavaScript.

---

### 5. Formulário de Contato e Reservas

Formulário completo com os campos:

| Campo | Tipo | Obrigatório |
|-------|------|-------------|
| Nome | `text` | Sim |
| Telefone | `tel` | Sim |
| E-mail | `email` | Não |
| Data | `date` | Não |
| Pessoas | `select` (1-2, 3-4, 5-6, 7+) | Não |
| Mensagem | `textarea` | Não |

O formulário possui **validação HTML5** e inputs com efeito de focus (borda vermelha).

---

### 6. Glassmorphism na Navbar

A navbar utiliza o efeito de vidro fosco (glassmorphism):

```css
.navbar {
  background: rgba(30, 61, 43, 0.95);
  backdrop-filter: blur(10px);
}
```

---

### 7. Scroll Suave

Navegação suave entre seções usando CSS nativo:

```css
html {
  scroll-behavior: smooth;
}
```

---

### 8. Lazy Loading de Imagens

Imagens do cardápio utilizam carregamento preguiçoso para melhorar a performance:

```html
<img src="pizza.png" loading="lazy" alt="Pizza">
```

---

### 9. Link Direto para WhatsApp

Botão de CTA com link direto para iniciar uma conversa no WhatsApp:

```html
<a href="https://wa.me/5511999999999?text=Olá! Gostaria de fazer um pedido.">
  PEDIR PELO WHATSAPP
</a>
```

---

### 10. Ícones SVG Inline

Todos os ícones do site são **SVG inline** (sem dependência de bibliotecas externas):

- Ícones de navegação social (Instagram, Facebook, WhatsApp)
- Ícones de contato (localização, telefone, relógio)
- Ícones decorativos (chama, planta, coração, relógio)
- Ícone da logo (forno a lenha clássico)

---

## 🔮 Recursos Planejados (Futuro)

### 1. Painel Administrativo (CRUD)

Sistema de login para gerenciar o cardápio:

- **C**reate — Adicionar novos sabores
- **R**ead — Visualizar itens do cardápio
- **U**pdate — Editar preços, descrições e imagens
- **D**elete — Remover itens do cardápio

### 2. Mapa Interativo

Integração com Google Maps para exibir a localização da pizzaria na seção de contato.

### 3. Sistema de Pedidos Online

Carrinho de compras integrado com opção de finalizar pelo WhatsApp ou por pagamento online.

### 4. Gráficos de Avaliação

Gráficos visuais mostrando a satisfação dos clientes e os sabores mais pedidos.

### 5. Vídeos

Vídeo institucional mostrando o processo de preparo das pizzas no forno a lenha.
