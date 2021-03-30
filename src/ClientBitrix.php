<?php

namespace atlasBitrixRestApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Respect\Validation\Validator;
use \Respect\Validation\Exceptions\ValidationException;

class ClientBitrix {
    
    public $domain;
    public $hooks;
    public $uri_api;
    
    public function __construct($domain='',$hooks ='', $uri_api='') {
        $this->domain = $this->str_clear($domain);
        $this->hooks= $this->str_clear($hooks);
        $this->uri_api = $this->str_clear($uri_api);
        $this->container = $this->loader();
    }
    
    //Сервис-контейнер
    protected function loader () {
        return BootLoader::registerFactory();
    }


    //Добавить uri api
    public function setUriApi ($uri) {
        if(isset($uri)) {
            $this->uri_api = $this->str_clear($uri);
        }
        
    }
    
    //Получить uri_api
    public function getUri_api() {
        return $this->uri_api;
    }
    
    //Добавить название домена bitrix24
    public function setDomain ($domain) {
        if(isset($domain)) {
            $this->domain = $this->str_clear($domain);
        }
    }
    //Получить domen
    public function getDomain () {
        return $this->domain;
    }
    
    //Добавить webHook
    public function setHook ($hook) {
        if(isset($hook)) {
            $this->hooks = $this->str_clear($hook);
        }
    }
    //Получить вебхук
    public function getHook () {
        return $this->hooks;
    }
    
    //Функция получения полного uri для restAPI bitrix24
    public function get_full_URI () {
        if(isset($this->domain, $this->hooks, $this->uri_api)  && !(empty($this->domain)) && !(empty($this->hooks)) && !empty($this->uri_api)) {
            return "https://".$this->domain.".bitrix24.by/".$this->hooks."/".$this->uri_api;
        }else 
            throw new \Exception("Проверьте правильность указанных параметров");
    }
    
    //Функция удаление лишних слешей
    protected function str_clear ($str) {
        return trim($str, "/");
    }
    
    protected function queryBuilderUrlEncode (array $data) {
        if(is_array($data) && !empty($data)) {
            return http_build_query(["fields" => $data]);
        }else {
            throw new \Exception ("Проверьте массив данных");
        }
    }




    //Функция создания лида в bitrix24
    public function createLead (array $data_lead) {
        
        $data = $this->queryBuilderUrlEncode($data_lead);
        
       
                    $response  = $this->container['http']->request('POST', $this->get_full_URI(),
                        [
                            "body" =>  $data
                        ]);
        return $response->getBody();
    }
    
    //Получение всех лидов в битрикс24
    public function getLeads () {
            $response  = $this->container['http']->request('GET', $this->get_full_URI());
        return $response->getBody();
    }
}
