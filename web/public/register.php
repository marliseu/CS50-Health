<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        //check if username or password are blank
        if ($_POST["username"] == NULL || $_POST["password"] == NULL)
        {
            apologize("Username/password cannot be empty.");
        }
        else
        {
            //check if password and confirm password match
            if ($_POST["password"] !== $_POST["confirmation"])
            {
                apologize("Passwords do not match.");
            }
            else
            {
                //add new user
                query("INSERT INTO users (username, hash) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));
                query("INSERT INTO profile (id) VALUES(?)", $_SESSION["id"]);
                
                //check if insert failed
                if (query === false)
                {
                    apologize("You were not registered");
                }
                else
                {
                    //remember user ID and auto-log in
                    $rows = query("SELECT LAST_INSERT_ID() AS id");
                    $id = $rows[0]["id"];
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $_POST["username"];
                    
                    redirect("/profile.php");
                }
            }
        }
    }

?>
