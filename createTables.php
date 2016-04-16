<?PHP
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "geoTrainerDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
    )";

    $sql = "CREATE TABLE exercise (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      exName VARCHAR(30) NOT NULL,
      exType VARCHAR(30) NOT NULL,
      exVlaOne VARCHAR(30) NOT NULL,
      exValTwo VARCHAR(30) NOT NULL,
      exValThree VARCHAR(30) NOT NULL,
      inOne INT(6) NOT NULL,
      inTwo INT(6) NOT NULL,
      inThree INT(6) NOT NULL,
      desc VARCHAR(120) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Tables created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
