// Função de rolagem suave
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1); // Pega o ID da seção
        const targetSection = document.getElementById(targetId);

        window.scrollTo({
            top: targetSection.offsetTop - 60, // Desloca um pouco para compensar a altura da barra lateral
            behavior: 'smooth'
        });
    });
});
