<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" hrel="https://maxcdn.bootstrappcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
             .page-header h2{
                margin-top: 8;
             }
             table tr td:last-child a {
                margin-right: 15px;
             }
             </style>
             <script type="text/javascript">
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
                });
    </script>
    </head>
    <body>
        <div class="wrapper">
            <dic class="cintainer-fluid">
                <div class="row">
                    <div class="col-nd-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Employees Details</h2>
                            <a hrel="create.php" class="bnt bnt-success pull-right">Add New Employee</a>
                        </div>
                        <?php
                        // Include config file 
                    require_once 'config.p-php';

                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)) {
                        if(mysqli_num_rows($result) > 0 ) {
                            echo  "<tbale class='table' table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                              echo "<th>#</th>";
                              echo "<th>Name</th>";
                              echo "<th>Address</th>";
                              echo "<th>Salayry</th>";
                              echo "<th>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id']  . "</td>";
                            echo "<td>" . $row['name']  . "</td>";
                            echo "<td>" . $row['address']  . "</td>";
                            echo "<td>" . $row['salary']  . "</td>";
                        echo "<td>";
                               echo "<a href='read.php?id=" . $row['id'] . "' title=View Record' data-toggle=tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                               echo "<a href='update.php?id=" . $row['id'] . "' title=Update Record' data-toggle=tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                               echo "<a href='delete.php?id=" . $row['id'] . "' title=Delete Record' data-toggle=tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                        echo "<tr>";
                        }
                        echo "</tbody>";
                    echo "</table>";
                    //full result set
                    mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em> No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: could not able to execute $sql. "  .mysqli_error($link);
                    }
                    // close connection 
                    mysqli_close($link);
                    ?>
                    </div>
                </div>
            </dic>
        </div>
    </body>
</html>