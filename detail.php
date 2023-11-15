<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include 'connect.php';


    //echo "dit komt er binnen" .  $_GET['project'];

    if(isset($_GET['project']) && !empty($_GET['project'])) {
        $project = $_GET['project'];
    }else{
        $project = 1;
    }

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT id, name, language, discription_long, git FROM projects WHERE id = ". $project);
        $stmt->execute();


        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($stmt->fetchAll() as $k => $v) {
            echo $v['id'] . ": ";
            echo $v['name'];
            echo " - " . $v['language'];
            echo " - " . $v['discription_long'];
            echo " - " . $v['git'];
            echo "<br>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    


    ?>
</body>

</html>