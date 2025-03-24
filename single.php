<?php include "./header.php" ?>
<style>
    /* Mục lục bài viết */
    .newstheme .toc {
        float: left;
        padding: 0.5em;
        background: rgb(168 23 26 / 0.05);
        margin: 1em;
        margin-left: 0;
    }

    .newstheme .toc p {
        font-weight: bold;
    }

    .newstheme .toc ol {
        /* padding-left: 1em; */
        list-style: none;
        padding-left: 0;
        counter-reset: h2-counter;
    }

    .newstheme .toc li {
        position: relative;
        margin-bottom: 5px;
    }

    .newstheme .toc ol a {
        display: inline-block;
        width: 100%;
        transition: all 0.3s ease-in-out;
        color: #008000;
        text-decoration: none;
    }

    .newstheme .toc li a:hover {
        color: #8ec322;
    }

    /* Số thứ tự tự động */
    .newstheme .toc .level-2 {
        counter-increment: h2-counter;
        counter-reset: h3-counter;
        display: flex;
    }

    .newstheme .toc .level-2::before {
        content: counter(h2-counter) ". ";
    }

    .newstheme .toc .level-3 {
        counter-increment: h3-counter;
        counter-reset: h4-counter;
        padding-left: 15px;
        display: flex;
    }

    .newstheme .toc .level-3::before {
        content: counter(h2-counter) "." counter(h3-counter) " ";
    }

    .newstheme .toc .level-4 {
        counter-increment: h4-counter;
        counter-reset: h5-counter;
        padding-left: 30px;
        display: flex;
    }

    .newstheme .toc .level-4::before {
        content: counter(h2-counter) "." counter(h3-counter) "." counter(h4-counter) " ";
    }

    .newstheme .toc .level-5 {
        counter-increment: h5-counter;
        counter-reset: h6-counter;
        padding-left: 45px;
        display: flex;
    }

    .newstheme .toc .level-5::before {
        content: counter(h2-counter) "." counter(h3-counter) "." counter(h4-counter) "." counter(h5-counter) " ";
    }

    .newstheme .toc .level-6 {
        counter-increment: h6-counter;
        padding-left: 60px;
        display: flex;
    }

    .newstheme .toc .level-6::before {
        content: counter(h2-counter) "." counter(h3-counter) "." counter(h4-counter) "." counter(h5-counter) "." counter(h6-counter) " ";
    }

    /* Set Mặc định cho các thẻ H */
    .newstheme .details h2,
    .newstheme .details h3,
    .newstheme .details h4,
    .newstheme .details h5,
    .newstheme .details h6 {
        color: #8ec322;
    }
