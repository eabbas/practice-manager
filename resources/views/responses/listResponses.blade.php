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


        <!-- جستجو -->
        

        <!-- جدول -->
        <div class="overflow-x-auto border border-slate-200 rounded-lg">
            <table class="w-full text-right min-w-[600px] sm:min-w-full">
                <thead class="bg-slate-50 text-slate-600 text-sm">
                    <tr>
                      
                        <th class="py-3 px-2 sm:px-4"> نام درس</th>
                        <th class="py-3 px-2 sm:px-4 "  >نام تمرین  </th>
                        <th class="py-3 px-2 sm:px-4 text-center">مشاهده پاسخ ها</th>
                    </tr>
                </thead>

                <tbody class="text-sm space-x-4">
                     @foreach($user->masterLessons as $lesson)
                     @foreach($lesson->practices as $practice)
                    <tr class="hover:bg-slate-50">
                        <td class="py-2 sm:py-3 px-2 sm:px-4">{{$lesson->title}}</td>
                        <td class="py-2 sm:py-3 px-2 sm:px-4">
                                {{$practice->title}}
                          
                          
                        </td>
                        <td class="py-2 sm:py-3 px-2 sm:px-4 text-center">
                            <a href="{{route('response_list' ,[$practice->id])}}"
                               class="px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50 inline-block" >
                                مشاهده پاسخ ها
                            </a>
                        </td>
                    </tr>
                    @endforeach
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
@endsection