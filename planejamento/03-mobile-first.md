# 4️⃣ Mobile First

---

## 📱 O que é Mobile First?

**Mobile First** é uma abordagem de design e desenvolvimento web onde o site é projetado **primeiro para dispositivos móveis** (celulares) e depois adaptado para telas maiores (tablets e desktops). Isso garante que a experiência do usuário seja otimizada para o dispositivo mais utilizado atualmente.

---

## 🤔 Por que escolhemos o Mobile First?

### 1. Nosso público acessa pelo celular

A grande maioria dos clientes de uma pizzaria busca informações pelo celular — seja para ver o cardápio, encontrar o endereço ou fazer um pedido pelo WhatsApp. Segundo dados do mercado, **mais de 70% dos acessos** a sites de alimentação e restaurantes vêm de dispositivos móveis.

### 2. Google prioriza sites mobile-friendly

O Google utiliza o **Mobile-First Indexing**, ou seja, a versão mobile do site é a que ele considera para ranqueamento nas buscas. Um site que funciona bem no celular terá melhor posicionamento no Google.

### 3. Experiência do usuário

Um cliente que está com fome e quer ver o cardápio não vai querer fazer zoom ou rolar lateralmente. A experiência precisa ser **rápida, clara e intuitiva** desde o primeiro toque.

---

## 🛠️ Como pretendemos adaptar o site para celular

### Menu Responsivo

| Desktop | Mobile |
|---------|--------|
| Menu horizontal com links visíveis | Menu hambúrguer (3 linhas) |
| Links: Início, Sobre, Cardápio, Diferenciais, Contato | Menu que abre ao toque e mostra os links em lista vertical |
| Botão "Ver Cardápio" visível | Botão de CTA adaptado |

**Implementação no CSS:**
```css
@media(max-width:900px) {
  .nav-links { display: none; }
  .menu-toggle { display: block; }
}
```

O site já possui um botão `.menu-toggle` que é exibido em telas menores e oculta o menu horizontal, substituindo-o por um ícone hambúrguer.

---

### Imagens

| Cuidado | Solução |
|---------|---------|
| Imagens muito grandes no celular | Reduzir o tamanho dos containers (ex: pizza de 420px → 300px → 240px) |
| Carregamento lento | Usar `loading="lazy"` nas imagens que não estão visíveis inicialmente |
| Overflow horizontal | Todas as imagens usam `object-fit: cover` para se adaptar ao container |

**Breakpoints de imagem no CSS:**
```css
/* Tablet */
@media(max-width:900px) {
  .hero-pizza-wrap { width: 300px; height: 300px; }
}

/* Celular */
@media(max-width:600px) {
  .hero-pizza-wrap { width: 240px; height: 240px; }
}
```

---

### Textos

| Cuidado | Solução |
|---------|---------|
| Títulos muito grandes | Usar `clamp()` para escala fluida (ex: `font-size: clamp(3.5rem, 8vw, 7rem)`) |
| Textos cortados | Padding e margens adaptados para telas menores |
| Legibilidade | Fonte Montserrat com peso 400-700 para boa leitura em telas pequenas |

**Exemplo de tipografia responsiva:**
```css
.hero-title {
  font-size: clamp(3.5rem, 8vw, 7rem);
}

@media(max-width:600px) {
  .hero-title { font-size: 3rem; }
}
```

---

### Organização da Tela

| Desktop | Mobile |
|---------|--------|
| Hero em 2 colunas (texto + imagem) | Uma coluna (imagem primeiro, texto depois) |
| Cardápio em grid de 3 colunas | Grid automático que se ajusta (1-2 colunas) |
| Contato em 2 colunas | Uma coluna empilhada |
| Formulários lado a lado | Formulários empilhados |

**Implementação:**
```css
@media(max-width:900px) {
  .hero-container {
    grid-template-columns: 1fr;  /* Uma coluna */
    text-align: center;
  }
  .hero-text-col { order: 2; }   /* Texto depois */
  .hero-image-col { order: 1; }  /* Imagem primeiro */
  .about-grid, .contact-grid {
    grid-template-columns: 1fr;  /* Empilhado */
  }
  .form-row {
    grid-template-columns: 1fr;  /* Campos empilhados */
  }
}
```

---

## 📐 Breakpoints Utilizados

| Breakpoint | Dispositivo | Alterações |
|------------|-------------|------------|
| `> 900px` | Desktop | Layout completo em múltiplas colunas |
| `≤ 900px` | Tablet | Menu hambúrguer, grids simplificados, imagem menor |
| `≤ 600px` | Celular | Título reduzido, pizza menor, cards empilhados |

---

## ✅ Checklist Mobile First

- [x] Menu hambúrguer para telas pequenas
- [x] Grid responsivo no cardápio (auto-fill, minmax)
- [x] Imagens com `loading="lazy"` para performance
- [x] Tipografia fluida com `clamp()`
- [x] Hero adaptado: 2 colunas → 1 coluna
- [x] Formulários empilhados no mobile
- [x] Botões com tamanho adequado para toque
- [x] Scroll suave entre seções
- [x] `overflow-x: hidden` para evitar scroll horizontal
