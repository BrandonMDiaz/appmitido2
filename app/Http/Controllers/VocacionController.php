<?php

namespace App\Http\Controllers;

use App\CustomClass\SBC;
use Illuminate\Http\Request;

class VocacionController extends Controller
{

  public function index(){
    return view('orientador.index');
  }

  public function test(){
    return view('orientador.test');
  }

  public function orientador(Request $request){

    // $carreras = [];
    $arrayAtomos = [];

    if($request->linguistico_verbal == 1){
      $arrayAtomos[] = 'lingüístico-verbal';
    }
    if($request->mate == 1){
      $arrayAtomos[] = 'lógico-matemático';

    }
    if($request->espacio_visual == 1){
      $arrayAtomos[] = 'espacio-visual';
    }
    if($request->interpersonal == 1){
      $arrayAtomos[] = 'interpersonal';
    }
    if($request->creativa == 1){
      $arrayAtomos[] = 'creativa';
    }
    if($request->intrapersonal == 1){
      $arrayAtomos[] = 'intrapersonal';
    }
    $carreras = SBC::runSBC($arrayAtomos);
    $texto = $this->texto($carreras);
    return view('orientador.resultado', compact('carreras', 'texto'));
  }

  public function texto($carreras){
    $list = [];
    foreach ($carreras as $carrera) {
      switch ($carrera) {
        case 'Derecho':
        $list[] = ["La carrera de Derecho es una disciplina, que brinda instrumentos para
        lograr que las personas en
        sus relaciones diarias con los demás, se rijan por leyes que permitan que
        la sociedad funcione justa y ordenadamente.",
        "Todo futuro Abogado debe tener conocimiento de los fundamentos de hecho y
        derecho. Debe tener un razonamiento lógico, capacidad de análisis y síntesis,
        debe saber manejar y solucionar conflictos, además debe tener gusto por la
        lectura y buena memoria. Pero sobre todo un abogado debe tener siempre
        presente su vocación de justicia, un sentido ético personal y social,
        además de una gran facilidad de palabra y persuasión."
        ];
        break;
        case 'Arquitectura':
        $list[] =  [
        "El término arquitectura proviene del griego “arch” (jefe) y “tekton”
        (constructor). Así, para los griegos, el arquitecto era el jefe o
        director de la construcción de edificios o esculturas. Para quienes
        gustan de las proyecciones, el dibujo y el diseño, la Arquitectura
        (una de las profesiones más antiguas, originada alrededor del siglo XVIII)
        podría ser una carrera ideal.",
        "La arquitectura requiere unir y equilibrar la creatividad, el
        conocimiento y la técnica, y tradicionalmente ha sido considerada una
        de las siete Bellas Artes ya que determinadas construcciones, además
        del sentido de las misma -que pueden ser de refugio o habitación,
        entre otras- se consideran obras de arte, debido a su carácter estético."
        ];
        break;
        case 'Civil':
        $list[] =  [
        "La ingeniería civil es la disciplina de la ingeniería profesional que
        emplea conocimientos de cálculo, mecánica hidráulica y física para
        encargarse del diseño, construcción y mantenimiento de las
        infraestructuras emplazadas en el entorno, incluyendo carreteras,
        ferrocarriles, puentes, canales, presas, puertos, aeropuertos, diques y
        otras construcciones relacionadas.",
        "La ingeniería civil es una de las carreras que más requieren disciplina
        y responsabilidad, ya que en tus manos estará la vida de cientos de
        personas que día con día usarán el resultado de tu trabajo."
        ];
        break;
        case 'Electrónico':
        $list[] =  [
        "Si eres un fanático de los circuitos y la tecnología, entonces
        Ingeniería electrónica podría ser la carrera que tú estás buscando
        para dedicarte a ella profesionalmente. Y es que ésta es una de las
        licenciaturas con mayor  demanda en todo nuestro país.",
        "El ingeniero electrónico es un profesional que trabaja directamente
        con la tecnología. Él es el responsable de brindar soluciones a
        problemas que tienen que ver con la adaptación, transferencia e
        innovación de la tecnología electrónica en cualquier tipo de sector:
        industrial o de servicios y que a través de esta soluciones, se logre
        la eficiencia de la calidad y la productividad del área para la que
        presta sus servicios."
        ];
        break;
        case 'Informática':
        $list[] =  [
        "La carrera de Informática y Sistemas consiste en la gestión, el
        mantenimiento, el desarrollo y la innovación de todo aquello que
        engloba el ámbito de la tecnología. Es indispensable que un estudiante
        de la Ingeniería en Informática posea interés en sistemas
        informáticos, algoritmos y programación, software, hardware y
        sistemas de organización de datos.",
        "Al igual que las matemáticas, la informática no estudia fenómenos
        reales. Estas dos disciplinas tienen el privilegio de poder construir
        su propio mundo en forma de objetos abstractos. En matemáticas, son
        los números, las relaciones, las funciones, las transformaciones,
        etc. En informática se manipulan algoritmos, programas, árboles,
        pruebas, sistemas de reescritura, imágenes digitales y gráficos."
        ];
        break;
        case 'Psicologia':
        $list[] =  [
        "La psicología es la ciencia que analiza el comportamiento humano y
        los procesos mentales; se interesa en el estudio, análisis y
        comprensión de las personas. Si te atrae esta carrera compartimos
        contigo algunos datos importantes que te permitirán saber si la
        psicología es la profesión que estás buscando.",
        ""
        ];
        break;
        case 'Filosofia':
        $list[] =  [
        "Jiji no lo haga compa, echele ganas a las matematicas paro",
        ":v"
        ];
        break;
        default:
          $list[] = [
            "No se encontró una carrera que cumpla con tus resultados, sigue intentando",
            ""
          ];
        break;
      }
    }
    return $list;
  }

}
