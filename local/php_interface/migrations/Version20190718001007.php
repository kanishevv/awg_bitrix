<?php

namespace Sprint\Migration;

use CIBlockElement;
use CCatalogGroup;
use CPrice;

class Version20190718001007 extends Version
{

    protected $description = "Создание элементов инфоблока";

    public function up()
    {
        $helper = $this->getHelperManager();

        $catalogIblockId = $helper->Iblock()->getIblockIdIfExists("catalog");

        if (!isset($this->params["add"])) {
            $this->params["add"] = 0;
        }

        $cnt = 100;

        if ($this->params["add"] <= $cnt) {
            $this->outProgress("Прогресс добавления", $this->params["add"], $cnt);
            $this->params["add"]++;
            
            $arFields = [
                "NAME" => "Товар " . $this->params["add"],
                "IBLOCK_SECTION_ID" => false,
                "ACTIVE" => "Y",
                "PREVIEW_TEXT" => "Тестовый краткое описание для элемента " . $this->params["add"],
                "DETAIL_TEXT" => "Тестовый полное описание для элемента " . $this->params["add"],
            ];

            $arProperties = [
                "STRING" => "Строка",
                "NUMBER" => $this->params["add"]
            ];

            $elementId = $helper->Iblock()->addElement($catalogIblockId, $arFields, $arProperties);

            // Получаем базовый вид цен 
            $basePriceType = CCatalogGroup::GetBaseGroup();
        
            $arFieldsPrice = [
                "PRODUCT_ID" => $elementId,
                "CATALOG_GROUP_ID" => $basePriceType["ID"],
                "PRICE" => $this->params["add"] * $cnt,
                "CURRENCY" => "RUB",
            ];

            CPrice::Add($arFieldsPrice);

             $this->outSuccess("Товар с идентификатором " . $elementId . " добавлен!");
             
            $this->restart();
        }

    }

    public function down()
    {
        $helper = $this->getHelperManager();

        $catalogIblockId = $helper->Iblock()->getIblockIdIfExists("catalog");

        $dbRes = CIBlockElement::GetList([], ["IBLOCK_ID" => $catalogIblockId], false, ["nTopCount" => 10]);
        $bFound = 0;
        while ($aItem = $dbRes->Fetch()) {
            $helper->Iblock()->deleteElement($aItem["ID"]);
            $this->out("deleted %d", $aItem["ID"]);
            $bFound++;
        }
        if ($bFound) {
            $this->restart();
        }
    }

}
