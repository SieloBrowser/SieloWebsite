<div class="login">

	<?php
	if(isset($this->params['returnError']))
	{
		?>
        <div class="error" style="text-align: center">
			<?php echo $this->params['returnError']; ?>
        </div>
		<?php
	}
	?>
	<form action="login" method="post" style="text-align: center">
		<label>
			<h4>Pseudo</h4>
			<input type="text" name="pseudo" class="btn btn-default" placeholder="Pseudo">
		</label>
		<br/>
		<label>
			<h4>Mot de passe</h4>
			<input type="password" name="password" class="btn btn-default" placeholder="Mot de passe">
		</label>
		<br/>
		<label>
			<input type="submit" value="Se connecter" class="btn btn-success">
		</label>
	</form>

</div>