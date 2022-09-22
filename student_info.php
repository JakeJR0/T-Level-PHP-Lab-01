<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            # Creates the students array
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

            # Initialize Variables 
            
            $average_age = 0;
            $student_age = 0;

            # Loops through students
            foreach ($students as $student) {
                # Adds student's age to average age
                $average_age += $student['age'];
            }
            
            # Calculates the average 
            $average_age = strval(round($average_age / count($students)));
            
        ?>
    
    </body>
</html>
