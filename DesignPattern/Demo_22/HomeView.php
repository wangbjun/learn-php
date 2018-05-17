<?php

namespace DesignPattern\Demo_22;

class HomeView implements View
{
    public function show(): void
    {
        echo "Displaying Home View...\n";
    }
}
