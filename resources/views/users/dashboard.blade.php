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

            <div class="hidden lg:block lg:w-[265px] bg-[url('{{ asset('assets/img/bg.jpg') }}')] fixed right-0 top-0 h-dvh px-5 text-sm">

                <h3 class="text-xl font-bold text-white text-center py-3">
                    داشبورد
                </h3>
                <hr class="text-[darkslategray] mt-2.5">
                <div class="py-5 h-[80%] overflow-y-auto flex flex-col gap-5" style="scrollbar-width: none;">
                    <!-- <div>
                        <div class="flex justify-between flex-row-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 fill-white w-[15px]">
                                <path fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="flex flex-row-reverse gap-2">
                                <span class=" text-[white] flex justify-end">کسب و کار ها</span>
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
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1">کسب و کار های من</a>
                                </li>
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1">ایجاد کسب و کار جدید</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->



                    <!-- <div class="border-b border-gray-500">
                        <div class="flex justify-between flex-row-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 fill-white w-[15px]">
                                <path fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="flex flex-row-reverse gap-2">
                                <span class=" text-[white] flex justify-end">دسته بندی ها</span>
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
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1">همه دسته ها</a>
                                </li>
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1">ایجاد دسته جدید</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-gray-500">
                        <div class="flex justify-between flex-row-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 fill-white w-[15px]">
                                <path fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="flex flex-row-reverse gap-2">
                                <span class=" text-[white] flex justify-end">کاربران</span>
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
                        </div> -->
                        <!-- <div class="dashbord ">
                            <ul class="gap-2.5 mt-2.5 mb-2.5 pr-3">
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1">همه کاربران</a>
                                </li>
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1">ایجاد کاربر جدید</a>
                                </li>
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1">ایجاد ادمین جدید</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>

        <!-- </div> -->
        <!-- کد های سپهر -->
        <div class="w-full">
            <div class="w-full fixed top-0 right-0 z-10">
                <div class="w-full float-end lg:w-[calc(100%-265px)] py-3 hidden lg:flex flex-row-reverse px-5 backdrop-blur-sm shadowHeader relative z-20">
                    <div class="w-6/12 flex flex-row-reverse items-center">
                        <div> 
                            <a href="#">
                                <img src="{{ asset('assets/img/user.png') }}"
                                    alt="user__picture" class="size-10 rounded-xl">
                            </a>
                        </div>
    
                        <div class="flex gap-7 ml-7">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5">
                                    <defs>
                                        <style>
                                            .fa-secondary {
                                                opacity: .4
                                            }
                                        </style>
                                    </defs>
                                    <path class="fa-secondary"
                                        d="M208 64a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 352A208 208 0 1 0 208 0a208 208 0 1 0 0 416z" />
                                    <path class="fa-primary"
                                        d="M330.7 376L457.4 502.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L376 330.7C363.3 348 348 363.3 330.7 376z" />
                                </svg>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5">
                                    <defs>
                                        <style>
                                            .fa-secondary {
                                                opacity: .4
                                            }
                                        </style>
                                    </defs>
                                    <path class="fa-secondary"
                                        d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4l0 0 0 0 0 0 0 0 .3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z" />
                                    <path class="fa-primary" d="" />
                                </svg>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5">
                                    <defs>
                                        <style>
                                            .fa-secondary {
                                                opacity: .4
                                            }
                                        </style>
                                    </defs>
                                    <path class="fa-secondary"
                                        d="M256 448c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9c-5.5 9.2-11.1 16.6-15.2 21.6c-2.1 2.5-3.7 4.4-4.9 5.7c-.6 .6-1 1.1-1.3 1.4l-.3 .3 0 0 0 0 0 0 0 0c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c28.7 0 57.6-8.9 81.6-19.3c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9zM120 208H264c13.3 0 24 10.7 24 24s-10.7 24-24 24H120c-13.3 0-24-10.7-24-24s10.7-24 24-24zm224 0h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H344c-13.3 0-24-10.7-24-24s10.7-24 24-24zM120 288h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H120c-13.3 0-24-10.7-24-24s10.7-24 24-24zm128 0H392c13.3 0 24 10.7 24 24s-10.7 24-24 24H248c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                    <path class="fa-primary"
                                        d="M96 232c0-13.3 10.7-24 24-24H264c13.3 0 24 10.7 24 24s-10.7 24-24 24H120c-13.3 0-24-10.7-24-24zm224 0c0-13.3 10.7-24 24-24h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H344c-13.3 0-24-10.7-24-24zM96 312c0-13.3 10.7-24 24-24h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H120c-13.3 0-24-10.7-24-24zm128 0c0-13.3 10.7-24 24-24H392c13.3 0 24 10.7 24 24s-10.7 24-24 24H248c-13.3 0-24-10.7-24-24z" />
                                </svg>
                            </div>
                            <div class="relative">
                                <div
                                    class="bg-green-500 size-1/3 absolute -top-2.5 rounded-full right-1.5 active-circle">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5">
                                    <defs>
                                        <style>
                                            .fa-secondary {
                                                opacity: .4
                                            }
                                        </style>
                                    </defs>
                                    <path class="fa-secondary"
                                        d="M188.3 408.7l44.5 89c4.4 8.8 13.3 14.3 23.2 14.3s18.8-5.5 23.2-14.3l44.5-89C432.2 384.5 512 303.8 512 208C512 93.1 397.4 0 256 0S0 93.1 0 208c0 95.8 79.8 176.5 188.3 200.7z" />
                                    <path class="fa-primary" d="" />
                                </svg>
                            </div>
                            <div>
                                محمد افتخاری
                            </div>
                        </div>
                    </div>
                    <div class="w-6/12 flex justify-start">
                        <ul class="flex gap-4 items-center text-black font-semibold ">
                            <li class="color__a text-[#4B5675]">
                                <a href="#" class="py-2">خروج از حساب کاربری</a>
                            </li>
                            <li class="color__a text-[#4B5675]">
                                <a href="#" class="py-2"> صفحات</a>
                            </li>
                            <li class="color__a text-[#4B5675]">
                                <a href="#" class="py-2"> اپلیکیشن</a>
                            </li>
                            <li class="color__a text-[#4B5675]">
                                <a href="#" class="py-2">قالب بندی ها</a>
                            </li>
                            <li class="color__a text-[#4B5675]">
                                <a href="#" class="py-2"> کمک</a>
                            </li>
                        </ul>
                    </div>
                </div>
               
                
            </div>
            <div class="w-full lg:w-9/12 2xl:w-10/12 float-end mt-20 px-5 overflow-y-auto" style="scrollbar-width:none;">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>