<?php
class Book extends AppModel {
	public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'));
	
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty'
    ));

	public function beforeSave($options = array()) {
		//replace all [ ] : ` ~ " ' @ ^ & * ：/
		$this->data['Book']['title'] = preg_replace('/[\[:\/：\]\`~\'@^&*"]/u', ' ',
		$this->data['Book']['title'] );
		
		if (isset($this->data['Book']['update']) && $this->data['Book']['update']=='1'){
			$douban = new Douban();
			$this->data['Book']['cover'] = $douban->pattern($this->data['Book']['title'], $this->data['Book']['author']);
		}else $this->data['Book']['cover'] = '';
		
		if (isset($this->data['Book']['price']) && $this->data['Book']['price']=='') {
			$this->data['Book']['price'] = '0';
		}
		
	    return true;
	}

}