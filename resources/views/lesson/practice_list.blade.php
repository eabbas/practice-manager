
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
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>داینامیک تمرین‌ها با دکمه "مشاهده"</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* اضافه کردن انیمیشن‌های ملایم‌تر */
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.3s ease-out forwards;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex flex-row justify-between max-w-3xl mx-auto mt-10 space-y-5">
    <h2 class="text-3xl font-bold text-blue-900 mt-2">
        لیست تمارین درس
    </h2>
            <a href="{{ url('/lessons') }}" 
               class="border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg transition duration-200 flex items-center mb-6">
                <i class="fas fa-arrow-right ml-2"></i>
                بازگشت
            </a>
        
    <!-- Exercise Template (repeated by JS) -->
</div>
@foreach ($practice_list as $lesson)
<div class="flex items-center justify-center flex-col space-y-3 mt-3" id="exercise-list">
    <!-- تمرین ۱ -->
    <div class="w-200 fade-in p-5 bg-white shadow-lg rounded-xl border border-blue-100 flex items-start gap-4 transform transition-all hover:scale-102 hover:shadow-lg hover:translate-x-1 hover:translate-y-1">
        <div class="p-3 bg-blue-900 text-white rounded-lg text-2xl">📘</div>

        <div class="flex-1 space-y-2">
            <h3 class="text-xl font-semibold text-blue-900"> {{$lesson->title}}: {{$lesson->description}} </h3>
            <p class="text-gray-600 text-sm">مهلت تحویل: ۱۴۰۴/۱۰/۲۰</p>

            <span class="inline-block px-3 py-1 text-sm rounded-lg bg-green-100 text-green-700">
                ✔ تحویل شده
            </span>

            <div class="w-full bg-gray-200 h-2 rounded-full">
                <div class="bg-green-600 h-full rounded-full" style="width:100%"></div>
            </div>
        </div>

        <a href="{{route('practice_show',[$lesson->id])}}" class="px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition duration-200">
            مشاهده
        </a>
    </div>
    @endforeach
    
    <!-- تمرین ۲ -->
    {{-- <div class="w-200 fade-in p-5 bg-white shadow-lg rounded-xl border border-blue-100 flex items-start gap-4 transform transition-all hover:scale-102 hover:shadow-lg hover:translate-x-1 hover:translate-y-1">
        <div class="p-3 bg-blue-900 text-white rounded-lg text-2xl">📗</div>

        <div class="flex-1 space-y-2">
            <h3 class="text-xl font-semibold text-blue-900">تمرین ۲: پیاده‌سازی پایتون</h3>
            <p class="text-gray-600 text-sm">مهلت تحویل: ۱۴۰۴/۱۰/۲۵</p>

            <span class="inline-block px-3 py-1 text-sm rounded-lg bg-yellow-100 text-yellow-700">
                ⏳ در انتظار ارسال
            </span>

            <div class="w-full bg-gray-200 h-2 rounded-full">
                <div class="bg-yellow-500 h-full rounded-full" style="width:40%"></div>
            </div>
        </div>

        <a href="#" class="px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition duration-200">
            مشاهده
        </a>
    </div>
</div> --}}

</body>
</html>


{{-- <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- هدر صفحه -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            @foreach ($practice_list as $lesson)
            <h1 class="text-3xl font-bold text-[#023e83] mb-2">{{ $lesson->title }}</h1>
            <div class="flex items-center space-x-4 space-x-reverse text-gray-600">
                <span class="flex items-center">
                    <i class="fas fa-layer-group ml-1 text-[#023e83]"></i>
                    {{ $lesson->lesson->title }}
                </span>
            </div>
        </div>
        <div class="flex items-center space-x-3 space-x-reverse mt-4 md:mt-0">
            <a href="{{url('/practices')}}" 
               class="border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <i class="fas fa-arrow-right ml-2"></i>
                بازگشت
            </a>
        </div>
    </div>

    <!-- کارت اصلی اطلاعات درس -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
        <!-- هدر کارت -->
        <div class="bg-gradient-to-r from-[#023e83] bg-blue-700 p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white/20 p-3 rounded-xl ml-4">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">مشخصات تمرین</h2>
                        <p class="text-blue-100 mt-1">اطلاعات کامل تمرین</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- بدنه کارت -->
        <div class="p-6">
            <!-- توضیحات درس -->
            <div class="mb-6">
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 mb-2">
                    <h2 class="text-center font-bold text-3xl">
                        {{ $lesson->title }}
                    </h2>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center border-b pb-2">
                    <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                    توضیحات تمرین
                </h3>
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    @if($lesson->description)
                        <div class="prose max-w-none text-gray-700 leading-7">
                            {{$lesson->description}}
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-500">
                            <i class="fas fa-file-alt text-4xl mb-3 opacity-50"></i>
                            <p>توضیحاتی برای این تمرین ثبت نشده است</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- اطلاعات تکمیلی -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- گروه درس -->
                <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                    <div class="flex items-center mb-2">
                        <div class="bg-blue-100 p-2 rounded-lg ml-3">
                            <i class="fas fa-layer-group text-[#023e83]"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800"> درس مربوطه</h4>
                    </div>
                    <p class="text-gray-700 text-lg">@if(isset($lesson->lesson_id))
                            {{$lesson->lesson->title}}
                            @endif</p>
                </div>

                <!-- استاد مربوطه -->
                <div class="bg-purple-50 rounded-xl p-4 border border-purple-200">
                    <div class="flex items-center mb-2">
                        <div class="bg-purple-100 p-2 rounded-lg ml-3">
                            <i class="fas fa-user-tie text-purple-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800">استاد مربوطه</h4>
                    </div>
                    <p class="text-gray-700 text-lg">{{ Auth::user()->name; }} {{Auth::user()->family}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>  
</div>

<style>
    .prose {
        line-height: 1.8;
    }
    
    .prose p {
        margin-bottom: 1rem;
    }
    
    .prose p:last-child {
        margin-bottom: 0;
    }
</style>

<script>
    // مدیریت تأیید حذف
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLink = document.querySelector('a[href*="/delete/"]');
        if (deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                if (!confirm('آیا از حذف این درس اطمینان دارید؟ این عمل غیرقابل بازگشت است.')) {
                    e.preventDefault();
                }
            });
        }
    });
</script> --}}
@endsection


    {{-- <a href="{{url('/practices')}}">Back</a>
    <h1 style="text-align:center; color: pink;">

           practice name is::   {{$practice->title}}
</br>
           practice description is::   {{$practice->description}}
</br>
          @if(isset($practice->lesson_id))
             practice lesson_name is::  {{$practice->lesson->title}}
        @endif

    </h1>
@endsection --}}