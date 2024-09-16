<!DOCTYPE html>
<html>

<head>

    <title>Using php function</title>
</head>

<body>


    <h3 style="color:red">Thils is plus f</h3>
    <?php
    function add()
    {
        $number1 = 10;
        $number2 = 20;
        $result = $number1 + $number2;
        return $result;
    }

    echo ("plus resutl:");
    echo add();
    echo "<br />";
    ?>

    <h3 style="color:red">Thils is minus f</h3>
    <?php
    function minus()
    {
        $number1 = 300;
        $number2 = 50;
        $result = $number1 - $number2;
        return $result;
    }
    echo ("minus resutl:");
    echo minus();
    echo "<br />";
    ?>

    <h3 style="color:red">Thils is devided f</h3>
    <?php
    function devided()
    {
        $number1 = 1000;
        $number2 = 10;
        $result = $number1 / $number2;
        return $result;
    }
    echo ("devided resutl:");
    echo devided();
    echo "<br />";
    ?>

    <h3 style="color: red;">Thils is multiply f</h3>
    <?php
    function multiply()
    {
        $number1 = 150;
        $number2 = 02;
        $result = $number1 * $number2;
        return $result;
    }
    echo ("multiply resutl:");
    echo multiply();
    echo "<br />";
    ?>

</body>

</html>