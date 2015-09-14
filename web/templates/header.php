<!DOCTYPE html>

<html>

    <head>
        
        <link href="/css/body.css" rel="stylesheet"/>
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Health: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Health</title>
        <?php endif ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="widetile" id="top" style="background-color:#f9f9f9">
            <table class="table">
                <tr>
                    <td>
                        <div align="left"><a href="/"><img alt="C$50 Health" src="/img/CS50health.png"/></a></div>
                        <br><br>
                    </td>
                    <td>
                        <?php if (isset($_SESSION["id"]))
                            echo "
                            <div align=\"right\">Hello, " . $_SESSION["username"] . "!</div>
                            <div align=\"right\"><a href=\"password_change.php\">Change Password</a></div>
                            <div align=\"right\"><a href=\"logout.php\">Logout</a></div>
                            ";
                        ?>
                    </td>
                </tr>
            <table>               
        
            <?php if (isset($_SESSION["id"]))
                echo "<div class=\"widetile\" style=\"background:rgba(154,214,214,1)\"\">
                    <a href=\"index.php\">Home</a>
                    <a href=\"calories.php\">Calories</a>
                    <a href=\"exercise.php\">Exercise</a>
                    <a href=\"water.php\">Water</a>
                    <a href=\"profile.php\">Profile</a>
                </div>";
            ?>
        </div>      
            

<div id="middle">


