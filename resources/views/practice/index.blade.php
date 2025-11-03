@extends('users.dashboard')
@section('title', 'practice list')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- هدر صفحه -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">لیست تمرین‌ها</h1>
            <p class="text-gray-600">مدیریت و مشاهده تمام تمرین‌ها</p>
        </div>
    </div>

    <!-- جدول تمرین‌ها -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <!-- هدر جدول -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">تمامی تمرین‌ها ({{ $practiceWithLessons->count() }})</h2>
        </div>

        <!-- بدنه جدول -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عنوان</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">توضیحات</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">نام درس</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">عملیات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($practiceWithLessons as $practice)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-800 rounded-lg text-sm font-medium">
                                {{ $practice->id }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-medium text-gray-900">{{ $practice->title }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-600 text-sm max-w-xs truncate">
                                {{ $practice->description ?? 'بدون توضیحات' }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                @if(isset($practice->lessons))
                                    {{ $practice->lessons->title }}
                                @else
                                    بدون درس
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <a href="{{ url('/practice/show/' . $practice->id) }}" 
                                   class="text-green-600 hover:text-green-800 transition duration-200 p-2 hover:bg-green-50 rounded-lg"
                                   title="مشاهده">
                                    مشاهده
                                </a>
                                <a href="{{ url('/practice/edit/' . $practice->id) }}" 
                                   class="text-blue-600 hover:text-blue-800 transition duration-200 p-2 hover:bg-blue-50 rounded-lg"
                                   title="ویرایش">
                                   ویرایش
                                </a>
                                <a href="{{ url('/practice/delete/' . $practice->id) }}" 
                                   class="text-red-600 hover:text-red-800 transition duration-200 p-2 hover:bg-red-50 rounded-lg"
                                   title="حذف"
                                   onclick="return confirm('آیا از حذف این تمرین اطمینان دارید؟')">
                                    حذف
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- پیام خالی -->
        @if($practiceWithLessons->count() == 0)
        <div class="text-center py-12">
            <i class="fas fa-tasks text-4xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">هیچ تمرینی یافت نشد</p>
            <a href="{{ url('practice/create') }}" 
               class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">
                ایجاد اولین تمرین
            </a>
        </div>
        @endif
    </div>
</div>
@endsection