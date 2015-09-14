<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        // render form
        rendhead("exercise_entry.php", ["title" => "Water"]);
        
        // retrieve water history
        $exercise = query("SELECT * FROM history WHERE id=? AND type=?", $_SESSION["id"], "exercise");
    
        //render history
        rendbot("exercise_history.php", ["title" => "History", "data" => $exercise]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // calculate calorie intake
        $excals = $_POST["minutes"] * 4.8;
        
        // update database
            $upcal = query("INSERT INTO `history` (id, type, value, date) VALUES(?, ?, ?, CURDATE()) 
            ON DUPLICATE KEY UPDATE value=value+VALUES(value)", $_SESSION["id"], "exercise", $excals);
        
        // retrieve new information
        redirect("exercise.php");
        
    }


?>
