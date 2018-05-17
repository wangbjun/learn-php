<?php

namespace SPL;

use SplObserver;

class SubjectDemo implements \SplSubject
{

    public $subject = 'subject';

    public $tasks = [];

    public function attach(SplObserver $observer)
    {
        $this->tasks[$observer->id] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        unset($this->tasks[$observer->id]);
    }

    public function notify()
    {
        foreach ($this->tasks as $task) {
            $task->update($this);
        }
    }
}