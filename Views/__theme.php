<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= assets("assets/css/bootstrap.min.css") ?>" />
    <link rel="stylesheet" href="<?= ($style == true)? assets("assets/css/style.css") : assets("assets/css/register.css") ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="icon" href="<?= assets("assets/images/logo.png") ?>" />
    <title><?= $title ?></title>
</head>

<body>
    <main class="container-fluid d-flex align-items-center justify-content-center">

    <?= $v->section("content") ?>

    </main>

    <script src="<?= assets("assets/js/jquery-3.6.0.min.js") ?>"></script> 
<script src="<?= assets("assets/js/bootstrap.min.js") ?>"></script>
<script src=" <?= assets("assets/js/bootstrap.bundle.min.js") ?> "></script>
<script src=" <?= assets("assets/js/script.js") ?> "></script>
</body>

</html>