<?php

class BooksController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Paginator');
	
	public $paginate = array(
		'Book' => array(
	        'limit' => 8,
	        'order' => array(
	            'Book.modified' => 'desc'
		),
		'fields' => array(
	        'Book.id',
			'Book.title',
			'Book.author',
			'Book.comment',
			'Book.cover',
	        'MIN(Book.price) AS min',
			'COUNT(Book.title) AS count'
		),
		'conditions' => array(
	        'Book.on_shelf' => '在售'
		),
		'group' => 'Book.title'
	));
	
	public function index() {
		$this->set('title_for_layout', '-主页');
		$paginate = array(
				'Book' => array(
			        'limit' => 12,
			        'order' => array(
			            'Book.modified' => 'desc'
				),
				'fields' => array(
			        'Book.id',
					'Book.title',
					'Book.author',
					'Book.comment',
					'Book.cover',
			        'MIN(Book.price) AS min',
					'COUNT(Book.title) AS count'
				),
				'conditions' => array(
			        'Book.on_shelf' => '在售'
				),
				'group' => 'Book.title'
			));
		$this->Paginator->settings = $paginate;
		$data = $this->Paginator->paginate('Book');
		$this->set('books', $data);
	}
	
	public function category($category = null) {
		$this->set('title_for_layout', '-'.$category);
		if (!$category){
	        $this->Session->setFlash(
	            __('你要的，小书摊没找到 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$paginate = array(
				'Book' => array(
			        'limit' => 12,
			        'order' => array(
			            'Book.modified' => 'desc'
				),
				'fields' => array(
			        'Book.id',
					'Book.title',
					'Book.author',
					'Book.comment',
					'Book.cover',
			        'MIN(Book.price) AS min',
					'COUNT(Book.title) AS count'
				),
				'conditions' => array(
			        'Book.on_shelf' => '在售',
					'Book.category' => $category
				),
				'group' => 'Book.title',
		));	
		$this->Paginator->settings = $paginate;
		$data = $this->Paginator->paginate('Book');
		$this->set('books', $data);
	}
	
	public function find() {
		if (!isset($this->request->data['Book']['title'])){
	        $this->Session->setFlash(
	            __('你要的，小书摊没找到 :-( '));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$title = $this->request->data['Book']['title'];
		$this->set('title_for_layout', '-'.$title);
		
		$paginate = array(
				'Book' => array(
			        'limit' => 10,
			        'order' => array(
			            'Book.modified' => 'desc'
				),
				'fields' => array(
			        'Book.id',
					'Book.title',
					'Book.author',
					'Book.comment',
					'Book.cover',
			        'MIN(Book.price) AS min',
					'COUNT(Book.title) AS count'
				),
				'conditions' => array(
					'Book.title LIKE' => '%'.$title.'%',
			        'Book.on_shelf' => '在售'
				),
				'group' => 'Book.title',
		));
		$this->Paginator->settings = $paginate;
		$data = $this->Paginator->paginate('Book');
		if ( $data==null) {
      $this->Session->setFlash(
          __('你要的，小书摊没找到 :-( '));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$this->set('books', $data);
	}
	
	public function view($title = null) {
		$this->set('title_for_layout', '-详情');
		
		$resend = 'FAQ: <a class="button" data-toggle="modal" data-target=".bs-example-modal-sm">如何购买？</a>';
    $this->Session->setFlash($resend);
		
		if (!$title){
	        $this->Session->setFlash(
	            __('你要的，小书摊没找到 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$books = $this->Book->findAllByTitle($title);
		if (!$books) {
	        $this->Session->setFlash(
	            __('你要的，小书摊没找到 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		
		$this->set('books',$books);
		foreach ($books as $book){
			$book['Book']['visit'] += 1;
			$this->Book->save($book);
		}

	}
	
	public function detail($id = null) {
		$this->set('title_for_layout', '-详情');
		if (!$id){
	        $this->Session->setFlash(
	            __('你要的，小书摊没找到 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$book = $this->Book->findById($id);
		if (!$book) {
	        $this->Session->setFlash(
	            __('你要的，小书摊没找到 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$this->set('item',$book);
		$book['Book']['visit'] += 1;
		$this->Book->save($book);

	}
	
	public function deal($id = null) {
	    if ($this->request->is('get')) {
			return $this->redirect(array( 'controller' => 'user', 'action' => 'index'));
	    }
		$data['Book']['id'] = $id;
		$data['Book']['user_id'] = $this->Auth->user('id');
		$data['Book']['on_shelf'] = '成交';
	    if ($this->Book->save($data)) {
	        $this->Session->setFlash(
	            __('状态设置成功', h($id))
	        );
	        return $this->redirect(array('controller' =>'users', 'action' => 'index'));
	    }
	}
	
	public function cancel($id = null) {
	    if ($this->request->is('get')) {
			return $this->redirect(array( 'controller' => 'user', 'action' => 'index'));
	    }
		$data['Book']['id'] = $id;
		$data['Book']['user_id'] = $this->Auth->user('id');
		$data['Book']['on_shelf'] = '在售';
	    if ($this->Book->save($data)) {
	        $this->Session->setFlash(
	            __('状态设置成功', h($id))
	        );
	        return $this->redirect(array('controller' =>'users', 'action' => 'index'));
	    }
	}
	
	public function add() {
		$this->set('title_for_layout', '-传书');
		$this->Session->setFlash(__('简单三步，即可发布'));
		if ($this->request->is('post')) {
			$this->request->data['Book']['user_id'] = $this->Auth->user('id');
			

			if ($this->request->data['Book']['type']=='材料'){
				$this->request->data['Book']['update'] = '0';
			}else $this->request->data['Book']['update'] = '1';
			
			$this->Book->create();
			
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('上传已完成'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('上传失败...'));
		}
	}
	
	
	public function edit($id = null) {
		$this->set('title_for_layout', '-编辑');
		if (!$id) {
			throw new NotFoundException(__('Invalid Book'));
		}
			
    	$book = $this->Book->findById($id);
			//已成交书籍不能编辑
	    if (!$book || !($book['Book']['on_shelf']=='在售') ) {
	        throw new NotFoundException(__('Invalid Book'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
		
			if ($this->request->data['Book']['type']=='材料') {
				$this->request->data['Book']['update'] = '0';
			}
					
	        if ($this->Book->save($this->request->data)) {
	            $this->Session->setFlash(__('编辑已保存'));
	            return $this->redirect(array('controller' => 'users', 'action' => 'index'));
	        }
	        $this->Session->setFlash(__('编辑失败...'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $book;
	    }
	}
	
	public function delete($id) {
	    if ($this->request->is('get')) {
					return $this->redirect(array('action' => 'index'));
	        //throw new MethodNotAllowedException();
	    }
	    if ($this->Book->delete($id)) {
	        $this->Session->setFlash(
	            __('书本已删除 >_<')
	        );
	        return $this->redirect(array('controller'=>'users', 'action' => 'index'));
	    }
	}
	
	
	public function isAuthorized($user) {
    // All registered users can add posts
	    if ($this->action === 'add') {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}

}