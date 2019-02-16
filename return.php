<?php
//merchantOrderId=1548231083&resultCode=01&reference=D4505U6V6CPNBWF7T
$merchantOrderId=$_GET['merchantOrderId'];
$resultCode=$_GET['resultCode'];
$reference=$_GET['reference'];
// echo json_encode($_GET);
$host='localhost';
$user='root';
$pass='!!baznaskotabogor!!';
$db='db_baznas';
// $pass='';
// $db='db_baz_kotabogor';
$kon=mysqli_connect($host,$user,$pass,$db);


$qry=mysqli_query($kon,'SELECT * FROM zakat_online WHERE id_donasi="'.$merchantOrderId.'"');
if(mysqli_num_rows($qry)!=0)
{
    $update='UPDATE zakat_online SET status_donasi="'.$resultCode.'", reference="'.$reference.'" WHERE id_donasi='.$merchantOrderId;
    mysqli_query($kon,$update);
    if($resultCode=='00')
    {
        // header('Location: http://localhost/baznas-web/public/terima-kasih?merchantOrderId='.$merchantOrderId.'&resultCode='.$resultCode.'&reference='.$reference);
        header('Location: http://baznaskotabogor.or.id/terima-kasih?merchantOrderId='.$merchantOrderId.'&reference='.$reference);
    }
    else
    {
        // header('Location: http://localhost/baznas-web/public/konfirmasi-donasi?merchantOrderId='.$merchantOrderId.'&resultCode='.$resultCode.'&reference='.$reference);
        header('Location: http://baznaskotabogor.or.id/konfirmasi-donasi?merchantOrderId='.$merchantOrderId.'&reference='.$reference);
    }
}
?>