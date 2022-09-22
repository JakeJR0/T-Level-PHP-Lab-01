
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            # Site Information for Page
            include 'site_info.php';

            # Student Information
            include 'student_info.php';
        ?>

        <title>Student Viewer</title>

        <!-- Meta Tags -->

        <meta charset="UTF-8">
        <meta name="title" content="<?php echo SITE_NAME; ?>">
        <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta name="theme-color" content="<?php echo SITE_COLOUR; ?>">
        <meta property="twitter:card" content="summary">
        <meta property="twitter:title" content="<?php echo SITE_NAME; ?>">
        <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
        <meta property="twitter:description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo SITE_URL; ?>">
        <meta property="og:description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta property="og:title" content="<?php echo SITE_NAME; ?>">
        
        <!-- Bootstrap CSS -->
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    </head>
    <body>
        <!-- Header -->
        <div style="margin-top: 30px;" class="text-center">
            <h1 class="display-4">
                <?php echo SITE_NAME; ?>
            </h1>
            <p class="lead">
                <?php echo SITE_DESCRIPTION; ?>
            </p>
        </div>
        <!-- End Header -->

        <!-- Creates a container for the tables -->
        <div>
            <!-- Creates a table collection -->
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
                                # Loops through the unsorted array and displays the data
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
                                # Sorts the array by name
                                array_multisort(array_column($students, 'name'), SORT_ASC, $students);
                                # Loops through the sorted array and displays the data
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
                                # Sorts the array by age
                                array_multisort(array_column($students, 'age'), SORT_ASC, $students);
                                # Loops through the sorted array and displays the data
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
                # Checks if the user has submitted the form
                if (isset($_GET["user"])) {
                    # Gets the user input
                    $provided_name = $_GET["user"];
                } else {
                    # Sets the provided name to an empty string
                    $provided_name = "";
                }
                
                $matched = false;

                # Loops through the array 
                foreach ($students as $student) {
                    # Checks if the provided name matches
                    # to one in the array
                    if ($student['name'] == $provided_name) {
                        # Gets the student's name that matched
                        $student_age = $student['age'];
                        $matched = true;
                    }
                }
                
                # Checks if the provided name matched
                # a name in the array and displays
                # a response.
                if ($matched == false) {
                    # Checks if the user provided a name which was not a match or if the user did not provide a name.
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
            <!-- User Form -->
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
                    # Loops through the array
                    foreach ($students as $student) {
                        # Creates a table row
                        echo "<tr>";
                        # Inserts the student name 
                        # into the row
                        echo "<td>$student[name]</td>";

                        # Checks if the student is 18 or over
                        # and displays the correct status of the
                        # user.

                        if ($student['age'] >= 18) {
                            echo "<td>Adult</td>";
                        } else {
                            echo "<td>Minor</td>";
                        }

                        # Closes the table row
                        echo "</tr>";
                    }
                ?>
        </table>
        
        <!-- Footer (Shows College Name and Course name) -->
        <footer>
            <p class="text-center">College Name: <strong><?php echo '<a target="_blank" href="'. COLLEGE_URL .'">'. COLLEGE_NAME .'</a>'; ?></strong></p>
            <p class="text-center">Course Name: <strong><?php echo '<a target="_blank" href="'. COURSE_URL .'">'. COURSE_NAME .'</a>'; ?></strong></p>
        </footer>
    </body>
</html>