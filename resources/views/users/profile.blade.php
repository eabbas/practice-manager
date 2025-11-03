    @extends('users.dashboard')
    @section('title', 'پروفایل کاربری')
    @section('content')
   <div class="w-full p-5 px-7">
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
    <div class="lg:px-5 pt-3 mt-4 lg:mt-8">
        <div class="my-6">
            <ul class="flex flex-row gap-5 overflow-x-auto" style="scrollbar-width: none;">
                <li>
                    <a class="hover:text-blue-700 block w-[100px]" href="">بررسی اجمالی</a>
                </li>
                <li>
                    <a class="hover:text-blue-700 block w-[100px]" href="">تنظیمات</a>
                </li>
            </ul>
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
    </div>
    </div>
    @endsection