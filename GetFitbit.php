<?php 
   
    include 'connect.php';
    date_default_timezone_set('Asia/Taipei');
    $result = $conn -> query("SELECT access_token FROM `token` WHERE id='1'");

    while ($row = $result->fetch_assoc()) // 當該指令執行有回傳
    {
        $access_token = $row["access_token"];    
    } 
    $day=date("Y-m-d");
    $time=date("H:i");

    //卡路里
    $url1 = "https://api.fitbit.com/1/user/-/activities/calories/date/$day/1d/15min/time/00:00/$time.json";
    $header = array(
      'authorization:Bearer '.$access_token.'\'',
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url1);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $calroies = curl_exec($curl);
    if (curl_error($curl)) {
        print "Error: " . curl_error($curl);
    } else {
        curl_close($curl);
    }

    
    //日步數
    $url2 = "https://api.fitbit.com/1/user/-/activities/steps/date/$day/1d/15min/time/00:00/$time.json";
    $header = array(
      'authorization:Bearer '.$access_token.'\'',
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url2);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $daystep = curl_exec($curl);
    if (curl_error($curl)) {
        print "Error: " . curl_error($curl);
    } else {
        curl_close($curl);
    }
    
    //體重
    $url3 = "https://api.fitbit.com/1/user/-/body/log/weight/date/$day.json";
    $header = array(
    'authorization:Bearer '.$access_token.'\'',
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url3);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $weight = curl_exec($curl);
    if (curl_error($curl)) {
        print "Error: " . curl_error($curl);
    } else {
        curl_close($curl);
    }
    //距離
    $url4 = "https://api.fitbit.com/1/user/-/activities/distance/date/$day/1d/1min/time/00:00/$time.json";
    $header = array(
      'authorization:Bearer '.$access_token.'\'',
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url4);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $distance = curl_exec($curl);
    if (curl_error($curl)) {
        print "Error: " . curl_error($curl);
    } else {
        curl_close($curl);
    }
    //心率
    $url5 = "https://api.fitbit.com/1/user/-/activities/heart/date/$day/1d/1min/time/00:00/$time.json";
    $header = array(
    'authorization:Bearer '.$access_token.'\'',
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url5);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $heartrate = curl_exec($curl);
    if (curl_error($curl)) {
        print "Error: " . curl_error($curl);
    } else {
        curl_close($curl);
    }
    
    //睡眠分數
    $url = "https://api.fitbit.com/1.2/user/-/sleep/date/$day.json";
    $header = array(
      'authorization:Bearer '.$access_token.'\'',
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $sleep = curl_exec($curl);
    if (curl_error($curl)) {
        print "Error: " . curl_error($curl);
    } else {
        curl_close($curl);
    }
    
     //json轉php資料 取得目標資料
     $ca=json_decode($calroies, true);
   // print_r($ca);
    // echo $ca['activities-calories'] [0] ['value'] ;
     $c=$ca['activities-calories'] [0] ['value'] ;
 
     $st=json_decode($daystep, true);
    // print_r($st);
    // echo $st['activities-steps'] [0] ['value'] ;
     $s=$st['activities-steps'] [0] ['value'] ;
 
     $di=json_decode($distance, true);
    // print_r($di);
    // echo $di['activities-distance'] [0] ['value'] ;
     $d=$di['activities-distance'] [0] ['value'] ;
 
     $he=json_decode($heartrate, true);
   //print_r($he);
    // echo  $he['activities-heart'] [0] ['value'] ;
     $h=$he['activities-heart'] [0] ['value'] ;
 
     $oo=json_decode($sleep, true);
     
  

     
     if(empty($oo['sleep'][0]['efficiency'])){
        $insert = "INSERT INTO personal_datas(calroies,date,step_day,heartrate,distance,point,user_id)";
        $values = "values($c, '$day',$s,$h,$d,0,'')";
        $sql = "$insert $values";
      //   $updatQuery = "UPDATE personal_datas SET `calroies`='$c',`date`='$day',`step_day`='$s',`distance`='$d',`heartrate`='$h'";
         
         $result = mysqli_query ($conn,$sql);
     }else{    
         $q=$oo['sleep'][0]['efficiency'];
        
         $insert = "INSERT INTO personal_datas(calroies,date,step_day,heartrate,distance,point,user_id)";
         $values = "values($c, '$day',$s,$h,$d,$q,'')";
         $sql = "$insert $values";
         $result = mysqli_query ($conn,$sql);
     }

   
    //印出json
    $result = $conn -> query("SELECT * FROM `personal_datas`");
    while ($row = $result->fetch_assoc())
    {
        $output[] = $row;
    }
    print(json_encode($output, JSON_UNESCAPED_UNICODE));
    $conn -> close();
?>

