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
	<script type="text/javascript">
		var DataObj = $.parseJSON('<?= $currentJson ?>');

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
        
            
        <script id="Page1" type="text/x-handlebars-template">
           
             <div id="Footer-Question"></div>
        </script>

    </div><!-- eo Main-Container -->

 <script id="Starting-Page-HBS" type="text/x-handlebars-template">
    <div class="entry">
        <div id="Woman-Left" style="margin-right: 719px;margin-top: 57px;position: absolute;">
            <img src="{{woman_left_img_link}}" />
        </div>
              <h1>{{title}}</h1>
              <div class="body">
                {{{body}}}
              </div>
            </div>
            <div id="Footer-Start"></div>
</script>


<script type="text/javascript">
    
    $(document).ready(function(){
        //Generate Start Page
        var source   = $("#Starting-Page-HBS").html();
        var template = Handlebars.compile(source);
        var context = {woman_left_img_link: '/' + location.pathname.split('/')[1] + '/src/img/woman+product.png' ,title: "My New Post", body: "This is my first post!"};
        var html    = template(context);
        $('#Starting-Page').html(html);
    });
</script>

</body>
</html>




