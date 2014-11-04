<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140930101538 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE File");

        $this->addSql("ALTER TABLE ProjectHistory ADD slug VARCHAR(255) DEFAULT NULL, ADD isPublished TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE WorkHistory ADD slug VARCHAR(255) DEFAULT NULL, ADD isPublished TINYINT(1) NOT NULL");
        
        $this->addSql("ALTER TABLE Education CHANGE end_date end_date DATE DEFAULT NULL");
        $this->addSql("ALTER TABLE GeneralSettings CHANGE portfolio_subtitle portfolio_subtitle VARCHAR(255) DEFAULT NULL, CHANGE footer_text footer_text LONGTEXT DEFAULT NULL");
        $this->addSql("ALTER TABLE ProjectHistory CHANGE process process LONGTEXT DEFAULT NULL, CHANGE feedback_received feedback_received LONGTEXT DEFAULT NULL, CHANGE reflection reflection LONGTEXT DEFAULT NULL");
        $this->addSql("ALTER TABLE Skills CHANGE description description LONGTEXT DEFAULT NULL");

        $this->addSql("INSERT INTO Education VALUES (1, 'Code Academy', 'Basic Programming', '2010-01-01', 'Passed', 1, '2010-07-01', 0)");
        $this->addSql("INSERT INTO Education VALUES (2, 'Programming University', 'BSc Programming', '2010-09-01', '1st', 2, '2013-04-01', 0)");

        $this->addSql("INSERT INTO WorkHistory VALUES (1, 'Slug Employer', null, '2010-09-02', 'Employer with Slug', null, null, null, null, 'Employer with slug |', null, null, 1, 1, 'employer-with-slug', 1)");
        $this->addSql("INSERT INTO WorkHistory VALUES (2, 'Hidden Employer', null, '2010-09-02', 'Hidden Employment', null, null, null, null, 'Hidden Employment |', null, null, 2, 1, 'hidden-employment', 0)");
        
        $this->addSql("INSERT INTO ProjectHistory VALUES (1, 'Project with Slug', 'This is a project with a Slug', 'Webmaster', null, null, null, null, '2013-04-01', 'Project with Slug', null, 1, 'project-with-slug', 1)");
        $this->addSql("INSERT INTO ProjectHistory VALUES (2, 'Hidden Project', 'This is a hidden project', 'Ninja', null, null, null, null, '2013-04-01', 'Hidden Project', null, 2, 'hidden-project', 0)");
        
        $this->addSql("INSERT INTO Skills VALUES (1, 'PHP', 'Good', 2, 'I am good at PHP', 1, 1, 1)");
        $this->addSql("INSERT INTO Skills VALUES (2, 'JavaScript', 'Good', 2, 'I am good at JavaScript', 2, 1, 0)");

        $this->addSql('UPDATE Navigation SET href = "/education" WHERE id = 2');
        $this->addSql('UPDATE Navigation SET href = "/work-history" WHERE id = 3');
        $this->addSql('UPDATE Navigation SET href = "/project-history" WHERE id = 4');
        $this->addSql('UPDATE Navigation SET href = "/about" WHERE id = 5');

        $this->addSql('INSERT INTO Navigation VALUES (6, 6, "/skills", "Skills", "Skills Link")');
        
        $this->addSql('UPDATE GeneralSettings SET home_meta_title = "Home |"');
        $this->addSql('UPDATE GeneralSettings SET skills_meta_title = "Skills |"');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE ProjectHistory DROP slug, DROP isPublished");
        $this->addSql("ALTER TABLE WorkHistory DROP slug, DROP isPublished");

        $this->addSql("CREATE TABLE File (id INT AUTO_INCREMENT NOT NULL, file_type VARCHAR(255) NOT NULL, original_filename VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, file_title VARCHAR(255) NOT NULL, entity_name VARCHAR(255) NOT NULL, entity_id INT NOT NULL, description VARCHAR(255) NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("ALTER TABLE Education CHANGE end_date end_date DATE NOT NULL");
        $this->addSql("ALTER TABLE GeneralSettings CHANGE portfolio_subtitle portfolio_subtitle VARCHAR(255) NOT NULL, CHANGE footer_text footer_text VARCHAR(1500) DEFAULT NULL");
        $this->addSql("ALTER TABLE ProjectHistory CHANGE process process VARCHAR(3000) DEFAULT NULL, CHANGE feedback_received feedback_received VARCHAR(2000) DEFAULT NULL, CHANGE reflection reflection VARCHAR(2000) DEFAULT NULL");
        $this->addSql("ALTER TABLE Skills CHANGE description description VARCHAR(2500) DEFAULT NULL");

        $this->addSql("DELETE FROM Education WHERE id = 1");
        $this->addSql("DELETE FROM Education WHERE id = 2");
        $this->addSql("ALTER TABLE Education AUTO_INCREMENT = 1");

        $this->addSql("DELETE FROM WorkHistory WHERE id = 1");
        $this->addSql("DELETE FROM WorkHistory WHERE id = 2");
        $this->addSql("ALTER TABLE WorkHistory AUTO_INCREMENT = 1");

        $this->addSql("DELETE FROM ProjectHistory WHERE id = 1");
        $this->addSql("DELETE FROM ProjectHistory WHERE id = 2");
        $this->addSql("ALTER TABLE ProjectHistory AUTO_INCREMENT = 1");

        $this->addSql("DELETE FROM Skills WHERE id = 1");
        $this->addSql("DELETE FROM Skills WHERE id = 2");
        $this->addSql("ALTER TABLE Skills AUTO_INCREMENT = 1");
        
        $this->addSql('UPDATE Navigation SET href = "/Education" WHERE id = 2');
        $this->addSql('UPDATE Navigation SET href = "/WorkHistory" WHERE id = 3');
        $this->addSql('UPDATE Navigation SET href = "/ProjectHistory" WHERE id = 4');
        $this->addSql('UPDATE Navigation SET href = "/About" WHERE id = 5');
        
        $this->addSql('DELETE FROM Navigation WHERE id = 6');
        $this->addSql('ALTER TABLE Navigation AUTO_INCREMENT = 6');
        
        $this->addSql('UPDATE GeneralSettings SET home_meta_title = null');
        $this->addSql('UPDATE GeneralSettings SET skills_meta_title = null');
    }
}
