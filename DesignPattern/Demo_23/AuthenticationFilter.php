<?php

namespace DesignPattern\Demo_23;

class AuthenticationFilter implements Filter
{
    public function execute(string $request): void
    {
        echo "Authenticated Request...\n";
    }
}
