<?php
    include("ConBD.php");
    $con=conectar();

    $u=$_POST['emp'];
    $user='0';
    $l=strlen($user);
    for ($i = 0; $i < $l; $i++) {
        if($u[$i]!=' '){
            $user=$user.$u[$i];
        }else{$i=99;}
    }
    
    $causa=$_POST['causa'];
    $monto=0;
    date_default_timezone_set('America/Mexico_City');
    $hoy = date("Y-m-d");
    $hora = date("H:i:s");
    if($causa=='AUSENTE'){
        $monto=200.00;
    }else if($causa=='RETARDO'){
        $monto=50.00;
    }elseif($causa=='RETIRO TEMPRANO'){
        $monto=60.00;
    }

    $query="INSERT INTO reportes VALUES('$user','$hoy','$hora','$causa','$monto')";
    $result=mysqli_query($con,$query);
    mysqli_close($con);
    if($result){
        echo('si');
    }else echo ('no');
    
?>