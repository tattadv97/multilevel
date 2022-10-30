<?php

include "globalFunction/globalSessionStart.php";
include "globalFunction/globalDbConnection.php";

//login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cekuser = mysqli_query($conn,"select * from login where email='$email' and password='$password'");

    $hitung = mysqli_num_rows($cekuser);

    if($hitung>0){
        //kalau ada data
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = strtolower($ambildatarole['role']);

        $_SESSION['email'] = $ambildatarole['email'];
        $_SESSION['role']  = $role;
        $_SESSION['log']   = 'logged';

        if($role === 'admin'){

            //kalau admin
            header('location:user/');

        }elseif($role === 'user'){

            //kalau user
            header('location:admin/');

        }else{

            session_destroy();
            return header("location:./");

        }

    }else{

        session_destroy();
        return header("location:./");
    }
};

//Menambah Document Masuk
if(isset($_POST['masuk'])){

    if(!isset($_FILES['fileInput'])){

        return print("File Kosong");

    }

    $id_cif          = $_POST['id_cif'];
    $id_ld           = $_POST['id_ld'];
    $nama_nasabah    = $_POST['nama_nasabah'];
    $jenis_kelamin   = $_POST['jenis_kelamin'];
    $lemari_document = $_POST['lemari_document'];
    $jangka_agunan   = $_POST['jangka_agunan'];
    $jangka_selesai  = $_POST['jangka_selesai'];
    $deskripsi       = $_POST['deskripsi'];
    $pekerjaan       = $_POST['pekerjaan'];
    $telp            = $_POST['telp'];
    $email           = $_POST['email'];
    $alamat          = $_POST['alamat'];
    $marketing       = $_POST['marketing'];
    $status_agunan   = $_POST['status_agunan'];
    $fileInput       = $_FILES['fileInput'];
    $namaBaru        = 'attachmentFile_'.str_replace(' ',  '_', $nama_nasabah)."_".date("d-m-Y \_ H\.i\.s").".".pathinfo($fileInput['name'])['extension'];
    $tmpFileInput    = $fileInput['tmp_name'];

    $addtomasuk = mysqli_query($conn, 
        "insert into masuk (
            upload_document,
            id_cif, 
            id_ld, 
            nama_nasabah, 
            jenis_kelamin,
            lemari_document, 
            jangka_agunan, 
            jangka_selesai, 
            deskripsi, 
            pekerjaan, 
            telp, 
            email, 
            alamat, 
            status_agunan, 
            marketing,
            tanggal_masuk
        ) values(
            '$namaBaru', 
            '$id_cif', 
            '$id_ld', 
            '$nama_nasabah', 
            '$jenis_kelamin', 
            '$lemari_document', 
            '$jangka_agunan', 
            '$jangka_selesai', 
            '$deskripsi', 
            '$pekerjaan', 
            '$telp', 
            '$email', 
            '$alamat', 
            '$status_agunan', 
            '$marketing',
            '".date("Y-m-d")."'
        )
    ");

    if($addtomasuk){

        if(!move_uploaded_file($tmpFileInput, "user/filepdf/".$namaBaru)){

            return print('File Attachment PDF Gagal Di Upload');

        } 
            
        return header('location:user/masuk.php');

    } else{

        echo 'Gagal'.mysqli_error($conn);
        header('location:index.php');
    }

}


