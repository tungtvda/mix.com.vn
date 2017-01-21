<section {hidden_count_down} class="masonry-section-demo">
    <div class="container">
        <div class=" col-sm-12 col-md-12 destination-grid-content" style="padding: 0px">
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

<section {hidden_count_down}  class="masonry-section-demo">
    <div class="container">
        <div class="destination-grid-content">
            <div class="section-title"></div>
            <div hidden class="">
                <h3 class="title_index">Khách sạn giảm giá</h3>
                <div class="awe-masonry">
                    {khachsan_index}
                </div>
            </div>
            <div class="more-destination"><a href="{SITE-NAME}/tour-gio-chot/">Xem thêm</a></div>
        </div>
    </div>
</section>

<section class="masonry-section-demo">
    <div class="container">
        <div class=" col-sm-12 col-md-12 destination-grid-content" style="padding: 0px">
            <h3 class="title_index">tour giảm giá</h3>
            <div class="" style="height: auto !important;">
                <div class="tourGioChot">
                    <div class="contentGioChot">
                        <div class="contentGioChotOver">
                            <div class="wrapper">
                                {tour_sales}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<section  class="masonry-section-demo">
    <div class="container">
        <div class="destination-grid-content">
            <div class="section-title"></div>
            <div class="more-destination"><a href="{SITE-NAME}/tour-giam-gia/">Xem thêm</a></div>
        </div>
    </div>
</section>

<section class="sale-flights-section-demo">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="sale-flights-tabs tabs">
                    <ul>
                        <li style="width: 100%">
                            <a href="#sale-flights-tabs-1">Tour nổi bật</a>
                            <a style="float: right;     margin-top: 20px; color: red; font-weight: bold" href="{SITE-NAME}/tour-noi-bat/">Xem thêm...</a>
                        </li>
                        <li hidden><a href="#sale-flights-tabs-2">Tour giảm giá</a></li>

                    </ul>
                    <div class="sale-flights-tabs__content tabs__content">
                        <div id="sale-flights-tabs-1">

                            {tour_PROMOTIONS}
                        </div>
                        <div id="sale-flights-tabs-2">
                            {tour_sales}
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
                <div class="awe-services"><h2>Fanpage</h2>
                    <div class="fb-page" data-href="https://www.facebook.com/mixtourist/" style="width: 100% !important;"
                         data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                         data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/mixtourist/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/mixtourist/">MixTourist Viet Nam</a></blockquote>
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
                            VÌ SAO CHỌN MIXTOURIST.COM.VN ?
                        </div>
                    </div>
                    <div class="mda-why-box">
                       {tieuchi}

                    </div>
                </div>
            </div>

    </div>
</section>