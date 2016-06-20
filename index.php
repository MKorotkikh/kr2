<?php
//#1 Убрать повторяющиеся пробелы и знаки табуляции, оставить по одному пробелу между словами и по два между
// предложениями. Форма, textarea, кнопка.
//
//if (isset($_POST['text']) && !empty($_POST['text'])) {
//    echo "<pre>".$_POST['text']."<br>\n</pre>";
//    $exprArr = ["/[ \t]+/", "/\.[ \t]+/"];
//    $toArr = [" ", ".  "];
//    $text = preg_replace($exprArr, $toArr, $_POST['text']);
//    echo "<pre>".$text."<br>\n</pre>";
//}
?>
<!---->
<!--<form method="post">-->
<!--    <textarea name="text"></textarea>-->
<!--    <input type="submit">-->
<!--</form>-->
<!---->
<?php
//#2 Найти на заданной странице все изображения и вывести их на экран. Страница вводится через форму, текстовый инпут.

echo "<br><hr>\n";
if (isset($_POST['url']) && !empty($_POST['url'])) {
    $serials = file_get_contents($_POST['url']);
    echo $_POST['url'];
    $script = substr($_POST['url'], 0, strrpos($_POST['url'], "/"));
    $expr = '|(<img.*src="(.*?)".*/>)|i';
    $matches = [];
    preg_match_all($expr, $serials, $matches);

//    var_dump($matches);

    foreach ($matches[2] as $value) {

        if ($value != "") {
            if(substr($value, 0, 4) != "http") {
                echo "<img src=\"" . $script . $value . "\" /><br>\n";
            }elseif (substr($value, 0, 4) == "http"){
                echo "<img src=\"" . $value . "\" /><br>\n";
            }
        }
    }
}
?>
<form method="post">
    <input type="text" name="url">
    <input type="submit">
</form>
