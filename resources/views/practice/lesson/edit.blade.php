@extends('users.dashboard')
@section('title', 'edit lesson')
@section('content')

<!-- بارگذاری فونت وزیر -->
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Vazirmatn', sans-serif;
        background: #f3f4f6;
    }
</style>

<div class="max-w-4xl mx-auto mt-12 p-4">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
        <h1 class="text-3xl font-bold text-[#023e83] mb-8 text-center">ویرایش درس</h1>
        <form class="space-y-6" action="{{ url('lesson/update') }}" method="post">
            @csrf
            <input type="hidden" name="master_id" value="{{ Auth::id() }}">
            <input type="hidden" value="{{ $lesson->id }}" name="id">

            <!-- عنوان درس -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">عنوان درس</label>
                <input type="text" name="title" value="{{ $lesson->title }}" 
                       class="w-full p-4 border border-gray-300 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
            </div>

            <!-- توضیحات -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">توضیحات</label>
                <textarea name="description" rows="5" 
                          class="w-full p-4 border border-gray-300 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">{{ $lesson->description }}</textarea>
            </div>

            <!-- گروه درس -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">گروه درس</label>
                <input type="text" value="{{ $lesson->lesson_group }}" name="lesson_group" 
                       class="w-full p-4 border border-gray-300 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
            </div>

            <div class="flex flex-row gap-3">
                <label class="block text-gray-700 font-semibold">وضعیت درس:</label>
                <div class="flex flex-row gap-1">
                    <input type="radio" class="cursor-pointer" value={{ 0 }} @if($lesson->active==0)checked @endif name="active">
                    <span>فعال</span>
                </div>
                <div class="flex flex-row gap-1">
                    <input type="radio" class="cursor-pointer" value={{ 1 }} @if($lesson->active==1)checked @endif name="active">
                    <span>غیر فعال</span>
                </div>
            </div>

            <!-- دکمه ارسال -->
            <div class="flex justify-center mt-6 gap-3">
                <button type="submit" 
                        class="bg-[#023e83] hover:bg-[#012b5a] text-white px-8 py-3 rounded-xl text-lg font-medium transition duration-200 cursor-pointer">
                     ثبت
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
