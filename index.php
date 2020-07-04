<?php
	$token="1271032982:AAHEIiJT1JNId0PTcXzu4ohdGOB6qbRGS4g";
    $website="https://api.telegram.org/bot".$token;
    
    $update=file_get_contents('php://input');
    $update=json_decode($update,TRUE);
    
    $chatid=$update['message']['from']['id'];
    $nome=$update['message']['from']['first_name'];
    $text=$update['message']['text'];
	$agg=json_encode($update,JSON_PRETTY_PRINT);
    
    $tastierabenvenuto='["Bene"],["tu?"]';
    sendmessage($chatid,"ciao $nome come stai?",$tastierabenvenuto);
    
    function sendmessage($chatid,$text,$tastiera){
    if(isset($tastiera)){
    	$tastierino='&reply_markup={"keyboard":['.$tastiera.'],"resize_keyboard":true}';
    }
    	$url=$GLOBALS[website]."/sendmessage?chat_id=$chatid&text=".urlencode($text).$tastierino;
        file_get_contents($url);
    }    
?>
