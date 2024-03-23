jQuery(document).ready(function($) {
    $('.ewpbtn-phone-call-icon').on('click', function() {
        window.location.href = 'tel:+123456789'; // Replace with your phone number
    });

 
    $('.ewpbtn-whatsapp-icon').on('click', function() {
        window.location.href = 'https://api.whatsapp.com/send?phone=123456789'; // Replace with your WhatsApp number
    });

    
});
