<?php

namespace DesignPattern\Demo_23;

class Target
{
    public function execute(string $request):void
    {
        echo "Executing Request...$request\n";
    }
}
