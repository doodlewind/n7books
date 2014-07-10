<?php
// app/Controller/UsersController.php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
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

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function index() {
		//踢出未登录用户
		$user_id = $this->Auth->user('id');
		if (!$user_id) {
			throw new NotFoundException(__('Invalid user'));
		}
		//
		$this->set('title_for_layout', '-'.$this->Auth->user('username'));
		//通过匹配Auth的user_id，获得用户书籍信息
		$this->set('user', $this->User->findById($user_id));
	}


	public function view($id = null) {
		$this->User->id = $id;
		$this->set('userid', $id);
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	public function add() {
		$this->set('title_for_layout', '-注册');
		if ($this->request->is('post')) {
	    	$this->User->create();
	    	if ($this->User->save($this->request->data)) {
	        	$this->Session->setFlash(__('欢迎来到南七书摊！'));
	        	return $this->redirect(array('action' => 'index'));
	    	}
	    	$this->Session->setFlash(
	        	__('The user could not be saved. Please, try again.')
	    	);
		}
	}

	public function edit($id = null) {
    	if ($this->User->save($this->request->data)) {
        	$this->Session->setFlash(__('更改已保存'));
        	return $this->redirect(array('action' => 'index'));
    	}
    	$this->Session->setFlash(
        	__('更改无法保存...请重试')
    	);

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