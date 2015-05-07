<?php
var_dump("memcached start");

$memcached = new Memcached;
$memcached->addServer('10.66.100.169', 9101);

$key = "php-memcached-just-key-1";

var_dump("<br/>last set value = ".$memcached->get($key));

$memcached->set($key, "value-1-".time());

var_dump("<br/>jast set value = ".$memcached->get($key));

for($i = 0; $i < 100; $i++){
        $memcached->set("php-memcached-key-1", "php-memcached-value-1");
        $memcached->set("php-memcached-key-2", "php-memcached-value-2");
}
var_dump("<br/>串行设置完成， php-memcached-key-2=".$memcached->get("php-memcached-key-2"));
?>
