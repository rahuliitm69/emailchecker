<?php

App::uses('AppModel', 'Model');

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Admin extends AppModel{

    public $name = 'Admin';

    public $useTable = 'admins';

    public $validate = array (
    
        'password'=>array(
            'Match password'=>array(
                'rule'=>'matchPasswords',
                'required' => true,
                'message'=>'Your passwords do not match!'
            )
        ),

        'email' => array(
                'email' => array(
                        'rule'    => array('email'),
                        'message' => 'Please enter a valid email address.'
                    ),
                'uniq' => array(
                        'rule' => 'isUnique',
                        'message' => 'This Mail Address is already used'
                    )
        )
    );

    public function matchPasswords($data){
        if ($data['password'] == $this->data['Admin']['confirm_password']){
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


    public function delete_data($m_id , $field , $tab)
    {
        $msg = $this->query(" DELETE FROM $tab WHERE $field =  $m_id ");

        return "success";
        
    }
    

}

?>