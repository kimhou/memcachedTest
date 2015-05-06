//环境及依赖//
//环境: 在腾讯云CVM上安装对应的python [[https://www.python.org/downloads/ 下载地址]]
//依赖: 本例使用python-memcached 1.5.4版本, 在腾讯云CVM上安装此客户端 [[https://pypi.python.org/pypi/python-memcached 下载地址]]
//使用步骤//
//在腾讯云CVM上部署好python环境及python-memcached客户端.
//编写测试代码并运行.
//代码示例 python-memcached-demo.py//
#:将代码中***号替换为你的IP:Port, 在管理中心，点击“NoSQL高速存储”，在NoSQL高速存储“管理视图”，可以看到系统分配的IP:Port

#!/usr/bin/env python
import memcache
mc = memcache.Client(['10.66.100.169:9101'],debug=0)
mc.set("python-key","python-value")
value = mc.get("python-key")
print value
