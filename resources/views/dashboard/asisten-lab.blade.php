<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presensi Asisten</title>

    {{-- my css start --}}
    <link rel="stylesheet" href="css/dashboard.css">
    {{-- my css end --}}

    {{-- fonts start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    {{-- fonts end --}}

    {{-- icons start --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- icons end --}}

</head>
<body>
    <header class="header">
        <a href="#" class="logo">Hadir </a>

        {{-- <label for="" class="icons"></label>
            <i class="bx bx-menu"></i> --}}
@csrf
            
        <nav class="navbar">
            <a href="/dashboard">Beranda</a>
            <a href="/dashboard/asisten-lab">Present Asisten Lab</a>
            <a href="#">Preset Calas</a>
            <a href=""><i class='bx bx-user'><span>admin</span></i></a>
        </nav>
    </header>

    <div class="table-1">
        <h1>Data Asisten Lab</h1>
    </div>
</body> 
</html>