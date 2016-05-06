

  <div class="wrapper">
   <!-- Advertisers Section -->
    <section id="advertisersInfo" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Listings</h2>
                <p>Grayscale is a free Bootstrap 3 theme created by Start Bootstrap. It can be yours right now, simply download the template on <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
                <p>This theme features stock photos by <a href="http://gratisography.com/">Gratisography</a> along with a custom Google Maps skin courtesy of <a href="http://snazzymaps.com/">Snazzy Maps</a>.</p>
                <p>Grayscale includes full HTML, CSS, and custom JavaScript files along with LESS files for easy customization.</p>
                 <a href="#publishersInfo" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Publishers Section -->
        <section id="publishersInfo" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>All Listings</h2>
                <?php
			foreach($listings as $listing):?>
				<ul class="listings">
                <h2><?= $listing->id; ?></h2>
               <li><?= $listing->category; ?></li>
				<li><?= $listing->title; ?></li>
				<li><?= $listing->currentPrice; ?></li>
				<li><?= $listing->auctionEndDateTime; ?></li>
				<li><?= $listing->auctionStartDateTime; ?></li>
				<li><?= $listing->location; ?></li>
				<li><?= $listing->description; ?></li>
                </ul>
			<?php endforeach; ?>
                 <a href="#technologyInfo" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>


    
    </div>

