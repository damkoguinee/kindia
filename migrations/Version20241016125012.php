<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241016125012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison_produit ADD CONSTRAINT FK_7F4F29C1FC0C3279 FOREIGN KEY (produit1_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE liaison_produit ADD CONSTRAINT FK_7F4F29C1EEB99D97 FOREIGN KEY (produit2_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_7F4F29C1FC0C3279 ON liaison_produit (produit1_id)');
        $this->addSql('CREATE INDEX IDX_7F4F29C1EEB99D97 ON liaison_produit (produit2_id)');
        $this->addSql('ALTER TABLE liste_stock CHANGE type type VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE liste_stock ADD CONSTRAINT FK_54CD82CEAA2B41DC FOREIGN KEY (lieu_vente_id) REFERENCES lieux_ventes (id)');
        $this->addSql('ALTER TABLE liste_stock ADD CONSTRAINT FK_54CD82CE53C59D72 FOREIGN KEY (responsable_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_54CD82CEAA2B41DC ON liste_stock (lieu_vente_id)');
        $this->addSql('CREATE INDEX IDX_54CD82CE53C59D72 ON liste_stock (responsable_id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A35810E93 FOREIGN KEY (epaisseur_id) REFERENCES epaisseurs (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A277428AD FOREIGN KEY (dimension_id) REFERENCES dimensions (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A87998E FOREIGN KEY (origine_id) REFERENCES origine_produit (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AC54C8C93 FOREIGN KEY (type_id) REFERENCES type_produit (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5ABCF5E72D ON products (categorie_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A35810E93 ON products (epaisseur_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A277428AD ON products (dimension_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A87998E ON products (origine_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5AC54C8C93 ON products (type_id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660A17D8957 FOREIGN KEY (stock_produit_id) REFERENCES liste_stock (id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B3656604584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_4B365660A17D8957 ON stock (stock_produit_id)');
        $this->addSql('CREATE INDEX IDX_4B3656604584665A ON stock (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison_produit DROP FOREIGN KEY FK_7F4F29C1FC0C3279');
        $this->addSql('ALTER TABLE liaison_produit DROP FOREIGN KEY FK_7F4F29C1EEB99D97');
        $this->addSql('DROP INDEX IDX_7F4F29C1FC0C3279 ON liaison_produit');
        $this->addSql('DROP INDEX IDX_7F4F29C1EEB99D97 ON liaison_produit');
        $this->addSql('ALTER TABLE liste_stock DROP FOREIGN KEY FK_54CD82CEAA2B41DC');
        $this->addSql('ALTER TABLE liste_stock DROP FOREIGN KEY FK_54CD82CE53C59D72');
        $this->addSql('DROP INDEX IDX_54CD82CEAA2B41DC ON liste_stock');
        $this->addSql('DROP INDEX IDX_54CD82CE53C59D72 ON liste_stock');
        $this->addSql('ALTER TABLE liste_stock CHANGE type type VARCHAR(50) DEFAULT \'stock\' NOT NULL');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5ABCF5E72D');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A35810E93');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A277428AD');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A87998E');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AC54C8C93');
        $this->addSql('DROP INDEX IDX_B3BA5A5ABCF5E72D ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A35810E93 ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A277428AD ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A87998E ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5AC54C8C93 ON products');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660A17D8957');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B3656604584665A');
        $this->addSql('DROP INDEX IDX_4B365660A17D8957 ON stock');
        $this->addSql('DROP INDEX IDX_4B3656604584665A ON stock');
    }
}
