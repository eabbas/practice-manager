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
</head>
<body class="min-h-screen py-8 px-4 font-vazir">
    <div class="max-w-7xl mx-auto">
        <!-- هدر -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#023e83] mb-2">لیست تمرین‌ها</h1>
                <p class="text-gray-600 mt-3">مدیریت و مشاهده تمام تمرین‌های سیستم</p>
            </div>
        </div>

        <!-- آمار و اطلاعات -->
       <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-5">

    <!-- کارت 1 -->
    <div class="bg-white rounded-2xl p-3 md:p-6 shadow-lg border-l-4 border-[#023e83]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-xs md:text-sm">کل تمارین</p>
                <p class="font-bold text-lg md:text-2xl text-gray-800 mt-1">
                    {{ count($practiceWithLessons) }}
                </p>
            </div>

            <div class="bg-blue-50 p-2 md:p-3 rounded-xl">
                <i class="fas fa-book text-[#023e83] text-lg md:text-xl"></i>
            </div>
        </div>
    </div>

    <!-- کارت 2 -->
    <div class="bg-white rounded-2xl p-3 md:p-6 shadow-lg border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-xs md:text-sm">تمارین فعال</p>
                <p class="font-bold text-lg md:text-2xl text-gray-800 mt-1">0</p>
            </div>

            <div class="bg-green-50 p-2 md:p-3 rounded-xl">
                <i class="fas fa-check-circle text-green-500 text-lg md:text-xl"></i>
            </div>
        </div>
    </div>

</div>


        <!-- جدول دروس -->
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <!-- هدر -->
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-list ml-2 text-[#023e83]"></i>
                تمام تمارین
            </h2>

            <div class="flex items-center space-x-4 space-x-reverse mt-3 md:mt-0 ml-10">
                <div class="relative">
                    <input type="text" placeholder="  جستجوی تمرین..."
                           class="px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
                    <i class="fas fa-search absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 mt-2"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- جدول -->
    <!-- 👇 تغییر مهم اینجاست -->
    <div class="overflow-x-auto relative overflow-visible">

        <table class="w-full">
            <thead>
            <tr class="bg-gray-100 border-b border-gray-200">
                <th class="px-4 md:px-6 py-3 text-right text-sm font-semibold text-gray-700">عنوان تمرین</th>
                <th class="px-4 md:px-6 py-3 text-right text-sm font-semibold text-gray-700 text-nowrap">عنوان درس</th>

                <th class="hidden md:table-cell px-6 py-4 text-right text-sm font-semibold text-gray-700">استاد</th>

                <th class="hidden md:table-cell px-6 py-4 text-right text-sm font-semibold text-gray-700">
                    مشاهده پاسخ ها
                </th>

                <th class="hidden md:table-cell px-4 py-4 text-right text-sm font-semibold text-gray-700">
                    عملیات
                </th>

                <th class="md:hidden px-4 py-3 text-right text-sm font-semibold text-gray-700">
                    بیشتر
                </th>
            </tr>
            </thead>

            <tbody id="practiceTable" class="divide-y divide-gray-200">


            @foreach($practiceWithLessons as $practice)

                <tr>

                    <td class="px-4 md:px-6 py-3">
                        <div class="flex items-center">
                            <div class="bg-blue-50 p-2 rounded-lg ml-3">
                                <div class="bg-blue-50 p-1rounded-lg ml-3 text-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-3 size-6">
                            <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>
                </div>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $practice->title }}
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $practice->description }}
                                </p>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 md:px-6 py-3">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-purple-500 rounded-full ml-2"></div>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $practice->lesson->title }}
                            </p>
                        </div>
                    </td>

                    <td class="hidden md:table-cell px-6 py-4">
                        {{ Auth::user()->name }} {{Auth::user()->family}}
                    </td>

                    <td class="hidden md:table-cell px-6 py-4">
                        <a href="{{route('response_list' ,[$practice->id])}}"
                           class="bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-3 rounded-xl shadow">
                            پاسخ ها
                        </a>
                    </td>

                    <td class="hidden md:table-cell px-6 py-4">
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <a href="{{ route('practice_edit', [$practice]) }}" class="text-blue-600">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="{{ route('practice_show', [$practice]) }}" class="text-green-600">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('practice_delete', [$practice]) }}" class="text-red-600">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>

                    <!-- 👇 اینجا هم تغییر مهم -->
                    <td class="md:hidden px-4 py-3 relative overflow-visible">

                        <button
                            onclick="toggleMoreMenu('menu-{{ $practice->id }}')">
                            <i class="fas fa-ellipsis-h"></i>

                        </button>

                        <div id="menu-{{ $practice->id }}"
                             class="hidden absolute right-0 top-10 w-44 bg-white border shadow-lg rounded-xl z-50">

                            <a href="{{route('response_list' ,[$practice->id])}}"
                               class="block px-3 py-2 hover:bg-slate-100">
                                پاسخ ها
                            </a>

                            <a href="{{ route('practice_edit', [$practice]) }}"
                               class="block px-3 py-2 hover:bg-slate-100 flex items-center gap-2">
                                <i class="fas fa-edit text-blue-600"></i> ویرایش
                            </a>

                            <a href="{{ route('practice_show', [$practice]) }}"
                               class="block px-3 py-2 hover:bg-slate-100 flex items-center gap-2">
                                <i class="fas fa-eye text-green-600"></i> مشاهده
                            </a>

                            <a href="{{ route('practice_delete', [$practice]) }}"
                               class="block px-3 py-2 hover:bg-slate-100 flex items-center gap-2">
                                <i class="fas fa-trash text-red-600"></i> حذف
                            </a>

                        </div>

                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>
        <div class="mt-6 mb-3 ml-2 flex justify-end ">
         {{$pageNet->links()}}
        </div>
    </div>

</div>
<script>
    function toggleMoreMenu(id) {
        document.querySelectorAll('[id^="menu-"]').forEach(m => {
            if (m.id !== id) m.classList.add('hidden');
        });

        document.getElementById(id).classList.toggle('hidden');
    }

    document.addEventListener("click", (e) => {
        if (!e.target.closest('[id^="menu-"]') && !e.target.closest('button')) {
            document.querySelectorAll('[id^="menu-"]').forEach(m => m.classList.add('hidden'));
        }
    });
</script>


          

    <script>



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