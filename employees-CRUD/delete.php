<?php
//
if(isset($_POST["id"]) && !empty($_POST["id"])) {
    //
    require_once 'config.php';
    //
    $sql = "DELETE FROM employess WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)) {
        //
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        $param_id = trim($_POST["id"]);

        if(mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}else{
    //
    if(empty(trim($_GET["id"]))) {

        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <title>View Record</title>    
    <link rel="stylesheet"  hrel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 ;
        }
        </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fuild">
            <div  class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <from action="<?php echo htmlspecialchars($_SERVER["PHP SELF"]); ?>" method="post">
                    <div class="alert alert-danger fade in">
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                        <p>Are  you sure you want to delete this record?</p><br>
                        <p>
                            <input type="submit" value="yes" class="btn btn_danger">
                            <a href="index.php" class="btn btn_default">No</a>
                        </p>
                    </div>
                </from>
                </div>
            </div>
        </div>
    </div>
</body>
</html>