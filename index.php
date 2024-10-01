<?php
  include "koneksi.php";
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>IKM RSUD AJIBARANG</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- tes -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Favicons -->
    <link href="assets/img/sipuass.ico" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- Font Awesome -->
     <script src="https://kit.fontawesome.com/e954c11678.js" crossorigin="anonymous"></script>
  </head>

  <body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
      <div
        class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="assets/img/sipuas.png" alt="" />
          <h1 class="sitename"><span>Si</span>Puas</h1>
          <i class="mobile-nav-toggle"></i>
        </a>

        <header id="header" class="logo d-flex align-items-center">
          <img src="assets/img/logoo.png" alt="" />
        </header>
      </div>
    </header>

    
    <main class="main">
      <a href="hasil.php" class="d-flex justify-content-center">Hasil</a>
      <!-- Services Section -->
      <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <div><span>PENILAIAN KEPUASAN PASIEN</span></div>
          <div>
            <span>Puaskah Anda Dengan Pelayanan di RSUD AJIBARANG</span>
          </div>
          <h5>Silahkan memberikan penilaian, klik gambar dibawah ini</h5>
        </div>
        <!-- End Section Title -->

        <div class="container">
          <div class="row gy-4">
            <div
              class="nilai col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="200">
              <form
                class="service-item position-relative d-flex align-items-center"
                action="koneksi.php" method="POST">
                <div class="icon">
                  <input type="hidden" name="nilai" value="Memuaskan">
                  <img src="assets/img/4.png" style="width: 123px" alt="" />
                </div>
                <h3>MEMUASKAN</h3>
              </form>
            </div>
            <!-- End Service Item -->

            <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="200"
              data-bs-toggle="modal"
              id="nilai_cukup">
              <!-- data-bs-target="#myModal2" -->
              <div
                class="service-item position-relative d-flex align-items-center">
                <div class="icon">
                  <img src="assets/img/1.png" style="width: 90px" alt="" />
                </div>
                <h3>CUKUP</h3>
              </div>             
            </div>

            <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="300"
              data-bs-toggle="modal"
              data-bs-target="#myModal3"
              id="nilai_kurang">
              <div
                class="service-item position-relative d-flex align-items-center">
                <div class="icon">
                  <img src="assets/img/3.png" style="width: 90px" alt="" />
                </div>
                <h3>KURANG</h3>
              </div>
            </div>
            <!-- End Service Item -->
          </div>
        </div>
      </section>
      <!-- /Services Section -->
    </main>

    <div class="row d-flex justify-content-center mt-2 mb-4">
      <h3 class="text-center mt-4 text-bold">PENGADUAN WHATSAPP</h3>
      <img style="width: 200px" src="assets/img/QR.png" />
      <a
        class="d-flex justify-content-center mt-3"
        target="_blank"
        href="https://api.whatsapp.com/send?phone=6281327038572&text=Terima%20kasih%20sudah%20menghubungi%20Case%20Manager%20RSUD%20Ajibarang.%20Kami%20dengan%20senang%20hati%20akan%20membantu%20masalah%20Anda.%20Silahkan%20masukan%20kritik%20dan%20saran%20anda%20disini%20%3A%20">
        <button class="btn btn-success">Pengaduan</button>
      </a>
    </div>

    <footer
      id="footer"
      class="footer light-background d-flex align-items-center">
      <div class="credits">
        <marquee direction="left" scrollamount="4" behavior="alternate"
          >Terimakasih sudah memberikan penilaian, Semoga Sehat Salalu</marquee
        >
      </div>
    </footer>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Sweetalert -->
     <script>

      function insert(form, formData){
        fetch(form.action, {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              Swal.fire({
                icon: "success",
                title: "Terima Kasih",
                text: "Penilaian Anda sudah kami terima",
                showConfirmButton: false,
                timer: 1500
              })
            } else {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Terjadi kesalahan saat mengirim data",
              });
            }
          })
          .catch(error => {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Terjadi kesalahan saat mengirim dataa",
            });
          });
      }

      document.querySelectorAll('.nilai').forEach(item => {
        item.addEventListener('click', function() {
          const form = this.querySelector('form');
          const formData = new FormData(form);
          
          insert(form, formData);
        });
      });

      // Nilai Cukup
      const modalKurang = document.getElementById("nilai_kurang");
      modalKurang.addEventListener('click', function() {
        Swal.fire({
          title: "Pelayanan apa yang Anda rasa <strong>KURANG</strong>?",
          html: `
            <form action="koneksi.php" method="POST" id="form_kurang">
                <input type="hidden" name="nilai" value="Kurang">
                <p>Silahkan pilih salah satu</p>
                <input type="radio" id="kurang1" name="keterangan" value="Pelayanan Sangat Lama">
                <label for="kurang1">Pelayanan Sangat Lama</label><br>
                <input type="radio" id="kurang2" name="keterangan" value="Petugas Tidak Ramah">
                <label for="kurang2">Petugas Tidak Ramah</label><br>  
                <input type="radio" id="kurang3" name="keterangan" value="Biaya Mahal">
                <label for="kurang3">Biaya Mahal</label><br>
                <input type="radio" id="" name="keterangan" value="Kebersihan Fasilitas Kurang">
                <label for="keterangan4">Kebersihan Fasilitas Kurang</label>

            </form>
          `,
          showCloseButton: true,
          showCancelButton: false,
          focusConfirm: false,
          confirmButtonText: `Beri Penilaian <i class="fa-solid fa-chevron-right ms-2"></i>`,
          preConfirm: () => {
            const selectedOption = document.querySelector('input[name="keterangan"]:checked');
            if (!selectedOption) {
              console.log("No option selected");
              Swal.showValidationMessage('Silahkan pilih salah satu opsi.');
              return false;
            } 

            const form = document.getElementById('form_kurang');
            const formData = new FormData(form);

            formData.set('keterangan', selectedOption.value);
            return formData;
          }
        }).then((result) => {
          if (result.isConfirmed) {
            insert(document.getElementById('form_kurang'), result.value);
          }
        });
      });
      // End Nilai Cukup
      
      
     </script>    

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
