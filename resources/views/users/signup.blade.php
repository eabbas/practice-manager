<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ثبت نام</title>

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
            primary: '#011e3f',  // سرمه‌ای تیره برای دکمه
            secondary: '#022b5a' // رنگ های ثانویه (در صورت نیاز)
          }
        }
      }
    }
  </script>

  <style>
    body {
      font-family: 'Vazirmatn', sans-serif;
    }
  </style>
</head>

<body class="bg-[url('{{ asset('assets/img/345.jpg') }}')] h-dvh flex items-center justify-center">

  <div class="w-[400px] md:w-[450px] bg-white rounded-2xl p-8 shadow-lg">
    <h1 class="text-center text-blue-900 font-bold text-2xl mt-2">ثبت نام</h1>

    <form action="{{ route('user.store') }}" method="POST" class="mt-6">
      @csrf

      <div class="mt-4">
        <label for="name" class="text-blue-900 font-semibold">نام</label>
        <input type="text" name="name" id="name" placeholder="نام" class="w-full mt-2 px-4 py-2 rounded-xl border border-black-100 focus:outline-none focus:ring-2 focus:ring-blue-900 transition">
      </div>

      <div class="mt-4">
        <label for="family" class="text-blue-900 font-semibold">نام خانوادگی</label>
        <input type="text" name="family" id="family" placeholder="نام خانوادگی" class="w-full mt-2 px-4 py-2 rounded-xl border border-black-100 focus:outline-none focus:ring-2 focus:ring-blue-900 transition">
      </div>

      <div class="mt-4">
        <label for="phone" class="text-blue-900 font-semibold">شماره تماس</label>
        <input type="text" name="phone" id="phone" placeholder="شماره تماس" class="w-full mt-2 px-4 py-2 rounded-xl border border-black-100 focus:outline-none focus:ring-2 focus:ring-blue-900 transition">
      </div>

      <div class="mt-4">
        <label for="code" class="text-blue-900 font-semibold">کد دانشجویی</label>
        <input type="password" name="code" id="code" placeholder="کد دانشجویی" class="w-full mt-2 px-4 py-2 rounded-xl border border-black-100 focus:outline-none focus:ring-2 focus:ring-blue-900 transition">
      </div>

      <div class="mt-4">
        <label class="block mb-2 text-blue-900 font-semibold">نوع کاربر</label>
        <select name="userRoles" class="w-full p-2 rounded-xl border border-black-100 text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 transition">
          @foreach ($roles as $role)
              <option value="{{ $role->id }}">{{ $role->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="mt-6">
        <button type="submit" class="w-full py-3 text-white font-bold rounded-xl bg-[#023e83] hover:bg-[#022b5a] transition">
          ثبت نام
        </button>
      </div>
    </form>
  </div>

</body>
</html>
