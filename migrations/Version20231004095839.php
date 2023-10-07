<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231004095839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenu ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_creation date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_maj date_maj DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_connexion date_connexion DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE expiration_abonnement expiration_abonnement DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenu DROP description');
        $this->addSql('ALTER TABLE user CHANGE date_creation date_creation DATETIME NOT NULL, CHANGE date_maj date_maj DATETIME NOT NULL, CHANGE date_connexion date_connexion DATETIME NOT NULL, CHANGE expiration_abonnement expiration_abonnement DATE NOT NULL');
    }
}
