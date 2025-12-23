
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>لیست درس‌ها</title>
</head>

<body class="bg-slate-100 p-4 sm:p-6">

<div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-4 sm:p-6">

    <!-- عنوان -->
    <h1 class="text-lg sm:text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
        <i class="fas fa-list text-[#023e83]"></i>
        لیست درس‌های من
    </h1>

    <!-- جستجو -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
        <span class="text-slate-600 text-sm">
            تعداد درس‌های من : {{count($user->lessons)}}
        </span>

        <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
            <input type="text"
                   placeholder="جستجو..."
                   class="w-full sm:w-auto px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">

            <button class="px-4 py-2 bg-slate-200 rounded-lg text-slate-700">
                پاک‌سازی
            </button>
        </div>
    </div>

    <!-- جدول -->
    <div class="overflow-x-auto border border-slate-200 rounded-lg">
        <table class="w-full min-w-[700px] text-right">
            <thead class="bg-slate-50 text-slate-600 text-sm">
                <tr>
                    <th class="py-3 px-4">نام درس</th>
                    <th class="py-3 px-4">نام استاد</th>
                    <th class="py-3 px-4 text-center">مشاهده درس</th>
                    <th class="py-3 px-4 text-center">تمرینات</th>
                </tr>
            </thead>

            <tbody class="text-sm">
                @foreach($user->lessons as $lesson)
                <tr class="hover:bg-slate-50 transition">
                    <td class="py-3 px-4 whitespace-nowrap">
                        {{$lesson->title}}
                    </td>

                    <td class="py-3 px-4 whitespace-nowrap">
                        {{$lesson->master->name}} {{$lesson->master->family}}
                    </td>

                    <td class="py-3 px-4 text-center">
                        <a href="{{route('lesson_show' , [$lesson->id])}}"
                           class="inline-block px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                            جزئیات درس
                        </a>
                    </td>

                    <td class="py-3 px-4 text-center">
                        <a href="{{route('practice_list' , [$lesson->id])}}"
                           class="inline-block px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                            مشاهده تمرینات
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- لیست خالی -->
    @if (count($user->lessons) == 0)
        <p class="text-center text-slate-500 mt-6">
            درسی برای شما وجود ندارد.
        </p>
    @endif

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



