<?php session_start();

    $didLogIn = isset($_POST['email']) && isset($_POST['password']);


    if($didLogIn)
    {
      $_SESSION['email'] = $_POST['email'];
    }

    $isLoggedIn = isset($_SESSION['email']);

    if(!$isLoggedIn)
    {
      $url = "http://$_SERVER[HTTP_HOST]/login.php";
      header("Location: $url");
      exit;
    }

    if(!isset($_SESSION['score']))
    {
      $_SESSION['score'] = 0;
    }

    if(!isset($_SESSION['total']))
    {
      $_SESSION['total'] = 0;
    }

//check answer

    $shouldCheckAnswer = isset($_POST['answer']);

    if($shouldCheckAnswer)
    {
      if($_POST['answer'] != $_SESSION['solution'])
      {
        $_SESSION['total']++;
        // $ouput = "Score: " . $_SESSION['score'] . " / " . $_SESSION['total'];
        $output = '<h5 style="color: red">Incorrect: </h5>' . $_SESSION['score'] . " / " . $_SESSION['total'];
      }
      elseif($_POST['answer'] == $_SESSION['solution'])
      {
        $_SESSION['total']++;
        $_SESSION['score']++;
        $ouput = '<h5 style="color: green">Correct: </h5>' . $_SESSION['score'] . " / " . $_SESSION['total'];
      }
    }

//create new question

    $_SESSION['$randInt1'] = rand(0,20);
    $_SESSION['$randInt2']  = rand(0,20);
    $_SESSION['$randOperand'] = rand(0,1);

    if($_SESSION['$randOperand'] == 0)
    {
      $_SESSION['solution'] = $_SESSION['$randInt1'] + $_SESSION['$randInt2'];
      $_SESSION['$randOperand'] = '+';
    }
    if($_SESSION['$randOperand'] == 1)
    {
      $_SESSION['solution'] = $_SESSION['$randInt1']  - $_SESSION['$randInt2'];
      $_SESSION['$randOperand'] = "-";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href = "style/bootstrap.min.css" rel = "stylesheet"/>
    <title>Math Game</title>
    <meta charset="utf-8" />
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="col-sm-4 pull-right"><a href="logout.php" class="btn btn-default btn-sm">Logout</a></div>
    </nav>
  <div class="container">
    <div class="jumbotron">
      <header class="content">
          <h1>Math Game</h1>
          <h3>Enter in the correct answer!</h3>
          <br />
      </header>
      <form action="index.php" method="post" role="form" class="form-horizontal">

      <div class="row">
          <label class="col-sm-2 col-sm-offset-3"><?php echo $_SESSION['$randInt1'] ?></label>
          <label class="col-sm-2"><?php echo $_SESSION['$randOperand'] ?></label>
          <label class="col-sm-2">  <?php echo $_SESSION['$randInt2'] ?></label>
          <div class="col-sm-3"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-3 col-sm-offset-4">
            <input type="text" class="form-control" name="answer" placeholder="Enter answer" size="6" required="">
        </div>
        <div class="row">
          <button type="submit" class="btn btn-default" name="submit">Submit</button>
        </div>
      </form>
        <div class="row">
          <div class="col-md-2 col-md-offset-5"><?php echo $ouput?><?php echo $output ?></div>
        </div>
      </div>
    </div>
  </div>
</html>
