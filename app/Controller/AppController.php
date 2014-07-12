<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
	        'Session',
	        'Auth' => array(
						'authenticate' => array(
								'Form' => array(
										'fields' => array('username' => 'email', 'password' => 'password')
								)
							),
	            'loginRedirect' => array(
	                'controller' => 'books',
	                'action' => 'index'
	            ),
	            'logoutRedirect' => array(
	                'controller' => 'users',
	                'action' => 'welcome'
	            ),
					'authorize' => array('Controller') // Added this line
	        )
	    );
	
	public function isAuthorized($user) {
	    // Admin can access every action
	    return true;
	}

    public function beforeFilter() {
		
        $this->Auth->allow('welcome','find' ,'index', 'view', 'category');
		$this->Auth->authError ='<div class="alert alert-info fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span>
				<span class="sr-only">Close</span>
			</button>
			抱歉，你还没登入哦 :-D
			</div>';
		
    }
	
}
