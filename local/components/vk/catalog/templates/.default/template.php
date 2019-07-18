<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->addExternalCss("styles.css");
?>

<div class="products">
    <? foreach ($arResult["ITEMS"] as $arItem) : ?>
        <div class="products__product product">
            <h3 class="product__title"><?= $arItem["NAME"] ?></h3>
            <div class="product__anons"><?= $arItem["PREVIEW_TEXT"] ?></div>
            <div class="product__prop-title">Свойства</div>
            <dl class="product__properties">
                <? foreach ($arItem["PROPERTIES"] as $arProperty) : 
                        if (!$arProperty["VALUE"]) continue 
                    ?>
                    <dt class="product__properties-title"><?= $arProperty["NAME"] ?></dt>
                    <dd class="product__properties-value"><?= $arProperty["VALUE"] ?></dd>
                <? endforeach ?>
            </dl>
        </div>
    <? endforeach ?>
</div>