<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803071520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hierarchy (id INT AUTO_INCREMENT NOT NULL, relation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hierarchy_team (hierarchy_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_84619493582A8328 (hierarchy_id), INDEX IDX_84619493296CD8AE (team_id), PRIMARY KEY(hierarchy_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hierarchy_team ADD CONSTRAINT FK_84619493582A8328 FOREIGN KEY (hierarchy_id) REFERENCES hierarchy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hierarchy_team ADD CONSTRAINT FK_84619493296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE hierarchy_team DROP FOREIGN KEY FK_84619493582A8328');
        $this->addSql('ALTER TABLE hierarchy_team DROP FOREIGN KEY FK_84619493296CD8AE');
        $this->addSql('DROP TABLE hierarchy');
        $this->addSql('DROP TABLE hierarchy_team');
    }
}
