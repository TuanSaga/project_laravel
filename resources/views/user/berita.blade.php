<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile KSI</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column h-100">
<nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/"> Politeknik Negeri Bengkalis | Keamanan Sistem Informasi </a>
        </div>
        <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-primary p-4">
    <a href="{{ route('user.berita') }}" class="navbar-brand">Berita KSI</a>
    <a href="{{ route('lulusan') }}" class="navbar-brand">Profile Lulusan KSI</a>
    <a href="{{ route('dosen') }}" class="navbar-brand">Profile Dosen</a>
    <a href="{{ route('user.home')}}" class="navbar-brand">Home</a>
  </div>
</div>
<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
    </nav>

        <div class="container mt-5">
            <section id="card">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                        // Hubungkan ke database
                        $koneksi = mysqli_connect("localhost", "root", "", "project_laravel");

                        // Periksa koneksi
                        if (!$koneksi) {
                            die("Koneksi database gagal: " . mysqli_connect_error());
                        }

                        // Query untuk mengambil data berita
                        $query = "SELECT * FROM berita";
                        $result = mysqli_query($koneksi, $query);

                        // Periksa apakah query berhasil
                        if (!$result) {
                            die("Query gagal: " . mysqli_error($koneksi));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row["judul"] . '</h5>
                                        <p class="card-text">' . $row["konten"] . '</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Diupload pada ' . $row["created_at"] . '</small>
                                    </div>
                                    
                                </div>
                            </div>';
                        }

                        mysqli_close($koneksi);
                        ?>
                    </div>
                </div>
            </section>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    </main>
</body>

</html>