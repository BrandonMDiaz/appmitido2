<?php
namespace App\CustomClass;
/*
  Esta clase deberia de llamarse Modulo de conocimiento, y tener un array con
  objetos de otra clase llamada reglas, sin embargo no soy tan crack aun con
  esto de sistemas basados en conocimiento y me falta tiempo
  */
class ModuloConocimiento
{
  public $reglas = [
    'Paciente = Leer & adaptarse',
    ' = Leer & adaptarse',
    'intrapersonal = Leer & adaptarse',
    'intrapersonal = Leer & adaptarse',
    'intrapersonal = Leer & adaptarse',
    'intrapersonal = Leer & adaptarse',
    'lingüístico-verbal = Leer & bueno para hablar & redactar documentos',
    'lógico-matemático = pensamiento abstracto & gusto por matemáticas & física & lógica & resolución de problemas & componentes físicos',
    'espacio-visual = lugares abiertos & bueno diseñando & observación & imaginativo',
    'interpersonal = adaptarse & ayudar a los demás & liderazgo & trabajo en equipo',
    'creativa = leer & bajo presión & bueno diseñando & imaginativo & gusto por la innovación',
    '@ Arquitectura = espacio-visual & lógico-matemático & creativa',
    '@ Civil = lógico-matemático & espacio-visual & interpersonal',
    '@ Electrónico = lógico-matemático & interpersonal',
    '@ Informática = lógico-matemático & creativa',
    '@ Derecho = lingüístico-verbal & interpersonal',
    '@ Psicologia = interpersonal & intrapersonal',
    '@ Filosofia = intrapersonal & espacio-visual',
  ];

  function __construct($arrayReglas = null)
  {
    if($arrayReglas != null){
      $this->reglas = $arrayReglas;
    }
  }

  function getCarrera($memoria){

  }

  function loadRules(){
      //cargar las reglas que tenemos en la bd
  }

  function addRule($regla){
    $this->reglas[] = $regla;
    //agregar regla
  }

}
