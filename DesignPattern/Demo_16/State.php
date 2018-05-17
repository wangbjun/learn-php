<?php

namespace DesignPattern\Demo_16;

interface State
{
    public function doAction(Context $context): void;
}
