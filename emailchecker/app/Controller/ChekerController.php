<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
//App::uses('Paypal', 'Paypal.Lib');


class CheckerController extends AppController {

    public $components = array('Cookie', 'Session', 'Auth');

   

    public function index()
    {
    	

        
    }

   

}

 ?>