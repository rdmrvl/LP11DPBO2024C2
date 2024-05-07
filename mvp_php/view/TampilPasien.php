<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; 
	private $tpl;

	function __construct()
	{
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
{

    if(isset($_POST['add'])){
        $result = $this->prosespasien->addPatient($_POST);
        if($result) {
            echo "<script>alert('Added Succesful');</script>"; 
        }
      } else if(isset($_POST['edit'])){
        $result = $this->prosespasien->editPatient($_POST); 
        if($result) {
          echo "<script>alert('Edit Succesful');</script>"; 
        }
    } else if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $result = $this->prosespasien->deletePatient($id); 
        if($result) {
          echo "<script>alert('Delete Succesful');</script>"; 
        }
    }

    $this->prosespasien->prosesDataPasien();
    $data = null;
    for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
        $no = $i + 1;
        $data .= "<tr>
        <td>" . $no . "</td>
        <td>" . $this->prosespasien->getNik($i) . "</td>
        <td>" . $this->prosespasien->getNama($i) . "</td>
        <td>" . $this->prosespasien->getTempat($i) . "</td>
        <td>" . $this->prosespasien->getTl($i) . "</td>
        <td>" . $this->prosespasien->getGender($i) . "</td>
        <td>" . $this->prosespasien->getEmail($i) . "</td>
        <td>" . $this->prosespasien->getNoTelp($i) . "</td>
        <td><a href='index.php?edit=" . $this->prosespasien->getId($i) . "'>Edit</a> | <a href='index.php?delete=" . $this->prosespasien->getId($i) . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
        </tr>";
        
    }
    $this->tpl = new Template("templates/skin.html");
    $this->tpl->replace("DATA_TABEL", $data);
    $this->tpl->write();
}

function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'nik' => $_POST['nik'],
                'nama' => $_POST['nama'],
                'tempat' => $_POST['tempat'],
                'tl' => $_POST['tl'],
                'gender' => $_POST['gender'],
                'email' => $_POST['email'],
                'telp' => $_POST['telp']
            ];

            if ($this->prosespasien->addPatient($data)) {
                echo "<div class='alert alert-success' role='alert'>Add Success!</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Failed to Add!</div>";
            }
        }

        $data = '
        <form action="index.php" method="post" style="margin: 0 auto; max-width: 400px; border: 1px solid #ccc; padding: 20px; text-align: center;">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Enter NIK" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" required>
        </div>
        <div class="form-group">
            <label for="tempat">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Enter Tempat Lahir" required>
        </div>
        <div class="form-group">
            <label for="tl">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tl" name="tl" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <label for="telp">telp</label>
            <input type="tel" class="form-control" id="telp" name="telp" placeholder="Enter telp" required>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
    </form>';
    
    $this->tpl = new Template("templates/form.html");
    $this->tpl->replace("DATA_FORM", $data);
    $this->tpl->write();
}

function edit($id)
{
    $patient = $this->prosespasien->getPatientById($id);

    if (!$patient) {
        echo "<div class='alert alert-danger' role='alert'>Patient not found!</div>";
        return;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = [
            'id' => $id,
            'nik' => $_POST['nik'],
            'nama' => $_POST['nama'],
            'tempat' => $_POST['tempat'],
            'tl' => $_POST['tl'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'telp' => $_POST['telp']
        ];

        if ($result = $this->prosespasien->editPatient($data)) {
            echo "<div class='alert alert-success' role='alert'>Edit Success!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Failed to Edit!</div>";
        }
    }

    $data = '
<form action="index.php" method="post" style="margin: 0 auto; max-width: 400px; border: 1px solid #ccc; padding: 20px; text-align: center;">
<div class="form-group">
    <label for="nik">NIK</label>
    <input type="text" class="form-control" id="nik" name="nik" placeholder="Enter NIK" value="' . $patient->getNik() . '" required>
</div>
<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" value="' . $patient->getNama() . '" required>
</div>
<div class="form-group">
    <label for="tempat">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Enter Tempat Lahir" value="' . $patient->getTempat() . '" required>
</div>
<div class="form-group">
    <label for="tl">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tl" name="tl" value="' . $patient->getTl() . '" required>
</div>
<div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender" required>
        <option value="" disabled>Select Gender</option>
        <option value="Laki-laki" ' . ($patient->getGender() == 'Laki-laki' ? 'selected' : '') . '>Laki-laki</option>
        <option value="Perempuan" ' . ($patient->getGender() == 'Perempuan' ? 'selected' : '') . '>Perempuan</option>
    </select>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="' . $patient->getEmail() . '" required>
</div>
<div class="form-group">
    <label for="telp">Telpon</label>
    <input type="tel" class="form-control" id="telp" name="telp" placeholder="Enter telp" value="' . $patient->getNoTelp() . '" required>
</div>
<input type="hidden" name="id" value="' . $id . '">
<button type="submit" name="edit" class="btn btn-primary">Submit</button>
</form>
';

    $this->tpl = new Template("templates/form.html");
    $this->tpl->replace("DATA_FORM", $data);
    $this->tpl->write();
}

}
