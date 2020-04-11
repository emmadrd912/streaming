# Site Streaming
## Architecture du site
### For a premium user
```
Home
-- Login
--- Forgotten password
--- Catalog (with all movies and series)
---- Player
--- My account
---- Edit
--- Billing
---- Add Payment method
---- Cancel plan
--- Invoices
--- Agenda
--- Logout
```
### For a free user
```
Home
-- Login
--- Forgotten password
--- Catalog (with 2 random movies and 1 random tv show episode per day)
---- Player
--- My account
---- Edit
--- Billing
---- Add Payment method
---- Cancel plan
--- Invoices
--- Agenda
--- Logout
```
### For an admin user
```
Home
-- Login
--- Forgotten password
--- Catalog (with all movies and series)
---- Player
--- My account
---- Edit
--- Admin panel
---- Create user
---- Edit 
---- Delete
--- Video panel
---- Create content
---- Edit
---- Delete
--- Agenda panel
---- Create agenda
--- Agenda
```
## Architecture de la base de données
![database diagram](rendu/diagram.png)
## Fonctionnalités majeures
### Paiements par mois
### Stream vidéo
Utilisation du player plyr
### Upload de vidéo et de série
### Détection automatique des métadata d'une vidéo
Grace au nom d'une vidéo nous arrivons automatiquement récuperer ses informations (Synopsis, note, date de sortie, etc...
### Catalogue gratuit de contenu
Toute les 24 heures le catalogue de vidéo pour les utilisateurs gratuit s'actualise
## Capture d'écrans
