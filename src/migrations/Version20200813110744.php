<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200813110744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, article_title VARCHAR(255) NOT NULL, article LONGTEXT NOT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special_idea (id INT AUTO_INCREMENT NOT NULL, id_categories_id INT DEFAULT NULL, idea_new VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, similar_idealink VARCHAR(255) DEFAULT NULL, INDEX IDX_88DCCB6E1C3AC5D2 (id_categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE special_idea ADD CONSTRAINT FK_88DCCB6E1C3AC5D2 FOREIGN KEY (id_categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE project ADD id_categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE1C3AC5D2 FOREIGN KEY (id_categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE1C3AC5D2 ON project (id_categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE1C3AC5D2');
        $this->addSql('ALTER TABLE special_idea DROP FOREIGN KEY FK_88DCCB6E1C3AC5D2');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE special_idea');
        $this->addSql('DROP INDEX IDX_2FB3D0EE1C3AC5D2 ON project');
        $this->addSql('ALTER TABLE project DROP id_categories_id');
    }
}
