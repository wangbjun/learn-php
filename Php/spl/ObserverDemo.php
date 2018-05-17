<?php

namespace SPL;

use SplSubject;

class ObserverDemo implements \SplObserver
{

    public $id;

    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function update(SplSubject $subject)
    {
        echo $this->name."_doing somethings\n";
    }
}
