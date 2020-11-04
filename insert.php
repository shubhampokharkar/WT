<?php

include "connection.php";
$STB_No= $_GET['STB_No'];
$showquery = "select * from registration where STB_No=$STB_No";
$showdata = mysqli_query($conn,$showquery);
$result=mysqli_num_rows($showdata);
if($result > 0)
{
    echo "<script>alert('already registered')</script>";
	echo "<script>window.open('activation.php','_self')</script>";
}
else{
	if(isset($_POST['submit'])){
            $STB_No=$_GET['STB_No'];
            $Name=$_POST['Name'];
            $Mobile_no=$_POST['Mobile_no'];
            $Email=$_POST['Email'];
            $Address=$_POST['Address'];
            $Pincode=$_POST['Pincode'];
            $Adhar_no=$_POST['Adhar_no'];
            $files=$_FILES['file'];

            $filename=$files['name'];
            $fileerror=$files['error'];
            $filetmp= $files['tmp_name'];

            $fileext= explode('.',$filename);

            $filecheck= strtolower(end($fileext));

            $fileexstored = array('png','jpg','jpeg');

            if(in_array($filecheck,$fileexstored)){

                $destinationfile = 'upload/'.$filename;
                move_uploaded_file($filetmp,$destinationfile);


                $sql = "insert into registration(STB_No,Name,Mobile_no,Email,Address,Pincode,Adhar_no,Address_Proof) values($STB_No,'$Name','$Mobile_no','$Email','$Address',$Pincode,'$Adhar_no','$destinationfile')";
                $query=mysqli_query($conn,$sql);

                if($query)
                {
                 echo "<script>alert('Registered successfully')</script>";
				 echo "<script>window.open('activation.php','_self')</script>";
                }
                else
                {
                 echo "<script>alert('Failed to register')</script>";
				 echo "<script>window.open('activation.php','_self')</script>";
                }
            }
            else{

                echo "<script>alert('file should be png, jpg, jepg format')</script>";
            }
	}
}

?>
