<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
</head>
<body>
	<style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://wallpapercave.com/wp/wp7728113.jpg');
            background-size: cover;
        }
        .container {
            width: 400px;
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.13);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 4px;
        }
        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        button {
            background-color: #080808;
            color: rgb(0, 255, 8);
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        button:hover {
            opacity:1;
        }
    </style>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-right">
<div class="login-right-wrap">
<h1>Register</h1>

<form action="register.php">
<div class="form-group">
<label class="form-control-label">Name</label>
<input class="form-control" type="text">
</div>
<div class="form-group">
<label class="form-control-label">Email Address</label>
<input class="form-control" type="text">
</div>
<div class="form-group">
<label class="form-control-label">Password</label>
<input class="form-control" type="text">
</div>
<div class="form-group">
<label class="form-control-label">Confirm Password</label>
<input class="form-control" type="text">
</div>
<div class="form-group mb-0">
<button class="btn btn-lg btn-block btn-primary" type="submit">Register</button>
</div>
<div class="text-center dont-have">Already have an account? <a href="login.html">Login</a></div>
</body>
</html>