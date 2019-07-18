<?php

namespace Sprint\Migration;

use Bitrix\Main\Loader;
use CCatalogGroup;

Loader::IncludeModule('catalog');

class Version20190717231448 extends Version
{

    protected $description = "Создаем бозовый вид цен";

    public function up()
    {
        
        $priceId = CCatalogGroup::Add([
            "BASE" => "Y",
            "NAME" => "retail",
            "USER_GROUP" => [1], // hardcode
            "USER_GROUP_BUY" => [2], // hardcode
            "USER_LANG" => [
                "ru" => "Розничная1",
                "en" => "Retail"  
            ]
        ]);

        if ($priceId <= 0) {
            $this->outError('Ошибка добавления типа цен!');
        } else {
            $this->outSuccess('Базовый тип цен добавлен!');
        }
        
    }

    public function down()
    {

        $dbPriceType = CCatalogGroup::GetList(["NAME" => "retail"]);
        $priceType = $dbPriceType->Fetch();
        if ($priceType) {
            CCatalogGroup::Delete($priceType["ID"]);
            $this->outSuccess('Тип цен удален с идентификатором ' . $priceType["ID"] . ' удален!');
        } else {
            $this->outError('Типа цен с идентификатором ' . $priceType["ID"] . ' не существует!');
        }

    }

}
