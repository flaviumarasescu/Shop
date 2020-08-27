<?php
if(isset($_POST['signup-submit'])){ //verfica daca user ul a ajuns la pagina prin butonul de submit

    require "dbh.inc.php";

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];


    //Error handler

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else{
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; //uidUsers=? ca userul sa nu poata scrie cod sql in formular
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
        exit();
        }
        else{
                //preia info de la user si le pun in bd
            mysqli_stmt_bind_param( $stmt, "s", $username ); //s - string - data type
            mysqli_stmt_execute($stmt);
            //pentru ca un user sa nu poata folosi o adresa care a mai fost introdusa
            mysqli_stmt_store_result($stmt);
            //cand primim info de la db le primim ca linii si rezultatul ar trebui sa fie 0 sau 1
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0 ){
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else{
                //Populare tabel 
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                exit();
                }
                else{
                    //metoda de hash ing pentru parola pentru a o cripta
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        
            mysqli_stmt_bind_param( $stmt, "sss", $username, $email, $hashedPwd); 
            mysqli_stmt_execute($stmt);
            header("Location: ../signup.php?signup=success");
                exit();
                }

            }
        }
    }
    //inchidem legaturile pentru a salva spatiu
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
else{ //daca nu a ajuns aici prin butonul de submit atunci il trimitem inapoi
    header("Location: ../signup.php");
                exit();
}