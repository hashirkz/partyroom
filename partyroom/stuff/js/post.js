$(document).ready(function () {
    $('html').css('--tile-width', '500px');
    $('#upload-post').submit(function (e) {
        e.preventDefault();
        
        let form_data = new FormData();

        let img_path = $('#img-path')[0].files[0];
        

        let img_name = $('#img-name').val();
        form_data.append('img-name', img_name);
        form_data.append('img-path', img_path);


        $.ajax({
            type: 'POST',
            url: '/hidden/upload_post.php',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('success:\n', response);

                resp = JSON.parse(response);
                $('.tile .name').text(resp.img_name);
                $('.tile .img-container img').attr('src', resp.img_path);
            },
            error: function(xhr, status, error) {
                console.error('error:\n', error);
            }
          });
          
    });
});