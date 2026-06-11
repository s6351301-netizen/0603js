<<<<<<< HEAD
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料表格</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
  table {
    border-collapse: separate; /* 必須設為 separate 才能使 border-spacing 生效 */
    border-spacing: 1px;      /* 設定儲存格間距為 1px */
    border: 2px solid #8B4513; /* 棕色邊框 (SaddleBrown) */
    background-color: #E6F2F8; /* 表格背景為淺藍色，襯托間距 */
  }

  /* 1. 將 table2 前面加上點 (.) 變成類別選擇器 */
  .table2 {
    border-collapse: separate;
    border-spacing: 5px;      
    border: 2px solid #138b23; 
    background-color: #0cd438; 
  }
  
  th, td {
    border: 1px solid #8B4513; /* 儲存格棕色邊框 */
    padding: 10px;             /* 儲存格內邊距 */
    background-color: #4682B4; /* 藍色背景 (SteelBlue) */
    color: white;              /* 文字顏色 */
    text-align: center;
  }


    .th2, .td2 {
    border: 1px solid #3808e7; /* 儲存格棕色邊框 */
    padding: 10px;             /* 儲存格內邊距 */
    background-color: #d6e40f; /* 藍色背景 (SteelBlue) */
    color: red;              /* 文字顏色 */
    text-align: center;
  }
  
  </style
<body>

<h1>6*10表格,將課表寫出來</h1>
<h2>
橫向合併 5格,語法colspan="5",保留第一個頭部寫入語法,用不到表格註解.<br>
縱向合併 2格,語法rowspan="2",保留第一個頭部寫入語法,用不到表格註解.<br>
</h2>

 <table border="1">
    <tbody>
        <!-- 第 1 到 10 行 -->
        <tr>
        <td>1-1</td>
        <td>1-2</td>
        <td>1-3</td>
        <td>1-4</td>
        <td>1-5</td>
        <td>1-6</td></tr>
        <tr>
        <td >2-1</td>
        <!-- 
        <td colspan="5">2-2</td>
        <td>2-3</td>
        <td>2-4</td>
        <td>2-5</td> 
        <td>2-6</td>
        </tr>
        -->
        <tr>
        <td>3-1</td>
        <td rowspan="2">3-2</td>
        <td colspan="3">3-3</td>
        <!-- <td>3-4</td>
        <td>3-5</td>-->
        <td>3-6</td>
        </tr>
        <tr>
        <td>4-1</td>
        <!-- <td>4-2</td> -->
        <td>4-3</td>
        <td>4-4</td>
        <td>4-5</td>
        <td>4-6</td>
        </tr>
        <tr>
        <td>5-1</td>
        <td>5-2</td>
        <td>5-3</td>
        <td>5-4</td>
        <td>5-5</td>
        <td rowspan="2">5-6</td>
        </tr>
        <tr>
        <td>6-1</td>
        <td>6-2</td>
        <td>6-3</td>
        <td>6-4</td>
        <td>6-5</td>
        <!--<td>6-6</td>-->
        </tr>
        <tr>
        <td>7-1</td>
        <!-- 
        <td colspan="5">7-2</td>
        <td>7-3</td>
        <td>7-4</td>
        <td>7-5</td>
        <td>7-6</td>         
        </tr>
        -->
        <tr>
        <td>8-1</td>
        <td>8-2</td>
        <td rowspan="2">8-3</td>
        <td rowspan="3">8-4</td>
        <td rowspan="3">8-5</td>
        <td>8-6</td> 
        </tr>
        <tr>
        <td>9-1</td>
        <td>9-2</td>
          <!--<td>9-3</td>-->
        <!--<td>9-4</td>-->
        <!--<td>9-5</td>-->
        <td>9-6</td>
        </tr>
        <tr>
        <td>10-1</td>
        <td colspan="2">10-2</td>
        <!--<td>10-3</td>-->
        <!--<td>10-4</td>-->
        <!--<td>10-5</td>-->
        <td>10-6</td>
        </tr>
    </tbody>
</table>

<h1>練習九宮格的表格CSS與HTML語法</h1>
<h2>9*9宮格的表格,寫入1-9數字.</h2>
<table border="1">
    <tbody>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>4</td>
            <td>5</td>
            <td>6</td>
        </tr>
        <tr>
            <td>7</td>
            <td>8</td>
            <td>9</td>
        </tr>
        </table>

<h2>9*9宮格的表格,並將12表格合併.</h2>
    <table>
        <tbody>
            <tr>
                <td colspan="2">12</td>
                <td>3</td> <!-- 補齊欄位以維持對齊 -->
            </tr>
            <tr>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
            <tr>
                <td>7</td>
                <td>8</td>
                <td>9</td> <!-- 補齊欄位以維持對齊 -->
            </tr>

            
           
        </tbody>
    </table>

<h2>9*9宮格的表格,並將12表格合併,69表格合併.</h2>
<!-- 2. 在這裡加入 class="table2" -->
  <!-- 第二個表格：套用新樣式 -->
    <table class="table2">
        <tbody>
            <tr>
                <!-- 在每個 td 加上 class="td2" -->
                <td colspan="2" class="td2">12</td>
                <td class="td2">3</td>
            </tr>
            <tr>
                <td class="td2">4</td>
                <td class="td2">5</td>
                <td rowspan="2" class="td2">69</td>
            </tr>
            <tr>
                <td class="td2">7</td>
                <td class="td2">8</td>
            </tr>
        </tbody>
    </table>






