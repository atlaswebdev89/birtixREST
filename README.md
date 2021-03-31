# Bitrix24 REST API for websites orders
## Класс для передачи заявок в bitrix24 через входящий вебхук (создание нового лида) 

### Установка

### Использование

** Создание объекта класса **
```php
$client = new \atlasBitrixRestApi\ClientBitrix($domain, $hook, $uri_api);
```

URI для получения списка Лидов

https://test.bitrix24.by/rest/1/q8khfywwh6a3c14n/crm.lead.list.json, где

test -> $domain

rest/1/q8khfywwh6a3c14n - $hook

crm.lead.list.json - $uri_api


### Доступные методы