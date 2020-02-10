<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAMP STACK</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body>

<section class="hero">
    <div class="body">
        <h1 class="title">LAMP STACK</h1>
        <h2 class="subtitle">Your local development environment</h2>
    </div>
</section>

<section class="informations">
    <div class="container">
        <div class="cols">
            <div class="col col-6">
                <h3 class="title">Environment</h3>
                <hr>
                <div class="content">
                    <ul>
                        <li><?php echo apache_get_version(); ?></li>
                        <li>PHP <?php echo phpversion(); ?></li>
                        <li>
                            <?php
                            $link = @mysqli_connect('mysql', 'root', 'root', 'projectname');
                            if (mysqli_connect_errno()) {
                            ?>
                                <span class="error">MySQL connection failed</span>
                            <?php } else { ?>
                                <span>MySQL Server <?php echo mysqli_get_server_info($link); ?></span>
                            <?php } @mysqli_close($link); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col col-6">
                <h3 class="title">Quick Links</h3>
                <hr>
                <div class="content">
                    <ul>
                        <li><a href="http://localhost:8080/phpinfo.php" target="_blank">phpinfo()</a></li>
                        <li><a href="http://localhost:8090" target="_blank">phpMyAdmin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
