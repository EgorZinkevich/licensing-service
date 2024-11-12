<?php

function hmac_http_auth($users, $realm = "auth")
{
	if( ! empty($_SERVER['PHP_AUTH_DIGEST']))
	{
		// Decode the data the client gave us
		$default = array('nounce', 'nc', 'cnounce', 'qop', 'username', 'uri', 'response');
		preg_match_all('~(\w+)="?([^",]+)"?~', $_SERVER['PHP_AUTH_DIGEST'], $matches);
		$data = array_combine($matches[1] + $default, $matches[2]);
    
    if ($users[$data['username']] === NULL) {
      return FALSE;
    }
    
    $HA1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
		$HA2 = md5(getenv('REQUEST_METHOD').':'.$data['uri']);
		$valid_response = md5($HA1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$HA2);

		// Compare with what was sent
		if($data['response'] === $valid_response)
		{
			return TRUE;
		}
	}

	// Failed, or haven't been prompted yet
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Digest realm="' . $realm.
		'",qop="auth",nonce="' . uniqid() . '",opaque="' . md5($realm) . '"');
	exit();
}

// Fetch some users from the database or a config file
$users = array('user' => 'pass', 'user2' => 'pass');

hmac_http_auth($users);

session_start();
?>

