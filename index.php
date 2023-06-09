<?php

require "config.php";

use App\Department;

$depts = Department::list();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Departments</title>
    <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>

</head>
<body>
    <div class="container-fluid mt-3">
        <h2>Departments</h2>
        <table id="departmentTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Department Number</th>
                    <th>Department Name</th>
                    <th>Manager Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Number of Years</th>
                    <th>Employees</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                        foreach ($depts as $row) {
                            echo "<tr>";
                            
                            $cols = get_object_vars($row);
                            echo "<td>".$cols["Department_Number"]."</td>";
                            echo "<td>".$cols["Department_Name"]."</td>";
                            echo "<td>".$cols["Manager_Name"]."</td>";
                            echo "<td>".$cols["From_Date"]."</td>";
                            echo "<td>".$cols["To_Date"]."</td>";
                            echo "<td>".$cols["Number_of_Years"]."</td>";
                            
                            echo "<td><a href='employees.php?dept=".$cols["Department_Number"]."&emp=".$cols["Manager_Number"]."
                                      '>View</a></td>";
                            
                            echo "</tr>";  
                          }
                    ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#departmentTable').DataTable();
        } );
    </script>
</body>
</html>
