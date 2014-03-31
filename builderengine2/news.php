<?
mysql_connect("127.0.0.1", "root", "Buub1es");
mysql_select_db("be_central");

$query = "SELECT * FROM `news`";
$result = mysql_query($query) or die(mysql_error());
$num = mysql_num_rows($result);

$now = time();
$news = array();
for($i = 0; $i < $num; $i++)
{
	$entry['icon'] = mysql_result($result, $i, "icon");
	$entry['title'] = mysql_result($result, $i, "title");
	$entry['text'] = mysql_result($result, $i, "text");
	
	$entry['url'] = mysql_result($result, $i, "url");
	$entry['code'] = mysql_result($result, $i, "code");
	$entry['time'] = parse_time(mysql_result($result, $i, "time"));
	array_push($news, $entry);
}
$news = array_reverse($news);
echo json_encode($news);


function parse_time($time)
{
	$now = time();
	$today_date = date("d-m-y");
	$then_date = date("d-m-y", $time);
	$yesterday_date = date("d-m-y", $now - 86400);



	if($then_date == $yesterday_date)
		return "yesterday";


	if($then_date == $today_date)
	{
		$diff = $now - $time;
		if($diff == 1)
			return "1 secound ago";
		if($diff < 60)
			return "$diff secounds ago";
		if($diff >= 60 && $diff < 120)
			return "1 minute ago";
		if($diff >= 120 && $diff < 3600)
			return floor($diff/60)." minutes ago";



	}

	return ceil(($now - $time)/86400)." days ago";
}
?>