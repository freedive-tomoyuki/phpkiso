<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
 <html>
  <head>
   <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <title>PHP基礎</title>
  </head>
 <body>
<?php
  $dsn='mysql:dbname=phpkiso;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES ytf8');
$nickname=$_POST['nickname'];
$email=$_POST['email'];
$goiken=$_POST['goiken'];

$nickname=htmlspecialchars("$nickname");
$email=htmlspecialchars("$email");
$goiken=htmlspecialchars("$goiken");

print $nickname;
print '様<br>';
print'ご意見ありがとうございました';
print'いただいたご意見<br>';
print $goiken;
print'<br>';
print $email;
print'にメールを送りましたのでご確認ください';

$email_sub='アンケートを受け付けました';
$email_body=$nickname."様へ¥nアンケートへのご協力ありがとうございました";
$email_body=html_entity_decode($email_body,ENT_QUOTES,"UTF-8");
$email_head='From:xxx@xxx.co.jp';
mb_language('japanese');
mb_internal_encoding("UTF-8");
mb_send_mail($email,$mail_sub,$mail_body,$mail_head);

  $sql='INSERT INTO anketo(ニックネーム,メールアドレス,
ご意見)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;
?>
 </body>
 </html>
