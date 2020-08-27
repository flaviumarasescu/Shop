<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

/*
    if(empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
    exit();
    }
    else{
        cod...
    }
*/

    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){ //verifica daca avem vreo eroare in $sql; verifica daca statement ul sql functioneaza, dar nu verifica si daca primim vreun rezultat
        header("Location: ../index.php?error=sqlerror");
    exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        mysqli_stmt_execute($stmt);
        //rezultatele din SELECT; 
        $result = mysqli_stmt_get_result($stmt);
        //trebuie sa avem un if cu care verificam daca am primit vreun rezultat de la baza de date
        if($row = mysqli_fetch_assoc($result)){
            //verifica daca parola introduse de user se potriveste cu parola din bd
            $pwdCheck = password_verify($password, $row['pwdUsers']);  //$pwdCheck va primit 0 sau 1 boolean
            if($pwdCheck == false){
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
            else if($pwdCheck == true){
                //pornim sesiunea si salvam informatii in site
                session_start();
                $_SESSION['userId'] = $row['idUsers'];
                $_SESSION['userUid'] = $row['uidUsers'];

                header("Location: ../index.php?login=success");
                exit();
            }
            else{ // masura de siguranta in cazul in care apare vreo eroare si $pwdCheck va fi egal cu altceva in afara de 0 sau 1
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
        }
        else{
            header("Location: ../index.php?error=nouser");
            exit();
        }

    }

}
else{                   
    header("Location: ../index.php");
    exit();
}