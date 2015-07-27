<?
$host = "55b486a68e646.gz.cdb.myqcloud.com:15757"; //数据库服务器名称
$user = "root"; //用户名
$pwd = "ly881029"; //密码
$conn = mysql_connect($host, $user, $pwd);
mysql_query("SET 
character_set_connection=gb2312, 
character_set_results=gb2312, 
character_set_client=binary", $conn);

if ($conn == FALSE) {
    echo "<center>服务器连接失败！<br>请刷新后重试。</center>";
    return true;
}
$databasename = "test";//数据库名称

do {
    $con = mysql_select_db($databasename, $conn);
} while (!$con);

if ($con == FALSE) {
    echo "<center>打开数据库失败！<br>请刷新后重试。</center>";
    return true;
}

?> 