@extends('users.dashboard')
@section('title', 'edit profile')
@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    vazir: ['Vazirmatn', 'sans-serif'],
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

    /* حذف تمام outline و shadow اضافی */
    input, textarea {
        outline: none !important;
        box-shadow: none !important;
    }

    input:focus, textarea:focus {
        outline: none !important;
        box-shadow: none !important;
    }
</style>

<body class="min-h-screen py-8 px-4 font-vazir">

<div class="max-w-4xl mx-auto">

    <!-- هدر -->
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-[#023e83] mt-5">ویرایش پروفایل</h1>
        <p class="text-gray-600 text-lg">اطلاعات خود را ویرایش کنید</p>
    </div>

    <!-- فرم -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <form action="{{ route('user.update') }}" method="POST" class="p-8">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

            <!-- اطلاعات کاربر -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-3">
                    <i class="fas fa-user ml-3 text-[#023e83]"></i>
                    اطلاعات کاربر
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- نام -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            نام <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="name" value="{{Auth::user()->name}}" required
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="نام خود را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                    <!-- نام خانوادگی -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            نام خانوادگی <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="family" value="{{Auth::user()->family}}" required
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="نام خانوادگی خود را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                    <!-- گروه درسی / رشته تحصیلی -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            @if(Auth::user()->roles[0]->title=="استاد")
                                گروه درسی
                            @elseif(Auth::user()->roles[0]->title=="دانشجو")
                                رشته تحصیلی
                            @endif
                            <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="collage" value="{{Auth::user()->collage}}" required
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="گروه / رشته خود را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                    <!-- شماره پرسنلی / دانشجویی -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            @if(Auth::user()->roles[0]->title=="استاد")
                                شماره پرسنلی
                            @elseif(Auth::user()->roles[0]->title=="دانشجو")
                                شماره دانشجویی
                            @endif
                            <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="code" value="{{Auth::user()->code}}" required
                                inputmode="numeric"
                                pattern="[0-9]{1,11}"
                                maxlength="11"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,11)"
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="شماره پرسنلی / دانشجویی">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                    <!-- شماره تلفن -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            شماره تلفن <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="phone" value="{{Auth::user()->phone}}" required
                                inputmode="numeric"
                                pattern="09[0-9]{9}"
                                maxlength="11"
                                minlength="11"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,11)"
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="شماره تلفن خود را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                    <!-- ایمیل -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            ایمیل <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="email" name="email" value="{{Auth::user()->email}}" required
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="ایمیل خود را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- دکمه ذخیره -->
            <div class="flex justify-end pt-6 border-t border-gray-200">
                <button type="submit"
                        class="px-8 py-3 bg-[#023e83] hover:bg-[#022e6b] text-white
                               rounded-xl transition shadow-md font-medium flex items-center">
                    <i class="fas fa-save ml-2"></i> ذخیره
                </button>
            </div>

        </form>
    </div>
</div>

</body>
@endsection
