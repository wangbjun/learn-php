<?php

namespace DesignPattern\Demo_15;

class Subject
{
    private $observers;

    private $state;

    public function setState(int $state): void
    {
        $this->state = $state;
    }

    public function getState(): int
    {
        return $this->state;
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        foreach ($this->observers as $key => $item) {
            if ($item == $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notifyAll()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->state);
        }
    }
}
