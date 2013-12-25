<?php
error_reporting(0);
//Variable
$CmpCode = "45872";

//Report Traffic
$ch = curl_init("http://leads.interactivated.co.il/traffic.php?Cmp_Code=".$CmpCode."&Media=" .
urlencode($_REQUEST['Media']) . "&Erate=" .
urlencode($_REQUEST['Erate']) . "&Channel=" .
urlencode($_REQUEST['Channel']  . '_HTML') .
"&Prod=" .  urlencode($_REQUEST['Prod']) .
'&Size=' . urlencode($_REQUEST['Size']));

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

//get Total result from database
$currentJson = file_get_contents('data.json');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <title>Femina</title>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- CSS FILES -->
    <link rel="stylesheet" href="./src/style/main.css"/>
    <link rel="stylesheet" href="./src/style/jquery.fancybox.css"/>
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="./src/lib/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="./src/lib/handlebars-v1.2.0.js
"></script>
    <script type="text/javascript" src="./src/js/app.js"></script>
    <meta property="og:image" content="http://cmp.interactivated.co.il/McCann/Altman/2013/Seker/src/img/woman+product.png"/>
    <meta property="og:title" content="גם אני השתתפתי בסקר הנשים הגדול של אלטמן" />
    <meta property="og:description" content="היכנסי גם את, מלאי את הסקר וגלי עד כמה את באמת מחוברת לעצמך. ובנוסף – תוכלי לזכות ביום ספא מפנק עם חברה!" />
    <meta property="og:url" content="http://cmp.interactivated.co.il/McCann/Altman/2013/Seker/"/>
    <meta property="og:site_name" content="Femina - פמינה"/>
    <meta property="og:type" content="website"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <!--[if lt IE 9]>
    	<script src="./src/lib/html5shiv.js"></script>
    <![endif]-->
    <style>
    
    </style>
	<script type="text/javascript">
		var DataObj = $.parseJSON('<?= $currentJson ?>');
        var main_url = location.pathname.split('/');
        main_url.pop();
        main_url = location.origin + main_url.join('/');

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-46087404-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=702592959753537";
        fjs.parentNode.insertBefore(js, fjs);
    	}(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="Main-Container">
        <div id="Starting-Page"></div>

        <div id="Question-Page"></div>
        
    </div><!-- eo Main-Container -->


<!-- STARTING PAGE TEMPLATE -->
 <script id="Starting-Page-HBS" type="text/x-handlebars-template">
        <div id="Woman-Left" style="background: url('src/img/woman+product.png'); width:288px; height:494px; margin-right: 719px;margin-top: 57px;position: absolute;"></div>

        <div id="Ready-Button" onClick="generateQuestionPage(1);" style="background: url('src/img/ready_button.png'); width:287px; height:79px; position: absolute;margin-right: 280px;margin-top: 325px;cursor:pointer;"></div>

        <div id="Main-Text" style="background:url('src/img/main_txt.png'); width:564px; height:278px; position: absolute;margin-top: 35px;margin-right: 140px"></div>
     
        <div id="Footer-Start" style="position: absolute;margin-top: 450px;margin-right: 100px;">
            <a href="#Coupon" class="footer-btn coupon-button"></a>
            <a href="#About" class="footer-btn about-button"></a>
        </div>

        <div id="Share-Button" style="">
            <a href="Share">Share</a>
        </div>
        <div class="takanon-button btn-click"></div>
</script>
<!-- END OF: STARTING PAGE TEMPLATE -->

<!-- Question Template -->
<script id="Question-Page-HBS" type="text/x-handlebars-template">
    <div id="Header-Text" style="background: url('src/img/coteret.png'); width: 371px; height:119px;margin-right: 300px;margin-top: 50px; position:absolute;" />
    
    <div id="Main-Answers">
        <div id="Main-Question">{{question}}</div>
        {{#list answers}} {{answer}} {{/list}}
    </div>
    <div id="Main-Answers-Meter">
        <div id="Meter-Arrow"></div>
    </div>
    <div class="takanon-button btn-click"></div>
</script>
<!-- END OF: Question Template -->


<script id="Contact-Final-Page-HBS" type="text/x-handlebars-template">
    <div id="Contact-Final-Container">
        <form>
            <textarea></textarea>
            <input class="contact-form-input" type="text" name="name" />
            <input class="contact-form-input" type="text" name="phone" />
            <input class="contact-form-input" type="text" name="email" />
            <input type="checkbox" name="agree" />
        </form>
        <div onClick="contactForm()" id="Contact-Final-Submit"></div> 
    </div>
    <div id="Contact-Final-Footer">
        <a href="#coupon" class="footer-btn coupon-button" />
        <a href="#about" class="footer-btn about-button"  />
        <a href="#result" class="footer-btn result-button" />
    </div>
    <div class="takanon-button btn-click"></div>
</script>

<script id="Result-Page-HBS" type="text/x-handlebars-template">
    <div id="Result-Main-Container"></div>    
    <div id="Woman-Left"></div>
    <div id="Footer-Start" style="margin-right: 50px;margin-top: 510px;position: absolute;">
        <a class="footer-btn about-button" href="#About"></a>
        <a class="footer-btn rest-result-button" href="#rest"></a>
        <a class="footer-btn coupon-button" href="#Coupon"></a>
    </div>
    <div class="takanon-button btn-click"></div>
</script>

<script type="text/javascript">
    Handlebars.registerHelper('list', function(items, options) {
      var out = "<ul id=\"Answers-Container\">";

      for(var i=0, l=items.length; i<l; i++) {
        out = out + "<li onClick=\"addAnswerEvent(" + items[i].page + "," + (i+1) + ")\" class=\"answer answer-group-" + items[i].page + "\" id=\"answer-" + i + "\"><img src=\"./src/img/" + (i+1) + ".png\"/>" + options.fn(items[i]) + "</li>";
      }

      return out + "</ul>";
    });

    $(document).ready(function(){
        //Generate Start Page
        var source   = $("#Starting-Page-HBS").html();
        var template = Handlebars.compile(source);
        var context = {};
        var html    = template(context);
        $('#Starting-Page').html(html);
        $('#Ready-Button').click(function(e){
            e.preventDefault();
            _gaq.push(['_trackEvent', 'Femina_ Survey', 'start_surey']);
            generateQuestionPage(1);
        });

    });


$(".about-button").fancybox({
  padding: 0,
  margin: 0,
  hideOnContentClick: true,
  titleShow: false,
  showNavArrows: false,
  afterLoad: function(){ _gaq.push(['_trackEvent', 'Femina_ Survey', 'about_femina_probiotics']); }
});

$(".coupon-button").fancybox({
    scrolling: "no",
    padding: 0,
    margin: 0,
    hideOnContentClick: true,
    titleShow: false,
    showNavArrows: false,
    afterLoad: function(){ _gaq.push(['_trackEvent', 'Femina_ Survey', 'coupon']) }
});

$(".takanon-button").on("click",function(e){
    console.log('takanon;;;;');
    e.preventDefault();
    _gaq.push(['_trackEvent', 'Femina_ Survey', 'takanon']);
    window.open("./src/takanon.pdf");
});

</script>

</body>
</html>




