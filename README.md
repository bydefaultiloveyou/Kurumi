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
