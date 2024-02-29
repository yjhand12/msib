<?php
session_start();

$name = "";
$email = "";
$phone = "";
$address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;

    header("location: " .$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TUGAS26FEB</title>
</head>
<body>
    <div class="container">
    <?php if (!isset($_SESSION['name']) || !isset($_SESSION['email']) || !isset($_SESSION['phone']) || !isset($_SESSION['address'])): ?>
        <h1>INPUT DATA</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Name:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <label>Email:</label><br>
            <input type="text" id="email" name="email"><br><br>
            <label>Phone:</label><br>
            <input type="number" id="phone" name="phone"><br><br>
            <label>Address:</label><br>
            <input type="text" id="address" name="address"><br><br><br>
            <button type="submit" name="register_btn">Register</button>
        </form>
    <?php else: ?>
        <label>Nama: <?php echo $_SESSION['name']; ?></label><br><br>
        <label>Email: <?php echo $_SESSION['email']; ?></label><br><br>
        <label>Phone: <?php echo $_SESSION['phone']; ?></label><br><br>
        <label>Address: <?php echo $_SESSION['address']; ?></label><br><br><br>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <button type="submit" name="back_btn">Back</button>
        </form>
    <?php endif; ?>
    </div>
</body>
</html>