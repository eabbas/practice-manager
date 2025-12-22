
@extends('users.dashboard')
@section('title', 'lesson list')
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
</head>
<body class="min-h-screen py-8 px-4 font-vazir">
    <div class="max-w-7xl mx-auto">
        <!-- هدر -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#023e83] mb-2">لیست دروس</h1>
                <p class="text-gray-600">مدیریت و مشاهده تمام دروس سیستم</p>
            </div>
                        {{-- @if(Auth::user()->roles[0]->title=="استاد") --}}
                        <a href="{{ url('lesson/create') }}" 
                           class="mt-4 md:mt-0 bg-[#023e83] hover:bg-[#022e6b] text-white px-6 py-3 rounded-xl transition duration-200 shadow-md font-medium flex items-center">
                          <i class="fas fa-plus ml-2"></i>
                            ایجاد درس جدید
                        </a>
                        {{-- @endif --}}
        </div>

        <!-- آمار و اطلاعات -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-[#023e83]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">کل دروس</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ count($lessons) }}</p>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-xl">
                        <i class="fas fa-book text-[#023e83] text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">دروس فعال</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">0</p>
                    </div>
                    <div class="bg-green-50 p-3 rounded-xl">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-orange-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">گروه‌های درسی</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">1</p>
                    </div>
                    <div class="bg-orange-50 p-3 rounded-xl">
                        <i class="fas fa-layer-group text-orange-500 text-xl"></i>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- جدول دروس -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- هدر جدول -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-list ml-2 text-[#023e83]"></i>
                        تمام دروس
                    </h2>
                    
                    <div class="flex items-center space-x-4 space-x-reverse mt-3 md:mt-0 ml-10">
                        <div class="relative">
                            <input type="text" placeholder="جستجو در دروس..." 
                                   class="px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
                            <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- بدنه جدول -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عنوان درس</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">استاد</th>
                             {{-- @if(Auth::user()->roles[0]->title=="استاد") --}}
                             <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عملیات</th>
                            {{-- @endif --}}
                            {{-- @if(Auth::user()->roles[0]->title=="دانشجو") --}}
                             {{-- <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">مشاهده تمرینات</th> --}}
                            {{-- @endif --}}
        </div>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                         @foreach($lessons as $lesson)
                         <?php //dd($lessons); ?>
                        <tr class="table-row">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-50 p-2 rounded-lg ml-3">
                                        <i class="fas fa-calculator text-[#023e83]"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $lesson->title }}</p>
                                        <p class="text-sm text-gray-500 mt-1">{{ $lesson->description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-5 h-5 bg-purple-500 rounded-full flex items-center justify-center text-white text-sm font-medium ml-2">
                                     
                                    </div>
                                    <span class="text-gray-700">{{ Auth::user()->name }} {{Auth::user()->family}}</span>
                                </div>
                            </td>
                           
                            <td class="px-6 py-4 flex flex-row items-center gap-5 mt-3">
    <div class="flex items-center space-x-3 space-x-reverse">
        <!-- ویرایش -->
        <a href="{{ route('lesson_edit', [$lesson]) }}" class="text-blue-600 hover:text-blue-800 transition duration-200" title="ویرایش">
            <i class="fas fa-edit"></i>
        </a>
        <!-- مشاهده -->
        <a href="{{ route('lesson_show', [$lesson]) }}" class="text-green-600 hover:text-green-800 transition duration-200" title="مشاهده">
            <i class="fas fa-eye"></i>
        </a>
        <!-- حذف -->
        <a href="{{ route('lesson_delete', [$lesson]) }}" class="text-red-600 hover:text-red-800 transition duration-200" title="حذف">
            <i class="fas fa-trash"></i>
        </a>
    </div>

                <!-- اضافه کردن دکمه ارسال تمرین همراه با آیکون -->
                                    <div class="flex flex-row mr-10 gap-4 mb-[15px]">
                                        <div>
                                            {{-- @if(Auth::user()->roles[0]->title=="استاد") --}}
                                            <a href="{{ route('practice_create', [$lesson->id]) }}" class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-3 rounded-xl transition duration-200 shadow-md font-medium flex items-center" title="ایجاد تمرین">
                                                ایجاد تمرین
                                            </a>
                                            {{-- @endif --}}
                                        </div>
                                        <div>
                                            <a href="{{ route('practice_list', [$lesson->id]) }}" class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-3 rounded-xl transition duration-200 shadow-md font-medium flex items-center" title="تمرینات">
                                                تمرینات
                                            </a>
                                        </div>
                                        <!-- دکمه ارسال تمرین همراه با آیکون -->
                                        <div class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-3 rounded-xl transition duration-200 shadow-md font-medium flex items-center  pointer:coarse" title="ارسال درس" onclick="copyText({{$lesson->id}})">
                                                <i class="fas fa-paper-plane ml-2"></i> ارسال 
                                        </div>
                                        <div>
                                            <a href="{{url('/request/list/'.$lesson->id)}}" class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-3 rounded-xl transition duration-200 shadow-md font-medium flex items-center" title="مشاهده درخواست ها">
                                                درخواست ها
                                            </a>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- فوتر جدول -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-sm text-gray-600 mb-3 md:mb-0">
                        نمایش ۱ تا ۴ از ۲۴ مورد
                    </div>
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button class="px-3 py-1 bg-[#023e83] text-white rounded-lg">1</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-200">2</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-200">3</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    @isset($lesson)
    <script>
        function copyText(lessonId){
            let url = "{{url('/send/lesson/')}}" + "{{'/'}}" + lessonId
             navigator.clipboard.writeText(url)
        alert("لینک درس کپی شد")
        }
    </script>
    <?php //dd($lesson) ?>
    @endisset
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

        // فیلتر بر اساس گروه درسی
        const groupFilter = document.querySelector('select');
        groupFilter.addEventListener('change', function() {
            const selectedGroup = this.value;
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const groupCell = row.querySelector('td:nth-child(2)');
                if (selectedGroup === 'همه گروه‌ها' || groupCell.textContent.includes(selectedGroup)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // مدیریت hover روی ردیف‌ها
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.classList.add('shadow-md');
            });
            
            row.addEventListener('mouseleave', function() {
                this.classList.remove('shadow-md');
            });
        });
    </script>
@endsection