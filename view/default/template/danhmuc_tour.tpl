<section class="filter-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="filter-page__content">
                    <div class="filter-item-wrapper" style="margin-top: 13px;">
                        <div class="product-tabs tabs col-md-12" style="border-bottom: 1px solid #D4D4D4;
    overflow: hidden;
    padding-bottom: 35px;
    margin-bottom: 35px;">

                            <ul>
                                <li><a href="#tabs-1">Danh sách</a></li>
                                <li><a href="#tabs-2">Tour giờ chót</a></li>
                                <li><a href="#tabs-3">Giảm giá</a></li>
                                <li><a href="#tabs-4">Nổi bật</a></li>
                            </ul>
                            <div class="product-tabs__content">
                                <div id="tabs-1">
                                    {danhsach}
                                </div>
                                <div id="tabs-2">
                                    <div class="services-on-flight">
                                        {tour_count_down}
                                        {tour_count_down_js}
                                    </div>
                                </div>
                                <div id="tabs-3">
                                    <div class="initiative">
                                        {tour_sales}
                                    </div>
                                </div>
                                <div id="tabs-4">
                                    <div id="reviews">
                                        {tour_PROMOTIONS}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="page__pagination">
                        {PAGING}
                    </div>
                </div>
            </div>
