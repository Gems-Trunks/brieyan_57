<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
   <div class="judul1">Perpustakaan</div>
   <div class="judul2">Berkah Jaya Lestari</div>
   <hr />
   <div class="judul2" style="margin-bottom:5px">Kartu Anggota</div>

   <table class="tabelini">
      <tr>
         <td style="width:65px">Nama</td>
         <td class="titik">:</td>
         <td>{{ $anggota->nama }}</td>
      </tr>
      <tr>
         <td>No Anggota</td>
         <td>:</td>
         <td>{{ $anggota->id_anggota }}</td>
      </tr>
      <tr>
         <td>Jenis Kelamin</td>
         <td>:</td>
         <td>{{ $anggota->jenis_kelamin }}</td>
      </tr>
      <tr>
         <td>Pekerjaan</td>
         <td>:</td>
         <td>{{ $anggota->pekerjaan }}</td>
      </tr>
      <tr>
         <td>Tanggal Daftar</td>
         <td>:</td>
         <td>{{ $anggota->tanggal_daftar }}</td>
      </tr>
      <tr>
         <td>Berlaku Hingga</td>
         <td>:</td>
         <td>{{ $anggota->berlaku_hingga }}</td>
      </tr>
   </table>

   <br>
   <tr>
      <td></td>
      <td></td>
      <td style="text-align:center">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala
         Perpustakaan
         <br /><br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Akhmad
         Pahdi
      </td>
   </tr>

</body>

<style>
   @media print {
      @page {
         size: 85mm 54mm;
         margin-top: 1mm;
         margin-bottom: 1mm;
         margin-left: 3mm;
         margin-right: 3mm;
      }

      body {
         margin: 0;
         font-family: 'calibri';
         font-size: 10px;
         print-color-adjust: exact;
      }

      .text-center {
         text-align: center;
      }

      .judul2 {
         font-weight: bold;
         font-size: 12px;
      }

      .tabelini {
         width: 100%;
         font-size: 9px;
      }

      .titik {
         width: 5px;
         text-align: left;
      }
   }
</style>
<script>
   function closeWindow() {
      window.close();
   }
</script>