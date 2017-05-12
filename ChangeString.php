<?php 

class ChangeString
{

  public function build($cadena){

    for($i=0;$i<strlen($cadena);$i++)
	{
		$abecedario = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z',
			                'A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z');

		if(!is_numeric($cadena[$i]) and in_array($cadena[$i], $abecedario) ){
		    $clave = array_search($cadena[$i], $abecedario);
		    if(is_numeric($clave)){
		   	  if($cadena[$i]=='z'){$clave=0;}
		   	  elseif($cadena[$i]=='Z'){$clave=27;}
		      else{$clave++;}
		    }
		    echo $abecedario[$clave];
		    $clave=0;
		}else{
		   echo $cadena[$i];
		}
	}

  }

}


$class = new ChangeString();

echo '123 abcd*3 <br>';
echo  $class->build('123 abcd*3').'<br><br>';
echo '**Casa 52 <br>';
echo  $class->build('**Casa 52').'<br><br>';
echo '**Casa 52Z <br>';
echo  $class->build('**Casa 52Z');