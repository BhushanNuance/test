<?php 

$conn = mysqli_connect('localhost','root','','pharmacy');
// mysqli_query("SET NAMES 'utf8'");

// mysqli_query("SET CHARACTER_SET 'utf8'");

// $fileName = 'doctor-list.csv';
$fileName = 'medication-instructions3.csv';
// $csvData = file_get_contents($fileName);
// $lines = explode(PHP_EOL, $csvData);
// $array = '';
// echo '<pre>';print_r($lines);// exit;

// if(($fh = fopen($fileName, 'r')) !== false ) {
	
		
//        $headers = fread($fh, 0xA00);
//        $n1 = ( ord($headers[0x21C]) - 1 );
//        $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
//        $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );
//        $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
//        $textLength = ($n1 + $n2 + $n3 + $n4);
//        if($extracted_plaintext = @fread($fh, $textLength)){

// 	   }else{
// 			return docx2text($fileName); // Save this contents to file
// 	   }
	
// 		$text=str_replace(  chr(13) , "\
// ", $extracted_plaintext);

// 		echo $text;
// }
// exit;

if (($h = fopen($fileName, "r")) !== FALSE) 
{
  $t = 0;
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {		
  	echo '<pre>';print_r($data);
 //  	echo $sql = "INSERT INTO doctor_list(`name_ar`, `name`, `arabic_deapertmen_name`, `deapertmen_name`, `title`, `title_ar`, `office_ext`, `moh_email`) VALUES('".trim($data[0])."','".trim($data[1])."','".trim($data[2])."','".trim($data[3])."','".trim($data[4])."','".trim($data[5])."','".trim($data[6])."','".trim($data[7])."')";
 //  	echo '<br>';
	// //echo '<pre>';print_r($data);
	// mysqli_query($conn,$sql);
	//$t+1;
  }
	//echo $t;
  // Close the file
  fclose($h);
}
exit;


foreach ($lines as $line) {
	if(str_getcsv($line)!='' && $line>0){
		$line_row = str_getcsv($line);
		print_r($line_row);
    // ph_doctor_list
    // $array .= "UPDATE staff_master SET Joining_date ='".$line_row[1]."',jd_year ='".$line_row[2]."',jd_month ='".$line_row[3]."',jd_day ='".$line_row[4]."' where staff_ID = '".$line_row[0]."'".";<br>";
	}
}
// echo '<pre>';print_r($array);
exit;


$fileName = 'joiningdate_back.csv';
$csvData = file_get_contents($fileName);
$lines = explode(PHP_EOL, $csvData);
$array = '';

foreach ($lines as $line) {
	if(str_getcsv($line)!='' && $line>0){
		$line_row = str_getcsv($line);
    //$array[] = str_getcsv($line);
    $array .= "UPDATE staff_master SET Joining_date ='".$line_row[1]."',jd_year ='".$line_row[2]."',jd_month ='".$line_row[3]."',jd_day ='".$line_row[4]."' where staff_ID = '".$line_row[0]."'".";<br>";
	}
}
echo '<pre>';print_r($array);


?>



