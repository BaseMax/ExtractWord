<?php
/**
*
* @Name : ExtractWord/parse.php
* @Version : 1.0
* @Programmer : Max
* @Date : 2019-04-15
* @Released under : https://github.com/BaseMax/ExtractWord/blob/master/LICENSE
* @Repository : https://github.com/BaseMax/ExtractWord
*
**/
if(isset($_POST['srt'])) {
	header("Content-Type: text/plain");
	$srt=$_POST['srt'];
	$filter=$_POST['filter'];
	$lines=explode("\n", $srt);
	$output="";
	// file_put_contents("s".rand(1000,9999).".txt",$srt);
	foreach($lines as $line) {
		$line=trim($line);
		if($line=="") {
			continue;
		}
		$index=(int) $_POST['index'];
		$words=explode(" ",$line);
		$words=array_filter($words);
		$words=array_values($words);
		// print_r($words);
		if($index < 0) {
			$index=count($words) - (-1*($index));
		}
		else if($index > 0) {
			$index--;
		}
		if(isset($words[$index])) {
			$line=$words[$index];
			if($filter != "none") {
				if($filter == "up") {
					$line=strtoupper($line);
				}
				else if($filter == "low") {
					$line=strtolower($line);
				}
			}
			// if($line != "") {
			// }
			$output.=$line."\n";
		}
	}
	print $output;
}
else {
?>
<form action="" method="POST">
	<textarea cols="13" rows="20" name="srt"></textarea><br>
	<input value="1" name="index" type="number"><br>
	<select name="filter">
		<option value="none">None</option>
		<option value="low">Low</option>
		<option value="up">Up</option>
	</select>
	<button>Check</button>
</form>
<?php
}
