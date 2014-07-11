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
		$paginate = array(
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
		
		
		$this->Paginator->settings = $paginate;
		$data = $this->Paginator->paginate('Book');
		$this->set('books', $data);
		/*
		$this->set('books', $this->Book->find('all',array(
				'fields' => array(
				        'Book.id',
								'Book.title',
								'Book.author',
								'Book.comment',
								'Book.cover',
				        'MIN(Book.price) AS min',
							  'COUNT(Book.title) AS count'
			    ),
				'group' => 'Book.title'
			)));
		*/
	}
	
	public function category($category = null) {
		if (!$category){
	        $this->Session->setFlash(
	            __('你要的，小书摊给不了 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$paginate = array(
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
		$title = $this->request->data['Book']['title'];
		if ($title==null){
	        $this->Session->setFlash(
	            __('你要的，小书摊给不了 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
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
		$this->set('title', $title);
		$this->set('books', $data);
	}
	
	public function view($title = null) {
		if (!$title){
	        $this->Session->setFlash(
	            __('你要的，小书摊给不了 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$book = $this->Book->findAllByTitle($title);
		if (!$book) {
	        $this->Session->setFlash(
	            __('你要的，小书摊给不了 :-('));
			return $this->redirect(array( 'controller' => 'books', 'action' => 'index'));
		}
		$this->set('books',$book);
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
		if ($this->request->is('post')) {
			$this->request->data['Book']['user_id'] = $this->Auth->user('id');
			$this->Book->create();
			
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('上传已完成'));
				//$douban = new Douban();
				//echo $douban.pattern($this->request->data['Book']['title'], $this->request->data['Book']['author']);
				
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('上传失败...'));
		}
	}
	
	public function edit($id = null) {
		$this->set('title_for_layout', '-编辑详情');
		if (!$id) {
			throw new NotFoundException(__('Invalid Book'));
		}

    	$book = $this->Book->findById($id);
		//已成交书籍不能编辑
	    if (!$book || !($book['Book']['on_shelf']=='在售') ) {
	        throw new NotFoundException(__('Invalid Book'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Book->id = $id;
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
	            __('The book with id: %s has been deleted.', h($id))
	        );
	        return $this->redirect(array('controller'=>'users', 'action' => 'index'));
	    }
	}
	
	
	public function isAuthorized($user) {
    // All registered users can add posts
	    if ($this->action === 'add') {
	        return true;
	    }
		/*
	    // The owner of a post can edit and delete it
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $bookId = (int) $this->request->params['pass']['id'];
			if ($this->Book->isOwnedBy($bookId, $user['id'])) return true;
	    }
		*/
	    return parent::isAuthorized($user);
	}

}