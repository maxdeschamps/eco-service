<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200204153623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_search (id INT AUTO_INCREMENT NOT NULL, min_price_ttc INT NOT NULL, max_price_ttc INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resume CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL, CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE bill CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE file CHANGE uri uri VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE author_id author_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_bill CHANGE bill_id bill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE unity_id unity_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE product_search');
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bill CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE file CHANGE uri uri VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product CHANGE author_id author_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_bill CHANGE bill_id bill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE resume CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL, CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE service CHANGE unity_id unity_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL');
    }
}
