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
    <table  border="20px" width='100%'  align="center" cellspacing='0px'>
      <tr>
        <td width='10px' class='gambar' rowspan="3">
          {{-- {{ url('user/assets/images/logo/logo.png') }} --}}
          <img src="{{ url('frontend/images/assets/poltekba.png') }}" alt="" width="90px" height="90px">
        </td>
        <td>
          <font size='2' style="font-weight: bold;">NO KODE</font>
        </td>
        <td width='40%'>
          <font size='2' style="font-weight: bold;">FRM/PSTE/08.44.22</font>
        </td>
      </tr>
      <tr>
        <td>
          <font size='2' style="font-weight: bold;">BERLAKU</font>
        </td>
        <td width='40%'>
          <font size='2' style="font-weight: bold;">29 JULI 2013</font>
        </td>
      </tr>
      <tr>
        <td>
          <font size='2' style="font-weight: bold;">NO REVISI</font>
        </td>
        <td width='40%'>
          <font size='2' style="font-weight: bold;">2</font>
        </td>
      </tr>
        
    </table>
    <table  width='100%'  align="center"> 
      <tr>
        <td width='20%'>Nama Peminjam</td>
        <td width='4px'>:</td>
        <td>{{ $transaction->name }}</td>
      </tr>
      <tr>
        <td width='20%'>NIM</td>
        <td width='4px'>:</td>
        <td>{{ $transaction->nim }}</td>
      <tr>
      <tr>
        <td width='20%'>Kelas</td>
        <td width='4px'>:</td>
        <td>{{ $transaction->kelas }}</td>
      <tr>
      <tr>
        <td width='20%'>Mata Kuliah</td>
        <td width='4px'>:</td>
        <td>{{ $transaction->studies->matakuliah }}</td>
      <tr>
      <tr>
        <td width='20%'>Pertemuan ke</td>
        <td width='4px'>:</td>
        <td>{{ $transaction->pertemuan_ke }}</td>
      <tr>
      <tr>
        <td width='20%'>Keperluan Alat</td>
        <td width='4px'>:</td>
        <td>{{ $transaction->keperluan }}</td>
        
  
    </table>

    <table class='table-info' width='100%' border="10px" cellpadding='10px' cellspacing='0px'>
      <thead>
        <tr>
          <th class="thead">No</th>
          <th class="thead">Nama Alat & Bahan</th>
          <th class="thead">Tanggal Meminjam <br>Barang</th>
          <th class="thead">Jumlah</th>
          <th class="thead">Satuan</th>
          <th class="thead">Status</th>
          <th class="thead">Tempat <br> Laboratorium</th>
          <th class="thead">Keterangan</th>
        </tr>
      </thead>
      @php
      $nomor = 1;
      @endphp
      <tbody>
        {{-- @forelse ( $items as $item) --}}
        @forelse ($data as $item)
        {{-- @foreach ($transaction as $items) --}}
            
        <tr>
          <td>{{ $nomor++ }}</td>
          <td align="center">{{ $item->inventory->nama }}</td>
          <td align="center">{{ date('d/n/Y', strtotime($item->created_at)) }}</td>
          <td align="center">{{ $item->total}}</td>
          <td align="center">{{ $item->inventory->satuan }}</td>
          <td align="center" >{{ $transaction->status }}</td>
          <td align="center" >{{ $transaction->labs->name }}</td>
          {{-- <td align="center">{{ $items->studies->matakuliah }}</td> --}}
          
          <td>&nbsp;</td>
        </tr>
        @empty
        <tr>
          <td colspan="8" class="text-center" value="language"></td>
        </tr>
        @endforelse

      </tbody>

    </table>
    <table  width='100%'  align="center"> 
      <tr>
        <td width='30%'>Tanggal Peminjaman</td>
        <td width='4px'>:</td>
        <td>{{ date('d F Y  / h:i:s A', strtotime($transaction->created_at)) }}</td>
      </tr>
      <tr>
        <td width='30%'>Tanggal Pengembalian</td>
        <td width='4px'>:</td>
        <td></td>
      <tr>
      <tr>
        <td width='30%'>Catatan Peminjaman</td>
        <td width='4px'>:</td>
        <td></td>
      <tr>

  
    </table>
    
    <table border="1px" class="" width='100%'>
      <tr>
        <td height="50px" colspan="2">
          
        </td>
      </tr>
      <tr class="ttd" align="center">
        <td width='50%'>
            PLP/Teknisi Laboratorium,<br>

        </td>
        <td width='50%'>
          Nama Peminjam<br>
        </td>
      </tr>
      <tr class="ttd" align="center">
        <td colspan="3" height='70px'>
        </td>
      </tr>
      <tr class="ttd" align="center">
        <td >
          @if (Auth::user()->roles_id == 2)
          {{ Auth::user()->name }}<br>
          NIP. {{ Auth::user()->nip }}
          @else
          ..........................................<br>
          NIP ....................................
          @endif
        </td>

        <td>
            {{ $transaction->name }}<br>
            NIM. {{ $transaction->nim }}
        </td>
      </tr>
    </table>


  </section>
  
<script src{{ url('frontend/scripts/script.js') }}></script>  
</body>
</html>
