<?php
    $mysqli = new mysqli('localhost', 'techviqc_ctc','Kazi786786','techviqc_leadsdb') or die(mysqli_error($mysqli));
    

    if(isset($_POST['subform'])){

        $vin = $_POST['vin'];
        $make= $_POST['make'];
        $year= $_POST['year'];
        $model= $_POST['model'];
        $engine= $_POST['engine'];
        $style= $_POST['style'];
        $madein= $_POST['madein'];
        $miles= $_POST['miles'];
        $zipcode= $_POST['zipcode'];

        if(isset($_POST['vehiclerepairs'])){
            $vehiclerepairs = "Yes";
            $repaircost = $_POST['repaircost'];
        }
        else{
            $vehiclerepairs = "none";
            $repaircost = "none";
        }
        if(isset($_POST['payoff'])){
            $payoff = "Yes";
            $payoffamount = $_POST['payoffamount'];
        }
        else{
            $payoff = "none";
            $payoffamount  = "none";
        }
        
        $previoushistory = $_POST['pdamage'];

        if(isset($_POST['replacevehicle'])){
            $replacevehicle = "Yes";
        }
        else{
            $replacevehicle = "No";
        }

        $cardesc = addslashes($_POST['cardesc']);
        $fname = addslashes($_POST['fname']);
        $lname = addslashes($_POST['lname']);
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $images = "none";



        
            


        $sql = "INSERT INTO `data`( `VinNumber`, `Maker`, `Year`, `Model`, `Engine`, `Style`, `MadeIn`, `Miles`, `ZipCode`, `AnyRepairs`, `RepairCost`, `Payoff`, `Payoff Amount`, `PreviousDamageHistory`, `ReplacingVehicle`, `VehicleDescription`, `Images`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES ('$vin','$make','$year','$model','$engine','$style','$madein','$miles','$zipcode','$vehiclerepairs','$repaircost','$payoff','$payoffamount','$previoushistory','$replacevehicle','$cardesc','none','$fname','$lname','$email','$phone')";

        
        if ($mysqli->query($sql) === TRUE) {
            $sql2 = "SELECT * FROM `data` WHERE id=(SELECT max(Id) FROM `data`)";
            $result = $mysqli->query($sql2);

            

            
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
    
            $lastid =  $row['Id'];

            foreach($_FILES['image']['name'] as $id=>$val){

                $output_dir = "uploads/";/* Path for file upload */
                $RandomNum   = time();
                $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][$id]));
                $ImageType      = $_FILES['image']['type'][$id];
            
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
                $ret[$NewImageName]= $output_dir.$NewImageName;
                
                /* Try to create the directory if it does not exist */
                if (!file_exists($output_dir))
                {
                    @mkdir($output_dir, 0777);
                }               
                move_uploaded_file($_FILES["image"]["tmp_name"][$id],$output_dir."/".$NewImageName );
                
                $sql3 = "INSERT INTO `images`(`id`, `imagename`) VALUES ('$lastid','$NewImageName')";
                if ($mysqli->query($sql3) === TRUE) {
                    header("Location: thank-you.php");
                }
                else {
                    header("Location: thank-you.php");
                }


            }

            }

        }
        else {
            header("Location: thank-you.php");
        }
            
            
            
            
          } 
          else {
            // echo $mysqli->error;
            header("Location: error.php");
          }
        
          
        
    }
    else{
        header("Location: 404.php");
    }


?>