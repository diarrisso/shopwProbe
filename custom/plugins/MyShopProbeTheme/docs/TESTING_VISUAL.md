# Guide Visuel de Test pour le Module FAQ dans le Backend Shopware 6

Ce document fournit un guide visuel étape par étape pour tester le module FAQ dans l'administration Shopware 6.

## Étape 1: Accéder à l'Administration Shopware 6

Ouvrez votre navigateur et accédez à l'URL de votre administration Shopware 6:
```
https://shopw-probe.ddev.site/admin
```

![Login Screen](../docs/images/login-screen.png)
*Note: Remplacez cette image par une capture d'écran réelle de votre écran de connexion*

## Étape 2: Naviguer vers le Module CMS

1. Dans le menu latéral, cliquez sur **Contenu**
2. Sélectionnez **Mise en page** dans le sous-menu

![CMS Navigation](../docs/images/cms-navigation.png)
*Note: Remplacez cette image par une capture d'écran réelle de votre navigation CMS*

## Étape 3: Créer une Nouvelle Page CMS

1. Cliquez sur le bouton **Créer une mise en page** en haut à droite
2. Choisissez le type de mise en page (par exemple, "Page de contenu")
3. Donnez un nom à votre mise en page, par exemple "Page FAQ"
4. Cliquez sur **Créer**

![Create CMS Page](../docs/images/create-cms-page.png)
*Note: Remplacez cette image par une capture d'écran réelle de la création de page CMS*

## Étape 4: Ajouter le Bloc FAQ

1. Dans l'éditeur de mise en page, recherchez la section **Blocs** dans le panneau de gauche
2. Cliquez sur l'onglet **Texte**
3. Trouvez le bloc **FAQ Liste** et faites-le glisser dans la zone de contenu de votre page

![Add FAQ Block](../docs/images/add-faq-block.png)
*Note: Remplacez cette image par une capture d'écran réelle de l'ajout du bloc FAQ*

## Étape 5: Configurer l'Élément FAQ

1. Cliquez sur l'élément FAQ que vous venez d'ajouter pour le sélectionner
2. Dans le panneau de droite, configurez les options:
   - **Titre**: Modifiez le titre qui sera affiché au-dessus de la liste FAQ
   - **Nombre maximum d'éléments**: Définissez le nombre maximum de FAQs à afficher

![Configure FAQ Element](../docs/images/configure-faq-element.png)
*Note: Remplacez cette image par une capture d'écran réelle de la configuration de l'élément FAQ*

## Étape 6: Enregistrer et Prévisualiser

1. Cliquez sur le bouton **Enregistrer** en haut à droite
2. Pour prévisualiser votre page, cliquez sur le bouton **Prévisualiser**

![Save and Preview](../docs/images/save-preview.png)
*Note: Remplacez cette image par une capture d'écran réelle des boutons d'enregistrement et de prévisualisation*

## Étape 7: Assigner la Page CMS à une Catégorie

1. Dans le menu latéral, cliquez sur **Catalogue**
2. Sélectionnez **Catégories** dans le sous-menu
3. Sélectionnez la catégorie à laquelle vous souhaitez assigner la page CMS
4. Dans l'onglet **CMS**, sélectionnez votre page FAQ dans le menu déroulant "Mise en page"
5. Cliquez sur **Enregistrer**

![Assign to Category](../docs/images/assign-category.png)
*Note: Remplacez cette image par une capture d'écran réelle de l'assignation à une catégorie*

## Étape 8: Créer une Page d'Atterrissage Dédiée

1. Dans le menu latéral, cliquez sur **Contenu**
2. Sélectionnez **Pages d'atterrissage** dans le sous-menu
3. Cliquez sur **Créer une page d'atterrissage**
4. Remplissez les informations nécessaires:
   - Nom: "FAQ"
   - URL: "faq"
   - Sélectionnez votre mise en page FAQ dans le menu déroulant
5. Cliquez sur **Enregistrer**

![Create Landing Page](../docs/images/create-landing-page.png)
*Note: Remplacez cette image par une capture d'écran réelle de la création d'une page d'atterrissage*

## Étape 9: Vérifier le Résultat dans le Storefront

1. Accédez au storefront de votre boutique
2. Naviguez vers la catégorie ou la page d'atterrissage où vous avez assigné votre page FAQ
3. Vous devriez voir la liste des FAQs avec les questions et réponses
4. Cliquez sur une question pour vérifier que la réponse s'affiche correctement

![Storefront Result](../docs/images/storefront-result.png)
*Note: Remplacez cette image par une capture d'écran réelle du résultat dans le storefront*

## Dépannage Visuel

### Si le bloc FAQ n'apparaît pas dans l'éditeur CMS:

1. Vérifiez que le plugin est activé dans la liste des plugins:

![Plugin List](../docs/images/plugin-list.png)
*Note: Remplacez cette image par une capture d'écran réelle de la liste des plugins*

2. Videz le cache et compilez les assets d'administration:

```
bin/console cache:clear
bin/console administration:build
```

### Si les FAQs ne s'affichent pas dans le storefront:

1. Vérifiez que des données FAQ existent dans la base de données:

![Database Check](../docs/images/database-check.png)
*Note: Remplacez cette image par une capture d'écran réelle de la vérification de la base de données*

2. Videz le cache du storefront:

```
bin/console cache:clear
bin/console theme:compile
```

## Conclusion

Vous avez maintenant un guide visuel complet pour tester le module FAQ dans le backend de Shopware 6. Suivez ces étapes pour créer et configurer facilement des pages FAQ dans votre boutique.

*Note: Pour utiliser ce guide visuel, vous devrez créer un dossier `images` dans le répertoire `docs` et y ajouter vos propres captures d'écran.*