<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623145626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(16) NOT NULL, surname VARCHAR(32) NOT NULL, code VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(16) NOT NULL, code VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elements (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, availability SMALLINT NOT NULL, code VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_444A075D12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elements_tags (element_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_86D555E91F1F2A24 (element_id), INDEX IDX_86D555E9BAD26311 (tag_id), PRIMARY KEY(element_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elements_authors (element_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_F270C4361F1F2A24 (element_id), INDEX IDX_F270C436F675F31B (author_id), PRIMARY KEY(element_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, element_id INT NOT NULL, user_id INT UNSIGNED NOT NULL, return_date DATE NOT NULL, rental_date DATE NOT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_4DA2391F1F2A24 (element_id), INDEX IDX_4DA239A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(16) NOT NULL, code VARCHAR(16) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT NOT NULL, users_data_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9C7F5D5F6 (users_data_id), UNIQUE INDEX email_idx (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_data (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(16) NOT NULL, last_name VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE elements ADD CONSTRAINT FK_444A075D12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE elements_tags ADD CONSTRAINT FK_86D555E91F1F2A24 FOREIGN KEY (element_id) REFERENCES elements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE elements_tags ADD CONSTRAINT FK_86D555E9BAD26311 FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE elements_authors ADD CONSTRAINT FK_F270C4361F1F2A24 FOREIGN KEY (element_id) REFERENCES elements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE elements_authors ADD CONSTRAINT FK_F270C436F675F31B FOREIGN KEY (author_id) REFERENCES authors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2391F1F2A24 FOREIGN KEY (element_id) REFERENCES elements (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C7F5D5F6 FOREIGN KEY (users_data_id) REFERENCES users_data (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE elements_authors DROP FOREIGN KEY FK_F270C436F675F31B');
        $this->addSql('ALTER TABLE elements DROP FOREIGN KEY FK_444A075D12469DE2');
        $this->addSql('ALTER TABLE elements_tags DROP FOREIGN KEY FK_86D555E91F1F2A24');
        $this->addSql('ALTER TABLE elements_authors DROP FOREIGN KEY FK_F270C4361F1F2A24');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2391F1F2A24');
        $this->addSql('ALTER TABLE elements_tags DROP FOREIGN KEY FK_86D555E9BAD26311');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239A76ED395');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9C7F5D5F6');
        $this->addSql('DROP TABLE authors');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE elements');
        $this->addSql('DROP TABLE elements_tags');
        $this->addSql('DROP TABLE elements_authors');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_data');
    }
}
