<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
<link href="./css/bootstrap.min.css" rel="stylesheet">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<style type="text/css">
body { font-size:17px;
    }
</style>

<style type="text/css">
#tc_calendar{width:100%;}
#tc_calendar{border-collapse:collapse;}
#tc_calendar td{text-align:center;width:auto;height:50px;line-height:30px;background-color:#efefef;border-bottom:1px solid #fff;border-right:1px solid #fff;}
#tc_calendar .even td{background-color:#e6e6e6; font-size:20px;}
#tc_calendar td .current{display:block;background-color:#f60;color:#fff;}
#tc_calendar .current{background-color:#f60!important;color:#fff;}
#tc_week td{color:#fff;background-color:#373737;}
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
    <!--输出日历 -->
    <?php
    for ($j = 1; $j < 13; $j++) {    
        $mdays=date("t", $j);    //当月总天数
        $datenow=date("mj");  //当日日期
        $monthnow=$j; //当月月份
        $yearnow=date("Y");  //当年年份
        //计算当月第一天是星期几
        $wk1st=date("w",mktime(0,0,0,$monthnow,1,$yearnow));
        $trnum=ceil(($mdays+$wk1st)/7); //计算表格行数
        //以下是表格字串
        $tabstr="<table id=tc_calendar><tr id=tc_week><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td></tr>";
        for($i=0;$i<$trnum;$i++) {
           $tabstr.="<tr class=even>";
           for($k=0;$k<7;$k++) { //每行七个单元格
              $tabidx=$i*7+$k; //取得单元格自身序号
              //若单元格序号小于当月第一天的星期数($wk1st)或大于(月总数+$wk1st)
              //只填写空格，反之，写入日期
              ($tabidx<$wk1st or $tabidx>$mdays+$wk1st-1) ? $dayecho="&nbsp" : $dayecho=$tabidx-$wk1st+1;
              //突出标明今日日期
              // $dayecho="<span style=\"background-color:red;color:#fff;\">$dayecho</span>";
              $monthDayEcho = $j.$dayecho;
              if($monthDayEcho==$datenow){$todaybg = " class=current";}
              else{$todaybg = "";}
              $strTime = date("Y-$j-$dayecho");
              $time = strtotime($strTime);
              $z = date('z', $time) - 2;
              if ($z <= 0 ) {
                $tabstr.="<td".$todaybg.">$dayecho</td>";
              } else {
                $tabstr.="<td".$todaybg."><a href=./one.php?z=$z>$dayecho</a></td>";
              }
              
           }
           $tabstr.="</tr>";
        }
        $tabstr.="</table>";
    ?>
    <div id="tc_calendardiv">
        <h1> <?php echo $j?>月</h1>
    <?php echo $tabstr;?>
    </div>
    <?php }?>
    <br>
    

    </div>
<?php
include_once ('footer.php');
?>
