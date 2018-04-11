<form action="index.php?action=updateUserResponse">
	<input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf"/>
	<input type="hidden" value="<?php echo $user->getId();?>" name="id" />
	Pseudo :<input type="texte" value="<?php echo $user->getPseudo();?>" name="pseudo"/>
	<BR/>Avatar (Laisser vide pour ne pas changer) :<input type="file" name="avatar"/>
	<BR/>Mot de passe (Laisser vide pour ne pas changer) :<input type="texte" name="password"/>
	<input type="submit" value="Update"/>
</form>