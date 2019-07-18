<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>

<?$APPLICATION->IncludeComponent(
	"vk:catalog", 
	".default", 
	array(
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "catalog",
		"PAGE_ELEMENT_COUNT" => "10",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>