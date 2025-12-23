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
    <title>لیست پاسخ ها</title>
</head>

<body class="bg-slate-100 p-4 sm:p-6">

    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-4 sm:p-6">

        <h1 class="text-lg sm:text-xl font-bold text-slate-800 mb-4 flex items-center">
            <i class="fas fa-list ml-2 text-[#023e83]"></i>
            لیست پاسخ های دانشجویان
        </h1>

        <!-- جستجو -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-2 sm:gap-0">
            <span class="text-slate-600 text-sm">تعداد پاسخ های دانشجویان : {{count($practiceResponses)}}</span>

            <div class="flex flex-col sm:flex-row gap-2">
                <input type="text"
                       placeholder="جستجو..."
                       class="px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none w-full sm:w-auto">

                <button class="px-4 py-2 bg-slate-200 rounded-lg text-slate-700 w-full sm:w-auto">
                    پاک‌سازی
                </button>
            </div>
        </div>

        <!-- جدول -->
        <div class="overflow-x-auto border border-slate-200 rounded-lg">
            <table class="w-full text-right min-w-[600px] sm:min-w-full">
                <thead class="bg-slate-50 text-slate-600 text-sm">
                    <tr>
                        <th class="py-3 px-2 sm:px-4">نام دانشجو</th>
                        <th class="py-3 px-2 sm:px-4">شماره دانشجویی</th>
                        <th class="py-3 px-2 sm:px-4">پاسخ های دیده نشده</th>
                        <th class="py-3 px-2 sm:px-4 text-center">مشاهده</th>
                    </tr>
                </thead>

                <tbody class="text-sm">
                    @foreach($practiceResponses as $response)
                    <tr class="hover:bg-slate-50">
                        <td class="py-2 sm:py-3 px-2 sm:px-4">{{$response->users->name}} {{$response->users->family}}</td>
                        <td class="py-2 sm:py-3 px-2 sm:px-4">{{$response->users->code}}</td>
                        <td class="flex items-center mr-5 sm:mr-10 py-2 sm:py-3 px-2 sm:px-4 relative">
                            <span class="absolute w-5 h-5 rounded-full text-white bg-blue-600 text-center font-bold top-2">
                                {{$response->userResponseCount}}
                            </span>
                            <svg class="ml-6 w-10 h-10 text-slate-400" fill="oklch(37.9% 0.146 265.522)" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 5a4 4 0 0 0-4 4v2.756c0 1.294-.89 2.278-1.45 2.867A1.99 1.99 0 0 0 6 16h12a1.99 1.99 0 0 0-.55-1.377c-.56-.59-1.45-1.573-1.45-2.867V9a4 4 0 0 0-4-4ZM6 9a6 6 0 1 1 12 0v2.756c0 .402.292.85.9 1.49A3.99 3.99 0 0 1 20 16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2 3.99 3.99 0 0 1 1.1-2.755c.608-.64.9-1.087.9-1.489V9Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M9.766 18.916a1 1 0 0 1 1.324.497 1 1 0 0 0 1.81.026 1 1 0 0 1 1.797.876 3 3 0 0 1-5.429-.076 1 1 0 0 1 .498-1.323Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M12 2a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0V3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                            </svg>
                        </td>
                        <td class="py-2 sm:py-3 px-2 sm:px-4 text-center">
                            <a href="{{route('student_responses' , [$response->users->id ,$practice->id ,$practice->master->id ])}}" 
                               class="px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50 inline-block">
                                مشاهده پاسخ ها
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- وقتی لیست خالی باشد --}}
        {{-- @if ($practiceResponses == NULL) 
        <p class="text-center text-slate-500 mt-4">تمرینی برای این درس وجود ندارد.</p>
        @endif --}}

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