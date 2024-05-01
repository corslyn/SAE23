# FCSMobilité


[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
Réalisé avec [![Laravel][Laravel.com]][Laravel-url]

**Menu:**
<ul>
    <a href="#👥-Présentation-générale">👥 Présentation générale</a>
</ul>
<ul>
    <a href="#📝-Guide-utilisateur">📝 Guide utilisateur</a>
</ul>
<ul>
    <a href="#🛠️-Guide-développeur">🛠️ Guide développeur</a>
    <ul>
        <li>
            <a href="#Installation">Installation</a>
        </li>
        <li>
            <a href="#Script-dbmgr">Script dbmgr</a>
        </li>
        <li>
            <a href="#Panel-administrateur">Panel administrateur</a>
        </li>
        <li>
            <a href="#Compréhension-générale-de-Laravel">Compréhension générale de Laravel</a>
        </li>
        <ul>
            <li>
                <a href="#Public">Dossier public</a>
            </li>
            <li>
                <a href="#Resources">Dossier resources</a>
            </li>
            <li>
                <a href="#Routes">Dossier routes</a>
            </li>
            <li>
                <a href="#Database">Dossier database</a>
            </li>
            <li>
                <a href="#App">Dossier app</a>
            </li>
            <ul>
                <li>
                    <a href="#AppHttpMiddlewares">App/Http/Middlewares</a>
                </li>
                <li>
                    <a href="#AppHttpRequests">App/Http/Requests</a>
                </li>
                <li>
                    <a href="#AppHttpControllers">App/Http/Controllers</a>
                </li>
             </ul>
        </ul>
        <li>
            <a href="#Installation">PHPMyAdmin</a>
        </li>
    </ul>
</ul>

## 👥 Présentation générale
Notre groupe de projet a été sollicité par le FCSM pour développer un outil informatique répondant aux besoins des étudiants de votre formation universitaire, ainsi que le service de développement du fan club du FCSM. Il s'agissait globalement d'organiser la mise en contact des étudiants qui étudient dans la même ville, qui habitent dans la même ville, et qui se rendent aux mêmes endroits pour ses études, ses loisirs ou pour ses courses. La cible loisir se restreindra à l'accès au FCSM. Peut-être que les étudiants se déplacent aux mêmes moments. C'est ce que l'application va déterminer et proposer des déplacements en commun par le covoiturage.

Pour réaliser ce projet, nous avons choisi de répartir les tâches parmi les 4 personnes:
- **IDIRI** Anas : Développement et implémentation du backend, MCD, MPD
- **MANZINALI** Enzo: Déploiement, Administration système, développement backend, scripting (dbmgr)
- **MARC** Romain: MCD, MPD, Documentation, Base de donnée, développement frontend
- **CONIGLIO** Alexis: Développement frontend

Le backend sera realisé à l'aide de PHP, plus particulièrement du framework Laravel, la base de donnée que nous avons choisie est MariaDB (ou MySQL). Quant au frontend il sera réalisé à l'aide de CSS natif.
Pour faire une parenthèse sur le Framework Laravel, celui-ci utilise l'approche MVC (Modèle -> couche d'abstraction pour l'accès aux relations, Vue -> partie HTML/CSS/JS, Controller -> partie logique avec le code qui utilise les Modèles et qui affiche les vues)
Celui-ci vient avec d'autres fonctionnalitées, tels que les Middlewares, la validation des requêtes, les migrations (on écrit la création des tables en PHP et en migrant celui-ci les créé), les seeders (permet de remplir la base de donnée avec des informations de tests), et enfin le routing, qui permet de mapper les URL aux controller.

La partie backend et des explications plus avancée de sa réalisation seront abordées dans la partie <a href="#🛠️-Guide-développeur">guide développeur</a>. Dans la partie suivant nous aborderons la partie guide d'utilisateur qui vous expliquera comment utiliser le site web sans forcément comprendre comment fonctionne la partie logique.

## 📝 Guide utilisateur
1. Cette application s'adresse aux étudiants de l'université de Nord Franche-Comté ayant pour objectifs le déplacement entre leur domicile, l'IUT, le stade Bonal et autre lieux d'intérêt.
2. Un email (personnel ou unviersitaire) est requis pour la création d'un compte.
3. Lors de l'inscription, il est nécessaire de choisir votre sous groupe (groupe de TP) pour l'importation de l'emploi du temps.
4. L'utilisateur peut ajouter un véhicule à son profil s'il veut effectuer du covoiturage. L'immatriculation du véhicule doit être introduite
5. L'utilisateur devra introduire dans la section ***Lieux*** une adresse de domicile, de travail ou de passage.
6. Lorsque l'utilisateur ne spécifie pas la nature de l'adresse (domicile OU travail), elle est automatiquement indiquée comme adresse de passage.
7. Une adresse de passage est un lieu pris en charge par le chef de l'équipage, s'assurant de passer à l'adresse fournie.
8. Pour préparer un déplacement, rejoindre la séction ***Déplacement***
9. Un équipage sera composé d'au moins un chef d'équipage --> le propriétaire du véhicule.
10. Pour inviter des personnes à rejoindre votre équipage, un lien sera disponible dans le bas de la page ***Equipage***



## 🛠️ Guide développeur

### Installation
Si vous souhaitez installer l'application sur votre serveur ou votre ordinateur personnel, suivez les étapes ci-dessous.

Étant basé sur Laravel, l'installation du projet nécessitera **composer** et **php**. Il nécessitera également que vous installiez **mysql** ou **mariadb** pour la partie base de donnée. Récuperez le code depuis le repo git qui sera fourni en annexe, ouvrez votre terminal, rendez vous dans le dossier et installez les dépendances avec:
```bash
composer install
```

Attendez la fin de l'exécution de la commande, et créez la base de donnée et les tables associées en utilisant:
```bash
php artisan migrate
```
Cette commande va créer la base de donnée, et automatiquement créer toutes les tables nécessaires au bon fonctionnement.

Une fois cela fait, vous pourrez facilement lancer l'application en faisant:
```bash
php artisan serve
```
Ce qui lancera l'application sur le port 8000 par défaut. Vous pouvez lui passer certains flags pour customizer son comportement:
```bash
php artisan serve --host 0.0.0.0 --port XXX
```
avec XXX le numéro de port sur lequel vous souhaitez hébérger l'application.


### Script dbmgr

Afin de faciliter la phase de développement, nous avons réalisé un script: dbmgr. À noter que celui-ci n'est pas qu'un script; c'est une dépendance de l'application utilisée au niveau de la page d'administration. 
Pour l'utiliser vous aurez besoin de lui donner les droits d'exécution. Pour ce faire, rendez vous dans le dossier du projet, et tapez:

```bash
chmod +x dbmgr
```

Vous pourrez alors afficher le menu d'aide à l'aide de la commande:

```bash
./dbmgr -h
Database management tool

Usage: ./dbmgr [OPTIONS] [FILE] 

Options: 
    -r,--remove   <INPUT_JSON>        JSON to database (replace) 
    -a,--add      <INPUT_JSON>        JSON to database (add)
    -x,--export   <OUTPUT_JSON>       Database to JSON
    -ct,--clear-table   <TABLE>       Delete all records of one table    
    -dd,--drop-database               Drop the database 
    -m,--migrate                      Migrate & Seed the database with Laravel artisan     


```

Ainsi, ce script permet d'exporter la base de donnée sous forme d'un fichier JSON, d'importer un fichier JSON (remplacer complètement la base de donnée OU ajouter le contenu du JSON dans la base de donnée), de supprimer une table, de supprimer la base de donnée, ou de migrer + seeder la base de donnée (Créer la base de donnée + les tables + ajouter un jeu de test).


### Panel administrateur
Suivez les étapes vue ci-dessus pour utiliser dbmgr, et tapez:
```bash

./dbmgr -m
```
Ceci va utiliser les seeders de Laravel pour préremplir votre base de donnée. Ceci ajoutera entre autre un utilisateur administrateur:
**`admin@localhost : admin`**

Si vous utilisez le serveur web installé par nos soins (dont le lien sera fourni en annexe), sachez que la DB à déjà été seedée. Vous pourrez donc vous connecter à la partie administration, puis vous rendre dans le panel admin.


### Compréhension générale de Laravel

Laravel est un des Framework web les plus populaire, cependant il n'est pas toujours aisé de comprendre à quoi servent les répértoires, qu'est ce qui était la avec le framework et qu'est ce qui a été ajouté par le développeur.
Je vous propose une overview rapide des différents répértoire afin que vous ayez une meilleure compréhension.

```
tree -L 1  

├── app
├── artisan
├── bootstrap
├── composer.json
├── composer.lock
├── config
├── database
├── dbmgr
├── Makefile
├── phpmyadmin
├── phpunit.xml
├── public
├── README.md
├── resources
├── routes
├── storage
├── tests
└── vendor

```

La majorité des répértoires présents ne seront pas vu ici, certains étant utile lors de projets plus complexe, et certains n'étant rien de plus que des dépendances de Laravel.
Ce qui va nous intéresser ici, c'est les dossiers app,database,public,ressource et routes.

##### Public
Commencons au plus simple, le dossier public contient le CSS minifié, le JS minifié, les images ... Petite particularité, nous avons placé phpmyadmin dans le dossier public de sorte à ce que vous puissiez gérer la base de donnée avec. Nous en parlons un peu plus tard.

##### Resources
Le dossier resources contient le CSS non minifié ainsi que le JS non minifié. Il contient également les vues en blade, qui est le template engine de Laravel. Ces vues contiennent le HTML, et le code Blade qui permet l'affichage des choses sur la page. Par exemple on pourra afficher le contenu d'une variable, parcourir un tableau passé par le controlleur...

##### Routes
Le dossier route contient plusieurs fichier, mais un seul nous intéresse: le fichier web.php. Celui ci contient les déclarations des routes. C'est lui qui permet de dire "Si l'utilisateur va sur /admin, appelle le controlleur (une classe PHP qui contiendra la logique).

##### Database
Le dossier database contient 2 sous dossiers essentiels. D'abord le dossier migration, qui sont des fichiers PHP qui expliquent comment créer les tables, et ce qu'elles doivent contenir comme row. Ainsi, on a un fichier par table.
Le second dossier est le dossier seeder, il contient des classes qui nous permettent de remplir la base de donnée avec des informations de test. Ici nous avons créer 4 seeders pour les emplois du temps des 4 groupes, ainsi qu'un seeder user qui rajoute l'administrateur et 2 autres utilisateurs normaux (un avec 2FA activé, et l'autre sans 2FA).

##### App

Pour finir, le plus complexe, le dossier app.

###### App/Models

Ce dossier contient les Modèles. Un modèle est une classe PHP qui agit comme une couche d'abstraction vers la table SQL. Pour faire simple, on a un modèle par table, et on utilisera ce modèle quand on voudra intéragir avec la table. Les modèles contiennent aussi les relations ce qui est très pratique. 
On utilisera donc une syntaxe du type
```php
Utilisateurs::select("nom") -> where(id, "=", 10) -> orWhere(id, "=", 20) -> orderBy("id", desc);
```
au lieu de faire
```sql
SELECT nom FROM utilisateurs WHERE id=10 OR id=20 ORDER BY id DESC; 
```

L'avantage, c'est qu'on peut changer MariaDB par PostgreSQL, ou par Microsoft SQL Server ou par n'importe quel DBMS sans avoir à réecrire le code SQL.

###### App/Http/Middlewares

Un middleware est un bout de code qui est executé après la route, mais avant l'appel du code du Controller. Un exemple tout simple est l'exemple d'une page protégé par l'authentification.

Admettons qu'on ait une page /admin. Quand on arrive sur cette page on a un peu de logique à exécuter, on créera donc un controlleur AdminController. Pour faire le mapping on ira dans le fichier route, et on dira "La route /admin appelle le code présent dans le controller AdminController".

Grâce au middleware, on va dire "Entre l'accès à la route /admin et l'appelle du Controller AdminController, execute tel fonction". On pourra par exemple utiliser un petit bout de code qui vérifie que l'utilisateur est bien connecté, et est bien administrateur.

###### App/Http/Requests

Une request est une couche d'abstraction également. Ici pour rester simple, on va dire que plutot que d'intéragit avec $_POST on intéragit avec l'objet Request, qui est passé au Controlleur par une méthode qu'on appelle Dependency Injection.
Ce qui est intéressant, c'est qu'on peut effectuer de la validation sur ces requêtes pour vérifier que les champs sont bien remplit, et contiennent ce que l'on souhaite.

###### App/Http/Controllers

Contient les controlleurs, qui sont des classes PHP, qui contiennent des méthodes. Les méthodes contiennent la logique PHP. En général, on à une route qui map une URL à une méthode d'un Controlleur. Le controlleur fait des choses avec les Modèles (ajoute, supprime, édites des choses dans la table) et retourne une Vue à laquelle il passe des informations.


### PHPMyAdmin

Si vous voulez visualiser ou modifier la base de donnée de manière simple et efficace, vous pouvez utiliser phpmyadmin. Pour ce faire, rendez vous dans le Panel Admin et cliquez sur le bouton "Accéder à PHPMyAdmin", ou juste rendez vous sur l'url /phpmyadmin. 
Les credentials de la base de données sont:

- Nom d'utilisateur: root
- Mot de passe: root
- Nom de la base de donnée : sae23