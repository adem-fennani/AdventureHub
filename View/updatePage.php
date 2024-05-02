<?php
include '../Controller/EmployeC.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $db = config::getConnexion();
        $sql = "SELECT * FROM employee WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a row was found
        if (!$row) {
          
            echo "Employee not found";
            exit();
        }
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header-container">
   
   <h1>Modify Employee </h1>
   <div class="tablee">

<?php
if (isset($_POST['update_employees'])){
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $db = config::getConnexion();

    $query= "UPDATE employee SET  lastName = ?, firstName = ?, email = ?, dob = ? WHERE id = '$idnew'";

    // Execute the SQL query
    $stmt = $db->prepare($query);
    $stmt->execute([$firstName, $lastName, $email, $dob]);


}
?>




   <form action="updatePage.php?id_new=<?php echo $id; ?>" method="post">
   <table align="center">
    <tr>
        <td>
        <label for="firstName">First Name:</label>
        </td>
        <td>
        <input type="text" id="firstName" name="firstName" required value="<?php echo $row['firstName']; ?>"><br><br>
        </td>
        <td> <span id="error1" style='color:red'></span></td>

    </tr>
    <tr>
        <td>
        <label for="firstName">First Name:</label>
        </td>
        <td>
        <input type="text" id="firstName" name="firstName" required value="<?php echo $row['firstName']; ?>"><br><br>
        </td>
        <td> <span id="error1" style='color:red'></span></td>

    </tr>
   </table>   
            <input type="text" id="lastName" name="lastName" required value="<?php echo $row['lastName']; ?>"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $row['email']; ?>"><br><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required value="<?php echo $row['dob']; ?>"><br><br>
            <br>
            <input type="submit" value="Update" class="main-btn" name="update_employees">
        </form>
        </div>
</div>


   
</body>
</html>