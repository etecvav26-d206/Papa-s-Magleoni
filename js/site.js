const menuButton = document.querySelector(".menu-toggle");
const mainNav = document.querySelector("header nav");
if (menuButton && mainNav) {
  const setMenu = (open) => {
    mainNav.classList.toggle("open", open);
    menuButton.setAttribute("aria-expanded", String(open));
    menuButton.setAttribute("aria-label", open ? "Fechar menu" : "Abrir menu");
    menuButton.textContent = open ? "×" : "☰";
  };
  menuButton.addEventListener("click", () =>
    setMenu(!mainNav.classList.contains("open")),
  );
  mainNav.addEventListener("click", (event) => {
    if (event.target.closest("a")) setMenu(false);
  });
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && mainNav.classList.contains("open")) {
      setMenu(false);
      menuButton.focus();
    }
  });
}

const reservationForm = document.querySelector("#reserva");
if (reservationForm) {
  reservationForm.addEventListener("submit", (event) => {
    event.preventDefault();
    const data = new FormData(reservationForm);
    document.querySelector("#reserva-status").textContent =
      `Prévia da solicitação: ${data.get("nome")}, ${data.get("pessoas")}, ` +
      `data: ${data.get("data") || "a combinar"}. ` +
      "Esta demonstração não enviou nem salvou a reserva. O contato da pizzaria é fictício.";
  });
}

const heroVideo = document.querySelector(".hero-video video");
if (heroVideo) {
  const playVideo = () =>
    heroVideo.play().catch(() => {
    });
  playVideo();
  document.addEventListener("visibilitychange", () => {
    if (!document.hidden) playVideo();
  });
}
