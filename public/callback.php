<?php
date_default_timezone_set("Asia/Jakarta");
$data['apiKey']= $apiKey = 'e2114de17cebc0fce3ddb1b46b64dbd8'; // Your api key
// $data['apiKey']= $apiKey = '934ef1002eb09a26c1fe05735b2c82f7'; // Your api key
// $merchantCode = 'D1248'; // from duitku
// $merchantKey = '934ef1002eb09a26c1fe05735b2c82f7';
$data['merchantCode']= $merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null; 
$data['amount']= $amount = isset($_POST['amount']) ? $_POST['amount'] : null; 
$data['merchantOrderId']= $merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null; 
$data['productDetail']= $productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null; 
$data['additionalParam']= $additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null; 
$data['paymentMethod']= $paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null; 
$data['resultCode']= $resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null; 
$data['merchantUserId']= $merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null; 
$data['reference']= $reference = isset($_POST['reference']) ? $_POST['reference'] : null; 
$data['signature']= $signature = isset($_POST['signature']) ? $_POST['signature'] : null; 

$issuer_name = isset($_POST['issuer_name']) ? $_POST['issuer_name'] : null; // Hanya untuk ATM Bersama
$issuer_bank = isset($_POST['issuer_bank']) ? $_POST['issuer_bank'] : null; // Hanya untuk ATM Bersama
$dt=json_encode($data);

if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
{
    $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
    $calcSignature = md5($params);

    if($signature == $calcSignature)
    {
        //Your code here
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
            $update='UPDATE zakat_online SET status_donasi="'.$resultCode.'",tanggal_payment="'.date('Y-m-d H:i:s').'" WHERE id_donasi='.$merchantOrderId;
            mysqli_query($kon,$update);
        }
        if($resultCode == "00")
        {
            $dt['status']=$st='Berhasil';
            // file_put_contents('sukses.txt',$dt);
            echo "SUCCESS"; // Save to database
            // header('Location: http://localhost/baznas-web/public/terima-kasih?merchantOrderId='.$merchantOrderId.'&resultCode='.$resultCode.'&reference='.$reference);
            // header('Location: http://baznaskotabogor.or.id/terima-kasih?merchantOrderId='.$merchantOrderId.'&reference='.$reference);

            $row=mysqli_fetch_assoc($qry);
            if($row['hp']!='')
            {
                $zenziva_userkey = 'ipo6j7la3q9ya9i3s6k7';
                $zenziva_passkey = '6h7c33rlid30zjxt5vg4';
                $zenziva_telepon = $row['hp'];
                $zenziva_message = 'Terima Kasih Atas Kepercayaan Anda Menyalurkan Donasi Zakat/Infak/Sedekah Pada BAZNAS Kota Bogor Sebesar Rp.'.number_format($row['jlh_donasi'],0,',','.');
                $url = 'http://baznaskotabogor.zenziva.co.id/api/sendsms/';
                $curlHandle = curl_init();
                curl_setopt($curlHandle, CURLOPT_URL, $url);
                curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
                curl_setopt($curlHandle, CURLOPT_POST, 1);
                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                    'userkey' => $zenziva_userkey,
                    'passkey' => $zenziva_passkey,
                    'nohp' => $zenziva_telepon,
                    'pesan' => $zenziva_message
                ));
                $results = json_decode(curl_exec($curlHandle), true);
                curl_close($curlHandle);
            }

        }
        else
        {
            $dt['status']=$st='Gagal';
            // file_put_contents('sukses.txt',$dt);
            echo "FAILED"; // Please update the status to FAILED in database
        }


    }
    else
    {
        $dt['status']=$st='Bad Signature';
        echo "Bad Signature";
        // file_put_contents('sukses.txt',$dt);
        throw new Exception('Bad Signature');
    }
}
else
{
    $dt['status']=$st='Bad Parameter';
    echo 'Bad Parameter';
    // file_put_contents('sukses.txt',$dt);
    throw new Exception('Bad Parameter');
}

// echo '<pre>';
// print_r($dt);
// echo '</pre>';
?>
