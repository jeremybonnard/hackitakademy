Members - Lebret Maxime, Bonnard Jérémy, Roche Vincent, Bouilhac Maxence
Victime - Janin Jean, Henri Terrier, Chloé Beaufils 
Failles XSS en mode facile : 

Niveau 1
Il suffit de rajouter un espace dans la balise pour faire en sorte d'éviter le remplacement.

Niveau 2
On remplace bien les 2 premiers chevront ouvrant et fermant pas des balises script. Il suffit d'ajouter deux autre chevrons

NOTE HACK Groupe5


Faille XSS
 Sur le champ insert_signature

Après avoir insérer la signature le message peut contenir le script et l’exécuter dès qu'on clique sur le message ce qui revient à une faille XSS stocké 
Correction :
Utiliser htmlentities
Exemple : <script>document.cookie</script>

Faille de restriction
Accès au données sans connexion nécessaire 
Aucun droits appliqués
Sans être connecté on peut supprimer les messages de n’importe quel utilisateur 
Correction : 
Initialiser la vérification de la connexion de l’utilisateur sur toutes les pages

Injection SQL :
Avec SQLmap nous avons pu récupérer les tables les bases de données… 
Exemples :
La connexion est fonctionnelle sûrement protégé par htmlentities 
Correction : 
Utilisation de fonction physique prévue à cet effet : PDO prepare, mysql_  real_ escape_string
