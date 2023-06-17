<?php
$con = mysqli_connect('localhost','root','','admin_crud');
if(!$con){
    die("could not connect".mysqli_connect_error());
    }
    // else{
    //     echo"done";
    // }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $school = $_POST['school'];
        $class = $_POST['class'];
        $phone = $_POST['phone'];
        $gen = $_POST['gender'];

        $insert_query = mysqli_query($con,"insert into student_details set NAME ='$name', FATHER_NAME ='$fname',
        EMAIL ='$email', SCHOOL ='$school', CLASS ='$class', PHONE_NO ='$phone', GENDER ='$gen'");
    

    if(isset($insert_query)){
      echo  "<script>alert('deta insert successfully')</script>";
    }

}

    // update code
    $h_action = '';
    $h_id = '';
    if(isset($_POST['h_action']))
    {
        $h_action = $_POST['h_action'];
    }
    if(isset($_POST['h_id']))
    {
        $h_id = $_POST['h_id'];
    }
    
    if($h_action == 'update')
    {
        $upd_name = $_POST['upd_name_'.$h_id];
        $upd_father_name = $_POST['upd_father_name_'.$h_id];
        $upd_email = $_POST['upd_email_'.$h_id];
        $upd_school = $_POST['upd_school_'.$h_id];
        $upd_ph_no = $_POST['upd_ph_no_'.$h_id];
        // echo $upd_name." ".$upd_father_name ." ". $upd_email." " .$upd_school." ".$upd_ph_no." ".$h_id;exit;
        $update_query = mysqli_query($con, "update student_details set NAME = '$upd_name', FATHER_NAME = '$upd_father_name', EMAIL = '$upd_email', SCHOOL = '$upd_school', PHONE_NO = '$upd_ph_no' where id=$h_id");
        if(isset($update_query))
        {
            echo "<script>alert('Data Updated Successsfully')</script>";
        }
        else
        {
            echo "<script>alert('Data Updation Failed')</script>";
        }

    }

    // delete code
    if($h_action == "delete")
    {
        // echo "delete from student_details where id = $h_id";exit;
        $delete_query = mysqli_query($con, "update student_details set is_delete = 1 where id = $h_id");
        if(isset($delete_query))
        {
            echo "<script>alert('Data Deleted Successsfully')</script>";
        }
        else
        {
            echo "<script>alert('Data Deletion Failed')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        .md{
            width:40%;
            padding-top:50px
        }
        .form{
        
            background-color:black;
            color:white;
            padding:30px 30px 30px 30px;

            
        }
        .form h1{
            text-align:center;
        }
        .form input{
           /* border:dotted gray;*/
           border:none;
            width: 100%;
            background-color:black;
            color:white;
        }
        .form input:hover{
            border:gray;
        }
        .form hr{
            height:2px;
        }
        .form .radio{
            width:30px;
        }
        .form .submit{
            background-color:green;
            padding:10px;
        }
        .size{
            width:100%;
            padding:0px 350px;
        }
        .action_data{display: flex;gap:6px}
    </style>
    <script>
        function btn_update(the_id)
        {
            document.myForm.h_action.value = "update";
            document.myForm.h_id.value = the_id;
            document.myForm.submit();

        }

        function btn_delete(del_id)
        {
            document.myForm.h_action.value = "delete";
            document.myForm.h_id.value = del_id;
            document.myForm.submit();
        }

    </script>
</head>
<body>
    <form method="post" name="myForm" id="myForm">
        <input type="hidden" name="h_action">
        <input type="hidden" name="h_id">
        <div class="container">
        <div class="row">
                <div class="col-md-12">
                <div class="size">
            <div class="form">
              <div class="container">
                <div class="row">
                <div class="col-md-12">
                        <h1>Student details</h1>
                        <hr>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <label for="name">NAME</label><br>
                        <input type="text" id="" name="name" placeholder="enter your name">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <label for="fname">FATHER'S NAME</label><br>
                        <input type="text" id="" name="fname" placeholder="enter your father's name">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <label for="email">EMAIL</label><br>
                        <input type="text" id="" name="email" placeholder="enter your email address">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <label for="name">SCHOOL</label><br>
                        <input type="text" id="" name="school" placeholder="enter your school name">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <label for="name">CLASS</label><br>
                        <select name="class" id="class">
                            <option value="5">v</option>
                            <option value="6">vi</option>
                            <option value="7">vii</option>
                            <option value="8">viii</option>
                            <option value="9">ix</option>
                            <option value="10">x</option>
                            <option value="11">xi</option>
                            <option value="12">xii</option>
                        </select>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <label for="name">PHONE NUMBER</label><br>
                        <input type="text" id="" name="phone" placeholder="enter your phone number">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <label>GENDER</label>
                        <input type="radio" class="radio" id="" name="gender" value="male">
                         <label for="M"><u>M</u></label>
                         <input type="radio" class="radio" id="" name="gender" value="female">
                         <label for="F"><u>F</u></label>
                         <input type="radio" class="radio" id="" name="gender" value="others">
                         <label for="O"><u>O</u></label>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <!-- <input type="submit" name="" class="submit" value="Submit"> -->

                    </div>
                    </div>
                    </div>
    </div>
                </div>
              </div>  
            </div>
        </div>
    

    <div class="student_info_table p-5">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">School Name</th>
                    <!-- <th scope="col">Class</th> -->
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col">Gender</th> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                    $show_query = mysqli_query($con, "select * from student_details where is_delete = 0");
                    $sl_no=1;

                    while($single_row = mysqli_fetch_assoc($show_query))
                    {
                      $f_id = $single_row['ID'];
                ?>
                <tr>        
                    <td><?php echo $sl_no?></td>
                    <td><input type="text" value="<?=$single_row['NAME'];?>" name="upd_name_<?=$f_id;?>"></td>
                    <td><input type="text" value="<?=$single_row['FATHER_NAME'];?>" name="upd_father_name_<?=$f_id;?>"></td>
                    <td><input type="text" value="<?=$single_row['EMAIL'];?>" name="upd_email_<?=$f_id;?>"></td>
                    <td><input type="text" value="<?=$single_row['SCHOOL'];?>" name="upd_school_<?=$f_id;?>"></td>
                    <td><input type="text" value="<?=$single_row['PHONE_NO'];?>" name="upd_ph_no_<?=$f_id;?>"></td>
                    <td class="action_data">
                        <span type="button" class="btn btn-success" onclick="btn_update(<?=$f_id;?>)">UPDATE</span>
                        <span class="btn btn-danger" onclick="btn_delete(<?=$f_id;?>)">Delete</span>
                    </td>
                    <!-- <td><?//=$single_row['CLASS'];?></td> -->
                    <!-- <td><?//=$single_row['GENDER'];?></td> -->

                </tr>
                <?php
                 $sl_no=$sl_no+1; 
                    }
                   
                ?>
            </tbody>
        </table>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>


</body>
</html>