//Menambah Document keluar
if(isset($_POST['barangkeluar'])){

    $query = mysqli_query($conn, "SELECT id_cif, id_ld, nama_nasabah, marketing, tanggal_masuk, deskripsi FROM masuk WHERE id_masuk=BINARY('".$_POST['nama_nasabah']."') ");

        if(!$query){

            return print('gagal mengambil data');

        }else{

            $jumlah = mysqli_num_rows($query);

            if($jumlah <= 0){

                return print('Data Nasabah Tidak Di Temukan');

            }else{

                $data = mysqli_fetch_assoc($query);

                $id_cif = $data['id_cif'];
                $id_ld = $data['id_ld'];
                $nama_nasabah = $data['nama_nasabah'];
                $penerima = $_POST['penerima'];
                $status_agunan = $_POST['status_agunan'];

                $addtokeluar = mysqli_query($conn,"insert into keluar (id_cif, id_ld, nama_nasabah, penerima, status_agunan, tanggal_pinjam, marketing, keperluan, tanggal_keluar)
                values('$id_cif', '$id_ld', '$nama_nasabah', '$penerima', '$status_agunan', '".$data['tanggal_masuk']."', '".$data['marketing']."', '".$data['deskripsi']."', '".date('Y-m-d')."')");

                if($addtokeluar){
                    header('location:user/keluar.php');   
                } else{
                    echo 'Gagal';
                    header('location:index.php');
                }
            }
        }
}


//Peminjaman Document
if(isset($_POST['pinjam'])){

        $query = mysqli_query($conn, "SELECT id_cif, id_ld, nama_nasabah FROM masuk WHERE id_masuk=BINARY('".$_POST['nama_nasabah']."') ");

        if(!$query){

            return print('gagal mengambil data');

        }else{

            $jumlah = mysqli_num_rows($query);

            if($jumlah <= 0){

                return print('Data Nasabah Tidak Di Temukan');

            }else{

                $data = mysqli_fetch_assoc($query);
                $id_cif = $data['id_cif'];
                $id_ld = $data['id_ld'];
                $nama_nasabah = $data['nama_nasabah'];
                $keperluan = $_POST['keperluan'];
                $peminjam = $_POST['peminjam'];
                $status = $_POST['status'];

                $addtopinjam = mysqli_query($conn,"insert into pinjam (id_cif, id_ld, nama_nasabah, keperluan, peminjam, status, tanggal_pinjam)
                values('$id_cif', '$id_ld', '$nama_nasabah', '$keperluan', '$peminjam', '$status', '".date('Y-m-d')."')");

                if($addtopinjam){
                    header('location:user/peminjaman.php');   
                } else{
                    echo 'Gagal';
                    header('location:index.php');
                }

            }
        }

}


//Pengembalian Document
if(isset($_POST['kembali'])){
    
    $query = mysqli_query($conn, "SELECT id_cif, id_ld, nama_nasabah FROM masuk WHERE id_masuk=BINARY('".$_POST['nama_nasabah']."') ");

    if(!$query){

        return print('gagal mengambil data');

    }else{

        $jumlah = mysqli_num_rows($query);

        if($jumlah <= 0){

            return print('Data Nasabah Tidak Di Temukan');

        }else{

            $data = mysqli_fetch_assoc($query);
            $id_cif = $data['id_cif'];
            $id_ld = $data['id_ld'];
            $nama_nasabah = $data['nama_nasabah'];
            $pengembalian = $_POST['pengembalian'];
            $status = $_POST['status'];

            $addtopengembalian = mysqli_query($conn,"insert into pengembalian (id_cif, id_ld, nama_nasabah, pengembalian, status, tanggal_kembali)
            values('$id_cif', '$id_ld', '$nama_nasabah', '$pengembalian', '$status', '".date('Y-m-d')."')");

            if($addtopengembalian){
                header('location:user/pengembalian.php');   
            } else{
                echo 'Gagal';
                header('location:index.php');
            }

        }
    }


}


//Menambah Data Marketing
if(isset($_POST['addmarketing'])){
    $npk = $_POST['npk'];
    $nama_marketing = $_POST['nama_marketing'];
    $divisi = $_POST['divisi'];
    $email_mar = $_POST['email_mar'];
    $telp_mar = $_POST['telp_mar'];

    $addtomarketing = mysqli_query($conn,"insert into marketing (npk, nama_marketing, divisi, email_mar, telp_mar)
    values('$npk', '$nama_marketing', '$divisi', '$email_mar', '$telp_mar')");

    if($addtomarketing){
        header('location:admin/');
    }else{
        echo 'Gagal';
        header('location:admin/tambahdocument.php');
    }
}

//Update Data Marketing
if(isset($_POST['updatemarketing'])){
    $id_mar = $_POST['id_mar'];
    $npk = $_POST['npk'];
    $nama_marketing = $_POST['nama_marketing'];
    $divisi = $_POST['divisi'];
    $email_mar = $_POST['email_mar'];
    $telp_mar = $_POST['telp_mar'];

    $update = mysqli_query($conn,"update marketing set npk='$npk', nama_marketing='$nama_marketing', divisi='$divisi', email_mar='$email_mar', telp_mar='$telp_mar' where id_mar='$id_mar'");

    if($update){
        header('location:admin/');
    }else{
        echo 'Gagal';
         header('location:admin/masuk.php');
    }
}

//Hapus Data Marketing
if(isset($_POST['deletemarketing'])){
    $id_mar = $_POST['id_mar'];

    $delete = mysqli_query($conn,"delete from marketing where id_mar='$id_mar'");

    if($delete){
        header('location:admin/');
    }else{
        echo 'Gagal';
         header('location:admin/masuk.php');
    }
}

//Update Document Masuk
if(isset($_POST['updatemasuk'])){
    $id_masuk = $_POST['id_masuk'];
    $status_agunan = $_POST['status_agunan'];
    $marketing = $_POST['marketing'];

    $updatedocumentmasuk = mysqli_query($conn,"update masuk set status_agunan='$status_agunan', marketing='$marketing' where id_masuk='$id_masuk'");

    if($updatedocumentmasuk){

        $fileInput       = $_FILES['fileInput'];
        $namaBaru        = $_POST['namaLama'];
        $tmpFileInput    = $fileInput['tmp_name'];

        
        if(!move_uploaded_file($tmpFileInput, "user/filepdf/".$namaBaru)){

            return print('File Attachment PDF Gagal Di Upload');

        } 

        header('location:user/masuk.php');
    }else{
        echo 'Gagal';
        header('location:user/keluar.php');
    }
}

//Delete Document Masuk
if(isset($_POST['deletemasuk'])){
    $id_masuk = $_POST['id_masuk'];

    $deletedocumentmasuk = mysqli_query($conn,"delete from masuk where id_masuk='$id_masuk'");

    if($deletedocumentmasuk){
         header('location:user/masuk.php');
    }else{
        echo 'Gagal';
        header('location:user/keluar.php');
    }
}


//Update Document Keluar
if(isset($_POST['updatekeluar'])){
    $id_keluar = $_POST['id_keluar'];
    $status_agunan = $_POST['status_agunan'];
    $keperluan = $_POST['keperluan'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $marketing = $_POST['marketing'];

    $updatedocumentkeluar = mysqli_query($conn,"update keluar set status_agunan='$status_agunan', keperluan='$keperluan', tanggal_pinjam='$tanggal_pinjam', marketing='$marketing' where id_keluar='$id_keluar'");

    if($updatedocumentkeluar){
        header('location:user/keluar.php');
    }else{
        echo 'Gagal';
         header('location:user/masuk.php');
    }
}


//Delete Document Keluar
if(isset($_POST['deletekeluar'])){
    $id_keluar = $_POST['id_keluar'];

    $deletedocumentkeluar = mysqli_query($conn,"delete from keluar where id_keluar='$id_keluar'");

    if($deletedocumentkeluar){
        header('location:user/keluar.php');
    }else{
        echo 'Gagal';
         header('location:user/masuk.php');
    }
}

if(isset($_POST['dcDownload'],  $_POST['selDoc'], $_POST['std'], $_POST['edd'])){

    $keyPostData = array_keys($_POST);
    $countOfPost = count($keyPostData);

   for($i = 0; $i < $countOfPost; $i++){

        $indexPost = $keyPostData[$i];

        if(preg_match('/^\s*$/', $_POST[$indexPost])){

            return exit('<script> alert("'.$indexPost.' Kosong"); window.history.go(-1); </script>');

        }
   }

        switch($_POST['selDoc']){
            case 'doc-in' :
                $tbls  = 'masuk';
                $clTgl = 'tanggal_masuk';
                $id    = 'id_masuk';
            break;
                
            case 'doc-out' :
                $tbls  = 'keluar';
                $clTgl = 'tanggal_keluar';
                $id    = 'id_keluar';
            break;

            case 'rent-in' :
                $tbls  = 'pengembalian';
                $clTgl = 'tanggal_kembali';
                $id    = 'id_kembali';
            break;

            case 'rent-out' :
                $tbls  = 'pinjam';
                $clTgl = 'tanggal_pinjam';
                $id    = 'id_pinjam';
            break;

            default :
                return exit('<script> alert("'.$indexPost.' Please Select Right Document !"); window.history.go(-1); </script>');
        }

        $filterStd = date('Y-m-d', strtotime($_POST['std']));
        $filterEdd = date('Y-m-d', strtotime($_POST['edd']));

        $query = mysqli_query($conn, "SELECT * FROM $tbls WHERE $clTgl >= '".$filterStd."' AND $clTgl <= '".$filterEdd."'  ");

        if(!$query){

            return exit('<script> alert("'.$indexPost.' Error Fetching Data to database !'.mysqli_error($conn).'"); window.history.go(-1); </script>');

        }

        $amountTotalRow = mysqli_num_rows($query);
        
        if($amountTotalRow <= 0){

            return exit('<script> alert("Sorry We couldn,t find nothing any data with you range entered"); window.history.go(-1); </script>');

        }else{  

            $limitLoop = 0;
            $table     = '
                <h2 style="text-align:center;margin:15px;font-size:14px;">
                    Rekapitulasi Dokumen '.strtoupper($tbls).'</br>
                </h2>
                <h4 align="center">Rentang Tanggal '.$filterStd.' Hingga '.$filterEdd.'</h4>
                <table border="1" cellspacing="0" cellpadding="5" style="white-space:nowrap;vertical-align:middle;margin:auto;border-collapse: collapse;border-spacing: 0;font-size:8px;">
            ';
            $value     = [];

                while($resultData = mysqli_fetch_assoc($query)){

                    if($limitLoop <= 0){

                        $table .= '<tr style="text-align:center;font-weight:bold;">';
                        
                            foreach($resultData as $index => $resultIdx){
                                
                                if($index !== $id && $index !== 'upload_document'){

                                    $table .= '<td style="padding:12px 6px;">'.strtoupper(str_replace("_", " ", $index))."</td>";
                                }
                                
                            }
                            
                        $table  .= '</tr>';

                        $limitLoop = 1;
                    }
                    
                    $value[] = $resultData; 
                }

                for($i2 = 0; $i2  < count($value); $i2++){

                    $table .= '<tr>';

                        foreach($value[$i2] as $vaIndex => $resultVal){

                            if($vaIndex !== $id && $vaIndex !== 'upload_document'){

                                $table .= '<td>'.$resultVal.'</td>';

                            }

                        }

                    $table .= '</tr>';

                }

            $table .= '</table>';

            include "plugin/TCPDF/tcpdf.php";

            $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', TRUE);
            $pdf->addPage();
            $pdf->setAutoPageBreak(true);
            $pdf->writeHTML($table, true, false, true, false, false);
            $pdf->output('Rekapitulasi_Dokumen_'.$tbls.'_'.$filterStd.'_Hingga_'.$filterEdd.'.pdf', 'I');
        }

   }



?>