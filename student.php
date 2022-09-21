<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            $students = array(
                array('name' => "Mitchell", 'age'=> 17),
                array('name' => "Derron", 'age'=> 17),
                array('name' => "Omarion", 'age'=> 19),
                array('name' => "Ela", 'age'=> 17),
                array('name' => "Jake", 'age'=> 18),
                array('name' => "Alex", 'age'=> 17),
                array('name' => "Rana", 'age'=> 19),
                array('name' => "Rehman", 'age'=> 19),
                array('name' => "Nour", 'age'=> 19),
                array('name' => "Temi", 'age'=> 18),
                array('name' => "Noman", 'age'=> 18),
                array('name' => "Taylor", 'age'=> 18),
                array('name' => "Elizabete", 'age'=> 17),
                array('name' => "Roddick", 'age'=> 17)
            );

            $average_age = 0;
            $student_age = 0;

            foreach ($students as $student) {
                $average_age += $student['age'];
            }

            $average_age = strval(round($average_age / count($students)));
            
        ?>
    
    </body>
</html>
