<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>دانشگاه بناب - ورود دانشجویان</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            vazir: ['Vazirmatn', 'sans-serif'],
          }
        }
      }
    }
  </script>

  <style>
    body {
      font-family: 'Vazirmatn', sans-serif;
    }
    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 255, 255, 0.25);
    }
    .input-glass {
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }
  </style>
</head>

<body class="h-screen overflow-hidden relative">

<!-- پس زمینه -->
<div class="fixed inset-0 -z-10">
  <img src="{{ asset('assets/img/bg1.jpg') }}"
       class="w-full h-full object-cover brightness-75">
</div>

<!-- کانتینر اصلی -->
<div class="min-h-screen flex items-center justify-center px-4">


  <div class="glass w-full max-w-sm md:max-w-md rounded-3xl p-6 md:p-10 shadow-2xl mb-[20px]">

    <!-- هدر -->
    <div class="text-center md:text-right">
      {{-- <img src="https://www.ubonab.ac.ir/theme/1/responsive/images/logo-head+final3.png"
           class="w-24 mx-auto md:mx-0 md:mr-auto mb-6"> --}}
      <h2 class="text-2xl md:text-3xl font-bold text-white">ورود</h2>
      <p class="text-white/70 text-sm mt-4 leading-6">
               سامانه بارگذاری و ارزیابی تمارین
      </p>
    </div>

    <!-- فرم -->
    <form action="{{ route('user.check') }}" method="POST" class="space-y-5 mt-8">
      @csrf
<div>
  <label class="block text-white text-sm mb-2">شماره تماس</label>
<input
  type="text"
  name="phone"
  placeholder="شماره تماس"
  maxlength="11"
  inputmode="numeric"
  required
  class="w-full px-4 py-3 rounded-xl input-glass text-white text-right
         placeholder-white/50 focus:ring-4 focus:ring-white/30 outline-none"
>


</div>

<div>
  <label class="block text-white text-sm mb-2">رمز عبور</label>

  <div class="relative">
    <input
      type="password"
      name="password"
      id="password"
      placeholder="رمز عبور"
      maxlength="11"
      inputmode="numeric"
      required
      class="w-full px-4 py-3 rounded-xl input-glass text-white
             placeholder-white/50 focus:ring-4 focus:ring-white/30 outline-none"
    >

    <!-- آیکن چشم -->
    <span
      onclick="togglePassword()"
      class="absolute left-4 top-1/2 -translate-y-1/2 cursor-pointer text-white/70 hover:text-white"
    >
      <i id="eyeIcon" class="fa-solid fa-eye"></i>
    </span>
  </div>
</div>


      <button
        class="w-full py-4 rounded-xl bg-gradient-to-r from-cyan-900 to-blue-950
               hover:from-cyan-800 hover:to-blue-800 text-white font-bold
               transition transform hover:scale-105">
        ورود به پنل
      </button>
    </form>

    <!-- لینک‌ها -->
    <div class="mt-6 text-center md:text-right text-sm text-white/70 space-y-2">
      <p>
        حساب کاربری ندارید؟
        <a href="{{ route('user.signup') }}" class="font-semibold underline">
          ایجاد حساب
        </a>
      </p>
      <a href="#" class="block hover:underline">رمز عبور را فراموش کرده‌اید؟</a>
    </div>

  </div>
</div>

<!-- فوتر -->

  {{-- <div class="fixed max-sm:hidden bottom-8 left-1/2 -translate-x-1/2 text-white/60 text-sm whitespace-nowrap">
    © ۱۴۰۴ دانشگاه بناب - تمامی حقوق محفوظ است
  </div> --}}


</body>
</html>

<script>
  function togglePassword() {
    const password = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (password.type === "password") {
      password.type = "text";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
    } else {
      password.type = "password";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    }
  }
</script>


