Membres - Lebret Maxime, Bonnard Jérémy, Roche Vincent, Bouilhac Maxence
Victimes - Janin Jean, Henri Terrier, Chloé Beaufils 
===================


Failles XSS en mode facile : 
===================

Niveau 1
Il suffit de rajouter un espace dans la balise pour faire en sorte d'éviter le remplacement.
--------------------

Niveau 2
On remplace bien les 2 premiers chevrons ouvrants et fermants par des balises script. Il suffit d'ajouter deux autre chevrons.
--------------------

NOTE HACK Groupe5
===================

Faille XSS
--------------------

Sur le champ insert_signature.


Après avoir inséré la signature le message peut contenir le script et l’exécuter dès qu'on clique sur le message ce qui revient à une faille XSS stockée.

Correction :
Utiliser htmlentities

Exemple : ```
<script>document.cookie</script>
```

Faille de restriction.
--------------------

Accès aux données sans connexion nécessaire.

Aucuns droits appliqués.

Sans être connecté on peut supprimer les messages de n’importe quel utilisateur.

Correction :
Initialiser la vérification de la connexion de l’utilisateur sur toutes les pages.

Injection SQL :
--------------------

Avec SQLmap nous avons pu récupérer les tables, les bases de données, etc 
Exemples :

La connexion est fonctionnelle car elle est sûrement protégée par htmlentities. 

Correction : 
Utilisation de fonction php prévue à cet effet : PDO prepare, mysql_real_escape_string.
