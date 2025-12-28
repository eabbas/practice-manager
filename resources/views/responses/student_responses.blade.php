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
            <h1 class="text-3xl font-bold text-[#023e83] mb-2">
                  عنوان درس : 
                {{ $practice->lesson->title}}</h1>
            <div class="flex items-center space-x-4 space-x-reverse text-gray-600">
                <span class="flex items-center">
                    <i class="fas fa-layer-group ml-1 text-[#023e83]"></i>
                    دانشجو : 
                    {{$student->name}} {{ $student->family }}
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
                        <h2 class="text-xl font-semibold">
                               عنوان تمرین : 
                            {{ $practice->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-6">
            <!-- توضیحات درس -->
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center border-b pb-2">
                    <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                    توضیحات تمرین
                </h3>
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 mb-3">
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
            <!-- توضیحات درس -->

            <!-- پاسخ ها    --> 
                @foreach ($responses as $response)
                    <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm mb-3">
                        @if($response->users->roles[0]->title == 'استاد')
                         استاد 
                      {{$master->name}} {{$master->family}} :
                        @else
                         
                     {{$student->name}} {{ $student->family }} :
                        @endif
                    </br>
                        
                        {{$response->text}}


                    </div>
                @endforeach
            </div>

            <div class="w-[800px] bg-white rounded-2xl p-6 border border-gray-200 shadow-sm mr-3 mb-4">
                <h3 class="text-xl font-semibold text-[#023e83] mb-4 flex items-center">
                    <i class="fas fa-upload ml-2"></i>
                    ارسال پاسخ 
                </h3>
                <form action="{{route('response_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        {{-- <label class="block text-gray-700 font-medium mb-2">فایل تمرین</label>
                        <input type="file" name="file" class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary"> --}}
                        <input type="hidden" name="practice_id" value="{{$practice->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <input type="hidden" name="student_id" value="{{$student->id}}">
                        <textarea name="text" id="response" cols="0" rows="1" class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary mt-4"></textarea>
                        <input type="file" class="border border-gray-300 rounded-lg px-3 py-2 w-70 focus:outline-none focus:ring-2 focus:ring-primary mt-4" name="file">
                    </div>
                    <button type="submit" 
                            class="bg-[#023e83] hover:bg-[#012b5a] text-white px-6 py-2 rounded-lg transition duration-200">
                        ارسال
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
