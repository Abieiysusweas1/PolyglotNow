<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spanish T1: ¡Hola y Adiós!</title>
    <link rel="icon" href="../../../../img/icon.png">
    <link rel="stylesheet" href="../../../../css/idiomas.css">
    <link rel="stylesheet" href="../../../../css/menulec.css">
    <link rel="stylesheet" href="../../../../css/preguntas.css">
    <link rel="stylesheet" href="../../../emergente/emergente.css">
    <script src="../../../emergente/emergente.js"></script>
  </head>
  <style>
    .correcta {
      background-color: #4CAF50; /* verde */
      color: white;
    }

    .incorrecta {
      background-color: #f44336; /* rojo */
      color: white;
    }
  </style>
<body>

<div id="pregunta-container" class="pri">
  <div id="pregunta"></div>
  <div id="respuestas">
    <div id="respuesta1" class="lec"></div>
    <div id="respuesta2" class="lec"></div>
    <div id="respuesta3" class="lec"></div>
    <div id="respuesta4" class="lec"></div>
  </div>
</div>
<div id="openPopup" class="next">X</div>
<!-- La ventana emergente -->
<div id="popup" class="overlay">
    <div class="popup-content">
        <h2 style="text-align: center;">Exit the activity</h2>
        <p style="text-align: center;">If you exit, you will have to start the activity when you enter again.<br><br> Do you want to exit?</p>
        <div class="btns">
            <div id="exitPopup" class="exit">Exit</div>
            <div id="closePopup" class="cont">Continue</div>
        </div>
    </div>
</div>  


<script>
localStorage.setItem("lang", "EN");
localStorage.setItem("idioma", "esp");

let testFinalizado = false;

const preguntas = [
  {
    pregunta: "How do you say 'Hello' in Spanish?",
    respuestas: ["Adiós", "Hola", "Gracias", "Por favor"],
    correcta: "Hola"
  },
  {
    pregunta: "Which of these phrases is used to say goodbye?",
    respuestas: ["Buenas noches", "Nos vemos", "Bienvenido", "Hola"],
    correcta: "Nos vemos"
  },
  {
    pregunta: "What does 'Good morning' mean?",
    respuestas: ["Buenas tardes", "Buenas noches", "Buenos días", "Hola"],
    correcta: "Buenos días"
  },
  {
    pregunta: "What is a polite way to get someone's attention in Spanish?",
    respuestas: ["Por favor", "Disculpe", "Hola", "Nos vemos"],
    correcta: "Disculpe"
  },
  {
    pregunta: "What does 'Nice to meet you' mean?",
    respuestas: ["Encantado de conocerte", "Adiós", "Estoy bien", "Gracias"],
    correcta: "Encantado de conocerte"
  },
  {
    pregunta: "How do you say 'Thank you' in Spanish?",
    respuestas: ["Gracias", "Por favor", "Bienvenido", "Adiós"],
    correcta: "Gracias"
  },
  {
    pregunta: "What is a response to 'Thank you'?",
    respuestas: ["De nada", "Hola", "Encantado de conocerte", "Adiós"],
    correcta: "De nada"
  },
  {
    pregunta: "Which phrase would you use to introduce yourself?",
    respuestas: ["Mi nombre es...", "Nos vemos", "Buenas noches", "Adiós"],
    correcta: "Mi nombre es..."
  },
  {
    pregunta: "What does 'How are you?' mean?",
    respuestas: ["¿Qué pasa?", "¿Cómo estás?", "¿Quién eres?", "¿Cómo te llamas?"],
    correcta: "¿Cómo estás?"
  },
  {
    pregunta: "Which of these is an informal greeting?",
    respuestas: ["¿Cómo estás?", "Hasta la próxima", "Encantado de conocerte", "Disculpe"],
    correcta: "¿Cómo estás?"
  },
  {
    pregunta: "Which phrase is a nighttime greeting?",
    respuestas: ["Buenos días", "Buenas noches", "Nos vemos", "Bienvenido"],
    correcta: "Buenas noches"
  },
  {
    pregunta: "Which is a way to say 'See you later'?",
    respuestas: ["Hasta la próxima", "Hola", "Nos vemos luego", "Gracias"],
    correcta: "Nos vemos luego"
  },
  {
    pregunta: "What does 'Farewell' mean?",
    respuestas: ["Bienvenido", "Hasta la próxima", "Adiós", "Hola"],
    correcta: "Adiós"
  },
  {
    pregunta: "Which of these would you use to say 'See you next time'?",
    respuestas: ["Buenos días", "Nos vemos mañana", "Bienvenido", "Hasta la próxima"],
    correcta: "Hasta la próxima"
  },
  {
    pregunta: "What does 'Welcome' mean?",
    respuestas: ["Gracias", "De nada", "Bienvenido", "Hasta luego"],
    correcta: "Bienvenido"
  }
];

var num_pre = preguntas.length;

let preguntasRestantes = [...preguntas];
let preguntaActual = null;
let respuestasCorrectas = 0;

function mostrarPregunta() {
  if (preguntasRestantes.length === 0) {
    testFinalizado = true;
    document.getElementById("pregunta").textContent = "You have completed all the questions!";
    document.getElementById("respuestas").innerHTML = `<p>Correct answers: ${respuestasCorrectas} of ${num_pre}</p>`;
  }
  const indice = Math.floor(Math.random() * preguntasRestantes.length);
  preguntaActual = preguntasRestantes[indice];

  document.getElementById("pregunta").textContent = preguntaActual.pregunta;
  const respuestasDiv = document.getElementById("respuestas");
  const botones = respuestasDiv.getElementsByTagName("div");

  for (let i = 0; i < botones.length; i++) {
    botones[i].className = "lec";
    botones[i].textContent = preguntaActual.respuestas[i];
    botones[i].onclick = function() {
      verificarRespuesta(this);
    };
  }
  preguntasRestantes.splice(indice,1);
}

document.getElementById("openPopup").addEventListener("click", function() {
    if (testFinalizado) {
        event.stopImmediatePropagation();
        window.location.href = "../spanish.html";
        return;
    }
    document.getElementById("popup").style.display = 'block';
});

function verificarRespuesta(botonSeleccionado) {
  const respuestasDiv = document.getElementById("respuestas");
  const botones = respuestasDiv.getElementsByTagName("div");

  // desactivar más clics
  for (let i = 0; i < botones.length; i++) {
    botones[i].onclick = null;
    botones[i].classList.add("disabled");
  }

  if (botonSeleccionado.textContent === preguntaActual.correcta) {
    botonSeleccionado.classList.add("correcta");
    respuestasCorrectas++;
  } else {
    botonSeleccionado.classList.add("incorrecta");
    // resaltar la correcta
    for (let i = 0; i < botones.length; i++) {
      if (botones[i].textContent === preguntaActual.correcta) {
        botones[i].classList.add("correcta");
      }
    }
  }

  // mostrar siguiente después de un tiempo
  setTimeout(mostrarPregunta, 1500);
}

/* function verificarRespuesta(respuestaUsuario) {
  if (respuestaUsuario === preguntaActual.correcta) {
    alert("¡Correcto!");
  } else {
    alert("Incorrecto. La respuesta correcta es: " + preguntaActual.correcta);
  }
  mostrarPregunta(); // Muestra la siguiente pregunta
} */

mostrarPregunta(); // Llama a la función para mostrar la primera pregunta
</script>
</body>
</html>