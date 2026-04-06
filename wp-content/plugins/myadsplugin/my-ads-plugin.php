<?php
/*
Plugin Name: My Ads and GA Plugin - Full Racing Halo Edition
Description: Bản đầy đủ: Viền hào quang tia màu chạy vòng quanh, tuyết rơi, chữ bập bềnh, nút Đăng ký ngay dẫn về Facebook và Google Analytics.
Version: 6.0
Author: Trương Trần Quốc Khánh
*/

// 1. Hàm hiển thị Banner với tất cả hiệu ứng hình ảnh
function hien_thi_banner_quang_cao_full_option() {
    ?>
    <style>
        /* HIỆU ỨNG 1: TIA MÀU CHẠY ĐUỔI NHAU VÒNG QUANH VIỀN */
        @keyframes racing-halo {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* HIỆU ỨNG 2: TUYẾT RƠI TRONG KHUNG */
        @keyframes snow-fall-inside {
            0% { transform: translateY(-50px) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(350px) rotate(360deg); opacity: 0; }
        }

        /* HIỆU ỨNG 3: CHỮ NHÔ LÊN NHÔ XUỐNG (BẬP BỀNH) */
        @keyframes bap-benh-chu {
            0%, 100% { transform: translateY(-6px); }
            50% { transform: translateY(6px); }
        }

        /* KHUNG CHỨA BÊN NGOÀI (ĐỂ CẮT TIA MÀU THỪA) */
        .meteor-container {
            max-width: 850px;
            margin: 50px auto;
            position: relative;
            padding: 8px; /* Độ dày của tia màu chạy quanh */
            border-radius: 25px;
            overflow: hidden; 
            background: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        /* LỚP TẠO TIA MÀU CHẠY VÒNG QUANH */
        .meteor-container::before {
            content: '';
            position: absolute;
            width: 180%; /* Đảm bảo phủ kín khung khi xoay */
            height: 500%; 
            background: conic-gradient(
                #f1c40f, #ff0000, #e67e22, transparent 20%, 
                transparent 40%, #f1c40f 50%, #ff0000 70%, #e67e22 90%, #f1c40f
            );
            animation: racing-halo 3s linear infinite;
            z-index: 0;
        }

        /* KHUNG NỀN BANNER PHÍA TRONG */
        .inner-banner {
            position: relative;
            width: 100%;
            background-color: #fff9e6; /* Màu vàng nhạt đặc trưng của Khánh */
            border-radius: 18px;
            z-index: 1;
            overflow: hidden;
            min-height: 260px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* CÁC BÔNG TUYẾT */
        .snowflake-inside {
            position: absolute;
            top: -40px;
            color: #2980b9;
            font-weight: bold;
            z-index: 2;
            pointer-events: none;
        }
        .snowflake-inside::before { content: '❆'; }
        
        /* Cấu hình vị trí và tốc độ rơi của 10 bông tuyết */
        .snowflake-inside:nth-child(1) { font-size: 20px; left: 5%; animation: snow-fall-inside 4s linear infinite; }
        .snowflake-inside:nth-child(2) { font-size: 28px; left: 15%; animation: snow-fall-inside 6s linear infinite 1s; }
        .snowflake-inside:nth-child(3) { font-size: 18px; left: 25%; animation: snow-fall-inside 3s linear infinite 0.5s; }
        .snowflake-inside:nth-child(4) { font-size: 26px; left: 35%; animation: snow-fall-inside 5s linear infinite 2s; }
        .snowflake-inside:nth-child(5) { font-size: 32px; left: 45%; animation: snow-fall-inside 7s linear infinite 1.5s; }
        .snowflake-inside:nth-child(6) { font-size: 19px; left: 55%; animation: snow-fall-inside 4.5s linear infinite 0.2s; }
        .snowflake-inside:nth-child(7) { font-size: 27px; left: 65%; animation: snow-fall-inside 5.5s linear infinite 3s; }
        .snowflake-inside:nth-child(8) { font-size: 23px; left: 75%; animation: snow-fall-inside 4.8s linear infinite 1.2s; }
        .snowflake-inside:nth-child(9) { font-size: 30px; left: 85%; animation: snow-fall-inside 6.5s linear infinite 0.8s; }
        .snowflake-inside:nth-child(10) { font-size: 16px; left: 95%; animation: snow-fall-inside 3.5s linear infinite 2.5s; }

        /* NỘI DUNG CHỮ VÀ NÚT BẤM */
        .promo-content {
            position: relative;
            z-index: 3;
            text-align: center;
            padding: 35px;
        }

        .promo-title {
            color: #856404;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .promo-desc {
            color: #856404;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            animation: bap-benh-chu 2s ease-in-out infinite;
        }

        .promo-button {
            background: linear-gradient(135deg, #856404, #5d4603);
            color: white !important;
            padding: 15px 50px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            display: inline-block;
            font-size: 18px;
            transition: transform 0.3s, box-shadow 0.3s;
            text-transform: uppercase;
        }

        .promo-button:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 20px rgba(0,0,0,0.4);
        }
    </style>

    <div class="meteor-container">
        <div class="inner-banner">
            <div class="snowflake-inside"></div><div class="snowflake-inside"></div>
            <div class="snowflake-inside"></div><div class="snowflake-inside"></div>
            <div class="snowflake-inside"></div><div class="snowflake-inside"></div>
            <div class="snowflake-inside"></div><div class="snowflake-inside"></div>
            <div class="snowflake-inside"></div><div class="snowflake-inside"></div>

            <div class="promo-content">
                <div class="promo-title">🔥 SIÊU KHUYẾN MÃI: KHÓA HỌC LẬP TRÌNH</div>
                <p class="promo-desc">Giảm ngay 50% học phí cho sinh viên Đại học Tây Nguyên!</p>
                <a href="https://www.facebook.com/truong.tran.quoc.khanh.2024" target="_blank" class="promo-button">ĐĂNG KÝ NGAY</a>
            </div>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'hien_thi_banner_quang_cao_full_option');

// 2. Tích hợp mã Google Analytics (Giữ nguyên mã của Khánh)
add_action('wp_head', function() {
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5543GH3SY4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-5543GH3SY4');
    </script>
    <?php
});