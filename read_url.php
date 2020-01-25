<?php 
/**
$data = file_get_contents("https://www.codeproject.com/Questions/847965/How-to-get-Html-Source-Code-of-A-url-in-Php",0);
$dom = new DOMDocument();
@$dom->loadHTML($data);
// echo $data;
// Parse DOM to get Title
// Parse DOM to get Title
$nodes = $dom->getElementsByTagName('title');
$title = $nodes->item(0)->nodeValue;

// Parse DOM to get Meta Description
$metas = $dom->getElementsByTagName('meta');
$body = "";
for ($i = 0; $i < $metas->length; $i ++) {
    $meta = $metas->item($i);
    if ($meta->getAttribute('name') == 'description') {
        $body = $meta->getAttribute('content');
    }
}

// Parse DOM to get Images
$image_urls = array();
$images = $dom->getElementsByTagName('img');
$image_src = array();
 for ($i = 0; $i < $images->length; $i ++) {
     $image = $images->item($i);
     $src = $image->getAttribute('src');
     
     if(filter_var($src, FILTER_VALIDATE_URL)) {
         $image_src[] = $src;
     }
 }

$output = array(
    'title' => $title,
    'image_src' => $image_src,
    'body' => $body
);
print_r($output);
exit();
/**/
function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);
    
    
    
    // Load HTML to DOM Object
    $dom = new DOMDocument();
    @$dom->loadHTML($data);
    
    // Parse DOM to get Title
    $nodes = $dom->getElementsByTagName('title');
    $title = $nodes->item(0)->nodeValue;
    
    // Parse DOM to get Meta Description
    $metas = $dom->getElementsByTagName('meta');
    $body = "";
    for ($i = 0; $i < $metas->length; $i ++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') == 'description') {
            $body = $meta->getAttribute('content');
        }
    }
    
    // Parse DOM to get Images
    $image_urls = array();
    $images = $dom->getElementsByTagName('img');
    $image_src = array();
     for ($i = 0; $i < $images->length; $i ++) {
         $image = $images->item($i);
         $src = $image->getAttribute('src');
         
         if(filter_var($src, FILTER_VALIDATE_URL)) {
             $image_src[] = $src;
         }
     }
    
    $output = array(
        'title' => $title,
        'image_src' => $image_src,
        'body' => $body
    );
    return $output;
} 

if(isset($_POST['submit']) && $_POST['url']!=''){

if(filter_var($_POST['url'], FILTER_VALIDATE_URL)){
    echo 'this is URL';



$data = file_get_contents_curl($_POST['url']);
echo count($data['image_src']);
if(count($data['image_src']) > 0){
	// echo $data['image_src'][0];
	echo '<img src="'.$data['image_src'][0].'"/>';
}
print_r($data['title']);
// exit;
}else{
	echo 'not a proper url';
}
}

/*$html = file_get_contents_curl("https://phppot.com/php/extract-content-using-php-and-preview-like-facebook/");

//parsing begins here:
$doc = new DOMDocument();
@$doc->loadHTML($html);
//echo document.getElementById('location').value
// echo '<pre>';
// print_r($doc);
$nodes = $doc->getElementsByTagName('title');
//print_r($nodes);

//get and display what you need:
$title = $nodes->item(0)->nodeValue;

$metas = $doc->getElementsByTagName('meta');
for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
echo '<pre>';print_r($meta->getAttribute('name'));
    if($meta->getAttribute('src')){
    	print_r($meta->getAttribute('src'));
    }
        $description = '';
    if($meta->getAttribute('name') == 'keywords')
        echo $keywords = $meta->getAttribute('content');
    if($meta->getAttribute('name') == 'description')
        echo $keywords = $meta->getAttribute('content');
}

echo "Title: $title". '<br/><br/>';
echo "Description: $description". '<br/><br/>';
echo "Keywords: $keywords";

/**/


// $tags = get_meta_tags('http://www.stackoverflow.com/');
// echo "<pre>";
// print_r($tags);
?>
<form method="post">
	<input type="text" name="url">
	<input type="submit" name="submit">
</form>

<?php 
/* get full website in localhost by only using url
$url = 'https://www.alarabiya.net/ar/saudi-today/2019/10/01/السعودية-حملة-وطنية-لتشجيع-النساء-في-الشهر-الوردي.html';
$ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
print_r($data);
*/