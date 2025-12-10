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
                       class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">
            </div>

            <!-- فیلد description -->
            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-2">توضیحات:</label>
                <textarea name="description" rows="4" 
                          class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#023e83] focus:border-[#023e83] transition duration-200">{{ $practice->description }}</textarea>
            </div>

            <!-- دکمه‌ها -->
            <div class="flex justify-center mt-6">
                <button type="submit" 
                        class="bg-[#023e83] hover:bg-[#012b5a] text-white px-8 py-3 rounded-xl text-lg font-medium transition duration-200">
                    ویرایش تمرین
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
