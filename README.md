<h1 align="center" id="title">Kurumi Framework</h1>

<!-- image section -->

<p align="center"><img src="https://socialify.git.ci/bydefaultiloveyou/Kurumi/image?description=1&descriptionEditable=Native%20Framework%20for%20Koneksi.php&font=Source%20Code%20Pro&forks=1&language=1&logo=https%3A%2F%2Fi.redd.it%2Fq4y7hxtq1g161.png&name=1&pulls=1&stargazers=1&theme=Light" alt="Kurumi"/>
</p>

<!-- introduction section -->

## 📕 Pengenalan Framework Kurumi
__Kurumi__ adalah sebuah Framework sederhana yang namanya terinspirasi dari sebuah karakter anime yaitu __Tokisaki Kurumi__ Kami membuat Framework ini bertujuan untuk memberi kemudahan kepada user untuk membuat sebuah web aplikasi mengunakan bahasa __PHP NATIVE__

<!-- warning section -->

## ⚠️ Warning!!

_Kami mengembangkan Framework ini tanpa mengunakan [composer](https://getcomposer.org)_
 
<!-- feature section -->

## 🧐 Fitur-Fitur :

__Fitur-Fitur yang kami sediakan__
- [Routing]("#routing")
- [Database Query]("#database-query")
- [Kurumi Template Engine]("#kurumi-template-engine")

<!-- installation -->

## 🛠️ Tahap instalasi

Kami menyediakan 2 cara instalasi, yaitu dengan :

__1. Clone repository ini__

```
 git clone https://github.com/bydefaultiloveyou/Kurumi.git && cd Kurumi && rm -rf .git
```

__2. Download ZIP File__

Untuk menjalankan server, ketik `php kurumi server` di terminal / cmd

<!-- kurumi cli section -->

## 🔫 Kurumi

Kami mempunyai `kurumi`, dia adalah sebuah program simple yang akan membantu masa development aplikasi kalian. Di dalamnya ada berbagai macam command yang bisa kalian gunakan.

<!-- structure folder -->
## 📁 Pengenalan Struktur Folder

- [__`app`__]("#app") 
    - folder app mengandung inti kode dari aplikasi mu, jadi jelajahi folder ini lebih detail kemudian hari, hampir semua class di aplikasimu akan di buat di folder ini 
- [__`config`__]("#config") 
    -  folder config sebagai menyiratkan nama, mengandung semua file configurasi di aplikasimu, ini sebuah ide bagus untuk membaca semua file ini dan dirimu familiar dengan semua pengaturan yang tersedia untuk mu
- [__`public`__]("#public")
    - folder public mengandung file index.php yang menjadi inti point dari semua request yang di terima oleh aplikasimu dan configurasi autoloading. folder ini juga sebagai rumah untuk asset seperti images, JavaScript dan CSS.
- [__`resources`__]("#resources")
    - folder resources mengandung view yang sebagai mentahanmu, tidak di compile asset seperti CSS atau JavaScript
- [__`routes`__]("#routes")
    - folder routes mengandung semua route yang di definisikan untuk aplikasimu, secara default, beberapa routing file mengambil routing di file web.php
- [__`storage`__]("#storage")
    - storage folder mengandung file generate dari folder resources
- [__`vendor`__]("#vendor")
    - vendor adalah folder inti dari kurumi framework, yang di mana berisi semua code penting di kurumi, noted : kalo kamu punya trauma melihat yang rumit dilarang melihat folder ini
    
    
<!-- routing -->
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

## 🗿 View
View adalah sebuah function untuk menampilkan sebuah halaman HTML. Secara default file mengarah ke folder `resources/views` sebagai contoh
di dalam folder
```bash
.
└── resources
    └── views
         ├── components
         │   └── lutfimiku.php
         ├── kurumi.php
         └── kaori.php
```

jika kamu ingin menampilkan file `kurumi.php` sebagai contoh kamu bisa mengetikan :
```php
view('kurumi')
```
Secara default view akan mengarahkan kamu ke file kurumi.php 

#### ⚠️ Warning Sayangku
Kurumi mengadaptasi `.` sebagai lambang folder. Sebagai Contoh jika kamu ingin menampilkan file yang ada di sub directory kamu harus menyertakan format `folder.file` contoh : 
```php
view('components.lutfimiku')
```
## 🔫 Kurumi Template Engine
Kurumi sangat simple, sebuah template engine lumayan powerfull yang ter included dengan __Kurumi__, tidak seperti php templating engine, kurumi tidak membatasi kamu dari mengunakan php code di template mu, faktanya, semua kurumi template di compiled menjadi php code dan cache sampai mereka di modifikasi. artinya Kurumi menambahkan esensial nol overhead di aplikasimu, File Kurumi template mengunakan extensi `.kurumi.php` dan mereka biasa disimpan di folder resources/views.

kurumi views mungkin akan mengembalikan dari route atau controller mengunakan function global view. tentu saja, sebagai documentasi tersebut data mungkin akan di tambahakan ke Kurumi view mengunakan argument kedua, sebagai contoh :
```php
view('lutfimiku', ["waifu" => "Tokisaki Kurumi"]);
```



jika kamu ingin mengunakan data di template mu kamu hanya perlu menuliskan

```blade
{{ $waifu }} 
```
_ini secara otomatis akan menambahkan function htmlspecialchars yang mengamankan string kamu_

jika kamu tidak ingin ada htmlspecialchars, kamu bisa mengunakan syntax :
```blade
{! $waifu !}
```

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
### 🥳 fitur fitur template engine yang tersedia

di kurumi template semua syntax di awali dengan `@` sebagai contoh `@if`, `@endif`
 
contoh
```blade
<div>
 @if ( $kurumi === "sayang lutfi" ) :
   <p> 😍 eh abang sayang</p>
 @elseif ( $nakanoNino === "istri miko" ) :
   <p>Betsuniiii >////< </p>
 @endif
</div>
```

### @if

jika kamu ingin melakukan pengondisian kamu bisa mengunakan syntax yang di awali `@if` dan di akhiri `@endif`

```blade
@if ( $bumi === "waifu" ) :
 <p>true</p>
@endif
```

jika kamu ingin melakukan lebih dari satu pengondisian kamu melakukan `@elif` contoh :

```blade
@if ( $bumi === "waifu" ) :
 <p>false</p>
@elif ( $bumi === "datar" ) :
 <p>false</p>
@else
 <p>true</p>
@endif
```

### @each
jika kamu ingin melooping data array daripada mengunakan syntax bawaan foreach php,lebih baik kalian mengunakan syntax kurumi `@each` yang memliki syntax lebih simple dan rapih.
syntax `@each` harus di tutup mengunakan syntax `@endeach` contoh
```blade
@each ( $waifus as $name ) :
 <p>{{ $name }}</p>
@endeach
```

### @include
kadang kala kamu tidak ingin menuliskan kode HTML secara berulang, kamu mungkin akan merasa capek karena hal itu. maka dari itu kurumi menyediakan sebuah template engine `@include` yang berfungsi untuk memasukan kode html dari file yang berbeda sehingga kamu hanya perlu membuat 1 komponen untuk semua halaman,
secara default `@include` mengarah ke folder `resources/views` sehingga jika kamu ingin membuat komponen harus berada di dalam folder `resources/views`

seperti yang kamu tau kurumi mengadaptasi `.` sebagai folder, sehingga jika kamu ingin mengambil file yang berada di dalam sub folder harus di sambungkan dengan `.` seperti contoh
```bash
"components.navbar"
```

syntax `@include` yaitu
```blade
@include ('filename')
<!-- contoh -->
@include ('components.navbar')
```

### @asset
asset di gunakan untuk mengarahkan file css/javascript, secara default asset mengarahkan ke folder `public`, sehingga jika kamu ingin membuat file css/js bisa di lakukan di folder public

contoh syntax `asset`
```blade
@asset ('filename');
```

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

### @method
method di gunakan untuk membuat request `DELETE` dan `PUT`, secara default HTML tidak mendukung kedua Http method tersebut sehingga memerlukan bantuan dari engine `@method`

contoh syntax `@method`
```php
<form action="/user" method="POST">
 @method('DELETE')
 <input type="text" name="user">
 <button>DELETE</button>
</form>
```
