<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motel Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Motel Management System. Add a New Motel!</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="name">Motel Name</label> 
            <input type="text" name="name" required>
        </p>
        <p>
            <label for="location">Location</label> 
            <input type="text" name="location" required>
        </p>
        <p>
            <label for="contact">Contact Number</label> 
            <input type="text" name="contact" required>
        </p>
        <p>
            <label for="email">Email</label> 
            <input type="email" name="email" required>
            <input type="submit" name="insertMotelBtn" value="Add Motel">
        </p>
    </form>

    <h2>All Motels</h2>
    <?php $getAllMotels = getAllMotels($pdo); ?>
    <?php foreach ($getAllMotels as $row) { ?>
    <div class="container" style="border: 1px solid; padding: 10px; margin-top: 20px; width: 50%;">
        <h3>Motel Name: <?php echo htmlspecialchars($row['name']); ?></h3>
        <h3>Location: <?php echo htmlspecialchars($row['location']); ?></h3>
        <h3>Contact Number: <?php echo htmlspecialchars($row['contact_number']); ?></h3>
        <h3>Email: <?php echo htmlspecialchars($row['email']); ?></h3>
        <h3>Date Added: <?php echo isset($row['date_added']) ? htmlspecialchars($row['date_added']) : 'Not available'; ?></h3>

        <div class="editAndDelete" style="float: right; margin-right: 20px;">
            <a href="viewBookings.php?motel_id=<?php echo $row['motel_id']; ?>">View Bookings</a>
            <a href="editMotel.php?motel_id=<?php echo $row['motel_id']; ?>">Edit</a>
            <a href="deleteMotel.php?motel_id=<?php echo $row['motel_id']; ?>&deleteMotelBtn=1">Delete</a>
        </div>
    </div> 
    <?php } ?>
</body>
</html>
