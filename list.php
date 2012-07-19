<?php
include 'functions.php';
db_connect();

$maxperpage = 10;
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
}
if(@$page <= 0) {
    $page=1;
}
if ($page == 1) {
    $limit = '0';
} else {
    $page--;
    $limit = $maxperpage * $page;
}
$query[] = mysql_query('SELECT * FROM items LIMIT ' . $limit . ', ' . $maxperpage);
if($page!=1) {
    $page++;
}
$query2 = mysql_query('SELECT * FROM items ');
?>
<div id="stat">
    Results: <?echo  ($limit+1) . ' - ' . (($limit)+$maxperpage) . ' from ' . mysql_num_rows($query2);?>
</div>
<table>
    <tr><th>ID</th><th>Preview</th><th>Name</th><th>Type</th><th>Cost</th><th>For members</th><th>Command</th></tr>
    <?php
    
    while ($row = mysql_fetch_assoc($query[0])) {
        if($row['cost'] == 0) {
            $row['cost'] = 'Free';
        }
        else {
            $row['cost'].=' Coins';
        }
        echo '<tr><td>' . $row['id'] . '</td><td><object width="120" height="120"><param name="movie" value="http://cfmedia.sexyi.am/item2.swf?id=' . $row['id'] . '"><embed src="http://network.d0pe.info/dev/c.swf?id=' . $row['id'] . '" width="120" height="120"></embed></object></td><td>' . $row['name'] . '</td><td>' . $row['type'] . '</td><td>' . $row['cost'] . '</td><td>'.$row['is_member'].'</td><td>!AI ' . $row['id'] . '</td></tr>';
        
    }
    
    ?>
</table>