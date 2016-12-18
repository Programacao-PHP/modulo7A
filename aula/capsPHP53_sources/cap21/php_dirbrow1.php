<?
#############################################
#This codes holds no license.               #
#Created in part by harkey of harkeyahh.com #
#############################################
/* Edited from PHPBuilder.com */
function readpath($dir,$level,$last,&$dirs,&$files){
	//print $dir." (DIR)<br/>\n";
	$dp=opendir($dir);
	while (false!=($file=readdir($dp)) && $level == $last){
		if ($file!="." && $file!="..")
                {
			if (is_dir($dir."/".$file))
			{
				readpath($dir."/".$file,$level+1,$last,$dirs,$files); // uses recursion
				$dirs[] = "$dir/$file";  // reads the dir into an array
			}
			else{
				$files[] = "$dir/$file"; // reads the file into an array
			}
		}
	}
}
/* From PHP.NET */
function get_size($path)
   {
       if(!is_dir($path))return filesize($path);
       $dir = opendir($path);
       while($file = readdir($dir))
       {
           if(is_file($path."/".$file))$size+=filesize($path."/".$file);
           if(is_dir($path."/".$file) && $file!="." && $file !="..")$size +=get_size($path."/".$file);
          
       }
       return $size;
   }
#####################
/* BEGIN MAIN CODE */
#####################
if(isset($_GET['i'])){
$start_dir = $_GET['i']; // this fetches the i or directory name through a link specified via the url.
}
else{    // else if no name is specified by link, then use the default
$start_dir = ".";   // . means the current directory or whatever name you specify
}

$level=1;  // level is the first level started at
$last=1; //this is set the same as level so the script does not read all directories, and only one at a time
$dirs = array();  // SET dirs as an ARRAY so it can be read
$files = array(); //SET files as an ARRAY so it can be read

readpath($start_dir,$level, $last, $dirs,$files);
?>

<strong>Sub Directories in <?=$start_dir?></strong><br/>
<?php
sort($dirs);

if(empty($dirs))   // checks if the dirs array is empty. if so, then display "empty"
{
echo"empty";
}
/* SHOWS THE DIRECTORIES FROM ARRAY */
foreach($dirs as $dir)
{
echo "<a href=\"$PHP_SELF?i=$dir\">$dir</a><br/>\n";//Creates a link to the dir through the script so it will be shown.
}
?>

<?php
/* SHOWS FILES FROM ARRAY*/
$tf = count($files);
echo "Local Files Total: $tf"; /* Display total in directory*/

sort($files);   // Sort the files alphabetically

foreach($files as $file)
{     //Below PHP functions are used to display file stats such as creation time, permissions etc.
echo "<br/><a href=\"$file\">$file</a> <strong>mtime:</strong>".date("U",@filemtime($file))." || ".date("(F)m.d.y",@filemtime($file));
echo " <strong>size:</strong>".get_size($file);
echo " <strong>mode:</strong>".substr(sprintf('%o', @fileperms($file)), -3);
echo "<br/>\n";
}
?>
