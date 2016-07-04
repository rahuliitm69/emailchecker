<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
//App::uses('Paypal', 'Paypal.Lib');


class AdminsController extends AppController {

    public $components = array('Cookie', 'Session', 'Auth');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->loginRedirect = array('action' => 'login');
        $this->Auth->logoutRedirect = array('action' => 'login');
        $this->Auth->allow('view', 'login');
        $this->Auth->userModel = 'Admin';
        $this->layout = 'admin_default';
    }


    public function index()
    {
    	return $this->redirect('/admins/dashboard');
    }

    public function view() {
      $login_user = $this->Session->read("admin");
      if (!empty($login_user)) {
          return $this->redirect('/admins/dashboard');
       }
      $this->set('page', 'view');
      $this->layout = 'admin_default'; 
    }


    public function login()
    {
        $login_user = $this->Session->read("admin");
        if (!empty($login_user)) {
          return $this->redirect('/admins/dashboard');
            }
            if ($this->request->is('post')) {
                $email = $this->request->data["email"];
                $pass = $this->request->data["password"];
                $haspass = $this->Auth->password($pass);
                $record = $this->Admin->find('first', array(
                    'conditions' => array(
                        'Admin.email' => $email,
                        'Admin.password' => $haspass,
                    )
                ));
             
            if (empty($record)) {

                return $this->set('message', 'Invalid Email or Password, try again');
            }

            $status = $record['Admin']['status'];
            $roll = $record['Admin']['roll'];
            $id = (int) $record["Admin"]["id"];
          
            if ($status == "1") {
             return $this->set('message', 'Please varifiy your Email first');
            }
            if($roll == "1")
            {
                $this->Auth->authenticate['Form'] = array('fields' => array('email' => 'email', 'password' => 'password'));
                
                $this->request->data['Admin']['id'] = $record['Admin']['id'];
                
                if ($this->Auth->login($this->request->data['Admin'])) {
                    $user = $this->Auth->user();
                    $this->Session->write('admin', $record);
                    return $this->redirect('/admins/dashboard');
                } else {
                    return $this->set('message', 'Invalid Email or Password, try again');
                   //return $this->Session->setFlash(__('Invalid Email or password, try again'));
                }
            }else
            {
                return $this->set('message', 'Invalid Email or Password, try again');
            }
        }else{
            
            return $this->redirect('/admins');
        }
    }


    public function dashboard()
    {
    	# code...
    }

    public function modules()
    {
    	$this->loadModel("Module");

        $modules = $this->Module->find("all");
        $this->set("modules" , $modules);
    }

    public function addmodules()
    {   
        $this->loadModel("Module");

    	if ($this->request->is('post')) {

            $data = $this->request->data;
            $user_id = (int) $this->Auth->user("id");
            $data["status"] = 2;

            if(isset($data["id"]))
            {
                $id = (int) $data["id"];
                unset($data["id"]);
                $this->Module->id = $id;
                if($this->Module->save($data))
                {
                    $this->Session->setFlash('Module Updated Successfully', 'default', array(), 'good');
                }else
                {
                    $this->Session->setFlash('Some Error Occoure While Updating Module', 'default', array(), 'good');
                }
            }else
            {
                $data["user_id"] = $user_id;
                $data["created_date"] = date("Y-m-d H:i:s");
                $this->Module->create();
                if($this->Module->save($data))
                {
                    $this->Session->setFlash('Module Added Successfully', 'default', array(), 'good');
                }else
                {
                    $this->Session->setFlash('Some Error Occoure While Adding Module', 'default', array(), 'good');
                }
            }

            $this->redirect("/admins/modules");
        }elseif(isset($_GET["id"]))
        {
            $m_id = (int) base64_decode($_GET["id"]);

            $modules = $this->Module->find("first", array("conditions" => array("id" => $m_id)));
            //echo "<pre>"; print_r($modules); die();
            $this->set("modules" , $modules);
        }
    }

    public function members()
    {
        $this->loadModel("User");

        $user_data = $this->User->find("all");
        $this->set("user_data", $user_data);
    }

    /* Add, Edit And View Members  */
    
    public function memberaction()
    {
        $this->loadModel("User");

       if ($this->request->is('post')) {
             $data = $this->request->data;
             
             if(isset($data["id"]))
             {  
                $id = (int) $data["id"];
                unset($data["id"]);

                if($data["password"] == "")
                {
                    unset($data["password"]);
                    unset($data["confirm_password"]);
                }

                $this->User->id = $id;
                if($this->User->save($data))
                {
                    $this->Session->setFlash('Member Updated Successfully', 'default', array(), 'good');
                }else
                {
                   $this->Session->setFlash('Some Error Occoure While Updating Member', 'default', array(), 'good'); 
                }
             }else
             {
                $data['created_date'] = date("Y-m-d H:i:s");
                $data['modify_date'] = date("Y-m-d H:i:s");
                $data['status'] = 2;
                $data['roll'] = 2;
                $this->User->create();
                if ($this->User->save($data)) {
                        $this->Session->setFlash('Member Save Successfully', 'default', array(), 'good');
                }else 
                {
                    $this->Session->setFlash('Some Error Occoure While Saving Member', 'default', array(), 'good'); 
                }
             }

             $this->redirect("/admins/members");

       }elseif(isset($_GET["id"]))
        {
            $id = (int) base64_decode($_GET["id"]);
            $member = $this->User->find("first", array("conditions" => array("id" => $id)));
            $this->set("member" , $member);
        }elseif(isset($_GET["v"]))
        {
            $id = (int) base64_decode($_GET["v"]);
            $view = $this->User->find("first", array("conditions" => array("id" => $id)));
            $this->set("mview" , $view);
        }
    }

    /* Check Exist Email */
    public function check_email()
    {   
        $this->loadModel("User");

        if($this->RequestHandler->isAjax())
        {
            $email = $this->request->data["email"];

            $users = $this->User->find('first', array('conditions' => array('email' => $email)));

            if(!empty($users))
            {
                $message = "exist";
            }else{
                $message = "notexist";
            }

            $this->set("message",$message);
            $this->set("_serialize",array('message'));
            $this->response->statusCode(200);
        }
    }



    public function logout() {
        $this->Auth->logout();
        $this->Session->destroy();
        return $this->redirect('/admins/');
    }


    /* Default function for all Delete Items */

    public function delete()
    {
        if($this->RequestHandler->isAjax())
        {
            $m_id = (int) $this->data["m_id"];
            $field =  $this->data["field"];
            $tab =  $this->data["tab"];

            $msg = $this->Admin->delete_data($m_id , $field , $tab);

             /* Send Response  of ajax */
            $this->set("message",$msg);
            $this->set("_serialize",array('message'));
            $this->response->statusCode(200);

        }
    }


}

?>