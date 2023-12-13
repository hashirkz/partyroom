$(document).ready(function () {
    $('#login').submit(function (e) {
        e.preventDefault();
        
        let form_data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/hidden/signup_auth.php',
            data: form_data,
            success: function(response) {
                console.log('success:\n', response);
            },
            error: function(xhr, status, error) {
                console.error('error:\n', error);
            }
          });
    });
});