<?php

include "connection.php";

if(isset($_POST['submit'])){
    $STB_No=$_POST['STB_No'];

    $sql="select * from registration where STB_No=$STB_No";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($query);

    if($query){
        if($result > 0){
        echo "<br><br><br><br>";
        
        echo "<table style='width:90%; margin-right:10%;'>";
        while($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px; border-top-style:solid; border-bottom-style:solid; background-color:silver;'>STB No.</th>";
                echo "<td style='text-align:left; font-size:1.5vw; padding:15px; border-top-style:solid; border-bottom-style:solid; background-color:silver;'>". $row['STB_No'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid;'>Name</th>";
                echo "<td style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid;'>". $row['Name'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid; background-color:silver;'>Mobile no.</th>";
                echo "<td style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid; background-color:silver;'>". $row['Mobile_no'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid;'>Email</th>";
                echo "<td style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid;'>". $row['Email'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid; background-color:silver;'>Address</th>";
                echo "<td style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid; background-color:silver;'>". $row['Address'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid;'>Pincode</th>";
                echo "<td style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid;'>". $row['Pincode'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid; background-color:silver;'>Adhar no</th>";
                echo "<td style='text-align:left; font-size:1.5vw; padding:15px; border-bottom-style:solid; background-color:silver;'>". $row['Adhar_no'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th style='text-align:left; font-size:1.5vw; padding:15px;'>Address Proof</th>";
                ?>
                <td><img src="<?php echo $row['Address_Proof']; ?>" height="250px" width="250px"></td>
                <?php
                echo "</tr>";
            }
        echo "</table>";
        echo "<br>";
		echo "<br>";
        }
        else
        {
            echo "<center><h2 style='margin-top:20%;'>No record found<h2></center>";
        }
    }
}

?>