<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

//use Slim\Views\PhpRenderer;

session_start();

require_once '../vendor/autoload.php';
require_once '../Lib/CsrfMiddleware.php';

$app = new Slim\Slim( array(
        'templates.path' => '../templates'
    ));

$app->add(new Lib\CsrfMiddleware);

$app->get('/', function() use ($app){
	$req = $app->request;
    $base_url = $req->getUrl()."".$req->getRootUri()."/";

	$lista_empleados = json_decode(file_get_contents('../data/employees.json'));
    
    $error='';
    $resultado=array();
	if(isset($_SESSION['error'])){
		foreach ($_SESSION['error'] as $value) {
            $error.= '<p class="text-danger">'.$value.'</p>';
		}
		unset($_SESSION['error']);
	}else{

		if(isset($_SESSION['email'])){
			$email = $_SESSION['email'];
			$resultado =array_filter($lista_empleados, function($el) use ($email) {
		        return ( strpos($el->email, $email) !== false );
		    });
		    unset($_SESSION['email']);
		}
	}

    $app->render("header.php", array('base_url'=>$base_url));
    $app->render("index.php",array('lista_empleados' => $lista_empleados,'resultado'=>$resultado, 'error'=>$error,  'base_url'=>$base_url ));
    $app->render("footer.php");
});

$app->get('/detalle/:id', function ($id) use ($app) {
    
	$lista_empleados = json_decode(file_get_contents('../data/employees.json'));
    
    foreach ($lista_empleados as $value) {
    	if($value->id==$id){	
    		$data = array('name'=>$value->name,
						  'email'=>$value->email,
						  'phone'=>$value->phone,
						  'address'=>$value->address,
						  'position'=>$value->position,
						  'salary'=>$value->salary,
						  'skills'=>$value->skills);
    		break;
    	}
    }


	$req = $app->request;
    $base_url = $req->getUrl()."".$req->getRootUri()."/";

	$app->render("header.php", array('base_url'=>$base_url));
    $app->render('detalle.php', array('data' => $data,'base_url'=>$base_url));
    $app->render("footer.php");
});

$app->post('/buscar', function () use ($app) {
	
    $request = $app->request();
    $email = $request->post('email');

    if($email==''){
    	$_SESSION['error']['email']='No se ha ingresado ningun dato';
    }else{
    	$_SESSION['email']= $email;
    }
    $app->redirect('/');
});

$app->get('/servicio/:min/:max', function ($min,$max) use ($app) {
    
    $empleados = json_decode(file_get_contents('../data/employees.json'));

    $app->response->headers->set('Content-Type', 'text/xml');

    $msg='';
    $lista_empleados=array();
    if(is_numeric($min) and is_numeric($max)){
       if($min>$max){
       	 $msg = 'el ultimo parametro debe ser mayor que el primero';
       }
       else{
       	  foreach ($empleados as $value) {
       	  	$s = (string)$value->salary;
       	  	$t = explode('$',$s);
            $salary = str_replace(',','', $t[1]);

            if($salary>=$min and $salary<=$max){
            	$lista_empleados[] = $value;
            }
       	  }	
       }
    }
    else{
    	$msg = 'error en envio de parametros';
    }

    $app->render('layout.xml', array('lista_empleados' => $lista_empleados,'msg'=>$msg));

});

$app->run();
