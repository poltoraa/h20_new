<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>


<?if (!empty($arResult))
{ ?>
    <ul  class="top-menu show" style="width:100%;">
    <?
    $previousLevel = 0;

    foreach($arResult as $arItem)
    {
        if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel)
        {
            ?>
            </ul></div></div></div></div></li>
            <?
        }
        if ($arItem["IS_PARENT"])
        {
            if ($arItem["DEPTH_LEVEL"] == 1)
            {
                if ($arItem["LINK"] == "/about/")
                {
                    ?>
                    <li class="w-100 my-col" class="parent">
                    <a tabindex="1" href="#0" class="unclick"><?=$arItem["TEXT"]?></a>
                    <div class="second-level container my-second">
                        <div class="content">
                            <div class="col col-mb-12">
                                <div class="content">
                                    <ul class="clearfix">
                    <?
                }else{
                ?>
                <li class="w-100 my-col" class="parent">
                    <a tabindex="1" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                    <div class="second-level container my-second">
                        <div class="content">
                            <div class="col col-mb-12">
                                <div class="content">
                                    <ul class="clearfix">
            <?}
            } else
            {
                ?>
                <li class="col w-100"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
            <?
            }
        } else
        {
            ?>
            <li class="col w-100"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
            <?
        }
        $previousLevel = $arItem["DEPTH_LEVEL"];
    }
    if ($previousLevel > 1)
    {
        ?>
        </ul></div></div></div></div></li>
        <?
    }
    ?>
        </ul>
    <?
} ?>