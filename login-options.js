function redirectTo(url) {
  const cards = document.querySelectorAll(".card");

  cards.forEach((card) => {
    card.classList.add("animate__animated", "animate__backOutDown");
  });

  setTimeout(() => {
    window.location.href = url;
  }, 10);
}
