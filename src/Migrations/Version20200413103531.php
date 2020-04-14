<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200413103531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE league CHANGE modified_date modified_date DATETIME DEFAULT NULL, CHANGE deleted_date deleted_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE team CHANGE league_id league_id INT DEFAULT NULL, CHANGE modified_date modified_date VARCHAR(255) DEFAULT NULL, CHANGE deleted_date deleted_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE league CHANGE modified_date modified_date DATETIME DEFAULT \'NULL\', CHANGE deleted_date deleted_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE team CHANGE league_id league_id INT DEFAULT NULL, CHANGE modified_date modified_date VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE deleted_date deleted_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
