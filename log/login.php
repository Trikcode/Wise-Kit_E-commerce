
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
    <title>Notice Board Login</title>
  </head>
  <body>
    <h1>Login to Our Notice Board</h1>
    <form class="ui form" method="post" action="login.php">
      <?php echo display_error(); ?>
      <div class="field">
        <label>username</label>
        <input type="text" name="username" placeholder="username" />
      </div>
      <div class="field">
        <label>password</label>
        <input type="text" name="password" placeholder="password" />
      </div>

      <button class="ui button" type="submit" name="login_btn">
        <span>Login</span>
        <div class="liquid"></div>
      </button>
      <p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
    </form>
  </body>
</html>
