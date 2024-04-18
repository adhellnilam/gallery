@extends('layouts.app')

@section('content')
<div class="all">
    <div class="judul">
        <p class="judul1">Welcome to the orgGallery<span style="color: #B67352">.</span></p>
        <p class="des">Explore amazing photo collections, find inspiration, and share your work with the world</p>
    </div> 
    
    <img src="{{ asset('img/nature5.png') }}" alt="Logo" class="nature">
    <hr style="border-top: 3px solid black; margin-top: 50px;">

    <div class="desk">
        <p class="abot">About Us</p>
        <p class="isi">orgGallery is not just an ordinary online gallery. It's a <br>guiding beacon for visual seekers. Here, light is not just <br> a photographic element, but a metaphor for the spirit <br> that unites us.</p>

        <img src="{{ asset('img/zigzag1.png') }}" alt="Logo" class="zigzag1">
        <div class="img">
            <img src="{{ asset('img/nature7.png') }}" alt="Logo" class="nature1">
            <img src="{{ asset('img/nature8.png') }}" alt="Logo" class="nature2">
        </div>
    </div>
    

    <hr style="border-top: 3px solid black; margin-top: 130px;">

    <div class="tengah">
        <img src="{{ asset('img/dots.png') }}" alt="Logo" class="dots">
        <div class="img1">
            <img src="{{ asset('img/nature6.png') }}" alt="Logo" class="nature3">
        </div>
        <div class="text">
            <p class="judul3">Explore, Dream, Discover</p>
            <p class="isi1">Come explore our photo gallery and let your imagination <br> run wild. Discover beauty in every corner of the world, and <br> let our photos be a window into your adventure.</p>
        </div>
    </div>

    <div class="tiga">
        <div class="wrap">
            <img src="{{ asset('img/line1.png') }}" alt="Logo" class="linek">
            <p class="the">The World Through Our Lens</p>
            <img src="{{ asset('img/nature9.png') }}" alt="Logo" class="image">
            <p class="deskrip">Witness the beauty of the world through our eyes. From <br> stunning natural views to precious little moments, our <br> photo galleries capture the wonders of the world <br> around us.</p>
        </div>
    </div>

    <div class="lima">
        <p class="our">Our Short Photo Collection</p>
        <img src="{{ asset('img/line1.png') }}" alt="Logo" class="lineS">
        <div class="semua1" style="margin-top: -50px">
            <div class="container">
               <div class="slider-wrapper">
                  <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
                  <div class="image-list">
                     <img src="{{ asset('img/art4.jpeg') }}" alt="img-1" class="image-item">
                     <img src="{{ asset('img/art5.jpeg') }}" alt="img-2" class="image-item">
                     <img src="{{ asset('img/art6.jpeg') }}" alt="img-3" class="image-item">
                     <img src="{{ asset('img/art7.jpeg') }}" alt="img-4" class="image-item">
                     <img src="{{ asset('img/art8.jpeg') }}" alt="img-5" class="image-item">
                     <img src="{{ asset('img/art9.jpeg') }}" alt="img-6" class="image-item">
                     <img src="{{ asset('img/art10.jpeg') }}" alt="img-7" class="image-item">
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
    </div>

    <div class="empat">
        <img src="{{ asset('img/nature10.png') }}" alt="Logo" class="image1">
        <p class="to">Unlock the Door to Mesmerizing Memories</p>
        <p class="deskrip1">Join our community and unlock access to a treasure trove <br> of captivating moments captured through our lenses. Let <br> each click take you on a journey through unforgettable <br> experiences.</p>
        <a href="{{ route('login') }}" class="btn btn5">Login Now!!</a>
    </div><br><br>
</div>
@endsection
