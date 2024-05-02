# FCSMobilité


[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
Réalisé avec [![Laravel][Laravel.com]][Laravel-url]

**Menu:**
<ul>
    <a href="#-présentation-générale">👥 Présentation générale</a>
</ul>
<ul>
    <a href="#-guide-de-lutilisateur">📝 Guide de l'utilisateur</a>
</ul>
<ul>
    <a href="#%EF%B8%8F-guide-du-développeur">🛠️ Guide du développeur</a>
    <ul>
        <li>
            <a href="#%EF%B8%8F-installation">⚙️ Installation</a>
        </li>
        <li>
            <a href="#%EF%B8%8F-script-dbmgr">⌨️ Script dbmgr</a>
        </li>
        <li>
            <a href="#-panel-administrateur">👨‍💻 Panel administrateur</a>
        </li>
        <li>
            <a href="#%EF%B8%8F-phpmyadmin">🛢️ PHPMyAdmin</a>
        </li>
        <li>
            <a href="#-compréhension-générale-de-laravel">🌐 Compréhension générale de Laravel</a>
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
    </ul>
</ul>

## 👥 Présentation générale
Notre groupe de projet a été sollicité par le FCSM pour développer un outil informatique répondant aux besoins des étudiants de votre formation universitaire, ainsi que le service de développement du fan club du FCSM. Il s'agissait globalement d'organiser la mise en contact des étudiants qui étudient dans la même ville, qui habitent dans la même ville, et qui se rendent aux mêmes endroits pour leurs études, loisirs ou pour les courses. La cible loisir se restreindra à l'accès au FCSM. Peut-être que les étudiants se déplacent aux mêmes moments. C'est ce que l'application va déterminer et proposer des déplacements en commun par le biais du covoiturage.

Pour réaliser ce projet, nous avons choisi de répartir les tâches parmi les 4 personnes composant notre groupe:
- **IDIRI** Anas : Déploiement (Docker), Développement et implémentation du backend, MCD, MPD, Test du site
- **MANZINALI** Enzo : Déploiement (Docker), Administration système, Développement backend, scripting (dbmgr)
- **MARC** Romain : MCD, MPD, Documentation, Base de donnée, Développement frontend, Test du site
- **CONIGLIO** Alexis : Développement frontend, Recueil de données pour test

Le backend sera realisé à l'aide de PHP, plus particulièrement à l'aide du framework Laravel. La base de donnée que nous avons choisie est MariaDB (ou MySQL). Quant au frontend il sera réalisé à l'aide de HTML et de CSS natif.
Pour faire une parenthèse sur le Framework Laravel, celui-ci utilise l'approche MVC (Modèle -> couche d'abstraction pour l'accès aux relations, Vue -> partie HTML/CSS/JS, Controller -> code qui exécute la logique avec les Modèles et qui affiche les vues)
Celui-ci vient avec d'autres fonctionnalités, tels que les Middlewares, la validation des requêtes, les migrations, les seeders et j'en passe. 

La partie backend et des explications plus avancée de sa réalisation seront abordées dans la partie <a href="#🛠️-Guide-développeur">guide développeur</a>. 


## 📝 Guide de l'utilisateur

### Utilisation simple en 10 étapes
Cette application s'adresse aux étudiants de l'université de Nord Franche-Comté ayant pour objectifs le déplacement entre leur domicile, l'IUT, le stade Bonal et d'autres lieux d'intérêt, tel que leur lieu de travail.

**1.** ✉️ 
Un email (personnel ou universitaire) est requis pour la création d'un compte. Vous pouvez également choisir d'utiliser, ou non, **l'A2F** (Authentification à deux facteurs avec TOTP).

**2.** 🏫
Lors de l'inscription, il est nécessaire de choisir votre sous groupe (groupe de TP) pour l'importation de l'emploi du temps.

**3.** 🚘
L'utilisateur peut ajouter un véhicule à son profil au niveau de la page ***Véhicule*** s'il veut effectuer du covoiturage. L'immatriculation du véhicule ainsi que le nombre de place doivent être introduits. Si vous ne souhaitez plus prendre en charge le covoiturage, un formulaire est disponible sur la même page si vous souhaitez supprimer votre véhicule.

**4.** 🏘️
L'utilisateur devra introduire dans la section ***Lieux*** une adresse de domicile et de travail pour bénéficier des recommendations (page ***Recommendation***). 
Il peut également ajouter des lieux "pris en charge" (uniquement s'il possède un équipage) qu'il pourra par la suite utiliser en lieu de départ ou d'arrivé lors de la réalisation de déplacements (page ***Déplacement***) avec son équipage.

**5.** 👥
La page équipage permet de rejoindre des équipages ou d'en créer. Vous pouvez créer un et un seul équipage dont vous serez nommé chef au niveau de la page ***Équipage*** si vous possédez un véhicule. 
Lorsque vous créez un équipage, vous pouvez créer des déplacements que vous prendrez en charge avec votre véhicule. Ces déplacements auront pour Lieu de départ et Lieu d'arrivé un Lieu préalablement introduit dans la page ***Lieux*** que vous choisirez. Vous indiquerez également la date et la durée de ce trajet.

**6.** 👨‍👩‍👧
De manière générale, sur la page ***Équipages***, vous pouvez rejoindre une équipe par son nom, ou quitter une équipe préalablement rejointe.
Le chef de l'équipage aura en plus une section lui offrant la possibilité d'inviter des membres, ou d'exclure des membres de son équipe.

**7.** 🚙
Pour préparer ou visualiser tous les déplacements auxquels vous avez souscrit, rejoindre la séction ***Déplacement***. Si vous possédez un équipage, vous aurez la possibilité d'organiser des déplacements avec celui-ci. En dessous, vous aurez une visualisation de tous les déplacements auxquels vous avez souscrit. 
Pour faire simple, lorsque vous rejoignez un équipage, vous pourrez visualiser les déplacements prévus par celle-ci sur cette page. Par défaut, vous participez à tous les déplacements réalisés par les équipages auxquels vous appartenez.
De ce fait, vous verrez sur cette page la totalité des déplacements prévus par la totalité des équipages que vous avez rejoint.

**8.** 🔎
Pour trouver un équipage prenant en charge un certain déplacement, vous pouvez visualiser vos recommendations de déplacements dans la section ***Recommendations***. Celle-ci vous propose automatiquement des déplacements vers votre Lieu de travail ou vers votre Lieu de domiciliation, et vous offre la possibilité de rejoindre les équipages les organisant.
Vous pouvez également chercher un déplacement précis dans la section ***Accueil*** à l'aide de la barre de recherche. Celle-ci vous permet de trier par Lieu de départ, Lieu d'arrivé et date (il n'est pas obligatoire de compléter tous les champs), et vous offrira également la possibilité de rejoindre l'équipe organisant ce déplacement.

**9.** 👤
Une page profile est disponible et permet de changer les informations utilisateurs tels que le nom, l'email, le mot de passe, la formation ou le sous groupe.

**10.** ⚙️
Il existe une partie administrateurs disponible uniquement pour les utilisateurs possédant le role Admin (admin@localhost:admin, ou changer le champs is_admin de la table en le passant à true). Celle-ci permet d'intéragir avec un script nommé dbmgr. Si vous souhaitez en savoir plus, rendez-vous dans la <a href="#Panel-administrateur">section Panel Administrateur</a>.



## 🛠️ Guide du développeur

### ⚙️ Installation
Si vous souhaitez installer l'application sur votre serveur ou votre ordinateur personnel, suivez les étapes ci-dessous.

Étant basé sur Laravel, l'installation du projet nécessitera **composer** et **php**. Elle nécessitera également que vous installiez **mysql** ou **mariadb** pour la partie base de donnée. Vous avez tout le loisir d'installer cette Tech-Stack sur votre Serveur/PC, cependant nous avons jugé qu'il était plus pratique de mettre à votre disposition un Dockerfile ainsi qu'un docker-compose afin d'une part de nous permettre d'automatiser le déploiement, et d'autre part de vous faciliter son installation.

Vous aurez donc besoin d'installer <a href="https://docs.docker.com/engine/install/">le docker engine</a> si vous êtes sur Linux, ce qui est fortement recommandé. Si vous etes sur MAC OS ou Windows, installez Docker Desktop en suivant la documentation officielle de Docker.

ROuvrez un terminal, rendez-vous dans le bon dossier et lancez docker en tant que root (ou équivalent selon l'OS que vous utilisez):
```
git clone https://github.com/NullBrunk/SAE23/
cd SAE23  
docker-compose up
```


### ⌨️ Script dbmgr

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


### 👨‍💻 Panel administrateur
Suivez les étapes vue ci-dessus pour utiliser dbmgr, et tapez:
```bash

./dbmgr -m
```
Ceci va utiliser les seeders de Laravel pour préremplir votre base de donnée. Ceci ajoutera entre autre un utilisateur administrateur:
**`admin@localhost : admin`**

Si vous utilisez le serveur web installé par nos soins (dont le lien sera fourni en annexe), sachez que la DB à déjà été seedée. Vous pourrez donc vous connecter à la partie administration, puis vous rendre dans le panel admin.

### 🛢️ PHPMyAdmin

Si vous voulez visualiser ou modifier la base de donnée de manière simple et efficace, vous pouvez utiliser phpmyadmin. Pour ce faire, rendez-vous sur /phpmyadmin. Par exemple si le site est disponible sur http://127.0.0.1/ rendez vous sur http://127.0.0.1/phpmyadmin/

- Nom d'utilisateur: root
- Mot de passe: root
- Nom de la base de donnée : sae23


### 🌐 Compréhension générale de Laravel

Laravel est le Framework php le plus populaire, cependant il n'est pas toujours aisé de comprendre à quoi servent les répértoires. Il n'est également pas évident de savoir ce qui était la avec le framework et ce qui a été ajouté par le développeur du projet.
Je vous propose une overview rapide des différents fichiers et répértoire afin que vous ayez une meilleure compréhension de comment fonctionne ce framework.

**Fichiers**

./artisan
C'est un script qui vient par défaut avec Laravel. Il permet de créer des controllers, des request, des Models, des Migrations, de lancer les migrations, de Seed la base de donnée, de lancer un serveur web ... En bref c'est le couteau suisse de Laravel

./composer.json
Relatif à composer de manière générale (composer est le gestionnaire de dépendances de Laravel). Ce fichier contient le nom du projet, les dépendances du projet, les dépendances de développement (des packages que le développeur installe pour s'aider pendant le développement, comme une barre qui affiche le temps que prennent les requetes SQL par exemple), et la partie autoloading.

./.env
Fichier qui contient en général toutes les "constantes globales" du projet. Par exemple le nom de la base de donnée, le nom d'utilisateur et le mot de passe de la base de donnée etc... 

./.gitignore
Contient tous les fichiers à ne pas commit sur le repo git. 

./dbmgr
On traite de ce script <a href="#Script-dbmgr">ici</a>.

**Répértoires**

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
Ce qui va nous intéresser ici, sont les dossiers app,database,public,ressource et routes.

##### Public
Commençons au plus simple, le dossier public contient le CSS minifié, le JS minifié, les images ... Petite particularité, nous avons placé phpmyadmin dans le dossier public de sorte à ce que vous puissiez gérer la base de donnée avec. Nous en parlons un peu plus tard.

##### Resources
Le dossier resources contient le CSS non minifié ainsi que le JS non minifié. Il contient également les vues en blade, qui est le template engine de Laravel. Ces vues contiennent le HTML, et le code Blade qui permet l'affichage des choses sur la page. Par exemple on pourra afficher le contenu d'une variable, parcourir un tableau passé par le controlleur...

##### Routes
Le dossier route contient plusieurs fichiers, mais un seul nous intéresse: le fichier web.php. Celui-ci contient les déclarations des routes. C'est lui qui permet de dire "Si l'utilisateur va sur /admin, appelle le controlleur (une classe PHP qui contiendra la logique).

##### Database
Le dossier database contient 2 sous dossiers essentiels. D'abord le dossier migration, qui sont des fichiers PHP qui expliquent comment créer les tables, et ce qu'elles doivent contenir comme row. Ainsi, nous avons un fichier par table.
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

L'avantage, c'est qu'on peut changer MariaDB par PostgreSQL, par Microsoft SQL Server ou par n'importe quel DBMS sans avoir à réécrire le code SQL.

###### App/Http/Middlewares

Un middleware est un bout de code qui est executé après la route, mais avant l'appel du code du Controller. Un exemple tout simple est l'exemple d'une page protégée par l'authentification.

Admettons qu'on ait une page /admin. Quand on arrive sur cette page on a un peu de logique à exécuter, on créera donc un controlleur AdminController. Pour faire le mapping on ira dans le fichier route, et on dira "La route /admin appelle le code présent dans le controller AdminController".

Grâce au middleware, on va dire "Entre l'accès à la route /admin et l'appel du Controller AdminController, execute telle fonction". On pourra par exemple utiliser un petit bout de code qui vérifie que l'utilisateur est bien connecté, et est bien administrateur.

###### App/Http/Requests

Une request est une couche d'abstraction également. Ici pour rester simple, on va dire que plutot que d'intéragit avec $_POST on intéragit avec l'objet Request, qui est passé au Controlleur par une méthode qu'on appelle Dependency Injection.
Ce qui est intéressant, c'est qu'on peut effectuer de la validation sur ces requêtes pour vérifier que les champs sont bien remplis, et contiennent ce que l'on souhaite.

###### App/Http/Controllers

Contient les controlleurs, qui sont des classes PHP, qui contiennent des méthodes. Les méthodes contiennent la logique PHP. En général, on a une route qui map une URL a une méthode d'un Controlleur. Le controlleur fait des choses avec les Modèles (ajoute, supprime, édite des choses dans la table) et retourne une Vue à laquelle il passe des informations.



