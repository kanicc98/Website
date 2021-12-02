<?php

require "connect.php";

echo "<header>
                <h1>Client List</h1>
        </header>
        <table class=\"table\">
        	<thead>
            	<tr>
                	<th scope =\"col\">Client Name</th>
                	<th scope =\"col\">Email</th>
                	<th scope =\"col\">Newsletter</th>
                	<th scope =\"col\">Newsflash</th>
            	</tr>
            </thead>
        
			<tbody>";

$sql = "SELECT * FROM Client";
$smt = $conn->prepare($sql);
$smt->execute();
//run the query

while ($row = $smt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";

    echo "<td>" . $row["FirstName"] . "</td>";

    echo "<td>" . $row["Email"] . "</td>";

    if ($row["Newsletter"] == "true") {
        echo "<td>" . $row["Newsletter"] . "</td>";
    } else {
        echo "<td>" . "false" . "</td>";
    }

    if ($row["Newsflash"] == "true") {
        echo "<td>" . $row["Newsflash"] . "</td>";
    } else {
        echo "<td>" . "false" . "</td>";
    }

    echo "</tr>";
}
echo "</tbody>
        </table> ";
?>