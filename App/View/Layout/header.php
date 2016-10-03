<!DOCTYPE html>
<html>
<head>
    <title><?php if (isset($title)) { echo $title; } else { echo "Title not set"; } ?></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href=<?php echo BASE_URL . "/Css/Style.css"; ?> type="text/css"/>

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script type="text/javascript">
        window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":null,"theme":"dark-top"};
    </script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
    <!-- End Cookie Consent plugin -->

</head>
<body>
