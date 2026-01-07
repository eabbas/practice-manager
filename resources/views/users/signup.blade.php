<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>دانشگاه بناب - ثبت نام دانشجویان</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- Vazirmatn -->
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
      -webkit-backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 255, 255, 0.25);
    }
    .input-glass {
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
    } 
    /* حذف آیکن پیش‌فرض نمایش رمز عبور مرورگر */
input[type="password"]::-ms-reveal,
input[type="password"]::-ms-clear {
  display: none;
}

input[type="password"]::-webkit-credentials-auto-fill-button {
  visibility: hidden;
  display: none !important;
  pointer-events: none;
}

  </style>
</head>

<body class="h-dvh overflow-hidden relative">

<!-- پس‌زمینه -->
<div class="fixed inset-0 -z-10">
  <img src="{{ asset('assets/img/bg1.jpg') }}"
       class="w-full h-full object-cover brightness-75">
</div>

<!-- کانتینر اصلی -->
<div class="h-dvh flex items-center justify-center px-4">

  <!-- کارت فرم -->
  <div class="glass w-full max-w-md md:max-w-2xl lg:max-w-4xl
              rounded-3xl shadow-2xl
              p-6 py-3 md:p-8
              border border-white/20">

    <!-- هدر -->
    <div class="text-center mb-5 sm:mb-8">
      {{-- <img src="https://www.ubonab.ac.ir/theme/1/responsive/images/logo-head+final3.png"
           alt="لوگو"
           class="w-24 mx-auto mb-4"> --}}
      <h2 class="text-2xl md:text-3xl font-bold text-white">ثبت نام</h2>
      <p class="text-white/70 text-sm mt-2">لطفاً اطلاعات خود را وارد کنید</p>
    </div>

    <!-- فرم -->
    <form action="{{ route('user.store') }}" method="POST" class="space-y-2 sm:space-y-6">
      @csrf

      <!-- نام و نام خانوادگی -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        <div>
          <label class="block text-white text-sm mb-2">نام</label>
          <input type="text" name="name" placeholder="نام" required
                 class="w-full px-4 py-2 sm:py-3 rounded-xl input-glass text-white
                        placeholder-white/50 focus:ring-4 focus:ring-white/30 outline-none">
        </div>

        <div>
          <label class="block text-white text-sm mb-2">نام خانوادگی</label>
          <input type="text" name="family" placeholder="نام خانوادگی" required
                 class="w-full px-4 py-2 sm:py-3 rounded-xl input-glass text-white
                        placeholder-white/50 focus:ring-4 focus:ring-white/30 outline-none">
        </div>
      </div>

      <!-- شماره تماس و کد -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        <div>
          <label class="block text-white text-sm mb-2">شماره تماس</label>
        <input
  type="tel"
  name="phone"
  placeholder="شماره تماس "
  required
  maxlength="11"
  minlength="11"
  pattern="09[0-9]{9}"
  inputmode="numeric"
  class="w-full px-4 py-2 sm:py-3 rounded-xl input-glass text-white text-right
         placeholder-white/50 focus:ring-4 focus:ring-white/30 outline-none">

        </div>
<div>
  <label class="block text-white text-sm mb-2">رمز عبور</label>

  <div class="relative">
    <input
  type="password"
  name="code"
  id="password"
  placeholder="رمز عبور "
  maxlength="11"
  pattern="[0-9]{1,11}"
  inputmode="numeric"
  required
  class="w-full px-4 py-3 rounded-xl input-glass text-white
         placeholder-white/50 focus:ring-4 focus:ring-white/30 outline-none">


    <!-- آیکن چشم -->
    <span
      onclick="togglePassword()"
      class="absolute left-4 top-1/2 -translate-y-1/2 cursor-pointer text-white/70 hover:text-white"
    >
      <i id="eyeIcon" class="fa-solid fa-eye"></i>
    </span>
  </div>
</div>

      </div>

      <!-- نقش کاربر -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        <div>
          <label class="block text-white text-sm mb-2">نوع کاربر</label>
          <select name="userRoles"
                  class="w-full px-4 py-2 sm:py-3 rounded-xl input-glass text-black
                         focus:ring-4 focus:ring-white/30 outline-none">
            @foreach ($roles as $role)
              <option value="{{ $role->id }}">{{ $role->title }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- دکمه -->
      <button type="submit"
              class="w-full py-3 sm:py-4 rounded-xl
                     bg-gradient-to-r from-cyan-900 to-blue-950
                     hover:from-cyan-800 hover:to-blue-800
                     text-white font-bold text-sm sm:text-lg mt-3
                     transition transform hover:scale-105">
        ایجاد حساب
      </button>
    </form>

    <!-- لینک ورود -->
    <div class="mt-2 sm:mt-6 text-center text-white/70 text-sm">
      قبلاً حساب کاربری دارید؟
      <a href="{{ route('user.login') }}" class="font-semibold hover:underline">
        ورود به پنل
      </a>
    </div>

  </div>
</div>

<!-- فوتر -->
{{-- <div class="
  hidden md:block fixed bottom-5 left-1/2 -translate-x-1/2
  text-white/60 text-xs md:text-sm
  whitespace-nowrap
  pointer-events-none">
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
