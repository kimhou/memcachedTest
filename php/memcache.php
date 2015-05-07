<?php
var_dump("start<br/>");

$cache = new Memcache;

$cache->connect('10.66.100.169', 9101);

$key = "php-key-1";

var_dump("<br/>get last set value = " . $cache->get($key));

var_dump("<br/>start set value");

$cache->set($key, "value1". time());
var_dump("<br/>set finished");

var_dump("<br/>get set just set value = " . $cache->get($key));

$cache->close();

?>
