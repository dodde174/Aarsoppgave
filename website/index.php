<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
</head>
<body>
    <h1>Leaderboards</h1>

    <table id="scoretable">

    <tr>
        <th>Plassering</th>
        <th>Tag</th>
        <th>Poeng</th>
        <th>Dato</th>
    </tr>
    <?php

        $host = "10.2.1.132";
        $user = "client";
        $password = "79E76w864dcKbja";
        $database = "highscores";
    
        $connect = mysqli_connect($host, $user, $password, $database);

        $sql = "SELECT id, navn, score, DATE_FORMAT(dato, '%d.%m.%Y') dato FROM attempt ORDER BY score DESC;";

        $result = mysqli_query($connect, $sql);
        $numberOfResults = mysqli_num_rows($result);

        if ($numberOfResults > 0) {
            $rank = 1;
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>" .
                "<td>" . $rank . "." . "</td>" .
                "<td>" . $row["navn"] . "</td>" .
                "<td>" . $row["score"] . "</td>" .
                "<td>" . $row["dato"] . "</td>" .
                "</tr>";
                $rank++;
            }
        }

    ?>
    </table>

</body>
</html>