<?php
$access_token = 'd5RKoHxy1wwRg0B8Xzzcns5+iarUYRVn5BGaj1HvR2Zn1huy+rVr/Q8RoPdSqxrBgEmz8ync8AlpOIGCqRYiD4OjXgjjVjN/fK+zaYEYJawIGtt4lRgRVXYYxHeJCDEX5PYZVF/wTB78cGnR6XWmcAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			
			if ($text == "no?") {
				$res = get();
				$otext = json_decode($res);
				$text = $otext[0]->payload;

				$messages = [
					'type' => 'text',
					'text' => $text
				];

				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
			}
		}
	}
}
echo "OK";
function get() {
	 $url = "https://api.netpie.io/topic/PudzaSOI/test?auth=xXCgD7V2IbWlArR:QgrhkLHJ3xbbm58B9TsVtK15d";
	 $ch = curl_init($url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	 curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
	 curl_setopt($ch, CURLOPT_USERPWD, "{YOUR NETPIE.IO APP KEY}:{YOUR NETPIE.IO APP SECRET}");
	 $response = curl_exec($ch);
	 curl_close ($ch);
	 return $response;
}
