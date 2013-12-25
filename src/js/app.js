    var generateQuestionPage = function generateQuestionPage(num){
        num = parseInt(num, 10);
        var source   = $("#Question-Page-HBS").html();
        var template = Handlebars.compile(source);

        switch(num)
        {
            case 1:
                $('#Starting-Page').hide();
                var context = { question: 'התחדשת בחזייה סקסית, את אומרת לעצמך:', 
                                question_number: '1', 
                                answers: [ 
                                    {answer:' זה לא מגיע לו', number: 1, page: 1},
                                    {answer:' צריכה להתאים לה תחתונים ', number: 2, page: 1}, 
                                    {answer:'עדיף בלי תחתונים', number: 3, page: 1} 
                                ]};
                var html    = template(context);
                break;
            case 2:
                var context = { question: 'סיימת יום עבודה ארוך ואת בדרך לקיים סקס לוהט רגע לפני את:',
                                question_number: '2', 
                                answers: [ {
                                    answer:'רצה מהר להתקלח!', number: 1, page: 2},
                                    {answer:' מבשמת את עצמי במקומות הנכונים', number: 2, page: 2},
                                    {answer:'מעבירה מגבון...', number: 3, page: 2}
                                ]};
                var html    = template(context);
                break;
            case 3:
                var context = {question: 'בן הזוג הכניס סרט כחול ל-DVD, איך את מגיבה?',
                                question_number: '3', 
                                answers: [ {
                                    answer:' איכס דוחה', number: 1, page: 3},
                                    {answer:'מאמי אני לא מספיקה לך?', number: 2, page: 3},
                                    {answer:'מאמי שנצלם אחד כזה שלנו?', number: 3, page: 3} 
                                ]};
                var html    = template(context);
                break;
            case 4:
                var context = { question: 'כשאת סובלת מפטרייה בנרתיק את:',
                                question_number: '4', 
                                answers: [ 
                                    {answer:'לוקחת מקדם בטחון ומתנזרת כל החודש מסקס', number: 1, page: 4},
                                    {answer:'מתקלחת היטב לפני... ומקווה לטוב :)', number: 2, page: 4},
                                    {answer:'שולחת את בן זוגי לקנות דחוף פרוביוטיק פמינה', number: 3, page: 4}
                                ]};
                var html    = template(context);
                break;
            case 5:
                var context = { question: 'איך את מורידה חזייה?', 
                                question_number: '5', 
                                answers: [ 
                                    {answer:'מורידה לו פקודה שימהר', number: 1, page: 5},
                                    {answer:'ביד אחת', number: 2, page: 5},
                                    {answer:'לא מאמינה בחזיות', number: 3, page: 5}
                                ]};
                var html    = template(context);
                break;
            case 6:
                var context = { question: 'את מרגישה עקצוץ לא נעים באזור האינטימי, ומה לעשות את באמצע ישיבת הנהלה... מה את עושה?',
                                question_number: '6', 
                                answers: [ 
                                    {answer:'סובלת בשקט וממשיכה לחייך... (פולנייה!)', number: 1, page:6},
                                    {answer:'מסמסת מתחת לשולחן לחברה שיושבת מולי (חייבת לחלוק!)', number: 2, page: 6},
                                    {answer:' מספרת לכולם שהילד קיבל מכה בגן ורצה לקנות פרוביוטיק פמינה ', number: 3, page: 6}
                                ]};
                var html    = template(context);
                break;
            case 7:
                var context = { question: 'נשי ופראי או חלק לגמרי?', 
                                question_number: '7', 
                                answers: [ 
                                    {answer:'מה? לא הבנתי...', number: 1, page: 7},
                                    {answer:'מסודר ומוקפד', number: 2, page: 7},
                                    {answer:'סימן הכוון לכיוון ברור', number: 3, page: 7} 
                                ]};
                var html    = template(context);
                break;
            case 8:
                var context = { question: 'בנך בן ה-4 מבקש להתקלח איתך את:',
                                question_number: '8', 
                                answers: [ 
                                    {answer:'שולחת אותו לאבא שלו', number: 1, page: 8},
                                    {answer:'נו שויין.. אבל בלי שאלות מיותרות', number: 2, page: 8},
                                    {answer:' ברור! ומנצלת את המקלחת ללימוד שיעור אנטומיה', number: 3, page: 8} 
                                ]};
                var html    = template(context);
                break;
            case 9:
                var context = { question: 'איך את נוהגת לישון?',
                                question_number: '9', 
                                answers: [ 
                                    {answer:' עם הפיג\'מה שקיבלתי במסיבת רווקות', number: 1, page: 9},
                                    {answer:'עם הטי-שירט של בן הזוג', number: 2, page: 9},
                                    {answer:' רק עם גרביים!', number: 3, page: 9}
                                ]};
                var html    = template(context);
                break;
            case 10:
                var source   = $("#Contact-Final-Page-HBS").html();
                var template = Handlebars.compile(source);
                var context  = {};
                var html    = template(context);
                break;
            default:
                var source   = $("#Contact-Final-Page-HBS").html();
                var template = Handlebars.compile(source);
                var context  = {};
                var html    = template(context);
                break;
        }

        $('#Question-Page').html(html);
    }


