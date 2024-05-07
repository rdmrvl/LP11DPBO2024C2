<?php

include("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
    private $tabelpasien;
    private $data = [];

    function __construct()
    {
        try {
            $db_host = "localhost"; 
            $db_user = "root"; 
            $db_password = ""; 
            $db_name = "mvp_php"; 
            $this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); 
            $this->data = array(); 
        } catch (Exception $e) {
            echo "wiw error" . $e->getMessage();
        }
    }
    
    function prosesDataPasien()
    {
        try {
            $this->tabelpasien->open();
            $this->tabelpasien->getPasien();
            while ($row = $this->tabelpasien->getResult()) {
                $pasien = new Pasien(); 
                $pasien->setId($row['id']); 
                $pasien->setNik($row['nik']); 
                $pasien->setNama($row['nama']); 
                $pasien->setTempat($row['tempat']); 
                $pasien->setTl($row['tl']); 
                $pasien->setGender($row['gender']); 
                $pasien->setEmail($row['email']); 
                $pasien->setNoTelp($row['telp']); 

                $this->data[] = $pasien; 
            }
            $this->tabelpasien->close();
        } catch (Exception $e) {
            echo "wiw error part 2" . $e->getMessage();
        }
    }
    
    function getPatientbyId($id){
        try {
            $this->tabelpasien->open();
    
            $result = $this->tabelpasien->getPasienbyId($id);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // Fetching associative array
                $pasien = new Pasien(); 
                $pasien->setId($row['id']);
                $pasien->setNik($row['nik']);
                $pasien->setNama($row['nama']);
                $pasien->setTempat($row['tempat']);
                $pasien->setTl($row['tl']);
                $pasien->setGender($row['gender']);
                $pasien->setEmail($row['email']);
                $pasien->setNotelp($row['telp']);
                $this->data[] = $pasien; 
                return $pasien;
            }
            $this->tabelpasien->close();
    
        } catch (Exception $e) {
            echo "wiw error part 2" . $e->getMessage();
        }
    }
    
    function getId($i)
    {
        return $this->data[$i]->getId();
    }

    function getNik($i)
    {
        return $this->data[$i]->getNik();
    }

    function getNama($i)
    {
        return $this->data[$i]->getNama();
    }

    function getTempat($i)
    {
        return $this->data[$i]->getTempat();
    }

    function getTl($i)
    {
        return $this->data[$i]->getTl();
    }

    function getGender($i)
    {
        return $this->data[$i]->getGender();
    }

    function getEmail($i)
    {
        return $this->data[$i]->getEmail();
    }

    function getNoTelp($i)
    {
        return $this->data[$i]->getNoTelp();
    }

    function getSize()
    {
        return sizeof($this->data);
    }

    function addPatient($data){
        try {
            $this->tabelpasien->open();
            if($this->tabelpasien->addPasien($data)>0){
                $result = true;
            }else{
                $result = false;
            }
            $this->tabelpasien->close();
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function editPatient($data){
        try {
            $this->tabelpasien->open();
            if($this->tabelpasien->editPasien($data)>0){
                $result = true;
            }else{
                $result = false;
            }
            $this->tabelpasien->close();
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }    

    function deletePatient($id){
        try {
            $this->tabelpasien->open();
            if($this->tabelpasien->deletePasien($id)>0){
                $result = true;
            }else{
                $result = false;
            }
            $this->tabelpasien->close();
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
