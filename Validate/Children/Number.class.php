<?php
namespace Validate\Children;

use Validate\Validate;
use Validate\Common\CommonAttribute;

/**
 * 特殊检测类
 * 验证规则是否是数字
 * @author Administrator
 */
class Number implements Validate
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
     * 
     * {@inheritDoc}
     * @see \Validate\Validate::check(string $key)
     */
    public function check(string $key)
    {
        
        if (!isset($this->data[$key])|| !is_numeric($this->data[$key])) {
            return false;
        }
       
        $str = '';
        if (false !== ($length = strpos($this->message, '${'))) {
            $str = str_replace(['${', '}'], ['', ''], substr($this->message, $length));
        }
       
        if (empty($str)) {
            return true;
        }
       
        list($first, $second) = explode('-', $str);
        
        if ( $first > $this->data[$key] || $this->data[$key] > $second) {
            return false;
        }
        
        return true;
    }
}