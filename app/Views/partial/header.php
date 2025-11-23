<?php
/**
 * @var object $user_info
 * @var array $allowed_modules
 * @var CodeIgniter\HTTP\IncomingRequest $request
 * @var array $config
 */

use Config\Services;

$request = Services::request();
?>

<!doctype html>
<html lang="<?= $request->getLocale() ?>">

<head>
    <meta charset="utf-8">
    <base href="<?= base_url() ?>">
    <title>
        <?= esc($config['company']) . ' | ' . lang('Common.powered_by') . ' OSPOS ' . esc(config('App')->application_version) ?>
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/zephyr/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/saas-theme.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <?= view('partial/header_js') ?>
    <?= view('partial/lang_lines') ?>

    <style>
        html {
            overflow: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= site_url() ?>">
                    <i class="fa-solid fa-layer-group me-2"></i>OSPOS SaaS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <?php foreach ($allowed_modules as $module): ?>
                            <li class="nav-item <?= $module->module_id == $request->getUri()->getSegment(1) ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url($module->module_id) ?>" title="<?= lang("Module.$module->module_id") ?>">
                                    <i class="fa-solid fa-circle-dot me-1"></i> <?= lang('Module.' . $module->module_id) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <span class="nav-link disabled text-white" id="liveclock"><?= date($config['dateformat'] . ' ' . $config['timeformat']) ?></span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-user-circle me-1"></i> <?= "$user_info->first_name $user_info->last_name" ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <?= anchor("home/changePassword/$user_info->person_id", lang('Employees.change_password'), ['class' => 'dropdown-item modal-dlg', 'data-btn-submit' => lang('Common.submit')]) ?>
                                <div class="dropdown-divider"></div>
                                <?= anchor('home/logout', lang('Login.logout'), ['class' => 'dropdown-item']) ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container-fluid mt-5 pt-4"> <!-- Added padding for fixed navbar -->
            <div class="row">