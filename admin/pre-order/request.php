<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Requests</title>
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    
</head>
<body>
    <?php
    include "nav.php";
    ?>
    <div class="container mt-5">
        <h2>My Requests</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Request ID</th>
                    <th>Resource Title</th>
                    <th>Resource Author</th>
                    <th>Resource ISBN</th>
                    <th>Resource Type</th> 
                    </tr>
            </thead>
            <tbody>
                <?php
                // Include your database connection file
                include '../../config.php'; 
                session_start();
                
                

                // Fetch requests made by the user
                $sql = "SELECT * FROM pre_order ORDER BY request_date DESC"; 
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    $count = 1;
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $row['user_id']?></td>
                            <td><?php echo $row["resource_id"]; ?></td>
                            <td><?php echo $row["resource_title"]; ?></td>
                            <td><?php echo $row["resource_author"]; ?></td>
                            <td><?php echo $row["resource_isbn"]; ?></td>
                            <td><?php echo $row["resource_type"]; ?></td> 
                            <td><?php
                              echo"  <form action='./delete.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id' value='{$row['req_id']}'>
                                    <button type='submit' name='delete' style='border:none; background:none;'>
                                    <img class='remove' src='../../Assets/icons/delete.svg' alt='Delete'/>
                                    </button>
                                </form>
                            </td>";
                            ?>
                            </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr><td colspan="6">No requests found.</td></tr>
                    <?php
                }

                $connection->close();
                ?>
            </tbody>
        </table>
    </div>

    
</body>
</html>