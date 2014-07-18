<?php

class BooklistsController extends AppController {
	
	public $components = array('Paginator');

	public function index() {
		$condition = array();

		if (!isset($this->request->data['Booklist']['grade']) || $this->request->data['Booklist']['grade'] == 'all') {
			$condition['grade LIKE'] = '%';
		}else
			$condition['grade LIKE \'通用\' OR grade LIKE'] = $this->request->data['Booklist']['grade'];
		
		if (!isset($this->request->data['Booklist']['school']) || $this->request->data['Booklist']['school'] == 'all') {
			$condition['school LIKE'] = '%';
		}else
			$condition['school LIKE \'通用\' OR school LIKE'] = $this->request->data['Booklist']['school'];
		
		if (!isset($this->request->data['Booklist']['semester']) || $this->request->data['Booklist']['semester'] == 'all') {
			$condition['semester LIKE'] = '%';
		}else
			$condition['semester LIKE \'通用\' OR semester LIKE'] = $this->request->data['Booklist']['semester'];
		
		
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
		$this->set('books', $data);	
	}
	
	public function edit() {
		if (!$this->request->data ||
			 isset($this->request->data['Booklist']['find'])) 
		{
			$condition = array();
			
			if (!isset($this->request->data['Booklist']['grade']) || $this->request->data['Booklist']['grade'] == 'all') {
				$condition['grade LIKE'] = '%';
			}else
				$condition['grade LIKE \'通用\' OR grade LIKE'] = $this->request->data['Booklist']['grade'];
		
			if (!isset($this->request->data['Booklist']['school']) || $this->request->data['Booklist']['school'] == 'all') {
				$condition['school LIKE'] = '%';
			}else
				$condition['school LIKE \'通用\' OR school LIKE'] = $this->request->data['Booklist']['school'];
		
			if (!isset($this->request->data['Booklist']['semester']) || $this->request->data['Booklist']['semester'] == 'all') {
				$condition['semester LIKE'] = '%';
			}else
				$condition['semester LIKE \'通用\' OR semester LIKE'] = $this->request->data['Booklist']['semester'];

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
/*	
	public function recommend() {
		$grade = $this->Auth->user('id');
		echo ($grade);
		$this->set('booklists', $this->Booklist->find('all',array(
			'conditions' => array(
				'grade' => $grade,
				'school' => $school
		))));
	}
*/
}