</body>
</html>
=======
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料表格</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
  table {
    border-collapse: separate; /* 必須設為 separate 才能使 border-spacing 生效 */
    border-spacing: 1px;      /* 設定儲存格間距為 1px */
    border: 2px solid #8B4513; /* 棕色邊框 (SaddleBrown) */
    background-color: #E6F2F8; /* 表格背景為淺藍色，襯托間距 */
  }

  /* 1. 將 table2 前面加上點 (.) 變成類別選擇器 */
  .table2 {
    border-collapse: separate;
    border-spacing: 5px;      
    border: 2px solid #138b23; 
    background-color: #0cd438; 
  }
  
  th, td {
    border: 1px solid #8B4513; /* 儲存格棕色邊框 */
    padding: 10px;             /* 儲存格內邊距 */
    background-color: #4682B4; /* 藍色背景 (SteelBlue) */
    color: white;              /* 文字顏色 */
    text-align: center;
  }


    .th2, .td2 {
    border: 1px solid #3808e7; /* 儲存格棕色邊框 */
    padding: 10px;             /* 儲存格內邊距 */
    background-color: #d6e40f; /* 藍色背景 (SteelBlue) */
    color: red;              /* 文字顏色 */
    text-align: center;
  }
  
  </style
<body>

<h1>6*10表格,將課表寫出來</h1>
<h2>
橫向合併 5格,語法colspan="5",保留第一個頭部寫入語法,用不到表格註解.<br>
縱向合併 2格,語法rowspan="2",保留第一個頭部寫入語法,用不到表格註解.<br>
</h2>

 <table border="1">
    <tbody>
        <!-- 第 1 到 10 行 -->
        <tr>
        <td>1-1</td>
        <td>1-2</td>
        <td>1-3</td>
        <td>1-4</td>
        <td>1-5</td>
        <td>1-6</td></tr>
        <tr>
        <td >2-1</td>
        <!-- 
        <td colspan="5">2-2</td>
        <td>2-3</td>
        <td>2-4</td>
        <td>2-5</td> 
        <td>2-6</td>
        </tr>
        -->
        <tr>
        <td>3-1</td>
        <td rowspan="2">3-2</td>
        <td colspan="3">3-3</td>
        <!-- <td>3-4</td>
        <td>3-5</td>-->
        <td>3-6</td>
        </tr>
        <tr>
        <td>4-1</td>
        <!-- <td>4-2</td> -->
        <td>4-3</td>
        <td>4-4</td>
        <td>4-5</td>
        <td>4-6</td>
        </tr>
        <tr>
        <td>5-1</td>
        <td>5-2</td>
        <td>5-3</td>
        <td>5-4</td>
        <td>5-5</td>
        <td rowspan="2">5-6</td>
        </tr>
        <tr>
        <td>6-1</td>
        <td>6-2</td>
        <td>6-3</td>
        <td>6-4</td>
        <td>6-5</td>
        <!--<td>6-6</td>-->
        </tr>
        <tr>
        <td>7-1</td>
        <!-- 
        <td colspan="5">7-2</td>
        <td>7-3</td>
        <td>7-4</td>
        <td>7-5</td>
        <td>7-6</td>         
        </tr>
        -->
        <tr>
        <td>8-1</td>
        <td>8-2</td>
        <td rowspan="2">8-3</td>
        <td rowspan="3">8-4</td>
        <td rowspan="3">8-5</td>
        <td>8-6</td> 
        </tr>
        <tr>
        <td>9-1</td>
        <td>9-2</td>
          <!--<td>9-3</td>-->
        <!--<td>9-4</td>-->
        <!--<td>9-5</td>-->
        <td>9-6</td>
        </tr>
        <tr>
        <td>10-1</td>
        <td colspan="2">10-2</td>
        <!--<td>10-3</td>-->
        <!--<td>10-4</td>-->
        <!--<td>10-5</td>-->
        <td>10-6</td>
        </tr>
    </tbody>
</table>

<h1>練習九宮格的表格CSS與HTML語法</h1>
<h2>9*9宮格的表格,寫入1-9數字.</h2>
<table border="1">
    <tbody>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>4</td>
            <td>5</td>
            <td>6</td>
        </tr>
        <tr>
            <td>7</td>
            <td>8</td>
            <td>9</td>
        </tr>
        </table>

<h2>9*9宮格的表格,並將12表格合併.</h2>
    <table>
        <tbody>
            <tr>
                <td colspan="2">12</td>
                <td>3</td> <!-- 補齊欄位以維持對齊 -->
            </tr>
            <tr>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
            <tr>
                <td>7</td>
                <td>8</td>
                <td>9</td> <!-- 補齊欄位以維持對齊 -->
            </tr>

            
           
        </tbody>
    </table>

<h2>9*9宮格的表格,並將12表格合併,69表格合併.</h2>
<!-- 2. 在這裡加入 class="table2" -->
  <!-- 第二個表格：套用新樣式 -->
    <table class="table2">
        <tbody>
            <tr>
                <!-- 在每個 td 加上 class="td2" -->
                <td colspan="2" class="td2">12</td>
                <td class="td2">3</td>
            </tr>
            <tr>
                <td class="td2">4</td>
                <td class="td2">5</td>
                <td rowspan="2" class="td2">69</td>
            </tr>
            <tr>
                <td class="td2">7</td>
                <td class="td2">8</td>
            </tr>
        </tbody>
    </table>






</body>
</html>
>>>>>>> ca1115faa599fdbdb538363321621fc8b1c2642f
