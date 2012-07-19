<?php
include 'functions.php';
db_connect();
$maxperpage = 10;

$query2 = mysql_query('SELECT * FROM items ');
$calculate = intval(mysql_num_rows($query2) / $maxperpage); //All pages

if (!isset($_GET['page'])) {
    $page = (int) 1;
} else if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];    
}

if ($page < 5) {
    $pages = 'Pages: ';
    while (@$i <= 10) {
        @$i++;
        $pages.='<a href="index.php?page=' . $i . '">' .$i . '</a> ';
    }
    $pages.=' ... <a href="index.php?page=' . $calculate . '">' . $calculate . '</a>';
} elseif($page>5) {
    $pages = 'Pages: <a href="index.php?page=1">1</a> ... ';
    $i = $page;
    $r = $page - 5;
    while ($i > $r) {
        $i = $i-1;
        //$pages.='<a href="index.php?page=' . $i . '">' . $i . '</a> ';
    }
    $r = $page + 5;
    while ($i <= $r) {
        $i++;
        $pages.='<a href="index.php?page=' . $i . '">' . $i . '</a> ';
        if($i>$calculate) {
            break;
        }
    }
    
}
echo '<div id="page">' . $page . '</div>';
$pages = str_replace('<a href="index.php?page=' . $page . '">' . $page . '</a>', '<a href="index.php?page=' . $page . '" class="current">' . $page . '</a>', $pages);

top('Home');
?>
<div id="title">All items</div>
<div id="all-items"></div>
<div id="pages"><? echo $pages; ?></div>
<?
footer();