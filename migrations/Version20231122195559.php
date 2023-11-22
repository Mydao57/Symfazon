<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122195559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clothe_size (id INT AUTO_INCREMENT NOT NULL, clothe_size VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, color_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, alt VARCHAR(50) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoe (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, shoe_brand_id INT NOT NULL, shoe_name VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_C1B7A8493DA5256D (image_id), INDEX IDX_C1B7A8495ECA6032 (shoe_brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoe_color (shoe_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_94A6A1D22AD16370 (shoe_id), INDEX IDX_94A6A1D27ADA1FB5 (color_id), PRIMARY KEY(shoe_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoe_shoe_size (shoe_id INT NOT NULL, shoe_size_id INT NOT NULL, INDEX IDX_A33FB73B2AD16370 (shoe_id), INDEX IDX_A33FB73BACE9EF33 (shoe_size_id), PRIMARY KEY(shoe_id, shoe_size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoe_size (id INT AUTO_INCREMENT NOT NULL, shoe_size VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shoe ADD CONSTRAINT FK_C1B7A8493DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE shoe ADD CONSTRAINT FK_C1B7A8495ECA6032 FOREIGN KEY (shoe_brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE shoe_color ADD CONSTRAINT FK_94A6A1D22AD16370 FOREIGN KEY (shoe_id) REFERENCES shoe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shoe_color ADD CONSTRAINT FK_94A6A1D27ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shoe_shoe_size ADD CONSTRAINT FK_A33FB73B2AD16370 FOREIGN KEY (shoe_id) REFERENCES shoe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shoe_shoe_size ADD CONSTRAINT FK_A33FB73BACE9EF33 FOREIGN KEY (shoe_size_id) REFERENCES shoe_size (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shoe DROP FOREIGN KEY FK_C1B7A8493DA5256D');
        $this->addSql('ALTER TABLE shoe DROP FOREIGN KEY FK_C1B7A8495ECA6032');
        $this->addSql('ALTER TABLE shoe_color DROP FOREIGN KEY FK_94A6A1D22AD16370');
        $this->addSql('ALTER TABLE shoe_color DROP FOREIGN KEY FK_94A6A1D27ADA1FB5');
        $this->addSql('ALTER TABLE shoe_shoe_size DROP FOREIGN KEY FK_A33FB73B2AD16370');
        $this->addSql('ALTER TABLE shoe_shoe_size DROP FOREIGN KEY FK_A33FB73BACE9EF33');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE clothe_size');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE shoe');
        $this->addSql('DROP TABLE shoe_color');
        $this->addSql('DROP TABLE shoe_shoe_size');
        $this->addSql('DROP TABLE shoe_size');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
