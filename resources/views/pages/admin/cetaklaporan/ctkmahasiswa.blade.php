<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ url('user/dist/assets/vendors/bootstrap-icons/bootstrpap-icons.css') }}">
  <title>Data Barang</title>
  <link rel="stylesheet" href="{{ url('frontend/styles/style.css') }}">

  {{-- <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon"> --}}
  {{-- <link rel="stylesheet" href="{{ url('user/dist/assets/css/bootstrap.css') }}"> --}}

</head>
<body>
  <section class="kop-surat" id="kopSurat">
    <table  width='100%'  align="center">
      <tr>
        <td width='10px' class='gambar'>
          {{-- {{ url('user/assets/images/logo/logo.png') }} --}}
          <img src="{{ url('frontend/images/assets/poltekba.png') }}" alt="" width="100px" >
        </td>
        <td class="">
          <p style="font-size: 14px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN</p>
          <p style="font-size: 14px;">RISET, DAN TEKNOLOGI</p>
          <p style="font-size: 14px;">POLITEKNIK NEGERI BALIPAPAN</p>
          <p style="font-weight: bold;font-size: 14px;">JURUSAN TEKNIK ELEKTRO</p>
          <p style="font-size: 12px;">Jl Soekarno Hatta Km. 8 Balikpapan 761129</p>
          <p style="font-size: 12px;">Telp. (0542) 860895, 862305 Fax. 861107</p>
          <p style="font-size: 12px;">Email: admin@poltkeba.ac.id Web:http://www.poltkeba.ac.id</p>
        </td>
      </tr> 
      <tr>
        <td colspan="2">
          <hr style="color: black;">
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="judul">
          <h4>
          DAFTAR MAHASISWA JURUSAN TEKNIK ELEKTRO
          </h4>
        </td>
      </tr>
      <tr>
        @php
            // date_default_timezone_set('Asia/Makassar');
            $getTime = date("j F Y");
        @endphp
        
        <td colspan="2">
          Periode : {{ $getTime }}
        </td>
      </tr>
    </table>

    <table class='table-info' width='100%' border="1px" cellpadding='0px' cellspacing='0px'>
      <thead>
        <tr>
          <th class="thead">No</th>
          <th class="thead">Nama Mahasiswa</th>
          <th class="thead">Kelas</th>
          <th class="thead">Nim</th>
          <th class="thead">Prodi</th>
          <th class="thead">Keterangan</th>
        </tr>
      </thead>
      @php
      $nomor = 1;
      @endphp
      <tbody>
        {{-- @forelse ( $items as $item) --}}
        @forelse ($data as $item)
        <tr>
          <td>{{ $nomor++ }}</td>
          <td align="left">{{ $item->nama_mhs }}</td>
          <td align="center">{{ $item->kelas }}</td>
          <td align="center">{{ $item->nim }}</td>
          <td align="center">{{ $item->prodi }}</td>
          <td>&nbsp;</td>
        </tr>
        @empty
        <tr>
          <td colspan="8" class="text-center" value="language"></td>
        </tr>
        @endforelse

      </tbody>

    </table>
    



  </section>
  
<script src{{ url('frontend/scripts/script.js') }}></script>  
</body>
</html>