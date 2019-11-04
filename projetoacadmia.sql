-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.3.16-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projetoacadmia
CREATE DATABASE IF NOT EXISTS `projetoacadmia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `projetoacadmia`;

-- Copiando estrutura para tabela projetoacadmia.financeiro
CREATE TABLE IF NOT EXISTS `financeiro` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_financeiro` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projetoacadmia.financeiro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `financeiro` DISABLE KEYS */;
/*!40000 ALTER TABLE `financeiro` ENABLE KEYS */;

-- Copiando estrutura para tabela projetoacadmia.imagem
CREATE TABLE IF NOT EXISTS `imagem` (
  `idimagem` int(11) unsigned NOT NULL DEFAULT 0,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  PRIMARY KEY (`idimagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projetoacadmia.imagem: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagem` ENABLE KEYS */;

-- Copiando estrutura para tabela projetoacadmia.inicio
CREATE TABLE IF NOT EXISTS `inicio` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `texto_ajuda` varchar(150) NOT NULL,
  `texto_desafio` varchar(150) NOT NULL,
  `texto_financeiro` varchar(150) NOT NULL,
  `texto_meta` varchar(150) NOT NULL,
  `texto_suplemento` varchar(150) NOT NULL,
  `texto_consulta` varchar(150) NOT NULL,
  `titulo_ajuda` varchar(20) NOT NULL,
  `titulo_desafio` varchar(20) NOT NULL,
  `titulo_financeiro` varchar(20) NOT NULL,
  `titulo_meta` varchar(20) NOT NULL,
  `titulo_suplemento` varchar(20) NOT NULL,
  `titulo_consulta` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projetoacadmia.inicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inicio` DISABLE KEYS */;
REPLACE INTO `inicio` (`id`, `texto_ajuda`, `texto_desafio`, `texto_financeiro`, `texto_meta`, `texto_suplemento`, `texto_consulta`, `titulo_ajuda`, `titulo_desafio`, `titulo_financeiro`, `titulo_meta`, `titulo_suplemento`, `titulo_consulta`) VALUES
	(1, 'Aqui você pode contar com ajuda de nosso suporte técnico, além de ter acesso aos contatos da academia.', 'Clique aqui para ver seus desafios propostos pelo seu personal trainer.', 'Tenha visão total de seus gastos na academia, como: suplementos, boletos, etc.', 'Clicando aqui, você poderá gerenciar suas metas, podendo editá-las ou criá-las.', 'Confira os nossos suplementos com promoções e preços imperdíveis.', 'Agende suas consultas com um de nossos nutricionais clicando aqui.', 'Ajuda', 'Desafios', 'Financeiro', 'Metas', 'Suplementos', 'Consultas');
/*!40000 ALTER TABLE `inicio` ENABLE KEYS */;

-- Copiando estrutura para tabela projetoacadmia.medico
CREATE TABLE IF NOT EXISTS `medico` (
  `idmedicos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeMedico` varchar(45) NOT NULL,
  PRIMARY KEY (`idmedicos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projetoacadmia.medico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;

-- Copiando estrutura para tabela projetoacadmia.nutricionista
CREATE TABLE IF NOT EXISTS `nutricionista` (
  `idconsulta` int(11) unsigned NOT NULL,
  `data` date NOT NULL,
  `nomeNutri` varchar(45) NOT NULL,
  `valorConsulta` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idconsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projetoacadmia.nutricionista: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `nutricionista` DISABLE KEYS */;
/*!40000 ALTER TABLE `nutricionista` ENABLE KEYS */;

-- Copiando estrutura para tabela projetoacadmia.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `idproduto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(45) NOT NULL,
  `qntProduto` int(11) NOT NULL,
  `preco` double(6,2) NOT NULL,
  `idimagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projetoacadmia.produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela projetoacadmia.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `numeroCasa` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `idade` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela projetoacadmia.usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
REPLACE INTO `usuario` (`id`, `nome`, `email`, `senha`, `cidade`, `numeroCasa`, `cep`, `complemento`, `idade`, `sexo`) VALUES
	(0, 'Henrique Heemann', 'henrique@gmail.com', '202cb962ac59075b964b07152d234b70', 'Blumenau', '48', '89010650', 'Casa', '17', 'Masculino'),
	(1, 'Henrique Heemann', 'he-man@gmail.com', '202cb962ac59075b964b07152d234b70', 'Blumenau', '48', '89010650', 'Casa', '17', 'Masculino');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
