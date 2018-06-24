<div class="register">

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
	<form action="register" method="post" style="text-align: center">
		<label>
			<h4>Pseudo</h4>
			<input type="text" name="pseudo" class="btn btn-default" placeholder="Pseudo">
		</label>
		<br/>
		<label>
			<h4>Nom et prénom</h4>
			<input type="text" name="surname" class="btn btn-default" placeholder="Nom">
			<input type="text" name="name" class="btn btn-default" placeholder="Prénom">
		</label>
		<br>
		<label>
			<h4>Mot de passe</h4>
			<input type="password" name="password" class="btn btn-default" placeholder="Mot de passe">
			<input type="password" name="confirm" class="btn btn-default" placeholder="Confirmation">
		</label>
		<br>
		<label>
			<h4>Email</h4>
			<input type="email" name="email" class="btn btn-default" placeholder="Email">
		</label>
		<br/>
		<label>
			<input type="submit" value="Créer un compte" class="btn btn-success">
		</label>
	</form>

</div>