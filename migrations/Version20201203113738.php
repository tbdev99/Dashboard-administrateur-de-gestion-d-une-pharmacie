<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203113738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('ALTER TABLE achat ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE achat ALTER create_at SET NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_26A98456F347EFB ON achat (produit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('CREATE SEQUENCE achat_id_seq');
        $this->addSql('SELECT setval(\'achat_id_seq\', (SELECT MAX(id) FROM achat))');
        $this->addSql('ALTER TABLE achat ALTER id SET DEFAULT nextval(\'achat_id_seq\')');
        $this->addSql('ALTER TABLE achat ALTER create_at DROP NOT NULL');
        $this->addSql('CREATE INDEX IDX_26A98456F347EFB ON achat (produit_id)');
    }
}