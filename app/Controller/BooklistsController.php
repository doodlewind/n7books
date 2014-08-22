<?php

class BooklistsController extends AppController {
	
	public $components = array('Paginator');

	public function index() {
		$this->set('title_for_layout', '-书单查询');
		//no POST data
		if (!$this->request->data) {
			$grade = $this->Auth->user('grade');
			$school = $this->Auth->user('school');
			if(isset($grade) && isset($school)) {
				$conditions = compact('grade', 'school');
			}else return;
			$recommands = $this->Booklist->find('all', array(
				'conditions' => $conditions,
				'fields' => array('DISTINCT title', 'author', 'course', 'school', 'grade', 'semester'),
				'order' => 'rand()'
			));
			$this->set('recommands', $recommands);
			//when POST data isn't exist, avoid finding all books
			return;
		}
		
		$conditions = $this->postConditions($this->request->data);
		$fields = array('DISTINCT title', 'author', 'course', 'school', 'grade', 'semester');
		$data = $this->Booklist->find('all', compact('conditions', 'fields')); 
		$this->set('books', $data);
		
		
		
		
	}
	
	public function edit() {
		$this->set('title_for_layout', '-书单编辑');
		
		$id = $this->Auth->user('id');
		if($id != 2 || $id != 1 ) {
    	$this->Session->setFlash(__('抱歉，书单编辑尚未开放 :-D'));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		
		if (!$this->request->data || isset($this->request->data['Booklist']['find'])) 
		{	
			unset($this->request->data['Booklist']['find']);
			$limit = '20';
			$conditions = $this->postConditions($this->request->data);
			$data = $this->Booklist->find('all', compact('conditions', 'limit')); 
			$this->set('books', $data);
		}
		else {

			if($this->Booklist->save($this->request->data)) {
		        $this->Session->setFlash(__('已成功编辑 :D'));
			}
	        else $this->Session->setFlash(__('字段不合要求，编辑失败 >_<'));
			return $this->redirect(array( 'controller' => 'booklists', 'action' => 'edit'));
			
		}	
	}
		
	public function delete($id) {
	    if ($this->request->is('get')) {
					return $this->redirect(array('action' => 'index'));
	    }
	    if ($this->Booklist->delete($id)) {
	        $this->Session->setFlash(__('已成功删除 >_<'));
	        return $this->redirect(array('controller'=>'booklists', 'action' => 'edit'));
	    }
	}

}