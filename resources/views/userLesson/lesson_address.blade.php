@extends('users.dashboard')
@section('title', 'single practice')
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
        
        .table-row:hover {
            background-color: #f8fafc;
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }
    </style>
</head>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>فرم درخواست شرکت در درس</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // اضافه کردن رنگ سرمه‌ای به Tailwind
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            navy: '#0b2745'
          }
        }
      }
    }
  </script>
  <style>
    body { -webkit-font-smoothing:antialiased; }
  </style>
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center p-6">
  <main class="w-full max-w-lg bg-white shadow-md rounded-2xl p-6 mr-150 mt-15">
    @if(Auth::user()->id == $master->id)
        <p class="text-center text-slate-500">امکان ثبت درخواست برای شما وجود ندارد.</p>
    @else
    <header class="mb-4">
      <h1 class="text-xl font-semibold">درخواست شرکت در درس</h1>
      
    </header>
    {{-- @foreach($sendLesson as $lesson) --}}
    <form id="enrollForm" class="space-y-4" action="{{route ('userLesson_store')}}" method="POST" onsubmit="handleSubmit(event)">
      @csrf
      <div>
        <?php //dd($lesson); ?>
        <input type="hidden" name="lesson_id" value="{{$lesson->id}}" class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-3">
      </div>
      <div>
        <label for="studentName" class="block text-sm font-medium text-gray-700">نام دانشجو</label>
        <input type="text" name="name" value="{{Auth::user()->name}} {{Auth::user()->family}}" class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-3">
      </div>

      <div>
        <label for="studentEmail" class="block text-sm font-medium text-gray-700">شماره دانشجویی</label>
        <input type="text" name="code" value="{{Auth::user()->code}}" class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-3">
      </div>

      <div>
        <label for="course" class="block text-sm font-medium text-gray-700"> نام درس</label>
        <input type="text" name="title" value="{{$lesson->title}}" class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-3">
        </div>
      </div>
      <div>
        <label for="course" class="block text-sm font-medium text-gray-700"> نام استاد</label>
        <input type="text" name="master" value="{{$master->name}} {{$master->family}}" class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-3">
        </div>
      </div>
      <div class="pt-3">
        <!-- دکمه سرمه‌ای -->
        <button id="submitBtn" type="submit"
        class="w-full inline-flex justify-center items-center gap-2 rounded-2xl px-6 py-3 bg-[#023e83] hover:bg-[#022e6b] text-white font-medium  shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-navy/50 disabled:opacity-60">
        <!-- آیکون ساده -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1.707-9.707a1 1 0 00-1.414-1.414L8 9.586 7.121 8.707a1 1 0 10-1.414 1.414l1.999 2a1 1 0 001.414 0l3.586-3.586z" clip-rule="evenodd" />
        </svg>
        ارسال درخواست شرکت در درس
      </button>
        @endif
      </div>

      <div aria-live="polite" id="status" class="text-sm mt-2 text-center text-green-600 hidden"></div>
    </form>

  </main>
</body>
</html>
