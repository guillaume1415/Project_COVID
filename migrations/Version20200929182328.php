<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200929182328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE geolocalisation (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messaging (id INT AUTO_INCREMENT NOT NULL, me_auteur VARCHAR(45) NOT NULL, me_date DATETIME NOT NULL, me_text VARCHAR(500) NOT NULL, read_me VARBINARY(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, geolocalisation_user_id INT DEFAULT NULL, email VARCHAR(45) NOT NULL, name VARCHAR(32) NOT NULL, first_name VARCHAR(32) NOT NULL, password VARCHAR(500) NOT NULL, date_birthday DATE NOT NULL, date_at DATETIME NOT NULL, covid_more VARBINARY(255) NOT NULL, cas_contact VARBINARY(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E9A52300 (geolocalisation_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_messaging (users_id INT NOT NULL, messaging_id INT NOT NULL, INDEX IDX_8868C08067B3B43D (users_id), INDEX IDX_8868C0805CA3C610 (messaging_id), PRIMARY KEY(users_id, messaging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9E9A52300 FOREIGN KEY (geolocalisation_user_id) REFERENCES geolocalisation (id)');
        $this->addSql('ALTER TABLE users_messaging ADD CONSTRAINT FK_8868C08067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_messaging ADD CONSTRAINT FK_8868C0805CA3C610 FOREIGN KEY (messaging_id) REFERENCES messaging (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9E9A52300');
        $this->addSql('ALTER TABLE users_messaging DROP FOREIGN KEY FK_8868C0805CA3C610');
        $this->addSql('ALTER TABLE users_messaging DROP FOREIGN KEY FK_8868C08067B3B43D');
        $this->addSql('DROP TABLE geolocalisation');
        $this->addSql('DROP TABLE messaging');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_messaging');
    }
}
