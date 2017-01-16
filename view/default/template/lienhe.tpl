<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="contact-page__map" style="height: 753px; position: relative; overflow: hidden;">
                    <div style="height: 100%; width: 100%; position: absolute; background-color: rgb(229, 227, 223); text-align: center">
                        <div class="gm-err-container">
                            <h3 class="title_map">Văn phòng Hà Nội</h3>
                            <div class="gm-err-content">
                                {map_hn}
                            </div>
                        </div>
                        <div class="gm-err-container">
                            <h3 class="title_map">Văn phòng Hồ Chí Minh</h3>
                            <div class="gm-err-content">
                                {map_hcm}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="contact-page__form">
                    <div class="title">
                        <h2>THÔNG TIN LIÊN HỆ</h2></div>
                    <div style="margin-bottom: 20px" class="descriptions row">
                        <div class=" col-md-6 col-sm-12 col-xs-12">
                            <p><i class="fa fa-map-marker"></i>: {Address}</p>
                            <p>- Email: {Email}</p>
                            <p>- Điện thoại: {Phone}</p>
                            <p>- Mobi: {Hotline}</p>
                            <p>- Fax: {Fax}</p>
                        </div>
                        <div class=" col-md-6 col-sm-12 col-xs-12">
                            <p><i class="fa fa-map-marker"></i>: {Address_hcm}</p>
                            <p>- Email: {Email_hcm}</p>
                            <p>- Điện thoại: {Phone_hcm}</p>
                            <p>- Mobi: {Hotline_hcm}</p>
                            <p>- Fax: {Fax_hcm}</p>
                        </div>

                    </div>
                    <div class="title">
                        <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2></div>
                    <form class="contact-form" action=""
                          method="post" novalidate="novalidate">
                        <div class="form-item"><input required type="text" placeholder="Họ tên *" name="name_contact"></div>
                        <div class="form-item"><input required type="email" placeholder="Email *" name="email_contact"></div>
                        <div class="form-item"><input type="text" placeholder="Điện thoại *"  name="phone_contact"></div>
                        <div class="form-item"><input type="text" placeholder="Địa chỉ *"  name="address_contact"></div>


                        <div class="form-textarea-wrapper"><textarea placeholder="Yêu cầu" name="message_contact"></textarea></div>
                        <div class="form-actions"><input type="submit" value="Liên hệ" class="submit-contact"></div>
                        <div id="contact-content"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>