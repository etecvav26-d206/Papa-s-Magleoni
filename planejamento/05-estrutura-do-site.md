# 6️⃣ Estrutura Inicial do Site

---

## 📄 Páginas do Site

O site da Papa's Magleoni Pizzaria é um **Single Page Application (SPA)** — ou seja, tudo está em uma única página com navegação por seções via âncoras. Isso garante uma experiência fluida e rápida para o usuário.

---

## 🗺️ Mapa do Site

```
Papa's Magleoni Pizzaria
│
├── 🏠 Início (Hero)
│   ├── Logo e nome da marca
│   ├── Slogan
│   ├── Imagem de pizza com seletor interativo
│   ├── Pills de diferenciais (Forno a Lenha, Ingredientes Frescos, Fermentação 72h)
│   └── Botões de ação (Ver Cardápio / Fazer Pedido)
│
├── 📖 Sobre
│   ├── Imagem da pizza margherita
│   ├── Texto sobre a história da pizzaria
│   ├── Missão e valores
│   └── Estatísticas animadas (15+ anos, 30+ sabores, 50k+ pizzas)
│
├── 🍕 Cardápio
│   ├── Card: Margherita — R$ 42,90 (Clássica)
│   ├── Card: Pepperoni — R$ 48,90 (Favorita)
│   ├── Card: Quatro Queijos — R$ 52,90
│   ├── Card: Especial da Casa — R$ 58,90 (Especial)
│   ├── Card: Portuguesa — R$ 46,90
│   └── Card: Calzone Recheado — R$ 44,90 (Novidade)
│
├── ⭐ Diferenciais
│   ├── Forno a Lenha (450°C)
│   ├── Ingredientes Frescos (produtores locais)
│   ├── Fermentação Natural (72 horas)
│   └── Feito com Amor (artesanal)
│
├── 💬 Depoimentos
│   ├── Depoimento 1 — Maria S. (★★★★★)
│   ├── Depoimento 2 — João P. (★★★★★)
│   └── Depoimento 3 — Ana L. (★★★★★)
│
├── 📢 Banner CTA
│   └── "Fome de Pizza?" → Botão WhatsApp
│
├── 📞 Contato
│   ├── Informações (endereço, telefone, horário)
│   └── Formulário de reservas (nome, telefone, e-mail, data, pessoas, mensagem)
│
└── 🔗 Footer
    ├── Logo
    ├── Slogan
    ├── Redes sociais (Instagram, Facebook, WhatsApp)
    └── Copyright
```

---

## 📋 Detalhamento de Cada Seção

### 1. Início (Hero) — `#inicio`

A seção principal é a **primeira impressão** do site. Contém:

- **Coluna de texto** (esquerda): badge "Pizzaria Artesanal", título com o nome da marca, subtítulo, slogan, pills com diferenciais e botões de ação
- **Coluna de imagem** (direita): foto circular da pizza com efeito de glow, seletor de 3 sabores diferentes, elementos decorativos flutuantes (SVG)
- **Scroll indicator**: seta animada no rodapé convidando a descer

---

### 2. Sobre — `#sobre`

Seção que conta a **história da pizzaria**:

- Imagem grande da pizza margherita com borda decorativa
- Dois parágrafos sobre a origem, valores e missão
- Três estatísticas animadas com contador:
  - **15+** Anos de Tradição
  - **30+** Sabores no Cardápio
  - **50k+** Pizzas Servidas

---

### 3. Cardápio — `#cardapio`

O **coração do site** — exibe os sabores disponíveis:

- Grid responsivo com cards de pizza
- Cada card contém: imagem, badge (Clássica/Favorita/Especial/Novidade), nome, descrição, preço e botão de adicionar
- Os cards possuem hover com elevação e zoom na imagem

---

### 4. Diferenciais — `#diferenciais`

Quatro cards apresentando o que torna a pizzaria especial:

| Card | Ícone | Descrição |
|------|-------|-----------|
| Forno a Lenha | Chama (SVG) | Assadas a 450°C, crocância e sabor defumado |
| Ingredientes Frescos | Planta (SVG) | Produtores locais, frescor e qualidade |
| Fermentação Natural | Relógio (SVG) | 72 horas de descanso, textura leve |
| Feito com Amor | Coração (SVG) | Dedicação artesanal, carinho |

---

### 5. Depoimentos — `#depoimentos`

Três cards com avaliações de clientes:

- Aspas decorativas em marca d'água
- 5 estrelas douradas
- Texto do depoimento em itálico
- Nome e ano do cliente

---

### 6. Banner CTA

Seção com gradiente vermelho para chamar a atenção:

- Título "Fome de Pizza?"
- Subtítulo convidando a pedir pelo WhatsApp
- Botão com link direto para o WhatsApp

---

### 7. Contato — `#contato`

Dividido em duas colunas:

- **Informações**: endereço, telefone e horário com ícones SVG
- **Formulário de reservas**: nome, telefone, e-mail, data, número de pessoas e mensagem

---

### 8. Footer

Rodapé com:

- Logo da marca
- Slogan
- Ícones sociais (Instagram, Facebook, WhatsApp)
- Copyright

---

## 🧭 Navegação

A navegação é feita através da **navbar fixa** no topo:

```
[ 🍕 PAPA'S MAGLEONI ]   Início   Sobre   Cardápio   Diferenciais   Contato   [ Ver Cardápio ]
```

- A navbar fica **fixa no topo** durante o scroll
- Possui **efeito de backdrop blur** (glassmorphism)
- Os links usam `scroll-behavior: smooth` para navegação suave
- Em mobile, vira **menu hambúrguer**
- O link ativo recebe uma **underline animada** vermelha no hover
