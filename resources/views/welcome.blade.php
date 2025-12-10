<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- فونت -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- لوتی برای انیمیشن -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { vazir: ['Vazirmatn'] },
                    colors: {
                        primary: "oklch(37.9% 0.146 265.522)",
                        darkBlue: "#024bbf"
                    }
                }
            }
        }
    </script>

    <title>University Login</title>
</head>

<body class="font-vazir bg-white">

    <div class="flex min-h-screen">

        <!-- بخش چپ: دانشگاه + آبی -->
        <div class="w-1/2 bg-primary text-white p-16 flex flex-col justify-center">

            <div class="text-3xl font-bold mb-8">سامانه ارتباطی استاد و دانشجو</div>

            <div class="flex justify-center mb-8">
                <!-- آیکون دانشگاه -->

                {{-- <div class="w-64 h-64">
                    <iframe
                        src="https://lottie.host/embed/d9118fb5-40eb-4427-bcca-fc3f79b06876/yM81BJfLkw.json"
                        class="w-full h-full border-0">
                    </iframe>
                </div>
 --}}

                <div class="w-full flex flex-row justify-center items-center">
                   

                    {{-- <video
                        class="w-3/4"
                        muted
                        loop
                        preload="auto"
                        autoPlay
                        playsInline
                        src={{ asset('assets/videos/taskManagement.mp4') }}
                    ></video> --}}

                </div>

                    {{-- <lottie-player
                    src="{{ asset('animations/task.json') }}"
                    background="transparent"
                    speed="1"
                    style="width:260px;height:260px"
                    loop autoplay>
                </lottie-player> --}}

            <!-- <lottie-player
                src="https://app.lottiefiles.com/share/d9118fb5-40eb-4427-bcca-fc3f79b06876"
                background="transparent"
                speed="1"
                style="width: 260px; height: 260px;"
                loop autoplay>
            </lottie-player> -->




            </div>

            <h2 class="text-3xl font-bold mb-4">خوش آمدید!</h2>

            <p class="text-sm opacity-90 leading-7">
                سامانه جامع دانشگاه برای دسترسی سریع‌تر به خدمات آموزشی،  
                کلاس‌ها، نمرات و ارتباط با اساتید.
            </p>

        </div>

        <!-- بخش راست: فرم -->
        <div class="w-1/2 p-20 flex flex-col justify-center">

            <h2 class="text-3xl font-bold text-darkBlue mb-6">ورود</h2>

            <p class="text-gray-500 mb-6 text-sm">
                حساب کاربری ندارید؟
                <a href="#" class="text-primary font-semibold">ایجاد حساب</a>
            </p>

            <div class="space-y-6">

                <input type="text" placeholder="شماره تلفن"
                    class="w-full border-b border-gray-300 focus:border-primary outline-none py-3 text-lg" />

                <input type="password" placeholder="رمز عبور"
                    class="w-full border-b border-gray-300 focus:border-primary outline-none py-3 text-lg" />

            </div>

            <div class="flex justify-between items-center mt-8">
                <button
                    class="bg-primary text-white px-12 py-3 rounded-md hover:bg-darkBlue transition text-lg">
                    ورود
                </button>

                <!-- <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" class="accent-primary">
                    یادآوری رمز
                </label> -->
            </div>

            <a href="#" class="text-primary text-sm mt-6 block hover:underline">
                رمز عبور را فراموش کرده‌اید؟
            </a>

        </div>

    </div>

</body>

</html>
