

@extends('users.dashboard')
@section('title', 'edit user')
@section('content')
    <section class="2xl:container mx-auto">
        <div class="w-11/12 mx-auto">
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700">ثبت نام</h1>
            </div>
            <form action="{{ route('user.update') }}" method="post" class="w-11/12 lg:w-3/4 mx-auto p-5 rounded-lg border">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                    <div class="w-full flex flex-col">
                        <input type="hidden" name ="id" value ="{{$user -> id}}">
                        <label class="text-sm md:text-base" for="first_name">نام :</label>
                        <input type="text" name="name" id="first_name" value="{{$user -> name}}" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b" required>
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="family"> نام خانوادگی :</label>
                        <input type="text" name="family"  value="{{$user -> family}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b" required>
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="phone">شماره تلفن :</label>
                        <input type="text" name="phone"  value="{{$user ->phone}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b" required>
                    </div>
              
                       <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="code">  کد دانشجویی :</label>
                        <input type="text" name="code" value="{{$user->code}}" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>

                       <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="email">  ایمیل :</label>
                        <input type="email" name="email" value="{{$user?->email}}" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                </div>
            
                <div>
                 <label class="text-sm md:text-base" >  تایید  :</label>
                    <input type="checkbox" name="approved" value="{{true}}"
                    @if($user->approved==1)
                    checked
                    @endif>
                </div>
                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                    <button class="px-5 py-2 lg:px-10 lg:py-3 border rounded-md transition-all duration-150 hover:bg-gray-400 hover:border-gray-400 hover:text-white">ثبت</button>
                </div>
            </form>
        </div>
    </section>
@endsection