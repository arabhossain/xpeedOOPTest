<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?php echo $this->title; ?></title>
    <script>
        const siteURL = '<?php echo \Xpeed\App::instance()->base_url('/')?>';
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo \Xpeed\App::instance()->base_url('/')?>">XpeedTest</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo \Xpeed\App::instance()->base_url('/')?>">Form</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo \Xpeed\App::instance()->base_url('view')?>">View Data</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container pt-2" id="alert-container"></div>