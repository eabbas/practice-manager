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
            background-color: #023e83;
            border-color: #023e83;
        }
    </style>
    <body class="min-h-screen bg-white flex items-center justify-start p-6">

    <div class="max-w-3xl w-full bg-blue-900 backdrop-blur-4xl shadow-2xl rounded-3xl p-8 border border-white/20 mr-50">

        <!-- Header -->
        <div class="flex items-center gap-6 border-b border-white/20 pb-6">
            
            <!-- Profile Image -->
            <div class="w-28 h-28 rounded-full overflow-hidden shadow-lg border-2 border-white/40">
                <img src="{{ asset('assets/img/user.png') }}"
                     class="w-full h-full object-cover"
                     alt="profile-image">
            </div>

            <!-- Basic Info -->
            <div class="flex-1 text-white">
                <h2 class="text-2xl font-extrabold"><strong>{{ $user->name }} {{$user->family}} </strong></h2>

                <p class="mt-1">
                    <span class="font-semibold text-gray-300">نقش:</span>
                        @if(Auth::user()->roles[0]->title=="استاد")
                        استاد
                        @elseif(Auth::user()->roles[0]->title=="دانشجو")
                        دانشجو
                        @endif
                </p>

                <p class="mt-1">
                    <span class="font-semibold text-gray-300">وضعیت:</span>
                    فعال
                </p>
            </div>

            <!-- Edit Button -->
            <a href="{{route('user.edit_profile')}}" class="px-5 py-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition shadow-lg">
                 ویرایش پروفایل</a>
        </div>

        <!-- Details -->
        <div class="grid md:grid-cols-2 gap-6 mt-8">

             <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">نام و نام خانوادگی</p>
                <p class="text-lg font-semibold mt-1">{{$user->name}} {{$user->family}}</p>
            </div>

            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">
                    @if(Auth::user()->roles[0]->title=="استاد")
                        گروه درسی
                        @elseif(Auth::user()->roles[0]->title=="دانشجو")
                        رشته تحصیلی
                        @endif
                </p>
                <p class="text-lg font-semibold mt-1">{{$user->collage}}</p>
            </div>
            
            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">
                     @if(Auth::user()->roles[0]->title=="استاد")
                        شماره پرسنلی
                        @elseif(Auth::user()->roles[0]->title=="دانشجو")
                        شماره دانشجویی
                        @endif
                </p>
                <p class="text-lg font-semibold mt-1">{{$user->code}}</p>
            </div>


            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">شماره تماس</p>
                <p class="text-lg font-semibold mt-1">{{$user->phone}}</p>
            </div>
            
            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">ایمیل</p>
                <p class="text-lg font-semibold mt-1">{{$user?->email}}</p>
            </div>


            <div class="p-4 rounded-xl border border-white/10 bg-white/10 text-white">
                <p class="text-sm text-gray-300">تاریخ عضویت</p>
                <p class="text-lg font-semibold mt-1">{{$user->created_at}}</p>
            </div>
        </div>
    </div>
</body>









   {{-- <div class="w-full p-5 px-7">
            <div class="py-5 w-full">
                <h1 class="text-xl text-center lg:text-start">اکانت من</h1>
                <div class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm">
                    <a href="{{ route('home') }}" class="p-2">خانه</a>
                    <span>/</span>
                    <a href="{{ route('user.profile', [$user]) }}">اکانت من</a>
                </div>
            </div>
           
        <div class="flex flex-col border border-[#f1f1f4] lg:p-5 rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col lg:flex-row gap-7">
                    <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}" alt="">
                    <div class="flex flex-col gap-2">
                        <div class="div1 text-center lg:text-start">
                            <h3 class="text-[#4B5675] text-[15px] mb-2">نام کاربر:</h3>
                            <strong>{{ $user->name }}</strong>
                        </div>
                        <div class="div2 hidden">
                            <ul class="flex flex-col lg:flex-row gap-3 text-[#99A1B7]">
                                <li>
                                    <a href="">توسعه دهنده</a>
                                </li>
                                <li>
                                    <a href="">منطقه زندگی</a>
                                </li>
                                <li>
                                    <a href="">max@kt.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 mt-8">
                            <div class="border-[#99A1B7] flex flex-row-reverse px-2 justify-between lg:flex-col border border-dashed rounded-[5px] p-1 ">
                                <span class="font-bold">4,500</span>
                                <span class="text-[#4B5675]">تعداد درس ها</span>
                            </div>
                            <div class="border-[#99A1B7] flex flex-row-reverse px-2 justify-between lg:flex-col border border-dashed rounded-[5px] p-1 ">
                                <span class="font-bold">56</span>
                                <span class="text-[#4B5675]">تعداد تمرین ها</span>
                            </div>
                            <div class="border-[#99A1B7] flex flex-row-reverse px-2 justify-between lg:flex-col border border-dashed rounded-[5px] p-1 ">
                                <span class="font-bold">6</span>
                                <span class="text-[#4B5675]">تعداد پاسخ ها</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    <!-- <hr> -->
    <div class="lg:px-5 pt-3 mt-4 lg:mt-5">
        <div class="my-6">
            <ul class="flex flex-row gap-5 overflow-x-auto" style="scrollbar-width: none;">
                {{-- <li>
                    <a class="hover:text-blue-700 block w-[100px]" href="">بررسی اجمالی</a>
                </li>
                <li>
                    <a class="hover:text-blue-700 block w-[100px]" href="">تنظیمات</a>
                </li> --}}
            {{-- </ul>
        </div>
        <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2">
            <h1 class="text-xm lg:text-xl mt-5">جزییات پروفایل </h1>
           
            <div class="w-full h-px bg-gray-200 my-5 "></div>
            <div class="flex gap-70 ">
                <div class="flex w-full flex-col">
                    <libal class="p-2.5 text-gray-400">نام کامل</libal>
                    <span class="p-2.5"><strong>{{ $user->name }}</strong></span>
                    <libal class="p-2.5 text-gray-400">کمپانی</libal>
                    <span class="p-2.5">فائوس</span>
                    <libal class="p-2.5 text-gray-400">تماس با ما تلفن </libal>
                    <span class="p-2.5">{{ $user->phoneNumber }}<mark class="bg-green-400 px-1 rounded-md">تایید
                            شده</mark></span>
                    <libal class="p-2.5 text-gray-400">سایت کمپانی</libal>
                    <a href="#" class="p-2.5">famenu.ie</a>
                    <libal class="p-2.5 text-gray-400">کشور </libal>
                    <span class="p-2.5">ایران</span>
                    <libal class="p-2.5 text-gray-400">ارتباط</libal>
                    <span class="p-2.5">ایمیل, تلفن</span>
                    <libal class="p-2.5 text-gray-400">همه</libal>
                    <span class="p-2.5">بله</span>
                </div>
            </div>

        </div>
    </div> --}}
    {{-- </div> --}}
    @endsection