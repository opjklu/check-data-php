<?php
declare(strict_types = 1);
namespace Validate\Children;


use Validate\Validate;
use Validate\Common\CommonAttribute;

/**
 * 验证字符串是否是数字
 * @author Administrator
 */
class CheckStringIsNumber implements Validate
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
     * 验证字符串是否是数字
     * {@inheritDoc}
     * @see \Validate\Validate::check(string $key) :bool
     */
    public function check(string $key) :bool
    {
        if (empty($this->data[$key])) {
            return true;
        }
        
        return is_numeric(str_replace(',', null, $this->data[$key]));
    }
}