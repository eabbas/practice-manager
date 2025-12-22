<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="w-full flex flex-row">
        <!-- <div class=""> -->

        <div
            class="hidden lg:block lg:w-[265px] bg-[url('{{ asset('assets/img/bg.jpg') }}')] fixed right-0 top-0 h-dvh px-5 text-sm">
            @if(Auth::user()->roles[0]->title=="استاد")
            <h3 class="text-xl font-bold text-white text-center py-3">
                داشبورد استاد
            </h3>
            @elseif(Auth::user()->roles[0]->title=="دانشجو")
            <h3 class="text-xl font-bold text-white text-center py-3">
                داشبورد دانشجو
            </h3>
            @endif
            <hr class="text-[darkslategray] mt-2.5">
            <div class="py-5 h-[80%] overflow-y-auto flex flex-col gap-5" style="scrollbar-width: none;">
                <div>
                    <div class="flex justify-between flex-row-reverse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse gap-2">
                            <span class=" text-[white] flex justify-end"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px"
                                class="w-[30px] h-[30px] fill-white " viewBox="0 0 100 100"
                                enable-background="new 0 0 100 100" xml:space="preserve">
                                <path
                                    d="M22.5,19.7h20c1.4,0,2.5,1.1,2.5,2.5v54.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.2  C20,20.8,21.1,19.7,22.5,19.7z" />
                                <path
                                    d="M57.5,19.6h20c1.4,0,2.5,1.1,2.5,2.5V42c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.1  C55,20.7,56.1,19.6,57.5,19.6z" />
                                <path
                                    d="M57.5,54.6h20c1.4,0,2.5,1.1,2.5,2.5v19.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V57.1  C55,55.8,56.1,54.6,57.5,54.6z" />
                            </svg>
                        </div>
                    </div>
                    <div class="dashbord ">
                        <ul class="gap-2.5 mt-2.5 mb-2.5 pr-3">
                            <?php //dd(Auth::user()->roles[0]);?>
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('user.complete_profile') }}" class=" text-white py-1">تکمیل
                                    اطلاعات کاربری</a>
                            </li>

                            {{-- @if(Auth::user()->roles[0]->title=="استاد") --}}

                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('lesson_create') }}" class=" text-white py-1"> تعریف درس جدید</a>
                            </li>
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('lesson_list') }}" class=" text-white py-1"> دروس ارائه شده </a>
                            </li>
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('student_class') }}" class=" text-white py-1">
                                    دروس اخذ شده </a>
                            </li>
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('practices_list') }}" class=" text-white py-1"> دسترسی به تمرینات</a>
                            </li>
                            {{-- @endif --}}
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('my_requests') }}" class=" text-white py-1">
                                     درخواست های ثبت شده</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- کد های سپهر -->
        <div class="w-full">
            <div class="w-full fixed top-0 right-0 z-10">
                <div
                    class="w-full float-end lg:w-[calc(100%-265px)] py-3 hidden lg:flex flex-row-reverse px-5 backdrop-blur-sm shadowHeader relative z-20">
                    <div class="w-full flex flex-row justify-between">
                        <div class="w-full flex flex-row-reverse justify-between items-center bg-white p-4 rounded-xl shadow mt-1">
                            <div class="flex flex-row items-center gap-2">
                                <span class="text-lg font-semibold text-gray-700 my-2">
                                    خوش آمدید، {{Auth::user()->name}} {{Auth::user()->family}}👋
                                </span>
                               <svg   class="w-12 h-12 rounded-full border-2 border-primary" fill="oklch(37.9% 0.146 265.522)" alt="avatar" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  alt="profile-image">
                <path fill-rule="evenodd" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z" clip-rule="evenodd"></path>
                <path d="M6 17.815c0-.516.386-.953.9-1.01 3.857-.427 6.36-.389 10.209.01a.995.995 0 0 1 .554 1.736c-4.542 3.959-7.139 3.904-11.343.003a1.01 1.01 0 0 1-.32-.739Z"></path>
                <path fill-rule="evenodd" d="M17.058 17.312c-3.819-.395-6.286-.433-10.103-.01a.514.514 0 0 0-.295.886c2.084 1.933 3.663 2.806 5.207 2.812 1.548.006 3.213-.86 5.468-2.826a.495.495 0 0 0-.277-.862ZM6.845 16.308c3.898-.431 6.436-.392 10.315.009a1.495 1.495 0 0 1 .832 2.61c-2.288 1.994-4.193 3.08-6.129 3.073-1.941-.007-3.762-1.112-5.883-3.08a1.514 1.514 0 0 1 .865-2.613Z" clip-rule="evenodd"></path>
                <path d="M16 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"></path>
                <path fill-rule="evenodd" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" clip-rule="evenodd"></path>
                </svg>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex justify-start">
                                    <ul class="flex gap-4 items-center text-black font-semibold ">
                                        <li class="color__a text-[#4B5675]">
                                            <a href="{{ route('user.logout') }}" class="py-2">خروج از حساب کاربری</a>
                                        </li>
                                        <li class="color__a text-[#4B5675]">
                                            <a href="{{ route('user.profile',Auth::user()) }}" class="py-2"> پروفایل
                                                کاربری</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-9/12 2xl:w-10/12 float-end mt-20 px-5 overflow-y-auto"
                style="scrollbar-width:none;">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>