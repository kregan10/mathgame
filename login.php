
<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link href = "style/bootstrap.min.css" rel = "stylesheet"/>
      <title>Number Guessing game!</title>
      <meta charset="utf-8" />
    </head>
    <body>
      <div class="container">
        <div class="jumbotron">
          <header class="content">
            <h1>Math Game</h1>
            <h3>Guess the right numbers to get the best score!</h3>
            <br />
          </header>
      </div>
    </div>
    <div class="container">
      <h2>Please enter your information</h2>
      <form action="index.php" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email" required="a@a.a">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password" required="aaa">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</html>
