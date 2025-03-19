<html>
<head>
    <title>
        Quiz Management System
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
session_start();
require_once 'sql.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
}
?>
<style>
    body {
        background-image: url("background.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    leaderboard {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        text-align: center;
        width: 100%;
        color: white;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px;
    }
    td {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 10px;
    }
    tr:nth-child(even) {
        background-color: rgba(0, 0, 0, 0.7);
    }
    tr:nth-child(odd) {
        background-color: rgba(0, 0, 0, 0.5);
    }
    th, td {
        border: 1px solid white;
    }
    h1 {
        text-align: center;
        color: white;
    }
    button {
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;    
    }
    button:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
<body>
    <leaderboard></leaderboard>
        <h1>Leaderboard</h1>
        <table>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Score</th>
            </tr>
            <?php
            $sql = "SELECT * FROM users ORDER BY score DESC";
            $result = mysqli_query($conn, $sql);
            $rank = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $rank . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['score'] . "</td>";
                echo "</tr>";
                $rank++;
            }
            ?>
        </table>
        <br>
        <button onclick="window.location.href='home.php'">Home</button>
    </leaderboard>
    <?php
    ?>
</body>
</html>