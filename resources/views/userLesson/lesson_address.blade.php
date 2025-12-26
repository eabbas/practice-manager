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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>درخواست شرکت در درس</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            navy: '#023e83'
          }
        }
      }
    }
  </script>
</head>

<body class="min-h-screen bg-gray-100">

  <!-- wrapper اصلی -->
  <div class="flex items-start justify-center lg:mr-50 sm:items-center px-3 sm:px-6">

    <!-- کارت -->
    <div
      class="
        w-[500px]
        max-w-none
        sm:max-w-xl
        md:max-w-2xl
        bg-white
        rounded-2xl
        shadow-lg
        p-4
        sm:p-6
        mx-auto
        mt-30
      "
    >

      @if(Auth::user()->id == $master->id)
        <p class="text-center text-gray-500">
          امکان ثبت درخواست برای شما وجود ندارد.
        </p>
      @else

      <h1 class="text-center text-lg sm:text-xl font-semibold mb-6">
        درخواست شرکت در درس
      </h1>

      <form action="{{ route('userLesson_store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

        <div>
          <label class="block text-sm mb-1">نام دانشجو</label>
          <input type="text"
            class="w-full border rounded-xl p-3"
            value="{{ Auth::user()->name }} {{ Auth::user()->family }}">
        </div>

        <div>
          <label class="block text-sm mb-1">شماره دانشجویی</label>
          <input type="text"
            class="w-full border rounded-xl p-3"
            value="{{ Auth::user()->code }}">
        </div>

        <div>
          <label class="block text-sm mb-1">نام درس</label>
          <input type="text"
            class="w-full border rounded-xl p-3"
            value="{{ $lesson->title }}">
        </div>

        <div>
          <label class="block text-sm mb-1">نام استاد</label>
          <input type="text"
            class="w-full border rounded-xl p-3"
            value="{{ $master->name }} {{ $master->family }}">
        </div>

        <button
          class="
            w-full
            bg-navy
            text-white
            rounded-xl
            py-3
            text-sm
            sm:text-base
            font-medium
            mt-6
          "
        >
          ارسال درخواست
        </button>

      </form>
      @endif

    </div>
  </div>

</body>
</html>
