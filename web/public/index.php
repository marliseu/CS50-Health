<?php

    // configuration
    require("../includes/config.php");
    
    $calrow = query("INSERT INTO `history` (id, type, value, date) 
                      VALUES(?, \"calories\", 0, CURDATE()) 
                        ON DUPLICATE KEY UPDATE value = value + VALUES(value);", 
                        $_SESSION["id"]);
    $exrow = query("INSERT INTO `history` (id, type, value, date) 
                      VALUES(?, \"exercise\", 0, CURDATE()) 
                        ON DUPLICATE KEY UPDATE value = value + VALUES(value);", 
                        $_SESSION["id"]);

    $watrow = query("INSERT INTO `history` (id, type, value, date) 
                      VALUES(?, \"water\", 0, CURDATE()) 
                        ON DUPLICATE KEY UPDATE value = value + VALUES(value);", 
                        $_SESSION["id"]);

    $prorow = query("INSERT INTO `profile` (id, gender, heightfeet, heightinches, weightlbs) 
                      VALUES(?, NULL, 0, 0, 0) 
                        ON DUPLICATE KEY UPDATE weightlbs = weightlbs + VALUES(weightlbs);", 
                        $_SESSION["id"]);                       
    
    
    $calories = query("SELECT * FROM history WHERE id = ? AND type = ? AND date = CURDATE()", $_SESSION["id"], "calories");

    $exercise = query("SELECT * FROM history WHERE id = ? AND type = ? AND date = CURDATE()", $_SESSION["id"], "exercise");

    $water = query("SELECT * FROM history WHERE id = ? AND type = ? AND date = CURDATE()", $_SESSION["id"], "water");

    $weight = query("SELECT * FROM profile WHERE id = ?", $_SESSION["id"]);
    
    $heightfeet = query("SELECT * FROM profile WHERE id = ?", $_SESSION["id"]);

    $heightinches = query("SELECT * FROM profile WHERE id = ?", $_SESSION["id"]);

    if ($heightfeet !== 0 && $heightinches !== 0 && $weight !== 0)
    {
        $height = (($heightfeet[0]["heightfeet"] * 12) + $heightinches[0]["heightinches"]);
        $lbs = $weight[0]["weightlbs"];
        $bmi = 703 * ($lbs / ($height * $height));
    }
    else
        $bmi = NULL;
        
    
    if ($exercise !== NULL)
    {
        $daily = 2000 - (int)$calories[0]["value"] + $exercise[0]["value"]; 
    }
    else if ($exercise === NULL)
    {
        $daily = 2000 - (int)$calories[0]["value"];
    }
    
    // render home
    render("home.php", ["title" => "Home", "calories" => $calories, "exercise" => $exercise, "water" => $water, "weight" => $weight, 
    "height" => $height, "pounds" => $lbs, "bmi" => $bmi, "daily" => $daily
    ]);

?>
