# Bitrix24 REST API for websites orders
## Класс для передачи заявок в bitrix24 через входящий вебхук (создание нового лида) 

### Установка

### Использование

Для начала необходимо добавить входящий вебхук в консоле управления bitrix24 

URI для получения списка Лидов

https://test.bitrix24.by/rest/1/q8khfywwh6a3c14n/crm.lead.add, где

test -> $domain

rest/1/q8khfywwh6a3c14n - $hook

crm.lead.add - $uri_api


**Создание объекта класса. В конструкторе указываем необходимые данные**
```php
$client = new \atlasBitrixRestApi\ClientBitrix($domain, $hook, $uri_api);
```

**Или без конструктора**
```php
$client = new \atlasBitrixRestApi\ClientBitrix();
    $client->setDomain(test);
    $client->setHook("rest/1/q8khfywwh6a3c14n");
    $client->setUriApi("/crm.lead.add/");
```

### Доступные методы