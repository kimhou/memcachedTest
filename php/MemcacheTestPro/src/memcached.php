<?php
var_dump("memcached start");
$servers = array("10.66.108.24':9101");

$memcached = new Memcached;
$memcahced->addServers($servers);

$key = "php-memcached-key-1";

var_dump("last set value = ".$memcached->get($key));

$memcached->set($key, "value-1-".time());

var_dump("jast set value = ".$memcached->get($key));

?>