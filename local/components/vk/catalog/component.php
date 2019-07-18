<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (\Bitrix\Main\Loader::IncludeModule("iblock")) {
    $arSelect = ["*"];
    $arFilter = ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y"];
    $arNavStartParams = ["nPageSize" => $arParams["PAGE_ELEMENT_COUNT"]];
    
    $res = CIBlockElement::GetList(["SORT" => $arParams["SORT"]], $arFilter, false, $arNavStartParams, $arSelect);
    $arResult["ITEMS"] = [];
    while ($ob = $res->GetNextElement()) {
        $item = $ob->GetFields();
        $item["PROPERTIES"] = $ob->GetProperties();
        array_push($arResult["ITEMS"], $item);
    }
}

$this->IncludeComponentTemplate();
