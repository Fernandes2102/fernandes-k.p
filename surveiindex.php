<!DOCTYPE html>
<html>
<head><title>Form Survei</title></head>
<body>
    <h2>Form Survei</h2>
    <form action="surveisimpan.php" method="post">
        Nama: <input type="text" name="nama" required><br>
        Pilihan:
        <select name="pilihan">
            <option value="A">Pilihan A</option>
            <option value="B">Pilihan B</option>
            <option value="C">Pilihan C</option>
        </select><br>
        <input type="submit" value="Kirim">
    </form>
</body>
</html>
