<?php

class Hash
{
    private $locations = [];

    private $virtualNodeNum = 5;

    private $nodes;

    private function hashHandler($str)
    {
        return crc32($str);
    }

    public function addNode($node)
    {
        for ($i = 0; $i < $this->virtualNodeNum; $i++) {
            $tmp                   = $this->hashHandler($node . $i);
            $this->locations[$tmp] = $node;
            $this->nodes[$node][]  = $tmp;
        }
        ksort($this->locations, SORT_NUMERIC);
    }

    public function deleteNode($node)
    {
        foreach ($this->nodes[$node] as $v) {
            unset($this->locations[$v]);
        }
    }

    public function getLocations($str)
    {
        if (empty($this->locations)) {
            return false;
        }

        $strHash = $this->hashHandler($str);

        foreach ($this->locations as $key => $location) {
            if ($key >= $strHash) {
                return $location;
            }
        }

        return current($this->locations);
    }
}


$hash = new Hash();
$hash->addNode("192.168.1.3");
$hash->addNode("192.168.1.4");
$hash->addNode("192.168.1.5");
$hash->addNode("192.168.1.6");

echo $hash->getLocations("请求1") . "\n";
echo $hash->getLocations("请求2") . "\n";
echo $hash->getLocations("请求3") . "\n";
echo $hash->getLocations("请求4") . "\n";
echo $hash->getLocations("请求5") . "\n";
echo $hash->getLocations("请求6") . "\n";
echo $hash->getLocations("请求7") . "\n";

$hash->deleteNode("192.168.1.5");
echo "---------------------------------->\n";
echo $hash->getLocations("请求1") . "\n";
echo $hash->getLocations("请求2") . "\n";
echo $hash->getLocations("请求3") . "\n";
echo $hash->getLocations("请求4") . "\n";
echo $hash->getLocations("请求5") . "\n";
echo $hash->getLocations("请求6") . "\n";
echo $hash->getLocations("请求7") . "\n";
