<?php

$dll = new SplDoublyLinkedList();
$dll->add(0, 'a');
$dll->add(1, 'b');
$dll->add(2, 'c');
$dll->add(3, 'd');
$dll->add(4, 'e');
//var_dump($dll);
//var_dump($dll->pop()); # 右边出列
//var_dump($dll->shift()); # 左边出列
#var_dump($dll->bottom()); # 第一个节点
#var_dump($dll->top());    # 最后一个节点
#$dll->unshift('b'); # 左边入列
#$dll->push('d'); # 右边入列
//foreach ($dll as $value) {
//    var_dump($value);
//}
$dll->push('f');
$dll->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO); # FIFO first insert first out
for ($dll->rewind(); $dll->valid(); $dll->next()) {
    var_dump($dll->current()) . "\n";
}

echo "--------------------------------------------------\n";

$dll->rewind();
while ($dll->valid()) {
    var_dump($dll->current());
    $dll->next();
}
var_dump($dll);