</style>
<main>
    <div class="container newstheme ml-auto mr-auto mt-3 mb-3 pt-3 pb-3 d-flex flex-wrap clear-both">
        <article class="boxcontents col-12 col-md-9">
            <h1 class="fs-28 text-black fw-700 my-1">Top 3 Loại Hộp Carton phổ biến nhất hiện nay</h1>
            <div class="breadcrumb">
                <ul>
                    <li><a href="#"><img src="images/house.png" width="20px" height="auto" alt="">Trang chủ</a></li>
                    <li>Top 3 Loại Hộp Carton phổ biến nhất hiện nay</li>
                </ul>
            </div>
            <summary class="fst-italic fw-500 mb-3 fs-19 text-justify">Kinh doanh pizza không chỉ dừng lại ở việc tạo ra
                những chiếc
                bánh ngon mà còn phụ thuộc vào việc vận chuyển và bảo quản cho bánh luôn tươi ngon, nóng hổi khi đến
                tay khách hàng. Vì vậy, việc lựa chọn bao bì đóng gói đóng vai trò cực kỳ quan trọng.
                Bạn đang lo lắng vấn đề lựa chọn bao bì đóng gói chiếc bánh pizza của mình? Bạn đang tìm kiếm cơ sở
                sản xuất và in ấn hộp đựng bánh pizza tại Cần Thơ. Bài viết sẽ gợi ý cho bạn địa chỉ cơ sở cung cấp
                hộp bánh pizza uy tín tại Cần Thơ. Bên cạnh đó bài viết sẽ phân tích và đưa ra những lưu ý khi lựa
                chọn in hộp đựng bánh pizza.
            </summary>

            <div class="fs-18 details text-justify clear-both" id="post-content">
                <div class="toc">
                    <p class="toc-title">Nội dung</p>
                    <ol id="toc-list"></ol>
                </div>
                <h2>Lợi ích khi sử dụng hộp carton đóng gói</h2>
                <p>Kinh doanh pizza không chỉ dừng lại ở việc tạo ra những chiếc
                    bánh ngon mà còn phụ thuộc vào việc vận chuyển và bảo quản cho bánh luôn tươi ngon, nóng hổi khi đến
                    tay khách hàng. Vì vậy, việc lựa chọn bao bì đóng gói đóng vai trò cực kỳ quan trọng.
                    Bạn đang lo lắng vấn đề lựa chọn bao bì đóng gói chiếc bánh pizza của mình? Bạn đang tìm kiếm cơ sở
                    sản xuất và in ấn hộp đựng bánh pizza tại Cần Thơ. Bài viết sẽ gợi ý cho bạn địa chỉ cơ sở cung cấp
                    hộp bánh pizza uy tín tại Cần Thơ. Bên cạnh đó bài viết sẽ phân tích và đưa ra những lưu ý khi lựa
                    chọn in hộp đựng bánh pizza.Kinh doanh pizza không chỉ dừng lại ở việc tạo ra những chiếc
                    bánh ngon mà còn phụ thuộc vào việc vận chuyển và bảo quản cho bánh luôn tươi ngon, nóng hổi khi đến
                    tay khách hàng. Vì vậy, việc lựa chọn bao bì đóng gói đóng vai trò cực kỳ quan trọng.
                    Bạn đang lo lắng vấn đề lựa chọn bao bì đóng gói chiếc bánh pizza của mình? Bạn đang tìm kiếm cơ sở
                    sản xuất và in ấn hộp đựng bánh pizza tại Cần Thơ. Bài viết sẽ gợi ý cho bạn địa chỉ cơ sở cung cấp
                    hộp bánh pizza uy tín tại Cần Thơ. Bên cạnh đó bài viết sẽ phân tích và đưa ra những lưu ý khi lựa
                    chọn in hộp đựng bánh pizza.Kinh doanh pizza không chỉ dừng lại ở việc tạo ra những chiếc
                    bánh ngon mà còn phụ thuộc vào việc vận chuyển và bảo quản cho bánh luôn tươi ngon, nóng hổi khi đến
                    tay khách hàng. Vì vậy, việc lựa chọn bao bì đóng gói đóng vai trò cực kỳ quan trọng.
                    Bạn đang lo lắng vấn đề lựa chọn bao bì đóng gói chiếc bánh pizza của mình? Bạn đang tìm kiếm cơ sở
                    sản xuất và in ấn hộp đựng bánh pizza tại Cần Thơ. Bài viết sẽ gợi ý cho bạn địa chỉ cơ sở cung cấp
                    hộp bánh pizza uy tín tại Cần Thơ. Bên cạnh đó bài viết sẽ phân tích và đưa ra những lưu ý khi lựa
                    chọn in hộp đựng bánh pizza.Kinh doanh pizza không chỉ dừng lại ở việc tạo ra những chiếc
                    bánh ngon mà còn phụ thuộc vào việc vận chuyển và bảo quản cho bánh luôn tươi ngon, nóng hổi khi đến
                    tay khách hàng. Vì vậy, việc lựa chọn bao bì đóng gói đóng vai trò cực kỳ quan trọng.
                    Bạn đang lo lắng vấn đề lựa chọn bao bì đóng gói chiếc bánh pizza của mình? Bạn đang tìm kiếm cơ sở
                    sản xuất và in ấn hộp đựng bánh pizza tại Cần Thơ. Bài viết sẽ gợi ý cho bạn địa chỉ cơ sở cung cấp
                </p>
                <h2>Các loại hộp carton phổ biến nhất hiện nay</h2>
                <h3>Hộp carton đối khẩu (Thùng A1)</h3>
                <h2>Các loại hộp carton phổ biến nhất hiện nay</h2>
                <h3>Hộp carton đối khẩu (Thùng A3)</h3>
                <h2>Các loại hộp carton phổ biến nhất hiện nay</h2>
                <h3>Hộp carton đối khẩu (Thùng A3)</h3>
                <h4>Hộp carton đối khẩu (Thùng ABS)</h4>
            </div>
        </article>
        <div class="productnews p-0 ps-3 fs-16 fw-700 text-center mb-2 col-12 col-md-3 clear-both text-green">
            <div class="h2">SẢN PHẨM DÀNH RIÊNG CHO BẠN</div>
        </div>
    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let tocList = document.getElementById("toc-list");
        let content = document.getElementById("post-content");
        let headings = content.querySelectorAll("h2, h3, h4, h5, h6"); // Lấy từ H2 -> H6

        headings.forEach((heading, index) => {
            let id = "heading-" + index;
            heading.id = id;

            let level = parseInt(heading.tagName.replace("H", ""), 10); // Lấy số cấp độ

            // Tạo mục trong danh sách TOC
            let li = document.createElement("li");
            li.classList.add("level-" + level);
            let a = document.createElement("a");
            a.href = "#" + id;
            a.textContent = heading.textContent;

            li.appendChild(a);
            tocList.appendChild(li);
        });

        // Cuộn mượt khi click vào mục lục
        document.querySelectorAll(".toc a").forEach(link => {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                let target = document.querySelector(this.getAttribute("href"));
                if (target) {
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            });
        });
    });
</script>
<?php include "./footer.php" ?>