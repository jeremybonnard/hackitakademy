Membres - Lebret Maxime, Bonnard Jérémy, Roche Vincent, Bouilhac Maxence

Victimes - Janin Jean, Henri Terrier, Chloé Beaufils 
===================
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

Exemple :
http://192.168.33.10/msg.php?id=21%20AND%20substring(version(),%201,%201)%20=%204  // Ne fonctionne pas donc pas bon
http://192.168.33.10/msg.php?id=21%20AND%20substring(version(),%201,%201)%20=%205 // Fonctionne donc c'est lui!