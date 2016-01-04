<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" id="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>

    <style type="text/css">
        body {
            font-size: 17px;
        }
    </style>

    <title>每日与主同行</title>

</head>


<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2>每日与主同行</h2>
            <ul class="nav nav-list">
                <li>
                    <a href="./index.php">今日与主同行</a>
                </li>
                <li class="active">
                    <a href="./all.php">全部与主同行</a>
                </li>
                <li>
                    <a href="./about.php">关于</a>
                </li>
            </ul>
            <br>
        </div>
    </div>
    <?php
    $z = $_GET["z"];
    ?>
    <a class="btn btn-success pull-left" href="one.php?z=<?php echo $z - 1; ?>">上一篇</a>
    <a class="btn btn-success pull-right" href="one.php?z=<?php echo $z + 1; ?>">下一篇</a>
    <br>

    <h2>
        <?php
        if (isset ($_GET['z'])) {
            $date_number_in_a_year = $_GET['z'] + 2;
        } else {
            $date_number_in_a_year = date('z');
        }
        $milliseconds = mktime(0, 0, 0, 1, 1, date('Y')) + $date_number_in_a_year * 86400;
        echo date('Y年m月d日', $milliseconds);
        ?>
    </h2>
    <?php
    $lines = file("pages/" . $z . ".html");
    foreach ($lines as $line) {
        $line = str_replace('&#160;', '', $line);
        $line = str_replace('<u> 月</u>', '', $line);
        $line = str_replace('<u>月</u>', '', $line);
        $line = str_replace('章 日', '章', $line);
        $line = preg_replace('/(第\d日)/', ' $1<span class="btn btn-large btn-primary disabled">', $line);
        $line = preg_replace('/(第\d、\d日)/', ' $1<span class="btn btn-large btn-primary disabled">', $line);
        $line = str_replace('<table', '<table class="table"', $line);
        echo $line;
    }
    ?>
    <br>
</div>
<!-- 多说评论框 start -->
<div class="ds-thread" data-thread-key="<?= $z ?>" data-title="" data-url=""></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
    var duoshuoQuery = {short_name: "mryztx"};
    (function () {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';
        ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
<!-- 多说公共JS代码 end -->

<?php
include_once('footer.php');
?>

