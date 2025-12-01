<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ثبت نام</title>
 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-blue-900 flex items-center justify-center my-16">
  <div class="w-[400px] h-[600px] bg-blue-50 rounded-2xl p-8">
    <h1 class="text-center text-blue-900 font-bold text-2xl mt-6">ثبت نام</h1>
    <form action="{{route('user.store')}} " method="POST">
      @csrf
      <div class="mt-2">
    <label for="name" class="text-blue-900 font-semibold mr-2">نام  </label>
    <input type="text" name=" name" id="name" placeholder="نام   " class="w-full mt-2 px-4 py-2 rounded-xl border border-blue-200 focus:outline-none transition">
  </div>

  <div class="mt-2">
    <label for="name" class="text-blue-900 font-semibold mr-2"> نام خانوادگی </label>
    <input type="text" name=" family" id="name" placeholder="  نام خانوادگی" class="w-full mt-2 px-4 py-2 rounded-xl border border-blue-200 focus:outline-none transition">
  </div>

   <div class="mt-2">
    <label for="phonNumber" class="text-blue-900 font-semibold mr-2"> شماره تماس  </label>
    <input type="text" name="phone" id="phonNumber" placeholder="  شماره تماس " class="w-full mt-2 px-4 py-2 rounded-xl border border-blue-200 focus:outline-none transition">
  </div>

  <div class="mt-2">
    <label for="code" class="text-blue-900 font-semibold mr-2 ">  کد دانشجویی  </label>
    <input type="password" name=" code" id="code" placeholder="   کد دانشجویی " class="w-full mt-2 px-4 py-2 rounded-xl border border-blue-200 focus:outline-none transition">
  </div>

      <div class="mt-2">
        <label class="block mb-1 font-medium text-blue-900 mr-2">نوع کاربر</label>

        <select name="userRoles" class="w-full p-2 border text-blue-900 rounded-lg  border-blue-200 focus:outline-none transition">
          {{-- <option   class=" text-blue-900" value="{{$roles[0]['id']}}">{{$roles[0]['title']}}</option>
          <option value="{{$roles[1]['id']}}" class=" text-blue-900">{{$roles[1]['title']}}</option> --}}
          @foreach ($roles as $role)
              <option class=" text-blue-900" value="{{ $role->id }}">{{ $role->title }}</option>
          @endforeach
        </select>
      </div>

  <div class="mt-4">
    <button type="submit" class="w-full h-[40px] bg-blue-900 text-white rounded-xl ">ثبت نام</button>
</form>
  </div>
  </div>

</body>
</html>
