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

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
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

            <!-- پاسخ ها    --> 
            {{-- @foreach ($responses as $response)

            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm mb-3">
                        @if($response->users->roles[0]->title == 'استاد')
                        پاسخ استاد : 
                        @else
                        پاسخ دانشجو:
                        @endif
                    </br>

                {{$response->text}}
            </div>
            @endforeach --}}
 <!-- پاسخ ها    -->
            {{-- <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                <h3 class="text-xl font-semibold text-[#023e83] mb-4 flex items-center">
                    <i class="fas fa-upload ml-2"></i>
                    ارسال پاسخ
                </h3>
                <form action="{{route('response_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        {{-- <label class="block text-gray-700 font-medium mb-2">فایل تمرین</label>
                        <input type="file" name="file" class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary"> --}}
                        {{-- <input type="hidden" name="practice_id" value="{{$practice->id}}"> --}}
                        {{-- <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <textarea name="text" id="response" cols="0" rows="1" class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary mt-4"></textarea>
                    </div>
                    <button type="submit" 
                            class="bg-[#023e83] hover:bg-[#012b5a] text-white px-6 py-2 rounded-lg transition duration-200">
                        ارسال
                    </button>
                </form>
            </div>  --}}
        </div>
    </div>
</div>
@endsection
