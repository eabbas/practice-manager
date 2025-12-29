
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
<body class="min-h-screen py-8 px-2 font-vazir">
    <div class="max-w-7xl mx-auto ml-30">
        <!-- هدر -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-5">
            <div>
                <h1 class="text-3xl font-bold text-[#023e83] mb-3">لیست دروس</h1>
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
       <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-5">

    <!-- کارت 1 -->
    <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg border-l-4 border-[#023e83]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-xs md:text-sm">کل دروس</p>
                <p class="text-lg md:text-2xl font-bold text-gray-800 mt-1">
                    {{ count($lessons) }}
                </p>
            </div>

            <div class="bg-blue-50 p-2 md:p-3 rounded-xl">
                <i class="fas fa-book text-[#023e83] text-lg md:text-xl"></i>
            </div>
        </div>
    </div>

    <!-- کارت 2 -->
    <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-xs md:text-sm">دروس فعال</p>
                <p class="text-lg md:text-2xl font-bold text-gray-800 mt-1"> 
                {{$count}}
                </p>
            </div>

            <div class="bg-green-50 p-2 md:p-3 rounded-xl">
                <i class="fas fa-check-circle text-green-500 text-lg md:text-xl"></i>
            </div>
        </div>
    </div>

    <!-- کارت 3 -->
    <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg border-l-4 border-orange-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-xs md:text-sm">گروه‌های درسی</p>
                <p class="text-lg md:text-2xl font-bold text-gray-800 mt-1">1</p>
            </div>

            <div class="bg-orange-50 p-2 md:p-3 rounded-xl">
                <i class="fas fa-layer-group text-orange-500 text-lg md:text-xl"></i>
            </div>
        </div>
    </div>

</div>


        <!-- جدول دروس -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- هدر جدول -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex flex-col gap-3">
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-list ml-2 text-[#023e83]"></i>
                            تمام دروس
                        </h2>
                        {{-- @if (count($lessons)) --}}
                        <form action="{{route('delete_all')}}" method="POST">
                            @csrf
                            <span class="flex flex-row-1 gap-2">
                            <input type="checkbox" id="checkAll" onchange="selectAll(this)"><label class="mt-1" for="check">انتخاب همه</label>
                            <button type="submit" class="px-2 py-1 bg-slate-200 rounded-lg text-slate-700">
                            حذف
                           </button>
                    </span>
                    </div>
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
            <th></th>
            <!-- عنوان درس -->
            <th class="px-2 py-2 sm:px-6 sm:py-4 text-right text-sm font-semibold text-gray-700">
                عنوان درس
            </th>

            <th class="px-2 py-2 sm:px-6 sm:py-4 text-right text-sm font-semibold text-gray-700">
                 وضعیت درس 
            </th>

            <!-- استاد — در موبایل مخفی -->
            <th class="hidden sm:table-cell px-2 py-2 sm:px-6 sm:py-4 text-right text-sm font-semibold text-gray-700">
                استاد
            </th>

             <th class="hidden md:table-cell px-4 py-4 text-right text-sm font-semibold text-gray-700">
                    عملیات
                </th>
                
            <th class="md:hidden px-5 py-3 text-right pr-1 text-sm font-semibold text-gray-700 ">
                    بیشتر
                </th>
        </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">

        @foreach($lessons as $lesson)
        <tr>
        {{-- {{count($lesson->active) == 0}} --}}
            <!-- عنوان درس -->
            <td>
              <div class="py-1 px-2 whitespace-nowrap flex items-center justify-center h-full">
                 <input type="checkbox" class="user" name="lessons[]" value="{{$lesson->id}}">
                 </div>
            </td>
            <td class="px-2 py-2 sm:px-3 sm:py-4">
                <div class="flex items-center">
                    <div class="bg-blue-50 p-2 rounded-lg ml-3">
                        <i class="fas fa-calculator text-[#023e83]"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="font-medium text-gray-900 truncate">
                            {{ $lesson->title }}
                        </p>

                        <p class="text-xs sm:text-sm text-gray-500 mt-1 truncate">
                            {{ $lesson->description }}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-4 md:px-6 py-3">
                <div class="flex items-center">
                     @if ($lesson->active == 0)
                     <div class="w-3 h-3 bg-green-500 rounded-full ml-2"></div>
                        <p class="text-sm text-gray-500 mt-1">
                          فعال
                        </p>
                    </div>     
                    @elseif($lesson->active == 1)
                    <div class="w-3 h-3 bg-red-500 rounded-full ml-2"></div>
                        <p class="text-sm text-gray-500 mt-1 text-nowrap">
                          غیر فعال
                        </p>
                    </div> 
                    @endif   
            </td>
            <!-- استاد — فقط دسکتاپ -->
            <td class="hidden sm:table-cell px-2 py-2 sm:px-6 sm:py-2">
                <span class="text-gray-700 text-nowrap">
                    {{ Auth::user()->name }} {{ Auth::user()->family }}
                </span>
            </td>

            <!-- عملیات -->
            <td class="px-2 py-2 sm:px-6 sm:py-4">

                <!-- دسکتاپ -->
                <div class="hidden md:flex items-center gap-4">

                    <a href="{{ route('lesson_edit', [$lesson]) }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="{{ route('lesson_show', [$lesson]) }}" class="text-green-600 hover:text-green-800">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('lesson_delete', [$lesson]) }}" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </a>

                    <a href="{{ route('practice_create', [$lesson->id]) }}"
                       class="bg-[#023e83] hover:bg-[#022e6b] text-white text-nowrap px-4 py-2 rounded-xl shadow mr-10">
                        ایجاد تمرین
                    </a>

                    <a href="{{ route('practice_list', [$lesson->id]) }}"
                       class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-2 rounded-xl shadow">
                        تمرینات
                    </a>

                    <button onclick="copyText({{ $lesson->id }})"
                            class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-2 rounded-xl shadow flex items-center gap-2">
                        <i class="fas fa-paper-plane"></i>
                        ارسال
                    </button>

                    <a href="{{ url('/request/list/'.$lesson->id) }}"
                       class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-2 rounded-xl shadow">
                        درخواست‌ها
                    </a>

                </div>

                <!-- موبایل — دکمه بیشتر -->
                <div class="md:hidden relative inline-block">
                    <button
                        onclick="toggleMoreMenu({{ $lesson->id }})">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>

                    <!-- منوی موبایل -->
                    <div id="moreMenu-{{ $lesson->id }}"
                            class="absolute left-0 top-10 w-44 bg-white border border-gray-200 rounded-2xl shadow-xl p-2 hidden z-50">

                            <!-- عملیات (ویرایش / مشاهده / حذف) -->
                            <div class="flex items-center justify-between px-2 py-2 mb-2 border-b">
                                <a href="{{ route('lesson_edit', [$lesson]) }}" class="text-blue-600" title="ویرایش">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{ route('lesson_show', [$lesson]) }}" class="text-green-600" title="مشاهده">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('lesson_delete', [$lesson]) }}" class="text-red-600" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>

                            <a href="{{ route('practice_create', [$lesson->id]) }}"
                            class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                                ایجاد تمرین
                            </a>

                            <a href="{{ route('practice_list', [$lesson->id]) }}"
                            class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                                تمرینات
                            </a>

                            <button
                                onclick="copyText({{ $lesson->id }})"
                                class="w-full text-right px-3 py-2 rounded-lg hover:bg-slate-100 flex items-center gap-2">
                                <i class="fas fa-paper-plane text-slate-600"></i>
                                ارسال
                            </button>

                            <a href="{{ url('/request/list/'.$lesson->id) }}"
                            class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                                درخواست‌ها
                            </a>

                        </div>

                </div>
            </td>
        </tr>
        {{-- @endif --}}
        @endforeach
        </form>
        </tbody>
        </table>
    </div>

            <script>
            function toggleMoreMenu(id) {
                document.querySelectorAll('[id^="moreMenu-"]').forEach(m => m.classList.add('hidden'));
                document.getElementById('moreMenu-' + id).classList.toggle('hidden');
            }

            document.addEventListener("click", (e) => {
                if (!e.target.closest('[id^="moreMenu-"]') && !e.target.closest("button")) {
                    document.querySelectorAll('[id^="moreMenu-"]').forEach(m => m.classList.add('hidden'));
                }
            });
            </script>


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
    <script src="{{asset('assets/js/checkAll.js')}}"></script>
@endsection