<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106155535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, user_code VARCHAR(100) DEFAULT \'\' NOT NULL COMMENT \'user code\', character_code VARCHAR(100) DEFAULT \'\' NOT NULL COMMENT \'character code\', attribute INT DEFAULT 0 NOT NULL COMMENT \'0 common user, 1 administer, 2 forbidden user\', character_name VARCHAR(100) DEFAULT \'\' NOT NULL COMMENT \'character name\', character_sexy VARCHAR(100) DEFAULT \'\' NOT NULL COMMENT \'male  or female\', character_label VARCHAR(100) DEFAULT \'\' COMMENT \'label code, use # to distinguish its tapes.\', is_used INT DEFAULT 0 NOT NULL COMMENT \'0 not use , 1 in use\', create_time DATETIME NOT NULL COMMENT \'create time\', update_time DATETIME NOT NULL COMMENT \'update time\', register_time DATETIME NOT NULL COMMENT \'register time, 角色正式启用的时间\', UNIQUE INDEX UNIQ_937AB03460E92400 (character_code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_label (id INT AUTO_INCREMENT NOT NULL, character_label_code VARCHAR(100) DEFAULT NULL COMMENT \'自定义角色的code\', character_code VARCHAR(100) NOT NULL COMMENT \'人设code\', custom_label VARCHAR(100) NOT NULL COMMENT \'自定义标签\', create_time DATETIME NOT NULL, update_time DATETIME NOT NULL, UNIQUE INDEX UNIQ_F064B78AAA11CD2 (character_label_code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE character_label');
    }
}
