

<div class="trip-item">
    <div class="item-media">
        <div class="image-cover"><img title="{name}" src="{img}" alt="{name}"></div>
        <div {show_sales} class="trip-icon"><img src="{SITE-NAME}/view/default/themes/images/sale.png" alt=""></div>
    </div>
    <div class="item-body">
        <div class="item-title"><h2><a href="{link}">{name}</a></h2></div>
        <div class="item-list">
            <ul>
                <li {show_code}> Mã tour: {code}</li>
                <li> Hành trình:
                    <span class="from">{departure} <i class="awe-icon fa fa-long-arrow-right"></i></span>
                    <span class="to"> {destination}</span></li>
                <li>Thời gian: {durations}</li>
            </ul>
        </div>
        <div class="item-footer">
            <div class="CountDown button_count_down">
                <i class="fa fa-clock-o fa-2x"></i>&nbsp;&nbsp;
                                           <span data-time="{date_count}" class="kkcountdown-{key_id}">
                                                <span class="kkcountdown-box">{mes_}</span>
                                           </span>
            </div>
        </div>
    </div>
    <div class="item-price-more">
        <div class="price">
            <ins><span class="amount">{price_format}</span></ins>
            <del><span class="amount">{price_sales}</span></del>
        </div>

        <a href="{link}#booking" class="awe-btn">Đặt tour</a></div>
</div>