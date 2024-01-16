<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="card.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>TicketMistress</title>
</head>
<body>
    <?php
    include_once "components.php";
    include_once "config.php";
    navbar();
    $SQL = 'SELECT * FROM `event`';
    $foundEvents = $conn->query($SQL);
    ?>
    <div class="row">
        
        <?php
    while($event = $foundEvents->fetch_assoc())
    {
        card($event['eventid'],$event['name'],$event['organizer'], $event['flavour_text']);
    }
    ?>
    </div>
</body>
</html>