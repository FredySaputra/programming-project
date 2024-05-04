<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>

    {{-- css style start--}}
    <link rel="stylesheet" href="css/registrasi.css">
    {{-- css style end --}}
    
    {{-- font style start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    {{-- font style end --}}

    {{-- my icon start --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- my icon start end --}}

<body>
    <div class="wrapper">
        <form action="/registuser" method="post">
            @csrf
            <h1>Registrasi Anggota</h1>
            <div class="input-box">
                <input type="text" placeholder="NIM" name="nim" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Nama" name="nama" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Jabatan" name="jabatan" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Nomor Telepon" name="nomortelepon" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class='bx bxs-user'></i>
            </div>
            <button type="submit" class="btn">Daftar</button>
        </form>
    </div>
</body>
</html>