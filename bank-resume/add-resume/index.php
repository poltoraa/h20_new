<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавить резюме");
?>

<h1 style="padding-left: 45px;">Здравствуйте!</h1>

<?$APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add.form",
	".default",
	array(
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => "Загрузите фотографию",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_NAME" => "Фамилия Имя Отчество",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_TAGS" => "",
		"DEFAULT_INPUT_SIZE" => "30",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"GROUPS" => array(
			0 => "2",
		),
		"GROUP_PROPERTIES1" => array(
		),
		"GROUP_PROPERTIES2" => "",
		"GROUP_PROPERTIES3" => "",
		"GROUP_PROPERTIES4" => "",
		"IBLOCK_ID" => "31",
		"IBLOCK_TYPE" => "Bank",
		"LEVEL_LAST" => "Y",
		"LIST_URL" => "",
		"MAX_FILE_SIZE" => "0",
		"MAX_LEVELS" => "100000",
		"MAX_USER_ENTRIES" => "100000",
		"NAV_ON_PAGE" => "10",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"PROPERTY_CODES" => array(
			0 => "78",
			1 => "79",
			2 => "86",
			3 => "87",
			4 => "88",
			5 => "89",
			6 => "90",
			7 => "92",
			8 => "99",
			9 => "103",
			10 => "105",
			11 => "106",
			12 => "107",
			13 => "114",
			14 => "NAME",
			15 => "DETAIL_PICTURE",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "78",
			1 => "79",
			2 => "86",
			3 => "88",
			4 => "89",
			5 => "90",
			6 => "92",
			7 => "99",
			8 => "103",
			9 => "107",
			10 => "NAME",
		),
		"RESIZE_IMAGES" => "N",
		"SEF_MODE" => "N",
		"STATUS" => "ANY",
		"STATUS_NEW" => "NEW",
		"USER_MESSAGE_ADD" => "",
		"USER_MESSAGE_EDIT" => "",
		"USE_CAPTCHA" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>