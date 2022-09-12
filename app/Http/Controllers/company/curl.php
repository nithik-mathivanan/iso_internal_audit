<?php 
$file               = request('file');
$file_path          = $file->getPathname();
$file_mime          = $file->getMimeType('image');
$file_uploaded_name = $file->getClientOriginalName();
$uploadFileUrl = 'http://13.233.245.102:5000/api/compare';


$filepath="C:/Users/elcot/Downloads/server/Master _ api/test3.xlsx";

if (function_exists('curl_file_create')) { 
  $cFile = curl_file_create($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
} else { // 
  $cFile = '@' . realpath($filepath);
}

 	$headers = array("Content-Type:multipart/form-data;"); 
  $postfields = array("file" =>$cFile,"template" => 'test.xlsx');
  //dd($postfields);
  $ch = curl_init();
  $options = array(
      CURLOPT_URL => $uploadFileUrl,
      CURLOPT_HEADER => true,
      CURLOPT_POST => 1,
      CURLOPT_HTTPHEADER => $headers,
      CURLOPT_POSTFIELDS => $postfields,
       CURLOPT_INFILESIZE => "455454",
      CURLOPT_RETURNTRANSFER => true
  ); // cURL options
  curl_setopt_array($ch, $options);
  $res=curl_exec($ch);
  if(!curl_errno($ch))
  {

      $info = curl_getinfo($ch);
      if ($info['http_code'] == 200)
          $errmsg = "File uploaded successfully";
  }
  else
  {
      $errmsg = curl_error($ch);
  }
  curl_close($ch);

dd( $res );
?>