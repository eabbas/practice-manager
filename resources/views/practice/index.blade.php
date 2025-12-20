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
                <p class="text-gray-600">مدیریت و مشاهده تمام تمرین‌های سیستم</p>
            </div>
        </div>

        <!-- آمار و اطلاعات -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-[#023e83]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">کل تمارین</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ count($practiceWithLessons) }}</p>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-xl">
                        <i class="fas fa-book text-[#023e83] text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">تمارین فعال</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">0</p>
                    </div>
                    <div class="bg-green-50 p-3 rounded-xl">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                </div>
            </div>
            </div>
            
            <!-- <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">اساتید</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">۸</p>
                    </div>
                    <div class="bg-purple-50 p-3 rounded-xl">
                        <i class="fas fa-user-tie text-purple-500 text-xl"></i>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- جدول دروس -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- هدر جدول -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-list ml-2 text-[#023e83]"></i>
                        تمام تمارین
                    </h2>
                    
                    <div class="flex items-center space-x-4 space-x-reverse mt-3 md:mt-0">
                        <div class="relative">
                            <input type="text" placeholder="جستجو در تمارین..." 
                                   class="px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
                            <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        
                        <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
                            <option> درس ها</option>
                            <option>ریاضی</option>
                            <option>علوم</option>
                            <option>ادبیات</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- بدنه جدول -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عنوان تمرین</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عنوان درس</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">استاد</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">مشاهده پاسخ ها</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                         @foreach($practiceWithLessons as $practice)
                        <tr class="table-row">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-50 p-2 rounded-lg ml-3">
                                        <i class="fas fa-calculator text-[#023e83]"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 mt-1">{{ $practice->title }}</p>
                                        <p class="text-sm text-gray-500 mt-1">{{$practice->description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-purple-500 rounded-full flex items-center justify-center text-white text-sm font-medium ml-2">
                                    </div>
                                    <div>
                                         <p class="text-sm text-gray-500 mt-1">{{ $practice->lesson->title }}</p>
                                    </div>
                                </div>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-purple-500 rounded-full flex items-center justify-center text-white text-sm font-medium ml-2">
    
                                    </div>
                                    <span class="text-gray-700">{{ Auth::user()->name }} {{Auth::user()->family}}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                         <a href="{{route('response_list' ,[$practice->id])}}" class="mt-2 md:mt-0 bg-[#023e83] hover:bg-[#022e6b] text-white px-4 py-3 rounded-xl transition duration-200 shadow-md font-medium flex items-center mb-[15px] ml-2">
                                                 پاسخ ها 
                                            </a>
                                        </div>
                                </div>
                            </td>
                           
                            <td class="px-6 py-4 flex flex-row items-center ml-4 mt-3">
                                <div class="flex items-center space-x-3 space-x-reverse">
                                    <a href="{{ route('practice_edit', [$practice]) }}" class="text-blue-600 hover:text-blue-800 transition duration-200" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('practice_show', [$practice]) }}" class="text-green-600 hover:text-green-800 transition duration-200" title="مشاهده">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('practice_delete', [$practice]) }}" class="text-red-600 hover:text-red-800 transition duration-200" title="حذف">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                   
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







{{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- هدر صفحه -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">لیست تمرین‌ها</h1>
            <p class="text-gray-600">مدیریت و مشاهده تمام تمرین‌ها</p>
        </div>
    </div>

    <!-- جدول تمرین‌ها -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <!-- هدر جدول -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">تمامی تمرین‌ها ({{ $practiceWithLessons->count() }})</h2>
        </div>

        <!-- بدنه جدول -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عنوان</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">توضیحات</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">نام درس</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عملیات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($practiceWithLessons as $practice)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-800 rounded-lg text-sm font-medium">
                                {{ $practice->id }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-medium text-gray-900">{{ $practice->title }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-600 text-sm max-w-xs truncate">
                                {{ $practice->description ?? 'بدون توضیحات' }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                @if(isset($practice->lessons))
                                    {{ $practice->lessons->title }}
                                @else
                                    بدون درس
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <a href="{{ url('/practice/show/' . $practice->id) }}" 
                                   class="text-green-600 hover:text-green-800 transition duration-200 p-2 hover:bg-green-50 rounded-lg"
                                   title="مشاهده">
                                    مشاهده
                                </a>
                                <a href="{{ url('/practice/edit/' . $practice->id) }}" 
                                   class="text-blue-600 hover:text-blue-800 transition duration-200 p-2 hover:bg-blue-50 rounded-lg"
                                   title="ویرایش">
                                   ویرایش
                                </a>
                                <a href="{{ url('/practice/delete/' . $practice->id) }}" 
                                   class="text-red-600 hover:text-red-800 transition duration-200 p-2 hover:bg-red-50 rounded-lg"
                                   title="حذف"
                                   onclick="return confirm('آیا از حذف این تمرین اطمینان دارید؟')">
                                    حذف
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- پیام خالی -->
        @if($practiceWithLessons->count() == 0)
        <div class="text-center py-12">
            <i class="fas fa-tasks text-4xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">هیچ تمرینی یافت نشد</p>
            <a href="{{ url('practice/create') }}" 
               class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">
                ایجاد اولین تمرین
            </a>
        </div>
        @endif
    </div>
</div> --}}
@endsection