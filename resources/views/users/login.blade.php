<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>login</title>
    <style>
    </style>
</head>
<body>
    <div class="flex flex-col lg:flex-row-reverse min-h-screen">
        <div class="flex justify-center w-full lg:w-6/12 bg-[url('{{ asset('assets/img/345.jpg') }}')] p-4 lg:p-0">
            <div class="flex flex-col mb-9 items-center justify-center lg:justify-start mt-0 lg:my-12 w-full max-w-md">
                <div>
                    <img class="cursor-pointer w-40 h-30 lg:w-30 lg:h-20" src="{{ asset('assets/img/121.png') }}" alt="icon">
                </div>
                <div class="my-9 hidden lg:block"> 
                    <img class="lg:w-90 lg:h-70" src="{{ asset('assets/img/777.png') }}" alt="img">
                </div>
                <div class="flex flex-col items-center w-full text-white text-center px-4">
                    <h1 class="hidden lg:block text-3xl font-bold">سریع، کارآمد و محصولی</h1>
                    <p class="hidden lg:block text-sm mt-5 font-bold">در این نوع پست، <a href="#" class=" text-yellow-400">وبلاگر</a> فردی را که با او مصاحبه کرده اند معرفی می کند و اطلاعات پس زمینه ای در مورد آن ارائه می دهد <a href="#" class="text-yellow-400">مصاحبه شونده</a> and their ویاک زیر این مصاحبه متنی است.</p>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-6/12 bg-white lg:h-screen flex justify-center">
            <div class="flex flex-col items-center w-full max-w-sm h-full justify-start pt-10 lg:pt-[122px] px-4">
                <h1 class="text-2xl font-bold text-[#252F4A]">ورود</h1>
                <div class="flex flex-row-reverse gap-3 my-8 w-full justify-center">
                    </a>
                            <path d="M27.9851 14.2618C27.9851 13.1146 27.8899 12.2775 27.6837 11.4094H14.2788V16.5871H22.1472C21.9886 17.8738 21.132 19.8116 19.2283 21.1137L19.2016 21.287L23.44 24.4956L23.7336 24.5242C26.4304 22.0904 27.9851 18.5093 27.9851 14.2618Z" fill="#4285F4" />
                            <path d="M14.279 27.904C18.1338 27.904 21.37 26.6637 23.7338 24.5245L19.2285 21.114C18.0228 21.9356 16.4047 22.5092 14.279 22.5092C10.5034 22.5092 7.29894 20.0754 6.15663 16.7114L5.9892 16.7253L1.58205 20.0583L1.52441 20.2149C3.87224 24.7725 8.69486 27.904 14.279 27.904Z" fill="#34A853" />
                            <path d="M6.15656 16.7113C5.85516 15.8432 5.68072 14.913 5.68072 13.9519C5.68072 12.9907 5.85516 12.0606 6.14071 11.1925L6.13272 11.0076L1.67035 7.62109L1.52435 7.68896C0.556704 9.58024 0.00146484 11.7041 0.00146484 13.9519C0.00146484 16.1997 0.556704 18.3234 1.52435 20.2147L6.15656 16.7113Z" fill="#FBBC05" />
                            <path d="M14.279 5.3947C16.9599 5.3947 18.7683 6.52635 19.7995 7.47204L23.8289 3.6275C21.3542 1.37969 18.1338 0 14.279 0C8.69485 0 3.87223 3.1314 1.52441 7.68899L6.14077 11.1925C7.29893 7.82856 10.5034 5.3947 14.279 5.3947Z" fill="#EB4335" />
                        </svg>
                    </a>
                </div>
                <div class="hidden flex flex-row-reverse items-center gap-6 w-full justify-center my-4">
                    <div class="flex-grow h-px bg-[#F1F1F4]"></div>
                    <div class="text-[#424242] text-sm whitespace-nowrap">توسط شماره تلفن !</div>
                    <div class="flex-grow h-px bg-[#F1F1F4]"></div>
                </div>
                <form action="{{ route('user.check') }}" class="my-0 flex flex-col items-center gap-4 w-full" method="post">
                    @csrf
                    <input type="number"
                        class="focus:border-[#031f51] p-[13px] rounded-[7px] border-1 border-[#DBDFE9] outline-none w-full max-w-[400px]"
                        name="phone" placeholder="شماره تلفن">
                    <input type="password"
                        class="focus:border-[#031f51] p-[13px] rounded-[7px] border-1 border-[#DBDFE9] outline-none w-full max-w-[400px]"
                        name="password" placeholder="رمز عبور">
                    
                    <div class="w-full max-w-[400px] flex flex-col gap-4 mt-0 justify-between items-center">
                        <a href="#" class="text-[#1B84FF] text-sm">فراموشی رمز عبور</a>
                        <button type="submit" class="bg-[#031f51] w-full hover:bg-[#056EE9]/90 px-8 py-3 rounded-[10px] text-white font-bold transition duration-200">ورود</button>
                    </div>
                    <div class="w-full max-w-[400px] text-center mt-0">
                        <span class="text-[#4B5675] text-sm"> هنوز وارد نشدی؟<a href="#" class="text-[#1B84FF] font-bold">ثبت نام!</a></span>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</body>
</html>
