# Main Api
**BaseUrl**
http://ws.seloger.com

## Total
```C#
GET /nbAnnoncesTotal.xml
```
```xml
<nbAnnoncesTotal>1466785</nbAnnoncesTotal>
```


## Search
```C#
GET /search.xml
string tri              (a_dt_crea|d_dt_crea|a_px|d_px|a_surface|d_surface) ORDER BY 
uint   idtt             (1|2) renting or selling
uint   SEARCHpg         pagination
uint   idtypebien       (0 -> 15) Multiple = Comma separated
uint   ci               Zipcode = Insee zipcode
uint   pxmin            Minimum Price
uint   pxmax            Maximum Price
uint   surfacemin       Minimum Surface
uint   surfacemax       Maximum Surface
uint   surf_terrainmin  Minimum landing surface
uint   surf_terrainmax  Maximum landing surface
mixed  piece            (0|1|2|3|4|+5|all) Multiple = Comma separated
uint   photo            (10|0) true or false

SI                      1 = true, 0 = false
uint   si_ascensceur    
uint   si_digicode
uint   si_interphone
uint   si_gardien
uint   si_piscine
uint   si_balcon
uint   si_parking
uint   si_box
uint   si_cave
```

## Details
```C#
GET /annonceDetail.xml
uint idAnnonce
```

# User Api
**BaseUrl**
http://service-espace-perso.svc.groupe-seloger.com/EspacePerso.svc/

## Email Exist
```C#
GET  /EspacePerso.svc/IsExist
string email
```
```xml
\\ Response example
<CompteReponse xmlns="http://schemas.datacontract.org/2004/07/EspacePersoService" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <codeRetour>4</codeRetour>
    <jeton i:nil="true"/>
    <message>Le Compte existe en mode full (nous devons juste nous connecter)</message>
</CompteReponse>
```
**codeRetour** 4 = success, 2 = error

## Login
```C#
GET  /EspacePerso.svc/Login
string email
string password
```
```xml
<AuthentificationReponse xmlns="http://schemas.datacontract.org/2004/07/EspacePersoService" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <idUser>4664511</idUser>
    <isRS>false</isRS>
    <jeton>MEmAt98ipE8=</jeton>
    <message>Succes</message>
    <success>true</success>
</AuthentificationReponse>
```
**idUser** 0 if connexion failed<br>
**jeton** is the user token

## Send My Password
```C#
GET  /EspacePerso.svc/RecoverProjet
string email
```
```xml
\\ Response example
<boolean xmlns="http://schemas.microsoft.com/2003/10/Serialization/">true</boolean>
```
