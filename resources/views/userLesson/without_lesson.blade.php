
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
    <title>لیست درس ها</title>
</head>

  <body class="bg-slate-100 p-6">
  
      <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
  
          <h1 class="text-xl font-bold text-slate-800 mb-4">
            <i class="fas fa-list ml-2 text-[#023e83]"></i>
              لیست درس های من
          </h1>
  
          <!-- جدول -->
          <div class="overflow-x-auto border border-slate-200 rounded-lg">
              <table class="w-full text-right">
                  <thead class="bg-slate-50 text-slate-600 text-sm">
                      <tr>
                      </tr>
                  </thead>
                </table>
            </div>
  
          <!-- وقتی لیست خالی باشد -->
          <p class="text-center text-slate-500 mt-6">درسی برای شما وجود ندارد.</p> 
  
      </div>
  
  </body>
  </html>

@endsection



