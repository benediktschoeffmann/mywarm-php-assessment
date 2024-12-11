# Problembeschreibung

MyWarm.com möchte wissen, welche Leute ihre Webseite besuchen und trackt deshalb Besucher in der Form Date, PageId, UserId.

Sie möchten feststellen, welche Kunden "loyale Kunden" sind. Also solche, die:

* an 2 aufeinanderfolgenden Tagen auf der Website sind
* sich 2 unique Seiten angesehen haben

## Zusatzinfo:

Die Klassen in src/Model, bzw. das script in `scripts/` dient nur zur Datengenerierung, ihr müsst das nicht verwenden.

In der Datei `HOWTO.md` ist eine kleiner CSV-Walkthrough eingebettet. Die Bibliothek `league/csv` ist bereits im `composer.json`.