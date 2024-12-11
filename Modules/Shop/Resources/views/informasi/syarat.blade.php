@extends('shop::layouts.app')
@if (@auth('customer')->user()->id)
@section('cart-count')
@if (@auth('customer')->user()->id)
<span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
    {{ $cartCount ?? 0 }}
</span>
@endif
@endsection
@section('content')
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-3 p-10">
        <span class="text-3xl font-bold">SYARAT & KETENTUAN</span>
        <div class="grid mt-10">
            <p>Persyaratan dan Ketentuan Layanan ini (“Term and Condition”) mencakup pembelian dan penggunaan
                produk dan layanan Anda (“Layanan”) yang tersedia melalui Situs Hastha Club. Situs Hastha Club
                dioperasikan oleh Hastha Club.</p>
            <p class="mt-2">Dengan mengakses atau menggunakan Layanan di Situs Hastha Club, atau membeli atau menggunakan
                    produk atau layanan melalui Situs Hastha Club, Anda mengakui dan setuju untuk terikat oleh persyaratan
                    ini (“Perjanjian”) sebagai berikut:</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Ikhtisar</span>
            <p class="mt-2">Ketentuan Layanan ini telah ditandatangani dan diberikan oleh Anda dan merupakan perjanjian yang sah
                dan mengikat antara Anda dan Hastha Club, yang dapat diberlakukan terhadap Anda sesuai dengan
                ketentuannya.</p>
            <p class="mt-5">Jika Anda berusia di bawah 18 tahun, orang tua atau wali Anda harus menandatangani Perjanjian ini atas
                nama Anda, dan akan bertanggung jawab atas penggunaan dan akses Anda ke Layanan; termasuk
                tanggung jawab finansial atas barang apa pun yang Anda beli melalui Layanan. Setiap penggunaan atau
                akses ke Layanan oleh siapa pun yang berusia di bawah 13 tahun dilarang keras dan melanggar Perjanjian
                ini. Jika Anda berusia di bawah 13 tahun, mohon jangan mencoba mendaftar ke Layanan atau mengirimkan
                informasi apa pun tentang diri Anda kepada kami, termasuk nama, alamat, nomor telepon, atau alamat
                email Anda. Jika kami mengetahui bahwa kami telah mengumpulkan informasi pribadi dari siapa pun yang
                berusia di bawah 13 tahun tanpa verifikasi persetujuan orang tua, kami akan menghapus informasi
                tersebut secepat mungkin.</p>
            <p class="mt-5">Beli dan gunakan produk dan layanan yang tersedia melalui Situs Hastha Club (“Produk” atau “Voucher”),
                dengan mematuhi Ketentuan Layanan ini dan semua hukum, peraturan, dan regulasi yang berlaku (secara
                kolektif, “Hukum”). Semua email dan komunikasi lain antara Anda dan Hastha Club dapat direkam.</p>
            <p class="mt-5">Dengan menggunakan situs ini selanjutnya, Anda setuju untuk mematuhi setiap syarat dan ketentuan
                layanan tersebut.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Integritas data</span>
            <p class="mt-5">Anda menyatakan bahwa semua informasi, data, dan materi lain yang Anda berikan kepada Hastha Club
                adalah benar, akurat, terkini, dan lengkap. Anda bertanggung jawab untuk memperbarui dan mengoreksi
                informasi yang telah Anda berikan kepada Hastha Club dengan memperbarui informasi pada akun yang
                Anda buat di <span class="text-blue-500 underline"> http://www.hasthaclub.com</span>.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Kebijakan Privasi</span>
            <p class="mt-5">Salinan Kebijakan Privasi yang berlaku untuk pengumpulan, penggunaan, pengungkapan, dan pemrosesan
                informasi pribadi lainnya oleh Hastha Club terdapat di <span class="text-blue-500"> www.hasthaclub.com </span> / privacy. Anda menyetujui
                bahwa informasi pribadi apa pun yang kami peroleh tentang Anda (baik melalui Situs Hastha Club, melalui
                email, telepon, atau cara lain apa pun) dikumpulkan, disimpan, dan diproses dengan cara lain sesuai
                dengan ketentuan Kebijakan Privasi. Hastha Club dapat memperbarui Kebijakan Privasi dari waktu ke
                waktu, atas kebijakannya sendiri, dan mengeposkan versi pemberitahuan yang diperbarui di alamat situs
                web yang diberikan di atas.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Mata Uang</span>
            <p class="mt-5">Kami menggunakan Rupiah (IDR), mata uang Indonesia, untuk setiap pembayaran dan/atau tagihan ke
                kartu kredit Anda. Harga yang ditampilkan di Situs dapat ditampilkan dalam mata uang asing, tetapi kami
                akan menggunakan Rupiah (IDR) sebagai harga transaksi yang dibebankan berdasarkan nilai tukar mata
                uang asing tersebut ke Rupiah (IDR) yang berlaku di bank kami.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Merek Dagang dan Hak Cipta</span>
            <p class="mt-5">Merek dagang, logo, dan merek layanan ("Merek") yang ditampilkan di Situs adalah milik Hastha Club atau
                pemberi lisensinya atau penyedia konten, atau pihak lain. Pengguna atau pihak mana pun yang bertindak
                atas nama mereka dilarang menggunakan Merek apa pun untuk tujuan apa pun termasuk, tetapi tidak
                terbatas pada penggunaan sebagai tag meta di halaman atau Situs lain tanpa izin tertulis dari Hastha Club
                atau pihak ketiga yang mungkin memiliki Merek tersebut. Anda tidak boleh menggunakan bingkai atau
                memanfaatkan teknik atau teknologi pembingkaian untuk melampirkan konten apa pun yang disertakan di
                Situs tanpa persetujuan tertulis dari Hastha Club. Lebih lanjut, Anda tidak boleh menggunakan konten Situs
                apa pun dalam tag meta atau teknik atau teknologi "teks tersembunyi" lainnya tanpa persetujuan tertulis
                dari Hastha Club. Semua konten (termasuk program perangkat lunak apa pun) yang tersedia di atau
                melalui Situs dilindungi oleh hak cipta, merek dagang, dan hukum Republik Indonesia dan hukum asing
                lainnya yang berlaku.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Force Majeure</span>
            <p class="mt-5">Hastha Club dibebaskan dari kewajiban untuk melaksanakan Layanan berdasarkan Ketentuan Layanan,
                sejauh layanan tersebut dicegah atau ditunda pelaksanaannya, secara keseluruhan atau sebagian, sebagai
                akibat dari suatu peristiwa atau serangkaian peristiwa yang disebabkan oleh atau diakibatkan oleh (1)
                kondisi cuaca atau unsur alam lainnya atau bencana alam, (2) tindakan perang, tindakan terorisme,
                pemberontakan, huru-hara, gangguan sipil atau pemberontakan, (3) perubahan hukum dan peraturan yang
                berlaku atau kebijakan tertentu oleh Pemerintah Republik Indonesia, atau (4) sebab-sebab lain di luar
                kendali wajar Hastha Club. Jika Hastha Club untuk sementara tidak dapat mengirimkan barang yang dibeli
                kepada Anda karena peristiwa tersebut, Hastha Club akan memberi Anda pilihan untuk menunda
                pengiriman atau menerima pengembalian biaya Anda.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Tautan Pihak Ketiga</span>
            <p class="mt-5">Layanan dapat berisi tautan ke situs web pihak ketiga, pengiklan, layanan, penawaran khusus, atau acara
                atau aktivitas lain yang tidak dimiliki atau dikendalikan oleh Hastha Club. Hastha Club tidak mendukung
                atau memikul tanggung jawab apa pun atas Situs, informasi, materi, produk, atau layanan pihak ketiga
                tersebut. Jika Anda mengakses situs web pihak ketiga dari Layanan, Anda melakukannya dengan risiko
                Anda sendiri, dan Anda memahami bahwa Perjanjian ini dan Kebijakan Privasi Hastha Club tidak berlaku
                untuk penggunaan Situs tersebut oleh Anda. Anda secara tegas membebaskan Hastha Club dari segala dan
                semua tanggung jawab yang timbul dari penggunaan situs web, layanan, atau konten pihak ketiga mana
                pun. Selain itu, transaksi atau partisipasi Anda dalam promosi pengiklan yang ditemukan di Layanan,
                termasuk pembayaran dan pengiriman barang, dan ketentuan lainnya (seperti garansi) semata-mata
                berada di antara Anda dan pengiklan tersebut. Anda setuju bahwa Hastha Club tidak bertanggung jawab
                atas segala kerugian atau kerusakan apa pun yang berkaitan dengan transaksi Anda dengan pengiklan
                tersebut.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Akses ke Fitur Situs yang Dilindungi Kata Sandi</span>
            <p class="mt-5">Akses dan penggunaan area Situs yang dilindungi kata sandi dibatasi hanya untuk pengguna yang
                berwenang. Anda bertanggung jawab untuk melindungi kredensial login Anda, termasuk kata sandi apa
                pun. Anda setuju bahwa Anda akan bertanggung jawab atas semua pernyataan yang dibuat, dan tindakan
                atau kelalaian yang terjadi, melalui penggunaan kredensial login Anda. Jika Anda memiliki alasan untuk
                meyakini atau mengetahui adanya kehilangan, pencurian, atau penggunaan kredensial login Anda yang
                tidak sah, segera beri tahu Hastha Club. Hastha Club dapat berasumsi bahwa semua komunikasi yang kami
                terima dari email atau alamat lain Anda, atau komunikasi yang terkait dengan kredensial login atau akun
                Anda di Situs ini, telah dilakukan oleh Anda kecuali kami menerima pemberitahuan yang menyatakan
                sebaliknya.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">SANGGAHAN/TANPA JAMINAN</span>
            <p class="mt-5">Layanan dan Produk atau Layanan apapun yang dapat Anda beli melalui Layanan disediakan atas dasar
                "apa adanya" dan "sebagaimana tersedia". Penggunaan Layanan merupakan risiko Anda sendiri. Sejauh
                diizinkan oleh hukum yang berlaku, Layanan dan Produk disediakan tanpa jaminan dalam bentuk apapun,
                baik tersurat maupun tersirat, termasuk, namun tidak terbatas pada, jaminan tersirat tentang kelayakan
                untuk diperjualbelikan, kesesuaian untuk tujuan tertentu, atau nonpelanggaran. Tanpa membatasi hal
                tersebut di atas, Hastha Club, anak perusahaannya, dan pemberi lisensinya tidak menjamin bahwa konten
                tersebut akurat, andal, atau benar; bahwa layanan atau produk akan memenuhi kebutuhan Anda; bahwa
                layanan akan tersedia pada waktu atau lokasi tertentu, tanpa gangguan atau aman; bahwa setiap cacat
                atau kesalahan akan diperbaiki; atau bahwa layanan tersebut bebas dari virus atau komponen berbahaya
                lainnya. Konten apa pun yang diunduh atau diperoleh dengan cara lain melalui penggunaan Layanan
                diunduh atas risiko Anda sendiri dan Anda akan bertanggung jawab sepenuhnya atas kerusakan pada
                sistem komputer Anda atau hilangnya data yang diakibatkan oleh pengunduhan tersebut atau penggunaan
                Layanan oleh Anda.</p>
            <p class="mt-5">Hastha Club tidak menjamin, mendukung, menjamin, atau memikul tanggung jawab atas Produk atau
                Layanan apa pun yang diiklankan atau ditawarkan oleh pihak ketiga melalui Layanan Hastha Club atau situs
                web atau layanan yang memiliki hyperlink, dan Hastha Club tidak akan menjadi pihak dalam atau dengan
                cara apa pun memantau transaksi apa pun antara Anda dan penyedia Produk atau Layanan pihak ketiga.</p>
            <p class="mt-5">Kami tidak bertanggung jawab dan tidak memikul kewajiban apa pun atas Konten Anggota yang diunggah
                atau dikirim melalui Situs, atau Layanan. Anda akan bertanggung jawab sepenuhnya atas Konten Anggota
                Anda dan konsekuensi dari pengunggahan atau penerbitannya, dan Anda setuju bahwa kami hanya
                bertindak sebagai saluran pasif untuk distribusi dan penerbitan Konten Anggota Anda secara daring. Anda
                memahami dan setuju bahwa Anda mungkin terpapar pada Konten Anggota yang tidak akurat, tidak
                menyenangkan, atau tidak sesuai dengan tujuan Anda, dan Anda setuju bahwa kami tidak bertanggung
                jawab atas segala kerusakan yang Anda alami atau yang Anda duga alami sebagai akibat dari Konten
                Anggota.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Perjanjian Lengkap</span>
            <p class="mt-5">Persyaratan Layanan ini merupakan perjanjian lengkap antara Anda dan Hastha Club mengenai hal-hal
                khusus di sini, dan semua perjanjian, surat, proposal, diskusi, dan dokumen lain sebelumnya mengenai halhal
                di sini digantikan dan digabungkan ke dalam Persyaratan Layanan ini.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Keterpisahan</span>
            <p class="mt-5">Jika ada ketentuan dalam Persyaratan Layanan ini, keberlakuan ketentuan lainnya tidak akan terpengaruh
                atau terganggu dengan cara apa pun, dan ketentuan tersebut akan dianggap dinyatakan kembali untuk
                mencerminkan maksud awal para pihak sedekat mungkin sesuai dengan hukum yang berlaku.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Hukum dan Yurisdiksi yang Mengatur</span>
            <p class="mt-5">Jika Anda memilih untuk mengakses Situs ini dari luar Indonesia, Anda melakukannya atas inisiatif Anda
                sendiri dan bertanggung jawab untuk mematuhi hukum setempat yang berlaku. Persyaratan Layanan ini
                akan diatur oleh dan ditafsirkan sesuai dengan hukum Indonesia, tanpa memberlakukan prinsip-prinsip
                konflik hukum apa pun. Jika ada ketentuan dalam Persyaratan Layanan ini yang dianggap tidak konsisten
                dan bertentangan dengan hukum tersebut, ketentuan tersebut karenanya akan batal demi hukum atau
                tidak dapat diberlakukan, dengan semua ketentuan lainnya tetap berlaku penuh.</p>
            <p class="mt-5">Segala perselisihan atau perbedaan pendapat yang timbul sehubungan dengan penggunaan Situs ini akan
                diselesaikan secara musyawarah. Apabila perselisihan atau perbedaan pendapat tersebut tidak dapat
                diselesaikan secara musyawarah, para pihak dengan ini sepakat untuk menyelesaikan perselisihan atau
                perbedaan pendapat tersebut melalui Pengadilan Negeri Jakarta Barat, Indonesia.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Modifikasi Ketentuan Layanan</span>
            <p class="mt-5">Anda mengakui dan setuju bahwa Hastha Club dapat, atas kebijakannya sendiri, mengubah, menambah,
                atau menghapus bagian mana pun dari Ketentuan Layanan ini kapan saja dan dengan cara apa pun, dengan
                mengeposkan Ketentuan Layanan yang telah direvisi di Situs. Anda tidak boleh mengubah atau
                memodifikasi Ketentuan Layanan ini dalam keadaan apa pun. Versi terkini Ketentuan Layanan ini tersedia
                di situs web Hastha Club. Merupakan tanggung jawab Anda untuk memeriksa secara berkala setiap
                perubahan yang kami buat pada Ketentuan Layanan. Penggunaan Situs ini secara terus-menerus setelah
                adanya perubahan pada Ketentuan Layanan berarti Anda menerima perubahan tersebut.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold">Penugasan</span>
            <p class="mt-5">Anda tidak boleh mengalihkan Ketentuan Layanan ini (atau hak, manfaat, atau kewajiban apa pun di
                bawah ini) dengan operasi hukum atau sebaliknya tanpa persetujuan tertulis sebelumnya dari Hastha Club,
                yang dapat ditahan atas kebijakan Hastha Club sendiri. Setiap upaya pengalihan yang tidak mematuhi
                Ketentuan Layanan ini akan batal demi hukum. Hastha Club dapat mengalihkan Ketentuan Layanan, secara
                keseluruhan atau sebagian, kepada pihak ketiga mana pun atas kebijakannya sendiri.</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection