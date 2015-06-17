<?php
class Whale extends AppModel {
	public $validate = array(
			'species' => array(
				'rule' => 'notEmpty',
				),
			'location' => array(
				'rule' => 'notEmpty',
				),
		);
}