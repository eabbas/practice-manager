<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userSignup</title>
</head>
<body>
    <form action="{{url('user/check')}}" method="POST">
        @csrf
      
      <input type="text" name="phone" placeholder="PHONENUMBER"> 
      <input type="text" name="password" placeholder="PASSWORD">
      <?php
    //   dd($roles);
      ?> 
   
      <button type="submit">submit</button>
    </form>
</body>
</html>
