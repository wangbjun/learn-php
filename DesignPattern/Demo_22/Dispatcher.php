<?php

namespace DesignPattern\Demo_22;

class Dispatcher
{
    private $studentView;

    private $homeView;

    public function __construct()
    {
        $this->studentView = new StudentView();
        $this->homeView = new HomeView();
    }

    public function dispatch(string $request)
    {
        if ($request == 'student') {
            $this->studentView->show();
        } else {
            $this->homeView->show();
        }
    }
}
