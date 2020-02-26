  <?php 

    // koneksi ke database
    $dbh='localhost';
    $dbus='root';
    $dbn='phpdasar';
    $dbp='';
    
    $conn = mysqli_connect($dbh, $dbus, $dbp, $dbn);
    

    function query($a){

        global $conn;
        $result = mysqli_query($conn, $a);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row; 
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        // htmlspecialchars untuk membaca baris html yang menganggu
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        ///uploud gambar
        $gambar = uploud();
        if( !$gambar){
            return false;
        } 

        $query = "INSERT INTO mahasiswa
                    VALUES
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                ";
                mysqli_query($conn, $query);

                return mysqli_affected_rows($conn);

    }

    function uploud(){
        
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //cek apakah ada gambar yg di upploud
        if($error === 4){
            echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
            return false;
        }

        //cek yang di uploud gambar atau apa
        $extensiGambarValid = ['jpg', 'jpeg', 'png'];
        $extensiGambar = explode('.',$namaFile );
        $extensiGambar= strtolower(end($extensiGambar));
        if( !in_array($extensiGambar, $extensiGambarValid)){
            echo "<script>
            alert('yang anda uploud bukan gambar');
        </script>";
        return false;

        }
        //cek ukuran file maksimal 1 mega
        if($ukuranFile > 1000000){
            echo "<script>
            alert('ukuran gambar gambar terlalu besar');
        </script>";
        return false;
        }
        //lolos pengecekan , gambar siap di uploud
        //generate nama foto baru
        $namaFileBaru = uniqid();
        $namaFileBaru.='.';
        $namaFileBaru.=$extensiGambar;
       
// die($namaFileBaru);
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;

    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;
        // htmlspecialchars untuk membaca baris html yang menganggu
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        //cek apakah usek memilih gambar baru atau tidak
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        }else{
            $gambar = uploud();
        }
        $gambar =htmlspecialchars($gambar);  

        $query = "UPDATE mahasiswa SET
                    nama = '$nama',
                    nrp = '$nrp',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                    WHERE id = $id
         ";
                mysqli_query($conn, $query);

                return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query="SELECT* FROM mahasiswa 
            WHERE
        nama LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%' OR
        email LIKE '%$keyword%'
        -- //%persen ini digunakan untuk mencari sesuatu secara flexsible
        ";
        return query($query);
    }
?> 