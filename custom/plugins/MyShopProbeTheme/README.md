# MyShopProbeTheme - FAQ Data Population

Ce document explique comment remplir la table des FAQs dans le plugin MyShopProbeTheme.

## Méthode 1: Utilisation de la commande SQL directe

Vous pouvez exécuter la commande SQL suivante pour insérer des données FAQ directement dans la base de données:

```bash
bin/console dbal:run-sql "INSERT INTO `myshopprobe_faq` (`id`, `question`, `answer`, `active`, `created_at`) VALUES
(UNHEX(REPLACE(UUID(), '-', '')), 'Was ist Masinga Tech?', 'Masinga Tech ist ein Unternehmen, das sich auf innovative digitale Lösungen zur Unterstützung Ihrer digitalen Transformation spezialisiert hat.', 1, NOW()),
(UNHEX(REPLACE(UUID(), '-', '')), 'Welche Dienstleistungen bieten Sie an?', 'Wir bieten Webentwicklung, mobile Apps, Beratung zur digitalen Transformation und Cloud-Hosting an.', 1, NOW()),
(UNHEX(REPLACE(UUID(), '-', '')), 'Wie kann man Sie kontaktieren?', 'Sie können uns über das Kontaktformular auf der Website oder per E-Mail an contact@masingatech.com erreichen.', 1, NOW()),
(UNHEX(REPLACE(UUID(), '-', '')), 'Bieten Sie technischen Support an?', 'Ja, wir bieten 24/7 technischen Support für alle unsere Kunden mit Wartungsvertrag.', 1, NOW());"
```

Cette commande insère 4 entrées FAQ avec des questions et réponses prédéfinies.

## Méthode 2: Utilisation de la commande personnalisée

Nous avons créé une commande personnalisée pour insérer les données FAQ. Exécutez la commande suivante:

```bash
bin/console myshopprobe:faq:create-data
```

Cette commande utilise l'API Shopware pour créer les mêmes entrées FAQ que la méthode SQL.

## Méthode 3: Installation/Réinstallation du plugin

Les données FAQ sont automatiquement chargées lors de l'installation du plugin. Si vous souhaitez réinstaller le plugin pour charger les données:

```bash
bin/console plugin:uninstall MyShopProbeTheme
bin/console plugin:install --activate MyShopProbeTheme
```

## Vérification des données

Pour vérifier que les données ont été correctement insérées, vous pouvez exécuter la commande SQL suivante:

```bash
bin/console dbal:run-sql "SELECT * FROM myshopprobe_faq"
```

## Notes importantes

- Assurez-vous que la table `myshopprobe_faq` existe avant d'insérer des données. Si elle n'existe pas, réinstallez le plugin.
- Si vous utilisez plusieurs méthodes, vous risquez d'avoir des entrées en double. Utilisez la commande suivante pour supprimer toutes les entrées avant d'en ajouter de nouvelles:

```bash
bin/console dbal:run-sql "DELETE FROM myshopprobe_faq"
```