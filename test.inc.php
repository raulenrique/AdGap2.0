

  <div class="wrapper">
   <!-- Advertisers Section -->
    <section id="listingsHeader" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
             <h2>SAVE BIG TODAY ON ONE OF THESE AWESOME AD SPACES</h2>  
                </a>
            </div>
        </div>
    </section>

    <!-- Publishers Section -->
        <section id="allListings" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>All Listings</h2>
               <div class="Listings">
              
                   <div class="leftListings">
                    <?php for ($i=0; $i < count($listings); $i+=2):?>
                       <ul>
                           <li><?= $listings->category; ?></li>
                           <li><?= $listings->currentPrice; ?></li>
                       </ul>
                    <?php endfor; ?>
                   </div>  

                   <div class="rightListings">
                   <!-- <?php for ($i=1; $i < count($listings); $i+=2):?>
                       <ul>
                           <li><?= $listings->category; ?></li>
                           <li><?= $listings->currentPrice; ?></li>
                       </ul>
                    <?php endfor; ?> -->
                   </div>
                    
               </div>
              
                 <a href="#technologyInfo" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>


    
    </div>
