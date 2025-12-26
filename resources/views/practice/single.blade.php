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

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-0 lg:px-9 py-3">
    <!-- هدر صفحه -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-[#023e83] mb-2">{{ $practice->title }}</h1>
            <div class="flex items-center space-x-4 space-x-reverse text-gray-600">
                <span class="flex items-center">
                    <i class="fas fa-layer-group ml-1 text-[#023e83]"></i>
                    {{ $practice->lesson->title }}
                </span>
            </div>
        </div>
    </div>

    <!-- کارت اصلی اطلاعات درس -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
        <div class="bg-blue-900 p-6 text-white">
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
        <div class="p-6">
            <!-- توضیحات درس -->
            <div class="mb-6">
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 mb-2">
                    <h2 class="text-center font-bold text-3xl">
                        {{ $practice->title }}
                    </h2>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center border-b pb-2">
                    <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                    توضیحات تمرین
                </h3>
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    @if($practice->description)
                        <div class="prose max-w-none text-gray-700 leading-7">
                            {{$practice->description}}
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-500">
                            <i class="fas fa-file-alt text-4xl mb-3 opacity-50"></i>
                            <p>توضیحاتی برای این تمرین ثبت نشده است</p>
                        </div>
                    @endif
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center border-b pb-2 mt-1">
                    <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                     مهلت ارسال تمرین
                </h3>
                <div class="w-full h-[80px] bg-gray-50 rounded-xl p-6 border border-gray-200 mt-2">
                        <div class="prose max-w-none text-gray-700 leading-7">
                            {{$practice->deadLine}}
                        </div>
                        <div class="text-center py-8 text-gray-500">
                            {{-- <i class="fas fa-file-alt text-4xl mb-3 opacity-50"></i> --}}
                            {{-- <p>توضیحاتی برای این تمرین ثبت نشده است</p> --}}
                        </div>
                </div>
            </div>

            <!-- اطلاعات تکمیلی -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                    <div class="flex items-center mb-2">
                        <div class="bg-blue-100 p-2 rounded-lg ml-3">
                            <i class="fas fa-layer-group text-[#023e83]"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800"> درس</h4>
                    </div>
                    <p class="text-gray-700 text-lg">{{ $practice->lesson->title }}</p>
                </div>
                <div class="bg-purple-50 rounded-xl p-4 border border-purple-200">
                    <div class="flex items-center mb-2">
                        <div class="bg-purple-100 p-2 rounded-lg ml-3">
                            <i class="fas fa-user-tie text-purple-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800">استاد مربوطه</h4>
                    </div>
                    <p class="text-gray-700 text-lg">{{ $practice->master->name; }} {{ $practice->master->family }}</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
