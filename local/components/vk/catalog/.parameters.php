<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => "Тип инфоблока",
            "TYPE" => "STRING",
            "MULTIPLE" => "N"      
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Идентификатор инфоблока",
            "TYPE" => "STRING",
            "MULTIPLE" => "N"        
        ),
        "PAGE_ELEMENT_COUNT" => array(
            "PARENT" => "BASE",
            "NAME" => "Количество элементов на странице",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => 10   
        ),
    ),
);
