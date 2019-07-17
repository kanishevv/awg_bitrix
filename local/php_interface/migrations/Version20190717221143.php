<?php

namespace Sprint\Migration;


class Version20190717221143 extends Version
{

    protected $description = "Создать скриптом (миграцией) необходимое для хранения свойств товаров";

    public function up()
    {
        $helper = $this->getHelperManager();

        $catalogIblockId = $helper->Iblock()->getIblockIdIfExists('catalog');

        if ($catalogIblockId) {
            $helper->Iblock()->saveProperty($catalogIblockId, [
                'NAME' => 'Строка',
                'PROPERTY_TYPE' => 'S',
                'CODE' => 'STRING',
            ]);
    
            $helper->Iblock()->saveProperty($catalogIblockId, [
                'NAME' => 'Число',
                'PROPERTY_TYPE' => 'N',
                'CODE' => 'NUMBER',
            ]);
    
            $helper->Iblock()->saveProperty($catalogIblockId, [
                'NAME' => 'Файл',
                'PROPERTY_TYPE' => 'F',
                'CODE' => 'FILE',
            ]);
    
            $helper->Iblock()->saveProperty($catalogIblockId, [
                'NAME' => 'Список',
                'PROPERTY_TYPE' => 'L',
                'CODE' => 'LIST',
            ]);

            $this->outSuccess('Свойства для инфоблока добавлены.');
        }
        
    }

    public function down()
    {   
        $helper = $this->getHelperManager();
        
        $catalogIblock = $helper->Iblock()->getIblock('catalog');
        
        if ($catalogIblock) {
            $helper->Iblock()->deleteProperty($catalogIblock["ID"], [
                'CODE' => 'STRING',
            ]);
    
            $helper->Iblock()->deleteProperty($catalogIblock["ID"], [
                'CODE' => 'NUMBER',
            ]);
        
            $helper->Iblock()->deleteProperty($catalogIblock["ID"], [
                'CODE' => 'FILE',
            ]);
    
            $helper->Iblock()->deleteProperty($catalogIblock["ID"], [
                'CODE' => 'LIST',
            ]);
        }
    }

}
