
let responseJson = {
  linguistico:0,
  mate:0,
  espacio:0,
  interpersonal:0,
  creativa:0,
  intrapersonal:0,

}
let aptitudes = {
  linguistico_verbal: 0,
  mate: 0,
  espacio_visual:0,
  interpersonal:0,
  creativa:0,
  intrapersonal:0,
}
let indicePregunta = 0;
let indexCarrera = 0;
let listaCarr = [];
let preguntas = [
  ["¿Qué tanto te gusta resolver problemas matematicos?",["mate"]],
  ["¿Te gusta Leer?",["linguistico_verbal"]],
  // ["¿Te gusta ser autodidacta?",[""]],
  ["¿Eres bueno para trabajar bajo presion?",["intrapersonal"]],
  ["¿Tienes habilidades o gusto por el diseño?",["creativa","espacio"]],
  ["¿Te consideras una persona imaginativa?",["creativa","espacio"]],
  ["¿Eres bueno redactando documentos?",["linguistico_verbal"]],
  ["¿Tienes facilidad para hablar y dar a enterder tus ideas?",["linguistico_verbal"]],
  ["¿Te conoces a ti mismo?",["intrapersonal"]],
  ["¿Tienes habilidades para pensar abstractamente?",["mate"]],
  ["¿Qué tanto te gustan las matematicas?",["mate"]],
  ["¿Reflexionas en como puedes mejorar tu comportamiento?",["intrapersonal"]],
  ["¿Eres bueno para resolver problemas de logica?",["mate"]],
  ["¿Te interesan los articulos cientificos?",["mate"]],
  ["¿Te gusta trabajar en lugares abiertos?",["espacio"]],
  ["¿Eres bueno para observar cosas que nadie mas ve?",["espacio"]],
  ["¿Tienes facilidad para adaptarte a diferentes ambientes?",["interpersonal"]],
  ["¿Te gusta pasar tiempo a solas?",["intrapersonal"]],
  ["¿Tienes gusto por ayudar a los demas?",["interpersonal"]],

  ["¿Eres una persona que tiene ideas original?",["creativa"]],

  ["¿Tienes cualidades de un lider?",["interpersonal"]],
  ["¿Prefieres una tarde relajada a ir a una fiesta?",["intrapersonal"]],
  ["¿Eres bueno para trabar en equipo?",["interpersonal"]],
  ["¿Tienes un gran gusto por la innovacion?",["creativa"]],
  ["¿Tienes gusto por la oratoria?",["linguistico_verbal"]],
  ["¿Tienes gusto por aprender idiomas?",["linguistico_verbal"]],
  ["¿Bueno para acomodar cosas en un espacio definido?",["espacio"]],
  ["¿Eres bueno relacionandote con otras personas?",["interpersonal"]],
  ["¿Te gusta el arte?",["creativa"]],
];

let respuestas = [
  {
    respuesta1:"Mucho",
    respuesta2:"Algo",
    respuesta3:"No mucho",
    respuesta4:"Nada"
  }
];
//**********************************//
//***********Funciones *************//
//**********************************//
window.onload = function() {
  cambiarPregunta();
  cambiarRespuestas();
};
function cambiarPregunta(){
  document.getElementById("pregunta").innerHTML = preguntas[indicePregunta][0];
}
function cambiarRespuestas(){
  document.getElementById("respuesta1").innerHTML = respuestas[indicePregunta].respuesta1
  document.getElementById("respuesta2").innerHTML = respuestas[indicePregunta].respuesta2
  document.getElementById("respuesta3").innerHTML = respuestas[indicePregunta].respuesta3
  document.getElementById("respuesta4").innerHTML = respuestas[indicePregunta].respuesta4
}

// ling: 30   -   22.5		-		21					50
// mate: 50	-		37.5		-		35						50
// espaci 40															50
// interpersonal 40	-	30	-28							50
// cretividad 40		- 30		-28
function analizarAptitudes(){
  if(aptitudes.linguistico_verbal >= 33){
    document.getElementById("con1").value = 1
  }
  if(aptitudes.mate >= 33){
    document.getElementById("con2").value = 1
  }
  if(aptitudes.espacio_visual >= 33){
    document.getElementById("con3").value = 1
  }
  if(aptitudes.interpersonal >= 33){
    document.getElementById("con4").value = 1
  }
  if(aptitudes.creativa >= 33){ //28
    document.getElementById("con5").value = 1
  }
  // if(aptitudes.musical > 33){ //28
    //   document.getElementById("con5").value = 1
    // }
    // if(aptitudes.cinestesica > 33){ //28
      //   document.getElementById("con5").value = 1
      // }
      if(aptitudes.intrapersonal >= 33){ //filosofos, escritores, psicologos
        document.getElementById("con6").value = 1
      }
      console.log(aptitudes);

    }

    function addPeso(peso){
      preguntas[indicePregunta][1].forEach(function(tipo){
        switch (tipo) {
          case 'linguistico_verbal':
          aptitudes.linguistico_verbal += peso;
          break;
          case 'mate':
          aptitudes.mate += peso;
          break;
          case 'espacio':
          aptitudes.espacio_visual += peso;
          break;
          case 'interpersonal':
          aptitudes.interpersonal += peso;
          break;
          case 'creativa':
          aptitudes.creativa += peso;
          break;
          case 'intrapersonal':
          aptitudes.intrapersonal += peso;
          break;
          default:
          break;
        }
      });
    }

    //cada vez que se presiona un boton se guarda su peso y se cambia a la
    //siguiente pregunta
    function botonPrecionado(peso) {

        switch (peso) {
          case 10:
          addPeso(peso);
          break;
          case 7.5://6.6
          addPeso(peso);
          break;
          case 4.3://3.3
          addPeso(peso);
          break;
          case 0:
          addPeso(peso);
          break;
          default:
        }
        indicePregunta++;
        if(indicePregunta < preguntas.length){
          cambiarPregunta();
        }
        else {
          analizarAptitudes();
          // document.getElementById("con1").value = 1
          // document.getElementById("con2").value = 1
          // document.getElementById("con3").value = 1
          // document.getElementById("con4").value = 1
          // document.getElementById("con5").value = 1
          // document.getElementById("con6").value = 1

          //enviar resultados a
          document.getElementById("voc-form").submit();

        }
    }
