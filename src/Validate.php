<?php
declare(strict_types = 1);
namespace Validate;

interface Validate 
{
    /**
     * 检测参数
     */
    public function check(string $key) :bool;
}

