<?php

    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("pwchange_form.php", ["title" => "Password Change"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //check if crypt(oldpw) == current password
        $pw = query("SELECT `hash` FROM `users` WHERE `id`=?", $_SESSION["id"]);
        # echo $pw[0]["hash"]."</br>";
        # echo crypt($_POST["oldpw"], $pw[0]["hash"]);
        if(crypt($_POST["oldpw"], $pw[0]["hash"]) !== $pw[0]["hash"])
        {
            apologize("You entered the incorrect password.");
        }
        else
        {
            //check if password and confirm password match
            if ($_POST["newpw"] !== $_POST["confirmation"])
            {
                apologize("Passwords do not match.");
            }
            else
            {
                $pwchange = query("UPDATE `users` SET `hash`=? WHERE id=?", crypt($_POST["newpw"]), $_SESSION["id"]);
                if ($pwchange === false)
                {
                    apologize("Password change failed.");
                }
                else
                {
                    render("pwchange_conf.php");
                }
            }
        }
    }
?>
