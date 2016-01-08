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
        //$game->pick_move();
        $game->pick_move_random();
        $game->display();
        if ($game->winner('x')) {
            echo 'You win.';
        } else if ($game->winner('o')) {
            echo 'I win.';
        } else {
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
            //check row
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
                    $countTrue = 0;
                    for ($col = 0; $col < 3; $col++) {
                        if ($this->position[3 * $row + $col] != $token) {
                            $result = false;
                        } else {
                            $countTrue++;
                        }
                        if ($result == true && $countTrue == 3) {
                            return true;
                        }
                    }
                }

                //check column
                
                for ($col = 0; $col < 3; $col++) {
                    $result = true;
                    $countTrue = 0;
                    for ($row = 0; $row < 3; $row++) {
                        if ($this->position[$col+3*$row] != $token) {
                            $result = false;
                            //0+0 = 0
                            //0+1 = 3
                            //0
                        }else {
                            $countTrue++;
                        }
                        if ($result == true && $countTrue == 3) {
                            return true;
                        }
                        
                    }
                }
                //012
                //345
                //678
                // check 048 and 246
                $check048 = 0;
                $check246 = 0;
                for ($count=0 ; $count <3 ; $count++){
                    
                    if($this->position[$count*4]== $token){
                        $check048++;
                        if($check048 == 3){
                            return true;
                        }
                    }
                    
                    if($this->position[2+$count*2]==$token){
                        $check246++;
                        if($check246 == 3){
                            return true;
                        }
                    }
                }
                // return $won;

                return $result;
            }

            function display() {

                echo '<table cols="3" style="font-size:large; font-weight:bold">';
                echo '<tr>'; // open the first row
                for ($pos = 0; $pos < 9; $pos ++) {
                    //echo '<td>-</td>';
                    echo $this->show_cell($pos);
                    if ($pos % 3 == 2)
                        echo '</tr><tr>'; // start a new row for next square
                }
                echo '</tr>';
                echo '</table>';
            }

            function show_cell($which) {
                $token = $this->position[$which];
                //deal with the easy case
                if ($token <> '-')
                    return '<td>' . $token . '</td>';
                // now the hard case
                $this->newposition = $this->position;
                $this->newposition[$which] = 'x';
                $move = implode($this->newposition);
                $link = '?board=' . $move;
                return '<td><a href=' . $link . '>-</a></td>';
            }

            function pick_move() {
                for ($loc = 0; $loc < 9; $loc++) {
                    if ($this->position[$loc] == '-') {
                        $this->position[$loc] = 'o';
                        return;
                    }
                }
            }
            
            function pick_move_random(){
                $min = 0;
                $max = 8;
                $random_number = mt_rand($min, $max);
                for ($loc = 0; $loc < 9; $loc++) {
                    if ($this->position[$random_number] == '-') {
                        $this->position[$random_number] = 'o';
                        return;
                    }
                }
            }

        }
        ?>