var addAnswerEvent = function addAnswerEvent(page, ans){
    var AnswerScore = [0,1,10,30];
    if (Seker.Answer[page] === undefined){

        console.log('page: %s, answer: %s', page, ans);
        //Disable click
        Seker.Answer[page] = ans;
        //Move #Meter-Arrow
        if (ans == 3){
            $("#Meter-Arrow").animate({
                'margin-top': '30px'
            },1500);
        }
        else if( ans == 2){
            $("#Meter-Arrow").animate({
                'margin-top': '123px'
            },1000);
        }
        else{
            ans = 1;
            $("#Meter-Arrow").animate({
                'margin-top': '213px'
            },500);
        }
        //Save answer 
        Seker.result = AnswerScore[ans];
        //Move to next page
        setTimeout(function() {
            page = page+1;
            generateQuestionPage(page);
        },3000);
    }
}

var contactForm = function contactForm(){

    //Validate Field
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
    if(error == false)
    {
        $('#Contact-Final-Submit').hide();
        Seker.result = parseInt(Seker.result, 10);
        //sending ajax to server - when server return the result show the comapre page
        $.ajax({
            type: "POST",
            url: "reportLead.php",
            data: { FirstName:fullname, Phone:phonenumber, Email:email , Result : Seker.result , Field_3: tip, Media: $('input[class="userInfoMedia"]').val() , Channel : $('input[class="userInfoChannel"]').val() , Erate : $('input[class="userInfoErate"]').val() , Prod : $('input[class="userInfoProd"]').val() , Size : $('input[class="userInfoSize"]').val()},
            success:function(res){
                 _gaq.push(['_trackEvent', 'Femina_ Survey', 'Sent_Survey']);
                
                var source   = $("#Thank-You-Page-HBS").html();
                var template = Handlebars.compile(source);
                var context  = {};
                var html    = template(context);
                $('#Question-Page').html(html);
            },
            error:function(req,errorType,errorMessage){
                $('#Contact-Final-Submit').show();
            }
        }).done(function( msg ) {
               //Done.
        });

    }

}



var getResultPage = function getResultPage(){
   
    if(Seker.Result <= 20 )       
      var Json =  {result_text: " את שומרת על עצמך ועל בריאותך ופרוביוטיק פמינה זה בדיוק בשבילך. אבל אל תשכחי לפעמים לשחרר ולאפשר לעצמך את מה שמגיע לך, פרגני לעצמך ותמצאי לעצמך את האיזון שלך. סמכי עלינו, זה אפשרי. אז שמרי על קשר ובהצלחה!", result_header: 'מחוברת אבל עם גבולות'}; 
    else if ( Seker.result >= 110)
        var Json =  {result_text: "מחוברת מחוברת מחוברת! את יודעת ליהנות מהחיים....את פשוט לא מכירה שום דרך אחרת! תמשיכי כך, אבל........... אל תשכחי לשמור על עצמך ותזכרי תמיד לשמור על הבריאות האינטימית שלך כדי שתוכלי להמשיך לכבוש את העולם ובהצלחה!", result_header: 'מחוברת מדי!'}; 
    else
        var Json =  {result_text: " לגמרי מחוברת אבל גם לא מנותקת מגבולות ההיגיון. את משוחררת, עושה חיים ולא מוותרת על הצד הכיפי של החיים. סחתיין עליך! תמשיכי לשמור על הבריאות האינטימית שלך כדי שתוכלי להמשיך להינות מהחיים  שמרי על קשר ובהצלחה!", result_header: 'מחוברת כמו שצריך'}; 

    var source   = $("#Result-Page-HBS").html();
    var template = Handlebars.compile(source);
    var context  = Json;
    var html    = template(context);
    $('#Question-Page').html(html);
}

