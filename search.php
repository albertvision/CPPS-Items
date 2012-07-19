<?php
include 'functions.php';
db_connect();
$maxperpage = 10;
if(isset($_GET['s'])) {
    $s = htmlspecialchars(mysql_real_escape_string($_GET['s']));
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
    if($page!=1) {
        $page++;
    }
    $query = mysql_query('SELECT * FROM items WHERE name LIKE "%'.$s.'%"  OR type LIKE "%'.$s.'%" LIMIT ' . $limit . ', ' . $maxperpage);
    $query2 = mysql_query('SELECT * FROM items WHERE name LIKE "%'.$s.'%" OR type LIKE "%'.$s.'%"');
    $calculate = mysql_num_rows($query2) / $maxperpage;
    
    if(is_float($calculate)) {
        $calculate = (int)$calculate+1;
    }
    if(mysql_num_rows($query2)==0) {
        $pages = '<a href="?s='.$s.'&amp;page=1">1</a>';
    }
    if ($page < 5) {
		$pages = 'Pages: ';
		while (@$i <= 10) {
			@$i++;
			$pages.='<a href="search.php?s='.$s.'&page=' . $i . '">' .$i . '</a> ';
		}
		$pages.=' ... <a href="search.php?s='.$s.'&page=' . $calculate . '">' . $calculate . '</a>';
	} elseif($page>5) {
		$pages = 'Pages: <a href="search.php?s='.$s.'&page=1">1</a> ... ';
		$i = $page;
		$r = $page - 5;
		while ($i > $r) {
			$i = $i-1;
			//$pages.='<a href="index.php?page=' . $i . '">' . $i . '</a> ';
		}
		$r = $page + 5;
		while ($i <= $r) {
			$i++;
			$pages.='<a href="search.php?s='.$s.'&page=' . $i . '">' . $i . '</a> ';
			if($i>$calculate) {
				break;
			}
		}
		
	}
    if (!isset($_GET['page'])) {
        $page = (int)1;
    } else if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
        
    }
    $pages = str_replace('<a href="index.php?page=' . $page . '">' . $page . '</a>', '<a href="index.php?page=' . $page . '" class="current">' . $page . '</a>', $pages);
}

top('Search');
?>
<div id="title">Results: </div>
<div id="results">
   <table>
        <tr><th>ID</th><th>Preview</th><th>Name</th><th>Type</th><th>Cost</th><th>For members</th><th>Command</th></tr>
    <?
    if(mysql_num_rows($query)==0) {
        echo '<tr><td colspan="7">Nothing found</td></tr>';
    }
    while($row = mysql_fetch_assoc($query)) {
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
</div>
<div id="pages">
<?echo $pages;?>
</div>
<?
footer();