<!DOCTYPE html>
<html lang="ru">

<head>
    <? $APPLICATION->ShowHead() ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>

<body>
    <? $APPLICATION->ShowPanel(); ?>
    <div class="wrapper">
        <header class="header">
            <div class="header__left">
                <span>Проверочное задание(AWG)</span>
            </div>
        </header>
        <main class="main">
            <h1 class="main__h1"><? $APPLICATION->ShowTitle() ?></h1>