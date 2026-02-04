<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chat App</title>
</head>
<body onload="show_func()">
    <div id="container">
        <main>
            <header>
                <img src="https://s3-us-west-2.amazonaws.com/
                s.cdpn.io/1940306/ico_star.png" alt="">
                <div>
                    <h2>GROUP CHAT</h2>
                </div>
                <img src="https://s3-us-west-2.amazonaws.com/
                s.cdpn.io/1940306/ico_star.png" alt="">
            </header>
            <script>
                function show_func() {
                    var element = document.getElementById('#chathist'); // ?
                    element.scrollTop = element.scrollHeight;
                }
            </script>
            <form id="myform" action="group_chat.php" method="POST">
                <div class="inner_div" id="chathist">
                    <?php
                        $con = require_once 'db_connect.php';
                        $query = "SELECT * FROM chats";
                        $run = $con->query($query);
                        $i = 0;
                        while ($row = $run->fetch_array()):
                            if ($i == 0) {
                                $i=5;
                                $first=$row;
                                ?>
                                <div id="triangle1" class="triangle1"></div>
                                <div id="message1" class="message1"> 
                                <span style="color:white;float:right;"> 
                                <?php echo $row['msg']; ?>
                                </span> <br/>
                                <div>
                                <span style="color:black;float:left;
                                font-size:10px;clear:both;">
                                <?php echo $row['uname']; ?>, <?php echo $row['dt']; ?>
                                </span>
                                </div>
                                </div>
                                <br/><br/>
                                <?php
                            }
                    ?>
                </div>
            </form>
        </main>
    </div>
</body>
</html>