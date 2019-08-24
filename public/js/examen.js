

//mostrar modal
//si presiona el boton esconder modal y activar cronometro
//al finalizar el examen mostrar resultados
var totalPreguntas = 10
var currentIndex = 0;
var numOpcion = [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1];
var respuesta = [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1];
var respuestasCorrectas = [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1];
var indiceRespuestCorrecta = [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1];

preguntaRandom();
//funcion para cambiar la respuesta correcta de lugar
function preguntaRandom(){
  for(i = 0; i < totalPreguntas; i++){

    let random = Math.floor(Math.random() * 4) + 1;
    let respuesta = document.getElementById(`4${i}`);
    let resp = respuesta.innerHTML;

    let nuevaPosicion = document.getElementById(`${random}${i}`);
    let nuev = nuevaPosicion.innerHTML;

    respuestasCorrectas[i] = resp;
    indiceRespuestCorrecta[i] = random;
    respuesta.innerHTML = nuev;
    nuevaPosicion.innerHTML = resp;
  }
}

function calificarPreguntas(id){
  
}

function finalizar() {
  //mostrar resultados
  let aciertos = 0;
  let errores = [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1];
  for(i = 0; i < totalPreguntas; i++){
    if(respuesta[i] == respuestasCorrectas[i]){
      aciertos++;
    }
    else {

    }
  }
  //mostrar modal pero con resultados
}

function examen(){
  let indexPregunta = document.getElementById("index-pregunta").innerHTML;
}

function showPregunta(id, odlId) {
  let letra = id +'-cp';
  let letra2 = odlId +'-cp';

  //poner estilo a numero para saber en que pregunta vas
  let numero = document.getElementById(letra);
  let numeroAntiguo = document.getElementById(letra2);

  //poner estilo a numero para saber en que pregunta vas
  if(id != odlId && id != null && odlId != null ){
      numeroAntiguo.classList.remove("selected");
      numero.classList.add("selected");

  }

  let preguntaLista = document.querySelector('.preguntas-todas');
  let preguntaTodas = document.querySelectorAll('.preguntas-todas div');
  const size = preguntaTodas[0].clientWidth + 11;
  preguntaLista.style.transition = 'transform 0.2s ease-in-out';
  preguntaLista.style.transform = 'translateX(' + (-size * currentIndex) + 'px)';
}

function cambiarDePregunta(id) {
  let index = id[0];
  if(id.length > 4){
    index = id[0] + id[1];
    index = index - 1;
  }
  let oldIndex = 0;
  oldIndex = currentIndex;

  if (index == '>'){
    if (currentIndex == 9)
    {
      currentIndex = 0;
    } else {
      currentIndex = parseInt(currentIndex) + 1;
    }
  }
  else if (index == '<'){
    if (currentIndex == 0)
    {
      currentIndex = 9;
    } else {
      currentIndex = parseInt(currentIndex) - 1;
    }
  }
  else{
    currentIndex = index;
  }
  //currentIndex ya esta actualizado
  //oldIndex tiene el valor de currentIndex antes de actualizarse
  showPregunta(currentIndex,oldIndex);
}

//cuando se selecciona una respuesta se activa esta funcion
function preguntaContestada(pregunta){
  console.log(pregunta);
  let indexRespuesta = pregunta.toString();
  let texto = document.getElementById(pregunta);

  numOpcion[indexRespuesta[1]] = indexRespuesta[0];
  respuesta[indexRespuesta[1]] = texto.innerHTML;
  console.log(numOpcion);
  console.log(respuesta);

}

//Funcion que esconde modal, activa cronometro y da inicio al examen
function empezar(){
  const modal = document.getElementById('my-modal');
  modal.style.display = 'none';
  var secs = 59;
  var mins = 9;
  var time = setInterval(function(){
  	//revisar si secs llegó a 0
  	if(mins >= 0){
          document.getElementById("timer-min").innerHTML = mins;
          if(secs < 10){
          	document.getElementById("timer-sec").innerHTML = "0" + secs;
          }
          else{
          	document.getElementById("timer-sec").innerHTML = secs;
          }
  	}
  	if(secs == 0){
  		secs = 59
  		mins--
  	}
  	else if(secs == 0 && mins == 0){
      //run end aplication
      finalizar();
  		return;
  	}
  	secs--
  },1000)
}
