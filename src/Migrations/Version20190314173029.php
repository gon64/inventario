<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190314173029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE departamento (id INT AUTO_INCREMENT NOT NULL, departamento VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_objeto (id INT AUTO_INCREMENT NOT NULL, tipo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, departamento_id INT NOT NULL, usuario VARCHAR(255) DEFAULT NULL, correo VARCHAR(255) DEFAULT NULL, INDEX IDX_2265B05D5A91C08D (departamento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objeto (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, ubicacion_id INT NOT NULL, tipo_objeto_id INT NOT NULL, estado_objeto_id INT NOT NULL, ns VARCHAR(255) DEFAULT NULL, marca VARCHAR(255) DEFAULT NULL, modelo VARCHAR(255) DEFAULT NULL, comentario VARCHAR(25500) DEFAULT NULL, INDEX IDX_274BE696DB38439E (usuario_id), UNIQUE INDEX UNIQ_274BE69657E759E8 (ubicacion_id), INDEX IDX_274BE696949B7269 (tipo_objeto_id), INDEX IDX_274BE696A8BFA551 (estado_objeto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estado_objeto (id INT AUTO_INCREMENT NOT NULL, estado VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ubicacion (id INT AUTO_INCREMENT NOT NULL, ubicacion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D5A91C08D FOREIGN KEY (departamento_id) REFERENCES departamento (id)');
        $this->addSql('ALTER TABLE objeto ADD CONSTRAINT FK_274BE696DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE objeto ADD CONSTRAINT FK_274BE69657E759E8 FOREIGN KEY (ubicacion_id) REFERENCES ubicacion (id)');
        $this->addSql('ALTER TABLE objeto ADD CONSTRAINT FK_274BE696949B7269 FOREIGN KEY (tipo_objeto_id) REFERENCES tipo_objeto (id)');
        $this->addSql('ALTER TABLE objeto ADD CONSTRAINT FK_274BE696A8BFA551 FOREIGN KEY (estado_objeto_id) REFERENCES estado_objeto (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D5A91C08D');
        $this->addSql('ALTER TABLE objeto DROP FOREIGN KEY FK_274BE696949B7269');
        $this->addSql('ALTER TABLE objeto DROP FOREIGN KEY FK_274BE696DB38439E');
        $this->addSql('ALTER TABLE objeto DROP FOREIGN KEY FK_274BE696A8BFA551');
        $this->addSql('ALTER TABLE objeto DROP FOREIGN KEY FK_274BE69657E759E8');
        $this->addSql('DROP TABLE departamento');
        $this->addSql('DROP TABLE tipo_objeto');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE objeto');
        $this->addSql('DROP TABLE estado_objeto');
        $this->addSql('DROP TABLE ubicacion');
    }
}
