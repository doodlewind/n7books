<?php

class FollowsController extends AppController {
	
	public $components = array('Paginator');

	public function index() {
		$condition = array();
		
		$paginate = array(
				'Booklist' => array(
			        'limit' => 8,
			        'order' => array(
			            'modified' => 'desc'
				),
				'conditions' => $condition
			));
		$this->Paginator->settings = $paginate;
		$data = $this->Paginator->paginate('Booklist');
		$this->set('wishlists', $data);
		
	}
	
	public function add() {
	    if ($this->Follow->save($this->request->data)) {
	        $this->Session->setFlash(__('添加完成 :D '));
	        return $this->redirect(array('controller'=>'users', 'action' => 'index'));
	    }
	}
	
	public function delete($id) {
	    if ($this->request->is('get')) {
					return $this->redirect(array('controller' => 'books', 'action' => 'index'));
	    }
	    if ($this->Follow->delete($id)) {
	        $this->Session->setFlash(__('已成功删除 >_<'));
	        return $this->redirect(array('controller'=>'users', 'action' => 'index'));
	    }
	}
}