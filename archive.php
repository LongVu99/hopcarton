
    <?php include 'header.php'; ?>

    <section class="news-list">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="featured-news mb-4">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-7 col-xl-8">
                                <div class="news-top-left mb-md-0 mb-4">
                                    <a href="" title="" class="wrap-img img-100">
                                        <img src="images/product-item1.png" alt="">
                                    </a>
                                    <h3 class="mt-2">
                                        <a href="" title="" class="name fs-24 fw-700 text-black text-line-clamp-4">
                                            Rủi ro khi tiếp tục dùng Windows 10 - Câu chuyện về bảo mật và hiệu suất bạn cần biết
                                        </a>
                                    </h3>
                                    <div class="des fs-14 my-2 text-line-clamp-4">
                                        Hệ điều hành Windows 10 đã phục vụ người dùng trong nhiều năm qua như một nền tảng ổn định và hiệu quả. Tuy nhiên, với thông báo chính thức từ Microsoft về việc dừng hỗ trợ bảo mật cho Windows 10 vào tháng 10 năm 2025, nhiều người dùng đang đối mặt với một quyết định quan trọng.
                                    </div>
                                    <div class="time-post d-flex align-items-center fs-12">
                                        <div class="user-post">
                                            Nguyễn Thành
                                        </div>
                                        <div class="time">
                                            14 giờ trước
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-5 col-xl-4">
                                <div class="news-top-right">
                                    <a href="" title="" class="wrap-img img-100">
                                        <img src="images/product-item1.png" alt="">
                                    </a>
                                    <h3 class="my-2">
                                        <a href="" title="" class="name fs-20 fw-700 text-black text-line-clamp-4">
                                            Rủi ro khi tiếp tục dùng Windows 10 - Câu chuyện về bảo mật và hiệu suất bạn cần biết
                                        </a>
                                    </h3>
                                    <div class="time-post time-post d-flex align-items-center fs-12">
                                        <div class="user-post">
                                            Nguyễn Thành
                                        </div>
                                        <div class="time">
                                            14 giờ trước
                                        </div>
                                    </div>
                                </div>
                                <div class="post3 mt-2 pt-2">
                                    <a href="" title="" class="name text-black text-line-clamp-4 fs-16 fw-500">
                                        Nintendo Switch 2 bị phát hiện trên FCC, sẽ được hỗ trợ NFC và nâng cấp Wi-Fi
                                    </a>
                                </div>
                                <div class="post3 mt-2 pt-2">
                                    <a href="" title="" class="name text-black text-line-clamp-4 fs-16 fw-500">
                                        Tai nghe chụp tai JBL Tune 670NC thông minh, tiện lợi, đáng mua vô cùng
                                    </a>
                                </div>
                                <div class="post3 mt-2 pt-2">
                                    <a href="" title="" class="name text-black text-line-clamp-4 fs-16 fw-500">
                                        AOC ra mắt mẫu màn hình gaming 2K giá rẻ, tần số quét 180Hz, tốc độ phản hồi 0.5ms
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php for($i = 0; $i < 8; $i++) { ?>
                        <div class="item-news py-3">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                    <a href="" title="" class="wrap-img img-100">
                                        <img src="images/product-item1.png" alt="">
                                    </a>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                                    <h3 class="mb-2 mt-2 mt-sm-0">
                                        <a href="" title="" class="name fs-20 fw-700 text-black text-line-clamp-4">
                                            Máy tính để bàn Mini SingPC nhỏ gọn giá tốt, tặng PMH 200K để mua thêm chuột, bàn phím, trả chậm 0% lãi suất
                                        </a>
                                    </h3>
                                    <div class="time-post time-post d-flex align-items-center fs-12">
                                        <div class="user-post">
                                            Nguyễn Thành
                                        </div>
                                        <div class="time">
                                            14 giờ trước
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php include 'pagination.php'; ?>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="news-list-right">
                        <div class="lastest-news">
                            <div class="title fs-18 fw-700 pb-2 text-uppercase text-blue-cus ">
                                Bài viết mới
                            </div>
                            <div class="row">
                                <?php for($i = 0; $i < 5; $i++) { ?>
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="item py-2">
                                            <div class="row">
                                                <div class="col-4 col-md-4 col-lg-4 col-xl-3">
                                                    <a href="" title="" class="wrap-img img-100">
                                                        <img src="images/product-item1.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-8 col-md-8 col-lg-8 col-xl-9">
                                                    <h3>
                                                        <a href="" title="" class="name fs-15 text-black fw-500 text-line-clamp-2">
                                                            Xiaomi 15 Ultra 5G 16GB/512GB
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="news-promotion">
                            <div class="title fs-18 fw-700 pb-2 text-uppercase text-blue-cus">
                                Khuyến mãi
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-12">
                                    <div class="item first py-2 py-sm-2 py-lg-3">
                                        <a href="" title="" class="wrap-img img-100">
                                            <img src="images/product-item1.png" alt="">
                                        </a>
                                        <h3 class="mt-2">
                                            <a href="" title="" class="name fs-18 fw-700 text-black text-line-clamp-4">
                                                Hotsale mở bán TECNO Spark 30 series: Giảm liền 300K, tặng tai nghe phiên bản Transformer
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                                
                                <?php for($i = 0; $i < 4; $i++) { ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="item py-2">
                                            <a href="" title="" class="wrap-img img-100">
                                                <img src="images/product-item1.png" alt="">
                                            </a>
                                            <h3 class="mt-2">
                                                <a href="" title="" class="name fs-14 fw-500 text-black text-line-clamp-4">
                                                    Hotsale mở bán TECNO Spark 30 series: Giảm liền 300K, tặng tai nghe phiên bản Transformer
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>




