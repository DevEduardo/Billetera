<?php

//HELPERS PARA CAMBIAR EL FORMATO DE LA FECHA A SQL
function fecha($fecha)
{

    list($dia,$mes,$anio) = explode('-',$fecha);

    $fecha = $anio.'-'.$mes.'-'.$dia;

    return $fecha;

}

function date_full($date)
{

  //$fech = fecha($date);

  list($anio,$mes,$dia) = explode('-',$date);

  $mes = month($mes);
  $date = $dia.' de '.$mes.' del '.$anio;

  return $date;
}

function timestamp($fecha)
{

  $fecha1 = date("d-m-Y",strtotime($fecha));

  list($dia,$mes,$anio) = explode('-',$fecha1);

  $mes = month($mes);

  $date = $dia.' de '.$mes.' del '.$anio;


  return $date;
}

//HELPERS PARA CAMBIAR EL FORMATO DE LA FECHA USUARIO
function fechaU($fecha)
{

    list($dia,$mes,$anio) = explode('-',$fecha);

    $fecha = $dia.'-'.$mes.'-'.$anio;

    return $fecha;

}

function age($fecha){

    list($dia,$mes,$anio) = explode('/',$fecha);

    $fecha = $anio.'-'.$mes.'-'.$dia;

    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha;
    return $edad;
}

function age2($fecha){

    // list($dia,$mes,$anio) = explode('-',$fecha);
    //
    // $fecha = $anio.'-'.$mes.'-'.$dia;

    $fecha = date('Y-m-d',strtotime($fecha));
    $hoy = date('Y-m-d');
    $edad = $hoy - $fecha;
    return $edad;
}


//HELPERS PARA VERIFICAR EL CODIGO DEL OBRERO
function codigo($codigo)
{


    switch ($codigo) {
      case '1':
        return 'OF';
        break;

      case '2':
        return 'OS';
        break;

      case '3':
        return 'BE';
        break;

      case '4':
        return 'OP';
        break;

      case '5':
        return 'OB';
        break;

      default:
        return 'null';
        break;
    }
}

function estadoCivil($estadoCivil){
    switch ($estadoCivil) {
      case '0':
        return 'Casado';
        break;

      case '1':
        return 'Soltero';
        break;

      case '0':
        return 'Divorciado';
        break;

      default:
        return 'No especificado';
        break;
    }
}

function dependence($dependences){

  switch ($dependences) {

    case '1':
      return 'GOBERNACION DEL ESTADO';
      break;

    case '2':
      return 'CORMETUR';
      break;

    case '3':
      return 'IBIME';
      break;

    default:
      return 'No tiene asignada dependencia';
      break;
  }

}

function condition($terms){

  switch ($terms) {

    case '0':
      return 'Contratado';
      break;

    case '1':
      return 'Fijo';
      break;

    default:
      return 'No se le asigno condicion';
      break;
  }
}

function ifNot($answer){

  switch ($answer) {

    case '1':
      return 'SI';
      break;

    case '0':
      return 'NO';
      break;

    default:
      # code...
      break;
  }

}

function month($months){

  switch ($months) {

    case '02':
      return 'Enero';
      break;

    case '01':
      return 'Febrero';
      break;

    case '03':
      return 'Marzo';
      break;

    case '04':
      return 'Abril';
      break;

    case '05':
      return 'Mayo';
      break;

    case '06':
      return 'Junio';
      break;

    case '07':
      return 'Julio';
      break;

    case '08':
      return 'Agosto';
      break;

    case '09':
      return 'Septiembre';
      break;

    case '10':
      return 'Octubre';
      break;

    case '11':
      return 'Noviembre';
      break;

    case '12':
      return 'Diciembre';
      break;

    default:
      # code...
      break;
  }

}

