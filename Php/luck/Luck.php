<?php

namespace Luck;

class Luck
{
    protected $prizeList = [];

    protected $totalV;

    protected $luckPrize;

    public function addPrize(Prize $prize)
    {
        $this->prizeList[$prize->getId()] = $prize;
        $this->getTotalV();
    }

    public function removePrize($prizeId)
    {
        unset($this->prizeList[$prizeId]);
        $this->getTotalV();
    }

    protected function getTotalV()
    {
        $total = 0;
        foreach ($this->prizeList as $key => $value) {
            $total += $value->getProbability();
        }
        $this->totalV = $total;
    }


    public function luckMe()
    {
        $max = $this->totalV;
        shuffle($this->prizeList);

        foreach ($this->prizeList as $key => $value) {
            $rand = mt_rand(1, $max);
            if ($rand <= $value->getProbability()) {
                $this->luckPrize = $value;
                break;
            } else {
                $max -= $value->getProbability();
            }
        }

        if ($this->luckPrize->getLimitNumber() !== null) {
            if ($this->luckPrize->getLimitNumber() <= 0) {
                $this->luckPrize = $this->luckMe();
            } else {
                $this->luckPrize->setLimitNumber($this->luckPrize->getLimitNumber() - 1);
            }
        }

        return $this->luckPrize;
    }
}
