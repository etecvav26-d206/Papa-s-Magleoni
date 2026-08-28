<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Contato e reservas — Magleoni</title>
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="icon" type="image/png" href="images/logo-magleoni.png">
</head>
<body>
<?php require __DIR__ . '/includes/header_site.php'; ?>
<main>
<section class="page-hero">
<p class="eyebrow">— FALE COM A GENTE</p>
<h1>Entre em contato</h1>
<p>Peça sua pizza, reserve uma mesa ou mande uma mensagem. Vamos adorar receber você.</p>
</section>
<section class="contact-page">
<aside>
<h2>Venha nos visitar</h2>
<p>
<b>Endereço</b>Rua das Pizzas, 123<br>Centro, São Paulo — SP<br>CEP 01234-567</p>
<p>
<b>Telefone</b>(11) 99999-9999<br>(11) 3456-7890</p>
<p>
<b>Horário</b>Terça a Domingo: 18h — 00h<br>Segunda: fechado</p>
<a class="text-link" href="https://wa.me/5511999999999">Falar no WhatsApp →</a>
</aside>
<form id="reserva">
<p class="wide">Demonstração escolar: preencha para visualizar uma solicitação. Nada será enviado ou reservado.</p>
<p class="eyebrow">— RESERVE SUA MESA</p>
<label>Nome<input name="nome" autocomplete="name" required placeholder="Como podemos te chamar?">
</label>
<label>Telefone<input name="telefone" autocomplete="tel" type="tel" required placeholder="(11) 99999-9999">
</label>
<label>E-mail<input name="email" autocomplete="email" type="email" placeholder="voce@email.com">
</label>
<label>Data<input name="data" type="date">
</label>
<label>Pessoas<select name="pessoas">
<option>1 a 2 pessoas</option>
<option>3 a 4 pessoas</option>
<option>5 a 6 pessoas</option>
<option>7 ou mais pessoas</option>
</select>
</label>
<label class="wide">Mensagem<textarea name="mensagem" placeholder="Conte para a gente se há algo especial na sua reserva.">
</textarea>
</label>
<button class="button dark" type="submit">Visualizar solicitação →</button>
<p class="wide" id="reserva-status" role="status">
</p>
<noscript>Ative o JavaScript para visualizar a solicitação. Nada será enviado.</noscript>
</form>
</section>
</main>
<?php require __DIR__ . '/includes/footer_site.php'; ?>
</body>
</html>
