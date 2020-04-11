<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<div>
<form method='post'>
<center>
<h1>Renting Portal</h1>
<table>
    <tr>
        <td>Minimum sqft</td>
        <td style='padding:5px'>
            <input type='number' name='area' min='150' max='2000' style='width:100%' required>
        </td>
    </tr>
    <tr>
        <td>Specification</td>
        <td>
            <select name='specification' style='padding:5px'>
                <option>------SELECT------</option>
                <option value='1'>1BHK</option>
                <option value='2'>2BHK</option>
                <option value='3'>3BHK</option>
            </select>
        </td>
    </tr>
</table>
<input type='submit' name='find' value='Find' >
</center>
</form>
</div>
<?php
if(isset($_POST['find'])){
    require 'conn.php';
    $area=$_POST['area'];
    $specification=$_POST['specification'];
    $query="select * from ownerDetails where bkhType='$specification' and area='$area'";
    $data=mysqli_query($conn,$query);
    $n=mysqli_num_rows($data);
    if($n>0){
        echo "<div style='width:100%'>";
        echo "<center>";
        echo "<h2>Owner Details</h2>";
        while($row=mysqli_fetch_assoc($data)){
            echo "<table border=0 width='50%' style='border-top:2px solid black' class='table table-striped'>";
            echo "<tr>";
            echo "<td style='width:20%'><b>Name</b></td>";
            echo "<td>".$row['name']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:20%'><b>Email</b></td>";
            echo "<td>".$row['email']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:20%'><b>Phone Number</b></td>";
            echo "<td>".$row['phone']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:20%'><b>Adress</b></td>";
            echo "<td>".$row['address']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:20%'><b>Specification</b></td>";
            echo "<td>".$row['bkhType']." BKH</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='width:20%'><b>Area</b></td>";
            echo "<td>".$row['area']."</td>";
            echo "</tr>";
            echo "</table>";
        }
        echo "</center>";
        echo "</div>";   
    }else{
        echo "<center>No Data Found...</center>";
    }   
}
?>
</html>