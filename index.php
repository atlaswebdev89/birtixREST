<?php
require_once 'vendor/autoload.php';

try{
    $client = new \atlasBitrixRestApi\ClientBitrix("atlascomp");

    $client->setHook("rest/1/q8khfywwh6a3c14n");
    $client->setUriApi("/crm.lead.add/");
   
    $data = [
        "TITLE" => "Запрос с сайта",
        "NAME" => "Дима",
        "SECOND_NAME" =>"Петрович",
        "LAST_NAME"=> "Смолов",
        "CURRENCY_ID" => "USD",
        "OPPORTUNITY" => 12500,
        "PHONE" => [ 
                        [ "VALUE" =>"+3752972933862", "VALUE_TYPE" => "WORK"],
                        [ "VALUE" =>"231", "VALUE_TYPE" => "WORK"],
                    ],
        "EMAIL" => [
                        ['VALUE' => "doroshuk33@yandex.by", 'VALUE_TYPE' => 'HOME'],
                ],
        "COMMENTS" => "ПРИВЕТ НОВЫЙ ЛИД",
        "UTM_SOURCE" => "form_site"
    ];
    
    
    
    
    $response = $client->createLead(($data));
    //$response = $client->getLeads();
    
    print_r(json_decode($response, true));
    
    //$client->setUriApi("crm.lead.add.json");
    //$response = $client->createLead($data);
    
    //print_r(json_decode($response, true));
    
        
    
    //$client->setUriApi("crm.contact.list");
   // $response=$client->getContacts();
    //print_r(json_decode($response, true));
    
} catch (\atlasBitrixRestApi\Exceptions\CustomRESTapiException $e) {
        echo $e->getMessage()."  ИДФ\n";
}  

catch (\Exception $e) {
        echo $e->getMessage()."\n";
} 


