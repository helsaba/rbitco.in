<?php
namespace app\controllers;
use lithium\storage\Session;
use app\models\Users;
use app\models\Details;
use app\models\Deals; //stores transaction for buy/sell 

use app\extensions\action\Functions;

class TransactController extends \lithium\action\Controller {

	public function index(){
	//list of all transactions
	
	}
	public function buy(){
		$user = Session::read('default');
		if ($user==""){		return $this->redirect('Users::index');}		
	
		$functions = new Functions();
		$wallet = $functions->getBalance($user['username']);
		// calculate Interest
		$word = $functions->number_to_words($wallet['wallet']['balance']);
		// calculate Interest
		return compact('wallet','word');
	

	}
	public function sell(){
		$user = Session::read('default');
		if ($user==""){		return $this->redirect('Users::index');}		
	
		$functions = new Functions();
		$wallet = $functions->getBalance($user['username']);
		$word = $functions->number_to_words(112);
		// calculate Interest
		return compact('wallet','word');
		
	
	}

}
?>