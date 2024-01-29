<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Contacts</h2>
  <a href="add_contact.php" class="btn btn-success">Add Contact</a><br><br>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>ID</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
<?php
    include 'connect.php';

    $sql = "SELECT * FROM contacts_table order by ID";

    $result = mysqli_query($conn, $sql);

    while($r = mysqli_fetch_assoc($result)){
?>
    <tr>
        <td><?php echo $r['Name']; ?></td>
        <td><?php echo $r['Phone']; ?></td>
        <td><?php echo $r['ID']; ?></td>
        <td><a href="edit_contact.php?cid=<?php echo $r['ID']; ?>" class="btn btn-primary">Edit</a> 
            <a href="delete.php?cid=<?php echo $r['ID']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
<?php
    }
?>
    </tbody>
  </table>
</div>
</body>
</html>