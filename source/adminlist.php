<?php

require "connect.php";

echo "<header>
                <h1>Client List</h1>
        </header>
        <table class=\"table\">
        	<thead>
            	<tr>
                	<th scope =\"col\">Username</th>
                	<th scope =\"col\">Password</th>
            	</tr>
            </thead>
        
			<tbody>";

$sql = "SELECT * FROM Client";
$smt = $conn->prepare($sql);
$smt->execute();
//run the query

while ($row = $smt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";

    echo "<td>" . $row["Username"] . "</td>";

    echo "<td>" . $row["Password"] . "</td>";


    echo "</tr>";
}
echo "</tbody>
        </table> ";
?>