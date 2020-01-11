<?php

if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['sex']) && !empty($_POST['age'])) {
    $dt = date('Y-m-d H:i:s');
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $sex = ($_POST['sex']);
    $age = number_format($_POST['age']);
    $bday = htmlspecialchars(trim($_POST['bday']));
    $status = htmlspecialchars(trim($_POST['status']));
    $social = htmlspecialchars(trim($_POST['social']));
    $address = htmlspecialchars(trim($_POST['address']));
    $format = htmlspecialchars(trim($_POST['format']));
    $comment = htmlspecialchars(trim($_POST['comment']));
    $enteredBefore = htmlspecialchars(trim($_POST['entered-before']));
    $email = htmlspecialchars(trim($_POST['email']));
    $task = htmlspecialchars(trim($_POST['task']));

    if (isset($_POST['hobby'])) {
        $hobby = $_POST['hobby'];
       foreach ($hobby as $check) {
           $hobbyArray = implode("<br>",$hobby);
        }

    } else {
        $hobbyArray = '';
    }

    if (isset($_POST['books'])) {
        $books = $_POST['books'];
        foreach ($books as $check) {
            $booksArray = implode("<br>",$books);
        }

    } else {
        $booksArray = '';
    }

    if (isset($_POST['position'])) {
        $position = $_POST['position'];
        foreach ($position as $check) {
            $positionArray = implode("<br>",$position);
        }

    } else {
        $positionArray = '';
    }

    if (isset($_POST['spam-category'])) {
        $spamCategory = $_POST['spam-category'];
        foreach ($spamCategory as $check) {
            $spamCategoryArray = implode("<br>",$spamCategory);
        }

    } else {
        $spamCategoryArray = '';
    }

    if ((strlen($name) > 2) && (strlen($surname) > 2)) {
        file_put_contents('send.txt',"$dt|$name|$surname|$sex|$age|$bday|$status|$social|$address|$hobbyArray|$format|$booksArray|$comment|$positionArray|$enteredBefore|$email|$spamCategoryArray|$task\n", FILE_APPEND);
        $info = 'Thank you! Form submitted';
    }
    else {
        $info = 'Very short name or surname, please enter another name or surname';
    }
}
else {
    $name = '';
    $surname = '';
    $sex = '';
    $age = '';
    $bday = '';
    $status = '';
    $social = '';
    $address = '';
    $format = '';
    $comment = '';
    $email = '';
    $task = '';
    $info = 'Please enter the form data';
}
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="style/form.css">
</head>
<body>
<section class="wrapper">
    <?php
    echo $info;
    ?>
    <form action="index.php" method="POST">
        <fieldset>
            <legend>Коротко о себе</legend>
            <ul>
                <li>
                    <div class="line">
                        <label for="name">Имя:</label>
                        <input type="text" id="name" name="name" size="30" value="<?php echo $name; ?>" required>
                    </div>
                </li>
                <li>
                    <div class="line">
                        <label for="surname">Фамилия:</label>
                        <input type="text" id="surname" name="surname" size="30" value="<?php echo $surname; ?>" required>
                    </div>
                </li>
                <li>
                    <div class="line">
                        Пол:
                        <input type="radio" id="male1" name="sex" value="male" class="radio">
                        <label for="male1">мужской</label>
                        <input type="radio" id="female1" name="sex" value="female" class="radio">
                        <label for="female1">женский</label>
                    </div>
                </li>
                <li>
                    <div class="line">
                        <label for="age">Возраст:</label>
                        <input type="number" id="age" min="1" max="150" step="1" name="age" class="age"> лет
                    </div>
                </li>
            </ul>
        </fieldset>
        <fieldset>
            <legend>Подробнее о себе</legend>
            <div class="line">
                <ul>
                    <li><p><input type="radio" id="male2" name="sex2" value="male" class="radio"><label for="male2">Молодой
                                человек</label></p></li>
                    <li><p><input type="radio" id="female2" name="sex2" value="female" class="radio"><label
                                for="female2">Девушка</label></p></li>
                    <li><p><input type="date" id="bday" name="bday" class="colum__size"><label for="bday"> Дата
                                рождения</label></p></li>
                    <li><p><input type="text" id="status" name="status" class="colum__size"><label for="status">
                                Семейное положение</label></p></li>
                    <li><p><input type="text" id="social" name="social" class="colum__size"><label for="social">
                                Социальный статус</label></p></li>
                    <li><p><input type="text" id="address" name="address" class="colum__size"><label for="address">
                                Местожительство</label></p></li>
                </ul>
            </div>
            <p class="form-block">Что вы обично делаете на выходных:</p>
            <div class="line">
                <ul>
                    <li><p><input type="checkbox" id="sleep" name="hobby[]" value="sleep" class="checkbox" multiple="multiple"><label
                                for="sleep">Сплю</label></p></li>
                    <li><p><input type="checkbox" id="play" name="hobby[]" value="play with friends" class="checkbox" multiple="multiple"><label
                                for="play">Гуляю с друзьями</label></p></li>
                    <li><p><input type="checkbox" id="fishing" name="hobby[]" value="fishing" class="checkbox" multiple="multiple"><label
                                for="fishing">Хожу на рыбалку</label></p></li>
                    <li><p><input type="checkbox" id="games" name="hobby[]" value="play games" class="checkbox" multiple="multiple"><label
                                for="games">Играю в игры</label></p></li>
                </ul>
            </div>
            <p class="form-block">Рассказать о форматах в книге, посвященной HTML:</p>
            <div class="line">
                <input list="format" name="format">
                <datalist id="format" class="format">
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </datalist>
            </div>
            <p class="form-block">Сколько книг вы прочитали за свою жизнь:</p>
            <div class="line">
                <ul>
                    <li><p><input type="radio" id="10" name="books[]" value="0-10" class="radio"><label
                                for="10">0-10</label></p></li>
                    <li><p><input type="radio" id="20" name="books[]" value="11-20" class="radio"><label
                                for="20">11-20</label></p></li>
                    <li><p><input type="radio" id="50" name="books[]" value="21-50" class="radio"><label
                                for="50">21-50</label></p></li>
                    <li><p><input type="radio" id="50+" name="books[]" value="50+" class="radio"><label
                                for="50+">50+</label></p></li>
                </ul>
            </div>
            <div class="line">
                <p class="form-block">Ваши комментарии:</p>
                <textarea name="comment" cols="70" rows="10"></textarea>
            </div>
            <div class="line">
                <select name="position[]" multiple size="4">
                    <option>Первая позиция</option>
                    <option>Вторая позиция</option>
                    <option>Третья позиция</option>
                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend>И в заключении</legend>
            <div class="line">
                <input type="text" name="entered-before" value="Это поле было введено до вас" readonly size="40">
            </div>
            <div class="line">
                <p class="form-block"><label for="email">Email:</label></p>
                <input type="email" id="email" name="email" size="40">
            </div>
            <p class="form-block">Хотите подписаться на самую модную рассылку спама?</p>
            <p><span>Виберите категорию</span></p>
            <div class="line">
                <ul>
                    <li><p><input type="checkbox" id="equipment" name="spam-category[]" value="equipment"
                                  class="checkbox"><label for="equipment">Оборудование</label></p></li>
                    <li><p><input type="checkbox" id="cooking" name="spam-category[]" value="how to cook dinner"
                                  class="checkbox"><label for="cooking">Как приготовить обеды</label></p></li>
                    <li><p><input type="checkbox" id="million" name="spam-category[]" value="million in Two Days"
                                  class="checkbox"><label for="million">Заработай миллион за два дня</label></p>
                    </li>
                </ul>
            </div>
            <p class="form-block">На сколько сложная задача</p>
            <div class="line">
                <ul>
                    <li><p><input type="radio" id="easy" name="task" value="not at all" class="radio"
                                  checked=""><label for="easy">Совсем нет</label></p>
                    <li><p><input type="radio" id="so" name="task" value="so-so" class="radio"><label for="so">Так
                                себе</label></p></li>
                    <li><p><input type="radio" id="hard" name="task" value="it was hard" class="radio"><label
                                for="hard">Еле справился</label></p></li>
                </ul>
            </div>
        </fieldset>
        <input type="submit" value="Отправить">
    </form>
</section>
</body>
</html>
