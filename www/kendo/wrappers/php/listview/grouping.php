<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$jsonData = "[
                {
                    'Country': 'Belgium',
                    'Title': 'BRUSSELS, BELGIUM',
                    'Description': 'Chocolate, beer, music and surrealism.',
                    'ImageUrl': 'brussels-180x150.png'
                },
                {
                    'Country': 'Portugal',
                    'Title': 'PORTO, PORTUGAL',
                    'Description': 'Taste it, drink it, eat it, love it. Bem-vindo ao Porto!',
                    'ImageUrl': 'porto-180x150.png'
                },
                {
                    'Country': 'Spain',
                    'Title': 'MALAGA, SPAIN',
                    'Description': 'Enjoy the perfect climat.',
                    'ImageUrl': 'malaga-180x150.png'
                },
                {
                    'Country': 'Hungary',
                    'Title': 'BUDAPEST, HUNGARY',
                    'Description': 'One of the most exciting cities in the world.',
                    'ImageUrl': 'budapest-180x150.png'
                },
                {
                    'Country': 'Slovakia',
                    'Title': 'BRATISLAVA, SLOVAKIA',
                    'Description': 'A modern city on the Danube.',
                    'ImageUrl': 'bratislava-180x150.png'
                },
                {
                    'Country': 'Italy',
                    'Title': 'FLORENCE, ITALY',
                    'Description': 'Love and culture are everywhere!',
                    'ImageUrl': 'florence-180x150.png'
                },
                {
                    'Country': 'Poland',
                    'Title': 'POZNAN, POLAND',
                    'Description': 'A unique heritage with rich cultural offer.',
                    'ImageUrl': 'poznan-180x150.png'
                },
                {
                    'Country': 'Greece',
                    'Title': 'ATHENS, GREECE',
                    'Description': 'The biggest open-air museum in Europe.',
                    'ImageUrl': 'athens-180x150.png'
                },
                {
                    'Country': 'Bulgaria',
                    'Title': 'SOFIA, BULGARIA',
                    'Description': 'One of Europe`s oldest cities.',
                    'ImageUrl': 'sofia-180x150.png'
                },
                {
                    'Country': 'France',
                    'Title': 'BORDEAUX, FRANCE',
                    'Description': 'Discover exciting new facets of its character.',
                    'ImageUrl': 'bordeaux-180x150.png'
                },
                {
                    'Country': 'Switzerland',
                    'Title': 'GENEVA, SWITZERLAND',
                    'Description': 'One of the most welcoming cities in Europe.',
                    'ImageUrl': 'geneva-180x150.png'
                },
                {
                    'Country': 'Latvia',
                    'Title': 'RIGA, LATVIA',
                    'Description': 'At the crossroads of various nations and cultures.',
                    'ImageUrl': 'riga-180x150.png'
                },
                {
                    'Country': 'Span',
                    'Title': 'SEVILLE, SPAIN',
                    'Description': 'Seville. Any time of year…',
                    'ImageUrl': 'seville-180x150.png'
                },
                {
                    'Country': 'France',
                    'Title': 'COLMAR, FRANCE',
                    'Description': 'A condensed version of the Alsace region.',
                    'ImageUrl': 'colmar-180x150.png'
                },
                {
                    'Country': 'Austria',
                    'Title': 'VIENNA, AUSTRIA',
                    'Description': 'The Giant Ferris Wheel is awaiting you.',
                    'ImageUrl': 'vienna-180x150.png'
                },
                {
                    'Country': 'France',
                    'Title': 'MONTPELLIER, FRANCE',
                    'Description': 'Smart, Mediterranean, attractive, welcoming and festive.',
                    'ImageUrl': 'montpellier-180x150.png'
                },
                {
                    'Country': 'Spain',
                    'Title': 'VALENCIA, SPAIN',
                    'Description': 'Sun, culture, history and future. ',
                    'ImageUrl': 'valencia-180x150.png'
                },
                {
                    'Country': 'Spain',
                    'Title': 'BARCELONA, SPAIN',
                    'Description': 'Barcelona never sleeps.',
                    'ImageUrl': 'barcelona-180x150.png'
                },
                {
                    'Country': 'Italy',
                    'Title': 'MILAN, ITALY',
                    'Description': 'The hub of Italian culture',
                    'ImageUrl': 'milan-180x150.png'
                },
                {
                    'Country': 'Poland',
                    'Title': 'GDANSK, POLAND',
                    'Description': 'You`ll be amazed by the beauty of Gdansk.',
                    'ImageUrl': 'gdansk-180x150.png'
                },
                {
                    'Country': 'Italy',
                    'Title': 'ROME, ITALY',
                    'Description': 'Treat yourself to a stay in the Eternal City.',
                    'ImageUrl': 'rome-180x150.png'
                },
                {
                    'Country': 'Scotland',
                    'Title': 'EDINBURGH, SCOTLAND',
                    'Description': 'Shopping, dining & architectural splendour.',
                    'ImageUrl': 'edinburgh-180x150.png'
                },
                {
                    'Country': 'Portugal',
                    'Title': 'LISBON, PORTUGAL',
                    'Description': 'The pure pleasure of being in one of the best cities in the world.',
                    'ImageUrl': 'lisbon-180x150.png'
                }
            ]";
				
