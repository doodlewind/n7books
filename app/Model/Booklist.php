<?php
// app/Model/User.php
App::uses('AppModel', 'Model');

class Booklist extends AppModel {
	
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty',
	        ),
			'grade' =>array(
				'rule' => array(
					'inList',
					array('通用', '大一', '大二', '大三', '大四'))
			),
			'school' =>array(
				'rule' => array(
					'inList',
					array(
						'通用',
						'物院',
						'化院',
						'少院',
						'数院',
						'生院',
						'信院',
						'计院',
						'核院',
						'工院',
						'管院'
					))
			),
			'semester' =>array(
				'rule' => array(
					'inList',
					array(
						'通用', '春季学期', '秋季学期'))
			)
	    );
}