# SnowTricks
Pour mon projet 3

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/c25fbf44607c471f922a9356a2cf1dc8)](https://www.codacy.com/manual/Laurent78990/SnowTricks?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Laurent78990/SnowTricks&amp;utm_campaign=Badge_Grade)


Les instructions pour installer le projet

Préparation base de donnée :
Dans phpMyAdmin, créez la base de donnée : ocr_p3,
Importez la base de donnée ocr_p3.sql jointe aux livrables
 
Installation du projet dans l’environnement Symfony :
Copiez le lien du répository : https://github.com/Laurent78990/SnowTricks.git
Ouvrez le répertoire racine de vos projets avec Gitbash ou VS Code, puis tapez les commandes suivantes :
> Git clone https://github.com/Laurent78990/SnowTricks.git
> Composer update

Dans le fichier .env se trouvant à la racine du répertoire, modifiez l’URL de votre base phpMyAdmin avec les paramètres correspondant à votre configuration locale :
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/ocr_p3

Tapez maintenant la commande : 
> php bin/console server:run
Pour accéder au site, entrez l’URL suivant dans votre navigateur : http://127.0.0.1:8001/