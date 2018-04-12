Membres - Lebret Maxime, Bonnard Jérémy, Roche Vincent, Bouilhac Maxence
===================

Pour sécurisé notre application nous avons utiliser une class security qui possède différent niveau de sécurité pour varier les plaisirs...


Failles : 
===================

Niveau 1
Sécurité :

On strtolower donc la faille n'est pas sensible à la case.
On supprimer les balises "<script>" et "</script>".
On supprimer le ; pour éviter les multiples appels sql

Faille :
L'espace dans la balise script 
Les balises SQL sont toutes possible mais uniquement une seul.
--------------------


Niveau 2
Tout comme le premier niveau on traite la chaîne de character avec strtolower ainsi que le ;
On ajoute les symboles suivant :
"
& "espace"
/
|
#
On remplace bien les 2 premiers chevrons ouvrants et fermants par des balises script. 

Faille : 
Il suffit d'ajouter deux autre chevrons.
On peut utiliser UNION et AND dans les requêtes SQL
--------------------

Pro Tips : Bien penser a créer la base de données hack avant de lancer le script.sql avec la commande mysql -uroot -padmin hack < script.sql
DROP DATABASE IF EXISTS hack;
CREATE DATABASE hack;
--------------------
