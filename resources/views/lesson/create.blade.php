@extends('users.dashboard')
@section('title', 'create lesson')
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

    /* حذف کامل outline و shadow پیش‌فرض */
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
        <h1 class="text-3xl font-bold text-[#023e83] mt-5">ایجاد درس جدید</h1>
        <p class="text-gray-600 text-lg">اطلاعات درس جدید را وارد کنید</p>
    </div>

    <!-- فرم -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <form action="{{ url('lesson/store') }}" method="POST" class="p-8">
            @csrf
            <input type="hidden" name="master_id" value="{{ Auth::id() }}">

            <!-- اطلاعات اصلی -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-3">
                    <i class="fas fa-book ml-3 text-[#023e83]"></i>
                    اطلاعات اصلی درس
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- عنوان -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center">
                            <i class="fas fa-book-open ml-2 text-[#023e83] text-sm"></i>
                            عنوان درس <span class="text-red-500 mr-1">*</span>
                        </label>

                        <div class="relative">
                            <input type="text" name="title" required
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="عنوان درس را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                    <!-- گروه درس -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-3 flex items-center">
                            <i class="fas fa-book-open ml-2 text-[#023e83] text-sm"></i>
                            گروه درس <span class="text-red-500 mr-1">*</span>
                        </label>

                        <div class="relative">
                            <input type="text" name="lesson_group" required
                                class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                                       border border-gray-300 transition
                                       focus:border-[#023e83]"
                                placeholder="گروه درس را وارد کنید">
                            <i class="fas fa-pen absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 mt-1"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- توضیحات -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-3">
                    <i class="fas fa-align-left ml-3 text-[#023e83]"></i>
                    توضیحات درس
                </h2>

                <div class="relative">
                    <textarea name="description" rows="5"
                        class="w-full px-4 py-3 pr-12 bg-gray-50 rounded-xl
                               border border-gray-300 transition resize-none
                               focus:border-[#023e83]"
                        placeholder="توضیحات کامل درباره درس، اهداف آموزشی، پیش‌نیازها و ..."></textarea>
                    <i class="fas fa-edit absolute right-4 top-4 text-gray-400"></i>
                </div>
            </div>

            <!-- دکمه -->
            <div class="flex justify-end pt-6 border-t border-gray-200">
                <button type="submit"
                    class="px-8 py-3 bg-[#023e83] hover:bg-[#022e6b]
                           text-white rounded-xl transition shadow-md font-medium">
                    <i class="fas fa-save ml-2"></i>
                    ذخیره
                </button>
            </div>

        </form>
    </div>
</div>

</body>
@endsection
