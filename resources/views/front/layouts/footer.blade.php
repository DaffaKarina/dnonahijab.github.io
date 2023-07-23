 <footer class="footer-area section_gap">
     <div class="container">
         <div class="row">
             <div class="col-lg-2 col-md-6 single-footer-widget">
                 <h4>Menu Navigasi</h4>
                 <ul>
                     <li><a href="{{ route('home') }}">Beranda</a></li>
                     <li><a href="{{ route('shop') }}">Toko</a></li>
                     <li><a href="{{ route('about') }}">Tentang</a></li>
                 </ul>
             </div>
         </div>
         <div class="footer-bottom row align-items-center">
             <p class="footer-text m-0 col-lg-8 col-md-12">
                 Copyright &copy;
                 <script>
                 document.write(new Date().getFullYear());
                 </script> D'Nona Hijab. All rights reserved.
             </p>
             {{--  <div class="col-lg-4 col-md-12 footer-social">
                 <a href="#"><i class="fa fa-facebook"></i></a>
                 <a href="#"><i class="fa fa-twitter"></i></a>
                 <a href="#"><i class="fa fa-dribbble"></i></a>
                 <a href="#"><i class="fa fa-behance"></i></a>
             </div>  --}}
         </div>
     </div>
 </footer>