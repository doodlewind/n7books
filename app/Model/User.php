<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $hasMany = array(
	        'Book' => array(
	            'className' => 'Book',
							'foreignKey' => 'user_id',
							'order' => 'Book.created DESC',
	            'dependent' => true
	        ),
	        'Follow' => array(
	            'className' => 'Follow',
							'foreignKey' => 'user_id',
							'order' => 'created DESC',
	            'dependent' => true
	        ),
	        'Booklist' => array(
	            'className' => 'Booklist',
				'foreignKey' => 'grade'
	        )
	    );

  public $validate = array(
         'email' => array(
             'required' => array(
                 'rule'    => array('email', true),
                 'message' => '亲爱的学霸，email 是必填的...'
             )
         ),
         'password' => array(
             'required' => array(
                 'rule' => array('minLength', '6'),
                 'message' => '亲爱的学霸，密码是必填的...'
             )
         )
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