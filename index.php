<?php
$stars = htmlspecialchars($_POST["stars"]);
$errors = array('stars' => '');
$formValidated = false;
function random_color_part()
{
    return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
}

function random_color()
{
    return random_color_part() . random_color_part() . random_color_part();
}

function draw_tree($param)
{
    echo '<h3 class="merry-christmass">Wesołych świąt!</h3>';
    for ($i = 0; $i < $param; $i++) {
        echo '<p class="tree__line" style="color:' . random_color() . '">';
        for ($j = $i; $j >= 0; $j--) {
            echo "*";
        }
        echo "</p>";
    }
}
if (isset($_POST['submit'])) {
    if (empty($_POST['stars'])) {
        $errors['stars']  = "To pole nie może być puste";
    } elseif (!is_numeric($_POST['stars'])) {
        $errors['stars']  = "To pole może zawierać wyłącznie liczby";
    } else {
        $formValidated = true;
    }
};
?>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/main.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <h1 class="main-title">Narysuj sobie kolorową choinkę na święta</h1>

    <form action="./index.php" method="post">
        <div class="input-group">
            <label class="input__label" for="stars">podaj liczbę gwiazdek:</label>
            <input class="input__text-input" type="text" name="stars">
            <div class="error-text"><?php echo $errors["stars"]; ?></div>
        </div>
        <input type="submit" name="submit" value="Rysuj choinkę" class="form-button" />

        <div class="tree__container">
            <?php
            if ($formValidated) {
                draw_tree($stars);
            };
            ?>
        </div>
</body>

</html>