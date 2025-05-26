document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("searchInput");
  const gameCards = document.querySelectorAll(".game-card, .vr-game-card");
  const vrCards = document.querySelectorAll(".vr-game-card");
  const vrTitle = document.querySelector(".section-title");
  const searchResults = document.getElementById("searchResults");
  const botoesFavorito = document.querySelectorAll('.favorito-btn');
  const libraryList = document.querySelector('.library');

  // ----------- BUSCA -----------
  function updateSearchResults() {
    const searchTerm = searchInput?.value.toLowerCase().trim() || "";
    if (searchResults) searchResults.innerHTML = "";

    if (searchTerm !== "") {
      vrCards.forEach(card => card.style.display = "none");
      if (vrTitle) vrTitle.style.display = "none";
    } else {
      vrCards.forEach(card => card.style.display = "block");
      if (vrTitle) vrTitle.style.display = "block";
    }

    gameCards.forEach(card => {
      const title = card.querySelector("h2, h3")?.textContent.toLowerCase() || "";
      card.style.display = title.includes(searchTerm) ? "block" : "none";
    });

    if (searchTerm && searchResults) {
      gameCards.forEach(card => {
        const title = card.querySelector("h2, h3")?.textContent || "";
        if (title.toLowerCase().includes(searchTerm)) {
          const resultItem = document.createElement("div");
          resultItem.className = "result-item";
          resultItem.textContent = title;
          resultItem.addEventListener("click", () => {
            card.scrollIntoView({ behavior: "smooth" });
            if (searchInput) searchInput.value = title;
            updateSearchResults();
          });
          searchResults.appendChild(resultItem);
        }
      });
    }
  }

  searchInput?.addEventListener("input", updateSearchResults);
  updateSearchResults();

  // ----------- FAVORITOS -----------
  function getFavoritos() {
    return JSON.parse(localStorage.getItem("favoritos")) || [];
  }

  function setFavoritos(favoritos) {
    localStorage.setItem("favoritos", JSON.stringify(favoritos));
  }

  function obterDadosDoCard(card) {
    const nome = card.querySelector("h2, h3")?.innerText || "";
    const img = card.querySelector("img")?.src || "";
    const link = card.querySelector("a")?.href || "#";
    return { nome, img, link };
  }

  botoesFavorito.forEach(btn => {
    const card = btn.closest(".game-card, .vr-game-card");
    const { nome } = obterDadosDoCard(card);
    const favoritos = getFavoritos();

    if (favoritos.some(j => j.nome === nome)) {
      btn.classList.add("favoritado");
      btn.textContent = "Remover dos Favoritos";
    }

    btn.addEventListener("click", () => {
      const { nome, img, link } = obterDadosDoCard(card);
      let favoritos = getFavoritos();

      if (btn.classList.contains("favoritado")) {
        favoritos = favoritos.filter(j => j.nome !== nome);
        btn.classList.remove("favoritado");
        btn.textContent = "Favoritar";
      } else {
        favoritos.push({ nome, img, link });
        btn.classList.add("favoritado");
        btn.textContent = "Remover dos Favoritos";
      }

      setFavoritos(favoritos);
    });
  });

  // ----------- BIBLIOTECA -----------
  function carregarBiblioteca() {
    if (!libraryList) return;

    const favoritos = getFavoritos();
    libraryList.innerHTML = "";

    if (favoritos.length === 0) {
      libraryList.innerHTML = '<p>Você não tem jogos favoritados ainda.</p>';
      return;
    }

    favoritos.forEach(jogo => {
      const li = document.createElement("li");
      li.classList.add("jogo-item");
      li.innerHTML = `
        <img src="${jogo.img}" alt="${jogo.nome}">
        <div class="info-jogo">
          <strong>${jogo.nome}</strong>
          <a href="${jogo.link}" target="_blank">Ver na Steam</a>
        </div>
        <button class="remover-btn">✖</button>
      `;
      li.querySelector(".remover-btn").addEventListener("click", () => {
        const novosFavoritos = getFavoritos().filter(j => j.nome !== jogo.nome);
        setFavoritos(novosFavoritos);
        carregarBiblioteca();
      });
      libraryList.appendChild(li);
    });
  }

  window.carregarBiblioteca = carregarBiblioteca;
  carregarBiblioteca();
});