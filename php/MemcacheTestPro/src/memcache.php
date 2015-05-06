<?php
var_dump("start<br/>");

$cache = new Memcache;

$cache->connect('10.66.108.24', 9101);

$key = "php-key-1";

var_dump("<br/>get last set value = " . $cache->get($key));

var_dump("<br/>start set value");

$cache->set($key, "value1". time());
var_dump("<br/>set finished");

var_dump("<br/>get set just set value = " . $cache->get($key));

for($i = 0; $i < 1000; $i++){
	$cache->set("php-memcache-key-1", "php-memcache-value-1");
	$cache->set("php-memcache-key-2", "php-memcache-value-2");
}
var_dum("<br/>串行设置完成， php-memcache-key-2=".$cache->get("php-memcache-key-2"));

$cache->close();

?>