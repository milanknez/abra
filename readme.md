Abra.local Project
=================

stručná dokumentace a vypracování k api


Zadání
------------

Vytvořit aplikaci v Nette, která

- Na zavolání adresy /import načte data z API systému ABRA Flexi
- Endpoint: https://nejlepsi.flexibee.eu/c/d450
- Dotaz: GET /faktura-prijata.json?detail=custom:id,kod,datVystaveni,datSplat,sumCelkem
- Basic Auth: user: d450, password: d450d450
- Data si uloží do databáze (MS SQL nebo PostgreSQL)
- Bude mít jednoduché REST API pro získání dat ze své databáze
- Na výchozí adrese ( / ) bude mít stránku jednoduše nastylovanou pomocí SASS
- Stránka bude obsahovat Kendo UI komponentu Grid, která bude data, získaná přes API, vypisovat.

API
------------

### Import přijatých faktur do aplikace

- URL: `http://abra.local/import/`

### Výpis všech přijatých faktur

- URL: `http://abra.local/api/`

### Výpis konkrétný faktury dle id

- URL: `http://abra.local/api/id/5`