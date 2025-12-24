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
        
            {{-- <div class="lg:hidden flex items-center gap-2">
                    <img src="{{ asset('assets/img/profile2.png') }}" alt="profile_logo" class="w-10 h-10 mt-2 mr-1">
                    <span class="font-semibold text-white
                           text-sm sm:text-base lg:text-lg mt-2">سامانه تمرین و ارزیابی آنلاین</span>
                </div> --}}
        @if(Auth::user()->roles[0]->title=="استاد")
            <h3 class="text-xl font-bold text-white text-center py-3 mt-5">داشبورد استاد</h3>
        @elseif(Auth::user()->roles[0]->title=="دانشجو")
            <h3 class="text-xl font-bold text-white text-center py-3 mt-5 ">داشبورد دانشجو</h3>
        @endif

        <hr class="text-[darkslategray] mt-2.5">

        <div class="py-5 h-[80%] overflow-y-auto" style="scrollbar-width:none;">
            <ul class="flex flex-col gap-6 mt-2.5 mb-2.5 pr-3 text-white">
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
            {{-- <a href="{{route("user.profile",[Auth::user()])}}"> --}}
                {{-- </a> --}}
                
    <!-- پروفایل + منو -->
    <div class="relative" id="profileMenuWrapper">

  <!-- آواتار -->
  <div
    id="profileTrigger"
    class="w-11 h-11 rounded-full overflow-hidden cursor-pointer border border-white/30 shadow group"
  >
    <svg class="w-full h-full" fill="oklch(37.9% 0.146 265.522)" viewBox="0 0 24 24">
      <path fill-rule="evenodd" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z"/>
      <path d="M6 17.815c0-.516.386-.953.9-1.01 3.857-.427 6.36-.389 10.209.01a.995.995 0 0 1 .554 1.736c-4.542 3.959-7.139 3.904-11.343.003a1.01 1.01 0 0 1-.32-.739Z"/>
      <path d="M16 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
    </svg>
  </div>

  <!-- منو -->
  <div
    id="profileMenu"
    class="absolute top-17 right-0
           w-40 md:w-40   
           translate-x-[45px] md:translate-x-[50px]
           backdrop-blur-xl bg-white/100 border border-white/50 rounded-2xl shadow-xl p-2.5
           opacity-0 scale-95 invisible transition-all duration-200 origin-top z-50">

    <ul class="flex flex-col text-sm text-slate-700">
      <li>
        <a class="block rounded-xl px-3 py-2 hover:bg-slate-100" href="{{ route('user.edit_profile') }}">
          ویرایش پروفایل
        </a>
      </li>

      <li>
        <a class="block rounded-xl px-3 py-2 hover:bg-slate-100" href="{{ route('user.complete_profile') }}">
          تکمیل پروفایل
        </a>
      </li>

      <li>
        <a class="block rounded-xl px-3 py-2 hover:bg-slate-100" href="{{ route('user.profile',Auth::user()) }}">
          پروفایل کاربری
        </a>
      </li>

      <li>
        <a class="flex items-center gap-2 rounded-xl px-3 py-2 text-rose-600 hover:bg-rose-50" href="{{ route('user.logout') }}">
          <i class="fas fa-sign-out-alt"></i>
          خروج از حساب
        </a>
      </li>
    </ul>
  </div>
</div>

<script>
  const trigger = document.getElementById("profileTrigger");
  const menu = document.getElementById("profileMenu");
  const wrapper = document.getElementById("profileMenuWrapper");

  // باز/بسته شدن با کلیک در موبایل
  trigger.addEventListener("click", () => {
    if (window.innerWidth < 1024) { // کمتر از دسکتاپ
      menu.classList.toggle("opacity-0");
      menu.classList.toggle("invisible");
      menu.classList.toggle("scale-95");
    }
  });

  // بستن با کلیک بیرون
  document.addEventListener("click", (e) => {
    if (!wrapper.contains(e.target)) {
      menu.classList.add("opacity-0", "invisible", "scale-95");
    }
  });

  // رفتار هاور روی دسکتاپ
  wrapper.addEventListener("mouseenter", () => {
    if (window.innerWidth >= 1024) {
      menu.classList.remove("opacity-0", "invisible", "scale-95");
    }
  });

  wrapper.addEventListener("mouseleave", () => {
    if (window.innerWidth >= 1024) {
      menu.classList.add("opacity-0", "invisible", "scale-95");
    }
  });
</script>



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
            
            <div class="hidden sm:flex items-center gap-2">
                <img src="{{ asset('assets/img/profile_logo.png') }}" alt="profile_logo" class="w-10 h-10">
                <span class="font-semibold text-gray-700
                       text-sm sm:text-base lg:text-lg">سامانه تمرین و ارزیابی آنلاین</span>
            </div>

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
