<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        // render form
        rendhead("water_entry.php", ["title" => "Water"]);
        
        // retrieve water history
        $water = query("SELECT * FROM history WHERE id=? AND type=?", $_SESSION["id"], "water");
    
        //render history
        rendbot("water_history.php", ["title" => "History", "data" => $water]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // update database
        if (isset($_POST['plusone'])) 
        { 
            $upone = query("INSERT INTO `history` (id, type, value, date) VALUES(?, ?, ?, CURDATE()) 
            ON DUPLICATE KEY UPDATE value=value+VALUES(value)", $_SESSION["id"], "water", 1);
        }
        
        else if (isset($_POST['minusone'])) 
        { 
            $downone = query("INSERT INTO `history` (id, type, value, date) VALUES(?, ?, ?, CURDATE()) 
            ON DUPLICATE KEY UPDATE value=value-VALUES(value)", $_SESSION["id"], "water", 1);
        }
        else
        {
            $upone = query("INSERT INTO `history` (id, type, value, date) VALUES(?, ?, ?, CURDATE()) 
            ON DUPLICATE KEY UPDATE value=value+VALUES(value)", $_SESSION["id"], "water", $_POST["water"]);
        }

        
        // retrieve new information
        redirect("water.php");
        
    }


?>
