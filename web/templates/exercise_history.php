<div class="widetile">
    <table class="table">
        <?php
                print("<tr>");
                print("<td><b>Calories </b></td>");
                print("<td><b>Date</b></td>");
                print("</tr>");

                foreach ($data as $ex)
                {                
                    print("<tr>");
                    print("<td>{$ex["value"]}</td>");
                    print("<td>{$ex["date"]}</td>");
                    print("</tr>");
                }
        ?>
    </table>
</div>
