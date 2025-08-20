const navbar = document.querySelector('.navbar');
const mobileNavbar = document.querySelector('.navbar__mobile');
const button = document.querySelector('.burguer');

button.addEventListener('click', function () {
    mobileNavbar.classList.toggle('active');
});

window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 0) return navbar.classList.add('active');
    return navbar.classList.remove('active');
});


// Carousel
window.addEventListener('load', () => {
    const icons = document.querySelectorAll('.carousel .icon');
    const total = icons.length;
    const radius = 130;
    icons.forEach((icon, i) => {
        const angle = (360 / total) * i;
        icon.style.transform = `rotate(${angle}deg) translateX(${radius}px) rotate(-${angle}deg)`;
    });
});
// Fim Carousel

//Tela Escura ou Clara

const toggleButton = document.getElementById('theme-toggle');
const body = document.body;
const icon = toggleButton.querySelector("i");

// Carregar preferência salva
if (localStorage.getItem('theme') === 'light') {
    body.classList.add('light-theme');
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
}

toggleButton.addEventListener('click', () => {
    body.classList.toggle('light-theme');

    if (body.classList.contains('light-theme')) {
        icon.classList.remove("fa-moon");
        icon.classList.add("fa-sun");
        localStorage.setItem('theme', 'light');
    } else {
        icon.classList.remove("fa-sun");
        icon.classList.add("fa-moon");
        localStorage.setItem('theme', 'dark');
    }
});

//Fim Tela Escura ou Clara