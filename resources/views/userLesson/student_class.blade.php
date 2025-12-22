
@extends('users.dashboard')
@section('title', 'practice list')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'vazir': ['Vazirmatn', 'sans-serif'],
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
        
        .table-row:hover {
            background-color: #f8fafc;
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }
        
        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .status-inactive {
            background-color: #fef2f2;
            color: #dc2626;
        }
    </style>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>لیست درخواست‌ها</title>
</head>

  <body class="bg-slate-100 p-6">
  
      <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
  
          <h1 class="text-xl font-bold text-slate-800 mb-4">
            <i class="fas fa-list ml-2 text-[#023e83]"></i>
              لیست درس های من
          </h1>
          <!-- جستجو -->
          <div class="flex items-center justify-between mb-4">
              <span class="text-slate-600 text-sm">تعداد درس های من : {{count($user->lessons)}}</span>
  
              <div class="flex gap-2">
                  <input type="text"
                         placeholder="جستجو..."
                         class="px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
  
                  <button class="px-4 py-2 bg-slate-200 rounded-lg text-slate-700">
                      پاک‌سازی
                  </button>
              </div>
          </div>

          <!-- جدول -->
          <div class="overflow-x-auto border border-slate-200 rounded-lg">
              <table class="w-full text-right">
                  <thead class="bg-slate-50 text-slate-600 text-sm">
                      <tr>
                          <th class="py-3 px-4"> نام درس</th>
                          <th class="py-3 px-4">نام استاد</th>
                          <th class="py-3 px-4 text-center">مشاهده درس</th>
                          <th class="py-3 px-4 text-center">تمرینات</th>
                      </tr>
                  </thead>
  
                  <tbody class="text-sm">
                        @foreach($user->lessons as $lesson)
                        <?php //dd($lessons->lesson->title) ?>
                      <tr class="hover:bg-slate-50">
                          <td class="py-3 px-4">{{$lesson->title}}</td> 
                      <td class="py-3 px-4">{{$lesson->master->name}} {{$lesson->master->family}}</td>
                          <td class="py-3 px-4 text-center">
                          <a href="{{route('lesson_show' , [$lesson->id])}}" class="px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                                     جزئیات درس
                                </a>
                            </td>
                            <td class="py-3 px-4 text-center">
                            <a href="{{route('practice_list' , [$lesson->id])}}" class="px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                                 مشاهده تمرینات
                            </a>
                          </td>
                      </tr>
                        {{-- @endif --}}
                        @endforeach 
                        {{-- @if( ({{$lessonUsers}}==0)) --}}
                                 {{-- <p class="text-center text-slate-500 mt-6">درخواستی وجود ندارد.</p> 
                                 @endif --}}
                    </tbody>
                </table>
            </div>
  
          <!-- وقتی لیست خالی باشد -->
          @if (count($user->lessons ) == "0")
          <p class="text-center text-slate-500 mt-6">درسی برای شما وجود ندارد.</p>
          @endif

      </div>
  
  </body>
  </html>
  <script>
        // جستجو در جدول
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        </script>
@endsection



