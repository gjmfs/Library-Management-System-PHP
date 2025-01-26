<?php
session_start();
if(!isset($_SESSION['student']) && !isset($_SESSION['stu-id'])){
  die ("You are not logged in ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../CSS/card.css">
    <link rel="stylesheet" href="../CSS/form.css">
</head>
<body>
    <div class="container">
        <form action="./pre-order.php" method="POST"> 
            <h2 class="text-center mt-3 mb-3"> Search Books</h2>
            <div class="mb-3">
                <label class="form-label">Search Term:</label>
                <input type="text" class="form-control" name="search_term" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Search</button>
        </form>

        <?php
        // Include your database connection file
        include '../config.php';

        // Check if the form is submitted
        if(isset($_POST['submit'])) {
            $search_term = $_POST['search_term'];

            // Construct the SQL query to search across multiple columns
            $sql = "SELECT * FROM resource 
                    WHERE title LIKE '%$search_term%' 
                    OR author LIKE '%$search_term%' 
                    OR isbn LIKE '%$search_term%' 
                    OR resource_type LIKE '%$search_term%'";

            // Execute the query
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Title: </b><?php echo $row["title"]; ?></h5>
                            <p class="card-text"><b>Author:</b> <?php echo $row["author"]; ?></p>
                            <p class="card-text"><b>ISBN:</b> <?php echo $row["isbn"]; ?></p>
                            <p class="card-text"><b>Resource Type:</b> <?php echo $row["resource_type"]; ?></p>
                            <p class="card-text"><b>Quantity: </b> <?php echo $row["quantity"]; ?></p>
                            <form action="./pre-order-process.php" method="POST">
                                <input type="hidden" name="resource_id" value="<?php echo $row["id"]; ?>"> 
                                <input type="hidden" name="resource_title" value="<?php echo $row["title"]; ?>"> 
                                <input type="hidden" name="resource_author" value="<?php echo $row["author"]; ?>"> 
                                <input type="hidden" name="resource_isbn" value="<?php echo $row["isbn"]; ?>"> 
                                <input type="hidden" name="resource_type" value="<?php echo $row["resource_type"]; ?>"> 
                                <button type="submit" class="btn btn-success">Pre-order</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
        }
        ?>
    </div>
</body>
</html>