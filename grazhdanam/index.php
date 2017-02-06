<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Гражданам");
?><div class="col col-dt-12 grazhdanam-page page">
	<p>
 <img width="450" src="/upload/medialibrary/91f/91f497f68eabb3c2a2cd7c181a8936f1.JPG" height="300" title="Гражданам" alt="Гражданам" align="left">Соискатели, заинтересованные в поиске работы, всегда могут рассчитывать на поддержку, консультации, подбор оптимального варианта работы и другую практическую помощь со стороны наших сотрудников. Особенное внимание специалисты службы занятости оказывают гражданам с ограниченными возможностями и другим наименее социально защищенным группам граждан. Мы всегда готовы прийти на помощь на любом этапе поиска работы!
	</p>
	<p>
	</p>
	<p>
 <b><br>
 </b>
	</p>
	<p>
		<b><br>
		</b>
	</p>
	<p>
 <b><br>
 </b>
	</p>
	<p>
 <b><br>
 </b>
	</p>
	<p>
 <b><br>
 </b>
	</p>
	<div class="tabs col-mb-12">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"grazhdanam",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "podmenu",
		"COMPONENT_TEMPLATE" => "grazhdanam",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "grazhdanam",
		"USE_EXT" => "N"
	)
);?>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>