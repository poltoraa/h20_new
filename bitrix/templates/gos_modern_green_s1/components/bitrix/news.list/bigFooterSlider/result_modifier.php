<?

foreach ($arResult['ITEMS'] as &$arItem) {
    $file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>221, 'height'=>65), BX_RESIZE_IMAGE_EXACT, false);
    $arItem['MY_PICTURE'] = $file;
}
unset($arItem);

?>

