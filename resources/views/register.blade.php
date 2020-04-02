<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
    <div id="app" >
        <div>
            <h1>Register</h1>
        </div>
        <div>
      
            <img src="{{$avatar}}" alt="" width="100" height="100"> </br>
            <!-- {{$avatar}}</br> -->
             <!-- {{$social_id}}</br> -->
             <!-- {{$name}}</br>
             {{$email}}</br> -->
             <input type="hidden" name="avatar" id="" value="{{$avatar}}">
             <input type="hidden" name="social_id" id="" value="{{$social_id}}">
             <input type="text" name="name" id="" value="{{$name}}"><br>
             <input type="text" name="email" id="" value="{{$email}}" required><br>
             <input type="button" value="save">
            
        </div>
       
    </div>
</body>
</html>
