<?php
namespace Validate\Children;

use Validate\Validate;
use Validate\Common\CommonAttribute;

/**
 * 验证规则是否有特殊字符
 * @author Administrator
 */
class CheckProgrammingSymbol implements Validate
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
		//特殊字符
		$preg='/[\'~`!@#$%^&)(<>{}]|\]|\[|\\\|\"|\|/';
		
		$isTrue = preg_match($preg, $this->data[$key]);
		
		return $isTrue;
	}
	
}