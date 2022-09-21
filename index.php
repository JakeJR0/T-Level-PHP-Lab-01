<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Student Viewer</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        
        <div style="margin-top: 30px;" class="text-center">
            <h1 class="display-4">
                Student Viewer
            </h1>
        </div>
        <?php
            # Includes the student.php file.
            include('student.php'); 
        ?>
        <div>
            <div class="table-collection">
                <div class="table-container">
                    <h3 class="text-center">Unsorted Table</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($students as $student) {
                                    echo "<tr>";
                                    foreach ($student as $value) {
                                        echo "<td>$value</td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-container">
                    <h3 class="text-center">Sorted by Name Table</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                array_multisort(array_column($students, 'name'), SORT_ASC, $students);
                                foreach ($students as $student) {
                                    echo "<tr>";
                                    foreach ($student as $value) {
                                        echo "<td>$value</td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-container">
                    <h3 class="text-center">Sorted by Age Table</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                array_multisort(array_column($students, 'age'), SORT_ASC, $students);
                                foreach ($students as $student) {
                                    echo "<tr>";
                                    foreach ($student as $value) {
                                        echo "<td>$value</td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="text-center">
            <h3 style="margin-top: 30px;" class="display-4" >
                Average Age: <?php echo $average_age; ?>
            </h3>
        </div>

        <div id="compare-table">
            <?php
                if (isset($_GET["user"])) {
                    $provided_name = $_GET["user"];
                } else {
                    $provided_name = "";
                }
                
                $matched = false;

                foreach ($students as $student) {
                    if ($student['name'] == $provided_name) {
                        $student_age = $student['age'];
                        $matched = true;
                    }
                }
                
                

                if ($matched == false) {
                    if($provided_name == "") {
                        echo "<h3 class='text-center'>Please search for a person to compare</h3>";
                        echo "<h4 class='text-center' style='margin-bottom: 30px;'>Comparing by Average Age</h4>";
                    } else {
                        echo "<h3 class='text-center'>No student found with the name: $provided_name</h3>";
                        echo "<h4 class='text-center' style='margin-bottom: 30px;'>Comparing by Average Age</h4>";
                    }
                    $student_age = $average_age;
                } else {
                    echo "<h3 class='text-center'>$provided_name is $student_age years old</h3>";
                    echo "<h4 class='text-center' style='margin-bottom: 30px;'>Comparing by $provided_name's Age</h4>";
                }

            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($students as $student) {
                            echo "<tr>";
                            echo "<td>$student[name]</td>";
                            if ($student['age'] > $student_age) {
                                echo "<td>Older</td>";
                            } elseif ($student['age'] == $student_age) {
                                echo "<td>Equal</td>";
                            } else {
                                echo "<td>Younger</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <form action="" class="form-horizontal" style="margin-top: 50px;" align="center">
                <div class="form-group">
                    <input type="text" name="user" placeholder="Name to compare" style="text-align: center">
                </div>
                        
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>    
        </div>

        <table class="table" id="student-status-table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($students as $student) {
                        echo "<tr>";
                        echo "<td>$student[name]</td>";
                        if ($student['age'] >= 18) {
                            echo "<td>Adult</td>";
                        } else {
                            echo "<td>Minor</td>";
                        }
                        echo "</tr>";
                    }
                ?>
        </table>

    </body>
</html>