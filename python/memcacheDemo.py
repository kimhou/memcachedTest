#!/usr/bin/env python
import memcache
mc = memcache.Client(['10.66.100.169:9101'],debug=0)
mc.set("python-key","python-value")
value = mc.get("python-key")
print value
for index in range(0, 100):
	mc.set("python-key-1", "python-value-1")
	mc.set("python-key-2", "python-value-2")
value2 = mc.get("python-key-2")
print value2
