<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "msib";
    public $connection;

    public function __construct(){
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db);
    }

    public function getData(){
        $input = $this->connection->query("SELECT * FROM data_siswa");
        return $input;
    }

    public function saveData($name, $email, $phone, $address){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $save = $this->connection->query("INSERT INTO data_siswa (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')");
        return $save;
    }       
    public function deleteData($id){
        $delete = $this->connection->query("DELETE FROM data_siswa WHERE id='$id'");
        return $delete;

    }
}
$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $save = $database->saveData($name,$email,$phone,$address);
    if ($save){
        echo "<script>alert('Data berhasil dimasukan')</script>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();

    }else{
        echo "Error: " . $database->connection->error; 
    }
}
$result = $database->getData();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $database->deleteData($id);
    if ($delete) {
        echo "<script>alert('Data berhasil dihapus')</script>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $database->connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>KODINGAN29FEB</title>
</head>
<body>
    <div class="container">
        <div class="left">
            <h2>Data Siswa</h2>
            <table>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th></th>
                </tr>
                <?php 
                $no = 1;
                foreach ($result as $ress) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $ress['name'];?></td>
                    <td><?php echo $ress['email'];?></td>
                    <td><?php echo $ress['phone'];?></td>
                    <td><?php echo $ress['address'];?></td>
                    <td>
                        <button class="red-button">
                            <a href="?id=<?php echo $ress['id']; ?>" onclick="return confirm('Hapus data?')">Delete</a>
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="right">
            <h2>Input Data Siswa</h2>
                <form method="POST">
                    <label for="name">Name</label><br>
                    <input type="text" id="name" name="name"><br>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email"><br>
                    <label for="phone">Phone</label><br>
                    <input type="text" id="phone" name="phone"><br>
                    <label for="address">Address</label><br>
                    <textarea id="address" name="address"></textarea><br>
                    <button type="submit" name="submit" class="green-button">Submit</button>
                </form>
        </div>
    </div>
</body>
</html>
