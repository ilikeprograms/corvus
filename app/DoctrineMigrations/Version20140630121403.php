<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140630121403 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Theme (id INT AUTO_INCREMENT NOT NULL, template_choice VARCHAR(255) DEFAULT 'Bootstrap' NOT NULL, theme_choice VARCHAR(255) DEFAULT 'Bootstrap' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE GeneralSettings DROP template_choice, DROP theme_choice");
        
        $this->addSql("INSERT INTO Theme VALUES (1, 'Bootstrap', 'Bootstrap')");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE Theme");
        $this->addSql("ALTER TABLE GeneralSettings ADD template_choice VARCHAR(255) NOT NULL, ADD theme_choice VARCHAR(255) NOT NULL");
    }
}
