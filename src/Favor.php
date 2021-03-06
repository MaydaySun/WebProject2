<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的收藏</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/favor.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
</head>
<body>
<h1>
    <!--logo导向主页-->
    <a href="../index.php" id="logo"><img width="53" height="53" src="../images/logo.jpeg" alt="logo"></a>
    <!--navigation类用于内联布局,jump类存放超链接实现跳转-->
    <div class="navigation">
        <div class="jump" id="home">
            <a href="../index.php">主页</a>
        </div>
    </div>
    <div class="navigation">
        <div class="jump" id="browse">
            <a href="Browse.php">浏览</a>
        </div>
    </div>
    <div class="navigation">
        <div class="jump" id="search">
            <a href="Search.php">搜索</a>
        </div>
    </div>
    <div class="navigation">
        <div class="account">
            <script src = "../js/controlWrap.js"></script>
        </div>
    </div>
</h1>
    <div class="favorSection">
        <p class="headText">我的收藏</p>
        <?php
            require_once ("config.php");
            getFavors();
        ?>
    </div>
</body>
<footer>
    <span class="copyrightText">©2020&nbsp;19302010001_BaiTianHao All Rights Reserved.&nbsp;备案号：沪GOULIGUOJIA备341号-1</span>
</footer>
</html>
<?php
function getFavors(){
    if (isset($_COOKIE["username"]) && $username = $_COOKIE["username"]) {
        $sql = "select travelimage.* from travelimage,travelimagefavor,traveluser where traveluser.UserName = '$username' and travelimagefavor.UID = traveluser.UID and travelimagefavor.ImageID = travelimage.ImageID";
        getResult($sql);
    }
    else
        header("Refresh:0.1;url=Login.php");
}
function getResult($sql){
    $connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    $result = mysqli_query($connection,$sql);
    if ($result !== null) {
        $imgArray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $imgArray[] = "<div class='favorWork'>".
                "<a href='Details.php?id=" . $row["ImageID"] . "'><img src='../travel-images/square-medium/" . $row["PATH"] . "' class='workElement favorImg' alt='图片已丢失'></a>".
                "<div class='workElement'>".
                "<h2 class='workTitle'>". $row["Title"] ."</h2>".
                "<span class='workDescription'>". ($row["Description"] !== null ? $row["Description"] : "No Description") ."</span>".
                "<a href='switchFavor.php?imageID=" . $row["ImageID"] ."&favored=1'><button class='deleteBtn'>删除</button></a>".
                "</div></div>";
        }
        draw($imgArray);
    }
    if (!is_null($result) & !is_bool($result)){
        mysqli_free_result($result);
    }
    mysqli_close($connection);
}
function draw($imgArray){
    $pages = min(ceil(count($imgArray) / 12), 5);
    if ($imgArray == null){
        echo "<strong>没有图片</strong>";
    }
    elseif (isset($_GET["page"]) && $page = $_GET["page"]){
        for ($i = 0;$i < min(12,count($imgArray) - 12 * ($page - 1));$i++){
            echo $imgArray[12 * ($page - 1) + $i];
        }
        $previous = $page + $pages;
        echo "<div class='pageFooter'>" . "<a href='Favor.php?page=" . ($previous % ($pages + 1) + $pages * floor(($pages + 1) / $previous))
            . "'>《</a>" . "&nbsp;&nbsp;&nbsp;";
        for ($p = 1;$p <= $pages;$p++){
            if($p == $page)
                echo "<span class='currentPageFooter'>$p</span>&nbsp;&nbsp;&nbsp;";
            else
                echo "<a href='Favor.php?page=$p'>$p</a>&nbsp;&nbsp;&nbsp;";
        }
        $next = $page + 1;
        echo "<a href='Favor.php?page=" . ($next % ($pages + 1) + floor($next / ($pages + 1))) . "'>》</a>";
    }
    else{
        header("Refresh:0.1;url=Favor.php?page=1");
    }
}
?>