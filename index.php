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
    .coupon-button
    {
        background: url('./src/img/coupon_button.png');
    }
    .about-button{
        background: url('./src/img/odot_button.png');
    }
    .footer-btn{
        width: 206px;
        height: 39px;
        display: inline-block;
        cursor: pointer;
    }
    #Main-Answers{
           background: url("./src/img/white_BG.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
            height: 262px;
            margin-right: 200px;
            margin-top: 220px;
            position: absolute;
            width: 577px;
    }
    #Answers-Container{
        margin-right: 80px;
        margin-top: 60px;
        position: absolute;

    }
    #Main-Question{
        margin-right: 55px;
        margin-top: 30px;
        position: absolute;
    }
    li .answer{
        cursor: pointer;
    }
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

 <script id="Starting-Page-HBS" type="text/x-handlebars-template">
        <div id="Woman-Left" style="background: url('src/img/woman+product.png'); width:288px; height:494px; margin-right: 719px;margin-top: 57px;position: absolute;"></div>

        <div id="Ready-Button" style="background: url('src/img/ready_button.png'); width:287px; height:79px; position: absolute;margin-right: 280px;margin-top: 325px;cursor:pointer;"></div>

        <div id="Main-Text" style="background:url('src/img/main_txt.png'); width:564px; height:278px; position: absolute;margin-top: 35px;margin-right: 140px"></div>
     
        <div id="Footer-Start" style="position: absolute;margin-top: 450px;margin-right: 100px;">
            <a href="#Coupon" class="footer-btn coupon-button"></a>
            <a href="#About" class="footer-btn about-button"></a>
        </div>

        <div id="Share-Button" style="">
            <a href="Share">Share</a>
        </div>
</script>

<script id="Question-Page-HBS" type="text/x-handlebars-template">
    <div id="Header-Text" style="background: url('src/img/coteret.png'); width: 371px; height:119px;margin-right: 300px;margin-top: 50px; position:absolute;" />
    
    <div id="Main-Answers">
        <div id="Main-Question">{{question}}</div>
        {{#list answers}} {{answer}} {{/list}}
    </div>
</script>

<script type="text/javascript">
    Handlebars.registerHelper('list', function(items, options) {
      var out = "<ul id=\"Answers-Container\">";
      console.log(options);
      console.log(items);

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
            console.log('Ready');
            generateQuestionPage(1);
        });

    });

    var generateQuestionPage = function generateQuestionPage(num){
        num = parseInt(num, 10);
        var source   = $("#Question-Page-HBS").html();
        var template = Handlebars.compile(source);
        
        switch(num)
        {
            case 1:
                $('#Starting-Page').hide();
                var context = {question: 'this is question1', question_number: '1', answers: [ {answer:'answer 1', number: 1, page: 1}, {answer:'answer 2', number: 2, page: 1} ,  {answer:'answer 3', number: 3, page: 1} ]};
                var html    = template(context);
                break;
            case 2:
                $('#Starting-Page').hide();
                var context = {question: 'this is question2', question_number: '1', answers: [ {answer:'answer 1', number: 1, page: 1}, {answer:'answer 2', number: 2, page: 1} ,  {answer:'answer 3', number: 3, page: 1} ]};
                var html    = template(context);
                break;
            case 3:
                $('#Starting-Page').hide();
                var context = {question: 'this is question3', question_number: '1', answers: [ {answer:'answer 1', number: 1, page: 1}, {answer:'answer 2', number: 2, page: 1} ,  {answer:'answer 3', number: 3, page: 1} ]};
                var html    = template(context);
                break;
            default:
                var context = {question: 'this is question', question_number: '1', answers: [ {answer:'answer 1', number: 1}, {answer:'answer 2', number: 2} ,  {answer:'answer 3', number: 3} ]};
                var html    = template(context);
                break;
        }

        $('#Question-Page').html(html);
    }

    var addAnswerEvent = function addAnswerEvent(page, ans){
        console.log('addAnswerEvent');
        
        console.log('page: %s, answer: %s', page, ans);
        page = page +1;
        generateQuestionPage(page);
    }
</script>

</body>
</html>




