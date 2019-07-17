<?php

namespace Sprint\Migration;

use Bitrix\Main\Loader;
use CCatalog;

class Version20190717153525 extends Version
{

    public function up()
    {
        $helper = $this->getHelperManager();

        $helper->Iblock()->saveIblockType([
            'ID' => 'catalog',
            'SECTIONS' => 'Y',
            'LANG' => [
                'en' => [
                    'NAME' => 'Catalog',
                    'SECTION_NAME' => 'Sections',
                    'ELEMENT_NAME' => 'Elements',
                ],
                'ru' => [
                    'NAME' => 'Каталог',
                    'SECTION_NAME' => 'Разделы',
                    'ELEMENT_NAME' => 'Элементы',
                ],
            ],
        ]);

        $catalog = $helper->Iblock()->saveIblock([
            'LID' => 's1',
            'NAME' => 'Каталог товаров',
            'CODE' => 'catalog',
            'IBLOCK_TYPE_ID' => 'catalog',
            'LIST_PAGE_URL' => '#SITE_DIR#/catalog/list.php?SECTION_ID=#SECTION_ID#',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/catalog/detail.php?ID=#ELEMENT_ID#'
        ]);

        $helper->Iblock()->saveIblockFields($catalog, [
            'CODE' => [
                'DEFAULT_VALUE' => [
                    'TRANSLITERATION' => 'Y',
                    'UNIQUE' => 'Y',
                ],
            ],
        ]);
        
        if (Loader::IncludeModule('catalog')) {
            CCatalog::Add(['IBLOCK_ID' => $catalog]);
        }

        $this->outSuccess('Инфоблок каталог создан!');
    }

    public function down()
    {
        $helper = $this->getHelperManager();

        $catalog = $helper->Iblock()->deleteIblockIfExists('catalog');
        if ($catalog) {
            $this->outSuccess('Инфоблок каталог удален');
        } else {
            $this->outError('Ошибка удаления инфоблока каталог');
        }
    }
}
