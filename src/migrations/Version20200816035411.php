<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200816035411 extends AbstractMigration
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
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, project_id INT DEFAULT NULL, INDEX IDX_E52FFDEEA76ED395 (user_id), INDEX IDX_E52FFDEE166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, id_categories_id INT DEFAULT NULL, project_name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, idea_code VARCHAR(255) DEFAULT NULL, duration_of_implementation VARCHAR(255) DEFAULT NULL, cost_implementation VARCHAR(255) DEFAULT NULL, initial_user_experience_study VARCHAR(255) DEFAULT NULL, notes VARCHAR(255) DEFAULT NULL, similar_sites VARCHAR(255) DEFAULT NULL, age_group VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, platforms VARCHAR(255) DEFAULT NULL, link_ux VARCHAR(255) DEFAULT NULL, is_featured_idea TINYINT(1) DEFAULT NULL, INDEX IDX_2FB3D0EE1C3AC5D2 (id_categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special_idea (id INT AUTO_INCREMENT NOT NULL, id_categories_id INT DEFAULT NULL, idea_new VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, similar_idealink VARCHAR(255) DEFAULT NULL, INDEX IDX_88DCCB6E1C3AC5D2 (id_categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, created_time DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE1C3AC5D2 FOREIGN KEY (id_categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE special_idea ADD CONSTRAINT FK_88DCCB6E1C3AC5D2 FOREIGN KEY (id_categories_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE1C3AC5D2');
        $this->addSql('ALTER TABLE special_idea DROP FOREIGN KEY FK_88DCCB6E1C3AC5D2');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A166D1F9C');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE166D1F9C');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE special_idea');
        $this->addSql('DROP TABLE user');
    }
}
