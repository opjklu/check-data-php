<?php
namespace Validate\Children;

use Validate\Validate;

/**
 * 验证规则是否是正确的电话号码
 * @author Administrator
 */
class CheckTelphone implements Validate
{
    private $data;
    
    /**
     * 架构方法
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    
    /**
     * {@inheritDoc}
     * @see \Validate\Validate::check(string $key)
     */
    public function check(string $key)
    {
    	if (empty($this->data[$key])) {
    		return false;
    	}
    	
        return (preg_match("/^([0-9]{3,4}-)?[0-9]{7,8}$/",$this->data[$key])) ? true : false;
    }
}