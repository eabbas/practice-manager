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
             لیست درخواست‌های دانشجویی درس 
               {{$lessonUsers->title}}
          </h1>
  
          <!-- جستجو -->
          <div class="flex items-center justify-between mb-4">
              <span class="text-slate-600 text-sm">تعداد درخواست‌ها  : {{count($lessonUsers->users)}} </span>
  
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
                          <th class=" text-center">تایید درخواست</th>
                          <th class=" text-center">حذف درخواست</th>
                      </tr>
                  </thead>
  
                  <tbody class="text-sm">
                        @foreach($lessonUsers->users as $user)
                        <?php //dd($lessonUsers); ?>
                      <!-- ردیف ۱ -->
                      <tr class="hover:bg-slate-50">
                           <td class="py-3 px-4">{{$user->name}} {{$user->family}}</td> 
                          <td class="py-3 px-4">{{$user->code}}</td>
                          <td class="py-3 px-2 text-center">
                             
                           @if($user->pivot->status == '0')
                                <a href="{{route('request_approve' , [$user->id , $lessonUsers->id])}}" class="px-3 py-1.5 rounded-md border border-blue-600 text-blue-600 hover:bg-blue-50">
                                    تایید
                                </a>
                            @endif

                            @if($user->pivot->status == '1')
                              <button class="px-3 py-1.5 rounded-md border border-green-600 text-green-600 hover:bg-blue-50">
                                   تایید شد
                              </button>
                            </td>
                            @endif
                            <td class="py-3 px-2 text-center">
                                <?php //dd($user->id); ?>
                                <a href="{{route('delete_request', [$lessonUsers->id , $user->id])}}" class="text-red-600 hover:text-red-800 transition duration-200" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            @endforeach
                        </tr>
                        {{-- @if(count ([$lessonUsers]) == 0 )
                        <p class="text-center text-slate-500 mt-6">درخواستی وجود ندارد.</p> 
                        @endif --}}
                  </tbody>
              </table>
          </div>
  
          <!-- وقتی لیست خالی باشد -->
          <div class="mt-5">
              @if (count($lessonUsers->users) == "0")
                <p class="text-center text-slate-500">   درخواستی وجود ندارد.</p>
                @endif
          </div>
     
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