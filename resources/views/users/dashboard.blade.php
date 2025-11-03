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

            <div class="hidden lg:block lg:w-[265px] bg-[#0D0E12] fixed right-0 top-0 h-dvh px-5 text-sm">

                <div class="flex justify-center">
                    <a href="#" class="right-0 mr-[15px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="269" height="56" viewBox="0 0 269 56" fill="none"
                            class="w-[130px] ">
    
                            <path
                                d="M93.0855 42H98.5035L99.7635 25.326C99.8895 23.352 99.8055 20.664 99.8055 20.664H99.8895C99.8895 20.664 100.813 23.604 101.527 25.326L106.315 36.876H111.061L115.891 25.326C116.605 23.604 117.487 20.706 117.487 20.706H117.571C117.571 20.706 117.487 23.352 117.613 25.326L118.873 42H124.249L121.855 12.18H116.059L110.221 26.922C109.549 28.686 108.751 31.29 108.751 31.29H108.667C108.667 31.29 107.827 28.686 107.155 26.922L101.317 12.18H95.5215L93.0855 42ZM128.531 31.29C128.531 37.38 132.941 42.504 140.039 42.504C145.373 42.504 148.649 39.438 148.649 39.438L146.591 35.616C146.591 35.616 143.861 37.968 140.417 37.968C137.225 37.968 134.327 36.036 133.991 32.298H148.775C148.775 32.298 148.901 30.87 148.901 30.24C148.901 24.57 145.583 20.076 139.409 20.076C133.025 20.076 128.531 24.696 128.531 31.29ZM134.159 28.644C134.663 25.872 136.553 24.192 139.283 24.192C141.635 24.192 143.441 25.746 143.525 28.644H134.159ZM154.222 34.146C154.222 41.328 160.144 42.21 163.126 42.21C164.134 42.21 164.764 42.084 164.764 42.084V37.422C164.764 37.422 164.386 37.506 163.798 37.506C162.328 37.506 159.556 37.002 159.556 33.474V25.158H164.428V20.916H159.556V14.742H154.348V20.916H151.45V25.158H154.222V34.146ZM169.13 42H174.464V33.516C174.464 32.256 174.59 31.08 174.926 30.03C175.934 26.838 178.496 25.536 180.764 25.536C181.478 25.536 182.024 25.62 182.024 25.62V20.37C182.024 20.37 181.562 20.286 181.058 20.286C177.782 20.286 175.22 22.722 174.254 25.788H174.17C174.17 25.788 174.254 25.074 174.254 24.276V20.58H169.13V42ZM184.023 31.29C184.023 37.884 189.273 42.504 195.825 42.504C202.335 42.504 207.585 37.884 207.585 31.29C207.585 24.738 202.335 20.076 195.783 20.076C189.273 20.076 184.023 24.738 184.023 31.29ZM189.441 31.29C189.441 27.342 192.339 24.612 195.825 24.612C199.269 24.612 202.167 27.342 202.167 31.29C202.167 35.28 199.269 37.968 195.825 37.968C192.339 37.968 189.441 35.28 189.441 31.29ZM211.869 42H217.203V32.172C217.203 31.164 217.287 30.198 217.581 29.316C218.379 26.754 220.479 24.948 223.335 24.948C226.065 24.948 226.737 26.712 226.737 29.316V42H232.029V28.224C232.029 22.554 229.341 20.076 224.595 20.076C220.269 20.076 217.917 22.722 216.993 24.528H216.909C216.909 24.528 216.993 23.856 216.993 23.058V20.58H211.869V42ZM237.627 16.926H242.919V12.18H237.627V16.926ZM237.627 42H242.961V20.58H237.627V42ZM247.27 31.29C247.27 37.506 251.806 42.504 258.904 42.504C264.658 42.504 267.724 39.018 267.724 39.018L265.666 35.238C265.666 35.238 262.978 37.968 259.366 37.968C255.292 37.968 252.688 34.86 252.688 31.248C252.688 27.594 255.25 24.612 259.198 24.612C262.558 24.612 264.784 26.922 264.784 26.922L267.136 23.268C267.136 23.268 264.49 20.076 258.904 20.076C251.806 20.076 247.27 25.2 247.27 31.29Z"
                                fill="white" />
                            <path
                                d="M61.114 2.77686L76.3225 50.1304C77.1517 52.7123 75.2258 55.3535 72.5141 55.3535H61.3307C59.5879 55.3535 58.0457 54.2251 57.5183 52.5641L42.4827 5.21052C41.6637 2.63121 43.5889 0 46.2951 0H57.3056C59.0435 0 60.5826 1.12219 61.114 2.77686Z"
                                fill="#EF305E" />
                            <g filter="url(#filter0_i)">
                                <path
                                    d="M46.5485 37.8L35.8243 3.44919C35.1837 1.39729 33.2837 0 31.1341 0C28.5177 0 26.3602 2.05036 26.227 4.66341L24.9187 30.3392C24.8723 31.2511 24.9823 32.1643 25.244 33.0391L31.0656 52.4999C31.5722 54.1934 33.1302 55.3535 34.8978 55.3535H40.3093C42.0503 55.3535 43.5914 54.2274 44.1203 52.5686L46.5267 45.0214C47.2752 42.6736 47.2828 40.1523 46.5485 37.8Z"
                                    fill="white" />
                                <path
                                    d="M46.5485 37.8L35.8243 3.44919C35.1837 1.39729 33.2837 0 31.1341 0C28.5177 0 26.3602 2.05036 26.227 4.66341L24.9187 30.3392C24.8723 31.2511 24.9823 32.1643 25.244 33.0391L31.0656 52.4999C31.5722 54.1934 33.1302 55.3535 34.8978 55.3535H40.3093C42.0503 55.3535 43.5914 54.2274 44.1203 52.5686L46.5267 45.0214C47.2752 42.6736 47.2828 40.1523 46.5485 37.8Z"
                                    fill="url(#paint0_linear)" />
                            </g>
                            <path
                                d="M20.317 0H31.3316C34.0288 0 35.9529 2.61489 35.1505 5.18995L20.2695 52.9475C19.7487 54.619 18.2014 55.7576 16.4506 55.7576H5.43606C2.73888 55.7576 0.814784 53.1427 1.61716 50.5676L16.4981 2.81005C17.019 1.13856 18.5663 0 20.317 0Z"
                                fill="#EF305E" />
                            <defs>
                                <filter id="filter0_i" x="24.9083" y="0" width="22.1854" height="55.3535"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dx="-4" dy="3" />
                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
                                    <feColorMatrix type="matrix"
                                        values="0 0 0 0 0.904167 0 0 0 0 0.892865 0 0 0 0 0.892865 0 0 0 0.4 0" />
                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow" />
                                </filter>
                                <linearGradient id="paint0_linear" x1="29" y1="24.5" x2="40.5" y2="27.5"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-opacity="0.25" />
                                    <stop offset="0.911458" stop-color="white" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </div>
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
                                @if($user->role=="master")
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">

                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="{{ route('lesson_create') }}" class=" text-white py-1">ایجاد درس</a>
                                </li>
                                @endif
                                <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                    <span class="size-1 bg-white rounded-sm"></span>
                                    <a href="#" class=" text-white py-1"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                                @yield('userName') 
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