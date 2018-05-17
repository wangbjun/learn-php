<?php

namespace DesignPattern\Demo_22;

class StudentView implements View
{
    public function show(): void
    {
        echo "Displaying Student View...\n";
    }
}
