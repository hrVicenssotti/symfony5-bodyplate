<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240706034650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create users table.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE users (id SERIAL PRIMARY KEY, email VARCHAR(180) NOT NULL, roles JSONB NOT NULL, password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX USERS_EMAIL_IDX ON users (email)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE user');
    }
}
