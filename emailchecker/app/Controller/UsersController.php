<?php ob_start();

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
//App::uses('Paypal', 'Paypal.Lib');


class UsersController extends AppController {

    public $components = array('Cookie', 'Session', 'Auth');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->loginRedirect = array('action' => 'login');
        $this->Auth->logoutRedirect = array('action' => 'login');
        $this->Auth->allow('login', 'register');
        //$this->Auth->userModel = 'User';
    }

    public function dashboard()
    {   
        $this->loadModel("FileList");
        $this->loadModel("EmailList");

        $user_id = (int) $this->Auth->user("id");

    	if(isset($_POST["varify"]))
        {
            $file_id = (int) $_POST["file_id"];
            $file_emails = $this->EmailList->find("all", array("conditions" => array("file_id" => $file_id)));
                
            foreach($file_emails as $se)
            {   
                $email = $se["EmailList"]["email"];
                $id =  $se["EmailList"]["id"];
                $this->check_email($email, $id);
            }
        }

        $file_data = $this->FileList->find("all", array("conditions" => array("user_id" => $user_id)));
        $email_data = $this->EmailList->find("all", array("conditions" => array("user_id" => $user_id, "result !=" => "")));
        
        $totle = $this->User->getemailstotle($user_id);
        $passed = $this->User->getemailspass($user_id);
        $failed = $this->User->getemailsfailed($user_id);
        $unknown = $this->User->getemailsuknown($user_id);
        
        $data = $this->User->check_email_status($user_id);
        $this->set("data", $data);
        $this->set("file_data", $file_data);
        $this->set("email_data", $email_data);
        $this->set("totle", $totle);
        $this->set("passed", $passed);
        $this->set("failed", $failed);
        $this->set("unknown", $unknown);
    }

    public function dashboardold()
    {
        # code...
    }


    public function login(){
        $this->set('page', 'login');
        $login_user = $this->Session->read("user");

        if (!empty($login_user)) {
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
        	$email = $this->request->data["User"]["email"];
            $record = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $email,
                )
            ));

            if (empty($record)) {

                return $this->set('message', 'Invalid Email or password, try again');
            }
            $status = $record['User']['status'];
            $roll = $record["User"]["roll"];
            if ($status == 1) {
                return $this->set('message', 'Please varifiy your email id first');
            }
            $this->Auth->authenticate['Form'] = array('fields' => array('username' => 'email', 'password' => 'password'));

            if ($this->Auth->login()) {
				    $user = $this->Auth->user();
                    $this->Session->write('user', $user);
                    return $this->redirect('/dashboard');
                }else
                {
					return $this->set('message', 'Invalid Email or password, try again');
                } 
            }else {
                return $this->set('message', 'Invalid Email or password, try again');
            }
        }

        public function register() {
            if (!empty($this->data)) {
                $data = $this->data;
                $data['created_date'] = date("Y-m-d H:i:s");
                $data['modify_date'] = date("Y-m-d H:i:s");
                $data['status'] = 2;
                $data['roll'] = 2;
                $this->User->create();
                if ($this->User->save($data)) {
                    	$lid = (int) $this->User->getLastInsertID();
                    	$message = "Register Successfully";
                	}    
                } else {
                    $error = $this->User->validationErrors;
                    $message = "There is some problem while creating your account";
                }

                $this->set('message', $message);
                $this->render("login");
        }


        public function cheker() 
        {
            $user_id = (int) $this->Auth->user("id");
            $data = $this->User->check_email_status($user_id);
            $this->set("data", $data);
        }

        public function verify()
        {   
            $this->loadModel("EmailList");
            $user_id = (int) $this->Auth->user("id");

            $module_key = $this->User->get_module_key();
            $email = $_POST["email"];
            // set the api key and email to be validated
            $key = $module_key[0]["module_lists"]["api_key"];
            $url = $module_key[0]["module_lists"]["provider"];

            // use curl to make the request
            $url = $url.'?key='.$key.'&email='.$email;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
            curl_setopt($ch, CURLOPT_TIMEOUT, 15); 
            $response = curl_exec($ch);
            curl_close($ch);

            // decode the json response
            $json = json_decode($response, true);

            // easily access each string
            $status   = $json['status'];
            $event    = $json['event'];
            $details  = $json['details'];

            // if address is failed, alert the user they entered an invalid email
            if($status == 'failed'){
                $message = "failed";
            // send alert
            }
            else
            {
                $message = "passed";
            }

            /* Insert Data InTo email_lists table   */
            $insert = array();
            $insert["user_id"] =  $user_id;
            $insert["email"] = $email;
            $insert["result"] = $message;
            $insert["status"] = 2;
            $insert["created_date"] = date("Y-m-d");

            $this->EmailList->create();
            $this->EmailList->save($insert);

            /* Send Response  of ajax */
            $this->set("message",$message);
            $this->set("_serialize",array('message'));
            $this->response->statusCode(200);

        }


	    public function logout() {
	        $this->Auth->logout();
	        $this->Session->destroy();
	        return $this->redirect('/');
	    }


        /* Import Email */

        public function importemail()
        {   
            $this->loadModel("FileList");
            $user_id = (int) $this->Auth->user("id");

            if($_FILES["importfile"]["size"] > 0)
            {   
                /* save file name */
                $filename = $_FILES['importfile']['name'];
                $fn =  array();
                $fn["user_id"] = $user_id;
                $fn["file_name"] = $filename;
                $fn["status"] = 1;
                $fn["created_date"] = date("Y-m-d");

                $this->FileList->create();
                $this->FileList->save($fn);
                $f_id = $this->FileList->getLastInsertID();
                 /* save file name */

                $tmp_file = $_FILES['importfile']['tmp_name'];
                $ext = @end(explode(".", $filename));
                if($ext == "txt")
                {
                    $email_str = file_get_contents($tmp_file);
                    $email_str = trim($email_str);
                    $email_data = explode(",", $email_str);

                    foreach($email_data as $email)
                    {
                        $email = trim($email);
                        if(!empty($email))
                        {
                            $this->saveemail($email, $f_id);    
                        }
                        
                    }

                }elseif($ext == "csv")
                {

                    $file = fopen($tmp_file,"r");
                    while (($row = fgetcsv($file)) !== FALSE) {
                            if($row[0] != "Email")
                            {
                                $email = $row[0];
                                if(!empty($email))
                                {
                                    $this->saveemail($email, $f_id);    
                                }
                                
                            }
                    }
                }   
                
            }
            $this->Session->setFlash('Import Successfully', 'default', array(), 'good');
            $this->redirect("/dashboard");
            
        }

        /* Export Mail */

        public function export()
        {   
            $this->loadModel("FileList");
            $this->loadModel("EmailList");

            
            $f_id = $_GET["t_id"];
            $filename = "email_".time()."_".$f_id.".csv";
            $email_data = $this->EmailList->find('all',array('fields'=>array('email','result'), "conditions" => array("file_id" => $f_id)));
            $e_array = array();

            foreach($email_data as $email)
            {
                $email_array = array();
                $email_array[] = $email["EmailList"]["email"];
                $email_array[] = $email["EmailList"]["result"];
                array_push($e_array, $email_array); 
            }
            
            // output headers so that the file is downloaded rather than displayed
            header('Content-Type: text/csv; charset=utf-8');
            header("Content-Disposition: attachment; filename = $filename");
            // Disable caching
            // header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
            // header("Pragma: no-cache"); // HTTP 1.0
            // header("Expires: 0"); 
            
            // create a file pointer connected to the output stream
           $output = fopen("php://output", 'w');
            
            // output the column headings
           //fputcsv($output, array('Email', 'Status'));


            foreach($e_array as $ea)
            {
                fputcsv($output, $ea);
            }

            fclose($output);
            exit();
        }


        /* SAve Email in database */
        public function saveemail($email , $f_id)
        {
            $this->loadModel("EmailList");
            $user_id = (int) $this->Auth->user("id");

            $insert = array();
            $insert["user_id"] =  $user_id;
            $insert["file_id"] =  $f_id;
            $insert["email"] = $email;
            $insert["status"] = 2;
            $insert["created_date"] = date("Y-m-d H:i:s");

            $this->EmailList->create();
            $this->EmailList->save($insert);
            $lid =  $this->EmailList->getLastInsertID();
            return "";
        }


        /* Verify Email */

        public function check_email($email, $id)
        {
            $this->loadModel("EmailList");
            $email = $email;
            $module_key = $this->User->get_module_key();
            // set the api key and email to be validated
            $key = $module_key[0]["module_lists"]["api_key"];
            $url = $module_key[0]["module_lists"]["provider"];


            // use curl to make the request
            $url = $url.'/?key='.$key.'&email='.$email;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
            curl_setopt($ch, CURLOPT_TIMEOUT, 15); 
            $response = curl_exec($ch);
            curl_close($ch);

            // decode the json response
            $json = json_decode($response, true);

            // easily access each string
            $status   = $json['status'];
            $event    = $json['event'];
            $details  = $json['details'];

            /* Insert Data InTo email_lists table   */
           
            $this->EmailList->id = $id;
            $this->EmailList->saveField("result", $status);
            return "";
        }

        public function delete()
        {
            if($this->RequestHandler->isAjax())
            {
                $m_id = (int) $this->data["m_id"];
                $field =  $this->data["field"];
                $tab =  $this->data["tab"];

                $msg = $this->User->delete_data($m_id , $field , $tab);

                 /* Send Response  of ajax */
                $this->set("message",$msg);
                $this->set("_serialize",array('message'));
                $this->response->statusCode(200);

            }
        }

}

 ?>