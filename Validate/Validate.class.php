<?php
namespace Validate;

interface Validate 
{
    /**
     * 检测参数
     */
    public function check(string $key);
}

