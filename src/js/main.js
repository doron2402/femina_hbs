// var DataObj = {questions: 0};

    // var DataObj = {total_user:0,questions:0};
    // DataObj.questions;

window.Seker = window.Seker || {};
Seker.Answer = [];
Seker.counter = 1;
Seker.result = 0;  //max is 330
Seker.AvgResult = DataObj.questions;



$('textarea').bind('keyup keydown click blur focus change paste', function() {
    $(".textcount").text($(this).val().length + " מתוך 300 תווים");
    if($(this).val().length > 299){
       var str = $("textarea").val().substring(0,300);
        $(this).val(str);
    }
});

function SubmitCoupun(){
    var error = false;
    var name = $('input[class="name"]').val();
    var phone = $('input[class="phone"]').val();
    var email = $('input[class="email"]').val();
    var zip = $('input[class="zip"]').val();
    var address = $('input[class="address"]').val();
    var city = $('input[class="city"]').val();
    var checkbox = $('input[class="AgreeNews"]').is(':checked');
     namesplit = name.split(" ");

    if(namesplit[1] == undefined || namesplit[0].length < 2 || namesplit[1].length < 2 || isNaN(namesplit[0]) == false || isNaN(namesplit[1]) == false || $.trim(namesplit[0]) == "" || $.trim(namesplit[1]) == ""  || namesplit[1] == "מלא" || namesplit[0] == "שם"){
        $('input[class="name"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא שם תקין");
        $('input[class="name"]').css({"border": "2px solid red"}).val("שם מלא");
        error = true;
    }
    else{
        $('input[class="name"]').css({"border": "2px solid green"});
    }
    if(phone.length != 10 || $.trim(phone) == "" ){
        $('input[class="phone"]').css({"border": "2px solid red"}).attr("placeholder","טלפון");
        $('input[class="phone"]').css({"border": "2px solid red"}).val("טלפון");
        error = true;
    }
    else{
        var numbers = /^[0-9]+$/;
        if(numbers.test(phone) == false){
            $('input[class="phone"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא טלפון תקין");
            $('input[class="phone"]').css({"border": "2px solid red"}).val("מספר טלפון");
            error = true;
        }
        else{
            $('input[class="phone"]').css({"border": "2px solid green"});
        }
    }
    if($.trim(city) == "" || city == "עיר"  ){
        $('input[class="city"]').css({"border":"2px solid red"});
        $('input[class="city"]').css({"border":"2px solid red"}).val("עיר");
        error = true;
    }
    else{
        $('input[class="city"]').css({"border": "2px solid green"});
    }
    if($.trim(email) == ""){
        $('input[class="email"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא אימייל תקין");
        $('input[class="email"]').css({"border": "2px solid red"}).val('דוא״ל' );
        error = true;
    }
    else{
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if(reg.test(email) == false){
            $('input[class="email"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא אימייל תקין");
            $('input[class="email"]').css({"border": "2px solid red"}).val('דוא״ל' );
            error = true;
        }
        else{
            $('input[class="email"]').css({"border": "2px solid green"});
        }
    }
    if($.trim(address) == "" || address == "כתובת" ){
        $('input[class="address"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא כתובת");
        $('input[class="address"]').css({"border": "2px solid red"}).val("כתובת");
        error = true;
    }
    else{
        $('input[class="address"]').css({"border": "2px solid green"});
    }
    if($.trim(zip) == "" ||  zip.length < 5){
        $('input[class="zip"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא מיקוד תקין");
        $('input[class="zip"]').css({"border": "2px solid red"}).val("מיקוד");
        error = true;
    }
    else{
        var numbers = /^[0-9]+$/;
        if(numbers.test(zip) == false){
            $('input[class="zip"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא מיקוד תקין");
            $('input[class="zip"]').css({"border": "2px solid red"}).val("מיקוד");
            error = true;
        }
        else{
            $('input[class="zip"]').css({"border": "2px solid green"});
        }
    }
    if(error == false){
        $(".submitCoupon").hide(0.01)
        $(".couponForm").hide(0.01);
        $("#success").show(0.01);
        $.ajax({
            type:"POST",
            url:"reportLead.php",
            data:{ FirstName:name, Phone:phone, Email:email , AgreeNews:checkbox ,Field_1:city, Field_2: address, Field_3:zip, Coupon: 'true' ,Media: $('input[class="userInfoMedia"]').val() , Channel : $('input[class="userInfoChannel"]').val() , Erate : $('input[class="userInfoErate"]').val() , Prod : $('input[class="userInfoProd"]').val() , Size : $('input[class="userInfoSize"]').val()},
            success:function(res){
                _gaq.push(['_trackEvent', 'Femina_ Survey', 'sent_details_coupon']);
            },
            error:function(req,errorType,errorMessage){
                $(".submitCoupon").show(0.01);
                $(".couponForm").show(0.01);
                $("#success").hide(0.01);

            }
        }).done(function() {
                $("#coupon,.coupon_15_button,.coupon_button").fadeOut(function(){
                    $(".fancybox-close").trigger("click");
                    $(".thecoupon").trigger("click");
                    $("#coupon,.coupon_15_button,.coupon_button").remove();
                });

            });
    }
}



$(".takanon").on("click",function(){
    _gaq.push(['_trackEvent', 'Femina_ Survey', 'takanon']);
    window.open("./src/takanon.pdf");
});
//
//$(".odot_button").on("click",function(){
//    if($(".coupon").css({"display":"block"})){
//        $(".coupon").hide(0.01,function(){
//            $(".odot").show();
//        });
//    }
//    $(".odot").show();
//});
//
//$(".coupon_button,.coupon_15_button").on("click",function(){
//    if($(".odot").css({"display":"block"})){
//        $(".odot").hide(0.01,function(){
//            $(".coupon").show();
//        });
//    }
//    $(".coupon").show();
//});



$(".odot_button").fancybox({
  padding: 0,
  margin: 0,
  hideOnContentClick: true,
  titleShow: false,
  showNavArrows: false,
  afterLoad: function(){ _gaq.push(['_trackEvent', 'Femina_ Survey', 'about_femina_probiotics']); }
});
$(".coupon_button,.coupon_15_button").fancybox({
    scrolling: "no",
    padding: 0,
    margin: 0,
    hideOnContentClick: true,
    titleShow: false,
    showNavArrows: false,
    afterLoad: function(){ _gaq.push(['_trackEvent', 'Femina_ Survey', 'coupon']) }
});

$(".thecoupon").fancybox({
    scrolling: "no",
    padding: 0,
    margin: 0,
    hideOnContentClick: true,
    titleShow: false,
    showNavArrows: false
});


//$(".closeOdot").on("click",function(){
//    $(".odot").hide();
//});
//
//$(".closeCoupon").on("click",function(){
//    $(".coupon").hide();
//});

$("#ready_button").on("click",function(){
    $("#start").hide(0.01);
    _gaq.push(['_trackEvent', 'Femina_ Survey', 'start_surey']);
    //$("#start > .coupon").remove();
    $("#page"+Seker.counter).show(0.01,function(){
        $(".counter").text("שאלה" + " " + Seker.counter +" מתוך 9");
    });
});

$("li > span,.answer").on("click",function(event){
    $(".odot,.coupon").hide(0.01);
    var id = event.target.id;
    var val = 0;
    if(id === ""){
        $(event.target).prev().prev().addClass("selected");
        val = parseInt($(this).prev().val(), 10)
            , questionVal = val * 6.033333333333333;
    }else{
        $(event.target).addClass("selected");
        val = parseInt($(this).next().val(), 10)
            , questionVal = val * 6.033333333333333;
    }
    event.preventDefault();
    var currentPage = $(event.target).attr('class').split(' ');
    _gaq.push(['_trackEvent', 'Femina_ Survey', 'Q-' + currentPage[1]]);
    $( "span." + currentPage[1]+",label." + currentPage[1]).unbind( "click" );
    $( "span." + currentPage[1]+",label." + currentPage[1]).click(function(e){
        e.preventDefault();
    });

    Seker.Answer.push(parseInt(event.target.id));

    if(val === 10){
        questionVal = questionVal + 30;
    }
    Seker.result = Seker.result + val;
    setTimeout(function(){
        $("#page"+Seker.counter).hide(0.01,function(){
            //$("#page"+counter+" "+" > .coupon").remove();
            $(".mad_arrow").css({"marginTop":"213px"});
            Seker.counter = Seker.counter + 1;
            $("#page"+Seker.counter).show(0.01,function(){
                $(".counter").text("שאלה" + " " + Seker.counter +" מתוך 9");
            });
            if(Seker.counter === 10){
                $("#pageForm").show(0.01);
            }
        })
    },2000);
    $(".mad_arrow").animate({
        marginTop:213-questionVal+"px"
    },1000);

});

$("#submit").on("click",function(){
    var error = false;
    var tip = $("textarea").val();
    var fullname = $('input[id="name"]').val();
    var phonenumber = $('input[id="phone"]').val();
    var email = $('input[id="email"]').val();
    var namesplit = fullname.split(" ");

    if(namesplit[1] == undefined || namesplit[0].length < 2 || namesplit[1].length < 2 || isNaN(namesplit[0]) == false || isNaN(namesplit[1]) == false || $.trim(namesplit[0]) == "" || $.trim(namesplit[1]) == ""  || namesplit[1] == "מלא" || namesplit[0] == "שם"){
        $('input[id="name"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא שם תקין");
        $('input[id="name"]').css({"border": "2px solid red"}).val("שם מלא");
        error = true;
    }
    else{
        $('input[id="name"]').css({"border": "2px solid green"});
    }
    if(phonenumber.length < 10 || phonenumber == "נא למלא טלפון תקין" || $.trim(phonenumber) == ""){
        $('input[id="phone"]').css({"border": "2px solid red"}).attr("placeholder","טלפון");
        $('input[id="phone"]').css({"border": "2px solid red"}).val("טלפון");
        error = true;
    }
    else{
        var numbers = /^[0-9]+$/;
        if(numbers.test(phonenumber) == false){
            $('input[id="phone"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא טלפון תקין");
            $('input[id="phone"]').css({"border": "2px solid red"}).val("מספר טלפון");
            error = true;
        }
        else{
            $('input[id="phone"]').css({"border": "2px solid green"});
        }
    }
    if(tip.length > 300 || $.trim(tip) == "" || tip == "נא למלא שדה זה" || tip == "טיפ"){
        $('textarea').css({"border": "2px solid red"}).val("טיפ");
        error = true;
    }
    else{
        $('textarea').css({"border": "2px solid green"});
    }
    if($.trim(email) == "" || email == "נא למלא אימייל תקין" ){
        $('input[id="email"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא אימייל תקין");
        $('input[id="email"]').css({"border": "2px solid red"}).val('דוא״ל' );
        error = true;
    }
    else{
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if(reg.test(email) == false){
            $('input[id="email"]').css({"border": "2px solid red"}).attr("placeholder","נא למלא אימייל תקין");
            $('input[id="email"]').css({"border": "2px solid red"}).val('דוא״ל' );
            error = true;
        }
        else{
            $('input[id="email"]').css({"border": "2px solid green"});
        }
    }
    if(error == false){
        $("#submit").hide(0.01);
        Seker.result = parseInt(Seker.result, 10);
        //sending ajax to server - when server return the result show the comapre page
        $.ajax({
            type: "POST",
            url: "reportLead.php",
            data: { FirstName:fullname, Phone:phonenumber, Email:email , Result : Seker.result , Field_3: tip, Media: $('input[class="userInfoMedia"]').val() , Channel : $('input[class="userInfoChannel"]').val() , Erate : $('input[class="userInfoErate"]').val() , Prod : $('input[class="userInfoProd"]').val() , Size : $('input[class="userInfoSize"]').val()},
            success:function(res){
                 _gaq.push(['_trackEvent', 'Femina_ Survey', 'Sent_Survey']);
                $("#pageForm").hide(0.01,function(){
                    $("#tunnel").show();
                });
            },
            error:function(req,errorType,errorMessage){
                $("#submit").show(0.01);
            }
        }).done(function( msg ) {
                // $("body").html( msg );
            });

        $(".showResult").on("click",function(){
            _gaq.push(['_trackEvent', 'Femina_ Survey', 'Survey_Results']);
            $("#tunnel").hide(0.01,function(){

              showMsgResult();
            });
        });
    }
});

$(".submitCoupon").on("click",function(){
    SubmitCoupun();
});

$(".showMsgResult").on("click",function(){
    _gaq.push(['_trackEvent', 'Femina_ Survey', 'Survey_Results']);
    $("#compare,.coupon,.odot,#pageForm").fadeOut(0.01,function(){
        $("#results").show(0.01);
        if(Seker.result <= 20 ){
            $("#result3").show();
        }
        else if ( Seker.result >= 110){
            $("#result1").show();
        }
        else{
            $("#result2").show();
        }
    });
});

$(".ma_anu_button").on("click",function(){
    _gaq.push(['_trackEvent', 'Femina_ Survey', 'women_answers']);
    $("#results,.odot,.coupon").hide(0.01);
    showComparison();
});

function showComparison() {
  $("#compare").show(0.01,function(){
    var allResults = 257 - (Seker.AvgResult * 0.7148148148148148);
    var userResult = 257 - (Seker.result * 0.7148148148148148);
    $(".mad_all_girls").animate({
      top:allResults+"px"
    },500);
    $(".mad_shelach").animate({
      top:userResult+"px" //result from server
    },1000);
  });
}

function showMsgResult() {
     $("#results").show(0.01);
      if(Seker.result <= 20 ){
        $("#result3").show();
      }
      else if ( Seker.result >= 110){
        $("#result1").show();
      }
      else{
        $("#result2").show();
      }

}

$('a').click(function(event){
    event.preventDefault();
});


$(".share-button").click(function(e){
    e.preventDefault();
    window.open("https://www.facebook.com/sharer/sharer.php?app_id=702592959753537&sdk=joey&u=http%3A%2F%2Fcmp.interactivated.co.il%2FMcCann%2FAltman%2F2011%2FSeker%2F4.html&display=popup","","width=800,height=400");

    return false;
});

$("#close").click(function(){
    $.fancybox.close();
});

$("#closeodot").click(function(){
    $.fancybox.close();
});

