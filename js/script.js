
document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("searchInput");
  const gameCards = document.querySelectorAll(".game-card");
  const searchResults = document.getElementById("searchResults");

  function updateSearchResults() {
    const searchTerm = searchInput.value.toLowerCase();
    searchResults.innerHTML = "";

    gameCards.forEach(card => {
      const title = card.querySelector("h2").textContent;
      const titleLower = title.toLowerCase();

      if (titleLower.includes(searchTerm)) {
        card.style.display = "block";
        const resultItem = document.createElement("div");
        resultItem.className = "result-item";
        resultItem.textContent = title;
        resultItem.addEventListener("click", () => {
          card.scrollIntoView({ behavior: "smooth" });
          searchInput.value = title;
          updateSearchResults();
        });
        searchResults.appendChild(resultItem);
      } else {
        card.style.display = "none";
      }
    });

    if (!searchTerm) {
      gameCards.forEach(card => card.style.display = "block");
      searchResults.innerHTML = "";
    }
  }

  searchInput.addEventListener("input", updateSearchResults);
});
