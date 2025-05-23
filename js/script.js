document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("searchInput");
  const gameCards = document.querySelectorAll(".game-card");
  const vrCards = document.querySelectorAll(".vr-game-card");
  const vrTitle = document.querySelector(".section-title"); // título Realidade Virtual
  const searchResults = document.getElementById("searchResults");

  function updateSearchResults() {
    const searchTerm = searchInput.value.toLowerCase().trim();
    searchResults.innerHTML = "";

    // Sempre esconder VR cards e título durante qualquer busca
    if (searchTerm !== "") {
      vrCards.forEach(card => card.style.display = "none");
      if (vrTitle) vrTitle.style.display = "none";
    } else {
      vrCards.forEach(card => card.style.display = "block");
      if (vrTitle) vrTitle.style.display = "block";
    }

    // Mostrar/esconder game cards normais
    gameCards.forEach(card => {
      const title = card.querySelector("h2").textContent.toLowerCase();
      card.style.display = title.includes(searchTerm) || searchTerm === "" ? "block" : "none";
    });

    // Criar lista de resultados clicáveis para jogos normais
    if (searchTerm) {
      gameCards.forEach(card => {
        const title = card.querySelector("h2").textContent;
        if (title.toLowerCase().includes(searchTerm)) {
          const resultItem = document.createElement("div");
          resultItem.className = "result-item";
          resultItem.textContent = title;
          resultItem.addEventListener("click", () => {
            card.scrollIntoView({ behavior: "smooth" });
            searchInput.value = title;
            updateSearchResults();
          });
          searchResults.appendChild(resultItem);
        }
      });
    }
  }

  searchInput.addEventListener("input", updateSearchResults);

  // Inicializa mostrando tudo
  updateSearchResults();
});
