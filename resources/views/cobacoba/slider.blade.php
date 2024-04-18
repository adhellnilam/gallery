<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>

   @vite(['resources/css/slider.css'])
</head>
<body>
   <!-- Images from Craig Henry's Dribbble profile: http://dribbble.com/craighenry -->

   <ul class="slider">
      <li>
         <input type="radio" id="slide1" name="slide" checked>
         <label for="slide1"></label>
         <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/872485/coldchase.jpg" alt="Panel 1">
      </li>
      <li>
         <input type="radio" id="slide2" name="slide">
         <label for="slide2"></label>
         <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/980517/icehut_sm.jpg" alt="Panel 2">
      </li>
      <li>
         <input type="radio" id="slide3" name="slide">
         <label for="slide3"></label>
         <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/943660/hq_sm.jpg" alt="Panel 3">
      </li>
      <li>
         <input type="radio" id="slide4" name="slide">
         <label for="slide4"></label>
         <img src="https://dribbble.s3.amazonaws.com/users/322/screenshots/599584/home.jpg" alt="Panel 4">
      </li>
   </ul>

   {{-- <div class="semuanya">
      <div class="slider">
      <div class="slider-wrapper flex">
        <div class="slide flex">
          <div class="slide-image slider-link prev"><img src="https://goranvrban.com/codepen/img2.jpg"><div class="overlay"></div></div>
          <div class="slide-content">
            <div class="slide-date">30.07.2017.</div>
            <div class="slide-title">LOREM IPSUM DOLOR SITE MATE, AD EST ABHORREANT</div>
            <div class="slide-text">Lorem ipsum dolor sit amet, ad est abhorreant efficiantur, vero oporteat apeirian in vel. Et appareat electram appellantur est. Ei nec duis invenire. Cu mel ipsum laoreet, per rebum omittam ex. </div>
            <div class="slide-more">READ MORE</div>
          </div>	
        </div>
        <div class="slide flex">
          <div class="slide-image slider-link next"><img src="https://goranvrban.com/codepen/img3.jpg"><div class="overlay"></div></div>
          <div class="slide-content">
            <div class="slide-date">30.08.2017.</div>
            <div class="slide-title">LOREM IPSUM DOLOR SITE MATE, AD EST ABHORREANT</div>
            <div class="slide-text">Lorem ipsum dolor sit amet, ad est abhorreant efficiantur, vero oporteat apeirian in vel. Et appareat electram appellantur est. Ei nec duis invenire. Cu mel ipsum laoreet, per rebum omittam ex. </div>
            <div class="slide-more">READ MORE</div>
          </div>	
        </div>	
        <div class="slide flex">
          <div class="slide-image slider-link next"><img src="https://goranvrban.com/codepen/img5.jpg"><div class="overlay"></div></div>
          <div class="slide-content">
            <div class="slide-date">30.09.2017.</div>
            <div class="slide-title">LOREM IPSUM DOLOR SITE MATE, AD EST ABHORREANT</div>
            <div class="slide-text">Lorem ipsum dolor sit amet, ad est abhorreant efficiantur, vero oporteat apeirian in vel. Et appareat electram appellantur est. Ei nec duis invenire. Cu mel ipsum laoreet, per rebum omittam ex. </div>
            <div class="slide-more">READ MORE</div>
          </div>	
        </div>
          <div class="slide flex">
          <div class="slide-image slider-link next"><img src="https://goranvrban.com/codepen/img6.jpg"><div class="overlay"></div></div>
          <div class="slide-content">
            <div class="slide-date">30.10.2017.</div>
            <div class="slide-title">LOREM IPSUM DOLOR SITE MATE, AD EST ABHORREANT</div>
            <div class="slide-text">Lorem ipsum dolor sit amet, ad est abhorreant efficiantur, vero oporteat apeirian in vel. Et appareat electram appellantur est. Ei nec duis invenire. Cu mel ipsum laoreet, per rebum omittam ex. </div>
            <div class="slide-more">READ MORE</div>
          </div>	
        </div>
      </div>
      <div class="arrows">
      <a href="#" title="Previous" class="arrow slider-link prev"></a>
      <a href="#" title="Next" class="arrow slider-link next"></a>
      </div>
      </div>
   </div>  --}}
</body>
</html>