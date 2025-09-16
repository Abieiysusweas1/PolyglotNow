<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alemán T1: Hallo und auf Wiedersehen!</title>
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
        <h2 style="text-align: center;">Salir de la actividad</h2>
        <p style="text-align: center;">Si sale, tendrá que volver a empezar de nuevo la actividad cuando vuelva a entrar.<br><br> ¿Quiere salir?</p>
        <div class="btns">
            <div id="exitPopup" class="exit">Salir</div>
            <div id="closePopup" class="cont">Continuar</div>
        </div>
    </div>
</div>  


<script>
localStorage.setItem("lang", "ES");
localStorage.setItem("idioma", "ale");

let testFinalizado = false;

const preguntas = [
  {
    pregunta: "¿Cómo se dice 'Hola' en alemán?",
    respuestas: ["Tschüss", "Hallo", "Danke", "Bitte"],
    correcta: "Hallo"
  },
  {
    pregunta: "¿Cuál de estas frases se usa para despedirse en alemán?",
    respuestas: ["Gute Nacht", "Auf Wiedersehen", "Willkommen", "Hallo"],
    correcta: "Auf Wiedersehen"
  },
  {
    pregunta: "¿Qué significa 'Guten Morgen'?",
    respuestas: ["Buenas tardes", "Buenas noches", "Buenos días", "Hola"],
    correcta: "Buenos días"
  },
  {
    pregunta: "¿Cuál es una forma cortés de llamar la atención en alemán?",
    respuestas: ["Bitte", "Entschuldigung", "Hallo", "Auf Wiedersehen"],
    correcta: "Entschuldigung"
  },
  {
    pregunta: "¿Qué significa 'Freut mich'?",
    respuestas: ["Encantado de conocerte", "Adiós", "Gracias", "Hola"],
    correcta: "Encantado de conocerte"
  },
  {
    pregunta: "¿Cómo dices 'Gracias' en alemán?",
    respuestas: ["Danke", "Hallo", "Willkommen", "Tschüss"],
    correcta: "Danke"
  },
  {
    pregunta: "¿Cuál es una respuesta a 'Danke'?",
    respuestas: ["Bitte", "Hallo", "Freut mich", "Auf Wiedersehen"],
    correcta: "Bitte"
  },
  {
    pregunta: "¿Qué frase usarías para presentarte en alemán?",
    respuestas: ["Ich heiße...", "Guten Abend", "Freut mich", "Tschüss"],
    correcta: "Ich heiße..."
  },
  {
    pregunta: "¿Qué significa 'Wie geht's?'",
    respuestas: ["¿Qué pasa?", "¿Cómo estás?", "¿Quién eres?", "¿Cómo te llamas?"],
    correcta: "¿Cómo estás?"
  },
  {
    pregunta: "¿Cuál de estas frases es una forma informal de saludo en alemán?",
    respuestas: ["Na?", "Freut mich", "Auf Wiedersehen", "Bitte"],
    correcta: "Na?"
  },
  {
    pregunta: "¿Qué frase es un saludo nocturno en alemán?",
    respuestas: ["Gute Nacht", "Guten Morgen", "Auf Wiedersehen", "Willkommen"],
    correcta: "Gute Nacht"
  },
  {
    pregunta: "¿Cuál es una forma de decir 'Hasta luego' en alemán?",
    respuestas: ["Bis später", "Hallo", "Freut mich", "Danke"],
    correcta: "Bis später"
  },
  {
    pregunta: "¿Qué significa 'Leb wohl'?",
    respuestas: ["Hola", "Gracias", "Adiós (formal)", "Hasta luego"],
    correcta: "Adiós (formal)"
  },
  {
    pregunta: "¿Cuál de estas frases usarías para decir 'Hasta la próxima' en alemán?",
    respuestas: ["Bis zum nächsten Mal", "Guten Abend", "Danke", "Hallo"],
    correcta: "Bis zum nächsten Mal"
  },
  {
    pregunta: "¿Qué significa 'Willkommen'?",
    respuestas: ["Gracias", "De nada", "Bienvenido", "Adiós"],
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
    document.getElementById("pregunta").textContent = "¡Has completado todas las preguntas!";
    document.getElementById("respuestas").innerHTML = `<p>Respuestas correctas: ${respuestasCorrectas} de ${num_pre}</p>`;
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
        window.location.href = "../german.html";
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