<?php
 // include config file 

use function PHPSTORM_META\map;

 require_once 'config.php';

 // Define variables and initialize empty values
 $name = $address = $salary = "";
 $name_err = $address_err = $salary_err = "";

 //
 if($SERVER ["REQUEST_METHOD"] == "POST") {
    //
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name ";
    } elseif(!filter_var(trim($_POST["name"]) . FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ] +$/")))) {
        $name_err = 'Please enter a valid name.';
    }else {
        $name = $input_name;
    }

    //
    $input_address = trim($_POST["address"]);
    if(empty($imput_address)) {
        $address_err = 'Please enter an address. ';
    }else{
        $address = $input_address;
    }
    // vailidate saylary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)) {
        $salary_err =  "Please enter the salary amount.";
    } elseif (!ctype_digit($input_salary)) {
        $salary_err = 'Pla enter a positive integer value.';
    }else{
        $salary = $input_salary;
    }


    //
if(empty($name_err) && empty($address_err) && empty($salary_err)) {
    //
    $sql = "INSERT INTO  employees (name, address, salary) VALUES (?,?,?)";

    if($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the 
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);

        // set parameters
        $param_name = $name;
        $param_address = $address;
        $param_salary = $salary;
        $param_id = $id;

        if(mysqli_stmt_execute($stmt)) {
            //
            header("location: index.php");
            exit();
        }else{
            echo "Something went wrong. Please try again latre.";
        }
        }
        // close statement
        mysqli_stmt_close($stmt);
    }
    //close statement
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <title>Create Record</title>    
    <link rel="stylesheet"  hrel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fuild">
            <div  class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this frorm and submit to add amployee record to the database.</p>
                    <from action="<?php echo htmlspecialchars($_SERVER["PHP SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                      <span class="help-blok"><?php echo $name_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                      <label>Address</label>
                      <textarea name="address" class="form-control"><?php echo $address; ?></textarea>">
                      <span class="help-blok"><?php echo $address_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                      <label>salary</label>
                      <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                      <span class="help-blok"><?php echo $salary_err;?></span>
                </div>
                <input type="submit" class="btn btn-primary" value="submit">
                <a href="index.php" class="btn btn-default">Cancel</a>
                </from>
                </div>
            </div>            
        </div>
    </div>
</body>
</html>
