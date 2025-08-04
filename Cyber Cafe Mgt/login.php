

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: url('https://us.123rf.com/450wm/ohishi/ohishi1801/ohishi180100002/93767870-games-computer-online-in-internet-cafe.jpg');
      background-size: cover;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 500px;
      padding: 50px;
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      margin: 0 auto;
      margin-top: 200px;
      border-radius: 4px;
      box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.05);
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
      background-color: #6e8efb;
      color: #fff;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    button:hover {
      opacity: 1;
    }

    h2 {
      font-size: 50px;
      text-align: center;
      color: #ffffff;
      margin-top: 120px;
    }
  </style>
</head>
<body>
  <h2>Welcome to Cyber Cafe!</h2>
  <div class="main-wrapper login-body">
    <div class="login-wrapper">
      <div class="container">
        <div class="loginbox">
          <div class="login-right">
            <div class="login-right-wrap">
              <h1>Admin Login</h1>
              <!-- The login form -->
              <form method="POST" action="">
                <div>
                  <label>Email Address</label>
                  <input type="email" name="username" required>
                </div>
                <div>
                  <label>Password</label>
                  <div>
                    <input type="password" name="password" required>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-6">
                      <div class="checkbox">
                        <input type="checkbox">
                        <label>Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- The corrected submit button -->
                <button type="submit"><a href="home.php">Login</a></button>
                <label> Don't have an account register here! </label><a href="register.php">Register here</a>
              </form>
  
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
