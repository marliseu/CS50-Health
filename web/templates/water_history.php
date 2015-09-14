<div class="widetile">
    <table class="table">
        <?php
                print("<tr>");
                print("<td><b>Glasses</b></td>");
                print("<td><b>Date</b></td>");
                print("</tr>");

                foreach ($data as $wat)
                {                
                    print("<tr>");
                    print("<td>{$wat["value"]}</td>");
                    print("<td>{$wat["date"]}</td>");
                    print("</tr>");
                }
        ?>
    </table>
</div>
