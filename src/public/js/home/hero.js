const spanTxt = $("#hero-txt-span");
const words = [
    "Eficiente",
    "Económico",
    "Confortable",
    "Seguro",
    "Rápido",
    "Moderno",
    "Puntual",
    "Fácil",
    "Directo",
    "Conveniente",
    "Conectado",
    "Experiencia",
    "Sencillo",
    "Agradable",
    "Experto"
];
let currentIndex = 0;

const animationSpanTxt = () => {
    spanTxt.animate({ opacity: 0 }, 500, () => {
        currentIndex = Math.floor(Math.random() * words.length); // Elige una palabra aleatoria
        spanTxt.html(words[currentIndex]);
        spanTxt.animate({ opacity: 1 }, 500);
    });
};

setInterval(animationSpanTxt, 7000);
