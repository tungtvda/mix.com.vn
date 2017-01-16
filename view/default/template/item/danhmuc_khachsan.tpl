<div class="trip-item">
    <div class="item-media">
        <div class="image-cover"><img title="{name}" src="{img}" alt="{name}"></div>
        <!--<div {show_sales} class="trip-icon"><img src="{SITE-NAME}/view/default/themes/images/sale.png" alt=""></div>-->
    </div>
    <div class="item-body" style="padding-top: 0px;">
        <div class="item-title"><h2><a href="{link}">{name}</a></h2></div>
        <div class="item-list khachsan_list">
            <ul class="item_khachsan">
                <li>{start} | <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" id_data="{id}" class="map_show"><i class="fa fa-map-marker"></i> Bản đồ</a></li>
                <li>
                    <i class="fa fa-map-marker"></i> {address}
                </li>
            </ul>
        </div>
        <div style="margin-top: 5px" class="item-footer">
            <ul class="list-unstyled list-icon">
                {dichvu_arr}
            </ul>
            <a class="view-imgs-link btnPriceDetail chitiet_gia" href="javascript:void(0)" countid="{id}">Xem chi tiết giá phòng <i
                        class="fa fa-angle-double-right"></i></a>
        </div>
    </div>
    <div class="item-price-more">
        <div class="price">
            <ins><span class="amount">{price_format}</span></ins>
        </div>
        <div class="phone_khachsan">
            <p class="hotel-price-assistance">Giá thành viên, gọi<br>
                <a href="tel:{phone}">{phone}</a></p>
        </div>
        <a href="{link}#booking" class="awe-btn">Đặt phòng</a>
    </div>
    <div id="chitiet_gia_{id}" class="hotel-price-detail" hidden>
        <div id="divRate2" visible="false"></div>
        <table  class="search-result-roomtype" style="width: 100%; ">
            <tbody>
            <tr class="search-result-row-header-single">
                <th class="room quiet">Phòng</th>
                <th class="room quiet">Số người</th>
                <th class="totalnight quiet"> Giá 1 đêm<br><span class="small" style="font-weight:normal;color:#aaa;">(giá 1 phòng, bao gồm thuế)</span>
                </th>
                <th class="bookroom"></th>
            </tr>
            {gia_phong}
            <tr class="search-result-row-item-single">
                <td class="room1 green"
                    style="font-weight: normal; font-style: italic; padding-bottom: 10px;padding-top: 10px;"
                    colspan="4">
                    <div id="divKhongApDungVoiKhuyenMaiKhac" runat="server"
                         style="text-align:center;margin:5px 0;background-color:#fff;color: #888888;font-size: 8pt;font-style: italic;">
                        Khách sạn thuộc chuỗi sản phẩm siêu tiết kiệm, không áp dụng chung với các khuyến mãi hay ưu đãi
                        giảm giá khác
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

