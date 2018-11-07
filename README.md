# Shopware Subscriber in Plugins Test

Ein Beispiel Plugin, we Subscriber in Shopware Plugins getestet werden können.

Aktuell ist folgendes Problem vorhanden:
- nur beim ersten Test wird das ```onUpdateArticle``` im Test korrekt aufgerufen

## Lösung des Problems

In der Konfigurationsdatei von PHPUnit kann ein Parameter ```processIsolation="true"``` angegeben werden. Dieser bewirkt, dass die bootstrap.php bei jedem Test neu gestartet wird. 
Mit dieser Konfiguration werden nun alle Events korrekt getriggert und ausgeführt.

