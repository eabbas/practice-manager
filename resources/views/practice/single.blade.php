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
                    vazir: ['Vazirmatn', 'sans-serif'],
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
    .prose { line-height: 1.8; }
</style>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-9 py-3">

    <!-- هدر -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-[#023e83] mb-2">
                {{ $practice->title }}
            </h1>
            <div class="flex items-center space-x-4 space-x-reverse text-gray-600">
                <span class="flex items-center">
                    <i class="fas fa-layer-group ml-1 text-[#023e83]"></i>
                    نام درس : {{ $practice->lesson->title }}
                </span>
            </div>
        </div>
    </div>

    <!-- کارت اصلی -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">

        <!-- هدر کارت -->
        <div class="bg-blue-900 p-6 text-white">
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

        <!-- محتوا -->
        <div class="p-6">

            <!-- عنوان تمرین + دکمه -->
            <div class="flex flex-row max-md:flex-col max-md:gap-3 justify-around">

                <div class="w-[300px] max-md:w-full ml-4 max-md:ml-0
                            bg-gray-50 rounded-xl p-6 border mb-3 text-center">
                    <h3 class="font-bold text-xl">
                        {{ $practice->title }}
                    </h3>
                </div>

                @if(Auth::user()->roles[0]->title=="استاد")
                <a href="{{ route('response_list', [$practice->id]) }}"
                   class="w-[300px] max-md:w-full ml-4 max-md:ml-0
                          bg-gray-50 rounded-xl p-6 border mb-3 text-center font-bold
                          hover:bg-blue-200 transition">
                    مشاهده پاسخ ها
                </a>

                @elseif(Auth::user()->roles[0]->title=="دانشجو")
                <a href="{{ route('student_responses', [Auth::user()->id ,$practice->id ,$practice->master->id]) }}"
                    class="w-[300px] max-md:w-full ml-4 max-md:ml-0
                            bg-blue-600 text-white rounded-xl p-6 border mb-3 text-center font-bold
                            hover:bg-blue-700 shadow-lg transition">
                        ارسال پاسخ
                    </a>
                @endif

            </div>

            <!-- توضیحات تمرین -->
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center">
                <i class="fas fa-align-left ml-2 text-[#023e83]"></i>
                توضیحات تمرین
            </h3>

            <div class="bg-gray-50 rounded-xl p-6 border
                        h-[100px] max-md:h-auto overflow-y-auto">
                @if($practice->description)
                    <div class="prose text-gray-700">
                        {{ $practice->description }}
                    </div>
                @else
                    <div class="text-center text-gray-500 py-4">
                        توضیحاتی برای این تمرین ثبت نشده است
                    </div>
                @endif
            </div>

            <!-- مهلت + دانلود -->
            <div class="flex flex-row max-md:flex-col gap-3 mt-4">

                <div class="w-full h-[80px] max-md:h-auto
                            bg-gray-50 rounded-xl p-6 border flex items-center gap-3">
                    <span class="font-semibold">مهلت ارسال :</span>
                    {{ jdate($practice->deadLine)->format('Y/m/d') }}
                </div>

                <div class="w-full h-[80px] max-md:h-auto
                            bg-gray-50 rounded-xl p-6 border">
                    <div class="flex items-center gap-4 flex-wrap">
                        <span class="font-semibold">دانلود فایل :</span>

                        @foreach ($practice->practiceMedia as $media)
                            @if(isset($media->media_path))
                                <a href="{{ route('file_download', [$media->id]) }}"
   class="flex items-center gap-2 text-blue-700 hover:text-blue-900 transition"
   title="دانلود فایل">
    <i class="fas fa-download text-xl"></i>
    <span class="text-sm">دانلود</span>
</a>

                            @endif
                        @endforeach

                    </div>
                </div>

            </div>

            <!-- اطلاعات تکمیلی -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                <div class="bg-blue-100 rounded-xl p-4 border">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-layer-group ml-2 text-[#023e83]"></i>
                        <h4 class="font-semibold">درس</h4>
                    </div>
                    <p>{{ $practice->lesson->title }}</p>
                </div>

                <div class="bg-purple-50 rounded-xl p-4 border">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-user-tie ml-2 text-purple-600"></i>
                        <h4 class="font-semibold">استاد مربوطه</h4>
                    </div>
                    <p>{{ $practice->master->name }} {{ $practice->master->family }}</p>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
