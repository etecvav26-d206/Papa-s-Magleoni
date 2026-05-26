-- SQL Dump for Papa's Magleoni Database
-- Etec Vasco Antonio Venchiarutti (Etec VAV)
-- Turma 2°D - Sistemas Web

CREATE DATABASE IF NOT EXISTS `papas_magleoni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `papas_magleoni`;

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE IF NOT EXISTS `pizzas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `badge` varchar(50) DEFAULT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`nome`, `descricao`, `preco`, `badge`, `imagem`) VALUES
('Margherita', 'Molho de tomate San Marzano, mussarela de búfala, manjericão fresco e azeite extra virgem.', 42.90, 'Clássica', 'images/pizza-margherita.png'),
('Pepperoni', 'Generosas fatias de pepperoni artesanal, mussarela derretida e molho de tomate caseiro.', 48.90, 'Favorita', 'images/pizza-pepperoni.png'),
('Quatro Queijos', 'Mussarela, gorgonzola, parmesão e provolone — uma explosão de sabor em cada mordida.', 52.90, NULL, 'images/pizza-quatro-queijos.png');

COMMIT;
