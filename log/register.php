<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
      integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/login.css" />

    <title>Notice Board Registration</title>
  </head>
  <body>
    <div class="header">
      <h1>Our Notice Board</h1>
      <h3>Register Today</h3>
    </div>
    <form class="ui form" method="post" action="register.php">
          <?php echo display_error(); ?>  

    <div class="field">
        <label>Username</label>
        <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>" />
      </div>
      <div class="field">
        <label>Email</label>
        <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>" />
      </div>
      <div class="field">
        <label>Password</label>
        <input type="text" name="password_1" placeholder="password" />
      </div>
      <div class="field">
        <label>Confirm password</label>
        <input type="text" name="password_2" placeholder="password" />
      </div>

      <button class="ui button" type="submit" name="register_btn">
        <span>Register</span>
        <div class="liquid"></div>
      </button>
      <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
  </body>
</html>
