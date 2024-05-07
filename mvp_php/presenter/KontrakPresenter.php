<?php


interface KontrakPresenter
{
    public function prosesDataPasien();
    public function getPatientbyId($id);

    public function getId($i);
    public function getNik($i);
    public function getNama($i);
    public function getTempat($i);
    public function getTl($i);
    public function getGender($i);
    public function getEmail($i); 
    public function getNoTelp($i); 
    public function getSize();

    public function addPatient($data);
    public function editPatient($data);
    public function deletePatient($id);
}
