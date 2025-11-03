
@extends('users.dashboard')
@section('title', 'practice create')
@section('content')
   <!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم جدید</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">فرم جدید</h1>
        
        <form action = "{{url('practice/store')}}" method = "post" class="space-y-4">
            @csrf
            <!-- فیلد title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">عنوان</label>
                <input type="text" id="title" name="title" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- فیلد description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">توضیحات</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- فیلد lesson_id با سلکت -->
            <div>
                <label for="lesson_id" class="block text-sm font-medium text-gray-700 mb-2">انتخاب درس</label>
                <select id="lesson_id" name="lesson_id" 
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- انتخاب درس --</option>
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- دکمه ارسال -->
            <div class="flex gap-3 mt-6">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm">
                    ثبت اطلاعات
                </button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection