<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220909214524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE peinture_category (peinture_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(peinture_id, category_id), CONSTRAINT FK_4E86B85C2E869AB FOREIGN KEY (peinture_id) REFERENCES peinture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_4E86B8512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_4E86B85C2E869AB ON peinture_category (peinture_id)');
        $this->addSql('CREATE INDEX IDX_4E86B8512469DE2 ON peinture_category (category_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__peinture AS SELECT id, nom, largeur, auteur, en_vente, prix, date_realisation, create_at, description, portfolio, slug, file FROM peinture');
        $this->addSql('DROP TABLE peinture');
        $this->addSql('CREATE TABLE peinture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, largeur NUMERIC(6, 2) DEFAULT NULL, auteur NUMERIC(6, 2) DEFAULT NULL, en_vente BOOLEAN NOT NULL, prix NUMERIC(10, 2) DEFAULT NULL, date_realisation DATETIME DEFAULT NULL, create_at DATETIME NOT NULL, description CLOB NOT NULL, portfolio BOOLEAN NOT NULL, slug VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, CONSTRAINT FK_8FB3A9D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO peinture (id, nom, largeur, auteur, en_vente, prix, date_realisation, create_at, description, portfolio, slug, file) SELECT id, nom, largeur, auteur, en_vente, prix, date_realisation, create_at, description, portfolio, slug, file FROM __temp__peinture');
        $this->addSql('DROP TABLE __temp__peinture');
        $this->addSql('CREATE INDEX IDX_8FB3A9D6A76ED395 ON peinture (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE peinture_category');
        $this->addSql('CREATE TEMPORARY TABLE __temp__peinture AS SELECT id, nom, largeur, auteur, en_vente, prix, date_realisation, create_at, description, portfolio, slug, file FROM peinture');
        $this->addSql('DROP TABLE peinture');
        $this->addSql('CREATE TABLE peinture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, largeur NUMERIC(6, 2) DEFAULT NULL, auteur NUMERIC(6, 2) DEFAULT NULL, en_vente BOOLEAN NOT NULL, prix NUMERIC(10, 2) DEFAULT NULL, date_realisation DATETIME DEFAULT NULL, create_at DATETIME NOT NULL, description CLOB NOT NULL, portfolio BOOLEAN NOT NULL, slug VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO peinture (id, nom, largeur, auteur, en_vente, prix, date_realisation, create_at, description, portfolio, slug, file) SELECT id, nom, largeur, auteur, en_vente, prix, date_realisation, create_at, description, portfolio, slug, file FROM __temp__peinture');
        $this->addSql('DROP TABLE __temp__peinture');
    }
}
