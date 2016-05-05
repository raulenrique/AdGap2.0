<div class="row">
	<div class="col-xs-12">
		<h1>listngs</h1>
		<?php
			foreach($listings as $listing):?>
				<h2><?= $listing->title; ?></h2>
				<p><?= $listing->id; ?></p>
				<p><?= $listing->currentPrice; ?></p>
				<p><?= $listing->auctionEndDate; ?><?= $listing->auctionEndTime; ?></p>
				<p><?= $listing->auctionListDate; ?><?= $listing->auctionListTime; ?></p>
				<p><?= $listing->location; ?></p>
				<p><?= $listing->description; ?></p>
			<?php endforeach; ?>
		
	</div>
	
</div>