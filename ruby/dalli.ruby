//环境: 
//:在腾讯云CVM上安装对应的[[https://www.ruby-lang.org/en/documentation/installation/ Ruby]], 需要Ruby 1.9.3+.
//:[[https://rubygems.org/pages/download 安装RubyGems]]
//:[[https://cyrusimap.org/docs/cyrus-sasl/2.1.23/install.php 安装SASL]], libsasl2-dev on Ubuntu, cyrus-sasl on Gentoo.
//依赖: 安装Dalli <code>gem install dalli</code>, [[https://github.com/mperham/dalli Github参考]].
//===使用步骤===
//在腾讯云CVM上部署好Ruby环境并安装好dalli客户端.
//编写测试代码并运行.
//===代码示例===
//:将代码中***号替换为你的IP:Port, 在管理中心，点击“NoSQL高速存储”，在NoSQL高速存储“管理视图”，可以看到系统分配的IP:Port

require 'dalli'
options = { :namespace => "app_v1", :compress => true }
dc = Dalli::Client.new('10.66.100.169:9101', options)
dc.set('key', 123)
value = dc.get('key')
