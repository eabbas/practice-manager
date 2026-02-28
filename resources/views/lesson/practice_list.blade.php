
@extends('users.dashboard')
@section('title', 'single practice')
@section('content')


<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="{{asset("assets/js/tailwind.js")}}"></script>
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
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <style>
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.3s ease-out forwards;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>

<body class="bg-gray-100 px-4">

    <!-- عنوان -->
    <div class="max-w-4xl mx-auto mt-4">
        <h2 class="text-2xl sm:text-3xl font-bold text-blue-900 flex items-center gap-2">
            <i class="fas fa-list text-[#023e83]"></i>
            لیست تمارین درس {{$lesson->title}}
        </h2>
    </div>

    <!-- لیست تمرین‌ها -->
    <div class="max-w-4xl mx-auto mt-8 space-y-6">

        @foreach ($lesson->practices as $practice)
        <div class="fade-in p-5 bg-white shadow-lg rounded-xl border border-blue-100
                    flex flex-col sm:flex-row sm:items-center gap-4
                    transition-all hover:scale-[1.003]">

            <!-- آیکون -->
           <div class="hidden sm:flex p-3 bg-blue-900 text-white rounded-lg text-2xl self-start sm:self-auto">
                📖
            </div>


            <!-- محتوا -->
            <div class="flex-1 space-y-2">
                <h3 class="text-lg sm:text-xl font-semibold text-blue-900">
                    {{$practice->title}}: {{$practice->description}}
                </h3>
                <p class="text-gray-600 text-sm">
                    مهلت تحویل: {{jdate($practice->deadLine)->format('Y/m/y')}}
                </p>
            </div>

            <!-- دکمه‌ها -->
            <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                @if(Auth::user()->roles[0]->title=="استاد")
                    <a href="{{route('response_list' ,[$practice->id])}}"
                       class="px-3 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition text-center">
                          مشاهده پاسخ ها
                    </a>
                @elseif(Auth::user()->roles[0]->title=="دانشجو")
                    <a href="{{route('student_responses' , [Auth::user()->id ,$practice->id ,$practice->master->id ])}}"
                       class="px-3 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition text-center">
                        ارسال پاسخ  
                    </a>
                @endif

                <a href="{{route('practice_show',[$practice->id])}}"
                   class="px-3 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition text-center">
                    مشاهده تمرین
                </a>
            </div>
        </div>
        @endforeach

        <!-- پیام عدم وجود تمرین -->
        @if (count($lesson->practices) == "0")
            <p class="text-center text-slate-500 mt-10">
                تمرینی برای این درس وجود ندارد.
            </p>
        @endif

    </div>

</body>
</html>

@endsection

