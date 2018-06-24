<div class="theme" style="border: 1px solid #212121;border-radius: 5px">
	<div class="theme-informations" style="text-align: center;width: 100%;display: flex;justify-content: space-between;flex-direction: row;">
		<h1><a href="./view/<?php $themeUrl = str_replace(' ', '-', $this->params[0][0]->name);echo $themeUrl; ?>"><?php echo $this->params[0][0]->name; ?></a></h1>
		<h2>Created by: <a href="../user/view/<?php echo $this->params[0][0]->author; ?>"><?php echo $this->params[0][0]->author; ?></a></h2>
	</div>
	<div class="theme-longDescription" style="height: 75px;display: flex;justify-content: center;flex-direction: row">
		<h4><?php echo $this->params[0][0]->longDescription; ?></h4>
	</div>
	<div class="theme-datesAndDownload" style="text-align: center;width: 100%;display: flex;justify-content: space-between;flex-direction: row;">
		<h4>Creation date: <?php echo $this->params[0][0]->creationDate; ?></h4>
		<a href="<?php echo $this->params[0][0]->downloadUrl; ?>" class="btn btn-primary">Télécharger le thème</a>
		<h4>Modification date: <?php echo $this->params[0][0]->modificationDate; ?></h4>
	</div>
</div>
<div class="comments" style="border: 1px solid #212121;border-radius: 5px">
	<h4>Comments for theme <?php echo $this->params[0][0]->name; ?></h4>
	<div class="comments">
		<?php
		foreach ($this->params[1] as $article)
		{
			?>
			<div>
				<h4>From: <a href="../user/view/<?php echo $article->author; ?>"><?php echo $article->author; ?></a></h4>
				<h5><?php echo $article->comment; ?></h5>
			</div>
			<?php
		}
		?>
	</div>
</div>