<?php

/*
 * Google API Key
 */

$url = "";

    $regId = array("APA91bFHKCQ5Na_2SQkg_lDGkjSVrZPmqVwutJF_psMlQZE2gJSQKaPcg_cSRffa9UpsCbkaaBR9KESwgEdFd0umczGFnXUUWWXBpC1QBhBJs6-8QtBSsG_eoJ6udLtZXDLOk2UxXWBt5nLqo6h3GgqbYfP4Stbw3g","APA91bGRYTQGkWCDbV3JIvMhLigeZJ4g3w_MYnv0Cybm5Ov9hVZZZiH7YO4R721OkoVfpG5SCHa0WlZU79EeV8qjGbmT4A-UmnLOMc9rZ36bU2dqSden5YAQB1UGHPIpcuMukt1fOS-LImf4GrXFtDtxVJLn7f2GUw");
    $message = $_POST["mess_content"];

    include_once 'GCM.php';
    $gcm = new GCM();

    $registatoin_ids = $regId;

    $message = array("price" => $message,"url"=>$url);

    $result = $gcm->send_notification($registatoin_ids, $message);

    echo $result;

