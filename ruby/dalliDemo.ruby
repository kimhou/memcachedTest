require 'dalli'
options = { :namespace => "app_v1", :compress => true }
dc = Dalli::Client.new('10.66.100.169:9101', {})
dc.set('ruby-key0', 1)
dc.set('ruby-key', 'ruby-value')
value = dc.get("ruby-key")
