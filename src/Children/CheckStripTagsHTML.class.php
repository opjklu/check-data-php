<?php
namespace Validate\Children;

use Validate\Validate;
use Validate\Common\CommonAttribute;

class CheckStripTagsHTML implements Validate
{
	use CommonAttribute;
	
	/**
	 * 架构方法
	 */
	public function __construct(array $data, $message = '')
	{
		$this->data = $data;
		
		$this->message = $message;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Validate\Validate::check(string $key)
	 */
	public function check(string $key)
	{
		if (empty($this->data[$key])) {
			return true;
		}
		
		$str = $this->data[$key];
		
		return $str != strip_tags($str) ;
	}
}