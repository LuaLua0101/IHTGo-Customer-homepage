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

    //----------------------------------------------------
    //                      FOOTER
    //----------------------------------------------------
    //Scroll to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('#back-to-top').tooltip('show');

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
    //------------------------Raymond edit----------------------
    //validate form login--------------
    $("#phone1").blur(function () {
        var phone = $.trim($("#phone1").val());
        if (phone == '') {
            $('#error-phone1').text('Số điện thoại không được trống');
        } else if (!checkPhoneNumber(phone)) {
            $('#error-phone1').text('Số điện thoại không đúng định dạng');
        } else {
            $('#error-phone1').text('');
        }
    });
    $("#password1").blur(function () {
        var password = $.trim($("#password1").val());
        if (password == '') {
            $('#error-password1').text('Mật khẩu không được trống');
        } else if (password.length < 6) {
            $('#error-password1').text('Mật khẩu phải phải lớn hơn 6 ký tự');
        } else {
            $('#error-password1').text('');
        }
    });
    $("#formLogin").keyup(function () {
        var phone = $.trim($("#phone1").val());
        var password = $.trim($("#password1").val());
        if (phone != '' && password != '' && password.length > 5 && checkPhoneNumber(phone)) {
            $('#btnLogin').prop("disabled", false);
        }
        else {
            $('#btnLogin').prop("disabled", true);
        }
    });
    //validate form register-----------
    $("#name2").blur(function () {
        var name = $.trim($("#name2").val());
        if (name == '') {
            $('#error-name2').text('Họ Tên không được trống');
        } else {
            $('#error-name2').text('');
        }
    });
    $("#email2").blur(function () {
        var email = $.trim($("#email2").val());

        $.ajax({
            type: "GET",
            url: 'checkExistEmail/' + email,
            success: function (data) {
                if (data != 200) {
                    $('#error-email2').text('Email đã được sử dụng');
                } else {
                    if (email == '') {
                        $('#error-email2').text('Email không được trống');
                    } else if (!isEmail(email)) {
                        $('#error-email2').text('Email không đúng định dạng');
                    } else {
                        $('#error-email2').text('');
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log('jqXHR:');
                console.log(jqXHR);
            }
        })

    });
    $("#phone2").blur(function () {
        var phone = $.trim($("#phone2").val());
        $.ajax({
            type: "GET",
            url: 'checkExistPhone/' + phone,
            success: function (data) {
                if (data != 200) {
                    $('#error-phone2').text('Số điện thoại đã được sử dụng');
                } else {
                    if (phone == '') {
                        $('#error-phone2').text('Số điện thoại không được trống');
                    } else if (!checkPhoneNumber(phone)) {
                        $('#error-phone2').text('Số điện thoại không đúng định dạng');
                    }
                    else {
                        $('#error-phone2').text('');
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log('jqXHR:');
                console.log(jqXHR);
            }
        })
    });
    $("#password2").blur(function () {
        var password = $.trim($("#password2").val());
        if (password == '') {
            $('#error-password2').text('Mật khẩu không được trống');
        } else if (password.length < 6) {
            $('#error-password2').text('Mật khẩu phải phải lớn hơn 6 ký tự');
        } else {
            $('#error-password2').text('');
        }
    });
    $("#re-password2").blur(function () {
        var password = $.trim($("#password2").val());
        var re_password = $.trim($("#re-password2").val());
        if (re_password == '') {
            $('#error-re-password2').text('Mật khẩu không được trống');
        } else if (re_password.length < 6) {
            $('#error-re-password2').text('Mật khẩu phải phải lớn hơn 6 ký tự');
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
    //validate form info user-----------
    $("#name3").blur(function () {
        var name = $.trim($("#name3").val());
        if (name == '') {
            $('#error-name3').text('Họ Tên không được trống');
        } else {
            $('#error-name3').text('');
        }
    });
    $("#address3").blur(function () {
        var name = $.trim($("#address3").val());
        if (name == '') {
            $('#error-address3').text('Địa chỉ không được trống');
        } else {
            $('#error-address3').text('');
        }
    });
    $("#formInfoUser").keyup(function () {
        var name = $.trim($("#name3").val());
        var address = $.trim($("#address3").val());
        var flag = 0;
        if (name != '' && address != '') {
            flag++;
        }
        if (flag == 1) {
            $('#btnInfoUser').prop("disabled", false);
        }
        else {
            $('#btnInfoUser').prop("disabled", true);
        }
    });
    //validate form change password-----------
    $("#current-password4").blur(function () {
        var password = $.trim($("#current-password4").val());
        $.ajax({
            type: "GET",
            url: 'checkExistPasswordCurrent/' + password,
            success: function (data) {
                if (data != 200) {
                    $('#error-current-password4').text('Password không trùng khớp');
                } else {
                    if (password == '') {
                        $('#error-current-password4').text('Mật khẩu không được trống');
                    } else if (password.length < 6) {
                        $('#error-current-password4').text('Mật khẩu phải phải lớn hơn 6 ký tự');
                    } else {
                        $('#error-current-password4').text('');
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log('jqXHR:');
                console.log(jqXHR);
            }
        })
    });
    $("#new-password4").blur(function () {
        var password = $.trim($("#new-password4").val());
        if (password == '') {
            $('#error-new-password4').text('Mật khẩu không được trống');
        } else if (password.length < 6) {
            $('#error-new-password4').text('Mật khẩu phải phải lớn hơn 6 ký tự');
        } else {
            $('#error-new-password4').text('');
        }
    });
    $("#re-password4").blur(function () {
        var password = $.trim($("#new-password4").val());
        var re_password = $.trim($("#re-password4").val());
        if (re_password == '') {
            $('#error-re-password4').text('Mật khẩu không được trống');
        } else if (re_password.length < 6) {
            $('#error-re-password4').text('Mật khẩu phải phải lớn hơn 6 ký tự');
        }
        else if (password != re_password) {
            $('#error-re-password4').text('Mật khẩu nhập lại không đúng');
        } else {
            $('#error-re-password4').text('');
        }
    });
    $("#formChangePassword").keyup(function () {
        var current_password = $.trim($("#current-password4").val());
        var password = $.trim($("#new-password4").val());
        var re_password = $.trim($("#re-password4").val());
        var flag = 0;
        if (current_password != '' && password != '' && re_password != '') {
            flag++;
        }
        if (current_password.length > 5 && password.length > 5 && re_password.length > 5) {
            flag++;
        }
        if (password == re_password) {
            flag++;
        } if (flag == 3) {
            $('#btnChangePassword').prop("disabled", false);
        }
        else {
            $('#btnChangePassword').prop("disabled", true);
        }
    });

    //validate form change search order-----------
    $("#start-date").change(function () {
        var start_date = $.trim($("#start-date").val());
        if (start_date == '') {
            $('#error-start-date').text('Vui lòng chọn ngày bắt đầu');
        } else {
            $('#error-start-date').text('');
        }
    });
    $("#end-date").change(function () {
        var start_date = $.trim($("#start-date").val());
        var end_date = $.trim($("#end-date").val());
        if (end_date == '') {
            $('#error-end-date').text('Vui lòng chọn ngày bắt đầu');
        } else if (start_date > end_date) {
            $('#error-end-date').text('Vui lòng chọn ngày kết thúc lớn hơn ngày bắt đầu');
        }
        else {
            $('#error-end-date').text('');
        }
    });
    $("#formSearchOrder").change(function () {
        var start_date = $.trim($("#start-date").val());
        var end_date = $.trim($("#end-date").val());
        var flag = 0;
        if (start_date != '' && end_date != '') {
            flag++;
        }
        if (start_date < end_date) {
            flag++;
        }
        if (flag == 2) {
            $('#btnSearchOrder').prop("disabled", false);
        }
        else {
            $('#btnSearchOrder').prop("disabled", true);
        }
    });
    //validate form create order-----------
    $("#sender_name").blur(function () {
        var name = $.trim($("#sender_name").val());
        if (name == '') {
            $('#error-sender-name').text('Họ Tên không được trống');
        } else {
            $('#error-sender-name').text('');
        }
    });
    $("#sender_phone").blur(function () {
        var phone = $.trim($("#sender_phone").val());
        if (phone == '') {
            $('#error-sender-phone').text('Số điện thoại không được trống');
        } else if (!checkPhoneNumber(phone)) {
            $('#error-sender-phone').text('Số điện thoại không đúng định dạng');
        }
        else {
            $('#error-sender-phone').text('');
        }
    });
    $("#sender_province_id").blur(function () {
        var province = $.trim($("#sender_province_id").val());
        if (province == '' || province == 0) {
            $('#error-sender-province-id').text('Tỉnh-thành phố không được trống');
        } else {
            $('#error-sender-province-id').text('');
        }
    });
    $("#sender_district_id").blur(function () {
        var district = $.trim($("#sender_district_id").val());
        if (district == '' || district == 0) {
            $('#error-sender-district-id').text('Quận - huyện không được trống');
        } else {
            $('#error-sender-district-id').text('');
        }
    });
    $("#sender_address").blur(function () {
        var address = $.trim($("#sender_address").val());
        if (address == '') {
            $('#error-sender-address').text('Địa chỉ không được trống');
        } else {
            $('#error-sender-address').text('');
        }
    });
    $("#receive_name").blur(function () {
        var name = $.trim($("#receive_name").val());
        if (name == '') {
            $('#error-receive-name').text('Họ Tên không được trống');
        } else {
            $('#error-receive-name').text('');
        }
    });
    $("#receive_phone").blur(function () {
        var phone = $.trim($("#receive_phone").val());
        if (phone == '') {
            $('#error-receive-phone').text('Số điện thoại không được trống');
        } else if (!checkPhoneNumber(phone)) {
            $('#error-receive-phone').text('Số điện thoại không đúng định dạng');
        } else {
            $('#error-receive-phone').text('');
        }
    });
    $("#receive_province_id").blur(function () {
        var province = $.trim($("#receive_province_id").val());
        if (province == '' || province == 0) {
            $('#error-receive-province-id').text('Tỉnh-thành phố không được trống');
        } else {
            $('#error-receive-province-id').text('');
        }
    });
    $("#receive_district_id").blur(function () {
        var district = $.trim($("#receive_district_id").val());
        if (district == '' || district == 0) {
            $('#error-receive-district-id').text('Quận - huyện không được trống');
        } else {
            $('#error-receive-district-id').text('');
        }
    });
    $("#receive_address").blur(function () {
        var address = $.trim($("#receive_address").val());
        if (address == '') {
            $('#error-receive-address').text('Địa chỉ không được trống');
        } else {
            $('#error-receive-address').text('');
        }
    });
    $("#length").blur(function () {
        var length = $.trim($("#length").val());
        if (length == '') {
            $('#error-size-order').text('Chiều dài không được trống');
        } else {
            $('#error-size-order').text('');
        }
    });
    $("#width").blur(function () {
        var width = $.trim($("#width").val());
        if (width == '') {
            $('#error-size-order').text('Chiều rộng không được trống');
        } else {
            $('#error-size-order').text('');
        }
    });
    $("#weight").blur(function () {
        var weight = $.trim($("#weight").val());
        if (weight == '') {
            $('#error-weight-order').text('Trọng lượng không được trống');
        } else if (weight > 25) {
            $('#error-weight-order').text('Trọng lượng không được lớn hơn 25kg');
        }
        else {
            $('#error-weight-order').text('');
        }
    });
    $("#formCreateOrder").change(function () {
        var sender_name = $.trim($("#sender_name").val());
        var sender_phone = $.trim($("#sender_phone").val());
        var sender_province_id = $.trim($("#sender_province_id").val());
        var sender_address = $.trim($("#sender_address").val());
        var sender_name = $.trim($("#sender_name").val());
        var receive_name = $.trim($("#receive_name").val());
        var receive_phone = $.trim($("#receive_phone").val());
        var receive_province_id = $("#receive_province_id").val();
        var receive_district_id = $("#receive_district_id").val();
        var receive_address = $.trim($("#receive_address").val());
        var length = $.trim($("#length").val());
        var width = $.trim($("#width").val());
        var weight = $.trim($("#weight").val());

        var flag = 0;
        if (sender_name != '' && sender_phone != '' && sender_province_id != '' && sender_district_id != '' && sender_address != '' && receive_name != '' && receive_phone != '' && receive_province_id != '' && receive_district_id != '' && receive_address != '' && length != '' && width != '' && weight != '') {
            flag++;
        }
        if (weight < 25) {
            flag++;
        }
        if (checkPhoneNumber(sender_phone) && checkPhoneNumber(receive_phone)) {
            flag++;
        }
        if (flag == 3) {
            $('#btnCreateOrder').prop("disabled", false);
        }
        else {
            $('#btnCreateOrder').prop("disabled", true);
        }
    });

    //validate email-----------
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    //validate check phone------
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
            } else if ((firstNumber == '02') && phone.length == 11 || phone.length == 12) {
                if ((phone.match(/^\d{11}/)) || (phone.match(/^\d{12}/))) {
                    flag = true;
                }
            }
        }
        return flag;
    }
    // set time show for the alert
    setTimeout(function () {
        $(".alert").alert('close');
    }, 2000);
    //thêm biến token cho ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //hiển thị quận/huyện theo tỉnh/thành phố khi chọn vào (form tạo đơn hàng)
    $('#receive_province_id').change(function () {
        var Id = $('#receive_province_id').val();
        $.ajax({
            type: "GET",
            url: 'districtOfProvince/' + Id,
            success: function (data) {
                $("#receive_district_id").empty();
                data.forEach(function (item) {
                    $("#receive_district_id").append("<option value = '" + item.id + "'>" + item.text + "</option>");
                })
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log('jqXHR:');
                console.log(jqXHR);

            }
        })
    });
    $('#sender_province_id').change(function () {
        var Id = $('#sender_province_id').val();
        $.ajax({
            type: "GET",
            url: 'districtOfProvince/' + Id,
            success: function (data) {
                $("#sender_district_id").empty();
                data.forEach(function (item) {
                    $("#sender_district_id").append("<option value = '" + item.id + "'>" + item.text + "</option>");
                })
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR:');
                console.log(jqXHR);

            }
        })
    });

    //hiển thị danh sách công ty trên form đăng ký
    $('#rdoCompany').change(function () {
        $('#listCompany').css('display', 'block');
    });

    //hiển thị danh sách công ty trên form thông tin cá nhân
    $('#rdoCompany2').change(function () {
        $('#listCompany2').css('display', 'block');
    });
    //thay đổi trạng thái loại khách hàng trên form đăng ký thành viên
    $('#rdoPersonal').change(function () {
        $('#listCompany').css('display', 'none');
        $("#company_id2").empty();
    });
    //thay đổi trạng thái loại khách hàng trên form thông tin cá nhân
    $('#rdoPersonal2').change(function () {
        $('#listCompany2').css('display', 'none');
        $("#company_id2").empty();
    });
    $('#btnHistoryDelivery').click(function () {
        var id = $("[name=rdoHistoryDelivery]:checked").val();
        $.ajax({
            type: "GET",
            url: 'loadHistoryDelivery/' + id,
            success: function (data) {
                data.forEach(function (item) {
                    $("#receive_name").val(item.receive_name);
                    $("#receive_phone").val(item.receive_phone);
                    $("#receive_address").val(item.receive_address);
                    $('#receive_province_id option').each(function () {
                        if (this.value == item.receive_province_id) {
                            $("#receive_province_id option[value='" + this.value + "']").prop('selected', true)
                        }
                    });
                    var Id = $('#receive_province_id').val();
                    $.ajax({
                        type: "GET",
                        url: 'districtOfProvince/' + Id,
                        success: function (data) {
                            $("#receive_district_id").empty();
                            data.forEach(function (item) {
                                $("#receive_district_id").append("<option value = '" + item.id + "'>" + item.text + "</option>");
                            });
                            $('#receive_district_id option').each(function () {
                                if (this.value == item.receive_district_id) {
                                    $("#receive_district_id option[value='" + this.value + "']").prop('selected', true)
                                }
                            });
                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                            console.log('jqXHR:');
                            console.log(jqXHR);

                        }
                    })

                })
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR:');
                console.log(jqXHR);
            }
        })
    });

});