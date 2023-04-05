<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/poll.png">
    <link rel="stylesheet" href="<?= base_url('/vite/css/app.css') ?>">
    <?= $this->renderSection('pageStyles') ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<body class="dark h-full">

<div class="min-h-full bg-gray-50 dark:bg-gray-900">
    <?= view_cell('Partials::header') ?>
    <header class="bg-gray-50 dark:bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">
                <?= $this->renderSection('page_header') ? $this->renderSection('page_header') : 'Dashboard' ?>
            </h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <?= $this->renderSection('main') ?>
        </div>
    </main>
</div>


<?= $this->renderSection('pageScripts') ?>
<script src="<?= base_url('/vite/js/app.js') ?>"></script>

</body>
</html>
