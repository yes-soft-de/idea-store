<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200813103348 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD idea_code VARCHAR(255) DEFAULT NULL, ADD duration_of_implementation VARCHAR(255) DEFAULT NULL, ADD cost_implementation VARCHAR(255) DEFAULT NULL, ADD initial_user_experience_study VARCHAR(255) DEFAULT NULL, ADD notes VARCHAR(255) DEFAULT NULL, ADD similar_sites VARCHAR(255) DEFAULT NULL, ADD age_group VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL, ADD platforms VARCHAR(255) DEFAULT NULL, ADD link_ux VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP idea_code, DROP duration_of_implementation, DROP cost_implementation, DROP initial_user_experience_study, DROP notes, DROP similar_sites, DROP age_group, DROP country, DROP platforms, DROP link_ux');
    }
}
