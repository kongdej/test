<?php
$access_token = 'd5RKoHxy1wwRg0B8Xzzcns5+iarUYRVn5BGaj1HvR2Zn1huy+rVr/Q8RoPdSqxrBgEmz8ync8AlpOIGCqRYiD4OjXgjjVjN/fK+zaYEYJawIGtt4lRgRVXYYxHeJCDEX5PYZVF/wTB78cGnR6XWmcAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;