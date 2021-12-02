<?php

require "connect.php";

echo "<header>
                <h1>Employee List</h1>
        </header>
        <table class=\"table\">
        	<thead>
            	<tr>
                	<th scope =\"col\">Username</th>
                	<th scope =\"col\">Password</th>
            	</tr>
            </thead>
        
			<tbody>";

$sql = "SELECT * FROM Employees";
$smt = $conn->prepare($sql);
$smt->execute();
//run the query

while ($row = $smt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";

    echo "<td>" . $row["username"] . "</td>";

    echo "<td>" . $row["password"] . "</td>";

    echo "</tr>";
}
echo "</tbody>
        </table> ";
?>