<?= $this->extend('layouts/home_layout'); ?>

<?= $this->section('konten'); ?>
<!-- ISI KONTEN -->
<div class="mt-12 md:mt-16"></div>

<div class="flex flex-col md:flex-row items-center md:items-center mt-6 md:mt-10 mx-6 md:ml-10 space-y-4 md:space-y-0 md:space-x-8">
  <img src="<?= base_url('assets/img/tk-arrayhan.png'); ?>" alt="RA AR RAYHAN" class="w-40 h-40 md:w-60 md:h-60" />
  <div class="text-center md:text-left self-center">
    <h1 class="text-[#40531B] text-4xl md:text-6xl font-bold leading-tight">RAUDHATUL ATHFAL</h1>
    <h1 class="text-[#40531B] text-4xl md:text-6xl font-bold leading-tight">AR RAYHAN</h1>
  </div>
</div>

<!-- PROFIL SINGKAT -->
<div class="bg-[#F5F8EC] text-[#40531B] mt-6 md:mt-10 p-4 md:p-6 rounded-lg shadow-md max-w-7xl mx-4 md:mx-auto">
  <h2 class="text-xl md:text-2xl font-bold mb-2">Profil Singkat</h2>
  <p class="text-base md:text-lg">
    RA AR RAYHAN merupakan lembaga pendidikan anak usia dini yang berlokasi di [isi lokasi lengkap di sini]. 
    Didirikan dengan tujuan membentuk karakter islami, kreatif, dan cinta belajar sejak dini. 
    Dengan pendekatan belajar yang menyenangkan dan berlandaskan nilai-nilai Islam, kami berkomitmen 
    memberikan pendidikan terbaik bagi generasi masa depan.
  </p>
</div>

<!-- Tambahan margin -->
<div class="mt-12 md:mt-16"></div>

<div class="bg-[#AFBC88] text-[#40531B] p-4 md:p-8 rounded-lg mt-6 max-w-7xl shadow-md mx-4 md:mx-auto">
  <p class="text-base md:text-lg font-medium">
    Lorem ipsum dolor sit amet. Aut debitis libero eum doloribus modi est
    delectus labore qui internos nemo ab nihil accusamus qui velit
    quibusdam?
  </p>
  <p class="text-base md:text-lg font-medium mt-2">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas soluta
    mollitia nisi, minus sint consequuntur eos quidem et, suscipit enim
    dignissimos ab nihil sit delectus debitis obcaecati quos excepturi
    doloribus?
  </p>
</div>

<!-- Tambahan margin -->
<div class="mt-12 md:mt-16"></div>

<!-- ISI KONTEN BERITA -->
<div class="flex items-center justify-between my-6 px-4 md:px-0">
  <!-- Garis Kiri -->
  <div class="flex flex-col space-y-1 w-full">
    <div class="border-t-[2px] border-[#40531B] w-[85%]"></div>
    <div class="border-t-[2px] border-[#40531B] w-full"></div>
    <div class="border-t-[2px] border-[#40531B] w-[85%]"></div>
  </div>

  <!-- Teks Tengah -->
  <h2 class="text-[#40531B] text-2xl md:text-4xl font-bold mx-3 md:mx-6 whitespace-nowrap">Seputar RA AR RAYHAN</h2>

  <!-- Garis Kanan -->
  <div class="flex flex-col space-y-1 w-full">
    <div class="border-t-[2px] border-[#40531B] ml-[15%]"></div>
    <div class="border-t-[2px] border-[#40531B] ml-full"></div>
    <div class="border-t-[2px] border-[#40531B] ml-[15%]"></div>
  </div>
</div>

<!-- Tambahan margin -->
<div class="mt-12 md:mt-16"></div>

