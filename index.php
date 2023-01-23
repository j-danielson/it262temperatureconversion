<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//index.php
//Far-> C (F - 32) x 5/9 = C
//F -> K (32°F − 32) × 5/9 + 273.15
//C -> F (C x9/5) + 32 = Fs
//C -> K 0°C + 273.15 = 273.15K
//K -> F (0K − 273.15) × 9/5 + 32 = -459.7°F
//K -> C 0K − 273.15 = -273.1°C

if(isset($_POST["Temperature"], $_POST["CurrentScale"], $_POST["NewScale"])){
    $cScale = $_POST["CurrentScale"];
    $nScale = $_POST["NewScale"];
    $cTemp = $_POST["Temperature"];
    $nTemp = 0;

    if($cScale == "fahrenheit" && $nScale == "celcius") {
        $nTemp = round(($cTemp - 32) * 5 / 9, 2);
        echo "$cTemp&deg in $cScale is $nTemp&deg in $nScale.";
    }elseif($cScale == "fahrenheit" && $nScale == "kelvin") {
        $nTemp = round(($cTemp - 32) * 5 / 9 + 273.15, 2);
        echo "$cTemp&deg in $cScale is $nTemp&deg in $nScale.";
    }elseif($cScale == "celcius" && $nScale == "fahrenheit") {
        $nTemp = round(($cTemp * 9 / 5) + 32, 2);
        echo "$cTemp&deg in $cScale is $nTemp&deg in $nScale.";
    }elseif($cScale == "celcius" && $nScale == "kelvin") {
        $nTemp = round($cTemp + 273.15, 2);
        echo "$cTemp&deg in $cScale is $nTemp&deg in $nScale.";
    }elseif($cScale == "kelvin" && $nScale == "fahrenheit") {
        $nTemp = round(($cTemp - 273.15) * 9 / 5 + 32, 2);
        echo "$cTemp&deg in $cScale is $nTemp&deg in $nScale.";
    }elseif($cScale == "kelvin" && $nScale == "celcius") {
        $nTemp = round($cTemp - 273.15, 2);
        echo "$cTemp&deg in $cScale is $nTemp&deg in $nScale.";
    } elseif(empty($_POST["Temperature"] && $_POST["CurrentScale"] && $_POST["NewScale"])) {
        echo "Please fill out all of the fields.";
    }elseif($cScale == $nScale) {
        echo "Please select a different scale.";
    }
}else{
    //show form
    //NEED CEL->FAR, FAR->CEL, FAR->KEL
    //EC: CONVERT BETWEEN ALL THREE AND ROUND DECIMAL
    echo '
        <form action="" method="POST">
            <p>Temperature: <input type="number" name="Temperature" /></p>
            <fieldset>
            <legend>Current Scale</legend>
                <p><input type="radio" name="CurrentScale" value="celcius" />Celcius</p>
                <p><input type="radio" name="CurrentScale" value="fahrenheit" />Fahrenheit</p>
                <p><input type="radio" name="CurrentScale" value="kelvin" />Kelvin</p>
            </fieldset>
            <fieldset>
            <legend>Convert To</legend>
                <p><input type="radio" name="NewScale" value="celcius" />Celcius</p>
                <p><input type="radio" name="NewScale" value="fahrenheit" />Fahrenheit</p>
                <p><input type="radio" name="NewScale" value="kelvin" />Kelvin</p>
            </fieldset>
            <p><input type="submit" /></p>
        </form>
    ';
}
?>
</body>
</html>