<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ورود</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Vazirmatn Font -->
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            vazir: ['Vazirmatn', 'sans-serif'],
          },
          colors: {
            primary: '#011e3f', // سرمه‌ای تیره
            secondary: '#022b5a', // کمی روشن‌تر
          }
        }
      }
    }
  </script>

  <style>
    body {
      font-family: 'Vazirmatn', sans-serif;
      background-color: #011e3f; /* سرمه‌ای تیره */
    }
  </style>
</head>

<body class="bg-[url('{{ asset('assets/img/345.jpg') }}')] h-dvh flex items-center justify-center">

  <div class="w-full max-w-md bg-white rounded-3xl shadow-lg p-8">
    <h1 class="text-3xl font-extrabold text-primary text-center mb-6">ورود به سامانه</h1>

    <form action="{{ route('user.check') }}" method="POST" class="flex flex-col gap-5">
      @csrf

      <!-- شماره تلفن -->
      <div class="flex flex-col">
        <label for="phone" class="text-primary font-semibold mb-1">شماره تلفن</label>
        <input type="number" name="phone" id="phone" placeholder="شماره تلفن"
               class="border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary transition">
      </div>

      <!-- رمز عبور -->
      <div class="flex flex-col">
        <label for="password" class="text-primary font-semibold mb-1">رمز عبور</label>
        <input type="password" name="password" id="password" placeholder="رمز عبور"
               class="border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary transition">
      </div>

      <!-- فراموشی رمز عبور -->
      <div class="text-sm text-right">
        <a href="#" class="text-blue-900 hover:underline">فراموشی رمز عبور؟</a>
      </div>

      <!-- دکمه ورود -->
      <button type="submit" class="w-full bg-[#023e83] text-white font-bold py-3 rounded-xl hover:bg-secondary transition">
        ورود
      </button>

      <!-- لینک ثبت نام -->
      <p class="text-center text-gray-500 mt-2 text-sm">
        هنوز ثبت نام نکرده‌اید؟ 
        <a href="{{ route('user.signup') }}" class="text-blue-900 font-bold hover:underline">ثبت نام</a>
      </p>

    </form>
  </div>

</body>
</html>
