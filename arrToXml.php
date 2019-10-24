<?php

//数组转xml
function array2xml($arr){
    $str="<xml>";
    foreach ($arr as $key=>$value){
        $str.= "<$key>$value</$key>";
    }
    $str.="</xml>";
    return $str;
}

//xml转数组
function xmlToArray($xml){
    if (file_exists($xml)) {
        libxml_disable_entity_loader(false);
        $xml_string = simplexml_load_file($xml,'SimpleXMLElement', LIBXML_NOCDATA);
    }else{
        libxml_disable_entity_loader(true);
        $xml_string = simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
    }
    $result = json_decode(json_encode($xml_string),true);
    return $result;
}
