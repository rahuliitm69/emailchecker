<?php

App::uses('AppModel', 'Model');

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{

    public $name = 'User';

    public $useTable = 'users';

   

public $validate = array (

   'email'=>array(

        'Valid email'=>array(

            'rule'=>array('email'),

            'message'=>'Please enter a valid Email address!'

        ),

        'Already exists'=>array(

            'rule'=>'isUnique',

            'message'=>'This Email is already registered in our database!'

        )

    ),

    'password'=>array(

        'Match password'=>array(

            'rule'=>'matchPasswords',

            'required' => true,

            'message'=>'Your passwords do not match!'

        )

    ),

);


public function matchPasswords($data){

    if ($data['password'] == $this->data['User']['confirm_password']){

        return true;

    } else {

        //$this->invalidate('confirm_password', 'Your passwords do not match!');

        return false;

    }

}    
    

public function beforeSave($options = array()) {

    if (isset($this->data[$this->alias]['password'])) {

        $passwordHasher = new SimplePasswordHasher();

        $this->data[$this->alias]['password'] = $passwordHasher->hash(

            $this->data[$this->alias]['password']

        );

    }

    return true;

}


/* Retrive Emails Analytics start */

public function getemailstotle($user_id)
{
    $totle = $this->query(" SELECT count(email_lists.id) as totle, email_lists.file_id FROM files_lists INNER JOIN email_lists ON email_lists.file_id = files_lists.id  WHERE files_lists.user_id = $user_id GROUP BY email_lists.file_id ");
   
    $tl = array();

    foreach($totle as $p)
    {
        $tl[$p["email_lists"]["file_id"]] = $p[0]["totle"];
    }
    return $tl;
}


public function getemailspass($user_id)
{
    $passed = $this->query(" SELECT count(email_lists.id) as passed, email_lists.file_id  FROM files_lists INNER JOIN email_lists ON email_lists.file_id = files_lists.id  WHERE files_lists.user_id = $user_id  AND result = 'passed' GROUP BY email_lists.file_id ");
    
    $pass = array();

    foreach($passed as $p)
    {
        $pass[$p["email_lists"]["file_id"]] = $p[0]["passed"];
    }
   return $pass;
}


public function getemailsfailed($user_id)
{
     $failed = $this->query(" SELECT count(email_lists.id) as failed, email_lists.file_id FROM files_lists INNER JOIN email_lists ON email_lists.file_id = files_lists.id  WHERE files_lists.user_id = $user_id  AND result = 'failed' GROUP BY email_lists.file_id ");
   
    $fail = array();

    foreach($failed as $p)
    {
        $fail[$p["email_lists"]["file_id"]] = $p[0]["failed"];
    }
    return $fail;
}

public function getemailsuknown($user_id)
{
    $unknown = $this->query(" SELECT count(email_lists.id) as unknown, email_lists.file_id FROM files_lists INNER JOIN email_lists ON email_lists.file_id = files_lists.id  WHERE files_lists.user_id = $user_id  AND result = 'unknown' GROUP BY email_lists.file_id ");
    
    $un = array();

    foreach($unknown as $p)
    {
        $un[$p["email_lists"]["file_id"]] = $p[0]["failed"];
    }
    return $un;
}

/* Retrive Emails Analytics End */

public function check_email_status($user_id)
{
    $date = date("Y-m-d");
    $email_data["rmg"] = $this->query(" SELECT count(id) as rmg FROM email_lists WHERE user_id = $user_id AND result = '' ");
    $email_data["passed"] = $this->query(" SELECT count(id) as passed FROM email_lists WHERE user_id = $user_id AND  created_date = '$date' AND result = 'passed' GROUP BY result ");
    $email_data["failed"] = $this->query(" SELECT count(id) as failed FROM email_lists WHERE user_id = $user_id AND  created_date = '$date' AND result = 'failed' GROUP BY result ");
    $email_data["unknown"] = $this->query(" SELECT count(id) as unknown FROM email_lists WHERE user_id = $user_id AND  created_date = '$date' AND result = 'unknown' GROUP BY result ");
    return $email_data;
}

public function get_module_key()
{
   return $this->query(" SELECT * FROM module_lists WHERE priority_order = 1 ");
}

/* DELETE DATA */
public function delete_data($m_id , $field , $tab)
{
    $msg = $this->query(" DELETE FROM $tab WHERE $field =  $m_id ");
    return "success";
}



}

?>