<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presensi Calas</title>
    <link rel="stylesheet" href="/css/login.css">

    {{-- google fonts start--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    {{-- google fonts end --}}

    {{-- icon start --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- icon end --}}
</head>
<body>
    <div class="wrapper">
    <h1>Presensi Kehadiran</h1>
        <form action="/logincalas" method="post">
            @csrf
            <div class="input-box">
                <input type="text" name="nim" @error ('username') is-invalid @enderror id="nim" placeholder="Masukan 10 digit NIM" autofocus required value="{{old('nim')}}">
                <i class='bx bxs-user'></i>
                <label for="nim">NIM</label>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Masukan password" required>
                <i class='bx bxs-lock-alt'></i>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>