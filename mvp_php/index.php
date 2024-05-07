<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
if (isset($_GET['add'])){
    $data = $tp->add(); 
} else if(isset($_GET['edit'])){
    $id = $_GET['edit']; 
    $data = $tp->edit($id); 
}
else {
    $data = $tp->tampil();
}