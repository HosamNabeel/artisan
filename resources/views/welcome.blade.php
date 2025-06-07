<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>
    <!-- روابط Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@400..700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }
        .navbar-brand {
            flex: 1;
            align-content: center;
            justify-content: center;
            font-weight: bold;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .grid-item {
            flex: 1 1 calc(33.333% - 15px);
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }
        .grid-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .grid-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 8px;
        }
        .grid-item:hover .overlay {
            opacity: 1;
        }
        .overlay-text {
            font-size: 1.5rem;
            text-align: center;
        }
        .reem-kufi-fun {
            font-family: "Reem Kufi Fun", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-size: 30px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .grid {
            display: block;
        }

        .grid-item {
            position: relative;
            width: 100vw; /* عرض العنصر ليأخذ كامل عرض الشاشة */
            height: 100vh; /* ارتفاع العنصر ليأخذ كامل ارتفاع الشاشة */
            overflow: hidden;
        }

        .grid-item img {
            width: 100vw; /* عرض الصورة ليأخذ كامل عرض الشاشة */
            height: 100%;
            object-fit: cover; /* لضمان تغطية الصورة للحاوية بدون تشويه */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay-text {
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
        }

        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh; /* يجعل القسم يغطي كامل ارتفاع الشاشة */
            background-image: url('your-background-image-url.jpg'); /* استبدل هذا برابط الصورة الخلفية */
            background-size: cover; /* تضمن أن الخلفية تغطي كامل الحاوية بدون تشويه */
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff; /* اللون الأبيض للنص */
            text-align: center; /* النص يكون في المنتصف */
        }

        .hero-content {
            max-width: 700px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5); /* طبقة شفافة فوق الخلفية */
            border-radius: 10px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-description {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .hero-btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2rem;
            background-color: #ff5a5f; /* لون زر CTA */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .hero-btn:hover {
            background-color: #e64a4a; /* تأثير hover */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="reem-kufi-fun navbar-brand c" href="#">لمسات زخرفية</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">التسجيل</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">تسجيل الدخول</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="container">
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Get your next inspiration</h1>
            <p class="hero-description">Discover ideas for your next project.</p>
            <a href="#" class="hero-btn">Explore Now</a>
        </div>
    </section>
    <div class="grid">
        <div class="grid-item ">
            <img src="{{ asset('mainassets/img/pexels-aboodi-12984939.jpg') }}" alt="Example Image">
            <div class="overlay">
                <h1> sdl;,ckdmc </h1>
                <div class="overlay-text">مثال 1</div>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('mainassets/img/pexels-yigithan02-1108528.jpg') }}" alt="Example Image">
            <div class="overlay">
                <div class="overlay-text">مثال 2</div>
            </div>
        </div>
        <div class="grid-item">
            <img src="{{ asset('mainassets/img/pexels-begmurganc-7838063.jpg') }}" alt="Example Image">
            <div class="overlay">
                <div class="overlay-text">مثال 3</div>
            </div>
        </div>
        <!-- أضف المزيد من العناصر هنا -->
    </div>
</div>

<!-- روابط Bootstrap JS و jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
