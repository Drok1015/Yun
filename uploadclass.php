<?php
$uploaddir = "upfiles/";//设置文件保存目录 注意包含/ 
$type = array("jpg", "gif", "bmp", "jpeg", "png");//设置允许上传文件的类型
$patch = "upload/";//程序所在路径

//获取文件后缀名函数 
function fileext($filename)
{
    return substr(strrchr($filename, '.'), 1);
}

//生成随机文件名函数
function random($length)
{
    $hash = 'CR-';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    mt_srand((double)microtime() * 1000000);
    for ($i = 0; $i < $length; $i++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}

$a = strtolower(fileext($_FILES['file']['name']));
//判断文件类型 
if (!in_array(strtolower(fileext($_FILES['file']['name'])), $type)) {
    $text = implode(",", $type);
    echo "您只能上传以下类型文件: ", $text, "<br>";
} //生成目标文件的文件名
else {
    $filename = explode(".", $_FILES['file']['name']);
    do {
        $filename[0] = random(10); //设置随机数长度
        $name = implode(".", $filename);
//$name1=$name.".Mcncc"; 
        $uploadfile = $uploaddir . $name;
    } while (file_exists($uploadfile));

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            echo "上传失败!";
        } else {//输出图片预览
            echo "<center>您的文件已经上传完毕 上传图片预览: </center><br><center><img src='$uploadfile'></center>";
            echo "<br><center><a href='upload.htm'>继续上传</a></center>";
        }
    }

}
?> 
