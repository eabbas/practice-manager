
@extends('users.dashboard')
@section('title', 'edit practice')
@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">ویرایش تمرین</h1>
    <form action="{{url('practice/update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$practice->id}}">
        <input type="hidden" name="lesson_id" value="{{ $practice->lesson->id }}">
        <div class="space-y-4">
            <!-- فیلد title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">عنوان:</label>
                <input type="text" name="title" value="{{$practice->title}}" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- فیلد description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">توضیحات:</label>
                <input type="text" name="description" value="{{$practice->description}}" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>


            <!-- دکمه‌ها -->
            <div class="flex gap-3 mt-6">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm">
                    ویرایش
                </button>
            </div>
        </div>
    </form>
</div>
@endsection