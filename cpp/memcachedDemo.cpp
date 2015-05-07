#include<iostream>
#include <string.h>
#include <libmemcached/memcached.h>

using namespace std;

int main(int argc, char *argv[])
{
	memcached_st *client = NULL;
	memcached_return cache_return;
	memcached_server_st *server = NULL;
	
	client = memcached_create(NULL);
	server = memcached_server_list_append(server, "10.66.100.169", 9101, &cache_return);
	cache_return = memcached_server_push(client, server);

	if(MEMCACHED_SUCCESS != cache_return){
		cout<<"memcached server push failed! cache return:"<<cache_return<<endl;
		return -1;
	}
	
	string key = "cpp_key";
	string val = "cpp_value";
	size_t key_len = key.length();
	size_t val_len = val.length();
	int expiration = 0;
	uint32_t flags = 0;
	cache_return = memcached_set(client, key.c_str(), key_len, val.c_str(), val_len, expiration, flags);
	if(MEMCACHED_SUCCESS == cache_return){
		cout<<"set success"<<endl;
	}else{
		cout<<"set failed! cache return:"<<cache_return<<endl;
	}

	size_t value_length;
	char* getVal = memcached_get(client, key.c_str(), key_len, &value_length, &flags, &cache_return);
	if(MEMCACHED_SUCCESS == cache_return){
		cout<<"get success, value = "<<getVal<<endl;
	}else{
		cout<<"get failed, cache return:"<<cache_return<<endl;
	}

	for(int i = 0; i < 100; i++){
		string key1 = "cpp_key_1";
		string val1 = "cpp_value_1";
		memcached_set(client, key1.c_str(), key1.length(), val1.c_str(), val1.length(), expiration, flags);
		string key2 = "cpp_key_2";
		string val2 = "cpp_value_2";
		memcached_set(client, key2.c_str(), key2.length(), val2.c_str(), val2.length(), expiration, flags);
	}	
	string getKey = "cpp_key_2";
	char* getVal2 = memcached_get(client, getKey.c_str(), getKey.length(), &value_length, &flags, &cache_return);
	if(MEMCACHED_SUCCESS == cache_return){
		cout<<"get success, 串行last  value = "<<getVal2<<endl;
	}else{
		cout<<"get failed, cache return:"<<cache_return<<endl;
	}
	return 0;

}
