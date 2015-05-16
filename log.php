<?php

namespace Afterlogic;

class Log {

	public static function WrongLogin($username, $clientip) {

		Log::LogLine("afterlogic: login failure for user " . $username . " with ip " . $clientip);

	}

	private static function LogLine($logline) {

		$logfile = "/var/log/afterlogic/auth.log";
		$hostname = gethostname();
		$date = exec("date +%b\ %d\ %H:%M:%S");
		file_put_contents($logfile, $date . " " . $hostname . " " . $logline . "\n", FILE_APPEND);

	}

}

?>