<!-- Berita -->
<div class="max-w-7xl mx-auto mt-6 md:mt-10 px-4 md:px-0">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Berita Terbaru -->
    <div class="col-span-1 md:col-span-2 bg-gray-100 p-4 md:p-6 rounded-lg shadow-md">
      <h3 class="text-[#40531B] text-xl md:text-2xl font-bold mb-3 md:mb-4">
        Berita Terbaru!
      </h3>
      <img class="w-full h-48 md:h-64 rounded-md object-cover" src="<?= base_url('assets/img/upload/' . $beritaTerbaru->nama_file_gambar); ?>" alt="<?= $beritaTerbaru->slug; ?>" />
      <h4 class="text-[#40531B] font-bold text-lg mt-3 md:mt-4"><?= $beritaTerbaru->judul; ?></h4>
      <p class="text-gray-600 text-xs md:text-sm">
        <i class="far fa-calendar-alt mr-1"></i><?= date('d-m-Y', strtotime($beritaTerbaru->created_at)); ?>
      </p>
      <p class="text-gray-700 text-sm md:text-base mt-2">
        <?= $beritaTerbaru->isi; ?>
      </p>
    </div>

    <!-- Berita Lainnya -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
      <div class="bg-gray-100 p-3 rounded-lg shadow-md">
        <img class=" w-full h-32 rounded-md" src="<?= base_url('assets/img/upload/' . $beritaLainnya[0]->nama_file_gambar); ?>" alt="<?= $beritaLainnya[0]->slug; ?>" />
        <p class="text-gray-600 text-xs md:text-sm mt-2 flex items-center justify-between">
          <span class="flex items-center">
            <i class="far fa-calendar-alt mr-1"></i> <?= $beritaLainnya[0]->created_at ?>
          </span>
          <span class="flex items-center">
            <i class="far fa-clock mr-1"></i> <?= $beritaLainnya[0]->updated_at ?>
          </span>
        </p>
        <h4 class="text-[#40531B] font-bold text-sm md:text-base"><?= $beritaLainnya[0]->judul ?></h4>
      </div>
      <div class="bg-gray-100 p-3 rounded-lg shadow-md">
      <img class=" w-full h-32 rounded-md" src="<?= base_url('assets/img/upload/' . $beritaLainnya[1]->nama_file_gambar); ?>" alt="<?= $beritaLainnya[0]->slug; ?>" />
      <p class="text-gray-600 text-xs md:text-sm mt-2 flex items-center">
          <i class="far fa-calendar-alt mr-1"></i><?= $beritaLainnya[1]->created_at ?>
          <span class="ml-auto flex items-center">
            <i class="far fa-clock mr-1"></i><?= $beritaLainnya[1]->updated_at ?>
          </span>
        </p>
        <h4 class="text-[#40531B] font-bold text-sm md:text-base"><?= $beritaLainnya[1]->judul ?></h4>
      </div>
      <div class="bg-gray-100 p-3 rounded-lg shadow-md">
      <img class=" w-full h-32 rounded-md" src="<?= base_url('assets/img/upload/' . $beritaLainnya[2]->nama_file_gambar); ?>" alt="<?= $beritaLainnya[0]->slug; ?>" />

        <p class="text-gray-600 text-xs md:text-sm mt-2 flex items-center">
          <i class="far fa-calendar-alt mr-1"></i><?= $beritaLainnya[2]->created_at ?>
          <span class="ml-auto flex items-center">
            <i class="far fa-clock mr-1"></i><?= $beritaLainnya[2]->updated_at ?>
          </span>
        </p>
        <h4 class="text-[#40531B] font-bold text-sm md:text-base"><?= $beritaLainnya[2]->judul ?></h4>
      </div>
      <div class="bg-gray-100 p-3 rounded-lg shadow-md">
      <img class=" w-full h-32 rounded-md" src="<?= base_url('assets/img/upload/' . $beritaLainnya[3]->nama_file_gambar); ?>" alt="<?= $beritaLainnya[0]->slug; ?>" />
        <p class="text-gray-600 text-xs md:text-sm mt-2 flex items-center">
          <i class="far fa-calendar-alt mr-1"></i><?= $beritaLainnya[3]->created_at ?>
          <span class="ml-auto flex items-center">
            <i class="far fa-clock mr-1"></i><?= $beritaLainnya[3]->updated_at ?>
          </span>
        </p>
        <h4 class="text-[#40531B] font-bold text-sm md:text-base"><?= $beritaLainnya[3]->judul ?></h4>
      </div>
    </div>
  </div>
  <div class="text-center md:text-right mt-6">
    <a href="<?=base_url('berita')?>" class="bg-[#AFBC88] text-[#40531B] px-6 py-2 rounded-md font-bold shadow-md">
      Berita lainnya &gt;&gt;
    </a>
  </div>
</div>
<!-- PENUTUP KONTEN BERITA -->

<!-- Tambahan margin -->
<div class="mt-12 md:mt-16"></div>

<?= $this->endSection() ?>
