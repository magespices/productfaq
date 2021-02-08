define([
    'jquery'
], function ($) {
    $(function () {
        $('.question').on('click', function () {
            let answer = $(this).children('.answer');
            if(answer.css('display') === 'none') {
                answer.fadeIn('slow');
            } else {
                answer.fadeOut('slow');
            }
        });
    });
});