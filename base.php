<?php
/**
 * base
 *
 * Base Controller provide the basic controller setup
 *
 * PHP versions 5.x
 *
 * Ashok Vishwakarma
 * Copyright 2014 Ashok Vishwakarma (http://ashokvishwakarma.in )
 *
 * Redistributions of files is strictly prohibited.
 *
 * @copyright     Copyright 2014 Ashok Vishwakarma
 * @link          http://ashokvishwakarma.in
 * @since         v 1.0
 * @license       Copyright 2014 Ashok Vishwakarma (http://ashokvishwakarma.in )
 */
class base{
	/**
	 * construct
	 * 
	 * @uses sets all parameters required by mysql class
	 */
	public function __construct(){
		if(!empty($this->table)){
			mysql::init();
			mysql::$table = $this->table;
		}
		
		if(!empty($this->hasOne)){
			mysql::$hasOne = $this->hasOne;
		}
		
		if(!empty($this->hasMany)){
			mysql::$hasMany = $this->hasMany;
		}
	}
}
?>