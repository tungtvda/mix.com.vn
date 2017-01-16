<section class="hero-section">
    <div id="slider-revolution">
        <ul>
            {slide}
        </ul>
    </div>
</section>
<section>
    <div class="container">
        <div class="awe-search-tabs tabs">
            <ul>
                <li><a title="Tìm kiếm tour" href="#awe-search-tabs-1"><i class="awe-icon awe-icon-briefcase"></i></a></li>
                <li><a title="Tìm kiếm khách sạn" href="#awe-search-tabs-2"><i class="awe-icon awe-icon-hotel"></i></a></li>
                <li><a title="Tìm kiếm tin tức" href="#awe-search-tabs-3"><i class="awe-icon fa fa-newspaper-o"></i></a></li>
                <li><a id="search_maybay" title="Tìm kiếm vé máy bay" href="#awe-search-tabs-4"><i class="awe-icon awe-icon-plane"></i></a></li>
                <!--<li><a href="#awe-search-tabs-5"><i class="awe-icon awe-icon-car"></i></a></li>
                <li><a href="#awe-search-tabs-6"><i class="awe-icon awe-icon-bus"></i></a></li>-->
            </ul>

            <div class="awe-search-tabs__content tabs__content">
                <div id="awe-search-tabs-1" class="search-flight-hotel"><h2>Tìm kiếm tour</h2>
                    <form action="{SITE-NAME}/tim-kiem-tour" method="get">
                        <div style="" class="form-group">
                            <div class="form-elements">
                                <!--<div class="form-item"><i class="awe-icon awe-icon-marker-1"></i>
                                    <input type="text" name="key_timkiem"  placeholder="Nơi khởi hành...">
                                </div>-->
                                <div class="form-item"><select  name="departure" id="" class="awe-select">
                                        <option value="">Nơi khởi hành...</option>
                                        {departure_timkiem}
                                    </select></div>
                            </div>

                        </div>
                        <div  class="form-group">
                            <div class="form-elements">
                                <div class="form-item"><select  name="danhmuc_tour_1" id="DanhMuc1Id" class="awe-select">
                                        <option value="">Loại tour</option>
                                        {danhmuc_1_timkiem}
                                    </select></div>
                            </div>
                            <div class="form-elements">
                                <div class="form-item"><select name="danhmuc_tour_2" id="DanhMuc2Id" class="awe-select">
                                        <option value=""></option>
                                    </select></div>
                            </div>
                            <div class="form-elements">
                                <div class="form-item"><select name="gia_timkiem" class="awe-select">
                                        <option value="">Giá tiền</option>
                                       {price_timkiem}
                                    </select></div>
                            </div>
                            <div class="form-elements">
                                <div class="form-item"><select name="thoigian_timkiem" class="awe-select">
                                        <option value="">Thời gian</option>
                                        {list_Durations}
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-actions"><input type="submit" value="Tìm kiếm"></div>
                    </form>
                </div>
                <div id="awe-search-tabs-2" class="search-hotel"><h2>Tìm kiếm khách sạn</h2>
                    <form action="{SITE-NAME}/tim-kiem-khach-san" method="get">
                        <div class="form-group" style="width: 31%">
                            <div class="form-elements">
                                <div class="form-item"><i class="awe-icon awe-icon-key"></i>
                                    <input type="text"  placeholder="Từ khóa tìm kiếm..." value="" name="key_timkiem" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="width: 26.5%;">
                            <div style="width: 100%" class="form-elements">
                                <div class="form-item"><select name="danhmuc_id" class="awe-select">
                                        <option value="">Chọn danh mục</option>
                                       {danhmuc_khachsan_timkiem}

                                    </select></div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="form-elements">
                                <div class="form-item"><select name="sao_timkiem" class="awe-select">
                                        <option value="">Loại khách sạn</option>
                                        <option value="0">0 Sao</option>
                                        <option value="1">1 Sao</option>
                                        <option value="2">2 Sao</option>
                                        <option value="3">3 Sao</option>
                                        <option value="4">4 Sao</option>
                                        <option value="5">5 Sao</option>
                                    </select></div>
                            </div>

                        </div>
                        <div class="form-group" style="padding-right: 20px">
                            <div class="form-elements">
                                <div class="form-item"><select name="gia_timkiem" class="awe-select">
                                        <option value="">Giá tiền</option>
                                       {price_khachsan}
                                    </select></div>
                            </div>
                        </div>

                        <div class="form-actions" style="width: 10%"><input type="submit"  value="Tìm kiếm"></div>
                    </form>
                </div>
                <div id="awe-search-tabs-3" class="search-flight"><h2>Tìm kiếm tin tức</h2>
                    <form action="{SITE-NAME}/tim-kiem-tin-tuc" method="get">
                        <div class="form-group" >
                            <div class="form-elements">
                                <div class="form-item"><i class="awe-icon awe-icon-key"></i>
                                    <input type="text"  placeholder="Từ khóa tìm kiếm..." value="" name="key_timkiem" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="width: 100%" class="form-elements">
                                <div class="form-item"><select name="danhmuc_id" class="awe-select">
                                        <option value="">Chọn danh mục</option>
                                        {danhmuc_tintuc_timkiem}

                                    </select></div>
                            </div>

                        </div>

                        <div class="form-actions" ><input type="submit"  value="Tìm kiếm"></div>
                    </form>
                </div>
                <!--<div id="awe-search-tabs-3" class="search-flight"><h2>Search Flight</h2>
                    <form>
                        <div class="form-group">
                            <div class="form-elements"><label>From</label>
                                <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"
                                                                                                         value="Ho Chi Minh, Hanoi, Vietnam">
                                </div>
                            </div>
                            <div class="form-elements"><label>To</label>
                                <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"
                                                                                                         value="Ankara, Turkey">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements"><label>Depart on</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Check in">
                                </div>
                            </div>
                            <div class="form-elements"><label>Return on</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Check out">
                                </div>
                            </div>
                            <div class="form-elements"><label>Adult</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>12 yo and above</span></div>
                            <div class="form-elements"><label>Kids</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>0-11 yo</span></div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements"><label>Budget</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>All types</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-actions"><input type="submit" value="Find My Flight"></div>
                    </form>
                </div>
                <div id="awe-search-tabs-4" class="search-flight"><h2>Search Train</h2>
                    <form>
                        <div class="form-group">
                            <div class="form-elements"><label>From</label>
                                <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"
                                                                                                         value="Ho Chi Minh, Hanoi, Vietnam">
                                </div>
                            </div>
                            <div class="form-elements"><label>To</label>
                                <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"
                                                                                                         value="Ankara, Turkey">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements"><label>Depart on</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Check in">
                                </div>
                            </div>
                            <div class="form-elements"><label>Return on</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Check out">
                                </div>
                            </div>
                            <div class="form-elements"><label>Adult</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>12 yo and above</span></div>
                            <div class="form-elements"><label>Kids</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>0-11 yo</span></div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements"><label>Budget</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>All types</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-actions"><input type="submit" value="Find My Flight"></div>
                    </form>
                </div>
                <div id="awe-search-tabs-5" class="search-car"><h2>Search Car</h2>
                    <form>
                        <div class="form-group">
                            <div class="form-elements"><label>Picking up</label>
                                <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"
                                                                                                         value="City, airport...">
                                </div>
                            </div>
                            <div class="form-elements"><label>Droping off</label>
                                <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"
                                                                                                         value="City, airport...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements"><label>Pink off</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Date">
                                </div>
                            </div>
                            <div class="form-elements"><label>Drop off</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions"><input type="submit" value="Find My Car"></div>
                    </form>
                </div>
                <div id="awe-search-tabs-6" class="search-bus"><h2>Where would you like to go?</h2>
                    <form>
                        <div class="form-group">
                            <div class="form-elements"><label>Destinations</label>
                                <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"
                                                                                                         value="Country, city, airport...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements"><label>Check in</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Date">
                                </div>
                            </div>
                            <div class="form-elements"><label>Check out</label>
                                <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> <input type="text"
                                                                                                         class="awe-calendar"
                                                                                                         value="Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-elements"><label>Guest</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>All types</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-actions"><input type="submit" value="Find My Hotel"></div>
                    </form>
                </div>-->

            </div>
        </div>
    </div>
</section>