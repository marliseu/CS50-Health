<div class="widetile">
    <table class="table">
        <?php
                print("<tr>");
                print("<td><b>Calories</b></td>");
                print("<td><b>Date</b></td>");
                print("</tr>");

                foreach ($data as $cal)
                {                
                    print("<tr>");
                    print("<td>{$cal["value"]}</td>");
                    print("<td>{$cal["date"]}</td>");
                    print("</tr>");
                }
        ?>
    </table>
</div>
