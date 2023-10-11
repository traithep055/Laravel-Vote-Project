<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login and Register</title>
<style>
    @import url(https://fonts.googleapis.com/css?family=Poppins:300);
 html {
 height: 100%;
 }
 body {
 height: 100%;
 margin: 0;
 padding: 0;
 display: flex;
 align-items: center;
 justify-content: center;
 flex-direction: column; /* จัดเรียงเนื้อหาแนวตั้ง */
 }
 #video-background {
 width: 100%;
 height: 100%;
 position: absolute;
 top: 0;
 left: 0;
 object-fit: cover;
 z-index: -1; /* ให้วิดีโออยู่หลังสุด */
 }
 .login-page {
 display: flex;
 flex-direction: column; /* จัดเรียงเนื้อหาแนวตั้ง */
 align-items: center; /* จัดให้เนื้อหาอยู่ตรงกลางแนวนอน */
 text-align: center;
 }
 .form {
 position: relative;
 z-index: 1;
 text-align: center;
 width: 400px;
 padding: 40px;
 background: rgba(0, 0, 0, 0.5);
 box-sizing: border-box;
 box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
 border-radius: 10px;
 }
 .form input {
 width: 100%;
 padding: 10px 0;
 font-size: 13px;
 color: #fff;
 margin-bottom: 30px;
 border: none;
 border-bottom: 1px solid #fff;
 outline: none;
 background: transparent;
 }
 h2 {
 color: white;
 }
 .btn {
 position: relative;
 display: inline-block;
 padding: 10px 20px;
 color: #df8208;
 font-size: 16px;
 text-decoration: none;
 overflow: hidden;
 transition: .5s;
 margin-top: 15px;
 letter-spacing: 2px;
 }
 .btn:hover {
 background: #df8208;
 color: #fff;
 border-radius: 5px;
 box-shadow: 0 0 5px #df8208, 0 0 25px #df8208, 0 0 50px #df8208, 0 0 100px #df8208;
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
 background: linear-gradient(90deg, transparent, #df8208);
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
 background: linear-gradient(180deg, transparent, #df8208);
 animation: btn-anim2 1s linear infinite;
 animation-delay: .25s;
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
 background: linear-gradient(270deg, transparent, #df8208);
 animation: btn-anim3 1s linear infinite;
 animation-delay: .5s;
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
 background: linear-gradient(360deg, transparent, #df8208);
 animation: btn-anim4 1s linear infinite;
 animation-delay: .75s;
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
<body>
<video autoplay muted loop id="video-background">
  <source src="{{ asset('image/video.mp4') }}" type="video/mp4">
</video>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post">
      <h2>ระบบเลือกตั้ง</h2>
      <h2>Hogwarts School</h2>
      <a class="btn" href="{{ route('login') }}">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4>Login</h4>
      </a>
      <br>
      <a class="btn" href="{{ route('register') }}">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h4>Register</h4>
      </a>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="main.js"></script>
</body>
</html>