function towns($towns)
{

  switch ($towns) {

    case '179':
      return 'Alberto Adriani';
      break;

    case '180':
      return 'Andrés Bello';
      break;

    case '181':
      return 'Antonio Pinto Salinas';
      break;

    case '182':
      return 'Aricagua';
      break;

    case '183':
      return 'Arzobispo Chacón';
      break;

    case '184':
      return 'Campo Elías';
      break;

    case '185':
      return 'Caracciolo Parra Olmedo';
      break;

    case '186':
      return 'Cardenal Quintero';
      break;

    case '187':
      return 'Guaraque';
      break;

    case '188':
      return 'Julio César Salas';
      break;

    case '189':
      return 'Justo Briceño';
      break;

    case '190':
      return 'Libertador';
      break;

    case '191':
      return 'Miranda';
      break;


    case '192':
      return 'Obispo Ramos de Lora';
      break;

    case '193':
      return 'Padre Noguera';
      break;

    case '194':
      return 'Pueblo Llano';
      break;

    case '195':
      return 'Rangel';
      break;

    case '196':
      return 'Rivas Dávila';
      break;

    case '197':
      return 'Santos Marquina';
      break;

    case '198':
      return 'Sucre';
      break;

    case '199':
      return 'Tovar';
      break;

    case '200':
      return 'Tulio Febres Cordero';
      break;

    case '201':
      return 'Zea';
      break;

    default:
      # code...
      break;
  }

}

function tipoBeca($beca)
{

  switch ($beca) {
    case '0':
      return 'PRIMARIA';
      break;

    case '1':
      return 'SECUNDARIA';
      break;

    case '2':
      return 'UNIVERSITARIA';
      break;

    case '3':
      return 'Pre-escolar';
      break;

    default:
      # code...
      break;
  }

}

function generateCode($longitud) {

   $key = '';
   $pattern = '123456789ACDEFGHIJKLMNPQRSTUVWXYZ';
   $max = strlen($pattern)-1;

   for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};

   return $key;

}


function parentesco($parentesco)
{
  switch ($parentesco) {
    case '0':
      return 'Esposo (a)';
      break;
    case '1':
      return 'Madre';
      break;
    case '2':
      return 'Padre';
      break;
    case '3':
      return 'Hijo (a)';
      break;

    default:
      # code...
      break;
  }
}

function monto($monto)
{
    if ($monto) {
      $monto=number_format($monto,2,",", ".");
      return $monto;
    }else {
      return 0;
    }

}

function remp($text)
{
  $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
// $text = strtolower($text);
$patron = array (
    // Espacios, puntos y comas por guion
    //'/[\., ]+/' => ' ',

    // Vocales
    '/\+/' => '',
    '/&agrave;/' => 'a',
    '/&egrave;/' => 'e',
    '/&igrave;/' => 'i',
    '/&ograve;/' => 'o',
    '/&ugrave;/' => 'u',

    '/&aacute;/' => 'a',
    '/&eacute;/' => 'e',
    '/&iacute;/' => 'i',
    '/&oacute;/' => 'o',
    '/&uacute;/' => 'u',

    '/&acirc;/' => 'a',
    '/&ecirc;/' => 'e',
    '/&icirc;/' => 'i',
    '/&ocirc;/' => 'o',
    '/&ucirc;/' => 'u',

    '/&atilde;/' => 'a',
    '/&etilde;/' => 'e',
    '/&itilde;/' => 'i',
    '/&otilde;/' => 'o',
    '/&utilde;/' => 'u',

    '/&auml;/' => 'a',
    '/&euml;/' => 'e',
    '/&iuml;/' => 'i',
    '/&ouml;/' => 'o',
    '/&uuml;/' => 'u',

    '/&auml;/' => 'a',
    '/&euml;/' => 'e',
    '/&iuml;/' => 'i',
    '/&ouml;/' => 'o',
    '/&uuml;/' => 'u',

    // Otras letras y caracteres especiales
    '/&aring;/' => 'a',
    '/&ntilde;/' => 'n',

    // Agregar aqui mas caracteres si es necesario

);

$text = preg_replace(array_keys($patron),array_values($patron),$text);
return $text;
}
