require(["jquery"],function($) {
    $(document).ready(function() {
        jQuery('.btn_action a').click(function(){
            var user_id = jQuery(this).attr('user_id');
            var product_id = jQuery(this).attr('product_id');
            var likedislike = jQuery(this).attr('attr-val');
            if(user_id > 0){
                var customurl = "/likedislike/page/index";
                jQuery('.btn_action a.active').removeClass('active');
                jQuery(this).addClass('active');
                jQuery.ajax({
                    type: 'post',
                    url: customurl,
                    data: {user_id: user_id, product_id: product_id, likedislike: likedislike},
                    success: function(resp){
                        //alert(resp)
                    }
                })
            } else {
                alert('Only loggedin user can like and dislke the product');
                jQuery('.popup_like_dislike').show().delay(2000).fadeOut('slow');
            }
        })
    })
})