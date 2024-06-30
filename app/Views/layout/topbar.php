 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

   <div class="d-flex align-items-center justify-content-between">
     <a href="/dashboard" class="logo d-flex align-items-center">
       <img src="assets/img/hmti.png" alt="">
       <span class="d-none d-lg-block">Inventaris HIMA-TI</span>
     </a>
     <i class="bi bi-list toggle-sidebar-btn"></i>
   </div><!-- End Logo -->

   <nav class="header-nav ms-auto">
     <ul class="d-flex align-items-center">
       </li><!-- End Messages Nav -->
       <li class="nav-item dropdown pe-3">
         <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
           <i class="bi bi-person-circle"></i>
           <span class="d-none d-md-block dropdown-toggle ps-2"><?= $level_user; ?></span>
         </a><!-- End Profile Icon -->


         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           <li class="dropdown-header">
             <h6><?= $nama_user ?></h6>
             <span><?= $level_user ?></span>
           </li>

           <li>
             <hr class="dropdown-divider">
           </li>

           <li>
             <button class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
               <i class="bi bi-box-arrow-right"></i>
               <span>Log Out</span>
             </button>
           </li>

         </ul><!-- End Profile Dropdown Items -->
       </li><!-- End Profile Nav -->

     </ul>
   </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->