document.addEventListener('DOMContentLoaded', function () {
    const openPopupBtn = document.getElementById('openPopup');
    const exitPopupBtn = document.getElementById('exitPopup');
    const closePopupBtn = document.getElementById('closePopup');
    const popup = document.getElementById('popup');

    const lang = localStorage.getItem("lang");
    const idioma = localStorage.getItem("idioma");

    closePopupBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    openPopupBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    exitPopupBtn.addEventListener('click', () => {
        if (lang === "ES") {
            if (idioma === "ing") {
                window.location.href = "../../es/english.html";
            }
            else if (idioma === "fra") {
                window.location.href = "../../es/french.html";
            }
            else if (idioma === "ita") {
                window.location.href = "../../es/italian.html";
            }
            else if (idioma === "ale") {
                window.location.href = "../../es/german.html";
            }
            else if (idioma === "rum") {
                window.location.href = "../../es/romanian.html";
            } else {
                window.location.href = "../../../../php/cursos.php";
            }
        }
        else if (lang === "EN") {
            if (idioma === "esp") {
                window.location.href = "../../en/spanish.html";
            }
            else if (idioma === "fra") {
                window.location.href = "../../en/french-en.html";
            }
            else if (idioma === "ita") {
                window.location.href = "../../en/italian-en.html";
            }
            else if (idioma === "ale") {
                window.location.href = "../../en/german-en.html";
            }
            else if (idioma === "rum") {
                window.location.href = "../../en/romanian-en.html";
            } else {
                window.location.href = "../../../../php/cursos.php";
            }
        }

    });

    window.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
});
