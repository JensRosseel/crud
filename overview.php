<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Yugioh cards</title>
</head>
<body>

<h1>Selfhelp - track your wasted money because of Yugioh cards</h1>

<ul>
    <?php foreach ($cards as $card) : ?>
        <li><a href="?details=<?= $card['name'] ?>"><?= $card['name'] ?></a> <a href="?edit=<?= $card['name'] ?>">edit</a> <a href="?delete=<?= $card['name'] ?>">delete</a></li>
    <?php endforeach; ?>
</ul>
<form action="" method="post">
    <fieldset>
        <legend>Add new Card</legend>
        <table>
            <tr>
                <td><label for="name">Name: </label></td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td><label for="cardtype">Cardtype: </label></td>
                <td><input type="text" name="cardtype" id="cardtype"></td>
            </tr>
            <tr>
                <td><label for="rarity">Rarity: </label></td>
                <td><input type="text" name="rarity" id="rarity"></td>
            </tr>
        </table>  
        <input type="submit" name="add" value="ADD">
    </fieldset>
</form>

</body>
</html>