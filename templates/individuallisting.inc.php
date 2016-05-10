<div class="wrapper">

    <!-- Publishers Section -->
        <section id="individualListing" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <ol class="breadcrumb">
                  <li><a href=".\">Home</a></li>
                  <li><a href=".\?page=listings">All Listings</a></li>
                  <li class="active"><?= $listing->title; ?></li>
                </ol>
                <h2><?= $listing->title; ?></h2>
                 <a href="#recommendedAuctions" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
                <p>
                <a href=".\?page=listing.edit&amp;id=<?= $listing->id; ?>" class="btn btn-default">
                <span class="glyphicon glyphicon-pencil"></span> Edit Listing</a>
              </p>
            </div>
        </div>
    </section>


    
    </div>
