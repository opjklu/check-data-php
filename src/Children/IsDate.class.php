<?php
namespace Validate\Children;

use Validate\Validate;
use Validate\Common\CommonAttribute;

/**
 * 验证规则是否是时间
 * 
 * @author 王强
 */
class IsDate implements Validate
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
     * {@inheritdoc}
     *
     * @see \Validate\Validate::check(string $key)
     */
    public function check(string $key)
    {
        if (empty($this->data[$key])) {
            return true;
        }
        
        return date('Y-m-d H:i:s', strtotime($this->data[$key])) === $this->data[$key];
    }
}