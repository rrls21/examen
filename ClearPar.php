<?php

class ClearPar
{

  public function build($cadena){

    $parentesis = array('(',')');
    $resultado='';
    for($i=0;$i<strlen($cadena);$i++)
	{   
		if(!is_numeric($cadena[$i]) and in_array($cadena[$i], $parentesis) ){
		    if($cadena[$i]=='(' and $cadena[$i+1]==')'){
		    	$resultado.= '()';
		    }

		}
	}

	return $resultado;

  }

}


$class = new ClearPar();

echo 'Entrada : ()())() <br>';
echo 'Salida : '.$class->build('()())()').'<br><br>';
echo 'Entrada : ()(() <br>';
echo 'Salida : '.$class->build('()(()').'<br><br>';
echo 'Entrada : )( <br>';
echo 'Salida : '.$class->build(')(').'<br><br>';
echo 'Entrada : ((() <br>';
echo 'Salida : '.$class->build('((()').'<br><br>';