Abra.local Project
=================

Spuštění
------------
* Run `composer install`
* Run `yarn install`
* Run `yarn encore dev`
* Create database `abra` with table


``` 
CREATE TABLE IF NOT EXISTS `invoice` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `kod` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `datVyst` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `datSplat` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `sumCelkem` float NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
```


API
------------

### Import přijatých faktur do aplikace

- URL: `http://abra.local/import/`

### Výpis všech přijatých faktur

- URL: `http://abra.local/api/`

### Výpis konkrétný faktury dle id

- URL: `http://abra.local/api/id/5`