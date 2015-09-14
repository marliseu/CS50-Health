<br>
<br>
<div>
    <table class="table">
        <tr>
            <td><b>Gender</b></td>
            <td><b>Height</b></td>
            <td><b>Weight</b></td>
        </tr>

        <tr>
            <td><?= $gender ?></td>
            <td><?= $heightfeet ?> feet, <?= $heightinches ?> inches</td>
            <td><?= $weightlbs ?></td>
        </tr>
    </table>

    <div>
        <br>
            <div class="form-group">
                <form action="profile.php" method="post">
                    <fieldset>
                        <button type="submit" name="edit" class="btn btn-default">Edit</button>
                    </fieldset>
                </form>
            </div>
    </div>
</div>
        <br>
