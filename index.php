<?php
require_once 'vendor/autoload.php';

try{
    $client = new \atlasBitrixRestApi\ClientBitrix("atlascomp");

    $client->setHook("rest/1/q8khfywwh6a3c14n");
    $client->setUriApi("/crm.lead.list.json/");
   
    $data = [
        "TITLE" => "Запрос с сайта",
        "NAME" => "Дима",
        "SECOND_NAME" =>"Петрович",
        "LAST_NAME"=> "Смолов",
        "CONTACT_ID" => 15,
        "CURRENCY_ID" => "USD",
        "OPPORTUNITY" => 12500,
        "PHONE" => [ 
                        [ "VALUE" =>"89746", "VALUE_TYPE" => "WORK"] 
                    ],
        "COMMENTS" => "ПРИВЕТ НОВЫЙ ЛИД"
    ];
        
    //$response = $client->createLead($data);
    //$response = $client->getLeads();
    
    //print_r(json_decode($response, true));
    
    $client->setUriApi("crm.lead.add.json");
    $response = $client->createLead($data);
    
    print_r(json_decode($response, true));
    
}  catch (\Exception $e) {
        echo $e->getMessage()."\n";
}