$cleanJsonText = str_replace("'","\"",$jsonData); 

$destinations = json_decode($cleanJsonText, true);				
?>

<script type="text/x-kendo-tmpl" id="template">
   <div class="k-listview-item">
       <h4 class="k-group-title">#= data.value #</h4>
       <div class="cards">
           # for (var i = 0; i < data.items.length; i++) { #
           <div class="k-card" style="width: 15em; margin:2%">
               <img class="k-card-image" src="#=destinationURL(data.items[i].ImageUrl)#" />
               <div class="k-card-body">
                   <h4 class="k-card-title">#= data.items[i].Title #</h4>
                   <h5 class="k-card-subtitle">#= data.items[i].Description #</h5>
               </div>
           </div>
           # } #
       </div>
       <h5 class="k-group-footer"> #=data.items.length# Destinations in #= data.value #</h5>
   </div>
</script>

<script>

    function destinationURL(name) {
        return 'https://demos.telerik.com/blazor-ui/images/destinations/' + name;
    }
	
</script>

<div class="demo-section k-content wide">
<?php

$groupItem = new \Kendo\Data\DataSourceGroupItem();
$groupItem->field('Country')
	      ->dir('desc')		
		  ->compare(new \Kendo\JavaScriptFunction('function (a, b) {
                        if (a.items.length === b.items.length) {
                            return 0;
                        } else if (a.items.length > b.items.length) {
                            return 1;
                        } else {
                            return -1;
                        }
                    }'));

$dataSource = new \Kendo\Data\DataSource();			
$dataSource->data($destinations)
           ->addGroupItem($groupItem);
		   
$listview = new \Kendo\UI\ListView('listView');
$listview->dataSource($dataSource)
         ->templateId('template');

echo $listview->render();
?>
</div>

<style>
    #listView .k-listview-content {
        height: 65em;
    }

        #listView .k-listview-content .k-listview-item {
            padding: 2%;
        }

            #listView .k-listview-content .k-listview-item:after {
                content: '';
                width: 95%;
                height: 2px;
                background: #F4F4F4;
                position: absolute;
            }


            #listView .k-listview-content .k-listview-item .cards {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
            }

    #listView .k-group-title {
        font-family: inherit;
        font-size: 20px;
        line-height: normal;
        font-weight: 400;
        margin: 0 0 14px;
        color: #FF9992;
        text-transform: uppercase;
        font-weight: 600;
    }

    #listView .k-group-footer {
        font-family: inherit;
        font-size: 17px;
        line-height: normal;
        font-weight: 400;
        margin: 0 0 14px;
        color: #8A8A8A;
    }
</style>

<?php require_once '../include/footer.php'; ?>
