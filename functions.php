<?php

function top($title) {
    include 'template/top.php';
}

function footer() {
    include 'template/footer.php';
}

function db_connect() {
    mysql_connect('localhost', 'root', '500220');
    mysql_select_db('test');
}

?>