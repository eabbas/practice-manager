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
{{-- <form action="{{route('list_requests')}}" method="POST"> --}}

  <body class="bg-slate-100 p-6">
  
      <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
  
          <h1 class="text-xl font-bold text-slate-800 mb-4">
        <i class="fas fa-list ml-2 text-[#023e83]"></i>
              لیست پاسخ های دانشجویان
          </h1>
  
          <!-- جستجو -->
          <div class="flex items-center justify-between mb-4">
              <span class="text-slate-600 text-sm">تعداد پاسخ های دانشجویان : {{count($practiceResponses)}}</span>
  
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
                          <th class="py-3 px-4">نام دانشجو</th>
                          <th class="py-3 px-4">شماره دانشجویی</th>
                          <th class="py-3 px-4">پاسخ های دیده نشده</th>
                          <th class="py-3 px-4 text-center">مشاهده</th>
                      </tr>
                  </thead>
  
                  <tbody class="text-sm">
                      {{-- @if($practiceResponses == NULL) --}}
                        @foreach($practiceResponses as $response)
                           <?php //dd($response->users->name); ?>
                       {{-- <p class="text-center text-slate-500 mt-6">پاسخی برای این تمرین وجود ندارد.</p>    --}}
                      <!-- ردیف ۱ -->
                      <tr class="hover:bg-slate-50">
                          <td class="py-3 px-4">{{$response->users->name}} {{$response->users->family}}</td> 
                          <td class="py-3 px-4">{{$response->users->code}}</td>
                          <td class="flex items-center mr-10 py-3 px-4" style="position: relative;">
                            <span style="position: absolute;width:20px;height:20px;border-radius:20px;color:white;background-color:rgb(50, 125, 222);text-align:center;top:10px;font-weight:bold;">
                                {{$response->userResponseCount}}
                            </span>
                           
                            <svg   width="40" height="40" fill="oklch(42.4% 0.199 265.638)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                
                            <path fill-rule="evenodd" d="M12 5a4 4 0 0 0-4 4v2.756c0 1.294-.89 2.278-1.45 2.867A1.99 1.99 0 0 0 6 16h12a1.99 1.99 0 0 0-.55-1.377c-.56-.59-1.45-1.573-1.45-2.867V9a4 4 0 0 0-4-4ZM6 9a6 6 0 1 1 12 0v2.756c0 .402.292.85.9 1.49A3.99 3.99 0 0 1 20 16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2 3.99 3.99 0 0 1 1.1-2.755c.608-.64.9-1.087.9-1.489V9Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M9.766 18.916a1 1 0 0 1 1.324.497 1 1 0 0 0 1.81.026 1 1 0 0 1 1.797.876 3 3 0 0 1-5.429-.076 1 1 0 0 1 .498-1.323Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M12 2a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0V3a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                            </svg>
                            </td>
                          <td class="py-3 px-4 text-center">
                              <a href="{{route('student_responses' , [$response->users->id ,$practice->id ,$practice->master->id ])}}" class="px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                                    <?php //dd($practiceId); ?>
                                    مشاهده پاسخ ها
                                </a>
                          </td>
                      </tr>
                      @endforeach
                      {{-- @endif --}}
                  </tbody>
              </table>
          </div>
  
          <!-- وقتی لیست خالی باشد -->
           {{-- @if ($practiceResponses == NULL) 
             <p class="text-center text-slate-500">  تمرینی برای این درس وجود ندارد.</p>
             @endif --}}
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