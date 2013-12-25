    var generateQuestionPage = function generateQuestionPage(num){
        num = parseInt(num, 10);
        var source   = $("#Question-Page-HBS").html();
        var template = Handlebars.compile(source);

        switch(num)
        {
            case 1:
                $('#Starting-Page').hide();
                var context = { question: 'this is question1', 
                                question_number: '1', 
                                answers: [ 
                                    {answer:'answer 1', number: 1, page: 1},
                                    {answer:'answer 2', number: 2, page: 1}, 
                                    {answer:'answer 3', number: 3, page: 1} 
                                ]};
                var html    = template(context);
                break;
            case 2:
                var context = { question: 'this is question 2222',
                                question_number: '1', 
                                answers: [ {
                                    answer:'answer 1', number: 1, page: 2},
                                    {answer:'answer 2', number: 2, page: 2},
                                    {answer:'answer 3', number: 3, page: 2}
                                ]};
                var html    = template(context);
                break;
            case 3:
                var context = {question: 'this is question 3',
                                question_number: '1', 
                                answers: [ {
                                    answer:'answer 1', number: 1, page: 3},
                                    {answer:'answer 2', number: 2, page: 3},
                                    {answer:'answer 3', number: 3, page: 3} 
                                ]};
                var html    = template(context);
                break;
            case 4:
                var context = { question: 'this is question 4',
                                question_number: '1', 
                                answers: [ 
                                    {answer:'answer 1', number: 1, page: 4},
                                    {answer:'answer 2', number: 2, page: 4},
                                    {answer:'answer 3', number: 3, page: 4}
                                ]};
                var html    = template(context);
                break;
            case 5:
                var context = { question: 'this is question 5', 
                                question_number: '1', 
                                answers: [ 
                                    {answer:'answer 1', number: 1, page: 5},
                                    {answer:'answer 2', number: 2, page: 5},
                                    {answer:'answer 3', number: 3, page: 5}
                                ]};
                var html    = template(context);
                break;
            case 6:
                var context = { question: 'this is question 6',
                                question_number: '1', 
                                answers: [ 
                                    {answer:'answer 1', number: 1, page:6},
                                    {answer:'answer 2', number: 2, page: 6},
                                    {answer:'answer 3', number: 3, page: 6}
                                ]};
                var html    = template(context);
                break;
            case 7:
                var context = { question: 'this is question 7', 
                                question_number: '1', 
                                answers: [ 
                                    {answer:'answer 1', number: 1, page: 7},
                                    {answer:'answer 2', number: 2, page: 7},
                                    {answer:'answer 3', number: 3, page: 7} 
                                ]};
                var html    = template(context);
                break;
            case 8:
                var context = { question: 'this is question 8',
                                question_number: '1', 
                                answers: [ 
                                    {answer:'answer 1', number: 1, page: 8},
                                    {answer:'answer 2', number: 2, page: 8},
                                    {answer:'answer 3', number: 3, page: 8} 
                                ]};
                var html    = template(context);
                break;
            case 9:
                var context = { question: 'this is question 9',
                                question_number: '1', 
                                answers: [ 
                                    {answer:'answer 1', number: 1, page: 9},
                                    {answer:'answer 2', number: 2, page: 9},
                                    {answer:'answer 3', number: 3, page: 9}
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
    page = page+1;
    generateQuestionPage(page);
}

var contactForm = function contactForm(){

    var source   = $("#Result-Page-HBS").html();
    var template = Handlebars.compile(source);
    var context  = {};
    var html    = template(context);
    $('#Question-Page').html(html);

}
