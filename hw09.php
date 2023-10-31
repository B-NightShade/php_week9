<?php
function fib($n, &$arr){
    if(array_key_exists($n, $arr)){
        return $arr[$n];
    }else{
        $arr[$n] = fib($n-1, $arr) + fib($n-2, $arr);
        return (fib($n-1, $arr)) + (fib($n-2, $arr));
    }
}

function factorial($n){
    if($n == 1 || $n == 0){
        return $n;
    }
    return $n * factorial($n-1);
}

function arith($x, $y, $operations){
    $retvals = array();
    for($i = 0 ; $i < count($operations); $i++){
        $op = $operations[$i];
        switch($op){
            case "+":
                $result = $x + $y;
                break;
            case "-":
                $result = $x - $y;
                break;
            case "*":
                $result = $x * $y;
                break;
            case "/":
                $result = $x / $y;
                break;
            case "^":
                $result =  pow($x, $y);
                break; 
            case "%":
                $result = $x % $y;
                break;   
    }
        $answer = $x . " " . $operations[$i] . " ". $y . " = " . $result;
        $retvals[] = $answer;
    }
    return $retvals;
}

$result = "";

if(isset($_POST["fib"])){
    $numbers = array();
    $numbers[0] = 0;
    $numbers[1] = 1;
    if($_POST["fib"] == 1){
        $result = "The " . $_POST["fib"] . "st fibonacci number is ";
    }else if($_POST["fib"] == 2){
        $result = "The " . $_POST["fib"] . "nd fibonacci number is ";
    }else{
        $result = "The " . $_POST["fib"] . "th fibonacci number is ";
    }
    $result .= fib($_POST["fib"], $numbers);
}

if (isset($_POST["factorial"])){
    $result = $_POST["factorial"] . " factorial is ";
    $result .= factorial($_POST["factorial"]);
}

if(isset($_POST['x'])){
    $operations = $_POST["operations"];
    $x = $_POST["x"];
    $y = $_POST["y"];
    $answers = arith($x, $y, $operations);
    foreach($answers as $a){
        $result .= $a . "<br>";
    }
}

?>

<hmtl>
    <p><?php echo $result; ?></p>
    <h1>Arithmetic Calculator:</h1>
    <form method="POST">
        x: <input type="number" name="x" required>
        <br>
        y: <input type="number" name="y" required>
        <br>
        <select name="operations[]" size="6" multiple required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="^">^</option>
            <option value="%">%</option>
        </select>
        <br>
        <input type ="submit" value="CALCULATE" id="Arithmetic">
    </form>

    <hr>
    <h1>Factorial:</h1>
    <form method="POST">
        n: <input type="number" name="factorial" min = "0" step= "1" required>
        <br>
        <input type="submit" value="FACTORIAL" id="Factorial">
    </form>

    <hr>
    <h1>Fibonacci:</h1>
    <form method = "POST">
        n: <input type="number" name="fib" min = "0" step= "1" required>
        <br>
        <input type="submit" value="FIBONACCI" id="Fibonacci">
    </form>
</hmtl>