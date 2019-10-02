<?php

namespace App\Http\Controllers;


class StatusExamen
{
  static public function haveExam($examen){
    if($examen == 0){
      return false;
    }
    return true;
  }

}
