Corvus Changelog
================

This ChangeLog details all of the changes that were made (briefly) in each version of Corvus.
The format of this ChangeLog is the following:

[**Version Number**]

-   Commit summary - *git commit sha*

---


[**1.1**]

-   Renamed Changelog to CORVUS-CHANGELOG.md, changed the format from txt to markdown and moved it to the root dir
-   Updated changelog with everything that was changed in v1.1 - *096c9a3c4d04bb19700de0af0fb6cb998c24d5c6*
-   Updated Corvus version to 1.1 - *2fe7226333488c48d5c85d9823a83b7112a37850*
-   Added repositoryClass definitions to xEntity.orm.yml files to like the EntityRepository's to the Entities - *f21d1e775aa48b06a317f7e30aa03184f37c9cc3*
-   New xEntityRepository files, extends BaseEntityRepository to provide additonal base repository methods - *64ad3b5b32b34b0f0eeb6bdbb1e28f2d2a90a65d*
-   NavigationController now inherits from TableViewController which provides the standard functionality. The new and edit actions are overwridden to suit custom requirements of the entity. - *c0ec6a229828aa94538683dae77500154347ef42*
-   Controllers which relate to TableViews no inherit from the TableViewContoller and as such inherit the common actions - *7c341f6558a7c4ec3bec429fa64a067d15a1493b*
-   Made xTableView Entities implement the ITableView interface and implemented the methods - *bfab69cc7f944c5fc16d371b7abbe212b801b84b*
-   Made Entities that use TableView's implement the ITableViewEntity interface and implemented the methods - *851a9d4e2b394f548b67c3fe93e6ead13881d6db*
-   New Interfaces that xEntity and xTableView should implement to enforce conformance with the TableViewController - *7d34eb13c54ba008a77973d38af0dd759e06064b*
-   New BaseEntityRepository which is a custom EntityRepository that provides some custom methods for Entities that use TableViewController - *2599dec0795c7851fc6261e3c5aefd5c75d7848d*
-   New TableViewController implements the methods defined in the Abstract.. - *e47e2e9bc12007bf950983efe3bdbae3cfd2e330*
-   New AbstractTableViewController defines core attributes and methods that TableViewControllers must implement - *70035a8f67dec862c6d15d9bc5e4d780c21907e9*
-   Added row_order field to new entity forms - *fd6f38b79815e39f17ceb36cb96e2c5281e13641*
-   Fixed form.duration to form.end_date - *da1d6757939747520aaf22b638eb7f547e506fdd*
-   Added new routes for order up/down for entities now supporting that - *9ddbf4a8984398c3c0ac0645e786efbc84074f6e*
-   Added Order up/down buttons to entities which now support row_order reordering - *715cd66b900a8c024327069878b9b4a3a027ba08*

[**1.03**]

-   Updated Corvus Version to 1.03 - *e1830814c3a474562c296f6e4892bedbcba4cb13*
-   Changed navigation_order to row_order in newNavigation view template - *c3499d16aff7d5ac5a36a88298060112bd5dfc9c*
-   Added order th to the entity Table Views - *d5cb821d1f4d9868724576fa5ba0d26555fc22d2*
-   Added row_order value to the entity Table View templates - *6a0e9b77069cd2ac814fd0efa4a95b408a0c534d*
-   Changed navigation_order to row_order in the Admin default controller - *c7f8769deb8817bc10b87748566b687fa0498d26*
-   Changed navigationOrder to rowOrder in the Admin navigation view template - *6b12df537e39dccc00e53528a7a795bc18a5b0a9*
-   Added DoctrineMigration file to migrate row_order changes in entities - *8f712945ce8c98c8531681c9a6d6280ff1776cfa*
-   Added row_order to Doctrine orm files for entities - *9326fd651b47f26d1628002329900b80ef667d8c*
-   Added row_order NotNull validation constraint for entities - *0bf046973bd31f23fb2344881daaf7d89196da58*
-   Added row_order to form types for entities which now have row_order - *ca41fa1347b3b21e2670f4e0034481397a377730*
-   Added row_order field to other entities with accessors - *91943beedd5db159b07c220145021eda3e3d8470*
-   Changed navigation_order to row_order in frontend extension, stops navigation breaking - *126ffd091aee736873140d5915c86209eb10def9*
-   Changed navigation_order to row_order in form type - *66abaf516be30ddfc4b3252147427556267a21a8*
-   Changed navigation_order to row_order to allow common ordering of entities - *872eb08e8a39cefe717486c0875a00ca8af5a625*

[**1.02**]

-   Added description to detail purpose of changelog inside changelog.txt - *785f9e210bf853f4b3b0d805e2f1779f4d3880f2*
-   Added function to scan for folder names in given directory - *b5764c9b995f8ff0d56521d53a700766496959a1*

[**1.01**]

-   Moved Corvus DB info, services, and twig globals configuration into Corvus config files - *5ad57a6b653304334f120a5d9c5aa63c662972ea*