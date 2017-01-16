<section style="background: #f0f0f0;" class="masonry-section-demo">
    <div class="container">
        <div class="wrapper_footer">

            <div class="links">

                {danhmuc_menu_footer}
            </div>
        </div>
    </div>
</section>


<footer id="footer-page">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget widget_contact_info">
                    <div class="widget_background">
                        <div class="widget_background__half">
                            <div class="bg"></div>
                        </div>
                        <div class="widget_background__half">
                            <div class="bg"></div>
                        </div>
                    </div>
                    <div class="logo" style="padding-top: 10px"><img src="{Logo}" alt="{Name}"></div>
                    <div class="widget_content hotline_left" style="text-align: center">
                        <p><a href="tel:{Hotline}"> <span class="phone">{Hotline}</span></a></p>
                        <p><a href="tel:{Hotline_hcm}"> <span class="phone">{Hotline_hcm}</span></a></p>
                        <div class="awe-social">
                            <a target="_blank" href="{twitter}"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="{google}"><i class="fa fa-google-plus"></i></a>
                            <a target="_blank" href="{facebook}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="{youtube}"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget widget_categories"><h3>Về chúng tôi</h3>
                    <ul>
                        <li><a href="{SITE-NAME}/chinh-sach-quy-dinh-chung.html">- {quydinh}</a></li>
                        <li><a href="{SITE-NAME}/chinh-sach-bao-mat-thong-tin.html">- {baomat}</a></li>
                        <li><a href="{SITE-NAME}/hinh-thuc-thanh-toan.html">- {thanhtoan}</a></li>
                        <li><a href="{SITE-NAME}/quy-dinh-doi-tra.html">- {doitra}</a></li>
                        <li><a href="{SITE-NAME}/chinh-sach-quy-trinh-xu-ly-khieu-nai.html">- {khieunai}</a></li>
                        <li><a href="{SITE-NAME}/chinh-sach-van-chuyen-giao-nhan.html">- {giaonhan}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget widget_categories"><h3>Chi nhánh Hà Nội</h3>
                    <ul>
                        <li style="line-height: 27px;"><i class="fa fa-map-marker"></i> {Address}</li>
                        <li><a href="tel:{Phone}">- Tel: {Phone}</a></li>
                        <li><a href="tel:{Phone}">- Mobile: {Hotline}</a></li>
                        <li><a>- Fax: {Fax}</a></li>
                        <li><a href="mailto:{Email}">- Email: {Email}</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget widget_categories"><h3>Chi nhánh TP. Hồ Chí Minh</h3>
                    <ul>
                        <li style="line-height: 27px;"><i class="fa fa-map-marker"></i> {Address_hcm}</li>
                        <li><a href="tel:{Phone_hcm}">- Tel: {Phone_hcm}</a></li>
                        <li><a href="tel:{Hotline_hcm}">- Mobile: {Hotline_hcm}</a></li>
                        <li><a>- Fax: {Fax_hcm}</a></li>
                        <li><a href="mailto:{Email}">- Email: {Email_hcm}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright"><p>©2016 . <a href="{SITE-NAME}">Azbooking.vn</a></p></div>
    </div>
    <div hidden class="row-footer">

        <div class="container">
            <div class="">
                <a class="button_hotline" href="tel:{Hotline}">Hà Nội: {Hotline}</a> &nbsp;
                <a class="button_hotline" href="tel:{Hotline_hcm}">Hồ Chí Minh {Hotline_hcm}</a> &nbsp;
                <div class="box">




                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/lib/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/lib/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/lib/jquery.owl.carousel.js"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/lib/theia-sticky-sidebar.js"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/lib/jquery-ui.js"></script>
<script type="text/javascript" src="{SITE-NAME}/view/default/themes/js/scripts.js"></script>
<script type="text/javascript"
        src="{SITE-NAME}/view/default/themes/revslider-demo/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript"
        src="{SITE-NAME}/view/default/themes/revslider-demo/js/jquery.themepunch.tools.min.js"></script>

