<h1 align="center" id="title">Kurumi Framework</h1>

<!-- image section -->
<p align="center">
 <img src="https://socialify.git.ci/bydefaultiloveyou/Kurumi/image?description=1&descriptionEditable=Native%20Framework%20for%20Koneksi.php&font=Source%20Code%20Pro&forks=1&language=1&logo=https%3A%2F%2Fi.redd.it%2Fq4y7hxtq1g161.png&name=1&pulls=1&stargazers=1&theme=Light" alt="Kurumi"/>
</p>

<p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

<!-- introduction section -->
## 📕 Pengenalan Framework
__Kurumi__ adalah sebuah Framework sederhana yang namanya terinspirasi dari sebuah karakter anime yaitu __Tokisaki Kurumi__ Kami membuat Framework ini bertujuan untuk memberi kemudahan kepada user untuk membuat sebuah web aplikasi mengunakan bahasa __PHP NATIVE__


<!-- warning section -->
## ⚠️ Warning!!

_Kami mengembangkan Framework ini tanpa mengunakan [composer](https://getcomposer.org)_
 
 <p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

<!-- feature section -->
## 🧐 Fitur Framework

__Fitur-Fitur yang tersedia:__
- [Routing](#-routing)
- [View](#-view)
- [Kurumi Template Engine](#-kurumi-template-engine)

<p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

<!-- installation -->
## 🛠️ Instalasi Framework

Kami menyediakan 2 cara instalasi, yaitu dengan :

__1. Clone repository__

Kamu dapat membuka terminal dan menggunakan perintah berikut.

```
 git clone https://github.com/bydefaultiloveyou/Kurumi.git && cd Kurumi && rm -rf .git
```

Secara otomatis akan melakukan cloning pada source code yang ada di branch default ( `master` ), jika ingin mengunduh versi stable bisa menambahkan `-b 1.x` di depan clone.

__2. Unduh file ZIP__

Kamu juga bisa mengunduhnya secara manual dengan menekan tombol di samping. [`Download`](https://github.com/iqbalthex/Kurumi/archive/refs/heads/haniel.zip)

<p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

## 🛠️ Penggunaan

Setelah melakukan cloning repo atau download zip, masuk ke repo/folder 'Kurumi' melalui terminal dengan menjalankan perintah:
```
cd Kurumi
```

Untuk menjalankan server, jalankan perintah:
```
php kurumi server
```

Kemudian, buka `localhost:3000` pada browser.

<p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

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

<p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

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

<p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

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
view('welcome')
```

kamu juga dapat mengirimkan data ke halaman view dengan mengirim data tersebut sebagai parameter kedua
```php
view('welcome', [ 'waifu' => 'Kurumi' ])
```


#### ⚠️ Warning Sayangku
Kurumi mengadaptasi `.` sebagai lambang folder. Sebagai Contoh jika kamu ingin menampilkan file yang ada di sub directory kamu harus menyertakan format `folder.file` contoh : 
```php
view('components.layouts')
```
maka isi dari file `components/layouts.kurumi.php` akan ditampilkan

<p align="center">* * * * * * * * * * * * * * * * * * * * * * * * *</p>
<hr><br>

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

#
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

### 🎉 Template 

kami menyediakan template yang sederhana, template ini didorong oleh inheritance. Semua template ini harus menggunakan extension `.kurumi.php`.

## menentukan layout

```blade
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#F380AB" />
  <link rel="manifest" href="@asset('manifest.json')" />
  <title></title>
  @css ("https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet")
  @css ("https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css")
  @css ("css/styles.css")
</head>

<body>

  @deus ("layouts")

  @javascript ("https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js")
</body>

</html>
```

<br/>

### menggunakan layouts

```blade
@section ("layouts")

<main class="container">
  <figure class="text-center p-5">
    <img width="400" src="https://pbs.twimg.com/media/FJxua79XwAMXzND?format=jpg&name=900x900" alt="Kurumi" />
    <h2>WELCOME TO KURUMI FRAMEWORK</h2>
    <figcaption>
      <p class="text-secondary">Simple framework for Koneksi.php</p>
      <ul class="d-flex w-100 justify-content-center">
        <a href="https://github.com/bydefaultiloveyou/Kurumi.git" target="__blank" style="text-decoration: none;" class="px-4 rounded-5 m-2 py-1 bg-primary text-white">
          <li>Documentation</li>
        </a>
        <li class="px-4 py-1 bg-primary text-white rounded-5 m-2">Lincense MIT</li>
      </ul>
    </figcaption>
  </figure>
</main>

@endsection

@extends ("layouts.main")
```

Perhatikan bahwa `@deus` berfungsi sebagai parent dari layout, `@deus('layouts)'` akan di isi oleh child dari layout yang telah di tentukan di `@section ('layouts')`.

untuk parameter dari parent `@deus` nya harus sama dengan child di `@section`.

Perhatikan juga `@extends ('layouts.main')` ini parameter nya adalah `path` dari file parent layout yang kamu punya, untuk penulisan `@extends` harus ditulis dipaling  bawah code kamu.


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

### @method
Melengkapi form menggunakan method selain bawaan html ( `GET` dan `POST` ) seperti `PUT` dan `DELETE`.

```
<form action="/user" method="POST">
  @method(DELETE)
  <input type="text" name="user" />
  <button>DELETE</button>
</form>
```
