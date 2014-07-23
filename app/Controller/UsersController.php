<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
	public $helpers = array('Html', 'Form');
	
	private function newPassword($length) {
		$str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randString = '';
		$len = strlen($str)-1;
		for($i = 0; $i < $length; $i ++){ 
			$num = mt_rand(0, $len);
			$randString.= $str[$num]; 
		} 
		return $randString ;
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'view', 'reset');
	}

	public function welcome() {
		return;
	}
	
	public function login() {
		$this->set('title_for_layout', '-登陆');
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
		        return $this->redirect($this->Auth->redirect());
		    } else
		        $this->Session->setFlash(__('不匹配啊...'));
		}
	}
	
	public function reset() {
		if (isset($this->request->data['User']['email'])) {
			$user = $this->User->findByEmail($this->request->data['User']['email']);
			if (!isset($user['User']['id'])) {
				$this->Session->setFlash(__('奇怪的账号:-( '));
				return;
			}
			$user['User']['password'] = $this->newPassword(10);
			$this->User->save($user);
			
		    $email = new CakeEmail('default');
		       $email->config('default');
		       $email->to($this->request->data['User']['email']);
		       $email->subject('New Password');
		       $email->send('Your new password is '.$user['User']['password']);
			$this->Session->setFlash(__('已将新密码发送至该邮箱。若未收到，请检查垃圾箱，或将 note@bookface.ustc.edu.cn 添加至白名单。'));
			return $this->redirect(array('action' => 'login'));
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function index() {
		//踢出未登录用户
		$user_id = $this->Auth->user('id');
		if (!$user_id) {
			return $this->redirect(array('action' => 'login'));
		}
		//
		$this->set('title_for_layout', '-'.$this->Auth->user('username'));
		//通过匹配Auth的user_id，获得用户书籍信息
		$this->set('user', $this->User->findById($user_id));

	}

	public function view($id = null) {
		if (!isset($id)) {
			$this->Session->setFlash(__('你访问的用户不存在..。 :-( )'));
			return $this->redirect(array('controller'=>'books', 'action' => 'index'));
		}
		$user = $this->User->findById($id);
		
		if(!isset($user)) {
			return $this->redirect(array('controller'=>'books', 'action' => 'index'));
		}
		$this->set('user', $user);
		
	}
	
	public function add() {
		$this->set('title_for_layout', '-注册');
		if ($this->request->is('post')) {
	    	$this->User->create();
			$username = $this->request->data['User']['username'];
	    	if ($this->User->save($this->request->data)) {
				$this->Auth->login();
	        	$this->Session->setFlash(__($username.'，欢迎来到南七书摊！'));
	        	return $this->redirect(array('controller'=>'users', 'action' => 'guide'));
	    	}
	    	$this->Session->setFlash(
	        	__('更改无法保存...请重试')
	    	);
		}
	}

	public function edit($id = null) {
    	if ($this->User->save($this->request->data)) {
        	$this->Session->setFlash(__('更改已保存'));
        	return $this->redirect(array('action' => 'index'));
    	}
    	$this->Session->setFlash(
        	__('未保存...')
    	);
			return $this->redirect(array('action' => 'index'));

	}
	
	public function guide() {
		$id = $this->Auth->user('id');
		if(!$this->request->data){
			$id = $this->Auth->user('id');
			$this->set('id', $id);
			$data = $this->User->findById($id);
			$this->set('data', $data);
			return;
		}
		else {
			$this->request->data['User']['id'] = $id;
	    	if ($this->User->save($this->request->data)) {
	        	$this->Session->setFlash(__('谢谢，更改已保存'));
	        	return $this->redirect(array('controller' => 'books', 'action' => 'index'));
	    	}
	    	$this->Session->setFlash(
	        	__('未保存...')
	    	);
				return $this->redirect(array('controller' => 'books','action' => 'index'));
		}
	}
	/*
	public function delete($id = null) {
		$this->request->onlyAllow('post');

		$this->User->id = $id;
		if (!$this->User->exists()) {
		    throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
		    $this->Session->setFlash(__('User deleted'));
		    return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
	*/
}