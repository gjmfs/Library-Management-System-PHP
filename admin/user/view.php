<?php
session_start();
if(!isset($_SESSION['admin'])){
  die ("You are not logged in ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accounts</title>
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    <script src="../../bootstrap//dist/js/bootstrap.js"></script>
</head>
<body>

    <?php
        include "./nav.php";
        include '../../config.php';

        $sql= 'select * from student';
        $result= $connection->query($sql);

    ?>
    <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Student ID</th>
      <th scope="col">Name</th>
      <th scope="col">Grade</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
           <th scope='row'>{$row['s_id']}</th>
           <td>{$row['name']}</td>
           <td>{$row['grade']}</td>
            <td><form action='./delete.php' method='post' style='display:inline;'>
                 <input type='hidden' name='id' value='{$row['s_id']}'>
                 <button type='submit' name='delete' style='border:none; background:none;'>
                 <img class='remove' src='../../Assets/icons/delete.svg' alt='Delete'/>
                </button>
            </form>
            </td>
            </tr>";
        }
    }
    ?>
  </tbody>
</table>


    
</body>
</html>