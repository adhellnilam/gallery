<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>

   <!-- magnific popup css cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

   {{-- @vite(['resources/css/app.css']) --}}
</head>
<body>
   <div class="gallery">
      <ul class="controls">
         <li class="buttons active" data-filter="all">All</li>
         <li class="buttons" data-filter="ice-cream">Ice Cream</li>
         <li class="buttons" data-filter="chocolate">Chocolate</li>
         <li class="buttons" data-filter="cake">Cake</li>
         <li class="buttons" data-filter="juice">Juice</li>
         <li class="buttons" data-filter="sandwich">Sandwich</li>
      </ul>

      <div class="image-container">
         <a href="{{ asset('img/icecream.jpeg') }}" class="image ice-cream">
            <img src="{{ asset('img/icecream.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/icecream.jpeg') }}" class="image ice-cream">
            <img src="{{ asset('img/icecream.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/icecream.jpeg') }}" class="image ice-cream">
            <img src="{{ asset('img/icecream.jpeg') }}" alt="">
         </a>

         <a href="{{ asset('img/chocolate.jpeg') }}" class="image chocolate">
            <img src="{{ asset('img/chocolate.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/chocolate.jpeg') }}" class="image chocolate">
            <img src="{{ asset('img/chocolate.jpeg') }}" alt="">
         </a>

         <a href="{{ asset('img/cake.jpeg') }}" class="image cake">
            <img src="{{ asset('img/cake.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/cake.jpeg') }}" class="image cake">
            <img src="{{ asset('img/cake.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/cake.jpeg') }}" class="image cake">
            <img src="{{ asset('img/cake.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/cake.jpeg') }}" class="image cake">
            <img src="{{ asset('img/cake.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/cake.jpeg') }}" class="image cake">
            <img src="{{ asset('img/cake.jpeg') }}" alt="">
         </a>

         <a href="{{ asset('img/juice.jpeg') }}" class="image juice">
            <img src="{{ asset('img/juice.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/juice.jpeg') }}" class="image juice">
            <img src="{{ asset('img/juice.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/juice.jpeg') }}" class="image juice">
            <img src="{{ asset('img/juice.jpeg') }}" alt="">
         </a>

         <a href="{{ asset('img/sandwich.jpeg') }}" class="image sandwich">
            <img src="{{ asset('img/sandwich.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/sandwich.jpeg') }}" class="image sandwich">
            <img src="{{ asset('img/sandwich.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/sandwich.jpeg') }}" class="image sandwich">
            <img src="{{ asset('img/sandwich.jpeg') }}" alt="">
         </a>
         <a href="{{ asset('img/sandwich.jpeg') }}" class="image sandwich">
            <img src="{{ asset('img/sandwich.jpeg') }}" alt="">
         </a>
      </div>
   </div>

   <!-- jquery cdn link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <!-- magnific popup js cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

   <script>
      $(document).ready(function(){
         $('.buttons').click(function(){
            $(this).addClass('active').siblings().removeClass('active');

            var filter = $(this).attr('data-filter')

            if(filter== 'all'){
               $('.image').show(400);
            }else {
               $('.image').not('.'+filter).hide(200);
               $('.image').filter('.'+filter).show(400);
            }
         });

         $('.gallery').magnificPopup({
            delegate:'a',
            type:'image',
            gallery:{
               enabled:true
            }
         });
      });
   </script>
</body>
</html>