<?php
var_dump("memcached start");
$servers = array("10.66.108.24':9101");

$memcached = new Memcached;
$memcahced->addServers($servers);

$key = "php-memcached-key-1";

var_dump("last set value = ".$memcached->get($key));

$memcached->set($key, "value-1-".time());

var_dump("jast set value = ".$memcached->get($key));

for($i = 0; $i < 1000; $i++){
	$memcached->set("php-memcached-key-1", "php-memcached-value-1");
	$memcached->set("php-memcached-key-2", "php-memcached-value-2");
}
var_dum("<br/>串行设置完成， php-memcached-key-2=".$memcached->get("php-memcached-key-2"));
?>