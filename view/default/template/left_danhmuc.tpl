<div class="col-md-3 col-md-pull-9">
    <div class="page-sidebar">
        <div class="sidebar-title">
            <div class="clear-filter">
                <a class="{tab_tour_title}" href="javascript:void(0)" id="tab_tour_title"><i class="awe-icon awe-icon-briefcase"></i> Tìm tour</a> &nbsp;&nbsp;
                <a class="{tab_khachsan_title}" href="javascript:void(0)" id="tab_khachsan_title"><i class="awe-icon awe-icon-hotel"></i> Tìm khách sạn</a> &nbsp;&nbsp;
                <a class="{tab_tintuc_title}" href="javascript:void(0)" id="tab_tintuc_title"><i class="awe-icon fa fa-newspaper-o"></i> Tin tức</a>
            </div>
        </div>
        <div {tab_tour} id="tab_tour" class="widget widget_has_radio_checkbox_text"><h3>Tìm kiếm tour</h3>
            <div class="widget_content search_left">
                <form action="{SITE-NAME}/tim-kiem-tour" method="get">
                    <label class="from">
                        <select  name="departure" id="" class="awe-select">
                            <option value="">Nơi khởi hành...</option>
                            {departure_timkiem}
                        </select>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select style="width: 100%"  name="danhmuc_tour_1" id="DanhMuc1Id" class="awe-select">
                              <option value="">Chọn loại tour</option>
                              {danhmuc_1_timkiem}
                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select style="width: 100%" name="danhmuc_tour_2" id="DanhMuc2Id" class="awe-select">
                              <option value="">Chọn loại tour</option>
                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select name="gia_timkiem" class="awe-select">
                              <option value="">Giá tiền</option>
                              {price_timkiem}
                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select name="thoigian_timkiem" class="awe-select">
                              <option value="">Thời gian</option>
                              {list_Durations}
                          </select>
                        </span>
                    </label>
                    <div class="form-actions">
                        <div class="add-to-cart">
                            <button type="submit"><i class="awe-icon awe-icon-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div {tab_khachsan} id="tab_khachsan" class="widget widget_has_radio_checkbox_text"><h3>Tìm kiếm khách sạn</h3>
            <div class="widget_content search_left">
                <form action="{SITE-NAME}/tim-kiem-khach-san" method="get">
                    <label class="from"> <span class="form-item db">
                            <i class="awe-icon awe-icon-key"></i>
                            <input type="text" name="key_timkiem" placeholder="Từ khóa tìm kiếm...">
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select name="danhmuc_id" class="awe-select">
                              <option value="">Chọn danh mục</option>
                              {danhmuc_khachsan_timkiem}

                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                         <select name="sao_timkiem" class="awe-select">
                             <option value="">Loại khách sạn</option>
                             <option value="0">0 Sao</option>
                             <option value="1">1 Sao</option>
                             <option value="2">2 Sao</option>
                             <option value="3">3 Sao</option>
                             <option value="4">4 Sao</option>
                             <option value="5">5 Sao</option>
                         </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                         <select class="awe-select" name="gia_timkiem">
                             <option value="">Giá tiền</option>
                             {price_khachsan}
                         </select>
                        </span>
                    </label>
                    <div class="form-actions">
                        <div class="add-to-cart">
                            <button type="submit"><i class="awe-icon awe-icon-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div {tab_tintuc} id="tab_tintuc" class="widget widget_has_radio_checkbox_text"><h3>Tìm kiếm tin tức</h3>
            <div class="widget_content search_left">
                <form action="{SITE-NAME}/tim-kiem-tin-tuc" method="get">
                    <label class="from"> <span class="form-item db">
                            <i class="awe-icon awe-icon-key"></i>
                            <input type="text" name="key_timkiem" placeholder="Từ khóa tìm kiếm...">
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                         <select name="danhmuc_id" class="awe-select">
                             <option value="">Chọn danh mục</option>
                             {danhmuc_tintuc_timkiem}

                         </select>
                        </span>
                    </label>
                    <div class="form-actions">
                        <div class="add-to-cart">
                            <button type="submit"><i class="awe-icon awe-icon-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="widget widget_has_radio_checkbox"><h3>Văn phòng Hà Nội</h3>
            {map_hn}
        </div>
        <div class="widget widget_has_radio_checkbox"><h3>Văn phòng Hồ Chí Minh</h3>
           {map_hcm}
        </div>
        <div class="widget widget_has_radio_checkbox"><h3>Tin tức nổi bật</h3>
            <ul>
                {tintuc_left}
            </ul>
        </div>

        <!--<div class="widget widget_has_thumbnail"><h3>Tin tức nổi bật</h3>
            <ul>
                {tintuc_left}
            </ul>
        </div>-->
        <div class="widget widget_product_tag_cloud"><h3>Tags</h3>
            <div class="tagcloud">{tag_left}</div>
        </div>
    </div>
</div>
</div>
</div>
</section>