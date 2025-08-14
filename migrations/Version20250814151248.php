<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250814151248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, variant_a_id INTEGER NOT NULL, variant_b_id INTEGER NOT NULL, test_label VARCHAR(255) NOT NULL, notes CLOB DEFAULT NULL, CONSTRAINT FK_B6F7C405D426C5CD FOREIGN KEY (variant_a_id) REFERENCES ad_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B6F7C405C6936A23 FOREIGN KEY (variant_b_id) REFERENCES ad_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_B6F7C405D426C5CD ON abt (variant_a_id)');
        $this->addSql('CREATE INDEX IDX_B6F7C405C6936A23 ON abt (variant_b_id)');
        $this->addSql('CREATE TABLE ad_variant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ad_copy CLOB NOT NULL, platform VARCHAR(255) NOT NULL, impressions INTEGER NOT NULL, clicks INTEGER NOT NULL, roas INTEGER NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL)');
        $this->addSql('CREATE TABLE insight (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ab_test_id INTEGER NOT NULL, insight_text CLOB NOT NULL, CONSTRAINT FK_FE3413DBA00D9457 FOREIGN KEY (ab_test_id) REFERENCES abt (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_FE3413DBA00D9457 ON insight (ab_test_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE abt');
        $this->addSql('DROP TABLE ad_variant');
        $this->addSql('DROP TABLE insight');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
