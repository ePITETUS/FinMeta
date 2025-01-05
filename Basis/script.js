$(document).ready(function() {
    $('#mobile_btn').on('click', function () {
        $('mobile_menu').toggleclass('active');
        $('mobile_btn').find('i').toggleclass('fa-x');
    });
});