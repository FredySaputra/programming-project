<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css" href="/dashboard/Calas">
    <title>Presensi Calas</title>
</head>

<body onload="initClock()">
@csrf
    <header>
        <h2 class="logo"><a  href='/dashboard'>ICT</a></h2>
        <nav>
            <ul class="nav_links">
                <li><a href="/dashboard/Asisten">Presensi Asisten</a></li>
                <li><a href="/dashboard/Calas">Presensi CALAS</a></li>
            </ul>
        </nav>
        <a href="a" class="cta"><button>Calas</button></a>
    </header>
    <main>
    <!-- <form action="/dashboard/Asisten" method="post"> -->
        <div class="digital_clock">
            <div class="datetime">
                <div class="date">
                    <span id="dayname">Day</span>
                    <span id="month">Month</span>
                    <span id="daynum">00</span>
                    <span id="year">Year</span>
                </div>
                <div class="time">
                    <span id="hour">00</span>:
                    <span id="minutes">00</span>:
                    <span id="seconds">00</span>
                    <span id="period">AM</span>
                </div>
            </div>
        </div>
        <div class="name_list">
            <div class="table">
                <section class="table_header">
                    <h1>Calas</h1>
                    <form action="/logcalas">
                            @csrf
                        <td><a href="/logcalas""><button  class="presensi" >Presensi</button></a></td>
                        </form>
                </section>
                <section class="table_body">
                    
                    <table>
                        <tr>
                            <th>Tanggal</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                        </tr>
                        @foreach ($presentcalas as $item)
                        <tr onclick="window.location='/formkeluar';" style="cursor: pointer;">
                            <td>{{$item->tgl}}</td>
                            <td>{{$item->nim}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jabatan}}</td>
                            <td>{{$item->jammasuk}}</td>
                            <td>{{$item->jamkeluar}}</td>
                        </tr>
                        @endforeach
                </table>
                     
                        
                      
                        <!-- </form> -->
                    
                </section>
            </div>
        </div>
        
    </main>

    <script type="text/javascript">
        function updateClock() {
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds()
                pe = "AM";

            Number.prototype.pad = function(digits) {
                for(var n = this.toString(); n.length < digits; n = 0 + n );
                return n;
            }

            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Desember"];
            var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr.pad(2), hou.pad(2), min.pad(2), sec.pad(2)];
            for(var i = 0; i < ids.length; i++)
            document.getElementById(ids[i]).firstChild.nodeValue = values[i];

        }

        function initClock() {
            updateClock();
            window.setInterval("updateClock()", 1)
        }
    </script>
</body>

</html>