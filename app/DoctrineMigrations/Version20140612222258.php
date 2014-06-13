<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140612222258 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE GeneralSettings ADD home_meta_title VARCHAR(255) NOT NULL");
        $this->addSql("ALTER TABLE Skills ADD can_display_skill TINYINT(1) NOT NULL, ADD is_quick_skill TINYINT(1) NOT NULL, CHANGE competency competency VARCHAR(255) DEFAULT NULL, CHANGE years_experience years_experience NUMERIC(10, 0) DEFAULT NULL, CHANGE description description VARCHAR(2500) DEFAULT NULL");
        $this->addSql("ALTER TABLE WorkHistory ADD is_current_position TINYINT(1) NOT NULL, CHANGE employer_address employer_address VARCHAR(255) DEFAULT NULL, CHANGE end_date end_date DATE DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE GeneralSettings DROP home_meta_title");
        $this->addSql("ALTER TABLE Skills DROP can_display_skill, DROP is_quick_skill, CHANGE competency competency VARCHAR(255) NOT NULL, CHANGE years_experience years_experience NUMERIC(10, 0) NOT NULL, CHANGE description description VARCHAR(2500) NOT NULL");
        $this->addSql("ALTER TABLE WorkHistory DROP is_current_position, CHANGE employer_address employer_address VARCHAR(255) NOT NULL, CHANGE end_date end_date DATE NOT NULL");
    }
}
