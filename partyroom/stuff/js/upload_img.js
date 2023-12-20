$(document).ready(function () {
    $('#upload-img').submit(function (e) {
        e.preventDefault();
        
        let form_data = new FormData();

        let img_data = $('#img-data')[0].files[0];
        

        let img_name = $('#img-name').val();
        form_data.append('img-name', img_name);

        form_data.append('img-data', img_data);


        $.ajax({
            type: 'POST',
            url: '/hidden/upload_img.php',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('success:\n', response);
            },
            error: function(xhr, status, error) {
                console.error('error:\n', error);
            }
          });
    });
});