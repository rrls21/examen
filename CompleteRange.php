<?php

class CompleteRange
{

  public function build($list){
  	$nuevo = array();
  	if(is_array($list)){
  	   $inicio = $list[0];
       $fin = end($list);

       if($inicio<$fin){
	       for ($i=$inicio; $i<=$fin ; $i++) { 
	       	 $nuevo[]= $i;
	       }
	   }
  	}

    return $nuevo;
  }
}


$class = new CompleteRange();

echo 'Entrada : [1, 2, 4, 5] <br>';
$example = $class->build([1, 2, 4, 5]);
$i=0;
foreach ($example as $value) {
	++$i;
	if($i==1){ echo 'Salida : [';}
	if($i==count($example)){ echo $value.' ] <br><br>';}
	else{ echo $value.',';}
}

echo 'Entrada : [2, 4, 9] <br>';
$example = $class->build([2, 4, 9]);
$i=0;
foreach ($example as $value) {
	++$i;
	if($i==1){ echo 'Salida : [';}
	if($i==count($example)){ echo $value.' ] <br><br>';}
	else{ echo $value.',';}
}


echo 'Entrada : [55, 58, 60] <br>';
$example = $class->build([55, 58, 60]);
$i=0;
foreach ($example as $value) {
	++$i;
	if($i==1){ echo 'Salida : [';}
	if($i==count($example)){ echo $value.' ] <br><br>';}
	else{ echo $value.',';}
}