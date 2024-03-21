<?php 
session_start();

if (!isset($_SESSION['valid'])) {

    header("Location: loginpat1.php");
    exit();
}

include("login.php");

$cin = $_SESSION['valid'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$bdate = $_SESSION['bdate'];
$num = $_SESSION['num'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link rel="stylesheet" href="fich.css">
</head>
<body>
    <div class="container">
        <h1>Patient Profile</h1>
        <div class="profile">
            <div class="profile-details">
                <div class="profile-photo">
                    <img src="photo1.jpg" alt="Patient Photo">
                </div>
                <div class="patient-info">
                    <h2>Personal Information</h2>
                    <p><strong>Patient Num°:</strong> <?php echo $num; ?></p>
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Birthdate:</strong> <?php echo $bdate; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Doctor:</strong>.......</p>
                </div>
            </div>
            <div class="description">
                <h2>Description</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores eveniet praesentium,
                     eum ratione impedit explicabo quisquam sed ea asperiores velit ipsa cum aliquam accusantium voluptas,
                      blanditiis reiciendis, et a! Incidunt.</p>
            </div>
            <div class="medical-advice">
                <h2>Medical Advice</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quas eius quis vitae tempore veritatis ipsum quam,
                     nostrum omnis debitis sapiente saepe quibusdam delectus, velit accusamus inventore aut. Quia, consectetur.</p>
            </div>
            <div class="appointments">
                <h2>Next Appointment</h2>
                <p>Date:......</p>
            </div>
        </div>
    </div>
</body>
</html>
