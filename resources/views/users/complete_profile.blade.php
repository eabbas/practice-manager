@extends('users.dashboard')
@section('title', 'complete profile')
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
        <h1 class="text-3xl font-bold text-[#023e83] mt-5">تکمیل پروفایل</h1>
        <p class="text-gray-600 text-lg">اطلاعات جدید خود را اضافه کنید</p>
    </div>

    <!-- فرم -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <form action="{{ route('user.save') }}" method="POST" class="p-8">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

            <!-- اطلاعات جدید کاربر -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-3">
                    <i class="fas fa-user ml-3 text-[#023e83]"></i>
                    اطلاعات جدید کاربر
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- گروه درسی / رشته تحصیلی -->
                    <div>
                        <label for="collage" class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            @if(Auth::user()->roles[0]->title=="استاد")
                                گروه درسی
                            @elseif(Auth::user()->roles[0]->title=="دانشجو")
                                رشته تحصیلی
                            @endif
                            <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="collage" name="collage" required
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="گروه / رشته خود را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                    <!-- ایمیل -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-3 flex items-center gap-2">
                            ایمیل <span class="text-red-500 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="email" id="email" name="email" required
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
