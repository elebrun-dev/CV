<?php

    $array = array("surname" => "", "name" => "", "email" => "", "message" => "", "isSuccess" => false);
    $emailTo = "lebrun.estelle@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["surname"] = test_input($_POST["surname"]);
        $array["name"] = test_input($_POST["name"]);
        $array["email"] = test_input($_POST["email"]);
        $array["message"] = test_input($_POST["message"]);
        $array["isSuccess"] = true; 
        $emailText = $array['message'];
            
        if($array["isSuccess"]) 
        {
            $headers = "From: {$array['surname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
        }
        echo json_encode($array);
    }
    
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>