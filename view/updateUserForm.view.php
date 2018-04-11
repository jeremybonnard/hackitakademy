<form action="index.php?action=updateUserResponse">
	<input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf"/>
	<input type="hidden" value="<?php echo $user->getId();?>" name="id" />
	Pseudo :<input type="texte" value="<?php echo $user->getPseudo();?>" name="pseudo"/>
	Avatar (Laisser vide pour ne pas changer) :<input type="file" name="avatar"/>
	Mot de passe (Laisser vide pour ne pas changer) :<inpur type="texte" name="password"/>
</form>