<?php
function checkcountry(){
    $user_ip = getenv('REMOTE_ADDR');
    if($user_ip == '::1' || $user_ip = '127.0.0.1'){
        $country = "United States";
    }else{
        @$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
    }
    if($country == "United States" || $country == "Philippines" || $country == "Qatar"){
        return TRUE;
    }else{
        return FALSE;
    }
}
?>