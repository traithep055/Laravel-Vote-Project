<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote | System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        *{
            font-family: 'Kanit', sans-serif;
        }

        .nav li:hover:after {
            width: 100%;
        }

        .nav li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #00f; /* สีฟ้า */
            display: block;
            margin: auto;
            transition: width 0.5s;
        }

        .nav li:hover:after {
            width: 100%;
        }

        .nav li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #00f; /* สีฟ้า */
            display: block;
            margin: auto;
            transition: width 0.5s;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5; /* เปลี่ยนสีพื้นหลังเป็นสีเนื้อ */
        }
        .contact-card {
            margin: 10px; /* เพิ่มระยะห่างระหว่างแต่ละคอลัมน์ */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center; /* จัดให้อยู่ตรงกลางที่สุด */
            display: flex;
            flex-direction: column; /* แสดงข้อมูลแต่ละรายการในคอลัมน์เดียวกัน */
            align-items: center; /* จัดให้อยู่ตรงกลางแนวนอน */
            border: 1px solid #007bff; /* เพิ่มเส้นขอบสีน้ำเงิน */
        }

        .contact-card:hover {
            animation: floatAround 5s infinite linear;
        }

        @keyframes floatAround {
            0% {
                transform: translateY(0);
            }
            25% {
                transform: translateY(-10px);
            }
            50% {
                transform: translateY(0);
            }
            75% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .contact-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .contact-card h2 {
            margin-top: 10px;
            font-size: 24px;
        }
        .contact-card p {
            margin-top: 5px;
            font-size: 16px;
        }

        .rainbow-text {
            background-image: linear-gradient(to right, violet, indigo, blue, green, yellow, orange, red);
            -webkit-background-clip: text;
            color: transparent;
            animation: rainbow 5s linear infinite;
        }

        @keyframes rainbow {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }
        .float-card {
    transition: transform 0.1s ease-in-out;
        }

        .float-card:hover {
    transform: scale(1.1); /* ซูมใหญ่ขึ้น 110% */
        }

        .float-card:active {
    transform: scale(1); /* รีเซ็ตการซูมเมื่อเมาส์ออก */
        }
    </style>
</head>
<body>
    @include('layouts.header')

        <!-- Begin page content -->
        <div class="container">
            <h1 class="rainbow-text">ติดต่อสอบถาม</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-card float-card" onmouseover="floatUp(this)" onmouseout="floatDown(this)">
                        <img src="image/1.jpg" alt="Person 1">
                        <h2>Natthawat Kwanmueang</h2>
                        <p>Facebook: <a href="https://www.facebook.com/max.goodperson/">Natthawat Kwanmueang</a></p>
                        <p>Phone: 123-456-7890</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card float-card" onmouseover="floatUp(this)" onmouseout="floatDown(this)">
                        <img src="image/2.jpg" alt="Person 2">
                        <h2>Traithep Noysaeng</h2>
                        <p>Facebook: <a href="https://www.facebook.com/profile.php?id=100006908764846">Traithep Noysaeng</a></p>
                        <p>Phone: 987-654-3210</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card float-card" onmouseover="floatUp(this)" onmouseout="floatDown(this)">
                        <img src="image/3.png" alt="Person 3">
                        <h2>Surasin Nakray</h2>
                        <p>Facebook: <a href="https://www.facebook.com/surasin.nakray">Surasin Nakray</a></p>
                        <p>Phone: 555-123-4567</p>
                    </div>
                </div>
            </div>
        </div>
        
    @include('layouts.footer')     
      

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
