

//mostrar modal
//si presiona el boton esconder modal y activar cronometro
//al finalizar el examen mostrar resultados
var totalPreguntas = 10
var currentIndex = 0;

preguntaRandom();
//funcion para cambiar la respuesta correcta de lugar
function preguntaRandom(){
  for(i = 0; i < totalPreguntas; i++){

    let random = Math.floor(Math.random() * 4) + 1;
    let respuesta = document.getElementById(`4${i}div`);
    // let resp = respuesta.innerHTML;
    console.log(respuesta.parentNode);
    let aux = respuesta;
    let nuevaPosicion = document.getElementById(`${random}${i}div`);
    respuesta = nuevaPosicion;
    nuevaPosicion = aux;

    // let nuev = nuevaPosicion.innerHTML;
  }
}

//poner palomita y cruz a las preguntas
function calificarPreguntas(id){
  let newIcon = document.createElement("i");
  let newIcon2 = document.createElement("i");

  //agarrar div
  let div = document.getElementById(`${indiceRespuestCorrecta[id]}${id}div`);
  newIcon.classList.add('fas fa-check res-buena');
  div.classList.add('res-buena-div');
  div.appendChild(newIcon);

  //si la respuesta fue incorrecta se califica solo como mala
  if(respuesta[i] != respuestasCorrectas[i]){
    let divMalo = document.getElementById(`${numOpcion[id]}${id}div`);
    newIcon2.classList.add('fas fa-check res-mala');
    divMalo.classList.add('res-mala-div');
    divMalo.appendChild(newIcon);
  }
}

function showEndModal(aciertos, tiempo){
  //preguntar si está seguro que quiere terminar
  //dos botones
}

//funcion que se activa al presionar el boton o el tiempo se acabó
function finalizar() {
  //agarramos el input de tiempoensegundos
  let tiempo = document.getElementById('tiempo');
  //el input de calificacion
  let cal = document.getElementById('cal');



  // let tiempoEnSegundos = `${mins}:${secs}`;
  // obtenemos el tiempo que tardó
  let tiempoEnSegundos = (mins * 60) + (secs) ;
  tiempo.value = tiempoEnSegundos;

  //mostrar resultados
  let aciertos = 0;
  let errores = [-1,-1,-1,-1,-1,-1,-1,-1,-1,-1];
  for(i = 0; i < totalPreguntas; i++){
    let correcta = document.getElementById(`corr-${i}`);
    let resp= document.getElementById(`resp-${i}`);
    resp.value = respuesta[i];
    if(respuesta[i] == respuestasCorrectas[i]){
      correcta.value = 1;
      aciertos++;
    }
    else{
      correcta.value = 0;
    }
    // calificarPreguntas(i);
  }
  //modificamos el value de calificacion
  cal.value = aciertos;
  document.getElementById("exam-form").submit();

}

function examen(){
  let indexPregunta = document.getElementById("index-pregunta").innerHTML;
}

function showPregunta(id, odlId) {
  let letra = id +'-cp';
  let letra2 = odlId +'-cp';

  //efecto de cambio de pregunta
  let preguntaLista = document.querySelector('.preguntas-todas');
  let preguntaTodas = document.querySelectorAll('.preguntas-todas div');
  const size = preguntaTodas[0].getBoundingClientRect().width;
  preguntaLista.style.transition = 'transform 0.2s ease-in-out';
  preguntaLista.style.transform = 'translateX(' + (-size * currentIndex) + 'px)';
  // console.log(-size);
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
