<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

   @vite(['resources/css/slider1.css', 'resources/js/script.js'])

</head>
<body>
   <div class="semua1">
      <div class="container">
         <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
            <div class="image-list">
               <img src="{{ asset('img/art.jpeg') }}" alt="img-1" class="image-item">
               <img src="{{ asset('img/art1.jpeg') }}" alt="img-2" class="image-item">
               <img src="{{ asset('img/art2.jpeg') }}" alt="img-3" class="image-item">
               <img src="{{ asset('img/art3.jpeg') }}" alt="img-4" class="image-item">
               <img src="{{ asset('img/travel.jpeg') }}" alt="img-5" class="image-item">
               <img src="{{ asset('img/travel1.jpeg') }}" alt="img-6" class="image-item">
               <img src="{{ asset('img/travel2.jpeg') }}" alt="img-7" class="image-item">
               <img src="{{ asset('img/travel3.jpeg') }}" alt="img-8" class="image-item">
               <img src="{{ asset('img/photography.jpeg') }}" alt="img-9" class="image-item">
               <img src="{{ asset('img/photography1.jpeg') }}" alt="img-10" class="image-item">
            </div>
            <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
         </div>

         <div class="slider-scrollbar">
            <div class="scrollbar-track">
               <div class="scrollbar-thumb">

               </div>
            </div>
         </div>
      </div>
   </div>
</body>
</html>