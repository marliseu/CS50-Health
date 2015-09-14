<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $data = query("SELECT * FROM profile WHERE id=?", $_SESSION["id"]);
        
        $gender = $data[0]["gender"];
        $heightfeet = $data[0]["heightfeet"];
        $heightinches = $data[0]["heightinches"];
        $weightlbs = $data[0]["weightlbs"];
        
        if($gender === NULL || $heightfeet === 0 || $heightinches === 0 || $weightlbs === 0)
        {
            render("no_profile.php", ["title" => "Profile"]);
        }
        else
        {
            render("current_profile.php", ["title" => "Profile", "gender" => $gender, "heightfeet" => $heightfeet,
            "heightinches" => $heightinches, "weightlbs" => $weightlbs]);
        }
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        if (isset($_POST["edit"]))
        {
            render("profile_entry.php", ["title" => "Edit Profile"]);
        }

        if (isset($_POST["gender"]) && isset($_POST["heightfeet"]) && isset($_POST["heightinches"]) && isset($_POST["weightlbs"]))
        {
            // update database
            $update = query("UPDATE `profile` SET `gender`=?,`heightfeet`=?,`heightinches`=?,`weightlbs`=? 
            WHERE id=?", $_POST["gender"], $_POST["heightfeet"], $_POST["heightinches"], $_POST["weightlbs"], $_SESSION["id"]);
            
            // retrieve new information
            redirect("profile.php");
        }
    }


?>
