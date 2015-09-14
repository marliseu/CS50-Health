<br>

<table class="table">
    <tr>
        
        <td>
            <div class="fronttile">
                <?php
                    echo("<h3>You have consumed <br><br>" . (int)$calories[0]["value"] . "<br><br> calories today!</h3>");
                ?>
                <br>
                <form action="calories.php" method="get">
                    <fieldset>
                        <div class="form-group">
                            <table class="table">
                                <tr>
                                    <td><button type="submit" name="addcals" class="btn btn-default">Add Food</button></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </form>
                <?php
                    if (isset($_POST['addcals'])) 
                    {
                        redirect("calories.php", ["title" => "Calories"]);
                    }
                ?>
            </div>
        </td>
        
        <td>
            <div class="fronttile">
                <?php
                    echo("<h3>You have burned <br><br>" . (int)$exercise[0]["value"] . "<br><br> calories today!</h3>");
                ?>
                <br>
                <br>
                <br>
                <form action="exercise.php" method="get">
                    <fieldset>
                        <div class="form-group">
                            <table class="table">
                                <tr>
                                    <td><button type="submit" name="addex" class="btn btn-default">Add Exercise</button></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </form>
                <?php
                    if (isset($_POST['addex'])) 
                    {
                        redirect("exercise.php", ["title" => "Exercise"]);
                    }
                ?>
            </div>       
        </td>
        
        <td>
            <div class="fronttile">
                <?php
                    echo("<h3>You drank <br><br>" . (int)$water[0]["value"] . "<br><br> glasses of water today!</h3>");
                ?>
                <br>
                <form action="water.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <table class="table"  id="water">
                                <tr>
                                    <td><button type="submit" name="minusone" class="btn btn-default">-</button></td>
                                    <td><h4>Increment Water</h4></td>
                                    <td><button type="submit" name="plusone" class="btn btn-default">+</button></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </form>
            </div>
        </td>
        
        
    <tr>
    
        <td>
            <div class="fronttile">
                <?php
                    echo("<h3>You have<br><br></h3><h2>" . (int)$daily . "</h2><h3><br><br>left!</h3>");
                ?>
            </div>
        </td>
        
        <td>
            <div class="fronttile">
                <?php
                    if ($weight[0]["weightlbs"] === 0)
                        echo("<h3>You have no weight data!</h3>");
                    else
                        echo("<h3>You weigh <br><br></br><h2>" . (int)$weight[0]["weightlbs"] . "</h2><h3><br><br> pounds!</h3>");
                ?>
            </div>
        </td>
        
        <td>
            <div class="fronttile">
                <?php
                    if ($weight[0]["weightlbs"] === 0)
                        echo("<h3>Not enough data!</h3>");
                    else
                        echo("<h3>Your BMI is <br><br></h3><h2>" . (int)$bmi . "</h2></h3><br></h3>");
                ?>
            </div>
        </td>
        
    </tr>
</table>
        
    </tr>
    
    
</table>

