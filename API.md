# Main Api
**BaseUrl**
http://ws.seloger.com

## Total
    GET /nbAnnoncesTotal.xml


## Search
    GET /search.xml


## Details
    GET /annonceDetail.xml

# User Api
**BaseUrl**
http://service-espace-perso.svc.groupe-seloger.com/EspacePerso.svc/

## Email Exist
    GET  /EspacePerso.svc/IsExist
    **_string_** email

## Login
    GET  /EspacePerso.svc/Login
    **_string_** email
    **_string_** password

```xml
<CompteReponse xmlns="http://schemas.datacontract.org/2004/07/EspacePersoService" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <codeRetour>4</codeRetour>
    <jeton i:nil="true"/>
    <message>Le Compte existe en mode full (nous devons juste nous connecter)</message>
</CompteReponse>
```
