$('.mybutton').click(function() {


    $(this).parent('li').siblings().removeClass('active');
    $(this).parent('li').addClass('active');

});
