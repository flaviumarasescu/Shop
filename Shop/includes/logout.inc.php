<?php

session_start();
session_unset();    //Sterge toate variabilele din sesiune
session_destroy();  //distrugem sesiunea care ruleaza
header("Location: ../index.php");