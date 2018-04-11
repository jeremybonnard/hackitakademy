<?php if(isset($erreur) && $erreur == true)
{
	echo "La combinaison mot de passe utilisateurs est incorrect!";
}
?>
<form action="index.php?action=userConnectResponse" method="POST">
	Pseudo :<input type="text" name="pseudo"/>
	<BR/> Mot de passe : <input type="password" name="password"/>
	<BR/> <input type="submit" value="Connecter"/>
</form>