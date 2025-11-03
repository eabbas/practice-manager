<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userSignup</title>
</head>
<body>
    <form action="{{url('user/store')}}" method="POST">
        @csrf
      <input type="text" name="name" placeholder="NAME"> 
      <input type="text" name="family" placeholder="FAMILY"> 
      <input type="text" name="phone" placeholder="PHINENUMBER"> 
      <input type="text" name="code" placeholder="PASSWORD"> 
         <select name="userRoles">
        <option value="{{$roles[0]['id']}}">{{$roles[0]['title']}}</option>
        <option value="{{$roles[1]['id']}}">{{$roles[1]['title']}}</option>
      </select>
      <button type="submit">submit</button>
    </form>
</body>
</html>