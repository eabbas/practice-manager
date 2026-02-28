    @extends('users.dashboard')
    @section('title', 'پروفایل کاربری')
    @section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'vazir': ['Vazirmatn', 'sans-serif'],
                    },
                    colors: {
                        primary: '#023e83'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(2, 62, 131, 0.1);
            border-color: #023e83;
        }
        
        .checkbox-custom:checked {
            background-color: #04264e;
            border-color: #04264e;
        }
    </style>
   <!doctype html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>داشبورد</title>

  <style>
    body{font-family: Vazirmatn, sans-serif;}
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-slate-100">

  <!-- Dashboard -->
  <main class="max-w-6xl mx-auto px-4 py-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- ارائه درس جدید -->
      <a href="{{ route('lesson_create') }}" class="group bg-white rounded-2xl p-6 shadow hover:shadow-2xl border border-slate-200 transition-all hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between">
          <h3 class="font-bold text-slate-800 text-lg">ارائه درس جدید</h3>
          <div class="size-10 rounded-2xl bg-purple-900/90 text-white grid place-content-center">
            ➕
          </div>
        </div>
        <p class="text-slate-500 mt-3 text-sm">ثبت و تعریف یک درس جدید برای ترم</p>
      </a>

      <!-- دروس ارائه شده -->
      <a href="{{ route('lesson_list') }}" class="group bg-white rounded-2xl p-6 shadow hover:shadow-2xl border border-slate-200 transition-all hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between">
          <h3 class="font-bold text-slate-800 text-lg">دروس ارائه شده</h3>
          <div class="size-10 rounded-2xl bg-indigo-600 text-white grid place-content-center">
            📚
          </div>
        </div>
        <p class="text-slate-500 mt-3 text-sm">مشاهده لیست همه دروس </p>
      </a>

      <!-- تمرینات -->
      <a href="{{ route('practices_list') }}" class="group bg-white rounded-2xl p-6 shadow hover:shadow-2xl border border-slate-200 transition-all hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between">
          <h3 class="font-bold text-slate-800 text-lg">تمرینات</h3>
          <div class="size-10 rounded-2xl bg-emerald-600 text-white grid place-content-center">
            📝
          </div>
        </div>
        <p class="text-slate-500 mt-3 text-sm">مدیریت و بررسی تمرین‌ها</p>
      </a>

      <!-- دروس دانشجو -->
      <a href="{{ route('student_class') }}" class="group bg-white rounded-2xl p-6 shadow hover:shadow-2xl border border-slate-200 transition-all hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between">
          <h3 class="font-bold text-slate-800 text-lg">دروس دانشجو</h3>
          <div class="size-10 rounded-2xl bg-amber-500 text-white grid place-content-center">
            🎓
          </div>
        </div>
        <p class="text-slate-500 mt-3 text-sm">لیست درس های ثبت شده</p>
      </a>

      <!-- تمرینات دانشجو -->
      <a href="{{ route('my_practices') }}" class="group bg-white rounded-2xl p-6 shadow hover:shadow-2xl border border-slate-200 transition-all hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between">
          <h3 class="font-bold text-slate-800 text-lg">تمرینات دانشجو</h3>
          <div class="size-10 rounded-2xl bg-purple-600 text-white grid place-content-center">
            📄
          </div>
        </div>
        <p class="text-slate-500 mt-3 text-sm">تمرین‌های ارسال شده و وضعیت‌ها</p>
      </a>

      <!-- درخواست‌های دانشجو -->
      <a href="{{ route('my_requests') }}" class="group bg-white rounded-2xl p-6 shadow hover:shadow-2xl border border-slate-200 transition-all hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between">
          <h3 class="font-bold text-slate-800 text-lg">درخواست‌های دانشجو</h3>
          <div class="size-10 rounded-2xl bg-rose-600 text-white grid place-content-center">
            📥
          </div>
        </div>
        <p class="text-slate-500 mt-3 text-sm">پیگیری و مدیریت درخواست‌ها</p>
      </a>

    </div>
  </main>

</body>
</html>
 @endsection