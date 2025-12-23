<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>

<body class="bg-gray-100">

<!-- overlay موبایل -->
<div id="overlay"
     class="fixed inset-0 bg-black/40 z-30 hidden lg:hidden"
     onclick="toggleMenu()"></div>

<div class="w-full flex flex-row">

    <!-- سایدبار -->
    <div id="sidebar"
        class="fixed lg:block right-0 top-0 z-40 h-dvh w-[265px]
        bg-[url('{{ asset('assets/img/bg.jpg') }}')]
        border border-white/15 shadow-2xl
        px-5 text-sm
        transform translate-x-full lg:translate-x-0
        transition-transform duration-500">

        @if(Auth::user()->roles[0]->title=="استاد")
            <h3 class="text-xl font-bold text-white text-center py-3 mt-3">داشبورد استاد</h3>
        @elseif(Auth::user()->roles[0]->title=="دانشجو")
            <h3 class="text-xl font-bold text-white text-center py-3 ">داشبورد دانشجو</h3>
        @endif

        <hr class="text-[darkslategray] mt-2.5">

        <div class="py-5 h-[80%] overflow-y-auto" style="scrollbar-width:none;">
            <ul class="flex flex-col gap-4 mt-2.5 mb-2.5 pr-3 text-white">
                <li class="flex items-center gap-2.5 mr-5"><span class="size-1 bg-white"></span>
                    <a href="{{ route('user.complete_profile') }}">تکمیل اطلاعات کاربری</a></li>

                <li class="flex items-center gap-2.5 mr-5"><span class="size-1 bg-white"></span>
                    <a href="{{ route('lesson_create') }}">تعریف درس جدید</a></li>

                <li class="flex items-center gap-2.5 mr-5"><span class="size-1 bg-white"></span>
                    <a href="{{ route('lesson_list') }}">دروس ارائه شده</a></li>

                <li class="flex items-center gap-2.5 mr-5"><span class="size-1 bg-white"></span>
                    <a href="{{ route('student_class') }}">دروس اخذ شده</a></li>

                <li class="flex items-center gap-2.5 mr-5"><span class="size-1 bg-white"></span>
                    <a href="{{ route('practices_list') }}">دسترسی به تمرینات</a></li>

                <li class="flex items-center gap-2.5 mr-5"><span class="size-1 bg-white"></span>
                    <a href="{{ route('my_requests') }}">درخواست‌های ثبت شده</a></li>
            </ul>
        </div>

        <div class="sm:hidden absolute bottom-4 right-0 w-full px-5">
            <a href="{{ route('user.logout') }}"
               class="flex items-center justify-center gap-2
                      w-full py-3 rounded-xl
                      bg-blue-900/90 hover:bg-blue-800/90 
                      text-white font-semibold transition">
                خروج از حساب کاربری
            </a>
        </div>
    </div>

    <!-- محتوا -->
    <div class="w-full">

        <!-- هدر (عین قبل – بدون تغییر) -->
        <div class="w-full fixed top-0 right-0 z-10">
            <div
                class="w-full float-end lg:w-[calc(100%-265px)] py-3
                flex flex-row-reverse px-5 backdrop-blur-sm shadowHeader relative z-20">

                <!-- همبرگر فقط موبایل -->
                {{-- <button onclick="toggleMenu()" class="lg:hidden ml-3 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button> --}}

                <!-- کد هدر خودت بدون تغییر -->
<div class="w-full flex flex-row justify-between">
    <div
        class="w-full flex flex-row-reverse justify-between items-center
        bg-white p-4 rounded-xl shadow mt-1">

        <!-- سمت راست: خوش آمدید + آواتار -->
        <div class="flex flex-row items-center gap-2">

            <!-- خوش آمدید -->
            <span
                class="font-semibold text-gray-700
                       text-sm sm:text-base lg:text-lg">
                خوش آمدید، {{Auth::user()->name}} {{Auth::user()->family}} 👋
            </span>

            <!-- آواتار (سمت راست) -->
          <svg   class="w-12 h-12 rounded-full border-2 border-primary hidden lg:block" fill="oklch(37.9% 0.146 265.522)" alt="avatar" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  alt="profile-image">
                <path fill-rule="evenodd" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z" clip-rule="evenodd"></path>
                <path d="M6 17.815c0-.516.386-.953.9-1.01 3.857-.427 6.36-.389 10.209.01a.995.995 0 0 1 .554 1.736c-4.542 3.959-7.139 3.904-11.343.003a1.01 1.01 0 0 1-.32-.739Z"></path>
                <path fill-rule="evenodd" d="M17.058 17.312c-3.819-.395-6.286-.433-10.103-.01a.514.514 0 0 0-.295.886c2.084 1.933 3.663 2.806 5.207 2.812 1.548.006 3.213-.86 5.468-2.826a.495.495 0 0 0-.277-.862ZM6.845 16.308c3.898-.431 6.436-.392 10.315.009a1.495 1.495 0 0 1 .832 2.61c-2.288 1.994-4.193 3.08-6.129 3.073-1.941-.007-3.762-1.112-5.883-3.08a1.514 1.514 0 0 1 .865-2.613Z" clip-rule="evenodd"></path>
                <path d="M16 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"></path>
                <path fill-rule="evenodd" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" clip-rule="evenodd"></path>
                </svg>


        </div>

        <!-- سمت چپ: همبرگر + دکمه‌ها -->
        <div class="flex items-center gap-3">

            <!-- همبرگر (فقط موبایل) -->
            <button onclick="toggleMenu()" class="lg:hidden text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7"
                     fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- دکمه‌ها (فقط دسکتاپ) -->
            <ul class="hidden lg:flex gap-4 items-center text-[#4B5675] font-semibold">
                <li>
                    <a href="{{ route('user.logout') }}">خروج از حساب کاربری</a>
                </li>
                <li>
                    <a href="{{ route('user.profile',Auth::user()) }}">پروفایل کاربری</a>
                </li>
            </ul>

        </div>
    </div>
</div>


            </div>
        </div>

        <!-- محتوای صفحه -->
        <div class="w-full lg:w-[calc(100%-265px)] float-end mx-auto mt-28 px-5">
            @yield('content')
        </div>

    </div>
</div>

<script>
    function toggleMenu() {
        document.getElementById('sidebar').classList.toggle('translate-x-full');
        document.getElementById('overlay').classList.toggle('hidden');
    }
</script>

</body>
</html>
