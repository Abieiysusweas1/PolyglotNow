document.addEventListener("DOMContentLoaded", function() {
    const translations = {
        'espanol': {
            'form-tit': 'CREAR UNA CUENTA',
            'usu': 'Ingresa un nombre de usuario *',
            'user-placeholder': 'Usuario',
            'con': 'Ingresa una contraseña *',
            'password-placeholder': 'Contraseña',
            'lan': 'Selecciona tu lengua nativa:',
            'cur': 'Selecciona los idiomas que quieres aprender:',
            'submit': 'Ingresar',
            'c_ing': 'Inglés',
            'c_esp': 'Español',
            'c_fra': 'Francés',
            'c_ita': 'Italiano',
            'c_ale': 'Alemán',
            'c_rum': 'Rumano'
        },
        'ingles': {
            'form-tit': 'CREATE AN ACCOUNT',
            'usu': 'Enter a username *',
            'user-placeholder': 'Username',
            'con': 'Enter a password *',
            'password-placeholder': 'Password',
            'lan': 'Select your native language:',
            'cur': 'Select languages you want to learn:',
            'submit': 'Submit',
            'c_ing': 'English',
            'c_esp': 'Spanish',
            'c_fra': 'French',
            'c_ita': 'Italian',
            'c_ale': 'German',
            'c_rum': 'Romanian'
        }
    };

    function updateLanguage(lang) {
        document.querySelector('.form-tit').textContent = translations[lang]['form-tit'];
        document.querySelector('label[for="usu"]').textContent = translations[lang]['usu'];
        document.querySelector('input[name="user"]').placeholder = translations[lang]['user-placeholder'];
        document.querySelector('label[for="con"]').textContent = translations[lang]['con'];
        document.querySelector('input[name="password"]').placeholder = translations[lang]['password-placeholder'];
        document.querySelector('label[for="lan"]').textContent = translations[lang]['lan'];
        document.querySelector('label[for="cur"]').textContent = translations[lang]['cur'];
        document.querySelector('.envio').value = translations[lang]['submit'];
        document.querySelector('label[for="c_ing"]').textContent = translations[lang]['c_ing'];
        document.querySelector('label[for="c_esp"]').textContent = translations[lang]['c_esp'];
        document.querySelector('label[for="c_fra"]').textContent = translations[lang]['c_fra'];
        document.querySelector('label[for="c_ita"]').textContent = translations[lang]['c_ita'];
        document.querySelector('label[for="c_ale"]').textContent = translations[lang]['c_ale'];
        document.querySelector('label[for="c_rum"]').textContent = translations[lang]['c_rum'];

        // Ocultar checkbox del idioma nativo
        document.getElementById("checkbox-ing").style.display = (lang === "ingles") ? "none" : "flex";
        document.getElementById("checkbox-esp").style.display = (lang === "espanol") ? "none" : "flex";

        // Mostrar/ocultar enlaces
        document.getElementById("link-english").style.display = (lang === "espanol") ? "inline" : "none";
        document.getElementById("link-spanish").style.display = (lang === "ingles") ? "inline" : "none";
    }

    document.getElementById("link-english").addEventListener("click", function(e) {
        e.preventDefault();
        updateLanguage('ingles');
    });
    document.getElementById("link-spanish").addEventListener("click", function(e) {
        e.preventDefault();
        updateLanguage('espanol');
    });

    // Opcional: inicia en español
    updateLanguage('espanol');
});

