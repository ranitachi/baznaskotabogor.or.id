(function($){
    'use strict';
    $(document).on('click','.img-gallery img',function(e){
        var src_img = $(this).attr('src');
        $('.md-content').before('<img class="modal-img" src="'+src_img+'">');
        $('.modal-cc').css('display','block');
        $('.md-overlay').css('visibility','visible');
        $('.md-overlay').css('opacity','1');
    });
    $(document).on('click','.md-close',function(){
        $('.modal-cc').css('display','none');
        $('.md-overlay').css('visibility','hidden');
        $('.md-overlay').css('opacity','0');
        $('.modal-img').remove();
    });
    $(document).on('click','#ov',function(){
        $('.modal-cc').css('display','none');
        $('.md-overlay').css('visibility','hidden');
        $('.md-overlay').css('opacity','0');
        $('.modal-img').remove();
    });
   
})(jQuery);