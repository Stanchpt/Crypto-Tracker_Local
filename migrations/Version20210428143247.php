<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428143247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ajout_transac (id INT AUTO_INCREMENT NOT NULL, nomcrypto VARCHAR(255) NOT NULL, quantite INT NOT NULL, prixdachat NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delete_transac (id INT AUTO_INCREMENT NOT NULL, nom_crypto VARCHAR(255) NOT NULL, quantite_trans INT NOT NULL, prix_transac NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE investissement_jour (id INT AUTO_INCREMENT NOT NULL, montant_invest NUMERIC(10, 2) NOT NULL, date_invest VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ajout_transac');
        $this->addSql('DROP TABLE delete_transac');
        $this->addSql('DROP TABLE investissement_jour');
    }
}
