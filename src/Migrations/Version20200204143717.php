<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200204143717 extends AbstractMigration
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
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_file DROP INDEX IDX_3CDDB11193CB796C, ADD UNIQUE INDEX UNIQ_3CDDB11193CB796C (file_id)');
        $this->addSql('ALTER TABLE article_file DROP FOREIGN KEY FK_3CDDB1117294869C');
        $this->addSql('ALTER TABLE article_file DROP FOREIGN KEY FK_3CDDB11193CB796C');
        $this->addSql('ALTER TABLE article_file ADD id INT AUTO_INCREMENT NOT NULL, CHANGE article_id article_id INT DEFAULT NULL, CHANGE file_id file_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE article_file ADD CONSTRAINT FK_3CDDB1117294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article_file ADD CONSTRAINT FK_3CDDB11193CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE resume CHANGE delivery_address_id delivery_address_id INT NOT NULL, CHANGE billing_address_id billing_address_id INT NOT NULL, CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE bill CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD role_id INT DEFAULT NULL, CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
        $this->addSql('ALTER TABLE file ADD alt LONGTEXT DEFAULT NULL, DROP alt_file, CHANGE uri uri VARCHAR(255) NOT NULL, CHANGE order_file `order` INT NOT NULL');
        $this->addSql('ALTER TABLE newsletter CHANGE files_id files_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE author_id author_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_bill CHANGE bill_id bill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_file DROP INDEX IDX_17714B193CB796C, ADD UNIQUE INDEX UNIQ_17714B193CB796C (file_id)');
        $this->addSql('ALTER TABLE product_file DROP FOREIGN KEY FK_17714B14584665A');
        $this->addSql('ALTER TABLE product_file DROP FOREIGN KEY FK_17714B193CB796C');
        $this->addSql('ALTER TABLE product_file ADD id INT AUTO_INCREMENT NOT NULL, CHANGE product_id product_id INT DEFAULT NULL, CHANGE file_id file_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE product_file ADD CONSTRAINT FK_17714B14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_file ADD CONSTRAINT FK_17714B193CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE quotation CHANGE acceptance_date acceptance_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD files_id INT DEFAULT NULL, CHANGE unity_id unity_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A3E65B2F FOREIGN KEY (files_id) REFERENCES file (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2A3E65B2F ON service (files_id)');
        $this->addSql('ALTER TABLE service_file DROP INDEX IDX_42DC82FC93CB796C, ADD UNIQUE INDEX UNIQ_42DC82FC93CB796C (file_id)');
        $this->addSql('ALTER TABLE service_file DROP FOREIGN KEY FK_42DC82FC93CB796C');
        $this->addSql('ALTER TABLE service_file DROP FOREIGN KEY FK_42DC82FCED5CA9E6');
        $this->addSql('ALTER TABLE service_file ADD id INT AUTO_INCREMENT NOT NULL, CHANGE service_id service_id INT DEFAULT NULL, CHANGE file_id file_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE service_file ADD CONSTRAINT FK_42DC82FC93CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE service_file ADD CONSTRAINT FK_42DC82FCED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP TABLE product_search');
        $this->addSql('DROP TABLE role');
        $this->addSql('ALTER TABLE article CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_file DROP INDEX UNIQ_3CDDB11193CB796C, ADD INDEX IDX_3CDDB11193CB796C (file_id)');
        $this->addSql('ALTER TABLE article_file MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE article_file DROP FOREIGN KEY FK_3CDDB1117294869C');
        $this->addSql('ALTER TABLE article_file DROP FOREIGN KEY FK_3CDDB11193CB796C');
        $this->addSql('ALTER TABLE article_file DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE article_file DROP id, CHANGE article_id article_id INT NOT NULL, CHANGE file_id file_id INT NOT NULL');
        $this->addSql('ALTER TABLE article_file ADD CONSTRAINT FK_3CDDB1117294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_file ADD CONSTRAINT FK_3CDDB11193CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_file ADD PRIMARY KEY (article_id, file_id)');
        $this->addSql('ALTER TABLE bill CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE file ADD alt_file LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP alt, CHANGE uri uri VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE `order` order_file INT NOT NULL');
        $this->addSql('ALTER TABLE newsletter CHANGE files_id files_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE author_id author_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_bill CHANGE bill_id bill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_file DROP INDEX UNIQ_17714B193CB796C, ADD INDEX IDX_17714B193CB796C (file_id)');
        $this->addSql('ALTER TABLE product_file MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE product_file DROP FOREIGN KEY FK_17714B14584665A');
        $this->addSql('ALTER TABLE product_file DROP FOREIGN KEY FK_17714B193CB796C');
        $this->addSql('ALTER TABLE product_file DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE product_file DROP id, CHANGE product_id product_id INT NOT NULL, CHANGE file_id file_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_file ADD CONSTRAINT FK_17714B14584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_file ADD CONSTRAINT FK_17714B193CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_file ADD PRIMARY KEY (product_id, file_id)');
        $this->addSql('ALTER TABLE quotation CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE resume CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL, CHANGE acceptance_date acceptance_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2A3E65B2F');
        $this->addSql('DROP INDEX IDX_E19D9AD2A3E65B2F ON service');
        $this->addSql('ALTER TABLE service DROP files_id, CHANGE unity_id unity_id INT DEFAULT NULL, CHANGE quantity quantity INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_file DROP INDEX UNIQ_42DC82FC93CB796C, ADD INDEX IDX_42DC82FC93CB796C (file_id)');
        $this->addSql('ALTER TABLE service_file MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE service_file DROP FOREIGN KEY FK_42DC82FCED5CA9E6');
        $this->addSql('ALTER TABLE service_file DROP FOREIGN KEY FK_42DC82FC93CB796C');
        $this->addSql('ALTER TABLE service_file DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE service_file DROP id, CHANGE service_id service_id INT NOT NULL, CHANGE file_id file_id INT NOT NULL');
        $this->addSql('ALTER TABLE service_file ADD CONSTRAINT FK_42DC82FCED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_file ADD CONSTRAINT FK_42DC82FC93CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_file ADD PRIMARY KEY (service_id, file_id)');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('ALTER TABLE user DROP role_id, CHANGE delivery_address_id delivery_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL');
    }
}
