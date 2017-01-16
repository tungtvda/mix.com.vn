<section {hidden_count_down} >
    <div class="container">
        <div class=" col-sm-12 col-md-12 " style="padding: 0px">
            <h3 class="title_index">tour giờ chót</h3>
            <div class="" style="height: auto !important;">
                <div class="tourGioChot">
                    <div class="contentGioChot">
                        <div class="contentGioChotOver">
                            <div class="wrapper">
                               {tour_count_down}
                                {tour_count_down_js}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="masonry-section-demo">
    <div class="container">
        <div class="destination-grid-content">
            <div class="section-title"></div>
            <div class="">
                <h3 class="title_index">Khách sạn giảm giá</h3>
                <div class="awe-masonry">
                    {khachsan_index}
                </div>
            </div>
            <div class="more-destination"><a href="{SITE-NAME}/khach-san/">Xem thêm</a></div>
        </div>
    </div>
</section>
<section class="sale-flights-section-demo">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="sale-flights-tabs tabs">
                    <ul>
                        <li><a href="#sale-flights-tabs-1">Tour giảm giá</a></li>
                        <li><a href="#sale-flights-tabs-2">Tour nổi bật</a></li>
                    </ul>
                    <div class="sale-flights-tabs__content tabs__content">
                        <div id="sale-flights-tabs-1">
                            {tour_sales}
                        </div>
                        <div id="sale-flights-tabs-2">

                            {tour_PROMOTIONS}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="awe-services"><h2>Tin tức</h2>
                    <ul class="awe-services__list">
                        {tintuc_index}
                    </ul>
                    <div class="video-wrapper embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                                src="{link_video}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="masonry-section-demo backgroup_tieuchi">
    <div class="container">


            <div id="mda-why" class="clearfix">
                <div class="mda-content">
                    <div class="mda-item-title-icon clearfix">
                        <div class="lb">
                            VÌ SAO CHỌN AZBOOKING.VN ?
                        </div>
                    </div>
                    <div class="mda-why-box">
                       {tieuchi}

                    </div>
                </div>
            </div>

    </div>
</section>