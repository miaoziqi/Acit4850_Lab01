<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo 'hello world';
        // put your code here
        echo 'hi there';
        $temp = 'jim';
        echo 'Hi, my name is ';
        echo $temp;
        echo '<br/>';

        $temp = 'geek';
        echo "I am a ";
        echo $temp;
        echo '<br/>';
        $temp = 10;

        echo 'My level is ';
        echo $temp;
        echo '<br/>';
        //PHP Operators
        $name = 'Jim';
        $what = 'geek';
        $level = 10;
        echo 'Hi, my name is ' . $name . ', and I am a level ' . $level . ' ' . $what;
        //PHP Expressions
        echo '<br/>';
        //http://localhost:4850/Acit4850_Lab01/index.php?hours=25
        $hoursworked = $_GET['hours']; //10;
        $rate = 12;
        $total = $hoursworked * $rate;
        echo 'You owe me ' . $total;

        //PHP Selection
        echo '<br/>';
        if ($hoursworked > 40) {
            $total = $hoursworked * $rate * 1.5;
        } else {
            $total = $hoursworked * $rate;
        }
        echo '<br/>';
        echo ($total > 0) ? 'You own me' . $total : "you're welcome";
        echo '<br/>';
        //http://localhost:4850/Acit4850_Lab01/index.php?board=xxxooo---
        $position = $_GET['board'];
        $squares = str_split($position);
        echo $position;

        if (winner('x', $squares)) {
            echo 'you win.';
        } else if (winner('o', $squares)) {
            echo 'I win.';
        } else {
            echo 'No winner yet,but you are losing';
        }
        
        echo '<br/>';
        echo 'game class test';
          echo '<br/>';
        $squares = $position;
        $game = new Game($squares);
        if ($game->winner('x')){
            echo 'You win.';
        }else if($game -> winner('o')){
            echo 'I win.';
        }else {
            echo 'No winner yet, but you are lose';
        }
        ?>
    </body>
</html>
<?php

function winner($token, $position) {
    /*
      $won = false;
      if (($position[0] == $token) && ($position[1] == $token) && ($position[2] == $token)) {
      $won = true;
      } else if (($position[3] == $token) && ($position[4] == $token) && ($position[5] == $token)) {
      $won = true;
      } else if (($position[6] == $token) && ($position[7] == $token) && ($position[8] == $token)) {
      $won = true;
      }
     */

    $countFalse = 0;
    for ($row = 0; $row < 3; $row++) {
        $result = true;
        for ($col = 0; $col < 3; $col++) {
            if ($position[3 * $row + $col] != $token) {
                $result = false;
                $countFalse++;
            }
            if ($result == true) {
                return $result;
            }
        }
    }
    // return $won;
    if ($countFalse != 3) {
        //return true;
    }
    return $result;
}

class Game {

    var $position;

    function __construct($squares) {
        $this->position = str_split($squares);
    }

    function winner($token) {
        for ($row = 0; $row < 3; $row++) {
            $result = true;
            for ($col = 0; $col < 3; $col++) {
                if ($this->position[3 * $row + $col] != $token) {
                    $result = false;
                    $countFalse++;
                }
                if ($result == true) {
                    return $result;
                }
            }
        }
        // return $won;
        if ($countFalse != 3) {
            //return true;
        }
        return $result;
    }

}
?>