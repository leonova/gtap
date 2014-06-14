  <?php  
 include('config.php');
 $url = 'https://api.parse.com/1/classes/TAP/870X5Lp56f';   
 $rest = curl_init();  
 curl_setopt($rest,CURLOPT_URL,$url);  
 curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);  
 curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
 curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
 $response = curl_exec($rest);  
 echo "<pre>";
 //echo $response;  
 print_r($response);  
 curl_close($rest);  
 ?>  