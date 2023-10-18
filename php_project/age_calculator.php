<?php
error_reporting(0);
function calculateAge($birthdate){
    $birthTimestamp = strtotime($birthdate);
    $currentTimestamp = time();
    $diff = $currentTimestamp - $birthTimestamp;
    
    $years = floor($diff / (365 * 24 * 60 * 60));
    $diff -= $years * 365 * 24 * 60 * 60;
    
    $months = floor($diff / (30 * 24 * 60 * 60));
    $diff -= $months * 30 * 24 * 60 * 60;
    
    $days = floor($diff / (24 * 60 * 60));
    $diff -= $days * 24 * 60 * 60;
    
    $hours = floor($diff / (60 * 60));
    $diff -= $hours * 60 * 60;
    
    $minutes = floor($diff / 60);
    $diff -= $minutes * 60;
    
    $seconds = $diff;

    return [
        'years' => $years,
        'months' => $months,
        'days' => $days,
        'hours' => $hours,
        'minutes' => $minutes,
        'seconds' => $seconds
    ];
}


// Usage example
//$birthDate = "1990-01-01";

?>
<!DOCTYPE html>
<html>
<style type="text/css">
    body{
        background: lightgray;
    }
    form{
        width:400px;
        height: 50vh;
        background: crimson;
        border-radius: 10px;
        box-shadow:2px 2px 20px 10px whitesmoke ;
    }
    input{
        font-weight: bold;
        height: 40px;
        font-size: 17px;
        border-radius: 5px;
    }
    input[type=date]{
        width: 50%;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Age Calculator</title>
</head>
<body> 
  <center><form action="" method="POST">
    <center><h1>Age Calculator</h1></center>
        <h3>Select Your Date Of Birth:</h3>
<input type="date" name="birthdate" value="<? php echo (isset($_post['birthdate']))?$_post['birthdate'] : '';?>"/><br><br>
<input type="submit" name="submit" value="Calculate Age" /><br><br>

<?php
$age = calculateAge($birthdate);

 if(isset($_POST['birthdate']) && $_POST['birthdate']!='')
//echo calculateAge($_POST['birthdate']);
    echo $age;
echo $age['years'] . " years, ";
echo $age['months'] . " months, ";
echo $age['days'] . " days, ";
echo $age['hours'] . " hours, ";
echo $age['minutes'] . " minutes, ";
echo $age['seconds'] . " seconds";
?>
</form>
</center> 
</body>
</html>