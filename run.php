<?php
date_default_timezone_set("Asia/Jakarta");
require 'func.php';
while (true) {
$users = file_get_contents('https://aldmlc.com/user.php?qty=1&domain=xsingles.site');
$js = json_decode($users, true);
$firstname = $js['result']['0']['firstname'];
$lastname = $js['result']['0']['lastname'];
// $name = $firstname." ".$lastname;
$name = nama();
$phone = $js['result']['0']['phone'];
$domain = "xsingles.site";
// $mail = $firstname.$lastname.rand(10,1999);
$mail = strtolower(str_replace(" ", "", $name).mt_rand(1000, 9999));
$email = $mail."@".$domain;
$reff = reff($name, $phone, $email);
if (preg_match('/true/i', $reff)) {
  echo color($color = "green" , "".date('H:i:s')." | Success Register $name\n");
  do{
    echo color($color = "blue" , "".date('H:i:s')." | Getting Verify Email...");
    echo "\r\r";
    sleep(10);
    $getmail = get_mail($domain, $mail);
    // $check = strpos($getmail, "Aktivasi Akun Tokopedia");
    $check = get_between($getmail, 'display: block" rel="nofollow">', '</a>');

    if(preg_match('/Konfirmasi Email/i', $check)){
      $linkreff = get_between($getmail, 'href="https://marketing-api.liveon.id/', '" target="_blank" style="mso');
      echo color($color = "green" , "Success!\n");
      $success = 1;
    }else{
      // echo color($color = "red" , " Failed!\n");
      $success = 0;
    }
  }while($success==0);

  # Verify
  $verify = verify($linkreff);
  if(preg_match('/KONFIRMASI EMAIL BERHASIL/i', $verify)){
    echo color($color = "green" , "".date('H:i:s')." | Konfirmasi email berhasil\n");
    echo color($color = "blue" , "".date('H:i:s')." | Waiting 15 seconds!!\n\n");
    sleep(15);
  } else {
    echo color($color = "red" , "".date('H:i:s')." | Konfirmasi email gagal\n");
  }

} else {
  echo color($color = "red" , "".date('H:i:s')." | Failed Register $reff\n");
}
}
?>