<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><? echo $title;?> | iDB</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="googlebot" content="index,follow" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </head>
        <body>
            <div id="container">
                <div id="header">
                    <div class="logo"></div>
                    <div class="search_box">
                        <form method="GET" action="search.php">
                            <input type="text" name="s" id="s" />
                        </form>
                    </div>
                </div>
                <div id="content">
                    <div id="loading-bar">Loading...</div>