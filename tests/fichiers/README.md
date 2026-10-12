# Fichiers de test

Rangez ici vos petits fichiers de cas difficiles : un CSV d'une vingtaine de lignes par cas, comme le demande la section « Données pour démarrer » du sujet (point-virgule et encodage Windows-1252, dates françaises, puissances en kW, lignes sans coordonnées, doublons).

Donnez à chaque fichier un nom qui dit ce qu'il teste, par exemple `point-virgule-cp1252.csv`.

Git conserve ce dossier à l'octet près (voir `.gitattributes`), et votre éditeur n'y corrige ni l'encodage ni les fins de ligne (voir `.editorconfig`). C'est voulu : un fichier en Windows-1252 converti en UTF-8 par mégarde ne teste plus rien.

Les jeux ouverts complets (Marseille, Antibes...) ne vont pas ici. Ils se téléchargent depuis data.gouv.fr, et un extrait de quelques lignes suffit pour un test.
