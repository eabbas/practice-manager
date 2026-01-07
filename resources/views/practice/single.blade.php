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
                    نام درس :
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
        <div class="p-6" style="overflow-y:scroll">
            <!-- توضیحات درس -->
            <div class="mb-6 ">
                <div class="flex flex-row justify-around">
                    <div class=" w-[300px] ml-4 bg-gray-50 rounded-xl p-6 border border-gray-200 mb-3">
                        <h3 class="text-center font-bold text-xl">
                            {{ $practice->title }}
                        </h3> 
                    </div>
                    
                <div class=" w-[300px] ml-4 bg-gray-50 rounded-xl p-6 border border-gray-200 mb-3 text-center font-bold hover:bg-blue-200">
                    <a href="{{route('student_responses' , [$responses[0]->users->id ,$practice->id ,$practice->master->id ])}}" title="مشاهده پاسخ ها">مشاهده پاسخ ها</a>
                </div>
                
            </div>
                
                <h3 class="text-lg  font-semibold text-gray-800 mb-4 flex items-center border-b pb-2">
                    <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                    توضیحات تمرین
                </h3>
                <div class="bg-gray-50 w-full h-[100px] rounded-xl p-6 border border-gray-200">
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
                <div class="flex flex-row gap-3">
                    <div class="w-full h-[80px] bg-gray-50 rounded-xl p-6 border border-gray-200 mt-2">
                        <div class="flex flex-row gap-30 prose max-w-none text-gray-700 leading-7">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 text-nowrap">
                                    <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                                     مهلت ارسال 
                                </h3>
                            </div>
                            <div>
                            {{jdate($practice->deadLine)->format('Y/m/y')}}
                            </div>
                            </div>   
                    </div>
                    <div class="w-full h-[80px] bg-gray-50 rounded-xl p-6 border border-gray-200 mt-2">
                        <div class="flex flex-row gap-3">
                            <h3 class="text-lg font-semibold text-gray-800 text-nowrap mb-4 flex items-center pb-2 mt-1">
                                <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                                دانلود فایل 
                            </h3>
                            @foreach ($practice->practiceMedia as $media)
                            @if(isset($media->media_path))
                            <a href="{{route('file_download' ,[$media->id])}}" title="دانلود فایل">
                                <svg  width="30" height="30" viewBox="0 0 24 24" fill="bg-blue-900" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 10V17C22 19.2091 20.2091 21 18 21H6C3.79086 21 2 19.2091 2 17V7C2 4.79086 3.79086 3 6 3H8.66667C9.53215 3 10.3743 3.28071 11.0667 3.8L12.9333 5.2C13.6257 5.71929 14.4679 6 15.3333 6H18C20.2091 6 22 7.79086 22 10ZM11.1161 14.0555C11.1586 14.098 11.2033 14.1368 11.25 14.1718V10.0001C11.25 9.58584 11.5858 9.25006 12 9.25006C12.4142 9.25006 12.75 9.58584 12.75 10.0001V14.1718C12.7967 14.1368 12.8414 14.098 12.8839 14.0555L14.4697 12.4697C14.7626 12.1768 15.2374 12.1768 15.5303 12.4697C15.8232 12.7626 15.8232 13.2375 15.5303 13.5304L13.9445 15.1162C12.8706 16.1901 11.1294 16.1901 10.0555 15.1162L8.46967 13.5304C8.17678 13.2375 8.17678 12.7626 8.46967 12.4697C8.76256 12.1768 9.23744 12.1768 9.53033 12.4697L11.1161 14.0555Z" fill="#28303F"/>
                                </svg>
                            </a>
                                {{-- <img src="<?//=asset('storage/' . $media->media_path)?>"> --}}
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- اطلاعات تکمیلی -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-blue-100 rounded-xl p-4 border border-blue-200">
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
