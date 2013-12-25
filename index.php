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
		window.Seker = window.Seker || {};

        var DataObj = $.parseJSON('<?= $currentJson ?>'),
        main_url = location.pathname.split('/');
        main_url.pop();
        main_url = location.origin + main_url.join('/');

        Seker.Answer = [];
        Seker.counter = 1;
        Seker.result = 0;  //max is 330
        Seker.AvgResult = DataObj.questions;

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
     
        <div id="Footer-Start">
            <a href="#Coupon" onClick="getCoupon();" class="footer-btn coupon-button"></a>
            <a href="#About" onClick="getAboutPage();" class="footer-btn about-button"></a>
        </div>

        <div id="Share-Button">
           <div class="fb-share-button fb_iframe_widget" data-href="http://cmp.interactivated.co.il/McCann/Altman/2013/Seker/6.html" data-width="100" data-type="button"></div>
        </div>
        <div onClick="getTakanon();" class="takanon-button btn-click"></div>
</script>
<!-- END OF: STARTING PAGE TEMPLATE -->

<!-- Question Template -->
<script id="Question-Page-HBS" type="text/x-handlebars-template">
    <div id="Header-Text" style="background: url('src/img/coteret.png'); width: 371px; height:119px;margin-right: 300px;margin-top: 50px; position:absolute;" />
    
    <div id="Main-Answers">
        <div id="Question-Page-Question-Number">שאלה {{question_number}} מתוך 9</div>
        <div id="Main-Question">{{question}}</div>
        {{#list answers}} {{answer}} {{/list}}
    </div>
    <div id="Main-Answers-Meter">
        <div id="Meter-Arrow"></div>
    </div>
    <div onClick="getTakanon();" class="takanon-button btn-click"></div>
</script>
<!-- END OF: Question Template -->

<script id="Contact-Final-Page-HBS" type="text/x-handlebars-template">
    <div id="Contact-Final-Container">
        <form style="margin-right:50px">
            <textarea style="margin-bottom:10px" onfocus="if(this.value == 'טיפ') { this.value = ''; }" cols="60" val="" rows="3"></textarea>
            <input name="Firstname" id="name" onfocus="if(this.value == 'שם מלא') { this.value = ''; }" value="שם מלא" type="text" placeholder="שם מלא">
            <input name="Phone" id="phone" onfocus="if(this.value == 'טלפון') { this.value = ''; }" value="טלפון" type="text" placeholder="טלפון">
            <input name="Email" id="email" onfocus="if(this.value == 'דוא״ל') { this.value = ''; }" value='דוא״ל' type="text" placeholder='דוא"ל'>
            <input type="hidden" value="<?= $_GET['Media'] ?>" name="Media" class="userInfoMedia" />
            <input type="hidden" value="<?= $_GET['Channel'] ?>" name="Channel" class="userInfoChannel" />
            <input type="hidden" value="<?= $_GET['Prod'] ?>" name="Prod" class="userInfoProd" />
            <input type="hidden" value="<?= $_GET['Erate'] ?>" name="Erate" class="userInfoErate" />
            <input type="hidden" value="<?= $_GET['Size'] ?>" name="Size" class="userInfoSize" />
        </form>
        <div onClick="contactForm()" id="Contact-Final-Submit"></div> 
    </div>
    <div id="Contact-Final-Footer">
        <a href="#coupon" class="footer-btn coupon-button" onClick="getCoupon();" />
        <a href="#about" class="footer-btn about-button" onClick="getAboutPage();" />
        <a href="#result" class="footer-btn result-button" onClick="getResultPage();" />
    </div>
    <div onClick="getTakanon();" class="takanon-button btn-click"></div>
</script>

<script id="Result-Page-HBS" type="text/x-handlebars-template">
    <div id="Result-Page-Header"></div>
    <div id="Result-Main-Container">
        <div id="Result-Main-Container-Header">{{result_header}}</div>
        <div id="Result-Main-Container-Text"><p>{{result_text}}</p></div>
    </div>    
    <div id="Woman-Left"></div>
    <div id="Footer-Start" style="margin-right: 50px;margin-top: 510px;position: absolute;">
        <a class="footer-btn about-button" onClick="getAboutPage();" href="#About"></a>
        <a class="footer-btn rest-result-button" href="#rest" onClick="getRestResult()"></a>
        <a class="footer-btn coupon-button" href="#Coupon" onClick="getCoupon();"></a>
    </div>
    <div onClick="getTakanon();" class="takanon-button btn-click"></div>
</script>

<!-- Rest-Result-Page-HBS : TEMPLATE - ALL THE OTHER WOMAN RESULT -->
<script id="Rest-Result-Page-HBS" type="text/x-handlebars-template">
    <div id="Main-Total-Result">
        <span class="meter-arrow-all"></span>
        <span class="meter-arrow-single"></span>
        
    </div>
</script>


<!-- THANKS YOU FOR COMPLETE THE FORM -->
<script id="Thank-You-Page-HBS" type="text/x-handlebars-template">
    <div id="Thank-You-Header"></div>
    <div id="Thank-You-Confirmation"></div>
    <div id="Thank-You-Show-Result" onClick="getResultPage();"></div>
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

var getAboutPage = function getAboutPage(){

    $(".about-button").fancybox({
      padding: 0,
      margin: 0,
      hideOnContentClick: true,
      titleShow: false,
      showNavArrows: false,
      afterLoad: function(){ _gaq.push(['_trackEvent', 'Femina_ Survey', 'about_femina_probiotics']); }
    });   
}


var getCoupon = function getCoupon(){
    $(".coupon-button").fancybox({
        scrolling: "no",
        padding: 0,
        margin: 0,
        hideOnContentClick: true,
        titleShow: false,
        showNavArrows: false,
        afterLoad: function(){ _gaq.push(['_trackEvent', 'Femina_ Survey', 'coupon']) }
    });
}

var getTakanon = function getTakanon(){
    _gaq.push(['_trackEvent', 'Femina_ Survey', 'takanon']);
    window.open("./src/takanon.pdf");
}

var getRestResult = function getRestResult (){
    
    var source   = $("#Rest-Result-Page-HBS").html();
    var template = Handlebars.compile(source);
    var context  = {};
    var html    = template(context);
    $('#Question-Page').html(html);
}
</script>

</body>
</html>




