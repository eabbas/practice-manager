
@extends('users.dashboard')
@section('title', 'edit lesson')
@section('content')
  <div class="max-w-4xl mx-auto p-4">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6">
            
            <form class="space-y-4" action="{{ url('lesson/update') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $lesson->id }}" name="id">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">عنوان درس</label>
                    <input type="text" name="title" value="{{ $lesson->title }}" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">توضیحات</label>
                    <input class="w-full p-3  border  border-gray-300 rounded-lg bg-gray-50 h-32" value="{{ $lesson->description }}" name="description"></input>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">گروه درس</label>
                        <input type="text" value="{{ $lesson->lesson_group }}" name="lesson_group" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50">
                    </div>
                  
                </div>

                
                    <button>ویرایش</button>
                </form>
        </div>
    </div>
</div>
@endsection