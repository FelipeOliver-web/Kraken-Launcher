<footer>
  <div class="footer-container">
    <p class="copyright">&copy; 2025 <strong>Kraken Launcher</strong>. Todos os direitos reservados.</p>

    <div class="footer-nav">
        <a href="?pg=Sobre-Nos" class="btn-neon">Sobre Nós</a>
        <a href="?pg=Contatos" class="btn-neon">Contato</a>
        <a href="?pg=Agradecimentos" class="btn-neon">Agradecimentos</a>
    </div>
  </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // 1. Pega a barra de pesquisa
    const searchInput = document.getElementById('searchInput');
    
    // Só roda o código se a barra de pesquisa existir na página
    if (searchInput) {
        
        // 2. Escuta cada tecla digitada
        searchInput.addEventListener('keyup', function() {
            const termo = searchInput.value.toLowerCase(); // O que foi digitado (em minúsculo)
            const cards = document.querySelectorAll('.game-card'); // Todos os cards de jogos

            // 3. Passa por cada jogo para verificar
            cards.forEach(card => {
                const titulo = card.querySelector('h2').textContent.toLowerCase(); // Nome do jogo

                if (titulo.includes(termo)) {
                    card.style.display = ""; // Mostra se combinar
                } else {
                    card.style.display = "none"; // Esconde se não combinar
                }
            });
        });
    }
});
</script>

</body>
</html>