<script type="text/javascript"
        src="{SITE-NAME}/view/default/themes/js/kkcountdown.js"></script>



<script type="text/javascript">if ($('#slider-revolution').length) {
        $('#slider-revolution').show().revolution({
            ottedOverlay: "none",
            delay: 10000,
            startwidth: 1600,
            startheight: 650,
            hideThumbs: 200,

            thumbWidth: 100,
            thumbHeight: 50,
            thumbAmount: 5,


            simplifyAll: "off",

            navigationType: "none",
            navigationArrows: "solo",
            navigationStyle: "preview4",

            touchenabled: "on",
            onHoverStop: "on",
            nextSlideOnWindowFocus: "off",

            swipe_threshold: 0.7,
            swipe_min_touches: 1,
            drag_block_vertical: false,

            parallax: "mouse",
            parallaxBgFreeze: "on",
            parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],


            keyboardNavigation: "off",

            navigationHAlign: "center",
            navigationVAlign: "bottom",
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: "left",
            soloArrowLeftValign: "center",
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: "right",
            soloArrowRightValign: "center",
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: "on",
            fullScreen: "off",

            spinner: "spinner2",

            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: "off",

            autoHeight: "off",
            forceFullWidth: "off",


            hideThumbsOnMobile: "off",
            hideNavDelayOnMobile: 1500,
            hideBulletsOnMobile: "off",
            hideArrowsOnMobile: "off",
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0
        });
    }</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#DanhMuc1Id").change(function () {
            if ($('#DanhMuc1Id  option:selected').val() != '') {
                $.post('{SITE-NAME}/controller/default/ajax.php',
                        {
                            Tour: $('#DanhMuc1Id  option:selected').val()
                        },
                        function (data, status) {
                            $("#DanhMuc2Id").html(data);

                        });
            }
            else {
                $("#DanhMuc2Id").html('');
            }

        });
        $("#tab_tour_title").click(function () {
            $(this).addClass("active_tab_left");
            $('#tab_khachsan_title').removeClass("active_tab_left");
            $('#tab_tintuc_title').removeClass("active_tab_left");
            $('#tab_khachsan').hide();
            $('#tab_tintuc').hide();
            $('#tab_tour').slideDown();
        });
        $("#tab_khachsan_title").click(function () {
            $(this).addClass("active_tab_left");
            $('#tab_tour_title').removeClass("active_tab_left");
            $('#tab_tintuc_title').removeClass("active_tab_left");
            $('#tab_tour').hide();
            $('#tab_tintuc').hide();
            $('#tab_khachsan').slideDown();
        });
        $("#tab_tintuc_title").click(function () {
            $(this).addClass("active_tab_left");
            $('#tab_tour_title').removeClass("active_tab_left");
            $('#tab_khachsan_title').removeClass("active_tab_left");
            $('#tab_tour').hide();
            $('#tab_khachsan').hide();
            $('#tab_tintuc').slideDown();
        });
        jQuery('.calender').pignoseCalender({
            select: function (date, obj) {
                console.log(date);
                date_check = (date[0] === null ? '' : date[0].format('YYYY-MM-DD'));
                date_now = jQuery('#date_get_now').val();
                if (date_check == '') {
                    alert('Bạn vui lòng chọn ngày đặt');
                }
                else {
                    if (date_check < date_now) {
                        alert('Bạn vui lòng chọn ngày đặt phải lớn hơn hoặc bằng ngày hiện tại');
                    }
                    else {
                        jQuery('#date_input').val(date_check);
                        jQuery("#date_table").text(convertDate(date_check));
                    }
                }


            }
        });
        jQuery("#date_select").change(function(){
            var value_en=jQuery("#date_select option:selected" ).val();
            var value_vn=jQuery("#date_select option:selected" ).text();
//
            jQuery('#date_input').val(value_en);
            jQuery("#date_table").text(value_vn);

        });
        jQuery("#next_booking").click(function () {

            var checkbox = 0;
            var total = 0;
            var rest_room_type = '';

            var from_date_old=$('#from_date').val();
            var to_date_old=$('#to_date').val();
            var date_now = jQuery('#date_get_now').val();
            if(from_date==''||to_date==""||date_now==""){
                alert('Bạn vui lòng check ngày đến và ngày đi');
            }
            else{
                var from_date = from_date_old.split("/");
                var from_date = new Date(from_date[2], from_date[1] - 1, from_date[0]);

                var to_date = to_date_old.split("/");
                var to_date = new Date(to_date[2], to_date[1] - 1, to_date[0]);

                var date_now = date_now.split("/");
                var date_now = new Date(date_now[2], date_now[1] - 1, date_now[0]);
                if(from_date<date_now||to_date<from_date){
                    if(from_date<date_now){
                        alert('Bạn không thể chọn ngày trong quá khứ');
                    }
                    else{
                        if(to_date<from_date){
                            alert('Ngày đến không được nhỏ hơn ngày đi');
                        }
                    }

                }
                else{
                    var tongngay = daydiff(parseDate(from_date_old), parseDate(to_date_old));
                    if(tongngay==0){
                        tongngay=1;
                    }
                    $(".price_room").each(function () {
                        if ($(this).is(':checked')) {
                            var Id = $(this).attr("value");
                            var id_link = '#number_' + Id;
                            var name = $(this).attr("valueName");
                            rest_room_type = rest_room_type + ' - ' + name + ' <br>'

                            var price = $(this).attr("valuePrice");
                            var amount_people = $(id_link).val();
                            if (price == '') {
                                price = 0;
                            }
                            if (amount_people == '') {
                                amount_people = 1;
                                $(id_link).val(1);
                            }
                            price = parseInt(price);
                            amount_people = parseInt(amount_people);
                            checkbox = checkbox + 1;
                            var sub_total = (price * amount_people)*tongngay;
                            total += sub_total;
                        }
                    });
                    if (checkbox == 0) {
                        alert('Bạn vui lòng chọn loại phòng và số lượng phòng')
                    }
                    else {

                        var num_member = $('#num_member').val();
                        if (num_member != '' && parseInt(num_member) > 0) {
                            var total_format = 'Liên hệ'
                            if (total > 0) {
                                var n = parseFloat(total);
                                total_format = n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + " vnđ";
                                jQuery("#amount_total").text(total_format);
                                jQuery("#amount_total").show();
                                jQuery("#total_fee").text(total_format);
                                jQuery("#hidden_total").show();
                                jQuery("#next_booking").show();
                                jQuery("#rest_room_type").html(rest_room_type);
                                jQuery("#num_member_table").html(num_member);
                                jQuery("#from_date_table").html(from_date_old);
                                jQuery("#to_date_table").html(to_date_old);
                                jQuery('.back_detail').hide();
                                jQuery('#form_to_date').hide();
                                jQuery('.back_detail_cal').hide();
                                jQuery('.next_detail').slideDown();
                            }
                        }
                        else {
                            document.getElementById('num_member').focus();
                            alert('Bạn vui lòng nhập số người');

                        }
                    }
                }
            }

        });
        jQuery("#back_booking").click(function () {
            jQuery('#form_to_date').show();
            jQuery('.next_detail').hide();
            jQuery('.back_detail_cal').slideDown();
            jQuery('.back_detail').slideDown();
        });
        jQuery(".map_show").click(function () {
            var Id = $(this).attr("id_data");
            if(Id>0){
                jQuery.post("{SITE-NAME}/check-map/",
                        {
                            id: Id
                        }
                        )
                        .done(function (data) {
                            jQuery('.modal-content').html(data)
                        });
            }
            else{
                alert('Ban không thể xem bản đồ');
                location.reload(true);
            }

        });
        jQuery("#booking_ajax").click(function () {


            id = jQuery('#id_input').val();
            name_url = jQuery('#name_url_input').val();
            date = jQuery('#date_input').val();
            price = jQuery('#price_adults').val();
            price_children = 0;
            price_children_5 = 0;
            number_adults = jQuery('#num_price_adults').val();
            number_children = jQuery('#num_price_children_val').val();
            number_children_5 = jQuery('#num_price_children_5_val').val();
            total_input = jQuery('#total_input').val();
            full_name = jQuery('#name_booking').val();
            email = jQuery('#email_booking').val();
            phone = jQuery('#phone_booking').val();
            address = jQuery('#address_booking').val();
            request = jQuery('#request_booking').val();
            check = 1;
            if (full_name == "") {
                jQuery("#full_name_er").show();
                check_name = 0;
            }
            else {
                jQuery("#full_name_er").hide();
                check_name = 1;
            }
            if (email == "") {
                jQuery("#email_er").show();
                check_email = 0;
            } else {
                if (validateEmail(email)) {
                    jQuery("#email_er").hide();
                    check_email = 1;
                } else {
                    jQuery("#email_er").show();
                    check_email = 0;
                }

            }
            if (phone == "") {
                jQuery("#phone_er").show();
                check_phone = 0;
            }
            else {
                jQuery("#phone_er").hide();
                check_phone = 1;
            }
            if (address == "") {
                jQuery("#address_er").show();
                check_address = 0;
            } else {
                jQuery("#address_er").hide();
                check_address = 1;
            }
            if (check_name != 0 && check_email != 0 && check_phone != 0 && check_address != 0) {
                jQuery('#loading_booking').show();
                jQuery('#back_booking').hide();
                jQuery.post("{SITE-NAME}/dat-tour/ajax/",
                        {
                            id: id,
                            name_url: name_url,
                            date: date,
                            price: price,
                            price_children: price_children,
                            price_children_5: price_children_5,
                            number_adults: number_adults,
                            number_children: number_children,
                            number_children_5: number_children_5,
                            total_input: total_input,
                            full_name: full_name,
                            email: email,
                            phone: phone,
                            address: address,
                            request: request

                        }
                        )
                        .done(function (data) {
                            if (data == 1) {
                                jQuery('#loading_booking').hide();
                                jQuery('#back_booking').show();
                                alert('Đặt tour thành công, Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Xin cảm ơn!');
                                location.reload(true);
                            }
                            else {
                                jQuery('#loading_booking').hide();
                                jQuery('#back_booking').show();
                                alert('Đặt tour thất bại, vui lòng kiểm tra lại thông tin đặt tour')
                            }
                        });
            } else {
                alert('Bạn vui lòng kiểm tra lại thông tin đặt tour');
            }
        });

        $("#tinhtien").click(function () {
            var checkbox = 0;
            var total = 0;
            var rest_room_type = '';

            var from_date_old=$('#from_date').val();
            var to_date_old=$('#to_date').val();
            var date_now = jQuery('#date_get_now').val();
            if(from_date==''||to_date==""||date_now==""){
                alert('Bạn vui lòng check ngày đến và ngày đi');
            }
            else{
                var from_date = from_date_old.split("/");
                var from_date = new Date(from_date[2], from_date[1] - 1, from_date[0]);

                var to_date = to_date_old.split("/");
                var to_date = new Date(to_date[2], to_date[1] - 1, to_date[0]);

                var date_now = date_now.split("/");
                var date_now = new Date(date_now[2], date_now[1] - 1, date_now[0]);
                if(from_date<date_now||to_date<from_date){
                    if(from_date<date_now){
                        alert('Bạn không thể chọn ngày trong quá khứ');
                    }
                    else{
                        if(to_date<from_date){
                            alert('Ngày đến không được nhỏ hơn ngày đi');
                        }
                    }

                }
                else{
                    var tongngay = daydiff(parseDate(from_date_old), parseDate(to_date_old));
                    if(tongngay==0){
                        tongngay=1;
                    }
                    $(".price_room").each(function () {
                        if ($(this).is(':checked')) {
                            var Id = $(this).attr("value");
                            var id_link = '#number_' + Id;
                            var name = $(this).attr("valueName");
                            rest_room_type = rest_room_type + ' - ' + name + ' <br>'

                            var price = $(this).attr("valuePrice");
                            var amount_people = $(id_link).val();
                            if (price == '') {
                                price = 0;
                            }
                            if (amount_people == '') {
                                amount_people = 1;
                                $(id_link).val(1);
                            }
                            price = parseInt(price);
                            amount_people = parseInt(amount_people);
                            checkbox = checkbox + 1;
                            var sub_total = (price * amount_people)*tongngay;
                            total += sub_total;
                        }
                    });
                    if (checkbox == 0) {
                        alert('Bạn vui lòng chọn loại phòng và số lượng phòng')
                    }
                    else {

                        var num_member = $('#num_member').val();
                        if (num_member != '' && parseInt(num_member) > 0) {
                            var total_format = 'Liên hệ'
                            if (total > 0) {
                                var n = parseFloat(total);
                                total_format = n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + " vnđ";
                                jQuery("#amount_total").text(total_format);
                                jQuery("#amount_total").show();
                                jQuery("#total_fee").text(total_format);
                                jQuery("#hidden_total").show();
                                jQuery("#next_booking").show();
                                jQuery("#rest_room_type").html(rest_room_type);
                                jQuery("#num_member_table").html(num_member);
                                jQuery("#from_date_table").html(from_date_old);
                                jQuery("#to_date_table").html(to_date_old);
                            }
                        }
                        else {
                            document.getElementById('num_member').focus();
                            alert('Bạn vui lòng nhập số người');

                        }
                    }
                }
            }

        });

        $(".chitiet_gia").click(function () {
            var Id = $(this).attr("countid");
            jQuery("#chitiet_gia_"+Id).slideToggle();
        });


        $(".price_room").click(function () {
            if ($(this).is(':checked')) {
                var Id = $(this).attr("value");
                var field = 'number_' + Id;

                document.getElementById(field).focus();
                if(jQuery('#' + field).val()==''){
                    jQuery('#' + field).val(1);
                }

                jQuery('#' + field).select();
            }
        });
        $("#search_maybay").click(function () {

            window.open('http://vemaybay.azbooking.vn/', '_blank');
        });
    });

    jQuery("#booking_hotel_ajax").click(function () {


        id = jQuery('#id_input').val();
        name_url = jQuery('#name_url_input').val();
        date = jQuery('#date_input').val();
        price = jQuery('#price_adults').val();
        total_input = jQuery('#total_input').val();
        full_name = jQuery('#name_booking').val();
        email = jQuery('#email_booking').val();
        phone = jQuery('#phone_booking').val();
        address = jQuery('#address_booking').val();
        request = jQuery('#request_booking').val();
        check = 1;
        if (full_name == "") {
            jQuery("#full_name_er").show();
            check_name = 0;
        }
        else {
            jQuery("#full_name_er").hide();
            check_name = 1;
        }
        if (email == "") {
            jQuery("#email_er").show();
            check_email = 0;
        } else {
            if (validateEmail(email)) {
                jQuery("#email_er").hide();
                check_email = 1;
            } else {
                jQuery("#email_er").show();
                check_email = 0;
            }

        }
        if (phone == "") {
            jQuery("#phone_er").show();
            check_phone = 0;
        }
        else {
            jQuery("#phone_er").hide();
            check_phone = 1;
        }
        if (address == "") {
            jQuery("#address_er").show();
            check_address = 0;
        } else {
            jQuery("#address_er").hide();
            check_address = 1;
        }
        if (check_name != 0 && check_email != 0 && check_phone != 0 && check_address != 0) {
            $("#booking_hotel").submit();
        } else {
            alert('Bạn vui lòng kiểm tra lại thông tin đặt tour');
        }
    });

    //
    function convertDate(inputFormat) {
        function pad(s) {
            return (s < 10) ? '0' + s : s;
        }

        var d = new Date(inputFormat);
        return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join('-');
    }
    function phonenumber(inputtxt) {
        var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        if (inputtxt.match(phoneno)) {
            alert('yhsnh vonh');
            return true;
        }
        else {
            return false;
        }
    }
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    function myFunction() {
        price = jQuery('#price_adults').val();
        price_2 = jQuery('#price_2').val();
        price_3 = jQuery('#price_3').val();
        price_4 = jQuery('#price_4').val();
        price_5 = jQuery('#price_5').val();
        price_6 = jQuery('#price_6').val();

        price_adults = jQuery('#num_price_adults').val();
        price_children_val = jQuery('#num_price_children_val').val();
        price_children_5_val = jQuery('#num_price_children_5_val').val();

        if (price == '') {
            price = 0;
        }
        if (price_2 == '') {
            price_2 = 0;
        }
        if (price_3 == '') {
            price_3 = 0;
        }
        if (price_4 == '') {
            price_4 = 0;
        }
        if (price_5 == '') {
            price_5 = 0;
        }
        if (price_6 == '') {
            price_6 = 0;
        }
        if (price_adults == '') {
            price_adults = 0;
        }
        if (price_children_val == '') {
            price_children_val = 0;
        }
        if (price_children_5_val == '') {
            price_children_5_val = 0;
        }
        price_adults = parseInt(price_adults);
        price_children_val = parseInt(price_children_val);
        price_children_5_val = parseInt(price_children_5_val);

        if (price == '') {
            total = "Liên hệ";

        }
        else {
            total = (price_adults + price_children_val + price_children_5_val) * price;
            if (total == 0) {
                total = "Liên hệ";
            }
            else {
                var n = parseFloat(total);
//                                                        total = Math.round(n * 1000)/1000;
                total = n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + " vnđ";
            }
        }
        jQuery("#amount_total").text(total);
        jQuery("#no_adults").text(price_adults);
        jQuery("#no_children").text(price_children_val);
        jQuery("#no_children_5").text(price_children_5_val);
        jQuery("#total_fee").text(total);
        jQuery('#total_input').val(total);
        jQuery("#hidden_total").show();
        jQuery("#next_booking").show();

    }
    function nformat(a) {
        var b = parseInt(parseFloat(a) * 1000) / 1000;
        return b.toFixed(0);
    }
    function myFunctionHotel() {
        price = jQuery('#price').val();
        num_member = jQuery('#num_member').val();
        room_type = jQuery('#room_type').val();
        var element = $('#room_type').find('option:selected');
        var price_zoom = element.attr("myTag");
        if (price == '') {
            price = 0;
        }
        if (num_member == '') {
            num_member = 1;
        }
        if (price_zoom == '') {
            price = 0;
        }
        num_member = parseInt(num_member);
        price_zoom = parseInt(price_zoom);
        if (price_zoom == '') {
            total = "Liên hệ";
        }
        else {
            total = (price_adults + price_children_val + price_children_5_val) * price;
            if (total == 0) {
                total = "Liên hệ";
            }
            else {
                var n = parseFloat(total);
//                                                        total = Math.round(n * 1000)/1000;
                total = n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + " vnđ";
            }
        }
        jQuery("#amount_total").text(total);
        jQuery("#no_adults").text(price_adults);
        jQuery("#no_children").text(price_children_val);
        jQuery("#no_children_5").text(price_children_5_val);
        jQuery("#total_fee").text(total);
        jQuery('#total_input').val(total);
        jQuery("#hidden_total").show();
        jQuery("#next_booking").show();

    }
    function parseDate(str) {
        var mdy = str.split('/')
        return new Date(mdy[2], mdy[1] - 1, mdy[0]);
    }
    function daydiff(first, second) {
        return (second - first) / (1000 * 60 * 60 * 24)
    }

</script>
<link rel="stylesheet" type="text/css"
      href="{SITE-NAME}/view/default/themes/calendar/src/css/pignose.calender.css"/>
<!--                                <script src="themes/calendar/dist/jquery-1.12.4.min.js"></script>-->
<script src="{SITE-NAME}/view/default/themes/calendar/dist/moment.min.js"></script>
<script type="text/javascript"
        src="{SITE-NAME}/view/default/themes/calendar/src/js/pignose.calender.js"></script>
</body>
</html>