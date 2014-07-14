<?php
class Book extends AppModel {
	public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'));
	
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty'
	        ),

	    );
	
	public function beforeSave($options = array()) {
		if (isset($this->data['Book']['update']) && $this->data['Book']['update']=='1'){
			$douban = new Douban();
			$this->data['Book']['cover'] = $douban->pattern($this->data['Book']['title'], $this->data['Book']['author']);
		}
	    return true;
	}
	
	public function isOwnedBy($book, $user) {
	    return $this->field('id', array('id' => $book, 'user_id' => $user)) !== false;
	}
}