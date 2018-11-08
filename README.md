# Shopware Subscriber in Plugins Test

Ein Beispiel Plugin, we Subscriber in Shopware Plugins getestet werden können.

Aktuell ist folgendes Problem vorhanden:
- nur beim ersten Test wird das ```onUpdateArticle``` im Test korrekt aufgerufen

## Lösung des Problems

In der Konfigurationsdatei von PHPUnit kann ein Parameter ```processIsolation="true"``` angegeben werden. Dieser bewirkt, dass die bootstrap.php bei jedem Test neu gestartet wird. 
Mit dieser Konfiguration werden nun alle Events korrekt getriggert und ausgeführt.

## Hinweis 

Die Tests werden in einer über Composer installierten Shopware Version ausgeführt. Wurde Shopware über den Standard-Installer aufgesetzt, muss die bootsrap.php eine andere autoload.php Datei bedingen (vendor/autoload.php). Auch in der config.php Datei muss der Pfad entsprechend umgestellt werden.

## Hinweis 2

Dass die Test nicht korrekt zurückgesetzt werden, ist aktuell auch in folgendem Issue festgehalten: https://github.com/shopware/shopware/pull/1376 Sobald der Fix durch ist, sollte es auch ohne ```processIsolation="true"``` funktionieren.

## Problem 2

Im aktuellen Testfall ist es wohl auch so, dass Hooks nicht ausgeführt werden. Im Beispiel wurde dafür der TestCase3 hinzugefügt.

