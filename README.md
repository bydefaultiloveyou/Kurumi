<h1 align="center" id="title">Kurumi Framework</h1>

<!-- image section -->
<p align="center">
 <img src="https://socialify.git.ci/bydefaultiloveyou/Kurumi/image?description=1&descriptionEditable=Native%20Framework%20for%20Koneksi.php&font=Source%20Code%20Pro&forks=1&language=1&logo=https%3A%2F%2Fi.redd.it%2Fq4y7hxtq1g161.png&name=1&pulls=1&stargazers=1&theme=Light" alt="Kurumi"/>
</p>


<!-- introduction section -->
## 📕 Pengenalan Framework
__Kurumi__ adalah sebuah Framework sederhana yang namanya terinspirasi dari sebuah karakter anime yaitu __Tokisaki Kurumi__ Kami membuat Framework ini bertujuan untuk memberi kemudahan kepada user untuk membuat sebuah web aplikasi mengunakan bahasa __PHP NATIVE__


<!-- warning section -->
## ⚠️ Warning!!

_Kami mengembangkan Framework ini tanpa mengunakan [composer](https://getcomposer.org)_
 
 
<!-- feature section -->
## 🧐 Fitur Framework

__Fitur-Fitur yang tersedia:__
- [Routing](#-routing)
- [View](#-view)
- [Kurumi Template Engine](#-kurumi-template-engine)


<!-- installation -->
## 🛠️ Instalasi Framework

Kami menyediakan 2 cara instalasi, yaitu dengan :

__1. Clone repository ini__

```
 git clone https://github.com/bydefaultiloveyou/Kurumi.git && cd Kurumi && rm -rf .git
```

[__2. Download ZIP File__](https://github.com/iqbalthex/Kurumi/archive/refs/heads/haniel.zip)

Untuk menjalankan server, ketik `php kurumi server` di terminal / cmd


<!-- kurumi cli section -->
## 🔫 Kurumi

Kami mempunyai `kurumi`, dia adalah sebuah program simple yang akan membantu masa development aplikasi kalian. Di dalamnya ada berbagai macam command yang bisa kalian gunakan.

<!-- structure folder -->
## 📁 Pengenalan Struktur Folder

- `app` Folder paling penting, sebagian besar komponen dari aplikasimu tersimpan disini.
- `config` Berisi file konfigurasi yang dapat diatur sesuai keinginanmu, dapat mempermudah pengaturan seperti database, aktivasi fitur, lokasi input dan output untuk view dan sebagainya.
- `public` Berisi file-file yang boleh dilihat oleh user maupun developer secara publik.
- `resources` Folder resources mengandung view yang sebagai mentahanmu, tidak di compile asset seperti CSS atau JavaScript
- `routes` Berisi konfigurasi rute yang dapat diakses pada aplikasimu beserta handler-nya (fungsi atau controller).
- `storage` Berisi file yang dibuat secara otomatis oleh kurumi framework.
- `vendor` Berisi file sistem dari framework ini. Disarankan tidak mengubah apapun yang ada di dalam sini.


<!-- routing section -->
## 📍 Routing
__Kurumi__ Mengadaptasi konsep URI dan closure, menyediakan sebuah ekpresi simple dan method yang mendefinisikan routing tanpa komplikasi file konfigurasi routing

```php
use Kurumi\Http\Route;
 
Route::get('/greeting', function () {
    echo 'Hello World';
});

```

Semua routing __Kurumi__ di definisikan di file routing mu, yang berlokasi di `routes directory`, file ini otomatis dijalankan oleh aplikasimu. File routes/web.php itu mendefinisikan sebuah tampilan web mu.

Kamu akan mendefinikan di file routes/web.php dan akan di akses setiap kamu mengunjungi url di browsermu. Seperti contoh, kamu mungkin mengakses routing mengikuti navigasi seperti http://kurumi.com/user di browser mu :

```php
use App\Controllers\UserController;
 
Route::get('/user', [UserController::class, 'index']);
```

ini akan secara otomatis akan di akses jika kamu mengunjung route `/user` di web browsermu


### 🥳 Routing Yang Tersedia
Kurumi menyediakan beberapa pilihan routing seperti
```php
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::delete($uri, $callback);
```

#### GET
```php
Route::get($uri, $callback);
```
Method GET biasanya digunakan hanya mengambil data. Disini juga tempat untuk menampilan halaman website mu dengan :
```php
view($filename)
```

#### POST
```php
Route::post($uri, $callback);
```
Method POST digunakan untuk mengirimkan data ke server yang ditentukan, sering menyebabkan perubahan pada keadaan atau efek samping pada server. bahasa simple nya nginsert data ke Database

#### PUT
```php
Route::put($uri, $callback);
```
Method PUT menggantikan data yang ada dengan data yang dikirimkan / ngerubah data di Database.
#### DELETE
```php
Route::delete($uri, $callback);
```
Method DELETE untuk menghapus data yang ada di Database.

<!-- view section -->
## 🗿 View
View adalah sebuah fungsi untuk menampilkan halaman web. Secara default file mengarah ke folder `resources/views` sebagai contoh
di dalam folder
```bash
.
└── resources
    └── views
         ├── components
         │   └── layouts.kurumi.php
         └── welcome.kurumi.php
```

fungsi view secara otomatis akan menampilkan isi dari file `welcome.kurumi.php` cukup dengan menulisnya seperti di bawah ini
```php
view('kurumi')
```

kamu juga dapat mengirimkan data ke halaman view dengan mengirim data tersebut sebagai parameter kedua
```php
view('kurumi', [ 'waifu' => 'Kurumi' ])
```


#### ⚠️ Warning Sayangku
Kurumi mengadaptasi `.` sebagai lambang folder. Sebagai Contoh jika kamu ingin menampilkan file yang ada di sub directory kamu harus menyertakan format `folder.file` contoh : 
```php
view('components.layouts')
```
maka isi dari file `components/layouts.kurumi.php` akan ditampilkan


## 🔫 Haniel
Haniel adalah nama angel milik Natsumi yang dapat merubah wujud benda apapun. Dia dapat merubah expression dan directive pada template html kamu menjadi kode php. Di bawah ini beberapa expression dan directive yang dapat digunakan :

- __normal expression__
```
{ $waifu = 'kurumi' }
```
baris di atas akan diterjemahkan menjadi
```
<?php $waifu = 'kurumi' ?>
```
<br/>

- __normal echo expression__ (memunculkan nilai dari variabel)
```
{! $waifu !}
```
<br/>

- __special echo expression__ (memunculkan nilai dari variabel yang dibungkus fungsi built-in php yaitu `htmlspecialchars` )
```
{{ $waifu }}
```
<br/>

### ⚠️ Warning!!
_didalam kurumi template memiliki beberapa peraturan sementara yang wajib di ikuti seperti contoh_
```blade
{{$waifu}}
```
_code di atas akan menyebabkan error, dikarenakan tidak adanya space antara `{{` atau `}}` dengan variabel $waifu, code yang bener seharusnya di beri space diantara mereka, Selain itu ada peraturan di mana kode `{{` atau `}}` harus sejajar dengan variabel seperti contoh_
```blade
<p>
 {{
 $waifu
 }}
</p>
```
_jika kode tidak sejajar seperi contoh diatas akan menyebabkan error, contoh kode yang salah adalah_
```blade
<p>
 {{
 $waifu
}}
</p>
```
_atau terlalu dempet_
```html
<p>
{{
 $waifu
}}
</p>
```
<br/>

Note: directive diawali dengan tanda `@`

### @if, @elif, @else & @endif

```
<div>
  @if ( $kurumi === "sayang lutfi" ):
    <p> 😍 eh abang sayang</p>
  @elseif ( $nakanoNino === "istri miko" ):
    <p>Betsuniiii >////< </p>
  @else:
    <p>ayangku siapa? 🗿</p>
  @endif
</div>
```
<br/>

### @each & endeach

```
@each ( $waifus as $name ):
 <p>{{ $name }}</p>
@endeach
```
<br/>

### @include
Sama seperti fungsi built-in milik php yakni include, namun tidak perlu menggunakan tag pembuka `<?php` dan penutup `?>`. @include secara default memanggil file pada folder `resources/views`. Dan perlu diingat bahwa kurumi membaca tanda titik `.` sebagai tanda garis miring `/` yang biasa menjadi pemisah antara folder.

```
@include ('components.header')
@include ('components.navbar')
```
<br/>

### @asset
Dapat digunakan untuk mengambil file dari folder `public` misal kamu memiliki file css dan javascript di dalamnya.

```
@asset ('css/style.css')
@asset ('js/script.js')
```
<br/>

### @slot
`@slot` di gunakan untuk mengisi sebuah components ke layouts secara otomatis, layouts adalah sebuah main page yang dimana sebuah metadata berada, kadang kala kalian tidak ingin menuliskan metadata di setiap file halaman, seperti contoh cdn bootstrap. layouts ini bisa kalian atur di folder `config/layouts.php`, jika kalian ingin mematikan fitur ini / merubah folder dimana file layouts berada, semua bisa di rubah di file `config/layouts.php`

contoh syntax `@slot`
```blade
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kurumi Framework</title>
  <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="@asset('css/styles.css');" rel="stylesheet" />
</head>

<body>
  @slot
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
```
<br/>

### @method
Melengkapi form menggunakan method selain bawaan html ( `GET` dan `POST` ) seperti `PUT` dan `DELETE`.

```
<form action="/user" method="POST">
  @method(DELETE)
  <input type="text" name="user" />
  <button>DELETE</button>
</form>
```
