

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('loginassets/css/login.css') }}">
    <title>Modern Login Page | AsmrProg</title>
</head>



    <div class="containerLogin" id="containerLogin">
        <div class="form-containerLogin sign-in">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <h1>تسجيل الدخول</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>أو قم باستخدام الايميل وكلمة االسر</span>
                <input name="email" type="email" placeholder="الايميل">
                <input name="password" type="password" placeholder="كلمة السر">
                <a href="#">نسيت كلمة السر؟</a>
                <button>تسجيل الدخول</button>
            </form>
        </div>
        <div class="toggle-containerLogin">
            <div class="toggleLogin">
                <div class="toggle-panel toggle-right">
                    <h1>مرحبا يا صديق!</h1>
                    <p>قم بالتسجيل باستخدام بياناتك الشخصية لاستخدام جميع ميزات الموقع</p>
                    <button class="hidden" id="register">تسجيل</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('loginassets/js/login.js') }}"></script>

