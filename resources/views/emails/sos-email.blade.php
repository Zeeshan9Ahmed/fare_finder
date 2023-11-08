<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Boat Basin Lightening</p>
    <p>Name: {{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
    <p>Emergency Contact Number: {{auth()->user()->emergency_number}}  </p>
    <p>Location: <a href=" https://maps.google.com/?q={{auth()->user()->lat}},{{ auth()->user()->lang}} ">https://maps.google.com/?q= {{auth()->user()->lat}},{{ auth()->user()->lang}} </a>  </p>
    
</body>
</html>