Corvus Changelog
================

This ChangeLog details all of the changes that were made (briefly) in each version of Corvus.
The format of this ChangeLog is the following:

[**Version Number**]

-   Commit summary - *git commit sha*

---

[**0.1.0**]

-	Created a proper README and LICENCE files
-	Performed alot of Imporvements and some bug fixes
-	Changes the Whole project to start using Twitter Bootstrap and Font Awesome
-	Updated the Project to conform to Symfony 2.4, PSR-0 standards (or started to)

---

These changes were from before Corvus was reset to version [0.1.0] the reason for doing so is detailed in the final commit when
the first tag as [0.1.0] was introduced.
Thee changelog below was kept only in the interest of history and may be removed in the future.

---

[**1.2.2**]

-	Updated Corvus version to 1.2.2
-	Added a method to find the closest Entity when changing the row order of an Entity.

[**1.2.1**]

-	Updated Corvus version to 1.2.1
-	Added .corvusdb to .gitignore and remove it from upstream
-   Changed the paramaters sent to the Order Up/Down routes in the TableViewController Templates (skills.html.twig etc). Now uses the Entity Id instead of loop index.
-   Removed the row_order field from all of the new Entity form templates as it is no longer needed to be set manually
-   Removed the row_order field from all Entity form types which are managed by a TableViewController
-   Same as last commit, but with the NavigationController, which is custom.
-   Added a new method findMaxRowOrder to find the MAX(row_order) of a repository. Used this to fix a bug with row_order after migrating up to that column. See extended desc for details. Also added more comments!

[**1.2**]

-   Updated Corus version to 1.2
-   Changed the postRemove event to preRemove, so the Files are removed using the entity_id before the entity is removed
-   Made several big changed to the FileUploader service. Check extended description for details.
-   Removed static reference to FileUpload and use $this instead.
-   Made the Frontend ProjectHistoryController findById action ->findEntityFiles instead of Image's. Then make it find the thumbnails if they exist like in the Backend edit action
-   Changed portfolio_info.getLogo to portfolio_info.includeLogo in the base frontend views.
-   Provided caching of GeneralSettings Entity instance. Changed getLogo to includeLogo. Added PHPdoc/APIGen to all methods.
-   Changed the required attribute in FormType for certain form fields. Stops non required fields from being validated as required by HTML5
-   Added Accessors for the $path field. Removed unused functions and improved lifecycleCallback functions. Removed ORM annotations. 
-   Added Accessors for the $path field. Removed unused functions and improved lifecycleCallback functions. Removed ORM annotations.
-   Added the ul.square-list css, used in the ProjectHistory edit action. Affects the Files unordered list.
-   Made the ProjectHistoryController new and edit actions enable support for File uploading
-   Changed the lightbox to use the File Entity instead of Image. Added an unordered list which contains links to Files which arent images at the bottom of view
-   Added findEntityImages and findEntityFiles methods to BaseEntityRepository and added the $_originalEntityName.
-   Made the ProjectHistory Entity extend FileUpload which enables it to support managing Files with the Entity. Also added Accessors for the updated field.
-   Changed the FileUpload Entity to enable it be the base class which enables an Entity to upload files. Implements FileUploadInterface, FileAccessorInterface.
-   Created FileAccessorInterface which defines method signatures which are used as Accessors for the files ArrayCollection in the FileUpload Entity
-   Removed the getAbsolutePath and getWebPath methods which are no longer useful
-   Replaced the Image widget and Script to add new from prototype with the File Entity equivelant
-   Removed the Relationship between ProjectHistory and Image
-   Replaced Image Entity with File Entity in validation.yml and changed image_title to file_title
-   Added Doctrine Migration file to migrate the schema changes with new Entities
-   Added File Entity, FormType and .orm.yml files to replace Image Entity
-   Removed Image Entity, FormType and .orm.yml
-   Updated Doctrine Fixtures to Conform with recent schema changes
-   Made TableViewController deleteAction notice flash ucfirst the Entity name
-   Added PHPDoc/ApiGen to ILP classes
-   Changed both mobile.css files to target iPhone 2-4g+ - *795ba56271bf8fb4dac529ebea6742a6509878b8*
-   Created distributable version of corvus.yml - eb52e3894f8b6d2051f23feb196bbc8638cb88b5*
-   Added mobile stylesheet for Basic and Default theme - *57d82d2ad7677b1556351a5ac41b1cf64adc6d12*
-   Added include of mobile stylesheet, uses media queries to make them theme mobile friendly - *72c8aa848773fbbdbbdbb28fb568deca9810c397*
-   Made all use statements comma seperated on new lines. Also added two lines between each use declaration and interface/class/PHPdoc declaration - *335a73a98c6ba32cb2adf45134c134bad307c57a*
-   Added file path above namespace declaration to all affected files - *d86c7e5ee6dc839c36feb0286deb0f56b8ac5d81*

[**1.1**]

-   Renamed Changelog to CORVUS-CHANGELOG.md, changed the format from txt to markdown and moved it to the root dir - *e21effd5ab883b1d6e5a9976c7290863ee7a839d*
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