<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tutor Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css" type="text/css">
</head>
<body>
  <div class="bar">
    <button class="back-btn" id="back-btn">← BACK TO HOME</button>
    <div class="right-group">
      <label class="text">Don't have an account? New member</label>
      <button class="signup-btn" id="signupButton">SIGN UP</button>
    </div>
  </div>

  <div class="center-wrapper">
    <section>
      <article class="form">
        <form action="login.php" method="post">
          <div>
            <p>Email Address</p>
            <input type="email" name="emailTutor" required>

            <p>Password</p>
            <input type="password" name="passwordTutor" required>
          </div>

          <div class="status">
            <p>I am a Tutor</p>
          </div>

          <div class="form-buttons" style="margin-top: 20px;">
            <input type="submit" value="Proceed">
            <a href="mainpage.php" style="margin-left: 20px;">Cancel</a>
          </div>
        </form>
      </article>
    </section>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("signupButton").onclick = function () {
        window.location.href = "signup.html";
      };
      document.getElementById("back-btn").onclick = function () {
        window.location.href = "mainpage.html";
      };
    });
  </script>

  <footer>
    <p class="footer">2025 LumiLearnHub. All rights reserved.</p>
  </footer>
</body>
</html>
