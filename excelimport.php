<?php
include("config.php");
//test
if(isset($_POST["voucher"]))
{
    $count=0;
    $error = 0;
    foreach($_POST["voucher"] as $key=>$vouchr)
    {
        if($vouchr !="")
        {
            $sql ="INSERT INTO `cars`(`voucher`, `refid`, `licensenum`, `recdatetime`, `payment`, 
            `vehicleclass`, `operatorid`, `fee`, `fee2`, `weight`,
             `weightcharge`, `charge`, `pdate`, `section`, `gateid`,
              `terminalid`, `totalcharge`, `clouddatetime`) 
              VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$vouchr,PDO::PARAM_STR);
            $stmt->bindParam(2,$_POST["refid"][$key],PDO::PARAM_STR);
            $stmt->bindParam(3,$_POST["licensenum"][$key],PDO::PARAM_STR);
            $stmt->bindParam(4,$_POST["recdatetime"][$key],PDO::PARAM_STR);
            $stmt->bindParam(5,$_POST["payment"][$key],PDO::PARAM_STR);
            $stmt->bindParam(6,$_POST["vehicleclass"][$key],PDO::PARAM_STR);
            $stmt->bindParam(7,$_POST["operatorid"][$key],PDO::PARAM_STR);
            $stmt->bindParam(8,$_POST["fee"][$key],PDO::PARAM_STR);
            $stmt->bindParam(9,$_POST["fee2"][$key],PDO::PARAM_STR);
            $stmt->bindParam(10,$_POST["weight"][$key],PDO::PARAM_STR);
            $stmt->bindParam(11,$_POST["weightcharge"][$key],PDO::PARAM_STR);
            $stmt->bindParam(12,$_POST["charge"][$key],PDO::PARAM_STR);
            $stmt->bindParam(13,$_POST["pdate"][$key],PDO::PARAM_STR);
            $stmt->bindParam(14,$_POST["section"][$key],PDO::PARAM_STR);
            $stmt->bindParam(15,$_POST["gateid"][$key],PDO::PARAM_STR);
            $stmt->bindParam(16,$_POST["terminalid"][$key],PDO::PARAM_STR);
            $stmt->bindParam(17,$_POST["totalcharge"][$key],PDO::PARAM_STR);
            $stmt->bindParam(18,$_POST["clouddatetime"][$key],PDO::PARAM_STR);
            if($stmt->execute() == true)
            {
                $count++;
            }else
            {
                $error++;
            }
        }
    }
    echo "<font color='green'>စုစုပေါင်း $count Row ထည့်သွင်းမှုအောင်မြင်ပါသည်. Error အရေအတွက် $error ဖြစ်ပါသည်</font>";
}
?>