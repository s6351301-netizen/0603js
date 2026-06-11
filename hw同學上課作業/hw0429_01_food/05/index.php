<?php
echo "
<style>
    .restaurant-table {
        width: 800px;
        margin: 20px auto;
        border: 2px solid #333;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }
    
    .restaurant-table td {
        border: 1px solid #ccc;
        padding: 15px;
        vertical-align: middle;
    }

    .img-container {
        width: 250px;
    }

    .img-container img {
        width: 100%;
        display: block;
        border: none; /* 移除圖片連結可能產生的邊框 */
    }
    
    /* 讓連結圖片時滑鼠變手形，並增加一點透明度變化 */
    .img-container a:hover img {
        opacity: 0.8;
    }
</style>
";

echo "<h1 style='text-align:center;'>餐廳</h1>";

echo "<table class='restaurant-table'>";

// 第一組：點擊連到 aaaa.html
echo "<tr>";
    echo "<td class='img-container'>";
        echo "<a href='aaaa.html'>";
            echo "<img src='./images/下載.jpg' alt='餐廳1'>";
        echo "</a>";
    echo "</td>";
    echo "<td>";
        echo "<strong>aaaa</strong><br>";
        echo "aaaa";
    echo "</td>";
echo "</tr>";

// 第二組：點擊連到 bbbb.html
echo "<tr>";
    echo "<td class='img-container'>";
        echo "<a href='bbbb.html'>";
            echo "<img src='./images/下載 (1).jpg' alt='餐廳2'>";
        echo "</a>";
    echo "</td>";
    echo "<td>";
        echo "<strong>bbbb</strong><br>";
        echo "bbbb";
    echo "</td>";
echo "</tr>";

// 第三組：點擊連到 cccc.html
echo "<tr>";
    echo "<td class='img-container'>";
        echo "<a href='cccc.html'>";
            echo "<img src='./images/下載 (2).jpg' alt='餐廳3'>";
        echo "</a>";
    echo "</td>";
    echo "<td>";
        echo "<strong>cccc</strong><br>";
        echo "cccc";
    echo "</td>";
echo "</tr>";

echo "</table>";
?>
