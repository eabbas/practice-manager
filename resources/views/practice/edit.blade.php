@extends('users.dashboard')
@section('title', 'edit practice')
@section('content')

<!-- بارگذاری فونت وزیر -->
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Vazirmatn', sans-serif;
        background: #f3f4f6;
    }
</style>

<div class="max-w-2xl mx-auto mt-12 bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
    <h1 class="text-3xl font-bold text-[#023e83] mb-8 text-center">ویرایش تمرین</h1>
    <form action="{{ url('practice/update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $practice->id }}">
        <input type="hidden" name="lesson_id" value="{{ $practice->lesson->id }}">
        <div class="space-y-6">
            <!-- فیلد title -->
            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-2">عنوان تمرین:</label>
                <input type="text" name="title" value="{{ $practice->title }}"
                       class="w-full p-4 border border-gray-300 rounded-xl  bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
            </div>

            <!-- فیلد description -->
            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-2">توضیحات:</label>
                <textarea name="description" rows="4" 
                          class="w-full p-4 border border-gray-300 rounded-xl  bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">{{ $practice->description }}</textarea>
            </div>
            <div class="mt-4">
                <label for="deadLine" class="block text-gray-700 font-medium mb-3 flex items-center">
                    <i class="fas fa-heading ml-2 text-[#023e83] text-sm"></i>
                      مهلت تحویل تمرین:
                </label>
                     <div class="relative">
                     <input type="date" id="deadLine" name="deadLine" required  value="{{$practice->deadLine}}"
                     class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl  bg-gray-50 input-focus transition duration-200 cursor-pointer">
                    <i class="fas fa-pen absolute right-4 mt-8 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
             </div> 
             <div class="flex flex-row sm:flex-row gap-4 justify-start pt-6 border-t border-gray-200">
                 <label class="block text-gray-700 font-semibold mt-5"> ویرایش فایل:</label>
                 <input type="file" class="border border-gray-300 rounded-lg  bg-gray-50 px-3 py-2 w-55 focus:outline-none focus:ring-2 focus:ring-primary mt-3 cursor-pointer" title="انتخاب فایل" name="file[]" multiple>
                </div>           
             <div class="flex flex-row gap-3">
                <i class="fas fa-pen absolute right-4 mt-8 transform -translate-y-1/2 text-gray-400"></i>
                <label class="block text-gray-700 font-semibold">وضعیت تمرین:</label>
                <div class="flex flex-row gap-1">
                    <input type="radio" class="cursor-pointer" value={{ 0 }} @if($practice->active==0)checked @endif name="active">
                    <span>فعال</span>
                </div>
                <div class="flex flex-row gap-1">
                    <input type="radio" class="cursor-pointer" value={{ 1 }} @if($practice->active==1)checked @endif name="active">
                    <span>غیر فعال</span>
                </div>
            </div>
            <!-- دکمه‌ها -->
            <div class="flex justify-center mt-9">
                <button type="submit" 
                        class="bg-[#023e83] hover:bg-[#012b5a] text-white px-8 py-3 rounded-xl text-lg font-medium transition duration-200 cursor-pointer">
                     ثبت
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
