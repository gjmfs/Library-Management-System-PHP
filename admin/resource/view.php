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
    <title>Available Resources</title>
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    <script src="../../bootstrap//dist/js/bootstrap.js"></script>

</head>
<body>

    <?php
        
        include '../../config.php';

        $sql= 'select * from resource';
        $result= $connection->query($sql);

    ?>
    <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Resource Type</th>
      <th scope="col">Title</th>
      <th scope="col">Author Name</th>
      <th scope="col">ISBN No</th>
      <th scope="col">Quantity</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
           <th scope='row'>{$row['resource_type']}</th>
           <td>{$row['title']}</td>
           <td>{$row['author']}</td>
           <td>{$row['isbn']}</td>
           <td>{$row['quantity']}</td>
            <td><form action='./delete.php' method='post' style='display:inline;'>
                 <input type='hidden' name='id' value='{$row['id']}'>
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