<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            margin: 0;
            height: 100vh; /* 確保 body 高度為 100% */
            padding: 20px;
            box-sizing: border-box;
            font-family: "Ubuntu", sans-serif;
            justify-content: center;
            align-items: center;
            background-image: url('step.jpg');
            background-size: cover; /* 讓背景圖片覆蓋整個畫面 */
            background-repeat: no-repeat; /* 防止圖片重複 */
            background-position: left; /* 使背景圖片置中顯示 */
    
        }
        
         .container {
            background-color: rgba(211, 198, 183, 0.2);/* 更改為半透明色，讓毛玻璃效果明顯 */
            width: 50%; 
            display: flex;
            flex-direction: column;
            backdrop-filter:blur(10px);
            padding: 20px; /* 添加內邊距以增加美觀 */
                    
        }

        .date {
            flex: 1; /* 1/5 */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5em;
            margin:0 10px;
        }
        .calendar {
            flex: 4; /* 3/5 */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            
        }
        .buttons {
            flex: 1; 
            display: flex;
            justify-content: space-around; 
            align-items: center;
            margin-top: 20px; /* 添加上邊距讓按鈕與上方內容有距離 */
        }
        
        .button {
            color: black; 
            padding: 20px 20px; /* 內邊距 */
            text-align: center; /* 文字置中 */
            text-decoration: none; /* 去掉下劃線 */
            transition: background-color 0.3s; /* 動畫效果 */
            font-size:1em;
        }
     
        .button-left::after {
            content: '←'; /* 向左箭頭 */
            margin-left: 10px; /* 文字和箭頭之間的間距 */
        }

        .button-right::after {
            content: '→'; /* 向右箭頭 */
            margin-left: 10px; /* 文字和箭頭之間的間距 */
        }

        table {
          width: 100%; /* 確保表格佔滿容器 */
          border-collapse: collapse; /* 合併邊框 */
        }

        td{
        margin:auto;
        padding:20px 10px; ;
        box-sizing:border-box;
        font-size:2.5em;  
        text-align: center; 
        transition: background-color 0.3s; /* 讓顏色變化有過渡效果 */
        }
      
        
        td.current-month:hover {
            background-color: gray; /* 鼠標懸停時的顏色 */
            color: white; /* 改變字體顏色為白色 */
        }

        .holiday{
           color:darkred;
         }
    
        .today{
          background:gray; 
          color:black;
          font-weight:bolder;
          font-size:4em;
          border-radius: 50px; /* 圓角邊框 */
          padding: 10px; /* 內邊距 */
         }

        p{
         font-size:2em;
         }

        .search-container {
            margin: 20px 0;
            text-align: center; /* 置中對齊 */
        }

       
        input[type="number"] {
            margin: 0 10px; /* 文字框之間的間距 */
            padding: 10px;
        }

        button {
            margin: 0 5px; /* 按鈕之間的間距 */
            padding: 15px 20px;
            font-size: 1.5em; /* 字體大小 */
            cursor: pointer; /* 鼠標變成手形 */
            border: none; /* 去掉邊框 */
            border-radius: 25px; /* 圓角 */
            background-color: gray; /* 按鈕背景色 */
            color: black; /* 字體顏色 */
            transition: background-color 0.3s; /* 動畫效果 */
        }
        button:hover {
        background-color: darkgray; /* 滑鼠懸停時變色 */
        }
                    
        .search-input {
            font-size: 1.5em; /* 增加字體大小 */
            padding: 10px; /* 調整內邊距 */
            border-radius: 10px; /* 圓角 */
            width: 100px; /* 設定相同的寬度 */
            box-sizing: border-box; /* 確保 padding 包含在寬度內 */
        }

       
    </style>
</head>


<body>

<?php

if(isset($_GET['month'])){
    $month=$_GET['month'];
}else{
    $month=date("m");
}

if(isset($_GET['year'])){
    $year=$_GET['year'];
}else{
    $year=date("Y");
}

if($month-1<1){
    $premonth=12;
    $preyear=$year-1;
}else{
    $premonth=$month-1;
    $preyear=$year;
}

if($month+1>12){
    $nextmonth=1;
    $nextyear=$year+1;
}else{
    $nextmonth=$month+1;
    $nextyear=$year;
}

$Preyear=$year-1;
$Nextyear=$year+1;

?>
   

<div class="container calender" >
 
<table>
<tr >
    <td colspan=7>
        <p>
    <a class="button button-left" href="index.php?year=<?=$preyear;?>&month=<?=$premonth;?>"></a>
        <?=$year."&nbsp&nbsp&nbsp".$month;?>
    <a class="button button-right" href="index.php?year=<?=$nextyear;?>&month=<?=$nextmonth;?>"></a>
    </p>    
</td>
</tr>

<?php

$T=["Sun","Mon","Tue","Wen","Thu","Fri","Sat",];
echo "<tr>";
foreach( $T as $t){
    echo "<td>";
    if($t=='Sun'||$t=='Sat'){
        echo "<span style='color: darkred;'>$t</span>";   
    }else{
        echo $t;
    }
        echo "</td>";
  }
echo "</tr>";



$Day1=date("$year-$month-1");
$Day1Q=strtotime($Day1);
$Day1W=date("w",$Day1Q);

for($i=0;$i<6;$i++){
    echo"<tr>";
    for($j=0;$j<7;$j++){       
        $EachDay=$i*7+$j-$Day1W;
        $EachDayQ=strtotime("$EachDay days",$Day1Q);
             
        $TT=(date("Y-m-d",$EachDayQ)==date("Y-m-d"))?"today":"";
        $w=date("w",$EachDayQ);
        $HH=($w==0 || $w ==6)?"holiday":"";
      
        $MM=(date("m", $EachDayQ) == $month)?true:false;

        if ($MM) {
        echo "<td class='date-cell current-month $TT $HH'>";
        echo date("j", $EachDayQ);
        echo "</td>";
        } else {
            echo "<td class='date-cell'></td>";
         }
    }
echo "</tr>";
}
    
?>
</table>
                 
<div class="search-container">
    <form action="index.php" method="GET" id="calendar-form">

        

        <!-- <label for="year">Year:</label> -->
        <input type="number" class="search-input" id="year" name="year" value="<?= $year ?>" placeholder="Year" required>
        

        <!-- <label for="month">Month:</label> -->
        <input type="number" class="search-input" id="month" name="month" value="<?= $month ?>" placeholder="Month" min="1" max="12" required>
        <button type="submit">GO</button>
        
        <button type="button" id="today-button">Today</button>
    </form>
</div>
<script>
    document.getElementById('today-button').addEventListener('click', function() {
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth() + 1; // JavaScript 的月份從 0 開始
        // 設置表單的年份和月份
        document.getElementById('year').value = year;
        document.getElementById('month').value = month;
        // 提交表單
        document.getElementById('calendar-form').submit();
    });
</script>


    </div>

    </div>

</body>
</html>