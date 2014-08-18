<?php

class Book extends AppModel {
	public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'));
	
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty'
    ));

}