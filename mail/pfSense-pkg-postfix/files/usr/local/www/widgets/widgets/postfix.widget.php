<?php
/*
 * postfix.widget.php
 *
 * 
 * Copyright (c) 2011-2017 Marcello Coutinho
 * All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


require_once("functions.inc");
require_once("guiconfig.inc");
require_once("pfsense-utils.inc");
require_once("pkg-utils.inc");
require_once("service-utils.inc");

$uname=posix_uname();
if ($uname['machine']=='amd64')
        ini_set('memory_limit', '250M');

$dbc=array('bounced','deferred','hold','incoming','reject','spam','sent');

function open_table($thead=""){
	echo "<table border=1 class='table table-striped table-hover table-condensed'>\n";
	echo "<thead><tr>".$thead."</tr></thread>";
        echo "<tbody>\n";
}

function open_table_header($postfix_db){
	global $dbc;
	$h="<th style='text-align:center;'>Date</th>"; //print"<tr>";
        foreach ($dbc as $c){
        	$h .= "<th style='text-align:center;'>".ucfirst($c)."</th>";
	}
	open_table($h);
}

function close_table(){
	echo"</tr>\n</tbody>";
	echo"</table>";
}

function postfix_read_db($query,$file) {
	$postfixdb = array();
	$DB = postfix_opendb($file);
	if ($DB) {
		$response = $DB->query("{$query}");
		if ($response != FALSE) {
			while ($row = $response->fetchArray()) {
				$postfixdb[] = $row;
			}
		} else {
			print "Trying to read DB returned error: {$DB->lastErrorMsg()}";
		}
		$DB->close();
	}
	return $postfixdb;
}

function postfix_opendb($file) {
	global $g,$postfix_dir,$postfix_arg;

	$stm = "select id from mail_status;";
	if (file_exists($postfix_dir.$file)) {
		$DB = new SQLite3($postfix_dir.$file);
		if ($DB->exec("{$stm};")) {
			return $DB;
		}
	}
}

$pfb_table=array();

?><div id='postfix'><?php
global $config;


$size=$config['installedpackages']['postfix']['config'][0]['widget_size'];
if (preg_match('/\d+/',$config['installedpackages']['postfix']['config'][0]['widget_days']))
	$days=$config['installedpackages']['postfix']['config'][0]['widget_days'] * -1;
else
	$days=-3;
if (preg_match('/\d+/',$config['installedpackages']['postfix']['config'][0]['widget_size']))
	$size=$config['installedpackages']['postfix']['config'][0]['widget_size'];
else
	$size='100000000';#100mb

$postfix_dir="/var/db/postfix/";
$curr_time = time();
$head_count=0;
for ($z = 0; $z > $days; $z--) {

if ($z==0) {
	$postfix_db=date("Y-m-d");
} else {
	$postfix_db=date("Y-m-d",strtotime("$z day",$curr_time));
}

if (file_exists($postfix_dir.'/'.$postfix_db.".db")) {
	#noqueue
	if (@filesize($postfix_dir.'/'.$postfix_db.".db")< $size) {
		$stm="select count(*) as total from mail_noqueue";
		$row_noqueue = postfix_read_db($stm,$postfix_db.".db");

		//queue
		$stm="select mail_status.info as status,count(*) as total from mail_to,mail_status where mail_to.status=mail_status.id group by status order by mail_status.info";
		$result = postfix_read_db($stm,$postfix_db.".db");
		foreach($dbc as $sc) {
		$c[$sc]=0; //status count
		}
		foreach($result as $i => $row) {
			if (is_array($row)) {
				if (preg_match("/\w+/",$row['status'])) {
					$c[$row['status']] = $row['total'];
				 	if ($row['status']=="reject") {
						$c[$row['status']]=+$row_noqueue[0]['total']; 
				 	}
				 }
			}
		}
		if(count($result) > 0) {
			if ($head_count==0) {
				open_table_header();
				$head_count++;
			}
			echo"<tr><th style='text-align:center;'>{$postfix_db}</th>";
			foreach($dbc as $sc) {
				echo "<th style='text-align:right;'>" . number_format($c[$sc],0,"",".") . "</th>\n";
			}
			print "</tr>";
		}
	} else {
		if ($head_count==0) {
			open_table_header();
			$head_count++;
		}
		$large_title="Database file is larger then widget max size($size).";
		echo"<tr><th style='text-align:center;' title='{$large_title}'>{$postfix_db}</th>";
		foreach($dbc as $sc) {
			echo "<th style='text-align:right;' title='{$large_title}'>--</th>";
		}
		print "</tr>";
	}
  }
}
close_table();
echo"  </tr>";
echo"</table></div>";

?>
<script src="/vendor/jquery/jquery-1.12.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
   function getstatus_postfix() {
	var url = "/widgets/widgets/postfix.widget.php";
	jQuery.ajax(url,
		{
		type: 'post',
		data: {
			getupdatestatus:  'yes'
		},
		success: function(ret){
			$('#postfix').html(ret);
		}
	});
    }

	$(document).ready(function() {
		setTimeout(getstatus_postfix,10000);
	});

</script>
