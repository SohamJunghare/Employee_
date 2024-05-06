<?php
include("connection.php");
?>

<?php
    if(isset($_POST['searchdata']))
    {
        $search = $_POST['search'];

        $query = "SELECT * FROM form where emp_id = '$search' ";
        $data = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($data);

        // $name = $result['emp_name'];
        // echo "$name";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Managert</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="center">

    <form action="#" method="POST">
        <h1>Employee Data</h1>

        <div class="form" >
            <input type="text" name="search" class="textfield" placeholder="Search ID" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_id'];}?>">
            <input type="text" name="name" class="textfield" placeholder="Employee Name" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_name'];}?>">

            <select id="" class="textfield" name="gender">
                <option value="Not_selected">Select Gender</option>

                <option value="Male"
                <?php
                if( $result['emp_gender'] == 'Male')
                {
                    echo "Selected";
                }
                ?>
                >Male</option>

                <option value="Female"
                <?php
                if($result['emp_gender'] == 'Female')
                {
                    echo "Selected";
                }
                ?>
                >Female</option>


                <option value="Other"
                <?php
                if($result['emp_gender'] == 'Other')
                {
                    echo "Selected";
                }
                ?>
                >Other</option>
            </select>


            <input type="text" name="email" class="textfield" placeholder="Email" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_email'];}?>">


            <select id="" class="textfield" name="department">

                <option value="NOt_Selected">Select Department</option>
                
                <option value="Software"
                <?php
                if($result['emp_dept'] == 'Software')
                {
                    echo "Selected";
                }
                ?>
                >Software</option>
                
                <option value="HR"
                <?php
                if($result['emp_dept'] == 'HR')
                {
                    echo "Selected";
                }
                ?>
                >HR</option>
                
                <option value="Account"
                <?php
                if($result['emp_dept'] == 'Account')
                {
                    echo "Selected";
                }
                ?>>Account</option>
                
                <option value="Management"
                <?php
                if($result['emp_dept'] == 'management')
                {
                    echo "Selected";
                }
                ?>>Management</option>
                
                <option value="PR"
                <?php
                if($result['emp_dept'] == 'PR')
                {
                    echo "Selected";
                }
                ?>>PR</option>
                
                <option value="Sales"
                <?php
                if($result['emp_dept'] == 'Sales')
                {
                    echo "Selected";
                }
                ?>>Sales</option>
            
            </select>

            <textarea id="" name="address" placeholder="Address"><?php if(isset($_POST['searchdata'])){echo $result['emp_add'];}?></textarea>

            <input type="submit" name="searchdata" value="Search" class="btn">
            <input type="submit" name="save"  value="Insert" class="btn">
            <input type="submit" name="update" value="Update" class="btn">
            <input type="submit" name="delete" value="Delete" class="btn"  onclick="return checkdelete()">
            <input type="submit" value="Clear" class="btn">
        </div>
        </form>
    </div>
    
</body>
</html>

<script>
    function checkdelete()
    {
        return confirm('Are you sure to DELETE this Record?');
    }
</script>

<?php
if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $address = $_POST['address'];

    $query = "INSERT INTO form  (emp_name,emp_gender,emp_email,emp_dept,emp_add) VALUES ('$name', '$gender', '$email', '$department', '$address')";

    $data = mysqli_query($conn, $query);

    if($data)
    {
        echo " <script> alert('Data inserted Successfully') </script> ";
    }
    else
    {
        echo " <script> alert('Failed to Insert Data') </script> ";
    }
}
?>


<?php
    if(isset($_POST['delete']))
    {
        $id = $_POST['search'];

        $query = "DELETE FROM form WHERE emp_id ='$id' ";
        $data = mysqli_query($conn, $query);

        if($data)
        {
            echo "Record Deleted";
        }
        else
        {
            echo "Deletion Failed!!";
        }
    }
?>

<?php
    if(isset($_POST['update']))
    {
        $id = $_POST['search'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $address = $_POST['address'];

        $query = "UPDATE form SET emp_name = '$name' ,emp_gender='$gender', emp_email='$email', emp_dept='$department', emp_add ='$address' WHERE emp_id = '$id' ";

        $data = mysqli_query($conn, $query);

    if($data)
    {
        echo " <script> alert('Record Updated Successfully') </script> ";
    }
    else
    {
        echo " <script> alert('Failed to Update Data') </script> ";
    }
    }
?>


