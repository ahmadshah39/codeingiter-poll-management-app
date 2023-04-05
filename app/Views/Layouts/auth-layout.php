<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/poll.png">
    <link rel="stylesheet" href="<?= base_url('/vite/css/app.css') ?>">
    <?= $this->renderSection('pageStyles') ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>

</head>
<body>
<body class="dark">

    <main>
        <?= $this->renderSection('main') ?>
    </main>
    
<?= $this->renderSection('pageScripts') ?>


</body>
</html>
