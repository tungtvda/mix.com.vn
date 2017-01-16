<section class="filter-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12 row" style="margin-top: 60px">
                    <div class="product">
                        <div style="padding: 0px" class="images col-md-6 col-sm-12">
                            <a itemprop="image" class="woocommerce-main-image zoom"
                               title="{name}"
                               data-rel="prettyPhoto[product-gallery]"><img style="width: 100%"
                                                                            src="{img}"
                                                                            class="attachment-shop_single wp-post-image "
                                                                            alt="{name}"
                                                                            title="{name}"></a>
                        </div>
                        <div class="summary entry-summary col-md-6 col-sm-12">
                            <!--<h1 itemprop="name" class="product_title entry-title">Bora Bora</h1>-->
                            <div itemprop="offers" class="detail_font">
                                <p class="price"><i class="icon-dollar"></i> Giá:
                                    <ins><span class="amount"> {price_format}</span> {vnd}</ins>
                                </p>
                                <!--<p class="price"><i class="icon-dollar"></i> Mã tour:
                                    <ins><span class="parameter"> {code}</span></ins>
                                </p>-->
                                <p class="price"><i class="icon-dollar"></i> Khởi hành:
                                    <ins><span class="parameter"> {departure_time}</span></ins>
                                </p>
                                <p class="price"><i class="icon-calendar"></i> Thời gian:
                                    <ins><span class="parameter"> {durations}</span></ins>
                                </p>
                                <!--<p class="price"><i class="icon-logout"></i> Departure: <ins><span class="parameter">Hanoi</span></ins></p>-->
                                <p class="price"><i class="icon-login"></i> Điểm đến:
                                    <ins><span class="parameter"> {destination}</span></ins>
                                </p>
                                <p class="price"><i class="icon-home"></i> Khách sạn:
                                    <ins>{start}</ins>
                                </p>
                                <p class="price" style="margin-bottom: 10px"><i class="icon-plane"></i> Phương tiện:
                                    <ins><span class="parameter"> {vehicle}</span></ins>
                                </p>
                            </div>
                            <div itemprop="description"><p></p></div>
                            <div itemprop="description">
                                <div style="float: left;width: 100%;" class="booking_detail_div grid grid_2">
                                    <a href="#booking" class="booking_detail">BOOK NOW </a>
                                    <div style="float: left;margin-top: 10px;margin-left: 10px;" class="social-share">
                                        <ul>
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={link}" target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?source=webclient&text={link}" target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://plus.google.com/share?url={link}" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;' target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-google-plus"></i></a></li>
                                            <li><a href="http://pinterest.com/pin/create/button/?url={link}" onclick="window.open(this.href); return false;" title="Pinterest" target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-pinterest"></i></a></li>
                                            <li><a  href="mailto:?Subject={name}?&amp;body={name}:{content_short}" target="_blank"><i
                                                            class="fa fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="social_div grid grid_10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="package-details-content" style="float: left; width: 100%">
                        <h3 class="title">Tóm tắt</h3>
                        <p>{summary}
                        </p>

                        <h3 class="title">Nổi bật</h3>
                        <p>{highlights}
                        </p>
                    </div>
                </div>
                <div class="product-tabs tabs col-md-12" style="border-bottom: 1px solid #D4D4D4;
    overflow: hidden;
    padding-bottom: 35px;
    margin-bottom: 35px;">

                    <ul>
                        <li><a href="#tabs-1">Lịch trình</a></li>
                        <li><a href="#tabs-2">Bao gồm</a></li>
                        <li><a href="#tabs-3">Không bao gồm</a></li>
                        <li><a href="#tabs-4">Bảng giá</a></li>
                    </ul>
                    <div class="product-tabs__content">
                        <div id="tabs-1">
                            <div class="initiative">
                                {schedule}
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="services-on-flight">
                                {inclusion}
                            </div>
                        </div>
                        <div id="tabs-3">
                            <div class="initiative">
                                {exclusion}
                            </div>
                        </div>
                        <div id="tabs-4">
                            <div id="reviews">
                                {price_list}
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="related-post col-md-12 row"><h4>Có thể bạn quan tâm</h4>
                    <div class="related-slider">
                        {tour_lienquan}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div id="booking" class="detail-sidebar">
                    <div class="call-to-book"><i class="awe-icon awe-icon-phone"></i> <em>Gọi ngay cho chúng tôi</em>
                        <span><a href="tel:{Hotline}">{Hotline}</a></span>
                        <span><a href="tel:{Hotline_hcm}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{Hotline_hcm}</a></span>
                    </div>
                    <div class="booking-info"><h3>Đặt tour</h3>
                        <div {hidden_date} class="calender"></div>
                        <input id="date_input" hidden value="{date_now}">
                        <input id="date_get_now" hidden value="{date_now}">
                        <input id="id_input" hidden value="{id}">
                        <input id="name_url_input" hidden value="{name_url}">

                        <input id="price_adults" value="{price}" hidden>
                        <input id="price_2" value="{price_2}" hidden>
                        <input id="price_3" value="{price_3}" hidden>
                        <input id="price_4" value="{price_4}" hidden>
                        <input id="price_5" value="{price_5}" hidden>
                        <input id="price_6" value="{price_6}" hidden>

                        <p {hidden_date_select}>Thời gian khởi anh</p>
                        <select {hidden_date_select} style="width: 100%;     padding: 0px;" id="date_select" name="date_select">
                            {date_select}
                        </select>
                        <!--<div style="margin-top: 30px" class="form-group">
                            <div class="form-elements form-adult"><label>Adult</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>12 yo and above</span></div>
                            <div class="form-elements form-kids"><label>Kids</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>11 and under</span></div>
                        </div>-->
                        <div style="margin-top: 20px" class="back_detail">
                            <div  class="form-group">
                                <label>Số người lớn</label>
                                <div class="form-item">
                                    <input   onkeyup="myFunction()" onchange="myFunction()" min="1" type="number" id="num_price_adults"   id="price_adults" value="">
                                </div>
                            </div>
                            <div class="form-baggage-weight">
                                <label>Trẻ em</label>
                                <div class="form-item">
                                    <input  onkeyup="myFunction()" onchange="myFunction()"  min="0" type="number" id="num_price_children_val"  placeholder="Số trẻ em"  value="0">
                                </div>
                            </div>
                            <div class="form-baggage-weight">
                                <label>Trẻ em dưới 5 tuổi</label>
                                <div class="form-item">
                                    <input style="width: 100%;padding: 5px;"  onkeyup="myFunction()" onchange="myFunction()" min="0" type="number" id="num_price_children_5_val"  placeholder="Trẻ em dưới 5 tuổi"  value="0">
                                    <input hidden class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle" id="total_input"   >
                                </div>
                            </div>
                            <div style="display: none" id="hidden_total" class="price"><em>Tổng tiền đặt tour</em> <span  class="amount" id="amount_total"></span></div>
                            <div  class="form-submit">
                                <div class="add-to-cart">
                                    <a style=" display: none;" href="javascript:void(0);"  id="next_booking"> Tiếp tục <i style="    background-color: #0086cd;" class="fa fa-arrow-right"></i></a>
                                    <!--<button type="submit"><i class="awe-icon awe-icon-cart"></i>Add this to Cart
                                    </button>-->
                                </div>
                            </div>
                        </div>
                        <div class="next_detail" style="display: none;margin-top: 20px; margin-bottom: 20px;float: left;">
                            <table class="nicdark_table extrabig nicdark_bg_yellow">

                                <tbody class="nicdark_bg_grey nicdark_border_grey table_booking" style="background-color: #f9f9f9 !important; border: none">
                                <tr>
                                    <td>
                                        Ngày khởi hành:
                                    </td>
                                    <td>
                                        <span id="date_table">{date_now_vn}</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Người lớn:
                                    </td>
                                    <td>
                                        <span id="no_adults">0</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Trẻ em
                                    </td>
                                    <td>
                                        <span id="no_children">N/A</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Trẻ em dưới 5t
                                    </td>
                                    <td>
                                        <span id="no_children_5">N/A</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Tổng tiền:
                                    </td>
                                    <td>
                                        <span id="total_fee"></span>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <h3 class=" title left lienquan"></h3>
                            <p style="color: red;margin-top: 10px; display: none; float: left;" id="full_name_er">Vui lòng nhập họ tên</p>
                            <input  class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"  type="text"   placeholder="Họ tên" id="name_booking" style="width:100%">
                            <p style="color: red ; display: none" id="email_er">Vui lòng nhập email</p>
                            <input style="width:100%" class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"  type="text"   placeholder="Email" id="email_booking">
                            <p style="color: red; display: none" id="phone_er">Vui lòng nhập số điện thoại</p>
                            <input style="width:100%" class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"  type="text"   placeholder="Điện thoại" id="phone_booking">
                            <p style="color: red; display: none" id="address_er">Vui lòng nhập địa chỉ</p>
                            <input  class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"  type="text"   placeholder="Địa chỉ" id="address_booking">
                                                        <textarea  style="height:90px; width:100%; margin-bottom: 20px"  placeholder="Yêu cầu..." class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking" id="request_booking">

                                                        </textarea>

                            <a style="width: 45%;  background-color: #ed1c27; float: left" id="back_booking" href="javascript:void(0);" class="nicdark_btn nicdark_btn_filter fullwidth nicdark_bg_green calculate_bt"><i style="background-color: #ed1c27;" class="fa fa-arrow-left"></i> Trở lại</a>
                            <img  id="loading_booking" style="width: 45px; display: none" src="{SITE-NAME}/view/default/themes/images/loading.gif">
                            <a class="calculate_bt" style="float: right;text-align: center;padding: 2px 10px; color:#ffffff;" id="booking_ajax"  href="javascript:void(0);" > Đặt tour <i style="background-color: #0086cd;" class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>