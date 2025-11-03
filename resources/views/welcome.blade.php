<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>سامانه ارتباطی استاد و دانشجو</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <style>
        #datetime-display {
            direction: rtl;
            text-align: right;
            font-size: 1.1rem;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="bg-[url('{{ asset('assets/img/345.jpg') }}')] h-dvh">
        <header class="p-4 flex items-start justify-between z-20">
            
            <p id="datetime-display" class="text-white mt-2 w-1/3"></p>

            <div class="text-center w-1/3">
                <span class="text-white text-2xl font-extrabold whitespace-nowrap block">سامانه ی ارتباطی استاد و دانشجو</span>
                <span class="text-white text-lg mt-2 block">بارگذاری تکالیف</span>
            </div>
            <div class="w-1/3">
                <img id="icon-display" class="w-32 h-20 lg:w-40 lg:h-24 float-left" src="{{ asset('assets/img/121.png') }}" alt="icon">
            </div>
        </header>
        
        <main class="flex flex-col items-center justify-center w-full">
            
            <div class="text-center"> 
                <img src="{{ asset('assets/img/777.png') }}" alt="img" class="w-80 h-auto">
            </div>
            
            <div class="flex flex-col items-center lg:flex-row gap-4 w-full justify-center mt-10">
                <a href="{{ route('user.login') }}"
                    class="active:bg-[#2168ba] px-10 rounded-[10px] py-2 bg-[#023e83] text-white transition-all duration-700 hover:bg-[#2168ba] text-xl hover:text-[#011f52] transition duration-200">ورود</a>
                <a href="{{ route('user.signup') }}"
                    class="active:bg-[#2168ba] px-10 rounded-[10px] py-2 bg-[#023e83] text-white transition-all duration-700 hover:bg-[#2168ba] text-xl hover:text-[#011f52] transition duration-200">ثبت نام</a>
            </div>
            
        </main>

    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };

            const dateString = now.toLocaleDateString('fa-IR', options);
            
            document.getElementById('datetime-display').textContent = dateString;
        }

        updateDateTime();
        
        setInterval(updateDateTime, 1000); 
    </script>
</body>
</html>