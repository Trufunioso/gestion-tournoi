<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325132424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE player_tournament');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_tournament (player_id INT NOT NULL, tournament_id INT NOT NULL, INDEX IDX_E2FA3CE433D1A3E7 (tournament_id), INDEX IDX_E2FA3CE499E6F5DF (player_id), PRIMARY KEY(player_id, tournament_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE player_tournament ADD CONSTRAINT FK_E2FA3CE499E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_tournament ADD CONSTRAINT FK_E2FA3CE433D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
