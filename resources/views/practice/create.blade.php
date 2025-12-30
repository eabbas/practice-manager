
@extends('users.dashboard')
@section('title', 'practice create')
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
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(2, 62, 131, 0.1);
            border-color: #023e83;
        }
        
        .checkbox-custom:checked {
            background-color: #023e83;
            border-color: #023e83;
        }
    </style>
</head>
<body class="min-h-screen py-8 px-4 font-vazir">
    <div class="max-w-4xl mx-auto">
        <!-- هدر -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-[#023e83] mt-5">ایجاد تمرین جدید</h1>
            <p class="text-gray-600 text-lg">اطلاعات تمرین جدید را وارد کنید</p>
        </div>

        <!-- فرم اصلی -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ url('practice/store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <input type="hidden" name="master_id" value="{{ Auth::id() }}">
                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                <!-- اطلاعات اصلی تمرین -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-3">
                        <i class="fas fa-book ml-3 text-[#023e83]"></i>
                        اطلاعات اصلی تمرین
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- عنوان تمرین -->
                        <div>
                            <label for="title" class="block text-gray-700 font-medium mb-3 flex items-center">
                                <i class="fas fa-heading ml-2 text-[#023e83] text-sm"></i>
                                عنوان تمرین
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="title" name="title" required 
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50"
                                       placeholder="عنوان تمرین را وارد کنید">
                                <i class="fas fa-pen absolute right-4 mt-8 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div>
                            <label for="deadLine" class="block text-gray-700 font-medium mb-3 flex items-center">
                                <i class="fas fa-heading ml-2 text-[#023e83] text-sm"></i>
                                 مهلت تحویل تمرین
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="date" id="deadLine" name="deadLine" required  value="{{$lesson->practices}}"
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50">
                                <i class="fas fa-pen absolute right-4 mt-8 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- توضیحات تمرین -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-3">
                        <i class="fas fa-align-left ml-3 text-[#023e83]"></i>
                        توضیحات تمرین
                    </h2>
                    
                    <div>
                        <label for="description" class="block text-gray-700 font-medium mb-3 flex items-center">
                            <i class="fas fa-file-alt ml-2 text-[#023e83] text-sm"></i>
                            توضیحات کامل
                        </label>
                        <div class="relative">
                            <textarea id="description" name="description" rows="5"
                                   class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50"
                                   placeholder="توضیحات کامل درباره تمرین، اهداف آموزشی، پیش‌نیازها و ..."></textarea>
                            <i class="fas fa-edit absolute right-4 top-4 text-gray-400"></i>
                            <div class="flex flex-row sm:flex-row gap-4 justify-start pt-6 border-t border-gray-200"> 
                                <label class="block text-gray-700 font-semibold mt-5"> انتخاب فایل:</label>    
                                <input type="file" class="border border-gray-300 rounded-lg px-3 py-2 w-55 focus:outline-none focus:ring-2 focus:ring-primary mt-3 bg-gray-50 cursor-pointer" value="" name="file[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- دکمه‌های فرم -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end pt-6 border-t border-gray-200">
                    <button type="submit" 
                            class="px-8 py-3 bg-[#023e83] hover:bg-[#022e6b] text-white rounded-xl transition duration-200 shadow-md font-medium flex items-center justify-center order-1 sm:order-2">
                        <i class="fas fa-save ml-2"></i>
                         ذخیره
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        // مدیریت رویدادهای فیلدها
        document.querySelectorAll('input, select, textarea').forEach(element => {
            element.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-blue-100', 'border-[#023e83]');
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-100', 'border-[#023e83]');
            });
        });

        // اعتبارسنجی فرم
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const lessonGroup = document.getElementById('lesson_group').value;
            const masterId = document.getElementById('master_id').value;
            
            if (!title || !lessonGroup || !masterId) {
                e.preventDefault();
                alert('لطفا فیلدهای ضروری را پر کنید');
                return false;
            }
        });
    </script>
@endsection
