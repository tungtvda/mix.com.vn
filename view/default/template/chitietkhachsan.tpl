<section class="blog-page">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-detail__info">
                            <div class="product-title"><h2>{name}</h2>
                            </div>
                            <div class="product-address">
                                <span><i class="fa fa-map-marker"></i> {address}</span></br>
                                <span><a class="menu_mobi" href="tel:{phone}"><img style="width: 25px;"
                                                                                   src="{SITE-NAME}/view/default/themes/images/tel-anphong2.gif"> {phone}
                                        | <a href="mailto:{email}"><i class="fa fa-envelope"></i> {email}</a>
                                        | {start_img}</span>
                            </div>
                            <div class="product-descriptions">{content}</div>
                            <div class="property-highlights"><h3>Dịch vụ</h3>
                                <div class="property-highlights__content">
                                    {dichvu}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-detail__gallery">
                            <div class="product-slider-wrapper">
                                <div class="product-slider">
                                    <div class="item"><img title="{name}" src="{img}" alt=""></div>
                                    {list_images}
                                </div>
                                <div class="product-slider-thumb-row">
                                    <div class="product-slider-thumb">
                                        <div class="item"><img title="{name}" src="{img}" alt="{name}"></div>
                                        {list_images_icon}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="product-tabs tabs">
                            <ul>
                                <li><a href="#tabs-1">Danh sách phòng</a></li>
                                <li><a href="#tabs-2">Bản đồ</a></li>
                            </ul>
                            <div class="product-tabs__content">
                                <div id="tabs-1">
                                    <div hidden class="check-availability">
                                        <form>
                                            <div class="form-group">
                                                <div class="form-elements form-checkin"><label>Check in</label>
                                                    <div class="form-item"><i class="awe-icon awe-icon-calendar"></i>
                                                        <input
                                                                type="text" class="awe-calendar" value="Date"></div>
                                                </div>
                                                <div class="form-elements form-checkout"><label>Check out</label>
                                                    <div class="form-item"><i class="awe-icon awe-icon-calendar"></i>
                                                        <input
                                                                type="text" class="awe-calendar" value="Date"></div>
                                                </div>
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
                                                    <span>0-11 yo</span></div>
                                                <div class="form-actions"><input type="submit"
                                                                                 value="CHECK AVAILABILITY"
                                                                                 class="awe-btn awe-btn-style3"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <table class="room-type-table">
                                        <thead>
                                        <tr>
                                            <th class="room-type">Loại phòng</th>
                                            <th class="room-people">Số phòng</th>
                                            <th class="room-people">Số người</th>
                                            <th class="room-condition">Dịch vụ</th>
                                            <th class="room-price">Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {list_phong}
                                        </tbody>
                                    </table>
                                </div>
                                <div id="tabs-2">
                                    {map}
                                </div>

                            </div>
                        </div>
                        <div class="related-post col-md-12 row"><h4>Có thể bạn quan tâm</h4>
                            <div class="related-slider">
                                {tour_lienquan}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" id="booking">
                        <div class="detail-sidebar">
                            <form id="booking_hotel" action="" method="post">
                                <div id="booking" class="detail-sidebar">
                                    <div class="call-to-book"><i class="awe-icon awe-icon-phone"></i> <em>Gọi ngay cho
                                            chúng
                                            tôi</em>
                                        <span><a href="tel:{Hotline}">{Hotline}</a></span>
                        <span><a href="tel:{Hotline_hcm}">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{Hotline_hcm}</a></span>
                                    </div>
                                    <div class="booking-info"><h3>Đặt phòng</h3>
                                        <div hidden class="calender"></div>
                                        <div class="form-group" id="form_to_date">
                                            <div class="form-elements form-checkin"><label>Ngày đến</label>
                                                <div class="form-item"><input type="text" class="awe-calendar" required
                                                                              value="date" id="from_date" name="from_date">
                                                </div>
                                            </div>
                                            <div class="form-elements form-checkout"><label>Ngày về</label>
                                                <div class="form-item"><input type="text" class="awe-calendar" required
                                                                              value="date" id="to_date" name="to_date">
                                                </div>
                                            </div>
                                        </div>
                                        <input name="date_input" id="date_input" hidden value="{date_now_vn}">
                                        <input name="date_get_now" id="date_get_now" hidden value="{date_now_vn}">
                                        <input name="id_input" id="id_input" hidden value="{id}">
                                        <input name="name_url_input" id="name_url_input" hidden value="{name_url}">

                                        <input id="price" value="{price}" hidden>
                                        <div style="margin-top: 20px" class="back_detail">
                                            <div class="form-group">
                                                <div class="widget widget_has_radio_checkbox">
                                                    <table class="booking_hotel">
                                                        <tr>
                                                            <th>Chọn loại phòng</th>
                                                            <th>Số phòng</th>
                                                        </tr>
                                                        {string_zoom_type}
                                                    </table>

                                                </div>
                                                <label>Số người</label>
                                                <div class="form-item">
                                                    <input min="1"
                                                           type="number" id="num_member" name="num_member" value="">
                                                </div>
                                            </div>

                                            <div style="display: none" id="hidden_total" class="price"><em>Tổng tiền đặt
                                                    phòng</em> <span
                                                        class="amount" id="amount_total"></span></div>
                                            <div class="form-submit">
                                                <div class="add-to-cart">
                                                    <a style="background-color: #f96d01 " href="javascript:void(0);"
                                                       id="tinhtien">
                                                        Tính tiền <i
                                                                style="    background-color: #f96d01"
                                                                class="fa fa-dollar"></i></a>
                                                    <a style=" display: none" href="javascript:void(0);"
                                                       id="next_booking"> Tiếp tục
                                                        <i
                                                                style="    background-color: #0086cd;"
                                                                class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="next_detail"
                                             style="display: none;margin-top: 20px; margin-bottom: 20px;float: left;">
                                            <table class="nicdark_table extrabig nicdark_bg_yellow">

                                                <tbody class="nicdark_bg_grey nicdark_border_grey table_booking"
                                                       style="background-color: #f9f9f9 !important; border: none">
                                                <tr>
                                                    <td>
                                                        Ngày đến:
                                                    </td>
                                                    <td>
                                                        <span id="from_date_table">{date_now_vn}</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Ngày đi:
                                                    </td>
                                                    <td>
                                                        <span id="to_date_table">{date_now_vn}</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Loại phòng:
                                                    </td>
                                                    <td>
                                                        <span id="rest_room_type"></span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Số người:
                                                    </td>
                                                    <td>
                                                        <span id="num_member_table"></span>
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
                                            <p style="color: red;margin-top: 10px; display: none; float: left;"
                                               id="full_name_er">
                                                Vui
                                                lòng nhập họ tên</p>
                                            <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                                   type="text" placeholder="Họ tên" id="name_booking"
                                                   name="name_booking"
                                                   style="width:100%">
                                            <p style="color: red ; display: none" id="email_er">Vui lòng nhập email</p>
                                            <input style="width:100%"
                                                   class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                                   type="text" placeholder="Email" id="email_booking"
                                                   name="email_booking">
                                            <p style="color: red; display: none" id="phone_er">Vui lòng nhập số điện
                                                thoại</p>
                                            <input style="width:100%"
                                                   class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                                   type="text" placeholder="Điện thoại" id="phone_booking"
                                                   name="phone_booking">
                                            <p style="color: red; display: none" id="address_er">Vui lòng nhập địa
                                                chỉ</p>
                                            <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                                   type="text" placeholder="Địa chỉ" id="address_booking"
                                                   name="address_booking">
                                                        <textarea style="height:90px; width:100%; margin-bottom: 20px"
                                                                  placeholder="Yêu cầu..."
                                                                  class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                                                  id="request_booking" name="request_booking">
                                                        </textarea>

                                            <a style="width: 45%;  background-color: #ed1c27; float: left"
                                               id="back_booking"
                                               href="javascript:void(0);"
                                               class="nicdark_btn nicdark_btn_filter fullwidth nicdark_bg_green calculate_bt"><i
                                                        style="background-color: #ed1c27;" class="fa fa-arrow-left"></i>
                                                Trở lại</a>
                                            <img id="loading_booking" style="width: 45px; display: none"
                                                 src="{SITE-NAME}/view/default/themes/images/loading.gif">
                                            <a class="calculate_bt"
                                               style="float: right;text-align: center;padding: 2px 10px; color:#ffffff;"
                                               id="booking_hotel_ajax" href="javascript:void(0);"> Đặt phòng <i
                                                        style="background-color: #0086cd;"
                                                        class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
