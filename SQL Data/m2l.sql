-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 17 Mai 2017 à 08:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m2l`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `count_formation`()
    NO SQL
begin
  select id from formation;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc`(IN `nb1` INT, IN `nb2` INT)
    NO SQL
begin
  SELECT id AS id_formation, nom_formation, contenu, dure AS dure_formation, la_date AS date_formation, lieux, pre_requis, prix AS prix_formation FROM formation ORDER BY id limit nb1, nb2;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `mdp`, `id_service`) VALUES
(1, 'MARTIN', 'Garix', 'b521caa6e1db82e5a01c924a419870cb72b81635', 1),
(2, 'JEAN FRANCOIS', 'Poivie', 'b521caa6e1db82e5a01c924a419870cb72b81635', 2),
(3, 'MARC', 'william', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3);

-- --------------------------------------------------------

--
-- Structure de la table `emploie`
--

CREATE TABLE IF NOT EXISTS `emploie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `jour` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `lastLogin` datetime NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `emploie`
--

INSERT INTO `emploie` (`id`, `nom`, `prenom`, `jour`, `credit`, `mdp`, `id_service`, `lastLogin`, `mail`) VALUES
(1, 'MATHIEU', 'nebra', 1, 1000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '2017-05-03 07:59:01', 'mathieu@gmail.com'),
(2, 'kley', 'Thompson', 11, 2200, '66468173c2b1642fcdd5bbb3e6b0f5ea20554ded', 1, '2017-04-14 11:38:17', 'kley@gmail.com'),
(3, 'Kevin', 'Durant', 10, 2000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 2, '0000-00-00 00:00:00', 'kevin@gmail.com'),
(4, 'Draymond', 'Green', 15, 2500, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 2, '0000-00-00 00:00:00', 'draymond@gmail.com'),
(5, 'Isaiah', 'Thomas', 15, 2500, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 3, '0000-00-00 00:00:00', 'isaiah@gmail.com'),
(6, 'Al', 'Horford', 15, 2500, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 3, '0000-00-00 00:00:00', 'al@gmail.com'),
(7, 'Gary', 'mckinnon', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '0000-00-00 00:00:00', 'gary@gmail.com'),
(8, 'Karie', 'irving', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '0000-00-00 00:00:00', 'karie@gmail.com'),
(9, 'Devin', 'Booker', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '2017-04-17 09:22:23', 'devin@gmail.com'),
(10, 'Aaron', 'Gord0n', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '2017-04-17 07:27:27', 'aaron@gmail.com'),
(11, 'Evan', 'fournier', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '2017-04-16 08:31:21', 'evan@gmail.com'),
(12, 'Robin', 'Lopez', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '2017-04-16 13:22:15', 'Robin'),
(13, 'Nikola', 'Jokic', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '2017-04-11 07:32:00', 'nikola@gmail.com'),
(14, 'victor', 'oladipo', 15, 5000, 'b780d933ab3232638d8e74d45ae02e0aa2680925', 1, '2017-04-16 10:29:00', 'victor@gmail.com');

--
-- Déclencheurs `emploie`
--
DROP TRIGGER IF EXISTS `before_update_emploie`;
DELIMITER //
CREATE TRIGGER `before_update_emploie` BEFORE UPDATE ON `emploie`
 FOR EACH ROW begin

UPDATE for_active as a INNER JOIN formation as f on f.id = a.id_formation set a.status = '3' WHERE ADDDATE(f.la_date,INTERVAL f.dure DAY) < now();

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_formation` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `dure` int(11) NOT NULL,
  `la_date` datetime NOT NULL,
  `lieux` varchar(255) NOT NULL,
  `pre_requis` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id`, `nom_formation`, `contenu`, `dure`, `la_date`, `lieux`, `pre_requis`, `prix`) VALUES
(1, 'html', 'Ça y est, vous avez installé tous les logiciels ? Vous devriez maintenant avoir un éditeur de texte pour créer votre site (comme Sublime Text) et plusieurs navigateurs pour le tester (Mozilla Firefox, Google Chrome…).\r\n\r\nDans ce chapitre, nous allons commencer à pratiquer ! Nous allons découvrir les bases du langage HTML et enregistrer notre toute première page web ! \r\nAlors oui, bien sûr, ne vous attendez pas encore à réaliser une page web exceptionnelle dès ce second chapitre, mais patience… cela viendra !\r\n\r\nCréer une page web avec l''éditeur\r\nAllez, mettons-nous en situation ! Comme je vous l''ai dit, nous allons créer notre site dans un éditeur de texte. Vous avez dû en installer un suite à mes conseils dans le premier chapitre : qu''il s''appelle Sublime Text, Notepad++, Brackets, jEdit, vim, TextWrangler… peu importe. Ces logiciels ont un but très simple : vous permettre d''écrire du texte !\r\n\r\nDans la suite de ce cours, je travaillerai avec Sublime Text. Je vais donc l''ouvrir :', 3, '2017-06-01 09:10:00', 'Paris', 'pas de pre-requis ', 300),
(2, 'css', 'près avoir passé toute une première partie du cours à ne travailler que sur le HTML, nous allons maintenant découvrir le CSS que j''avais volontairement mis à l''écart. Le CSS n''est pas plus compliqué que le HTML. Il vient le compléter pour vous aider à mettre en forme votre page web.\r\n\r\nDans ce premier chapitre sur le CSS, nous allons voir la théorie sur le CSS : qu''est-ce que c''est ? À quoi cela ressemble-t-il ? Où est-ce qu''on écrit du code CSS ? Ces aspects théoriques ne sont pas bien compliqués mais vous devez obligatoirement les connaître car c''est la base du CSS. C''est d''ailleurs la seule chose que je vous demanderai de retenir par cœur en CSS, vous pourrez retrouver le reste dans le mémo en annexe.\r\n\r\nAllez, ne traînons pas, je vois que vous brûlez d''impatience !\r\n\r\nLa petite histoire du CSS\r\nJe vous avais avertis dès le début de ce cours : nous allons apprendre deux langages. Nous avons déjà bien entamé notre découverte du HTML, même s''il reste encore de nombreuses choses à apprendre (nous y reviendrons dans quelques chapitres). En revanche, il est temps maintenant de nous intéresser au CSS.\r\n\r\nCSS (Cascading Style Sheets), c''est cet autre langage qui vient compléter le HTML.\r\nVous vous souvenez de son rôle ? Gérer la mise en forme de votre site.\r\n\r\nPetit rappel : à quoi sert CSS ?\r\n\r\nCSS ? C''est lui qui vous permet de choisir la couleur de votre texte.\r\nLui qui vous permet de sélectionner la police utilisée sur votre site.\r\nLui encore qui permet de définir la taille du texte, les bordures, le fond…\r\n\r\nEt aussi, c''est lui qui permet de faire la mise en page de votre site. Vous pourrez dire : je veux que mon menu soit à gauche et occupe telle largeur, que l''en-tête de mon site soit calé en haut et qu''il soit toujours visible, etc.', 2, '2017-06-05 08:30:00', 'Paris', 'HTML', 200),
(3, 'PHP', '1.1 Définition\r\nPHP est un langage de script HTML exécuté du côté du serveur. Il veut dire « PHP : Hypertext\r\nPreprocessor ». Sa syntaxe est largement inspirée du langage C, de Java et de Perl, avec des\r\naméliorations spécifiques. Le but du langage est d''écrire rapidement des pages HTML dynamiques.\r\n1.2 Historique\r\nL''origine de PHP remonte à 1995 quand Rasmus Lerdorf a créé PHP/FI, une librairie de scripts Perl\r\nutilisés pour la publication de son CV sur son site personnel. Au fur et à mesure des évolutions, la\r\nlibrairie a été portée en C et agrémentée de nouvelles fonctionnalités pour créer des pages\r\ndynamiques simples pour le web et accéder à quelques sources de données. PHP/FI signifie\r\nPersonal Home Page/Forms Interpreter.\r\nPHP/FI 2.0 sort en 1997, toujours développé par une seule personne. C''est le succès : 50000 sites\r\n(1% des noms de domaines) disent l''utiliser ou le supporter. Les contributeurs affluent.\r\nPHP 3.0 sort en juin 1998, c''est la première version développée conjointement par Rasmus Lerdorf,\r\nAndi Gutmans et Zeev Suraski et entièrement réécrite (les versions précédentes étaient trop lentes\r\npour une application commerciale). Outre les performances, PHP 3 est modulaire et extensible,\r\npermettant de lui greffer des API supplémentaires, ce qui n''a pas manqué avec le support de\r\nnombreuses bases de données, de formats et de protocoles, une syntaxe plus cohérente et un support\r\nbasique de l''objet. Il a été installé sur 10% du parc mondial des serveurs web avec des dizaines de\r\nmilliers de développeurs et des centaines de milliers de sites.', 5, '2017-06-10 09:20:00', 'Paris', 'HTML et Css', 500),
(4, 'Marketing Digital', 'Bienvenue à toutes et à tous !\n\n?Est-ce que vous vous êtes déjà demandé comment :\n\nfaire connaître une marque ?\nattirer plus de visiteurs sur un site ?\nmieux convertir des prospects en clients ?\net comment en faire des ambassadeur par la suite?\nAlors le marketing digital devrait vous intéresser ! ??\n\nJe suis ravi de partager avec vous ma passion pour le marketing digital. Si vous savez déjà plus ou moins en quoi consiste la publicité en ligne, le référencement, l’emailing ou encore le community management, vous connaissez quelques-unes des nombreuses branches du marketing digital – mais il y en a tellement que vous vous demandez peut-être par où commencer ! Ou bien, si vous débutez, peut-être que le terme “marketing digital” n’est pas encore clair pour vous : ne vous inquiétez pas ! Dans ce cours d’initiation, c''est de zéro qu''on va recommencer. Et c’est progressivement que je vous familiariserai avec les méthodes fondamentales et les techniques incontournables de ce domaine passionnant.\n\nÀ la fin de la première partie de ce cours, vous serez vous-même capable d’expliquer à un débutant en quoi ça consiste. \nDans la deuxième partie de ce cours, vous apprendrez à élaborer une stratégie web marketing actionnable et à l''intégrer dans le livrable par excellence du marketer : le plan marketing.\nEnfin, dans la troisième partie, une fois que vous maîtriserez les bases, je vous montrerai comment améliorer la performance de vos actions web marketing à chaque niveau de la relation client.\nJe suis convaincu qu''avant la fin de ce cours, vous aurez les connaissances et les compétences nécessaires pour bien commencer dans le marketing digital. J’ai tout fait pour le rendre aussi intéressant et complet que possible ; alors que vous soyez un véritable débutant ou non, n’hésitez plus : suivez ce cours dès maintenant !', 2, '2017-06-16 10:20:00', 'Paris', 'Rien', 300),
(5, 'Web marketing', '\r\nIntroduction du cours\r\nS’adapter aux changements engendrés par la transformation digitale c’est d’abord changer de comportement.\r\n\r\nDans ce cours, vous découvrirez la notion de “posture d’ouverture” notion essentielle dans la vie quotidienne ou dans le monde de l’entreprise d’aujourd’hui. \r\nComment innover, comment prendre des risques ou faire confiance aux autres ? Ces trois interviews répondront à ces questions !', 1, '2017-06-24 14:00:00', 'Paris', 'rein', 600),
(6, 'js', 'test E4', 3, '2017-07-01 08:30:00', 'paris', 'html/css', 2000),
(7, 'Comprendre le web', 'Le web est une toile araignée qui relie plus ordinateur entre eux.', 1, '2017-02-27 08:00:00', 'Paris', 'rien', 100);

-- --------------------------------------------------------

--
-- Structure de la table `for_active`
--

CREATE TABLE IF NOT EXISTS `for_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_act` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `id_emploie` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `for_active`
--

INSERT INTO `for_active` (`id`, `date_act`, `status`, `id_emploie`, `id_formation`) VALUES
(1, '2016-11-14 00:41:38', 2, 1, 1),
(2, '2016-12-23 10:32:35', 1, 1, 2),
(3, '2017-03-27 13:03:48', 2, 2, 1),
(4, '2016-12-26 09:57:32', 1, 1, 3),
(5, '2016-12-30 18:19:13', 1, 3, 1),
(6, '2017-01-02 13:33:16', 2, 1, 4),
(7, '2017-01-03 12:14:55', 1, 1, 6),
(9, '1970-01-01 01:01:00', 2, 3, 2),
(19, '2017-03-25 20:03:23', 3, 1, 7),
(27, '2017-04-18 15:04:27', 3, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE IF NOT EXISTS `recuperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `titre`) VALUES
(1, 'informatique'),
(2, 'vente'),
(3, 'production');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
