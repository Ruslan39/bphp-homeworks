<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
        <p>Загрузить картинку</p>
        <input name="picture" type="file">
        <input type="submit" value="Отправить файл">
    </form>

    <div>
        <?php
        
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $uploadsDir = './uploads';
            $tmpName = $_FILES['picture']['tmp_name'];
            $name = basename($_FILES['picture']['name']);

            if (exif_imagetype($tmpName) === IMAGETYPE_JPEG |
            exif_imagetype($tmpName) === IMAGETYPE_BMP |
            exif_imagetype($tmpName) === IMAGETYPE_PNG |
            exif_imagetype($tmpName) === IMAGETYPE_GIF) {
                move_uploaded_file($tmpName, "$uploadsDir/$name");
                $filesUploaded = array_diff(scandir($uploadsDir), array('.', '..'));
                foreach($filesUploaded as $key => $value) {
                    echo '<div>';
                    $path = "uploads/$filesUploaded[$key]";
                    echo "<img src='$path' alt='' />";
                    echo '</div>';
                }
            }
        }
    ?>
</div>

</body>
</html>