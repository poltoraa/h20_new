<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("slider");
?>

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/iview.css" />
    <link rel="stylesheet" href="css/skin 1/style.css" />
    <script src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.js"></script>

    <script src="js/iview.js"></script>
    <script>
        $(document).ready(function(){
            $('#iview').iView({
                pauseTime: 7000,
                directionNav: true,
                tooltipY: -15,
                controlNavNextPrev: true,
                directionNav: true, // Вперед и Наза
                nextLabel:"",
                previousLabel:""
            });
        });
    </script>

    <link rel="stylesheet" href="demo.css?v=2">
    <link media="screen" href="demo/styles/demo.css" type="text/css" rel="stylesheet" />

    <div id="cont">

        <div class="container-1">
            <div id="iview">
                <div data-iview:image="photos/photo1.jpg" data-iview:transition="slice-top-fade,slice-right-fade">
                    <div class="iview-caption caption1" data-x="80" data-y="200">iView<sup>&trade;</sup></div>
                    <div class="iview-caption" data-x="80" data-y="275" data-transition="wipeRight">The world's most awesome jQuery Image & Content Slider</div>
                    <div class="iview-caption" data-x="254" data-y="320" data-transition="wipeLeft"><i>Presented by <b>Hemn Chawroka</b></i></div>
                </div>

                <div data-iview:image="photos/photo2.jpg" data-iview:transition="zigzag-drop-top,zigzag-drop-bottom" data-iview:pausetime="3000">
                    <div class="iview-caption caption5" data-x="60" data-y="280" data-transition="wipeDown">Captions can be positioned and resized freely</div>
                    <div class="iview-caption caption6" data-x="300" data-y="350" data-transition="wipeUp"><a href="#">Example URL-link</a></div>
                </div>

                <div data-iview:image="photos/video.jpg" data-iview:type="video" data-iview:transition="strip-right-fade,strip-left-fade">
                    <iframe src="http://player.vimeo.com/video/11475955?byline=1&amp;portrait=0" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    <div class="iview-caption caption2" data-x="450" data-y="340" data-transition="wipeRight">Video</div>
                    <div class="iview-caption caption3" data-x="600" data-y="345" data-transition="wipeLeft">Support</div>
                </div>

                <div data-iview:image="photos/photo3.jpg">
                    <div class="iview-caption caption4" data-x="50" data-y="80" data-width="312" data-transition="fade">Some of iView's Options:</div>
                    <div class="iview-caption blackcaption" data-x="50" data-y="135" data-transition="wipeLeft" data-easing="easeInOutElastic">Touch swipe for iOS and Android devices</div>
                    <div class="iview-caption blackcaption" data-x="50" data-y="172" data-transition="wipeLeft" data-easing="easeInOutElastic">Image And Thumbs Fully Resizable</div>
                    <div class="iview-caption blackcaption" data-x="50" data-y="209" data-transition="wipeLeft" data-easing="easeInOutElastic">Customizable Transition Effect</div>
                    <div class="iview-caption blackcaption" data-x="50" data-y="246" data-transition="wipeLeft" data-easing="easeInOutElastic">Freely Positionable and Stylable Captions</div>
                    <div class="iview-caption blackcaption" data-x="50" data-y="283" data-transition="wipeLeft" data-easing="easeInOutElastic">Cross Browser Compatibility!</div>
                </div>

                <div data-iview:image="photos/photo4.jpg">
                    <div class="iview-caption caption7" data-x="0" data-y="0" data-width="180" data-height="480" data-transition="wipeRight"><h3>The Responsive Caption</h3>This is the product that you <b><i>all have been waiting for</b></i>!<br><br>Customize this slider with just a little HTML and CSS to your very needs. Give each slider some captions to transport your message.<br><br>All in all it works on every browser (including IE6 / 7 / 8) and on iOS and Android devices!</div>
                </div>

                <div data-iview:image="photos/photo5.jpg">
                    <div class="iview-caption caption5" data-x="60" data-y="150" data-transition="wipeLeft">What are you waiting for?</div>
                    <div class="iview-caption caption6" data-x="160" data-y="230" data-transition="wipeRight">Get it Now!</div>
                </div>
            </div>
        </div>
        <center>
    </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>