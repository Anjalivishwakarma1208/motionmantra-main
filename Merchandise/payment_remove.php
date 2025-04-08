
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merchandise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['productId']))
{
    $productId= $_GET['productId'];
    $sql="SELECT * FROM cart WHERE Id='$productId'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        $sql2="DELETE FROM cart WHERE Id='$productId'";
        $result2 = $conn->query($sql2);
        echo "<script>alert('The Product was Removed Successfully');</script>";
        echo "<script>window.location.href='cart2.php';</script>";
    }
    else
    {
        echo "<script>alert('Please Provide Valid Product Id');</script>";
        echo "<script>window.location.href='cart2.php';</script>";
    }

}
$conn->close();
?>
