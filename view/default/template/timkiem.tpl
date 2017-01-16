
<link rel="stylesheet" href="{SITE-NAME}/view/default/themes/css/map/bootstrap.min.css">
<script src="{SITE-NAME}/view/default/themes/css/map/jquery.min.js"></script>
<script src="{SITE-NAME}/view/default/themes/css/map/bootstrap.min.js"></script>
<section class="filter-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="filter-page__content">

                    <div {hidden_tour} class="filter-item-wrapper">
                        <div class="title"><h2 class="title_timkiem">KẾT QUẢ TÌM KIẾM TOUR</h2></div>
                       {danhsach_tour}
                    </div>

                    <div class="filter-item-wrapper">
                        <div class="title"><h2 class="title_timkiem">KẾT QUẢ TÌM KIẾM KHÁCH SẠN</h2></div>
                        {danhsach_khachsan}
                    </div>

                    <div class="filter-item-wrapper">
                        <div class="title"><h2 class="title_timkiem">KẾT QUẢ TÌM KIẾM TIN TỨC</h2></div>
                        {danhsach_tintuc}
                    </div>

                </div>
            </div>
            <style>
                .search-result-roomtype tr th{
                    border-top: 1px solid #ccc;
                    border-bottom: 1px solid #ccc;
                    border-left: 1px solid #ccc;
                    background: #eee;
                    text-align: center;
                    font-weight: bold;
                }
            </style>

            <div class="modal fade" id="myModal" role="dialog" style="margin-top: 10%">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                    </div>

                </div>
            </div>