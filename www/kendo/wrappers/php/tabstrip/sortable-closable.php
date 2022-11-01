<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

 <div class="demo-section k-content wide">

<?php
    $tabstrip = new \Kendo\UI\TabStrip('tabstrip');

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Baseball")
        ->selected(true)
        ->startContent();
?>
  <p>Baseball is a bat-and-ball sport played between two teams of nine players each.
  The aim is to score runs by hitting a thrown ball with a bat and touching a series of four bases arranged at the corners of a ninety-foot diamond.
  Players on the batting team take turns hitting against the pitcher of the fielding team, which tries to stop them from scoring runs by getting hitters out in any of several ways.
  A player on the batting team can stop at any of the bases and later advance via a teammate's hit or other means.
  The teams switch between batting and fielding whenever the fielding team records three outs.
  One turn at bat for each team constitutes an inning and nine innings make up a professional game.
  The team with the most runs at the end of the game wins.</p>
<?php
    $item->endContent();
    $tabstrip->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Golf")
        ->startContent();
?>
  <p>Golf is a precision club and ball sport, in which competing players (or golfers) use many types of clubs to hit balls into a series of holes on a golf course using the fewest number of strokes.
  It is one of the few ball games that does not require a standardized playing area.
  Instead, the game is played on golf courses, each of which features a unique design, although courses typically consist of either nine or 18 holes.
  Golf is defined, in the rules of golf, as playing a ball with a club from the teeing ground into the hole by a stroke or successive strokes in accordance with the Rules.</p>
<?php
    $item->endContent();
    $tabstrip->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Swimming")
        ->startContent();
?>
  <p>Swimming has been recorded since prehistoric times; the earliest recording of swimming dates back to Stone Age paintings from around 7,000 years ago.
  Written references date from 2000 BC.
  Some of the earliest references to swimming include the Gilgamesh, the Iliad, the Odyssey, the Bible, Beowulf, and other sagas.
  In 1578, Nikolaus Wynmann, a German professor of languages, wrote the first swimming book, The Swimmer or A Dialogue on the Art of Swimming (Der Schwimmer oder ein Zwiegespräch über die Schwimmkunst).
  Competitive swimming in Europe started around 1800, mostly using breaststroke.</p>
<?php
    $item->endContent();
    $tabstrip->addItem($item);

    $item = new \Kendo\UI\TabStripItem();
    $item->text("Snowboarding")
        ->startContent();
?>
  <p>Snowboarding is a sport that involves descending a slope that is covered with snow on a snowboard attached to a rider's feet using a special boot set onto a mounted binding.
  The development of snowboarding was inspired by skateboarding, sledding, surfing and skiing.
  It was developed in the U.S.A. in the 1960s to 1970s and became a Winter Olympic Sport in 1998.</p>
<?php

    $item->endContent();
    $tabstrip->addItem($item);
    echo $tabstrip->render();
?>

</div>

<script>
	var tabstrip;

	var configureSortable = function () {
		$("#tabstrip ul.k-tabstrip-items").kendoSortable({
			filter: "li.k-item",
			axis: "x",
			container: "ul.k-tabstrip-items",
			hint: function (element) {
				return $("<div id='hint' class='k-widget k-header k-tabstrip'><ul class='k-tabstrip-items k-reset'><li class='k-item k-state-active k-tab-on-top'>" + element.html() + "</li></ul></div>");
			},
			start: function (e) {
				tabstrip.activateTab(e.item);
			},
			change: function (e) {
				var tabstrip = $("#tabstrip").data("kendoTabStrip"),
					reference = tabstrip.tabGroup.children().eq(e.newIndex);

				if (e.oldIndex < e.newIndex) {
					tabstrip.insertAfter(e.item, reference);
				} else {
					tabstrip.insertBefore(e.item, reference);
				}
			}
		});
	};

	var configureCloseTab = function () {
		var tabsElements = $('#tabstrip li[role="tab"]');
		tabsElements.append('<span data-type="remove" class="k-link"><span class="k-icon k-i-x"></span></span>');

		tabstrip.tabGroup.on("click", "[data-type='remove']", function (e) {
			e.preventDefault();
			e.stopPropagation();

			var item = $(e.target).closest(".k-item");
			tabstrip.remove(item.index());

			if (tabstrip.items().length > 0 && item.hasClass('k-state-active')) {
				tabstrip.select(0);
			}
		});
	};

	$(document).ready(function () {
		tabstrip = $('#tabstrip').data('kendoTabStrip');
        configureSortable();
        configureCloseTab();
    });
</script>

<style>
	.button-container {
		padding-top: 1em;
		text-align: right;
	}

	.k-tabstrip .k-tabstrip-items li .k-link {
		padding-right: 0.46em;
	}

		.k-tabstrip .k-tabstrip-items li .k-link[data-type='remove'] {
			padding-left: 0.46em;
		}

		.k-tabstrip .k-tabstrip-items li .k-link .k-icon {
			margin: 0;
		}

			.k-tabstrip .k-tabstrip-items li .k-link .k-icon:hover {
				color: red;
			}

	.k-tabstrip .k-content {
		padding-top: 10px;
		padding-bottom: 10px;
	}

	#hint {
		border: none;
	}

		#hint .k-tabstrip-items {
			padding: 0;
		}
</style>

<?php require_once '../include/footer.php'; ?>
