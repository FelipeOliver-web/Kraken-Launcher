document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("searchInput");
  const gameCards = document.querySelectorAll(".game-card");

  searchInput.addEventListener("input", () => {
    const searchTerm = searchInput.value.toLowerCase();

    gameCards.forEach(card => {
      const title = card.querySelector("h2").textContent.toLowerCase();
      if (title.includes(searchTerm)) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  });
});
