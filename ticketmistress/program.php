<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="program.css">
    <title>test</title>
</head>

<body>
    <?php
    include 'components.php';
    include 'config.php';
    navbar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM event where `eventid` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql2 = "SELECT * FROM ticket where `eventid` = $id";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $count = mysqli_num_rows($result2);
    ?>
    <div class="event-container">
        <div class="event-content-container mouse-cursor-gradient-tracking">
            <div class="event-title">
                <h1>
                    <?= $row['name'] ?>
                </h1>
            </div>
            <div class="event-tagline">
                <h3>Headlining the event is <strong>
                        <?= $row['headliner'] ?>
                    </strong></h3>
                <h3>Organized by <strong>
                        <?= $row['organizer'] ?>
                    </strong></h3>
            </div>
            <div class="content-event">
                <p>
                    <?= $row['long_text'] ?>
                </p>
                <ul>
                    <li>
                        <p>
                            <?= $row['minimum_age'] > 0 ? "You can only attend from age $row[minimum_age]" : "Anybody can attend" ?>
                        </p>
                    </li>
                    <li>
                        <p>It will be held at
                            <?= $row['location'] ?> on
                            <?= $row['date'] ?>
                        </p>
                    </li>
                    <li>
                        <p>
                            <?= $count ?>/
                            <?= $row['max_spaces'] ?> have been sold
                            <?= intval($row['max_spaces']) - $count < 50 ? "<span class='red bold'>Hurry up, almost sold out!!!</span>" : "" ?>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="purchase-container">
            <?='<form action="cart.php?id='.$id.'" method="POST" class="ticket-container">'?>
                <div class="table-container">

                    <table>
                        <thead>
                            <tr>
                                <td>ticket type</td>
                                <td>price</td>
                                <td>quantity</td>
                            </tr>s
                        </thead>
                        <tbody>
                            <tr>
                                <td>Normal Ticket</td>
                                <td>
                                    <?= $row['normal_price'] ?>$
                                </td>
                                <td>
                                    <?= quantity('onIncreaseNormal', 'onDecreaseNormal', 'normal_ticket') ?>
                                </td>
                            </tr>
                            <tr>
                                <td>VIP ticket</td>
                                <td>
                                    <?= $row['vip_price'] ?>$
                                </td>
                                <td>
                                    <?= quantity('onIncreaseVip', 'onDecreaseVip', 'vip_ticket') ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input name="amounts" type="hidden" id="container" value='{"normal":0, "vip":0}'>
                <button type="submit" class="btn-primary">
                    BUY!
                </button>
            </form>
        </div>
    </div>
</body>

</html>
<script src="fun.js"></script>
<script>
    feather.replace({width:10, height:10})
</script>