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
    <title>لیست درخواست‌ها</title>
</head>

<body class="bg-slate-100 p-4 sm:p-6">


<form action="{{route('user_select')}} "method="post" class="max-w-5xl mx-auto bg-white rounded-xl shadow p-4 sm:p-6">
    <!-- عنوان -->
    @csrf
    
    <h1 class="text-lg sm:text-xl font-bold text-slate-800 mb-4 flex flex-wrap justify-between gap-2">   
        <span> 
            لیست درخواست‌های دانشجویی درس
        <span class="text-black-600">{{$lessonUsers->title}}</span>
        </span>
        <div class="flex flex-row justify-end">
            <span class="text-slate-600 text-sm">
                تعداد درخواست‌ها : {{count($lessonUsers->users)}}
            </span>
        </div>
    </h1>

    <!-- جستجو -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
        <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
            <select name="select" class="px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                    <option value="accept">تایید درخواست </option>
                    <option value="remove">حذف درخواست </option>
            </select>
            <button type="submit" class="px-4 py-2 bg-slate-200 rounded-lg text-slate-700">
                اجرا
            </button>
        </div>
        <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
            <input type="text"
                   placeholder="جستجوی دانشجو ..."
                   class="w-full sm:w-auto px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">

        </div>
    </div>
        <span class="flex flex-row-1 gap-2 mb-2">
            <input type="checkbox" id="checkAll" onchange="selectAll(this)"><label for="check">انتخاب همه</label>
        </span>
    <!-- جدول -->
    <div class="overflow-x-auto border border-slate-200 rounded-lg">
        <table class="w-full min-w-[640px] text-right">
            <thead class="bg-slate-50 text-slate-600 text-sm">
                <tr>
                    <th></th>
                    <th class="py-3 px-4">نام دانشجو</th>
                    <th class="py-3 px-4">شماره دانشجویی</th>
                    <th class="py-3 px-4 text-center">تایید درخواست</th>
                    <th class="py-3 px-4 text-center">حذف درخواست</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach($lessonUsers->users as $user)
                <tr class="hover:bg-slate-50 transition">
                    <td>
                        <div class="py-1 px-2 whitespace-nowrap flex items-center justify-center h-full">
                            <input type="checkbox" class="user" name="users[]" value="{{$user->id}}">
                            <input type="hidden"   name="lesson_id" value="{{$lessonUsers->id}}">

                        </div>
                    </td>
                    <td class="py-3 px-4 whitespace-nowrap">
                        {{$user->name}} {{$user->family}}
                    </td>

                    <td class="py-3 px-4 whitespace-nowrap">
                        {{$user->code}}
                    </td>

                    <td class="py-3 px-4 text-center">
                        @if($user->pivot->status == '0')
                            <a href="{{route('request_approve' , [$user->id , $lessonUsers->id])}}"
                               class="inline-block px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                                تایید
                            </a>
                        @endif

                        @if($user->pivot->status == '1')
                            <span class="inline-block px-3 py-1.5 rounded-md border border-green-600 text-green-600">
                                تایید شد
                            </span>
                        @endif
                    </td>

                    <td class="py-3 px-4 text-center">
                        <a href="{{route('delete_request', [$lessonUsers->id , $user->id])}}"
                           class="text-red-600 hover:text-red-800 transition"
                           title="حذف">
                            <i class="fas fa-trash text-lg"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- لیست خالی -->
    @if (count($lessonUsers->users) == 0)
        <p class="text-center text-slate-500 mt-5">
            درخواستی وجود ندارد.
        </p>
    @endif

</form>

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
        <script src="{{asset('assets/js/checkAll.js')}}"></script>
@endsection