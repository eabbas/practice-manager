
@extends('users.dashboard')
@section('title', 'single lesson')
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
<div class="max-w-4xl mx-auto px-4 sm:px-6 py-0 lg:px-9 py-3">
    <!-- هدر صفحه -->
    <div class="flex flex-col sm:flex-row space-x-4 md:flex-row space-x-130 items-start md:items-center mb-6">
        
        <div class="flex flex-col space-x-4 w-full mr-2">
            <div class="flex flex-col">
            <div class="flex flex-row">
            <i class="fas fa-layer-group text-[#023e83] mt-3"></i>
            <h1 class=" text-nowrap text-3xl font-bold text-[#023e83] mr-2">{{ $lesson->title }}</h1>
            </div>
            </div>
      
            <div class="flex items-center space-x-4 space-x-reverse text-gray-600 mt-2">
                <span class="flex items-center ">
                    {{ $lesson->lesson_group }}
                </span>
            </div>
        </div>
        
    </div>

    <!-- کارت اصلی اطلاعات درس -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
        <!-- هدر کارت -->
        <div class=" bg-blue-900 backdrop-blur-4xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white/20 p-3 rounded-xl ml-4">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                    <div class="flex flex-row justify-between gap-100 mt-3">
                        <div>
                            <h2 class="text-xl font-semibold">مشخصات درس</h2>
                            <p class="text-blue-100 mt-1">اطلاعات کامل درس</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- بدنه کارت -->
        <div class="p-6">
            <!-- کارت درس -->
     <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 mb-4">
    <div class="flex flex-col md:flex-row md:space-x-6 space-y-4 md:space-y-0">
        
        <!-- div توضیحات درس -->
        <div class="flex-1 bg-gray-50 p-4 border border-gray-200 rounded-xl">
            <h2 class="text-center font-bold text-3xl mb-4">
                {{ $lesson->title }}
            </h2>

            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center border-b pb-2">
                <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                توضیحات درس
            </h3>

            @if($lesson->description)
                <div class="prose max-w-none text-gray-700 leading-7">
                    {{$lesson->description}}
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-file-alt text-4xl mb-3 opacity-50"></i>
                    <p>توضیحاتی برای این درس ثبت نشده است</p>
                </div>
            @endif
        </div>

        <!-- div دکمه مشاهده تمرینات (کمی کوچکتر) -->
        <div class="w-45 p-4  rounded-xl flex items-center justify-center">
            <a href="{{route('practice_list', [$lesson->id])}}" 
               class=" border border-lime-600 text-lime-700 hover:bg-lime-50 text-nowrap px-6 py-4 rounded-lg transition duration-200 flex items-center justify-center w-full text-center">
                مشاهده تمرینات
            </a>
        </div>

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
                        <h4 class="font-semibold text-gray-800">گروه درس</h4>
                    </div>
                    <p class="text-gray-700 text-lg">{{ $lesson->lesson_group }}</p>
                </div>

                <!-- استاد مربوطه -->
                <div class="bg-purple-50 rounded-xl p-4 border border-purple-200">
                    <div class="flex items-center mb-2">
                        <div class="bg-purple-100 p-2 rounded-lg ml-3">
                            <i class="fas fa-user-tie text-purple-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800">استاد مربوطه</h4>
                    </div>
                    <p class="text-gray-700 text-lg">{{ $master->name; }} {{$master->family}}</p>
                </div>
            </div>
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
</script>
@endsection