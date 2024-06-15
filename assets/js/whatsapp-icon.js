(function($) {
    $(document).ready(function() {
        var whatsapp_number = window.whatsapp_obj.whatsapp_number;
        $('.ewpci-whatsapp-icon').on('click', function() {
            var formatted_number = whatsapp_number.replace(/[+() %-]/g, ''); 
            window.location.href = 'https://api.whatsapp.com/send?phone=' + formatted_number;
        });
    });
})(jQuery);
