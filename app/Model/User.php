<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $hasMany = array(
	        'Book' => array(
	            'className' => 'Book',
							'foreignKey' => 'user_id',
							'order' => 'Book.created DESC',
	            'limit' => '5',
	            'dependent' => true
	        )
	    );

  public $validate = array(
         'email' => array(
             'required' => array(
                 'rule'    => array('email', true),
                 'message' => 'A username is required'
             )
         ),
         'password' => array(
             'required' => array(
                 'rule' => array('notEmpty'),
                 'message' => 'A password is required'
             )
         ),
     );

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new SimplePasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    return true;
	}
}