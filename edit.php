<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit <?= $_GET['edit'] ?></title>
</head>
<body>
    <form action="index.php?edit=<?= $_GET['edit'] ?>" method="post">
        <fieldset>
            <legend>Edit <?= $_GET['edit'] ?></legend>
            <table>
                <tr>
                    <td><label for="name">Change name: </label></td>
                    <td><input type="text" name="changeName" id="changeName"></td>
                </tr>
                <tr>
                    <td><label for="cardtype">Change cardtype</label></td>
                    <td><input type="text" name="changeCardtype" id="changeCardtype"></td>
                </tr>
                <tr>
                    <td><label for="rarity">Change rarity</label></td>
                    <td><input type="text" name="changeRarity" id="rarity"></td>
                </tr>
            </table>
            <input type="submit" name="edit" value="EDIT">
        </fieldset>
    </form>
</body>
</html>