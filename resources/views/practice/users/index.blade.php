
@extends('users.dashboard')
@section('title', 'user list')
@section('content')
    <section class="2xl:container mx-auto">
        <div class="w-11/12 mx-auto">
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700">لیست کاربران</h1>
            </div>
            <div class="overflow-x-auto">

                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-7 gap-3 md:gap-5 lg:gap-10 text-center text-gray-700 font-semibold xl:text-lg border-b-2 border-gray-400 pb-3 mb-3">
                        <li class="w-full">آیدی</li>
                        <li class="w-full">نام</li>
                        <li class="w-full">نام خانوادگی</li>
                        <li class="w-full">کد دانشجویی </li>
                        <li class="w-full">شماره تلفن</li>
                    
                        <li class="w-full col-span-2">دکمه ها</li>
                    </ul>
                </div>



                @foreach($users as $user)

                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-7 gap-3 md:gap-5 xl:gap-10 text-center text-gray-700 font-medium text-sm md:text-base border-b border-gray-400 pb-5 my-5">
                        <li class="w-full"> {{$user -> id}}</li>
                        <li class="w-full"> {{$user -> name}}</li>
                        <li class="w-full"> {{$user -> family}}</li>
                        <li class="w-full"> {{$user -> code}}</li>
                        <li class="w-full"> {{$user ->phone}}</li>
                        <li class="w-full col-span-2 grid grid-cols-3 gap-3 xl:gap-5">
                          
                            <div class="w-full">
                                <a href="http://localhost/practice-manager/public/user/show/{{$user->id}}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-gray-400 hover:text-white">نمایش</a>
                            </div>
                            <div class="w-full">
                            <a href="http://localhost/practice-manager/public/user/edit/{{$user->id}} class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">ویرایش</a>
                            </div>
                            <div class="w-full">
                                <a href="http://localhost/practice-manager/public/user/delete/{{$user->id}}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-rose-500 hover:text-white hover:border-rose-500">حذف</a>
                            </div>

                        </li>
                    </ul>
                </div>

                @endforeach

            </div>
        </div>
    </section>
@endsection