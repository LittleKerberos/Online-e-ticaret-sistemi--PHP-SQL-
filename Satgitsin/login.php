<?php 
 
include("header.php");
ob_start();
session_start();
 
$kadi = $_POST['kullanici_mail'];
$sifre = $_POST['kullanici_password'];
 
$sql_check = mysql_query("select * from uyeler where username='".$kadi."' and password='".$sifre."' ") or die(mysql_error());
 
if(mysql_num_rows($sql_check))  {
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    header("Location:urunler.php");
}
else {
    if($kadi=="" or $sifre=="") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}
 
ob_end_flush();
?>