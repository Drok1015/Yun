<?php
/**
 * 首页
 * User: Drok
 * Date: 2015/7/27 0027
 * Time: 上午 10:04
 */
?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php

    $con = mysql_connect("55b486a68e646.gz.cdb.myqcloud.com:15757","root","ly881029");

    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }else{
        echo "链接成功!"."<br />";
    }

    mysql_select_db("test", $con);

    $result = mysql_query("select * from Android");

    while($row = mysql_fetch_array($result))
    {
        echo $row['uid'];
        echo "<img src='upfiles/".$row['pic']."'>";
        echo "<br />";
    }

    mysql_close($con);

    include("common/menu.php");
?>

</body>
</html>
