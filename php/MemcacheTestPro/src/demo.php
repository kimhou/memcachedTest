<?php
/**
 * Created by IntelliJ IDEA.
 * User: tencent
 * Date: 15/4/21
 * Time: 14:34
 */
var_dump("start");
require_once("../lib/memcache-2.2.6/memcache.php");

$memcache = memcache_connect('10.66.108.24', 9101);

if ($memcache) {
    $memcache->set("str_key", "String to store in memcached");
    $memcache->set("num_key", 123);

    $object = new StdClass;
    $object->attribute = 'test';
    $memcache->set("obj_key", $object);

    $array = Array('assoc'=>123, 345, 567);
    $memcache->set("arr_key", $array);

    var_dump($memcache->get('str_key'));
    var_dump($memcache->get('num_key'));
    var_dump($memcache->get('obj_key'));
}
else {
    echo "Connection to memcached failed";
}
?>