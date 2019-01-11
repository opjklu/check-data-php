<?php
namespace Validate\Children;

use Validate\Common\CommonAttribute;

/**
 * 验证是否是图片
 * @author 王强
 */
class CheckIsPicture 
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
     * 非空验证长度
     * {@inheritDoc}
     * @see \Validate\Validate::check(string $key)
     */
    public function check(string $key)
    {
        if (!empty($this->data[$key])) {
            return getimagesize($this->data[$key]);
        }
        return true;
    }
}