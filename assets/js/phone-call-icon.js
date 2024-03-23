(function($) {
    $(document).ready(function() {
        var phone_number = window.phone_obj.phone_number;
        $('.ewpbtn-phone-call-icon').on('click', function() {
            window.location.href = 'tel:' + phone_number;
        });  
    });
})(jQuery);
