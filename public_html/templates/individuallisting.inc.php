<?php 
  $errors = $newcomment->errors;

?>
<div class="individualListingsPage">

    <!-- Publishers Section -->
        <section id="individualListing" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <ol class="breadcrumb">
                  <li><a href=".\">Home</a></li>
                  <li><a href=".\?page=listings">All Listings</a></li>
                  <li class="active"><?= $listing->title; ?></li>
                </ol>
                <h2><?= $listing->category; ?></h2>
                <p><?= $listing->title; ?></p>
                <p><?= $listing->buyNowPrice; ?></p>
                <p><?= $listing->location; ?></p>
                <p><?= $listing->description; ?></p>
                <p><?= $listing->url; ?></p>

                <ul class="list-inline">
                  <?php foreach ($tags as $tag): ?>
                    <li><span class="label label-default"><?= $tag->tag; ?></span></li>
                  <?php endforeach; ?>
                </ul>
                
                <?php if ((static::$auth->isAdmin()) || ($permit)): ?>
                <p>
                <a href=".\?page=listing.edit&amp;id=<?= $listing->id; ?>" class="btn btn-edit">
                <span class="glyphicon glyphicon-pencil"></span> Edit Listing</a>
              </p>
               <?php endif; ?>

            <h3>Questions and Answers</h3>

            <?php if(count($comments) > 0) : ?>
              <?php $count = 0; ?>
              <?php foreach ($comments as $comment) : ?>
                <?php $count++; ?>
                <div class="media">
                <div class="media-left">
                    <img class="media-object" src="<?= $comment->user()->gravatar(48, 'identicon') ; ?>" alt="avatar">
                </div>
                <div class="media-body">
                  <h4 class="media-heading"># <?= $count;?> <?= $comment->user()->username;?></h4>
                  <p><?= $comment->comment;?></p>
                </div>
                </div>
              <?php endforeach; ?>
 
          <?php else: ?>
            <p>No Questions and Answers yet. Be the first. </p>
          <?php endif; ?>
          
          <h4>Add Question to '<?= $listing->title ?>'</h4>
          <?php if (static::$auth->check()): ?>
            <div class="col-lg-8, col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
            <form method="POST" action="./?page=comment.create" class="form-horizontal">
              
              <input type="hidden" name="listing_id" value="<?= $listing->id ?>">

              <div class="form-group <?php if ($errors['comment']): ?> has-error <?php endif; ?>">
                <label for="comment" class="control-label">Comment</label>
                <div class="commentBox">
                  <textarea id="comment" class="form-control" name="comment" rows="5"></textarea>
                  <div class="help-block"><?= $errors['comment']; ?></div>
                </div>
              </div>

              <div class="form-group">
                 <p>
                <a href=".\?page=listing&amp;id=<?= $listing->id; ?>" class="btn btn-edit">
                <span class="glyphicon glyphicon-pencil"></span> Ask Question</a>
              </p>
              </div>
            </form>
            </div>
          <?php else: ?>
            <p>Please <a href="./?page=login">login</a> or <a href="./?page=register">register</a> to add a question.</p>
          <?php endif; ?>

            </div>
        </div>
    </section>


    
    </div>
