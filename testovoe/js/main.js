$(document).ready(function() {

    let question = $('.section-3 h3');
    let answer = $('.section-3 p');

    for (let i = 0; i < question.length; i++) {
        question.eq(i).on('click', function() {
            question.removeClass('h3-active');
            question.eq(i).addClass('h3-active');
            answer.removeClass('p-active');
            answer.eq(i).addClass('p-active');
        });
    }

});