
    <?php include "./header.php" ?>
    <div class="category-page w-100 clear-both">
        <div class="w-100">
            <!-- Start breadcrumb -->
            <div class="breadcrumb">
                <ul class="container">
                    <li class="d-inline fs-15"><a href="#">Trang chủ</a></li>
                    <li class="d-inline fs-15">Hộp Carton</li>
                </ul>
            </div>
            <!-- End breadcrumb -->
            <div class="container">
                <!-- Start category -->
                <div class="category mt-4">
                    <div class="border-bottom d-flex">
                        <a href="#" class="btn btn-primary fs-18 border-0 fw-700 position-relative text-white">Hộp carton
                            nắp đối</a>
                        <a href="#" class="see-more fw-600 align-items-center d-flex position-relative text-black">XEM
                            THÊM</a>
                    </div>
                    <div class="row mt-2">
                        <div class="carousel-container position-relative">
                            <div class="custom_slider" data-slides-to-show="3" data-slides-to-scroll="1"
                                data-slides-to-show-mobile="2" data-slides-to-scroll-mobile="1" data-slides-to-speed="1500">
                                <?php for ($i = 0; $i < 9; $i++) : ?>
                                    <div class="item text-center cursor-pointer">
                                        <div class="img-100 imgdetaisCategory">
                                            <img src="./images/bannerhopcarton.jfif" alt="HỘP SIZE NHỎ">
                                        </div>
                                        <p class="fw-600 mt-2 mb-2 fs-18 text-line-clamp-2">HỘP SIZE NHỎ</p>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End category -->
                <!-- Start category -->
                <div class="category mb-3">
                    <div class="border-bottom d-flex">
                        <a href="#" class="btn btn-primary fs-18 border-0 fw-700 position-relative text-white">Hộp carton
                            nắp gài</a>
                        <a href="#" class="see-more fw-600 align-items-center d-flex position-relative text-black">XEM
                            THÊM</a>
                    </div>
                    <div class="row mt-2">
                        <div class="carousel-container position-relative">
                            <div class="custom_slider" data-slides-to-show="3" data-slides-to-scroll="1"
                                data-slides-to-show-mobile="2" data-slides-to-scroll-mobile="1" data-slides-to-speed="2000">
                                <?php for ($i = 0; $i < 9; $i++) : ?>
                                    <div class="item text-center cursor-pointer">
                                        <div class="img-100 imgdetaisCategory">
                                            <img src="./images/bannerhopcarton.jfif" alt="HỘP SIZE NHỎ">
                                        </div>
                                        <p class="fw-600 mt-2 mb-2 fs-18 text-line-clamp-2">HỘP SIZE NHỎ</p>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- End category -->
                <div class="row selectCategory">
                    <!--Start select desktop -->
                    <div class="col-3 desktop">
                        <div class="d-flex align-items-center">
                            <img class="iconMenu me-2" src="./icons/menu-blue.svg">
                            <h2 class="fs-20 fw-600">Tất cả danh mục</h2>
                        </div>
                        <div class="row">
                            <div id="filterContent" class="mt-3">
                                <ul class="categoryList">
                                    <li class="category-item" onclick="toggleSubmenuCategory('cartonBox')"><img
                                            class="icon-right" src="./icons/right-svgrepo.svg" alt=""> Hộp
                                        carton
                                        <ul class="subcategory pb-1 pt-1 cartonBox openClose" style="display: none;">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v1" value="v1"> Hộp carton nắp đối
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v2" value="v2"> Hộp carton nắp đối
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v3" value="v3"> Hộp carton nắp đối
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item" onclick="toggleSubmenuCategory('ofsetBox')"><img
                                            class="icon-right" src="./icons/right-svgrepo.svg" alt=""> Hộp in ofset
                                        <ul class="subcategory pb-1 pt-1 ofsetBox openClose" style="display: none;">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v4" value="v4"> Hộp dựng trà
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v5" value="v5"> Hộp dựng trà
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v6" value="v6"> Hộp dựng trà
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Băng dính</li>
                                    <li class="category-item"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Màng PE - Màng chít</li>
                                    <li class="category-item"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Xốp Foam</li>
                                    <li class="category-item"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Xốp khí - Bóng khí</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row cartonBox openClose" style="display: none;">
                            <div class="d-flex align-items-center">
                                <img class="iconMenu iconFilter me-2" src="./icons/filter-svgrepo-com.svg">
                                <h2 class="fs-20">HỘP CARTON</h2>
                            </div>
                            <div id="filterStatus" class="mt-3">
                                <ul class="categoryList">
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo cấu tạo nắp
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v7" value="v7"> Hộp nắp đối
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v8" value="v8"> Hộp nắp gài
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo kích thước
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v9" value="v9"> Hộp size nhỏ (< 20 cm)
                                                        </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v10" value="v10"> Hộp size vừa (20 - 40 cm)
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v11" value="v11"> Hộp size lớn (> 40 cm)
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo số lớp
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v12" value="v12"> 3 lớp
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v13" value="v13"> 5 lớp
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v14" value="v14"> 7 lớp
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo loại sóng
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v15" value="v15"> Sóng A
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v16" value="v16"> Sóng B
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v17" value="v17"> Sóng C
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v18" value="v18"> Sóng E
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v19" value="v19"> Sóng AB
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v20" value="v20"> Sóng AE
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v21" value="v21"> Sóng BC
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v22" value="v22"> Sóng BE
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v23" value="v23"> Sóng CE
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v24" value="v24"> Sóng EBC
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo màu sắc
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v25" value="v25"> Mặt nâu, đáy mộc
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v26" value="v26"> 2 mặt nâu
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v27" value="v27"> Mặt trắng, đáy nâu
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v28" value="v28"> Mặt trắng, đáy mộc
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo định lượng giấy
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v29" value="v29"> 70 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v30" value="v30"> 80 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v31" value="v31"> 90 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v32" value="v32"> 100 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v33" value="v33"> 150 gsm
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo khu vực
                                        <ul id="giay" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v34" value="v34"> Miền Bắc
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v35" value="v35"> Miền Nam
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row ofsetBox openClose" style="display: none;">
                            <div class="d-flex align-items-center">
                                <img class="iconMenu iconFilter me-2" src="./icons/filter-svgrepo-com.svg">
                                <h2 class="fs-20">HỘP IN OFSET</h2>
                            </div>
                            <div id="filterStatus" class="mt-3">
                                <ul class="categoryList">
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo cấu tạo nắp
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v7" value="v7"> Hộp nắp đối
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v8" value="v8"> Hộp nắp gài
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo kích thước
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v9" value="v9"> Hộp size nhỏ (< 20 cm)
                                                        </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v10" value="v10"> Hộp size vừa (20 - 40 cm)
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v11" value="v11"> Hộp size lớn (> 40 cm)
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo số lớp
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v12" value="v12"> 3 lớp
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v13" value="v13"> 5 lớp
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v14" value="v14"> 7 lớp
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo loại sóng
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v15" value="v15"> Sóng A
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v16" value="v16"> Sóng B
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v17" value="v17"> Sóng C
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v18" value="v18"> Sóng E
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v19" value="v19"> Sóng AB
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v20" value="v20"> Sóng AE
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v21" value="v21"> Sóng BC
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v22" value="v22"> Sóng BE
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v23" value="v23"> Sóng CE
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v24" value="v24"> Sóng EBC
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo màu sắc
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v25" value="v25"> Mặt nâu, đáy mộc
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v26" value="v26"> 2 mặt nâu
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v27" value="v27"> Mặt trắng, đáy nâu
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v28" value="v28"> Mặt trắng, đáy mộc
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo định lượng giấy
                                        <ul id="carton" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v29" value="v29"> 70 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v30" value="v30"> 80 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v31" value="v31"> 90 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v32" value="v32"> 100 gsm
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v33" value="v33"> 150 gsm
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item fs-17"><img class="icon-right" src="./icons/right-svgrepo.svg"
                                            alt=""> Lọc theo khu vực
                                        <ul id="giay" class="subcategory pb-1 pt-1">
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v34" value="v34"> Miền Bắc
                                                </label>
                                            </li>
                                            <li>
                                                <label onclick="event.stopPropagation()">
                                                    <input type="checkbox" name="v35" value="v35"> Miền Nam
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row buttonSelect mt-2">
                            <div class="col-6 p-1">
                                <button
                                    class="btn btn-primary w-100 fw-500 text-white cursor-pointer d-flex justify-content-center align-items-center"><img
                                        class="iconButtonSelect me-1" src="./icons/reset-svgrepo-com.svg"> Thiết lập
                                    lại</button>
                            </div>
                            <div class="col-6 p-1">
                                <button
                                    class="btn btn-primary w-100 fw-500 text-white cursor-pointer d-flex justify-content-center align-items-center"><img
                                        class="iconButtonSelect me-1" src="./icons/check-svgrepo-com.svg"> Áp dụng</button>
                            </div>
                            <div class="col-12 p-1">
                                <button
                                    class="btn btn-primary w-100 fw-600 text-black cursor-pointer d-flex justify-content-center align-items-center"><img
                                        class="iconButtonSelect me-1" src="./icons/credit-card-alt-svgrepo-com.svg"> ĐẶT
                                    HÀNG
                                    THEO
                                    YÊU
                                    CẦU</button>
                            </div>
                        </div>
                    </div>
                    <!-- End select desktop -->

                    <div class="col-9 filterProduct">
                        <div class=" mobile">
                            <!-- Start select mobile-->
                            <nav class="navbar navbar-expand-lg bg-light cursor-pointer text-white">
                                <div class="container">
                                    <!-- Nút mở Mega Menu -->
                                    <div id="categoryMegaMenuBtn" class=" d-flex align-items-center">
                                        <img class="iconMenu" src="./icons/menu-white.svg">
                                        <h2 class="fs-18 fw-600 mb-0 ms-1">Tất cả danh mục</h2>
                                    </div>

                                </div>
                            </nav>

                            <!-- Mega Menu Toàn Màn Hình -->
                            <div id="categoryMegaMenu"
                                class="category-mega-menu w-100 z-3 top-0 start-0 position-fixed height-100">
                                <span id="closeMegaMenu"
                                    class="close-btn fs-24 position-absolute cursor-pointer">&times;</span>
                                <div class="ms-4 pb-1 pt-3">
                                    <div class="d-flex align-items-center">
                                        <img class="iconMenu" src="./icons/menu-svgrepo-com.svg">
                                        <h2 class="fs-18 fw-600 mb-0 ms-2">Tất cả danh mục</h2>
                                    </div>
                                </div>
                                <div class="container">
                                    <div id="filterContent">
                                        <ul class="categoryList">
                                            <li class=" fs-15 fw-600 mt-2" onclick="toggleSubmenuCategory('cartonBox')">Hộp
                                                carton
                                                <div class="cartonBox openClose" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Hộp
                                                                carton
                                                                nắp đối</button>
                                                        </div>
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Hộp
                                                                carton
                                                                nắp gài</button>
                                                        </div>
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Hộp
                                                                carton
                                                                chuyển nhà</button>
                                                        </div>
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Hộp viên
                                                                kê
                                                                bê tông</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class=" fs-15 fw-600 mt-2" onclick="toggleSubmenuCategory('ofsetBox')">
                                                Hộp
                                                in ofset
                                                <div class="ofsetBox openClose" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Hộp đựng
                                                                trà</button>
                                                        </div>
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Hộp đựng
                                                                bánh trung thu</button>
                                                        </div>
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Hộp đựng
                                                                quà
                                                                tặng</button>
                                                        </div>
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Thùng
                                                                đựng
                                                                nông sản</button>
                                                        </div>
                                                        <div class="col-6 subCategory pb-1 pt-1 mt-2 pb-1 pt-1">
                                                            <button class="w-100 fs-15 fw-400"
                                                                onclick="event.stopPropagation()">Thùng
                                                                đựng
                                                                hàng gia dụng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class=" fs-15 fw-600 mt-2">Túi giấy</li>
                                            <li class=" fs-15 fw-600 mt-2">Màng PE - Màng chít</li>
                                            <li class="fs-15 fw-600 mt-2">Xốp Foam</li>
                                            <li class=" fs-15 fw-600 mt-2">Xốp khí - Bóng khí</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="cartonBox openClose container mt-2" style="display: none;">
                                    <!-- Nút mở Mega Menu -->
                                    <div class="d-flex align-items-center mb-2">
                                        <img class="iconMenu iconFilter" src="./icons/filter-svgrepo-com.svg">
                                        <h2 class="fs-15 ms-2">HỘP CARTON</h2>
                                    </div>
                                    <div id="filterStatus" class="mb-3">
                                        <ul class="categoryList">
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo cấu tạo nắp
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Nắp đối</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Nắp gài</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo kích thước
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Hộp size nhỏ</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Hộp size vừa</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Hộp size lớn</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo màu sắc
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Mặt nâu, đáy mộc</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">2 mặt nâu</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Mặt trắng, đáy nâu</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Mặt trắng, đáy mộc</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo số lớp
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">3 lớp</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">5 lớp</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">7 lớp</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo loại sóng
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Sóng A</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Sóng B</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Sóng C</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Sóng E</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Sóng AB</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Sóng AE</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo định lượng giấy
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">70 gsm</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">100 gsm</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">120 gsm</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">150 gsm</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo khu vực
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Miền Bắc</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Miền Nam</button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ofsetBox openClose container mt-2" style="display: none;">
                                    <div class="container">
                                        <!-- Nút mở Mega Menu -->
                                        <div class="d-flex align-items-center mb-2">
                                            <img class="iconMenu iconFilter ms-2" src="./icons/filter-svgrepo-com.svg">
                                            <h2 class="fs-15">HỘP IN OFFSET</h2>
                                        </div>
                                    </div>
                                    <div id="filterStatus" class="mb-3">
                                        <ul class="categoryList">
                                            <li class="category-item fs-18 fw-600 mt-2">Lọc theo loại sản phẩm
                                                <div class="row">
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Hộp đựng trà</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Hộp đựng bánh trung thu</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Hộp đựng quà tặng</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Hộp đựng nông sản</button>
                                                    </div>
                                                    <div class="col-6 subCategory pb-1 pt-1 mt-2">
                                                        <button class="w-100 fs-15 fw-400">Thùng đựng hàng gia dụng</button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row buttonFilter buttonSelect pb-3 pt-3">
                                        <div class="col-6 p-1">
                                            <button
                                                class="btn btn-primary w-100 border-0 fs-15 fw-400 text-white cursor-pointer d-flex justify-content-center align-items-center"><img
                                                    class="iconButtonSelect me-1" src="./icons/reset-svgrepo-com.svg">Thiết
                                                lập
                                                lại</button>
                                        </div>
                                        <div class="col-6 p-1">
                                            <button
                                                class="btn btn-primary w-100 border-0 fs-15 fw-400 text-white cursor-pointer d-flex justify-content-center align-items-center"><img
                                                    class="iconButtonSelect me-1" src="./icons/check-svgrepo-com.svg">Áp
                                                dụng</button>
                                        </div>
                                        <div class="col-12 p-1">
                                            <button
                                                class="btn btn-primary w-100 border-0 fs-15 fw-600 text-black cursor-pointer d-flex justify-content-center align-items-center"><img
                                                    class="iconButtonSelect me-1"
                                                    src="./icons/credit-card-alt-svgrepo-com.svg">ĐẶT
                                                HÀNG THEO
                                                YÊU
                                                CẦU</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" row mt-3 d-flex fs-18 align-items-center justify-content-center">
                                <div class="col-6 d-flex align-items-center justify-content-center fs-15">
                                    <select class="w-100">
                                        <option selected>Phổ biến</option>
                                        <option value="1">Xem nhiều</option>
                                        <option value="2">Mua nhiều</option>
                                        <option value="3">Mới nhất</option>
                                    </select>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center fs-15">
                                    <select class="w-100">
                                        <option selected>Giá</option>
                                        <option value="1">Thấp đến cao</option>
                                        <option value="2">Cao đến thấp</option>
                                    </select>
                                </div>
                            </div>
                            <!-- End select mobile -->
                        </div>
                        <div class="row desktop d-flex fs-18 align-items-center justify-content-center border-bottom">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="tabSorts d-flex justify-content-center position-relative pb-3">
                                    <div class="fw-500 fs-16 pb-1 cursor-pointer position-relative p-2 tabSort active"
                                        onclick="changeTab(this)">Phổ
                                        biến
                                    </div>
                                    <div class="fw-500 fs-16 pb-1 cursor-pointer position-relative p-2 tabSort"
                                        onclick="changeTab(this)">Mới nhất
                                    </div>
                                    <div class="fw-500 fs-16 pb-1 cursor-pointer position-relative p-2 tabSort"
                                        onclick="changeTab(this)">Bán chạy
                                    </div>
                                    <div class="position-absolute start-0  bottom-0 tab-indicator"></div>
                                </div>

                                <select class="fs-15 cursor-pointer">
                                    <option selected>Giá</option>
                                    <option value="1">Thấp đến cao</option>
                                    <option value="2">Cao đến thấp</option>
                                </select>
                            </div>
                        </div>

                        <!-- start listProduct -->
                        <div class="row listProduct mt-3">
                            <ul class=" d-flex align-items-center ">
                                <?php for ($i = 0; $i < 15; $i++) : ?>
                                    <li class="cursor-pointer">
                                        <?php include 'product-item.php'; ?>
                                    </li>
                                <?php endfor; ?>

                            </ul>
                            <?php include "pagination.php" ?>
                        </div>
                        <!-- end listProduct -->

                        <!-- start  describeCategory-->
                        <div class="row mt-3 mb-3">
                            <div class="describeCategory">
                                <p class="fs-15 text-content fw-400 text-justify position-relative">
                                    Hộp carton là dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod
                                    tincidunt ut laoreet
                                    dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                    tation
                                    ullamcorper
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                                    dolor
                                    in hendrerit in
                                    vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at
                                    vero
                                    eros et accumsan
                                    et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te
                                    feugait nulla facilisi.<br>
                                    Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet
                                    dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                    tation
                                    ullamcorper
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat.<br>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut
                                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
                                    exerci tation
                                    ullamcorper suscipit lobortis.
                                </p>
                                <button class=" mt-2 toggle-text w-100 cursor-pointer">Xem thêm</button>
                            </div>
                            <div>
                                <div class="bannerDescribeCategory img-100 mt-5">
                                    <img src="./images/bannerFooter.jfif" alt="Banner Footer">
                                </div>

                            </div>
                        </div>
                        <!-- end  describeCategory-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
