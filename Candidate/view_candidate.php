<?php
    // Include database connection
    include '../dbh.php';

    // Retrieve candidates from the database
    $sql = "SELECT * FROM candidate";
    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Candidates</title>
    <link rel="stylesheet" href="../css/viewcard.css">
      <!-- custom css file link  -->
      <link rel="stylesheet" href="../css/style.css">
      <style>
        body {
            background-image: url('../image/sform.png'); /* Replace 'background.jpg' with your actual image file */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif; /* Use your preferred font-family */
            margin: 0;
            padding: 0;
        }
        .edit-btn, .delete-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none; /* Remove default button underline */
        }

        .delete-btn {
            background-color: #dc3545; /* Red color for delete button */
        }
    </style>
</head>
<body>
<nav class="nav">
        <link rel="stylesheet" href="../Header/headcss.css" />
        <script src="../Header/headjs.js"></script>
          <div class="containerr">
            <h1 class="logo"><a href="index.php">One Shot Voting</a></h1>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="sign_up.php">Signup</a></li>
        
            </ul>
          </div>
        </nav>
    <div class="container">
        <div class="candidates">
        <?php
            // Loop through each row in the result set
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='candidate'>";
                echo "<h2>" . htmlspecialchars($row['name']) . "</h2>"; // Use htmlspecialchars to prevent XSS attacks
                // $photo_path = '' . htmlspecialchars($row['photo']);

                // if (file_exists($photo_path)) {
                //     // Display the profile picture if it exists
                //     echo "<img src='pro.jpeg' alt='" . htmlspecialchars($row['name']) . "' width='200'>";
                // } else {
                //     // Display a placeholder image or message if no profile picture is available
                //     echo "<p>No photo available</p>";
                // }
                 echo '<td><img src="' .  htmlspecialchars($row['photo']) . '" alt="candidate Image" width="100"></td>';
                echo "<p><strong>Age:</strong> " . htmlspecialchars($row['age']) . "</p>"; // Sanitize output
                echo "<p><strong>Vote Number:</strong> " . htmlspecialchars($row['votenumber']) . "</p>"; // Sanitize output
                echo "<p><strong>Date of Birth:</strong> " . htmlspecialchars($row['dob']) . "</p>"; // Sanitize output
                echo "<p><strong>Villege:</strong> " . htmlspecialchars($row['villege']) . "</p>"; // Sanitize output                
                echo "<p><strong>Performance:</strong> " . htmlspecialchars($row['perfomance']) . "</p>"; // Sanitize output
                
                // Edit button
                echo "<a href='update_candidate.php?id=" . $row['id'] . "'><button class='edit-btn'>Edit</button></a>";
                
                echo "<a href='delete_candidate.php?id=" . $row['id'] . "'><button  class='delete-btn'>Delete</button></a>";

               


                // Delete button
                // echo "<form method='POST' action='delete_candidate.php'>";
                // echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                // echo "<button type='submit' name='delete'>Delete</button>";
                echo "</form>";

                echo "</div>";
            }
        ?>
        </div>
    </div>
   
</body>
</html>

<?php
    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);
?>
