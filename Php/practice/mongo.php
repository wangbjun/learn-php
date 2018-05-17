<?php
$m          = new MongoClient();
$db         = $m->selectDB('local');
$collection = $db->selectCollection('runoob');
$documents  = [
    "title"       => "MongoDB",
    "description" => "database",
    "likes"       => 100,
    "url"         => "http://www.runoob.com/mongodb/",
    "by"          => "菜鸟教程"
];
$res        = $collection->insert($documents);
$cursor     = $collection->find();
foreach ($cursor as $doc) {
    print_r($doc);
}
$collection->remove(['title' => 'MongoDB'], ['justOne' => false]);
