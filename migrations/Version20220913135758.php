<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220913135758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blogpost (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, slug VARCHAR(255) NOT NULL, create_at DATETIME NOT NULL, CONSTRAINT FK_1284FB7DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1284FB7DA76ED395 ON blogpost (user_id)');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, slug VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, peinture_id INTEGER DEFAULT NULL, blogpost_id INTEGER DEFAULT NULL, auteur VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, created_at DATETIME NOT NULL, CONSTRAINT FK_67F068BCC2E869AB FOREIGN KEY (peinture_id) REFERENCES peinture (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_67F068BC27F5416E FOREIGN KEY (blogpost_id) REFERENCES blogpost (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_67F068BCC2E869AB ON commentaire (peinture_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC27F5416E ON commentaire (blogpost_id)');
        $this->addSql('CREATE TABLE peinture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, largeur NUMERIC(6, 2) DEFAULT NULL, hauteur NUMERIC(6, 2) DEFAULT NULL, en_vente BOOLEAN NOT NULL, prix NUMERIC(10, 2) DEFAULT NULL, date_realisation DATETIME DEFAULT NULL, create_at DATETIME NOT NULL, description CLOB NOT NULL, portfolio BOOLEAN NOT NULL, slug VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, CONSTRAINT FK_8FB3A9D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_8FB3A9D6A76ED395 ON peinture (user_id)');
        $this->addSql('CREATE TABLE peinture_category (peinture_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(peinture_id, category_id), CONSTRAINT FK_4E86B85C2E869AB FOREIGN KEY (peinture_id) REFERENCES peinture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_4E86B8512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_4E86B85C2E869AB ON peinture_category (peinture_id)');
        $this->addSql('CREATE INDEX IDX_4E86B8512469DE2 ON peinture_category (category_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, apropos CLOB DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE blogpost');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE peinture');
        $this->addSql('DROP TABLE peinture_category');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');

    }
}
