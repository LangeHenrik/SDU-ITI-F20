<?php
include '../app/views/partials/menu.php'; ?>

    <div class="container">
        <div class="content">
        	Search by User or Header: <input type="text" id="query" onkeyup="showResults(this.value)"/>
        	<div id="results">
        		<?php foreach($viewbag['pictures'] as $pic):?>
					<div class="picture">
						<div class="header"><?= $pic["header"] ?> <br/>by<br/> <?= $pic["username"] ?></div>
						<img src="<?= $pic["img"] ?>"/>
						<div class="description"><?= $pic["description"] ?></div>
					</div>
					<br>
				<?php endforeach; ?>
        	</div>
        </div>
    </div>

<?php
include '../app/views/partials/footer.php'; ?>
