<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        // render form
        rendhead("calories_entry.php", ["title" => "Water"]);
        
        // retrieve water history
        $calories = query("SELECT * FROM history WHERE id=? AND type=?", $_SESSION["id"], "calories");
    
        //render history
        rendbot("calories_history.php", ["title" => "History", "data" => $calories]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // calculate calorie intake
        $cals = $_POST["calories"] * $_POST["servings"];
        
        // update database
            $upcal = query("INSERT INTO `history` (id, type, value, date) VALUES(?, ?, ?, CURDATE()) 
            ON DUPLICATE KEY UPDATE value=value+VALUES(value)", $_SESSION["id"], "calories", $cals);
        
        // retrieve new information
        redirect("calories.php");
        
    }


?>
