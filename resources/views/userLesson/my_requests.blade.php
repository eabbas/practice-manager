
@extends('users.dashboard')
@section('title', 'practice list')
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
        
        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .status-inactive {
            background-color: #fef2f2;
            color: #dc2626;
        }
    </style>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>لیست درخواست‌ها</title>
</head>

<body class="bg-slate-100 p-3 sm:p-6">

<div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-4 sm:p-6">

  <h1 class="text-lg sm:text-xl font-bold text-slate-800 mb-4">
    لیست درخواست‌های من
  </h1>

  <!-- هدر بالا -->
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
    <span class="text-slate-600 text-sm">
      تعداد درخواست‌ها: {{ count([$userLesson->pivot->status == '0']) }}
    </span>

    <div class="flex gap-2 w-full sm:w-auto">
      <input
        type="text"
        placeholder="جستجو..."
        class="w-full sm:w-56 px-3 py-2 border rounded-lg text-sm"
      >
      <button class="px-4 py-2 bg-slate-200 rounded-lg text-sm">
        پاک‌سازی
      </button>
    </div>
  </div>

  <!-- ================= DESKTOP TABLE ================= -->
  <div class="hidden md:block overflow-x-auto border rounded-lg">
    <table class="w-full text-right text-sm">
      <thead class="bg-slate-50 text-slate-600">
        <tr>
          <th class="py-3 px-4">نام دانشجو</th>
          <th class="py-3 px-4">شماره دانشجویی</th>
          <th class="py-3 px-4">نام درس</th>
          <th class="py-3 px-4">نام استاد</th>
          <th class="py-3 px-4 text-center">عملیات</th>
        </tr>
      </thead>

      <tbody>
        <tr class="border-t hover:bg-slate-50">
          <td class="py-3 px-4">{{Auth::user()->name}} {{Auth::user()->family}}</td>
          <td class="py-3 px-4">{{Auth::user()->code}}</td>
          <td class="py-3 px-4">{{$userLesson->title}}</td>
          <td class="py-3 px-4">{{$master->name}} {{$master->family}}</td>
          <td class="py-3 px-4 text-center">

            @if($userLesson->pivot->status == '0')
              <span class="px-3 py-1 rounded-md border border-blue-600 text-blue-600">
                در انتظار تایید
              </span>
            @else
              <a href="{{ route('lesson_show', [$userLesson->id]) }}"
                 class="px-3 py-1 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                مشاهده درس
              </a>
            @endif

          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ================= MOBILE CARD ================= -->
  <div class="md:hidden space-y-3">

    <div class="border rounded-xl p-4 text-sm space-y-2">
      <div><span class="text-slate-500">نام دانشجو:</span> {{Auth::user()->name}} {{Auth::user()->family}}</div>
      <div><span class="text-slate-500">شماره دانشجویی:</span> {{Auth::user()->code}}</div>
      <div><span class="text-slate-500">نام درس:</span> {{$userLesson->title}}</div>
      <div><span class="text-slate-500">نام استاد:</span> {{$master->name}} {{$master->family}}</div>

      <div class="pt-2">
        @if($userLesson->pivot->status == '0')
          <span class="inline-block px-3 py-1 rounded-md border border-blue-600 text-blue-600">
            در انتظار تایید
          </span>
        @else
          <a href="{{ route('lesson_show', [$userLesson->id]) }}"
             class="inline-block px-3 py-1 rounded-md border border-blue-600 text-blue-600">
            مشاهده درس
          </a>
        @endif
      </div>
    </div>

  </div>

</div>

</body>
</html>

  <script>
        // جستجو در جدول
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        </script>

@endsection



