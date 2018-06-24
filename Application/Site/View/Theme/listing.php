<div class="themes-container" style="display: flex;justify-content: center">
	<?php
	foreach ($this->params['themes'] as $theme)
	{
		?>
		<div class="theme" style="width: 75%;">
			<div class="theme-informations" style="text-align: center;width: 100%;display: flex;justify-content: space-between;flex-direction: row;">
				<h3><a href="./view/<?php $themeUrl = str_replace(' ', '-', $theme->name);echo $themeUrl; ?>"><?php echo $theme->name; ?></a></h3>
				<h3>Created by: <a href="../user/view/<?php echo $theme->author; ?>"><?php echo $theme->author; ?></a></h3>
			</div>
			<div class="theme-shortDescription" style="height: 75px;display: flex;justify-content: center;flex-direction: row">
				<p><?php echo $theme->shortDescription; ?></p>
			</div>
			<div class="theme-dates" style="text-align: center;width: 100%;display: flex;justify-content: space-between;flex-direction: row;">
				<h4>Creation date: <?php echo $theme->creationDate; ?></h4>
				<h4>Modification date: <?php echo $theme->modificationDate; ?></h4>
			</div>
		</div>
		<?php
	}
	?>
</div>