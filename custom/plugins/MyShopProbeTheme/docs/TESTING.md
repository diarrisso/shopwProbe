# Guide de Test pour le Module FAQ dans le Backend Shopware 6

Ce document explique comment tester le module FAQ que nous avons créé dans l'administration (backend) de Shopware 6.

## Prérequis

- Le plugin MyShopProbeTheme doit être installé et activé
- Vous devez avoir accès à l'administration Shopware 6
- Des données FAQ doivent être présentes dans la base de données (voir README.md pour les instructions)

## Accéder à l'Administration Shopware 6

1. Ouvrez votre navigateur et accédez à l'URL de votre administration Shopware 6, généralement:
   ```
   https://votre-domaine.com/admin
   ```
   ou si vous utilisez DDEV:
   ```
   https://shopw-probe.ddev.site/admin
   ```

2. Connectez-vous avec vos identifiants administrateur.

## Tester le Module FAQ via le CMS

### Étape 1: Créer une Nouvelle Page CMS

1. Dans le menu latéral, cliquez sur **Contenu**.
2. Sélectionnez **Mise en page** dans le sous-menu.
3. Cliquez sur le bouton **Créer une mise en page** en haut à droite.
4. Choisissez le type de mise en page (par exemple, "Page de contenu").
5. Donnez un nom à votre mise en page, par exemple "Page FAQ".
6. Cliquez sur **Créer**.

### Étape 2: Ajouter le Bloc FAQ

1. Dans l'éditeur de mise en page, recherchez la section **Blocs** dans le panneau de gauche.
2. Cliquez sur l'onglet **Texte**.
3. Trouvez le bloc **FAQ Liste** et faites-le glisser dans la zone de contenu de votre page.

### Étape 3: Configurer l'Élément FAQ

1. Cliquez sur l'élément FAQ que vous venez d'ajouter pour le sélectionner.
2. Dans le panneau de droite, vous verrez les options de configuration:
   - **Titre**: Vous pouvez modifier le titre qui sera affiché au-dessus de la liste FAQ.
   - **Nombre maximum d'éléments**: Définissez le nombre maximum de FAQs à afficher.

3. Configurez ces options selon vos préférences.

### Étape 4: Enregistrer et Prévisualiser

1. Cliquez sur le bouton **Enregistrer** en haut à droite.
2. Pour prévisualiser votre page, cliquez sur le bouton **Prévisualiser** à côté du bouton Enregistrer.
3. Une nouvelle fenêtre s'ouvrira avec un aperçu de votre page FAQ.

### Étape 5: Assigner la Page CMS à une Catégorie ou une Page d'Atterrissage

#### Pour assigner à une catégorie:

1. Dans le menu latéral, cliquez sur **Catalogue**.
2. Sélectionnez **Catégories** dans le sous-menu.
3. Sélectionnez la catégorie à laquelle vous souhaitez assigner la page CMS.
4. Dans l'onglet **CMS**, sélectionnez votre page FAQ dans le menu déroulant "Mise en page".
5. Cliquez sur **Enregistrer**.

#### Pour créer une page d'atterrissage dédiée:

1. Dans le menu latéral, cliquez sur **Contenu**.
2. Sélectionnez **Pages d'atterrissage** dans le sous-menu.
3. Cliquez sur **Créer une page d'atterrissage**.
4. Remplissez les informations nécessaires:
   - Nom: "FAQ"
   - URL: "faq" (ou un autre chemin de votre choix)
   - Sélectionnez votre mise en page FAQ dans le menu déroulant.
5. Cliquez sur **Enregistrer**.

## Vérifier le Résultat dans le Storefront

1. Accédez au storefront de votre boutique.
2. Naviguez vers la catégorie ou la page d'atterrissage où vous avez assigné votre page FAQ.
3. Vous devriez voir la liste des FAQs avec les questions et réponses.
4. Cliquez sur une question pour vérifier que la réponse s'affiche correctement.

## Dépannage

Si vous ne voyez pas le bloc FAQ dans l'éditeur CMS:

1. Assurez-vous que le plugin est correctement installé et activé.
2. Videz le cache de Shopware:
   ```
   bin/console cache:clear
   ```
3. Compilez les assets d'administration:
   ```
   bin/console administration:build
   ```
4. Rafraîchissez la page d'administration.

Si les FAQs ne s'affichent pas dans le storefront:

1. Vérifiez que des données FAQ existent dans la base de données:
   ```
   bin/console dbal:run-sql "SELECT * FROM myshopprobe_faq"
   ```
2. Assurez-vous que les FAQs sont marquées comme actives.
3. Videz le cache du storefront:
   ```
   bin/console cache:clear
   bin/console theme:compile
   ```

## Conclusion

Vous avez maintenant testé avec succès le module FAQ dans le backend de Shopware 6. Vous pouvez créer des pages CMS contenant des listes FAQ et les assigner à différentes parties de votre boutique.