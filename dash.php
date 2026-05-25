<?php
$conn = new mysqli("localhost", "root", "", "smart_door");

$result = $conn->query("SELECT * FROM door_status ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Smart Door Dashboard</title>

<style>
body { font-family: Arial; background:#f4f4f4; text-align:center; }
table { width:70%; margin:auto; border-collapse:collapse; background:white; }
th, td { padding:10px; border:1px solid #ccc; }
th { background:#222; color:white; }

.open { color:green; font-weight:bold; }
.close { color:red; font-weight:bold; }

button {
  padding:10px 20px;
  margin:10px;
  font-size:16px;
}
</style>
</head>

<body>

<h1>🚪 Smart Door Dashboard</h1>

<!-- Control Buttons -->
<a href="control.php?status=OPEN">
<button style="background:green;color:white;">OPEN DOOR</button>
</a>

<a href="control.php?status=CLOSE">
<button style="background:red;color:white;">CLOSE DOOR</button>
</a>

<br><br>

<table>
<tr>
<th>ID</th>
<th>Status</th>
<th>Time</th>
</tr>

<?php
while($row = $result->fetch_assoc()) {

    $status = $row['status'];

    if($status == "OPEN"){
        $statusText = "<span class='open'>OPEN</span>";
    } else {
        $statusText = "<span class='close'>CLOSE</span>";
    }

    echo "<tr>
        <td>".$row['id']."</td>
        <td>".$statusText."</td>
        <td>".$row['created_at']."</td>
    </tr>";
}
?>

</table>

</body>
</html>