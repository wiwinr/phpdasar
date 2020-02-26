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
        $gambar = htmlspecialchars($data["gambar"]);  

        $query = "INSERT INTO mahasiswa
                    VALUES
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                ";
                mysqli_query($conn, $query);

                return mysqli_affected_rows($conn);

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
        $gambar = htmlspecialchars($data["gambar"]);  

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