<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200204105233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Changement des champs de File + slug uniques';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE newsletter_file (newsletter_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_841A2E0B22DB1917 (newsletter_id), INDEX IDX_841A2E0B93CB796C (file_id), PRIMARY KEY(newsletter_id, file_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE newsletter_file ADD CONSTRAINT FK_841A2E0B22DB1917 FOREIGN KEY (newsletter_id) REFERENCES newsletter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE newsletter_file ADD CONSTRAINT FK_841A2E0B93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bill CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE resume CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL, CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C1989D9B62 ON category (slug)');
        $this->addSql('ALTER TABLE user CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE file ADD alt_file LONGTEXT DEFAULT NULL, DROP alt, CHANGE uri uri VARCHAR(255) DEFAULT NULL, CHANGE `order` order_file INT NOT NULL');
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8A3E65B2F');
        $this->addSql('DROP INDEX IDX_7E8585C8A3E65B2F ON newsletter');
        $this->addSql('ALTER TABLE newsletter DROP files_id');
        $this->addSql('ALTER TABLE product CHANGE author_id author_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD989D9B62 ON product (slug)');
        $this->addSql('ALTER TABLE product_bill CHANGE bill_id bill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE unity_id unity_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E19D9AD2989D9B62 ON service (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FBCE3E7A989D9B62 ON subject (slug)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9659D57989D9B62 ON unity (slug)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE newsletter_file');
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bill CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX UNIQ_64C19C1989D9B62 ON category');
        $this->addSql('ALTER TABLE file ADD alt LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP alt_file, CHANGE uri uri VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE order_file `order` INT NOT NULL');
        $this->addSql('ALTER TABLE newsletter ADD files_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8A3E65B2F FOREIGN KEY (files_id) REFERENCES file (id)');
        $this->addSql('CREATE INDEX IDX_7E8585C8A3E65B2F ON newsletter (files_id)');
        $this->addSql('DROP INDEX UNIQ_D34A04AD989D9B62 ON product');
        $this->addSql('ALTER TABLE product CHANGE author_id author_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_bill CHANGE bill_id bill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE resume CHANGE delivery_address_id delivery_address_id INT NOT NULL, CHANGE billing_address_id billing_address_id INT NOT NULL, CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX UNIQ_E19D9AD2989D9B62 ON service');
        $this->addSql('ALTER TABLE service CHANGE unity_id unity_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_FBCE3E7A989D9B62 ON subject');
        $this->addSql('DROP INDEX UNIQ_9659D57989D9B62 ON unity');
        $this->addSql('ALTER TABLE user CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL');
    }
}
