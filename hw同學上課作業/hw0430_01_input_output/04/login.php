<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>會員自動登入與廣告執行</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; margin-bottom: 24px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        ul { padding-left: 20px; }
        li { margin-bottom: 8px; }
    </style>
</head>
<body>
    <h1>會員資料</h1>
    <?php
    $users = [
        [
            'name' => '李秋平',
            'id' => '514711',
            'email' => '902201768@webmail.nou.edu.tw',
            'password' => 'Aa6875624',
        ],
        [
            'name' => '李梅蘭',
            'id' => '495257',
            'email' => 's6351301@ms13.url.com.tw',
            'password' => 'Aa6875624',
        ],
        [
            'name' => '李苡柔',
            'id' => '719350',
            'email' => 's6301@gmail.com',
            'password' => 'Aa6875624',
        ],
    ];

    function maskPassword($password)
    {
        $length = mb_strlen($password, 'UTF-8');
        if ($length <= 2) {
            return $password;
        }
        return mb_substr($password, 0, 2, 'UTF-8') . str_repeat('*', $length - 2);
    }

    function getAccountPrefixDigits($email)
    {
        if (preg_match('/^([0-9]+)/', $email, $matches)) {
            return $matches[1];
        }
        if (preg_match('/^.*?(\d+).*?@/', $email, $matches)) {
            return $matches[1];
        }
        return '';
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>姓名</th>
                <th>id</th>
                <th>帳號</th>
                <th>密碼</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars(maskPassword($user['password']), ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    function loginAndOpenAd($user)
    {
        $loginUrl = 'https://www.emailcash.com.tw/login.php';
        $adBaseUrl = 'https://www.emailcash.com.tw/Rewards/DailyAdClicks.aspx?id=%s&sid=kpr2cxjcxdeyj5swa0rtomhx&u=%s';
        $result = [];

        $cookieFile = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'emailcash_cookie_' . md5(uniqid('', true)) . '.txt';

        $postData = http_build_query([
            'email' => $user['email'],
            'password' => $user['password'],
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $loginUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);

        $loginResponse = curl_exec($ch);
        $loginError = curl_error($ch);
        $loginCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($loginResponse === false || $loginError) {
            $result[] = sprintf('登入失敗：%s，錯誤：%s', $user['name'], $loginError ?: '無回應');
            curl_close($ch);
            @unlink($cookieFile);
            return $result;
        }

        $result[] = sprintf('登入完成：%s（HTTP %s）', $user['name'], $loginCode);

        $accountDigits = getAccountPrefixDigits($user['email']);
        $targetUrl = sprintf($adBaseUrl, urlencode($user['id']), urlencode($accountDigits));
        $result[] = sprintf('開啟廣告頁面：%s', $targetUrl);

        curl_setopt($ch, CURLOPT_URL, $targetUrl);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, null);
        curl_setopt($ch, CURLOPT_REFERER, $loginUrl);

        $adResponse = curl_exec($ch);
        $adError = curl_error($ch);
        $adCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($adResponse === false || $adError) {
            $result[] = sprintf('廣告頁面開啟失敗：%s，錯誤：%s', $user['name'], $adError ?: '無回應');
        } else {
            $result[] = sprintf('廣告頁面已開啟（HTTP %s），停留 20 秒', $adCode);
            flush();
            sleep(20);
            $result[] = '已停留 20 秒，完成關閉廣告頁面。';
        }

        curl_close($ch);
        @unlink($cookieFile);
        return $result;
    }

    echo '<h2>執行結果</h2>';
    echo '<ul>';
    foreach ($users as $user) {
        $delay = rand(1, 10);
        echo '<li>' . htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') . ' 將在 ' . $delay . ' 秒後登入。</li>';
        flush();
        sleep($delay);

        $steps = loginAndOpenAd($user);
        foreach ($steps as $line) {
            echo '<li>' . htmlspecialchars($line, ENT_QUOTES, 'UTF-8') . '</li>';
        }
        echo '<li style="border-bottom: 1px solid #ccc; margin-bottom: 10px;"></li>';
    }
    echo '</ul>';
    ?>
</body>
</html>
