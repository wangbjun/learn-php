<?php

class classEx
{
    public function test()
    {
        if (5 > 4) {
            throw new Exception("我是一个异常！");
        }
    }
}
