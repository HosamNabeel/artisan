<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لمسات زخرفية | الصفحة الرئيسية</title>

    <link rel="stylesheet" href="{{ asset('mainassets/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>

    <nav class="navbar">
        <a class="reem-kufi-fun logo" href="">لمسات زخرفية</a>


        <ul>
            <li><a href="#">الرئيسية</a></li>
            <li><a href="">من نحن</a></li>
            <li><a href="#">خدماتنا</a></li>
            <li><a href="#">تواصل معنا</a></li>
        </ul>

        <div class="searchBox">

            <input class="searchInput" type="text" name="" placeholder="ابحث هنا">
            <button class="searchButton" href="#">



                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                    <g clip-path="url(#clip0_2_17)">
                        <g filter="url(#filter0_d_2_17)">
                            <path
                                d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z"
                                stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                shape-rendering="crispEdges"></path>
                        </g>
                    </g>
                    <defs>
                        <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                            <feOffset dy="4"></feOffset>
                            <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                            <feComposite in2="hardAlpha" operator="out"></feComposite>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                            </feColorMatrix>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape">
                            </feBlend>
                        </filter>
                        <clipPath id="clip0_2_17">
                            <rect width="28.0702" height="28.0702" fill="white"
                                transform="translate(0.403503 0.526367)"></rect>
                        </clipPath>
                    </defs>
                </svg>


            </button>
        </div>



        <div>

            <button id="openLoginModal" class="cute-btn">تسجيل الدخول</button>
            <div id="LoginModal" class="modal">
                <div class="modalLogin-content">
                    <span id="closeRegModal" class="close-button">&times;</span>
                    @include('auth.login')
                </div>
            </div>
            <button id="openRegModal" class="cute-btn">تسجيل</button>
            <div id="regModal" class="modal">
                <div class="modal-content">

                    @include('auth.register')
                </div>
            </div>

        </div>
    </nav>



    <div class="contaner">

        <h1 class="slider_text">شارك واحصل على أفكار</h1>
        <div class="buttons-container">
            <button class="circle-btn active"></button>
            <button class="circle-btn"></button>
            <button class="circle-btn"></button>
            <button class="circle-btn"></button>
        </div>

        <p id="slide-title"> للتطريز والزخف وأفكار متنوعة</p>

        <div class="d_animation" id="d1"><img src="{{ asset('mainassets/img/f86984098715bad8b4a3c7071bfa22df.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d2"><img src="{{ asset('mainassets/img/b026ac15bccf85cec5c0e2144c046c0e.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d3"><img src="{{ asset('mainassets/img/38431288d1edbee30ff89f455949a59e.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d4"><img src="{{ asset('mainassets/img/1df5f56309ee2c174b41b6cdda81540d.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d5"><img src="{{ asset('mainassets/img/31ef81eb036b5a23612528b4189a1b04.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d6"><img src="{{ asset('mainassets/img/53ebb6c397a6375d33d96fc52e2d657a.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d7"><img src="{{ asset('mainassets/img/bce14e56d84e307acecd3ae534a110f3.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d8"><img src="{{ asset('mainassets/img/e64dadb4870c4a7c7f9cbf6aa7976cbd.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d9"><img src="{{ asset('mainassets/img/72efa69e37c3a717016af78a5d2074d6.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d10"><img src="{{ asset('mainassets/img/be57378567026a47cdf30ed621873080.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d11"><img src="{{ asset('mainassets/img/b8c05b6c7b5757ede7466cdea32e035b.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d12"><img src="{{ asset('mainassets/img/559488d7ecb1c8d53874be373edd69bc.jpg') }}"
                alt=""></div>
        <div class="d_animation" id="d13"><img src="{{ asset('mainassets/img/1d1839bf040087843373b6ef2ff19515.jpg') }}"
                alt=""></div>
    </div>
    <div class="contaner2">
        <div>
            <h1 class="c2_title">ابحث عن اهتماماتك</h1>
            <p class="c2_text">ماذا تريد أن تجرب ؟<br>
                هل حاولت رسم لوحة بشكل احترافي؟<br>
                هل جربت تزيين الطعام ليظهر بشكل شهي؟<br>
                شاهد ما سترغب بمعرفته.</p>
        </div>

        <section class="image-grid">
            <img src="{{ asset('mainassets/img/14c5df58bb15af3a09e9a57879db22e5.jpg') }}" alt="صورة 1">
            <img src="{{ asset('mainassets/img/91055765bb5c6f1e2a5cb64343222194.jpg') }}" alt="صورة 2">
            <img src="{{ asset('mainassets/img/0acc4c960c4f66f22d312d9c80437908.jpg') }}" alt="صورة 3">
            <img src="{{ asset('mainassets/img/cdd6ed4fbcc7458d08e0cc97e0084d16.jpg') }}" alt="صورة 4">
            <img src="{{ asset('mainassets/img/a7cb27e7ad53cf8545b9ac74500b5b53.jpg') }}" alt="صورة 5">
            <img src="{{ asset('mainassets/img/62d915f8cd6bf17c5aeb8636e252b1a5.jpg') }}" alt="صورة 6">
            <img src="{{ asset('mainassets/img/6fa3b7587c4051097287677c143a5ac9.jpg') }}" alt="صورة 7">
            <img src="{{ asset('mainassets/img/1cbe4959d7b13a4f3168d444b310bb0f.jpg') }}" alt="صورة 8">
        </section>
        <!-- <div class="c2_img">
            <div class="c2_img1"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
            <div class="c2_img2"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
            <div class="c2_img3"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
            <div class="c2_img4"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
        </div> -->
    </div>
    <div class="contaner3">
        <!-- <div class="c3_img">
            <div class="c3_img1"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
            <div class="c3_img2"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
            <div class="c3_img3"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
            <div class="c3_img4"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
            <div class="c3_img5"><img src="{{ asset('mainassets/img/d2.jpg') }}" alt=""></div>
        </div> -->
        <!-- <div>
            <h1 class="c2_title">ابحث عن اهتماماتك</h1>
            <p class="c2_text">ماذا تريد أن تجرب بعد ذلك؟<br>
                فكر في شيء تحبه
                مثل "عشاء الدجاج السهل"<br>
                وشاهد ما ستجده.</p>
        </div> -->
        <section class="featured-accounts">
            <h2>ركن الأعمال اليدوية</h2>
            <section class="unique-gallery-section" id="unique-gallery">
                <div class="unique-gallery-container">
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/5bc8d983b79b87ff49be07c3fde2c1e9.jpg')}}" alt="صورة فريدة 1">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/caa305b1c91b978edd08dd387bfbee40.jpg')}}" alt="صورة فريدة 2">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/65612968fd3330c5a21f84285e84652d.jpg')}}" alt="صورة فريدة 3">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/9cb4905d0854daeb380e5d802aad2692.jpg')}}" alt="صورة فريدة 4">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/673c9d946be0706f6957fc7e91bdff0d.jpg')}}" alt="صورة فريدة 5">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/a1125c16c5e166b6abf97488f3ce2ca7.jpg')}}" alt="صورة فريدة 6">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/785324fcdf56c2e7be449fdb18632c4c.jpg')}}" alt="صورة فريدة 7">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/fd0083fa87acfacaa786685d7d95e48d.jpg')}}" alt="صورة فريدة 8">
                    </div>
                    <div class="unique-gallery-item"><img
                            src="{{ asset('mainassets/img/088c78e19159686df74a08012bc74a38.jpg')}}" alt="صورة فريدة 9">
                    </div>
                </div>
            </section>

        </section>

    </div>


    <section class="container4" id="about-us">
        <h2>من نحن</h2>
        <div class="about-us-container">
            <div class="about-item">
                <i class="fas fa-users"></i>
                <h3>فريق متميز</h3>
                <p>نحن فريق من المحترفين الذين يعملون جاهدين لتقديم أفضل الخدمات لعملائنا.</p>
            </div>
            <div class="about-item">
                <i class="fas fa-bullseye"></i>
                <h3>رؤيتنا</h3>
                <p>نطمح دائمًا لتحقيق أعلى مستويات الجودة وتقديم قيمة مضافة لعملائنا.</p>
            </div>
            <div class="about-item">
                <i class="fas fa-lightbulb"></i>
                <h3>ابتكار</h3>
                <p>نؤمن بأهمية الابتكار والإبداع لتقديم حلول مميزة ومبتكرة.</p>
            </div>
        </div>
        <div class="developer-circle">
            <div class="developer-item">
                <img src="{{ asset('mainassets/img/ahmad.jpg')}}" alt="مطور 1">
                <h3>أحمد</h3>
            </div>
            <div class="developer-item">
                <img src="{{ asset('mainassets/img/belal.png')}}" alt="مطور 2">
                <h3>بلال</h3>
            </div>
            <div class="developer-item">
                <img src="{{ asset('mainassets/img/abed.jpg')}}" alt="مطور 3">
                <h3>عبد الكريم</h3>
            </div>
            <div class="developer-item">
                <img src="" alt="مطور 4">
                <h3>عبد الله</h3>
            </div>
            <div class="developer-item">
                <img src="" alt="مطور 5">
                <h3>حسام</h3>
            </div>
        </div>
    </section>


    <section class="container5" id="services">
        <h2>خدماتنا</h2>
        <div class="services-container">
            <div class="services-text">
                <p>نقدم مجموعة من الخدمات المتميزة لعملائنا، بما في ذلك حلول تكنولوجية متطورة وتصميمات مبتكرة تهدف
                    لتحسين تجربة المستخدم. فريقنا يعمل جاهدًا لتقديم أعلى مستويات الجودة والاحترافية في كل خدمة نقدمها،
                    سواء كان ذلك في مجال التسويق الرقمي أو تطوير البرمجيات أو الاستشارات التقنية.</p>
            </div>
            <div class="services-items">
                <div class="service-item">
                    <i class="fas fa-cog"></i>
                    <h3>الخدمة 1</h3>
                    <p>توضيح مختصر عن الخدمة المقدمة لعملائنا بشكل احترافي.</p>
                </div>
                <div class="service-item">
                    <i class="fas fa-laptop"></i>
                    <h3>الخدمة 2</h3>
                    <p>توضيح مختصر عن الخدمة المقدمة لعملائنا بشكل احترافي.</p>
                </div>
                <div class="service-item">
                    <i class="fas fa-bullhorn"></i>
                    <h3>الخدمة 3</h3>
                    <p>توضيح مختصر عن الخدمة المقدمة لعملائنا بشكل احترافي.</p>
                </div>
                <div class="service-item">
                    <i class="fas fa-chart-line"></i>
                    <h3>الخدمة 4</h3>
                    <p>توضيح مختصر عن الخدمة المقدمة لعملائنا بشكل احترافي.</p>
                </div>
                <div class="service-item">
                    <i class="fas fa-shield-alt"></i>
                    <h3>الخدمة 5</h3>
                    <p>توضيح مختصر عن الخدمة المقدمة لعملائنا بشكل احترافي.</p>
                </div>
                <div class="service-item">
                    <i class="fas fa-users"></i>
                    <h3>الخدمة 6</h3>
                    <p>توضيح مختصر عن الخدمة المقدمة لعملائنا بشكل احترافي.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <h2>تواصل معنا</h2>
        <p>إذا كان لديك أي استفسار أو تحتاج إلى دعم، لا تتردد في التواصل معنا.</p>
        <form class="contact-form">
            <input type="text" name="name" placeholder="الاسم" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <textarea name="message" placeholder="رسالتك" rows="5" required></textarea>
            <button type="submit">إرسال</button>
        </form>
    </section>



    <footer class="footer-section">
        <div class="footer-content">
            <a class="reem-kufi-fun logo" href="">لمسات زخرفية</a>
            <p>نحن ملتزمون بتقديم أفضل الحلول لعملائنا بأعلى مستوى من الجودة والابتكار.</p>
            <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="#"><i class="fab fa-github"></i></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>جميع الحقوق محفوظة &copy; 2024 - تصميم بواسطة فريقنا</p>
        </div>
        <div class="footer-extra">
            <p>لأي استفسارات أو تفاصيل إضافية، يمكنكم دائمًا مراسلتنا وسنكون سعداء بمساعدتكم. نحرص على تقديم الدعم
                بأسرع وقت ممكن لضمان رضاكم التام عن خدماتنا.</p>
        </div>
    </footer>


    <script src="{{ asset('mainassets/js/index.js') }}"></script>

</body>

</html>
