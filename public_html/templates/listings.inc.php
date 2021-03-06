<? $tempCount = 0; ?>
<div class="listingsPage">
   <!-- Banner Section -->
    <section id="listingsHeader" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
             <h2>SAVE BIG <u>TODAY</u> ON ONE OF THESE AWESOME AD SPACES</h2>  
                </a>
            </div>
        </div>
    </section>

    <!-- Display All Listings Section -->
        <section id="allListings" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
             <ol class="breadcrumb">
                  <li><a href=".\">Home</a></li>
                  <li class="active">All Listings</a></li>
                </ol>
              <h2>Current Listings</h2>
          
          <?php if(count($listings) > 0): ?>
          <ul class="listings">
                
                <?php
                foreach($listings as $listing):?>

                <? $tempCount++;
                   if ($tempCount % 2 == 1): ?>
                
                  <ul class="listings listings-left">
                    <li><h3 class="list-title"><?= $listing->category; ?></h3><h3 class="list-price">$<?= $listing->buyNowPrice; ?></h3></li>
                    <li><h3><a href=".\?page=listing&amp;id=<?= $listing->id?>"><?= $listing->title; ?></a></h3></li>
                  </ul>
                <? elseif($tempCount % 2 == 0): ?>
                  <ul class="listings listings-right">
                    <li><h3 class="list-title"><?= $listing->category; ?></h3><h3 class="list-price">$<?= $listing->buyNowPrice; ?></h3></li>
                    <li><h3><a href=".\?page=listing&amp;id=<?= $listing->id?>"><?= $listing->title; ?></a></h3></li>
                  </ul>
                <? endif ;?>
                 <?php endforeach; ?>
          </ul>
        </div>

            </div>

         
          <?php else: ?>
          <p>There are currently no listings to show you probably cause they've all been sold ;). Check back soon!!! </p>
          <?php endif; ?>
            <?php if(static::$auth->isAdmin() || static::$auth->isRegisteredUser())  : ?>
            <div class="form-group">
                  <div class="createListinga">
                    <a href=".\?page=listing.create" class="btn btn-create"><span class="glyphicon glyphicon-plus"></span> Create Listing</a>
                  </div>
              <?php endif; ?>

              <?php $this->paginate(".\?page=listings", $pageNumber, $pageSize, $recordCount); ?>

          
    </section>
</div>

