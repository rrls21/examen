<?php 

namespace Lib;

class CsrfMiddleware extends \Slim\Middleware
{
	protected $key = 'csrf_token';

	public function call(){
	   $this->app->hook('slim.before',[$this,'check']);
	   $this->next->call();
	}

	public function check(){
	   if(!isset($_SESSION[$this->key])){
	       $_SESSION[$this->key] = sha1(microtime(true).rand(10000,99999));
	   }

	   $token = $_SESSION[$this->key];

	   if(in_array($this->app->request->getMethod(),['POST','PUT','DELETE'])){
	   	   $submittedToken = $this->app->request()->post($this->key);
	   	   if($token!==$submittedToken){
	   	   	 $_SESSION['error']['error_csrf']='Error al enviar el request';
	   	   	 $this->app->redirect('/');
	   	   }

	   }

	   $this->app->view()->appendData([
	      'csrf_key' => $this->key,
	      'csrf_token' => $token,
	   ]);
	}
}