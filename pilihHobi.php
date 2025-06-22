<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pilih Hobi</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
</head>

<body class="container mt-5">

    <h3 class="mb-4">Form Pemilihan Hobi</h3>

    <form action="simpan_hobi.php" method="post">
        <div class="mb-3">
            <label for="hobi" class="form-label">Pilih Hobi Anda:</label>
            <select class="form-select" name="hobi[]" id="hobi" multiple required>
                <option value="1">Menggambar</option>
                <option value="2">Coding</option>
                <option value="3">Membaca</option>
                <option value="4">Menari</option>
                <option value="5">Bermusik</option>
                <option value="6">Olahraga</option>
                <option value="7">Menulis</option>
                <option value="8">Bermain Game</option>
                <option value="9">Traveling</option>
                <option value="10">Memasak</option>
                <option value="11">Fotografi</option>
                <option value="12">Berbicara di depan umum</option>
                <option value="13">Membuat Kerajinan</option>
                <option value="14">Mengutak-atik Elektronik</option>
                <option value="15">Mengajar</option>
                <option value="16">Berdiskusi</option>
                <option value="17">Menganalisis</option>
                <option value="18">Desain Interior</option>
                <option value="19">Bertanam</option>
                <option value="20">Menonton Film</option>
            </select>
            <small class="text-muted">Gunakan Ctrl/Command untuk memilih lebih dari satu.</small>
        </div>

        <!-- Anggap user login, ID user disimpan di session -->
        <input type="hidden" name="id_pengguna" value="1">

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <script src="public/bootstrap/js/bootstrap.js"></script>
</body>

</html>