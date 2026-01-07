    @extends('users.dashboard')
    @section('title', 'پروفایل کاربری')
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
            background-color: #04264e;
            border-color: #04264e;
        }
    </style>
    <body class="min-h-screen bg-white flex items-center justify-center p-4 sm:p-6">

    <div class="max-w-3xl w-full bg-blue-900 backdrop-blur-4xl shadow-2xl mx-auto rounded-3xl p-5 sm:p-8 border border-white/20 ">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 border-b border-white/20 pb-6">

            <!-- Profile Image -->
            <div class="w-24 h-24 sm:w-30 sm:h-30 mx-auto sm:mx-0 rounded-full overflow-hidden shadow-lg border-2 border-white/40">
                <svg class="w-full h-full object-cover" fill="oklch(97% 0.014 254.604)"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z"
                          clip-rule="evenodd"/>
                    <path d="M6 17.815c0-.516.386-.953.9-1.01 3.857-.427 6.36-.389 10.209.01a.995.995 0 0 1 .554 1.736c-4.542 3.959-7.139 3.904-11.343.003a1.01 1.01 0 0 1-.32-.739Z"/>
                    <path fill-rule="evenodd"
                          d="M17.058 17.312c-3.819-.395-6.286-.433-10.103-.01a.514.514 0 0 0-.295.886c2.084 1.933 3.663 2.806 5.207 2.812 1.548.006 3.213-.86 5.468-2.826a.495.495 0 0 0-.277-.862Z"
                          clip-rule="evenodd"/>
                    <path d="M16 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
                </svg>
            </div>

            <!-- Basic Info -->
            <div class="flex-1 text-white text-center sm:text-right">
                <h2 class="text-xl sm:text-2xl font-extrabold">
                    {{ $user->name }} {{ $user->family }}
                </h2>

                <p class="mt-1 text-sm sm:text-base">
                    <span class="font-semibold text-gray-300">نقش:</span>
                    {{ Auth::user()->roles[0]->title }}
                </p>

                <p class="mt-1 text-sm sm:text-base">
                    <span class="font-semibold text-gray-300">وضعیت:</span>
                    فعال
                </p>
            </div>

            <!-- Edit Button -->
            <a href="{{ route('user.edit_profile') }}"
               class="w-full sm:w-auto text-center px-5 py-2 bg-blue-800/90 text-white rounded-xl hover:bg-blue-600 transition shadow-lg">
                ویرایش پروفایل
            </a>
        </div>

        <!-- Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mt-6 sm:mt-8">

            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">نام و نام خانوادگی</p>
                <p class="text-base sm:text-lg font-semibold mt-1">
                    {{ $user->name }} {{ $user->family }}
                </p>
            </div>

            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">
                    {{ Auth::user()->roles[0]->title == 'استاد' ? 'گروه درسی' : 'رشته تحصیلی' }}
                </p>
                <p class="text-base sm:text-lg font-semibold mt-1">
                    {{ $user->collage }}
                </p>
            </div>

            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">
                    {{ Auth::user()->roles[0]->title == 'استاد' ? 'شماره پرسنلی' : 'شماره دانشجویی' }}
                </p>
                <p class="text-base sm:text-lg font-semibold mt-1">
                    {{ $user->code }}
                </p>
            </div>

            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">شماره تماس</p>
                <p class="text-base sm:text-lg font-semibold mt-1">
                    {{ $user->phone }}
                </p>
            </div>

            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">ایمیل</p>
                <p class="text-base sm:text-lg font-semibold mt-1 break-all">
                    {{ $user->email }}
                </p>
            </div>

            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">تاریخ عضویت</p>
                <p class="text-base sm:text-lg font-semibold mt-1">

                    {{jdate($user->created_at)->format('Y/m/d')}}
                </p>
            </div>

        </div>
    </div>

</body>

    @endsection