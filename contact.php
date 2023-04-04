<?php



if(isset($_POST['submit'])){

    try{
        $conn= new PDO("mysql:host=localhost;dbname=assignment09","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connected succesfully";
    }catch(PDOException $e){
        echo "connection failed".$e->getMessage();
    }


    $fullName = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
    $subject = filter_input(INPUT_POST,'subject',FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST,'textarea',FILTER_SANITIZE_STRING);
    

    $pdo_query= "INSERT INTO contact_form(fullname,email,subject, message) VALUES(:fullName,:email,:subject,:message)";
    $pdo_result = $conn->prepare($pdo_query);
    $pdo_result->execute([':fullName'=> $fullName, ':email'=> $email,':subject'=> $subject,':message'=> $message]);
   
    if($pdo_result){
      echo "Register succesfully";
       
    }else{
      echo  "Register Failed";
    }

}


 
       
    





