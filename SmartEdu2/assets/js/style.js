$(document).ready(function() {
    // Header Scroll
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $('#header').addClass('fixed');
        } else {
            $('#header').removeClass('fixed');
        }
    });



    // Fancybox
    $('.work-box').fancybox();

    // Page Scroll
    var sections = $('section')
        nav = $('nav[role="navigation"]');

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();
        sections.each(function() {
            var top = $(this).offset().top - 76
                bottom = top + $(this).outerHeight();
            if (cur_pos >= top && cur_pos <= bottom) {
                nav.find('a').removeClass('active');
                nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
            }
        });
    });
    nav.find('a').on('click', function () {
        var $el = $(this)
            id = $el.attr('href');
        $('html, body').animate({
            scrollTop: $(id).offset().top - 75
        }, 500);
      return false;
    });

    // Mobile Navigation
    $('.nav-toggle').on('click', function() {
        $(this).toggleClass('close-nav');
        nav.toggleClass('open');
        return false;
    }); 
    nav.find('a').on('click', function() {
        $('.nav-toggle').toggleClass('close-nav');
        nav.toggleClass('open');
    });
});
 function validate_img()
{
    var fileInput = document.getElementById('foto_buku');
    var filePath = fileInput.value;
    var allowedExtension = /(\.jpg|\.jpeg|\.png)$/i;
    var length = fileInput.files.length;
    if(filePath == ''){
        alert("file masih kosong");
        return false;
    }
    else{
        if(!allowedExtension.exec(filePath)){
            document.getElementById("status_img").innerHTML = "<span class='warning'>Maaf ekstensi file foto yang anda upload tidak valid!!</span>";
            fileInput.value = "";
            return false;
        }
        else{
              if(fileInput.files && fileInput.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        document.getElementById("imagePreview").innerHTML = '<img src="'+e.target.result+'" height="180px" width="120px"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
        }
    }

}
function validate_video()
{
    var fileInput = document.getElementById('video');
    var filePath = fileInput.value;
    var allowedExtension = /(\.mkv|\.mp4|\.webm)$/i;
    var length = fileInput.files.length;
    if(filePath == ''){
        alert("file masih kosong");
        return false;
    }
    else{
        if(!allowedExtension.exec(filePath)){
            document.getElementById("status_video").innerHTML = "<span class='warning'>Maaf ekstensi video foto yang anda upload tidak valid!!</span>";
            fileInput.value = "";
            return false;
        }
        else{
              if(fileInput.files && fileInput.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        document.getElementById("videoPreview").innerHTML = '<img src="'+e.target.result+'" height="180px" width="120px"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
        }
    }

}
 function liveSearch() {

                var input_data = $('#search_data').val();
                if (input_data.length === 0) {
                    $('#suggestions').hide();
                } else {


                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/smartedu/live_search",
                        data: {search_data: input_data},
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestions').show();
                                $('#autoSuggestionsList').addClass('auto_list');
                                $('#autoSuggestionsList').html(data);
                            }
                        }
                    });
                }
    }

$document.ready(function () {
                $('#datetimepicker1').datetimepicker();
});