@extends('users.dashboard')
@section('title', 'create lesson')
@section('content')
   <?php //dd(Auth::user()->id);?>
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
            <h1 class="text-3xl font-bold text-[#023e83] mt-5"> ویرایش  پروفایل</h1>
            <p class="text-gray-600 text-lg">اطلاعات خود را ویرایش وارد کنید</p>
        </div>

        <!-- فرم اصلی -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ route('user.update') }}" method="POST" class="p-8">
                @csrf
                <input type="hidden" name="master_id" value="{{Auth::user()->id}}">
                <!-- اطلاعات اصلی درس -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-3">
                        <i class="fas fa-book ml-3 text-[#023e83]"></i>
                        اطلاعات  کاربر
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- عنوان کاربر -->
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-3 flex items-center gap-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 ">
                                    <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                                 نام   
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="name" name="name" value="{{Auth::user()->name}}" required 
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50"
                                       placeholder=" نام خود را وارد کنید">
                                <i class="fas fa-pen absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div>
                            <label for="family" class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 ">
                                    <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                                   نام خانوادگی
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="family" name="family" value="{{Auth::user()->family}}" required 
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50"
                                       placeholder="   نام خانوادگی خود را وارد کنید">
                                <i class="fas fa-pen absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div>
                            <label for="collage" class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 ">
                                    <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                                   @if(Auth::user()->roles[0]->title=="استاد")
                                    گروه درسی
                                    @elseif(Auth::user()->roles[0]->title=="دانشجو")
                                    رشته تحصیلی
                                    @endif
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="collage" name="collage" value="{{Auth::user()->collage}}" required 
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50"
                                       placeholder="گروه درسی خود را وارد کنید">
                                <i class="fas fa-pen absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div>
                            <label for="code" class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 ">
                                    <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                                   @if(Auth::user()->roles[0]->title=="استاد")
                                    شماره پرسنلی
                                    @elseif(Auth::user()->roles[0]->title=="دانشجو")
                                    شماره دانشجویی
                                    @endif
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                               <input
                                    type="text"
                                    name="code"
                                    id="code"
                                    value="{{ Auth::user()->code }}"
                                    required
                                    inputmode="numeric"
                                    pattern="[0-9]{11}"
                                    minlength="11"
                                    maxlength="11"
                                    class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50
                                        focus:ring-2 focus:ring-[#023e83]/30 focus:border-[#023e83]"
                                    placeholder="شماره  پرسنلی خود را وارد کنید">


                                <i class="fas fa-pen absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 ">
                                    <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                                    شماره تلفن
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                               <input
                                type="text"
                                name="phone"
                                id="phone"
                                value="{{ Auth::user()->phone }}"
                                required
                                inputmode="numeric"
                                pattern="[0-9]{11}"
                                minlength="11"
                                maxlength="11"
                                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50
                                    focus:ring-2 focus:ring-[#023e83]/30 focus:border-[#023e83]"
                                placeholder="شماره تلفن خود را وارد کنید">


                                <i class="fas fa-pen absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 ">
                                    <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                                    ایمیل 
                                <span class="text-red-500 mr-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="email" name="email" value="{{Auth::user()->email}}" required 
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl input-focus transition duration-200 bg-gray-50"
                                       placeholder="ایمیل خود را وارد کنید">
                                <i class="fas fa-pen absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
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
                this.parentElement.classList.add('ring-0', 'ring-blue-100', 'border-xl-[#023e83]');
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-0', 'ring-blue-100', 'border-xl-[#023e83]');
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