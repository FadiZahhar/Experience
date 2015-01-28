// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation({
  orbit: {
    animation: 'slide',
    timer_speed: 5000,
    pause_on_hover: false,
    animation_speed: 5000,
    navigation_arrows: false,
    bullets: false,
    timer: false,
    slide_number:false
  }
});

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateForm() {
    var mainObj = $('form');
    var firstname = mainObj.find('#firstname');
    var lastname = mainObj.find('#lastname');
    var email = mainObj.find('#email');
    var subject = mainObj.find('#subject')
    var message = mainObj.find('#message');
    var flag = true;
    if(firstname.val()=="") {
        firstname.attr('style','border:1px solid #FF0000');
        flag = false;
    }
    else {
        firstname.attr('style','border:1px solid #00FF00');
        flag=true;
    }

    if(lastname.val()=="") {
        lastname.attr('style','border:1px solid #FF0000');
        flag = false;
    }
    else {
        lastname.attr('style','border:1px solid #00FF00');
        flag=true;
    }

    if(email.val()=="") {
        email.attr('style','border:1px solid #FF0000');
        flag = false;
    }
    else if(!validateEmail(email.val())) {
        email.attr('style','border:1px solid #FF0000');
        flag = false;
    }
    else {
        email.attr('style','border:1px solid #00FF00');
        flag=true;
    }

    if(subject.val()=="") {
        subject.attr('style','border:1px solid #FF0000');
        flag = false;
    }
    else {
        subject.attr('style','border:1px solid #00FF00');
        flag=true;
    }

    if(message.val()=="") {
        message.attr('style','border:1px solid #FF0000');
        flag = false;
    }
    else {
        message.attr('style','border:1px solid #00FF00');
        flag=true;
    }

    return flag;
}

function submitForm(obj) {
    //alert('formsubmited');
    $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: './../wp-content/themes/twentyfifteen-child/imkan_form_submit.php',
            type: "POST",
            dataType: 'json',
            data: obj.serialize(),
            success: function(result) {
                    //alert(result.message);
                    obj.attr('style','color:#000');
                    obj.html(result.message);

                }
        });
}

$(document).ready(function(){
	$('form').find('button').on('click', function(){
                event.preventDefault();
                if(validateForm()){
                    submitForm($('form'));
                }
	});

  $('.slide').slick({
    dots: true,
    arrows: true,
    prevArrow: '',
    nextArrow: '',
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    vertical: false
  });

  $('.news_gallery').slick({
    dots: true,
    arrows: true,
    prevArrow: '',
    nextArrow: '',
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    vertical: false
  });

  $('.gal').slick({
    dots: true,
    arrows: true,
    prevArrow: '',
    nextArrow: '',
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    vertical: false
  });

});
