<?php
namespace Validate\Children;

use Validate\Validate;
use Validate\Common\CommonAttribute;

/**
 * 验证字母数字的组合
 * @author Administrator
 *
 */
class CheckNumberEnglish implements Validate
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
        
        return (preg_match("/^[A-Za-z0-9]*$/i",$this->data[$key])) ? true : false;
    }
}