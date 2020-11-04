
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MTPL</title>
    <link rel="stylesheet" href="cproj.css">
    <link rel="stylesheet" href="activatecss.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="head">
        <div style="float:left ;color:yellow ; font-weight: bold;">M</div>
        <div style="float:left ;color:blue ; font-weight: bold;">T</div>
        <div style="float:left ;color:red ; font-weight: bold;">P</div>
        <div style="float:left ;color:pink ; font-weight: bold;">L</div>
        <div class="user" style="float: right; font-size: 30px; color:white; margin-right: 30px;"><i class="fas fa-user-circle"></i></div>
    </div>>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-bars" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>MTPL</header>
        <ul>
            <li><a href="project.html"><i class="fas fa-search"></i>Search</a></li>
            <li><a href="#" class="active"><i class="fas fa-calendar-week"></i>Activation</a></li>
            <li>
               <a href="#" class="Obtn"><i class="fas fa-cart-arrow-down"></i>Order
               <span id="span" class="fas fa-caret-down first"></span>
               </a>
               <ul class="Odbtn">
                   <li><a href="order.html" class="active">Change Order</a></li>
               </ul>
            </li>
            <li><a href="Modify.html"><i class="fas fa-edit"></i>Modify</a></li>
            <li><a href="#"><i class="fas fa-redo"></i>Renew</a></li>
            <li><a href="#"><i class="fas fa-pause"></i>Suspend</a></li>
            <li><a href="#"><i class="fas fa-male"></i>E-Support</a></li>
            <li><a href="#"><i class="fas fa-power-off"></i>Logout</a></li>
        </ul>
    </div>
    <section>
        <div id="details">
            <header> 
                <h2>Activation</h2>
            </header>
          <div id="Modif" >
            <center><h3>Details</h3></center>
            <div id="detl">
             <form id="form" name="myform" action="" method="POST" enctype="multipart/form-data" onSubmit="return ValidateForm()">
                <br><br>
				
               <label for="Name">Name &nbsp &nbsp : </label>&nbsp &nbsp &nbsp &nbsp
               <input type="text" name="Name" ><br><br><br><br>

               <label for="Mobile_no">Mobile NO.    : </label>&nbsp 
               <input type="text" name="Mobile_no" ><br><br><br><br>

               <label for="Email">Email : </label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
               <input type="Email" name="Email"><br><br><br><br>

               <label for="Address">Address : </label>&nbsp &nbsp &nbsp &nbsp
               <input type="textarea" name="Address"><br><br><br><br>

               <label for="Pincode">Pincode : </label>&nbsp &nbsp &nbsp &nbsp
               <input type="text" name="Pincode"><br><br><br><br>

               <label for="Adhar_no">Aadhar No. : </label>&nbsp &nbsp 
               <input type="text" name="Adhar_no"><br><br><br><br>

               <label for="file">Upload Address Proof : </label>&nbsp &nbsp &nbsp 
               <input type="file" name="file"><br><br><br><br>
               
                <input type="submit" name="submit" value="submit" id="change">
                   <br><br><br>
            </form>
			<?php include "insert.php" ?>
            </div>
          </div>
        </div>
        <br><br><br>
    </section>
	<script>
	function checkEmail(str1)
          {
               var posat=str1.indexOf("@");
               var posdot=str1.indexOf(".");
          
          if(posat!=-1 && posdot!=-1)
          {
              if(posat>=1 && (posdot-posat)>=2 && (str1.length-1-posdot)>=2 && (str1.length-1-posdot)<=5)
              {
                  return true;
              }
              else
              {
                  return false;
              }
          }
          else
          {
              return false;
          }
         }

          function ValidateForm(){

               var nam=document.myform.Name.value;
               var mobnum=document.myform.Mobile_no.value;
               var email2=document.myform.Email.value;
               var address =document.myform.Address.value;
               var pincode =document.myform.Pincode.value;
               var adhar =document.myform.Adhar_no.value;

               
               if (nam=="" || nam==null)
               {
                  alert("Name should not be null");
                  return false;
               }
               else if(nam.length<3)
               {
                  alert("Name length should be 3-30");
                  return false;
               }
               else if(nam.length>30)
               {
                  alert("Name length should be 3-30");
                  return false;
               }
               else if(isNaN(nam)==false)
               {
                  alert("Name should not be a numeric");
                  return false;
               }
			   else if (mobnum=="" || mobnum==null)
               {
                  alert("Mobile no cannot be null");
                  return false;
               }
               else if(mobnum.length!=10)
               {
                  alert("Please enter a 10 digit no");
                  return false;
               }
               else if(mobnum[0]<'6')
               {
                  alert("Enter a valid mobile no");
                  return false;
               }
               else if(email2=="" || email2==null)
               {
                  alert("Email cannot be empty");
                  return false;
               }
               else if(!checkEmail(email2))
               {
                  alert("Email not valid");
                  
               }
			   else if(address.length>220)
               {
                  alert("Address cannot be greater than 220 characters");
                  return false;
               }
               else if(pincode=="" || pincode==null)
               {
                  alert("pincode cannot be null");
                  return false;
               }
               else if(adhar=="" || adhar==null)
               {
                  alert("Adhar No can not be null");
                  return false;
               }
               else if(adhar.length != 12 )
               {
                  alert("Enter a valid Adhar No");
                  return false;
               }
               else
               {
                  return true;
               }
          }
	</script>
    <script src="Jscript.js"></script>
</body>
</html>