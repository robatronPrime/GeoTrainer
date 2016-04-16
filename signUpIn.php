<?php
  /*sign in php*/
  require_once 'Dbconfig.php';

  if($user->is_loggedin()!="")
  {
    $user->redirect('index.html');
  }

  if(isset($_POST['btn-login']))
  {
    $uname = $_POST['txt_uname_email'];
    $umail = $_POST['txt_uname_email'];
    $upass = $_POST['txt_password'];

    if($user->login($uname,$umail,$upass))
    {
      $user->redirect('index.html');
    }
    else
    {
      $error = "Wrong Details !";
    }
  }

  /*sign up php*/
  if($user->is_loggedin()!="")
  {
      $user->redirect('index.html');
  }

  if(isset($_POST['btn-signup']))
  {
    $uname = trim($_POST['txt_uname']);
    $umail = trim($_POST['txt_umail']);
    $upass = trim($_POST['txt_upass']);

    if($uname=="") {
        $error[] = "provide username !";
      }
      else if($umail=="") {
        $error[] = "provide email id !";
      }
      else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
      }
      else if($upass=="") {
        $error[] = "provide password !";
      }
      else if(strlen($upass) < 6){
        $error[] = "Password must be atleast 6 characters";
      }
      else
      {
        try
        {
          $stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $row=$stmt->fetch(PDO::FETCH_ASSOC);

         if($row['user_name']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['user_email']==$umail) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            if($user->register($fname,$lname,$uname,$umail,$upass))
            {
                $user->redirect('sign-up.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="p:domain_verify" content="f32adf17ba04bc43b709cae3417f16ae"/>
    <link rel='icon' href='images/favicon.ico'>
    <title>GeoTrainer.co.uk: Find Gyms Nere You!</title>
    <!-- unsemantic css library -->
    <link rel="stylesheet" type="text/css"
        href="unsemantic-grid-responsive-tablet.css"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <!-- font-awesome image library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>

  <body>
    <div id="Title" class="grid-100 tablet-grid-100 mobile-grid-100">
        <img src="images/logo.png" alt="logo" id="altLogo">
    </div>

    <div id="Content" class="grid-100 tablet-grid-100 mobile-grid-100">
        <fieldset id="signUp">
          <h2>Sign Up To Start Creating Workouts</h2>
          <form class="form">
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
            }
            ?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                 <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
          </form>
        </fieldset>

        <fieldset id="signIn">
          <h2>Already a Member?</h2>
          <p>Welcome back! Sign in to get started.</p>
          <button type="button" id="inStart">Click to Start</button>

          <section id="inField" class="hide">
            <form method="post">
              <?php
                if(isset($error))
                  {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                      </div>
                      <?php
                  }
                ?>
              <div class="form-group">
                <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
              </div>
              <div class="form-group">
               <input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
              </div>
              <div class="clearfix"></div><hr />
              <div class="form-group">
               <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                   <i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
                </button>
              </div>
            </form>
          </section>
        </fieldset>
    </div>

    <script>
      var start = document.getElementById('inStart');

        start.onclick = function() {
            showHideWBT()
          }

        function showHideWBT() {
          var inF = document.getElementById('inField');
          inF.style.display = (inF.style.display == 'block') ? 'none' : 'block';
      }
    </script>
  </body>
</html>
