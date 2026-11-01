<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */

// URL of the currently displayed action, used to highlight the active navigation item
$currentUrl = $link->url([]);
$active = fn(string $destination) => $link->url($destination) === $currentUrl ? ' class="active"' : '';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= App\Configuration::APP_NAME ?></title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $link->asset('favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $link->asset('favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= $link->asset('favicons/site.webmanifest') ?>">
    <link rel="shortcut icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
</head>
<body>
    <header class="header">
        <a href="<?= $link->url('home.index') ?>" class="logo">📷 <?= App\Configuration::APP_NAME ?></a>
        <div class="user">
            <span class="avatar">PL</span>
            <span class="user-name">Placeholder</span>
        </div>
    </header>

    <div class="layout">
        <nav class="sidebar">
            <div>
                <ul>
                    <li><a href="<?= $link->url('home.index') ?>"<?= $active('home.index') ?>>Prehľad</a></li>
                    <li><a href="<?= $link->url('group.index') ?>">Moje skupiny</a></li>
                    <li><a href="#">Obľúbené</a></li>
                </ul>
                <h2>Moje skupiny</h2>
                <ul>
                    <li><a href="<?= $link->url('group.index') ?>"<?= $active('group.index') ?>>Placeholder skupina</a></li>
                    <li><a href="#">Rodina</a></li>
                    <li><a href="#">Výlety s priateľmi</a></li>
                    <li><a href="#">+ Vytvoriť skupinu</a></li>
                </ul>
            </div>
            <ul>
                <li><a href="#">Nastavenia</a></li>
                <li><a href="#">Pomoc</a></li>
            </ul>
        </nav>

        <main class="content">
            <?= $contentHTML ?>
        </main>
    </div>

    <footer class="footer">© 2026 <?= App\Configuration::APP_NAME ?></footer>
</body>
</html>
