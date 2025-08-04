<!DOCTYPE html>
<body>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: url('https://us.123rf.com/450wm/ohishi/ohishi1801/ohishi180100002/93767870-games-computer-online-in-internet-cafe.jpg');
      background-size: cover;
    }

    .container {
      width: 400px;
      padding: 50px;
      background: rgba(255, 255, 255, 0.8); /* Lighter background color */
      backdrop-filter: blur(10px); /* blur */
      border: 1px solid rgba(255, 255, 255, 0.3); /* Lighter border color */
      margin: 0 auto;
      margin-top: 200px;
      border-radius: 6px;
      box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.05); /* shadow for depth */
    }

    input[type=text], input[type=email], input[type=password] {
      width: 100%;
      padding: 20px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    button {
      background-color: #fff; /* White background color */
      color: #000; /* Black text color */
      padding: 14px 20px;
      margin: 9px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    button:hover {
      opacity: 1;
    }
  </style>

<div class="main-wrapper login-body">
  <div class="login-wrapper">
    <div class="container">
      <div class="loginbox">
        <div class="login-right">
          <div class="login-right-wrap">
            <h1>Forgot Password?</h1>
            <p>Enter your email to get a password reset link</p>

            <form action="login.html">
              <div>
                <label>Email Address</label>
                <input type="text">
              </div>
              <div>
                <button type="submit">Reset Password</button>
              </div>
            </form>

            <div>Remember your password? <a href="login.php">Login</a></div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
