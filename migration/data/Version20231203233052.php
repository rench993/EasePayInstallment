<?php

declare(strict_types=1);

namespace OxidEsales\rench\EasePayInstallment;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231203233052 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // Добавление новых столбцов для управления рассрочкой
        $this->addSql('ALTER TABLE `oxarticles` ADD `INITIAL_INSTALLMENT_AMOUNT` DOUBLE UNSIGNED NOT NULL DEFAULT 0 COMMENT "Article initial installment amount"');
        $this->addSql('ALTER TABLE `oxarticles` ADD `TOTAL_INSTALLMENT_MONTHS` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT "Total number of installment months"');
    }

    public function down(Schema $schema) : void
    {
        // Удаление столбцов при откате миграции
        $this->addSql('ALTER TABLE `oxarticles` DROP COLUMN `INITIAL_INSTALLMENT_AMOUNT`');
        $this->addSql('ALTER TABLE `oxarticles` DROP COLUMN `TOTAL_INSTALLMENT_MONTHS`');
    }
}
