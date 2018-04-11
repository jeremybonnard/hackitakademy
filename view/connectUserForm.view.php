<?php if(isset($erreur) && $erreur == true)
{
	echo "La combinaison mot de passe utilisateurs est incorrect!";
}
?>
<form action="index.php?action=connectUserResponse">
	Pseudo :<input type="text" name="pseudo"/>
	<BR/> Mot de passe : <input type="password" name="password">
</form>