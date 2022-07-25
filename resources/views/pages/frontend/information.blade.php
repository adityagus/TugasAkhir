@extends('layouts.main')

@section('title')
    Sistem Informasi Peminjaman - Elektro
@endsection

@section('content')



  <div id="main-content">

    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Informasi Sistem Peminjaman</h3>
            <p class="text-subtitle text-muted">Halaman Informasi Peminjaman Alat dan Bahan</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Informasi</h4>
          </div>
          <div class="card-body">
             {{-- content --}}
             <div class="card-body">
              <!-- pemesanan -->
              <div class="row">
                  <div class="col">
                      <h4>Memesan alat dan bahan</h4>
                      <ul>
                          <li>
                              Setelah anda berhasil masuk ke aplikasi, anda akan diarahkan ke halaman utama, dimana ada menu peminjaman, lalu tekan menu peminjaman.
                          </li>
                          <li>
                              Apabila anda diarahkan ke halaman peminjaman, terdapat alat dan bahan yang tersedia di jurusan bisa menekan tombol detail untuk melihat detail dari barang tersebut.
                          </li>
                          <li>
                            jika ingin meminjam alat maka pengguna dapat memilih add to cart untuk memasuk alat dan bahan ke dalam keranjang peminjaman 
                          </li>
                          <li>
                              Setelah anda memilih tenan, anda akan diarahkan ke halaman daftar menu yang disediakan oleh tenan tersebut.
                          </li>
                          <li>
                              Di halaman menu anda dapat memilih menu yang anda inginkan, jika anda menginginkan tambahan toping anda bisa mencentang toping yang disediakan.
                          </li>
                          <li>
                              Jika sekiranya anda mengalami kesulitan untuk memilih menu yang anda inginkan anda dapat melakukan pencarian menu dengan menekan <i class="fas fa-search"></i> yang berada di atas layar anda.
                          </li>
                          <li>
                              Untuk memeriksa menu apa saja yang anda inginkan anda dapat menekan tombol <i class="fas fa-shopping-cart"></i> yang berada di kanan atas.
                          </li>
                          <li>
                              Harga total tertera pada bagian bawah.
                          </li>
                          <li>
                              Apabila dirasa menu yang anda pesan sudah sesuai, silahkan tekan tombol <i class="fas fa-shopping-cart"></i> yang ada di kanan bawah untuk melakukan checkout pada pesanan anda.
                          </li>
                          <li>
                              Pesanan anda sudah masuk ke dalam antrian.
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- checkout -->
              <div class="row">
                  <div class="col">
                      <h4>Checkout menu</h4>
                      <ul>
                          <li>
                              Setelah anda menyelesaikan pemilihan menu, anda akan diarahkan ke halaman checkout menu
                          </li>
                          <li>
                              Sebelum menekan tombol <button class="btn btn-info">Pesan Sekarang</button> periksa kembali pesanan anda, dan pastikan pesanan anda sudah sesuai begitu juga dengan total pembayarannya dan waktu perkiraan.
                          </li>
                          <li>
                              Tambahkan catata pada kolom catatan jika terdapat permintaan khusus yang belum dicakup sebelumnya.
                          </li>
                          <li>
                              Jika dirasa semuanya sudah sesuai, silahkan tekan tombol <button class="btn btn-info">Pesan Sekarang</button> untuk melakukan pemesanan.
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- status pesanan -->
              <div class="row">
                  <div class="col">
                      <h4>Ruang Tunggu (Halaman Antrean)</h4>
                      <ul>
                          <li>
                              Setelah anda melakukan pemesanan, pesanan anda akan dikirim ke penjual di kantin.
                          </li>
                          <li>
                              Pada halaman ini anda dapat melihat
                              <ul>
                                  <li>
                                      Detail pesanan
                                  </li>
                                  <li>
                                      Status pesanan
                                  </li>
                                  <li>
                                      Notifikasi (dapat dilihat dengan menekan tombol <i class="fas fa-bell"></i> yang berada di kanan atas)
                                  </li>
                                  <li>
                                      Perkiraan waktu
                                  </li>
                                  <li>
                                      Membatalkan pesanan (dapat dilakukan jika pesanan belum diterima oleh penjual)
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- riwayat -->
              <div class="row">
                  <div class="col">
                      <h4>Riwayat Pesanan</h4>
                      <ul>
                          <li>
                              Semua pesanan yang anda lakukan akan tercatat pada riwayat pesanan anda.
                          </li>
                          <li>
                              Untuk melihat riwayat transaksi yang pernah anda lakukan, silahkan tekan tombol <i class="fas fa-bell"></i> pada menu di sebelah kiri layar anda.
                          </li>
                          <li>
                              Pilih filter berdasarkan status pesanan atau waktu awal dan akhir pesanan.
                          </li>
                          <li>
                              Pada halaman ini anda juga dapat memberikan penilaian pada menu yang anda pesan termasuk pelayanan yang diberikan oleh penjual kepada anda.
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- profil -->
              <div class="row">
                  <div class="col">
                      <h4>Profil</h4>
                      <ul>
                          <li>
                              Anda dapat melihat profil anda dengan menekan tombol <i class="fas fa-user"></i> yang berada menu di sebelah kiri layar anda.
                          </li>
                          <li>
                              Anda juga dapat mengubah data profil anda pada halaman ini, data yang dapat anda ubah antara lain:
                              <ul>
                                  <li>
                                      nama
                                  </li>
                                  <li>
                                      foto
                                  </li>
                                  <li>
                                      password
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- kritik saran -->
              <div class="row">
                  <div class="col">
                      <h4>Kritik dan Saran</h4>
                      <ul>
                          <li>
                              Jika anda memiliki kritik atau masukan yang ingin anda sampaikan kepada pihak pengelola kantin anda dapat memberikannya pada aplikasi ini.
                          </li>
                          <li>
                              Silahkan tekan tombol <i class="fas fa-comment-dots"></i> yang berada pada menu di sebelah kiri layar anda.
                          </li>
                          <li>
                              Tuliskan kritik dan saran anda.
                          </li>
                          <li>
                              Jika dirasa sudah, silahkan tekan tombol <button class="btn btn-primary">Kirim</button>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- informasi -->
              <div class="row">
                  <div class="col">
                      <h4>Informasi</h4>
                      <ul>
                          <li>
                              Jika anda mengalami kendala dalam mengoperasikan anda dapat melihat informasi yang dapat anda dapatkan melalui aplikasi ini, dengan cara menekan tombol <i class="fas fa-info"></i> yang berada pada menu di sebelah kiri layar anda.
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
             {{-- content --}}
             
          </div>

        </div>
      </section>
    </div>

    <footer>
      <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
          <p>2022 &copy; Teknik Elektro</p>
        </div>
      </div>
    </footer>
  </div>


@endsection
