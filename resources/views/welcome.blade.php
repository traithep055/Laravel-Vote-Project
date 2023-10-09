<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login and Register</title>
{{-- <link rel="stylesheet" href="styles.css"> --}}
<style>
    @import url(https://fonts.googleapis.com/css?family=Poppins:300);
 html {
 height: 100%;
 }
 body{
 margin:0;
 padding:0;
 font-family: sans-serif;
 background: linear-gradient(135deg, #e8d230, #7f01b4);
 }
 .login-page {
 width: 400px;
 padding: 8% 0 0;
 margin: auto;
 }
 .form {
 position: relative;
 z-index: 1;
text-align: center;
 position: absolute;
 top: 50%;
 left: 50%;
 width: 400px;
 padding: 40px;
 transform: translate(-50%, -50%);
 background: linear-gradient(135deg, #ea9337, #e0cf33);
 box-sizing: border-box;
 box-shadow: 0 15px 25px rgb(0, 0, 0);
 border-radius: 10px;
 }
 .form input {
 width: 100%;
 padding: 10px 0;
 font-size: 13px;
 color: #ffffff;
 margin-bottom: 30px;
 border: none;
 border-bottom: 1px solid #ffffff;
 outline: none;
 background: transparent;
 
 }
 h2{
 color:white;
 }
 .form .message {
 margin: 15px 0 0;
 color: #010000;
 font-size: 12px;
 }
 .form .message a {
 color: #000000;
 text-decoration: none;
 }
 .form .register-form {
 display: none;
 }
 .btn {
 position: relative;
 display: inline-block;
 padding: 10px 20px;
 color: #000000;
 font-size: 16px;
 text-decoration: none;
 overflow: hidden;
 transition: .5s;
 margin-top: 15px;
 letter-spacing: 2px
 }
 .btn:hover {
 background: #ffffff;
 color: #fff;
 border-radius: 5px;
 box-shadow: 0 0 5px #ffffff,
 0 0 25px #ffffff,
 0 0 50px #ffffff,
 0 0 100px #ffffff;
 }
 .btn span {
 position: absolute;
 display: block;
 }

 .btn span:nth-child(1) {
 top: 0;
 left: -100%;
 width: 100%;
 height: 2px;
 background: linear-gradient(90deg, transparent, #ffffff);
 animation: btn-anim1 1s linear infinite;
 }

 @keyframes btn-anim1 {
 0% {
 left: -100%;
 }
 50%,100% {
 left: 100%;
 }
 }

 .btn span:nth-child(2) {
 top: -100%;
 right: 0;
 width: 2px;
 height: 100%;
 background: linear-gradient(180deg, transparent, #ffffff);
 animation: btn-anim2 1s linear infinite;
 animation-delay: .25s
 }

@keyframes btn-anim2 {
0% {
top: -100%;
}
50%,100% {
top: 100%;
}
}

.btn span:nth-child(3) {
bottom: 0;
right: -100%;
width: 100%;
height: 2px;
background: linear-gradient(270deg, transparent, #ffffff);
animation: btn-anim3 1s linear infinite;
animation-delay: .5s
}

@keyframes btn-anim3 {
0% {
right: -100%;
}
50%,100% {
right: 100%;
}
}

.btn span:nth-child(4) {
bottom: -100%;
left: 0;
width: 2px;
height: 100%;
background: linear-gradient(360deg, transparent, #ffffff);
animation: btn-anim4 1s linear infinite;
animation-delay: .75s
}

@keyframes btn-anim4 {
0% {
bottom: -100%;
}
50%,100% {
bottom: 100%;
}
}

</style>
</head>
<body style="display:flex; align-items:center; justify-content:center;">
<div class="login-page">
<div class="form">
<form class="login-form" method="post">
<a class="btn" href="{{ route('login') }}">
<span></span>
<span></span>
<span></span>
<span></span>
Login
</a>
<br>
<a class="btn" href="{{ route('register') }}">
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   Register
   </a>
</form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="main.js"></script>
</body>
</html>
