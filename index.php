<?php
include_once 'dbconfig.php';
include_once 'user.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="p:domain_verify" content="f32adf17ba04bc43b709cae3417f16ae"/>
    <link rel='icon' href='images/favicon.ico'>
    <title>GeoTrainer.co.uk: Find Gyms Nere You! Welcome - <?php print($userRow['user_email']); ?></title>
    <!-- unsemantic css library -->
    <link rel="stylesheet" type="text/css"
        href="unsemantic-grid-responsive-tablet.css"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <!-- font-awesome image library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="ui.js"></script>
    <!-- bxSlider CSS file -->
    <link href="jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
</head>
<body>

    <div id="Title" class="grid-20 tablet-grid-25 mobile-grid-100">

        <img src="images/logo.png" alt="logo" id="Logo">
        <div>
            <i class="fa fa-user fa-5x"></i>
            <h2>Welcome : <?php print($userRow['username']); ?></h2>
            <label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
        </div>

        <div id="Nav" class="grid-100 tablet-grid-100 mobile-grid-100">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="signIn.html">Sign In</a></li>
                <li><a href="signUp.html">Sign Up</a></li>
                <li><a href="findGym.html">Find a Gym</a></li>
                <li><a href="searchWork.html">Search Workouts</a></li>
            </ul>
        </div>
    </div>

    <div id="extend">
      <button type="button" id="exBut">
        <i class="fa fa-bars fa-3x"></i>
      </button>
    </div>

    <div id="Content" class="grid-75 tablet-grid-80 mobile-grid-100">
        <h2>Current Workout</h2>
        <section id="CWorkPics" align="center">
            <div class="slider1">
            <div class="slide">
                <img src="images/ballLeg.png" alt="exersizePic" id="currWork">
                <h3>Ball Assisted Leg Raise</h3>
                <p>Number of reps: 10</p>
            </div>
            <div class="slide">
                <img src="images/pushUp.png" alt="exersizePic" id="currWork">
                <h3>Push Up</h3>
                <p>Number of reps: 10</p>
            </div>
            <div class="slide">
                <img src="images/runFloor.png" alt="exersizePic" id="currWork">
                <h3>Mountain Climer</h3>
                <p>Number of reps: 20</p>
            </div>
            <div class="slide">
                <img src="images/sitUp.png" alt="exersizePic" id="currWork">
                <h3>Situps</h3>
                <p>Number of reps: 15</p>
            </div>
            <div class="slide">
                <img src="images/pushUp.png" alt="exersizePic" id="currWork">
                <h3>Push Up</h3>
                <p>Number of reps: 15</p>
            </div>
            <div class="slide">
                <img src="images/runFloor.png" alt="exersizePic" id="currWork">
                <h3>Mountain Climer</h3>
                <p>Number of reps: 25</p>
            </div>
            <div class="slide"><img src="images/sitUp.png" alt="exersizePic" id="currWork">
                <h3>Situps</h3>
                <p>Number of reps: 20</p>
            </div>
            <div class="slide"><img src="images/pushUp.png" alt="exersizePic" id="currWork">
                <h3>Push Up</h3>
                <p>Number of reps: 20</p>
            </div>
            <div class="slide"><img src="images/ballLeg.png" alt="exersizePic" id="currWork">
                <h3>Ball Assisted Leg Raise</h3>
                <p>Number of reps: 15</p>
            </div>
            <div class="slide"><img src="images/pushUp.png" alt="exersizePic" id="currWork">
                <h3>Push Up</h3>
                <p>Number of reps: 25</p>
            </div>
            </div>
        </section>

        <div id="createWorkout" class="grid-100 tablet-grid-100 mobile-grid-100">
            <fieldset>
            <h2>Create A Workout</h2>
            <form>
                Workout Name: <input type="text" id="Wname" value="Enter workout name">
                <button type="button" id="newWorkout">Create Workout</button>
            </form>
            <section id="exercise" class="form">

                <form>
                    Exercise Name: <input type="text" id="Ename" value=""><br/>
                    Exercise Type:
                    <select id="type">
                        <option value=" ">Select type</option>
                        <option value="Endurance">Endurance</option>
                        <option value="Strength">Strength</option>
                        <option value="Balance">Balance</option>
                        <option value="Flexibility">Flexibility</option>
                    </select> <br/>
                    <section id="exType">
                        <div id="exValOne" value=""></div> <input type="text" id="inOne" value=""><br/>
                        <div id="exValTwo" value=""></div> <input type="text" id="inTwo" value=""><br/>
                        <div id="exValThree" value=""></div> <input type="text" id="inThree" value=""><br/>
                    </section>
                    <div for="desc">Exercise Description:</div>
                    <textarea name="desc" rows="10" cols="50" autocomplete="off" class="grid-100 tablet-grid-100 mobile-grid-100"></textarea><br/>
                    <button type="button" id="newExercise">Create Exercise</button>
                </form>
            </section>
            </fieldset>
        </div>

        <script>
            $('.slider1').bxSlider({
                slideWidth: 200,
                minSlides: 2,
                maxSlides: 6,
                slideMargin: 10
            });

            var extend = document.getElementById('exBut');

              extend.onclick = function() {
                  showHideWBT()
                }

              function showHideWBT() {
                var title = document.getElementById('Title');
                title.style.display = (title.style.display == 'block') ? 'none' : 'block';

                if (title.style.display == 'none'){
                  extend.classList.add('pos');
                }
            }
        </script>
    </div>
</body>
</html>
