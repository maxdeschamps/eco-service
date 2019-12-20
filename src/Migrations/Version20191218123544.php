<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191218123544 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, line1 LONGTEXT NOT NULL, line2 LONGTEXT DEFAULT NULL, postal_code VARCHAR(50) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX IDX_23A0E6612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalogue (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX IDX_59A699F5F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, request_date DATETIME NOT NULL, acceptance_date DATETIME DEFAULT NULL, approved TINYINT(1) NOT NULL, email VARCHAR(100) NOT NULL, INDEX IDX_7A2119E39395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, delivery_address_id INT NOT NULL, billing_address_id INT NOT NULL, request_date DATETIME NOT NULL, acceptance_date DATETIME DEFAULT NULL, approved TINYINT(1) NOT NULL, email VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_60C1D0A0EBF23851 (delivery_address_id), UNIQUE INDEX UNIQ_60C1D0A079D0C0E4 (billing_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(60) DEFAULT NULL, last_name VARCHAR(60) DEFAULT NULL, phone VARCHAR(60) DEFAULT NULL, newsletter_acceptance TINYINT(1) NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, delivery_address_id INT DEFAULT NULL, billing_address_id INT DEFAULT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(60) DEFAULT NULL, last_name VARCHAR(60) DEFAULT NULL, phone VARCHAR(60) DEFAULT NULL, newsletter_acceptance TINYINT(1) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), UNIQUE INDEX UNIQ_8D93D649EBF23851 (delivery_address_id), UNIQUE INDEX UNIQ_8D93D64979D0C0E4 (billing_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, catalogue_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, uri VARCHAR(255) NOT NULL, alt LONGTEXT DEFAULT NULL, INDEX IDX_8C9F36104A7843DC (catalogue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, subject_id INT NOT NULL, author_id INT NOT NULL, state VARCHAR(100) NOT NULL, INDEX IDX_B6BD307F23EDC87 (subject_id), INDEX IDX_B6BD307FF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_file (message_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_250AADC9537A1329 (message_id), INDEX IDX_250AADC993CB796C (file_id), PRIMARY KEY(message_id, file_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, files_id INT DEFAULT NULL, subject VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_7E8585C8F675F31B (author_id), INDEX IDX_7E8585C8A3E65B2F (files_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_user (newsletter_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8516CE5222DB1917 (newsletter_id), INDEX IDX_8516CE52A76ED395 (user_id), PRIMARY KEY(newsletter_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, price_ht INT NOT NULL, price_ttc INT NOT NULL, quantity INT DEFAULT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_bill (id INT AUTO_INCREMENT NOT NULL, bill_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_F7C93B421A8C12F5 (bill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_bill_product (product_bill_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_AA2D12D9CB550945 (product_bill_id), INDEX IDX_AA2D12D94584665A (product_id), PRIMARY KEY(product_bill_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quotation (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, request_date DATETIME NOT NULL, acceptance_date DATETIME DEFAULT NULL, approved TINYINT(1) NOT NULL, email VARCHAR(100) NOT NULL, INDEX IDX_474A8DB9979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, unity_id INT DEFAULT NULL, price_ht INT NOT NULL, price_ttc INT NOT NULL, quantity INT DEFAULT NULL, INDEX IDX_E19D9AD2F6859C8C (unity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_quotation (id INT AUTO_INCREMENT NOT NULL, quotation_id INT NOT NULL, quantity INT NOT NULL, extra LONGTEXT DEFAULT NULL, INDEX IDX_1FDBB7F3B4EA4E60 (quotation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_quotation_service (service_quotation_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_9BAAF5976B463B85 (service_quotation_id), INDEX IDX_9BAAF597ED5CA9E6 (service_id), PRIMARY KEY(service_quotation_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE catalogue ADD CONSTRAINT FK_59A699F5F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E39395C3F3 FOREIGN KEY (customer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0EBF23851 FOREIGN KEY (delivery_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A079D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EBF23851 FOREIGN KEY (delivery_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64979D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F36104A7843DC FOREIGN KEY (catalogue_id) REFERENCES catalogue (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F23EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message_file ADD CONSTRAINT FK_250AADC9537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_file ADD CONSTRAINT FK_250AADC993CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8A3E65B2F FOREIGN KEY (files_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE newsletter_user ADD CONSTRAINT FK_8516CE5222DB1917 FOREIGN KEY (newsletter_id) REFERENCES newsletter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE newsletter_user ADD CONSTRAINT FK_8516CE52A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product_bill ADD CONSTRAINT FK_F7C93B421A8C12F5 FOREIGN KEY (bill_id) REFERENCES bill (id)');
        $this->addSql('ALTER TABLE product_bill_product ADD CONSTRAINT FK_AA2D12D9CB550945 FOREIGN KEY (product_bill_id) REFERENCES product_bill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_bill_product ADD CONSTRAINT FK_AA2D12D94584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2F6859C8C FOREIGN KEY (unity_id) REFERENCES unity (id)');
        $this->addSql('ALTER TABLE service_quotation ADD CONSTRAINT FK_1FDBB7F3B4EA4E60 FOREIGN KEY (quotation_id) REFERENCES quotation (id)');
        $this->addSql('ALTER TABLE service_quotation_service ADD CONSTRAINT FK_9BAAF5976B463B85 FOREIGN KEY (service_quotation_id) REFERENCES service_quotation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_quotation_service ADD CONSTRAINT FK_9BAAF597ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0EBF23851');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A079D0C0E4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EBF23851');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64979D0C0E4');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F36104A7843DC');
        $this->addSql('ALTER TABLE product_bill DROP FOREIGN KEY FK_F7C93B421A8C12F5');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9979B1AD6');
        $this->addSql('ALTER TABLE catalogue DROP FOREIGN KEY FK_59A699F5F675F31B');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E39395C3F3');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF675F31B');
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8F675F31B');
        $this->addSql('ALTER TABLE newsletter_user DROP FOREIGN KEY FK_8516CE52A76ED395');
        $this->addSql('ALTER TABLE message_file DROP FOREIGN KEY FK_250AADC993CB796C');
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8A3E65B2F');
        $this->addSql('ALTER TABLE message_file DROP FOREIGN KEY FK_250AADC9537A1329');
        $this->addSql('ALTER TABLE newsletter_user DROP FOREIGN KEY FK_8516CE5222DB1917');
        $this->addSql('ALTER TABLE product_bill_product DROP FOREIGN KEY FK_AA2D12D94584665A');
        $this->addSql('ALTER TABLE product_bill_product DROP FOREIGN KEY FK_AA2D12D9CB550945');
        $this->addSql('ALTER TABLE service_quotation DROP FOREIGN KEY FK_1FDBB7F3B4EA4E60');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE service_quotation_service DROP FOREIGN KEY FK_9BAAF597ED5CA9E6');
        $this->addSql('ALTER TABLE service_quotation_service DROP FOREIGN KEY FK_9BAAF5976B463B85');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F23EDC87');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2F6859C8C');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE catalogue');
        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_file');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE newsletter_user');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_bill');
        $this->addSql('DROP TABLE product_bill_product');
        $this->addSql('DROP TABLE quotation');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_quotation');
        $this->addSql('DROP TABLE service_quotation_service');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE unity');
    }
}
