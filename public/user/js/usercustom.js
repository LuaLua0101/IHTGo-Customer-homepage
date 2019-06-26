//--------------------------------------------
//           MAIN USER JAVASCRIPT
//--------------------------------------------
$(function () {
    //Test browser on window or phone
    console.log(navigator.userAgent.toString());
    //if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
    //}

    //----------------------------------------------------
    //                      HEADER
    //----------------------------------------------------
    $("#responsive-bar-menu").click(function () {
        $(".secondheader").slideToggle(400);
    });
    $('.body-wrap, footer').on("touchstart", function () {
        $(".secondheader").slideUp(400);
    });
    //-----Fixed Header with transition-----
    if (window.outerWidth <= 990) {
        $('.secondHeadPhoneFix').wrapAll("<div class='navbar navbar-fixed-top' />");
    }
    /*
    This object controls the nav bar. Implement the add and remove
    action over the elements of the nav bar that we want to change.
    type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
    */
    var myNavBar = {
        flagAdd: true,
        elements: [],
        init: function (elements) {
            this.elements = elements;
        },
        add: function () {
            if (this.flagAdd) {
                for (var i = 0;i < this.elements.length;i++) {
                    document.getElementById(this.elements[i]).className += " fixed-theme";
                }
                this.flagAdd = false;
            }
        },
        remove: function () {
            for (var i = 0;i < this.elements.length;i++) {
                document.getElementById(this.elements[i]).className =
                    document.getElementById(this.elements[i]).className.replace(/(?:^|\s)fixed-theme(?!\S)/g, '');
            }
            this.flagAdd = true;
        }
    };
    /**
 * Init the object. Pass the object the array of elements
 * that we want to change when the scroll goes down
 */
    myNavBar.init([
        //"firstheaderID",
        //"brandID",
        //"secondheaderID",
        //"logo-imageID",
        //"btndatgiaohangID",
        "responsive-barID"
        //"drop-vanphongID"
    ]);
    /**
 * Function that manage the direction
 * of the scroll
 */
    function offSetManager() {
        var yOffset = 0;
        var currYOffSet = window.pageYOffset;
        if (yOffset < currYOffSet) {
            myNavBar.add();
        }
        else if (currYOffSet == yOffset) {
            myNavBar.remove();
        }
    }
    /**
     * We have to do a first detectation of offset because the page
     * could be load with scroll down set.
     */
    offSetManager();
    //----------------------------------------------------
    //                      FOOTER
    //----------------------------------------------------
    //Scroll to top
    $(document).on('scroll', function () {
        offSetManager();
        if ($(window).scrollTop() > 100) {
            $('.scroll-top-wrapper').addClass('show');
        } else {
            $('.scroll-top-wrapper').removeClass('show');
        }
    });
    //$(document).on("click", ".scroll-top-wrapper", scrollToTop);
    $('.scroll-top-wrapper').on("click", scrollToTop);
    function scrollToTop() {
        verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({ scrollTop: offsetTop }, 600, 'linear');
    }

    //----------------------------------------------------
    //                      INDEX PAGE
    //----------------------------------------------------
    //--------------Price List--------------
    //Bootstrap carousel swipe
    $(".carousel").on("touchstart", function (event) {
        var xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function (event) {
            var xMove = event.originalEvent.touches[0].pageX;
            if (Math.floor(xClick - xMove) > 5) {
                $(this).carousel('next');
            }
            else if (Math.floor(xClick - xMove) < -5) {
                $(this).carousel('prev');
            }
        });
        $(".carousel").on("touchend", function () {
            $(this).off("touchmove");
        });
    });
    //--------------Owl Carousel Section Index-------------
    $('.user-guide').owlCarousel({
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: false,
                loop: false
            }
        }
    });
    //----------delegate calls to data-toggle="lightbox"------------------
    $(document).on('click', '[data-toggle="lightbox"]', function (e) {
        e.preventDefault();
        if (window.outerWidth > 600) {
            return $(this).ekkoLightbox();
        }
    });
    //------------------AOS Index-------------------
    AOS.init({
        duration: 1000,
        disable: ['phone', 'tablet', 'mobile'],
    });
    //--------------------------------------------------
    //                     ABOUT PAGE
    //--------------------------------------------------
    $('[data-mask]').inputmask();
    $('#contactEmail').inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}][@]*{1,20}[.*{2,6}][.*{1,2}]",
        greedy: false,
        onBeforePaste: function (pastedValue, opts) {
            pastedValue = pastedValue.toLowerCase();
            return pastedValue.replace("mailto:", "");
        },
        definitions: {
            '*': {
                validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                casing: "lower"
            }
        },
        placeholder: ""
    });
    //Validate About
    var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    $(document).on('click', '#btnContactSubmit', function () {
        var error = 0;
        //contactName
        if ($.trim($('#contactName').val()) == "") {
            $('#errorContactName').text("Họ và tên không được để trống!");
            error++;
        } else if ($('#contactName').val().length < 2) {
            $('#errorContactName').text("Họ và tên không được dưới 2 ký tự!");
            error++;
        } else if ($('#contactName').val().length > 50) {
            $('#errorContactName').text("Họ và tên nhỏ hơn 50 ký tự!");
            error++;
        } else {
            $('#errorContactName').text("");
        }
        //contactPhone
        if ($.trim($('#contactPhone').val()) == "") {
            $('#errorContactPhone').text("Số điện thoại không được để trống!");
            error++;
        } else if ($('#contactPhone').val().length < 15) {
            $('#errorContactPhone').text("Số điện thoại từ 9 đến 10 số!");
            error++;
        } else {
            $('#errorContactPhone').text("");
        }
        //contactEmail
        if ($.trim($('#contactEmail').val()) == "") {
            $('#errorContactEmail').text("Email không được để trống!");
            error++;
        } else if (!regexEmail.test($('#contactEmail').val().toLowerCase())) {
            $('#errorContactEmail').text("Email không hợp lệ!");
            error++;
        } else {
            $('#errorContactEmail').text("");
        }
        return (error != 0) ? false : true;
    });
    //contactName
    $('#contactName').on('change keydown', function () {
        $('#errorContactName').text("");
    });
    $('#contactName').on('focusout blur', function () {
        if ($.trim($('#contactName').val()) == "") {
            $('#errorContactName').text("Họ và tên không được để trống!");
        } else if ($('#contactName').val().length < 2) {
            $('#errorContactName').text("Họ và tên không được dưới 2 ký tự!");
        } else if ($('#contactName').val().length > 50) {
            $('#errorContactName').text("Họ và tên nhỏ hơn 50 ký tự!");
        } else {
            $('#errorContactName').text("");
        }
    });
    //contactPhone
    $('#contactPhone').on('change keydown', function () {
        $('#errorContactPhone').text("");
    });
    $('#contactPhone').on('focusout blur', function () {
        if ($.trim($('#contactPhone').val()) == "") {
            $('#errorContactPhone').text("Số điện thoại không được để trống!");
        } else if ($('#contactPhone').val().length < 15) {
            $('#errorContactPhone').text("Số điện thoại từ 9 đến 10 số!");
        } else {
            $('#errorContactPhone').text("");
        }
    });
    //contactEmail
    $('#contactEmail').on('change keydown', function () {
        $('#errorContactEmail').text("");
    });
    $('#contactEmail').on('focusout blur', function () {
        if ($.trim($('#contactEmail').val()) == "") {
            $('#errorContactEmail').text("Email không được để trống!");
        } else if (!regexEmail.test($('#contactEmail').val().toLowerCase())) {
            $('#errorContactEmail').text("Email không hợp lệ!");
        } else {
            $('#errorContactEmail').text("");
        }
    });
    //check form login
    $("#email1").blur(function () {
        var email = $.trim($("#email1").val());
        if (email == '') {
            $('#error-email1').text('Email không được trống');
            $('#email1').focus();
        } else if (!isEmail(email)) {
            $('#error-email1').text('Email không đúng định dạng');
            $('#email1').focus();
        } else {
            $('#error-email1').text('');
        }
    });
    $("#password1").blur(function () {
        var password = $.trim($("#password1").val());
        if (password == '') {
            $('#error-password1').text('Mật khẩu không được trống');
            $('#password1').focus();
        } else if (password.length < 6) {
            $('#error-password1').text('Mật khẩu phải phải lớn hơn 6 ký tự');
            $('#password1').focus();
        } else {
            $('#error-password1').text('');
        }
    });
    $("#formLogin").keyup(function () {
        var email = $.trim($("#email1").val());
        var password = $.trim($("#password1").val());
        if (email != '' && password != '' && password.length > 5 && isEmail(email)) {
            $('#btnLogin').prop("disabled", false);
        }
        else {
            $('#btnLogin').prop("disabled", true);
        }
    });
    //check form register
    $("#name2").blur(function () {
        var name = $.trim($("#name2").val());
        if (name == '') {
            $('#error-name2').text('Họ Tên không được trống');
            $('#name2').focus();
        } else {
            $('#error-name2').text('');
        }
    });
    $("#email2").blur(function () {
        var email = $.trim($("#email2").val());
        if (email == '') {
            $('#error-email2').text('Email không được trống');
            $('#email2').focus();
        } else if (!isEmail(email)) {
            $('#error-email2').text('Email không đúng định dạng');
            $('#email2').focus();
        } else {
            $('#error-email2').text('');
        }
    });
    $("#phone2").blur(function () {
        var phone = $.trim($("#phone2").val());
        if (phone == '') {
            $('#error-phone2').text('Số điện thoại không được trống');
            $('#phone2').focus();
        } else if (!checkPhoneNumber(phone)) {
            $('#error-phone2').text('Số điện thoại không đúng định dạng');
            $('#phone2').focus();
        }
        else {
            $('#error-phone2').text('');
        }
    });
    $("#password2").blur(function () {
        var password = $.trim($("#password2").val());
        if (password == '') {
            $('#error-password2').text('Mật khẩu không được trống');
            $('#password2').focus();
        } else if (password.length < 6) {
            $('#error-password2').text('Mật khẩu phải phải lớn hơn 6 ký tự');
            $('#password2').focus();
        } else {
            $('#error-password2').text('');
        }
    });
    $("#re-password2").blur(function () {
        var password = $.trim($("#password2").val());
        var re_password = $.trim($("#re-password2").val());
        if (re_password == '') {
            $('#error-re-password2').text('Mật khẩu không được trống');
            $('#re-password2').focus();
        } else if (re_password.length < 6) {
            $('#error-re-password2').text('Mật khẩu phải phải lớn hơn 6 ký tự');
            $('#re-password2').focus();
        }
        else if (password != re_password) {
            $('#error-re-password2').text('Mật khẩu nhập lại không đúng');
        } else {
            $('#error-re-password2').text('');
        }
    });
    $("#formRegister").keyup(function () {
        var name = $.trim($("#name2").val());
        var email = $.trim($("#email2").val());
        var phone = $.trim($("#phone2").val());
        var password = $.trim($("#password2").val());
        var re_password = $.trim($("#re-password2").val());
        var flag = 0;
        if (name != '' && email != '' && phone != '' && password != '' && re_password != '') {
            flag++;
        }
        if (password.length > 5 && re_password.length > 5) {
            flag++;
        }
        if (isEmail(email) && checkPhoneNumber(phone)) {
            flag++;
        } if (password == re_password) {
            flag++;
        } if (flag == 4) {
            $('#btnRegister').prop("disabled", false);
        }
        else {
            $('#btnRegister').prop("disabled", true);
        }
    });
    //validate email
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    //validate
    function checkPhoneNumber(data) {
        var flag = false;
        var phone = data; // ID của trường Số điện thoại
        phone = phone.replace('(+84)', '0');
        phone = phone.replace('+84', '0');
        phone = phone.replace('0084', '0');
        phone = phone.replace(/ /g, '');
        if (phone != '') {
            var firstNumber = phone.substring(0, 2);
            if ((firstNumber == '09' || firstNumber == '08' || firstNumber == '07' || firstNumber == '05' || firstNumber == '03') && phone.length == 10) {
                if (phone.match(/^\d{10}/)) {
                    flag = true;
                }
            }
        }
        return flag;
    }
});

