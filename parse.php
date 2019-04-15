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
        if($index < 0) {
            $index=count($words) - (-1*$index);
        }
        $line=$words[$index];
        $output.=$line."\n";
    }
    print $output;
}
else {
?>
<form action="" method="POST">
    <textarea name="srt"></textarea>
    <input value="1" name="index" type="number"><br>
    <button>Check</button>
</form>
<?php
}
