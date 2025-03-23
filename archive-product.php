<?php include('header.php') ?>
<main>
    <div class="page-archive mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-9 content-product">
                            <div class="title-page">
                                <h1 class="fs-28">Hộp Carton</h1>
                            </div>
                            <div class="breadcrumb d-flex align-items-center justify-content-between">
                                <ul class="d-flex">
                                    <li class="d-inline fs-15"><a href="#" class="d-flex align-items-center"><img src="images/house.png" width="20px" height="auto" alt="">Trang chủ</a></li>
                                    <li class="d-inline fs-15 text-green fw-700">Hộp Carton</li>
                                </ul>
                                <div class="select-price">
                                    <select name="" id="" class="py-2 px-4 fs-16 text-white">
                                        <option value="">Sắp xếp theo giá</option>
                                        <option value="">Giá tăng dần</option>
                                        <option value="">Giá giảm dần</option>
                                    </select>
                                </div>
                            </div>
                            <p class="pt-3"> Tại Đào Carton, chúng tôi cung cấp sỉ và lẻ các loại hộp carton,
                                đa dạng về kích thước, kiểu dáng chất liệu, giá cả hợp lý chất lượng
                                hàng đầu đáp ứng mọi nhu cầu đóng gói của khách hàng. </p>
                            <div class=" list-product-archive d-grid gap-3 text-center pt-5">
                                <?php for ($i = 0; $i < 20; $i++) : ?>
                                    <div class="list-product pb-2 position-relative">
                                        <img src="images/product-bang-dinh.jpg" alt="">
                                        <a href="#" class="fs-16 fw-600 text-line-clamp-2 mb-2 mt-1 text-gray">Băng keo hàng dễ vỡ vàng đen</a>
                                        <p class="discount-price-product text-green fw-700 m-0 fs-18">9.150₫</p>
                                        <p class="price-product fw-300 fs-15">16.000₫</p>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <?php include('sidebar.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('footer.php') ?>