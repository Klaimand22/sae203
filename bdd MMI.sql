-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juin 2023 à 13:33
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae203`
--

-- --------------------------------------------------------

--
-- Structure de la table `sae203_accessoire`
--

CREATE TABLE `sae203_accessoire` (
  `id_accessoire` int(11) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  `date_mise_en_service` date DEFAULT NULL,
  `sae203_categorie_id_categorie` int(11) NOT NULL,
  `sae203_image_id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sae203_accessoire`
--

INSERT INTO `sae203_accessoire` (`id_accessoire`, `marque`, `modele`, `description`, `disponible`, `date_mise_en_service`, `sae203_categorie_id_categorie`, `sae203_image_id_image`) VALUES
(1, 'Manfrotto', 'MK190X3-3W', 'Trépied léger en aluminium', 1, '2020-02-10', 4, 301),
(2, 'Lowepro', 'ProTactic BP 450 AW II', 'Sac à dos pour équipement photo', 1, '2019-05-15', 4, 302),
(3, 'Joby', 'GorillaPod 3K Kit', 'Trépied flexible avec rotule', 1, '2021-01-20', 4, 303),
(4, 'Rode', 'VideoMic Pro+', 'Microphone directionnel pour caméras', 1, '2018-08-05', 4, 304),
(5, 'Think Tank', 'Retrospective 30', 'Sac bandoulière pour appareils photo', 1, '2020-06-20', 4, 305),
(6, 'Peak Design', 'Capture Pro', 'Ceinture de fixation pour appareils photo', 1, '2021-10-30', 4, 306),
(7, 'Godox', 'TT685C', 'Flash pour appareils photo Canon', 1, '2019-11-01', 4, 307),
(8, 'DJI', 'Ronin-S', 'Stabilisateur pour caméras', 0, '2022-03-12', 4, 308);

-- --------------------------------------------------------

--
-- Structure de la table `sae203_boitier`
--

CREATE TABLE `sae203_boitier` (
  `id_boitier` int(10) UNSIGNED ZEROFILL NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 1,
  `date_mise_en_service` date DEFAULT NULL,
  `sae203_categorie_id_categorie` int(11) NOT NULL,
  `sae203_image_id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sae203_boitier`
--

INSERT INTO `sae203_boitier` (`id_boitier`, `marque`, `modele`, `description`, `disponible`, `date_mise_en_service`, `sae203_categorie_id_categorie`, `sae203_image_id_image`) VALUES
(0000000001, 'Canon', 'EOS 5D Mark IV', 'Appareil photo reflex numérique professionnel', 1, '2020-01-15', 1, 101),
(0000000002, 'Nikon', 'D850', 'Appareil photo reflex numérique professionnel', 1, '2019-07-22', 1, 102),
(0000000003, 'Sony', 'Alpha A7 III', 'Appareil photo sans miroir plein format', 1, '2021-03-10', 1, 103),
(0000000004, 'Panasonic', 'Lumix GH5', 'Appareil photo sans miroir professionnel', 0, '2018-11-30', 1, 104),
(0000000005, 'Fujifilm', 'X-T4', 'Appareil photo sans miroir APS-C', 1, '2020-05-05', 1, 105),
(0000000006, 'Canon', 'EOS-1D X Mark III', 'Appareil photo reflex numérique professionnel', 1, '2021-09-01', 1, 106),
(0000000007, 'Sony', 'Alpha A9 II', 'Appareil photo sans miroir plein format', 1, '2019-12-18', 1, 107),
(0000000008, 'Nikon', 'Z7 II', 'Appareil photo sans miroir plein format', 0, '2022-02-28', 1, 108);

-- --------------------------------------------------------

--
-- Structure de la table `sae203_carte_sd`
--

CREATE TABLE `sae203_carte_sd` (
  `id_carte_sd` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `capacite` varchar(50) NOT NULL,
  `classe` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `vitesse_ecriture` text NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 1,
  `date_mise_en_service` date NOT NULL,
  `sae203_categorie_id_categorie` int(11) NOT NULL,
  `sae203_image_id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sae203_carte_sd`
--

INSERT INTO `sae203_carte_sd` (`id_carte_sd`, `marque`, `modele`, `capacite`, `classe`, `description`, `vitesse_ecriture`, `disponible`, `date_mise_en_service`, `sae203_categorie_id_categorie`, `sae203_image_id_image`) VALUES
(1, 'SanDisk', 'Extreme Pro', '64GB', 'Class 10', 'Ultra haute vitesse de transfert', '90MB/s', 1, '2020-03-01', 3, 201),
(2, 'Samsung', 'EVO Plus', '128GB', 'Class 10', 'Ultra haute vitesse de transfert', '100MB/s', 1, '2019-06-15', 3, 202),
(3, 'Lexar', 'Professional', '256GB', 'Class 10', 'Ultra haute vitesse de transfert', '150MB/s', 1, '2021-01-10', 3, 203),
(4, 'Kingston', 'Canvas Select Plus', '32GB', 'Class 10', 'Vitesse de transfert élevée', '80MB/s', 1, '2018-09-05', 3, 204),
(5, 'Sony', 'Tough', '128GB', 'Class 10', 'Résistante aux chocs et à l\'eau', '299MB/s', 1, '2020-07-20', 3, 205),
(6, 'Transcend', 'High Endurance', '64GB', 'Class 10', 'Conçue pour la vidéo de surveillance', '40MB/s', 1, '2021-11-30', 3, 206),
(7, 'Samsung', 'PRO Endurance', '256GB', 'Class 10', 'Conçue pour la vidéo de surveillance', '100MB/s', 1, '2019-12-01', 3, 207),
(8, 'SanDisk', 'Ultra', '16GB', 'Class 10', 'Vitesse de transfert standard', '40MB/s', 1, '2022-04-10', 3, 208);

-- --------------------------------------------------------

--
-- Structure de la table `sae203_categorie`
--

CREATE TABLE `sae203_categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sae203_categorie`
--

INSERT INTO `sae203_categorie` (`id_categorie`, `nom`) VALUES
(1, 'boitier'),
(2, 'objectif'),
(3, 'carte_sd'),
(4, 'accessoire');

-- --------------------------------------------------------

--
-- Structure de la table `sae203_client`
--

CREATE TABLE `sae203_client` (
  `id_client` int(10) UNSIGNED NOT NULL,
  `age` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sae203_client`
--

INSERT INTO `sae203_client` (`id_client`, `age`, `nom`, `prenom`, `telephone`, `adresse`, `email`) VALUES
(1, '35', 'Dupont', 'Jean', '1234567890', '123 Rue Principale', 'jean.dupont@example.com'),
(2, '28', 'Martin', 'Julie', '0987654321', '456 Avenue des Fleurs', 'julie.martin@example.com'),
(3, '42', 'Lefebvre', 'Pierre', '5678901234', '789 Boulevard du Soleil', 'pierre.lefebvre@example.com'),
(4, '31', 'Dubois', 'Sophie', '2345678901', '321 Rue des Champs', 'sophie.dubois@example.com'),
(5, '47', 'Thomas', 'Marie', '9012345678', '654 Avenue des Étoiles', 'marie.thomas@example.com'),
(6, '53', 'Roux', 'Marc', '6789012345', '987 Rue du Commerce', 'marc.roux@example.com'),
(7, '24', 'Garcia', 'Laura', '3456789012', '210 Rue de la Paix', 'laura.garcia@example.com'),
(8, '39', 'Leblanc', 'Alexandre', '7890123456', '543 Avenue des Sports', 'alexandre.leblanc@example.com'),
(9, '46', 'Moreau', 'Emma', '9012345678', '876 Boulevard des Arts', 'emma.moreau@example.com'),
(10, '32', 'Fournier', 'Lucas', '2345678901', '123 Rue du Paradis', 'lucas.fournier@example.com');

-- --------------------------------------------------------

--
-- Structure de la table `sae203_emprunt`
--

CREATE TABLE `sae203_emprunt` (
  `id_emprunt` int(11) NOT NULL,
  `id_produit` varchar(45) DEFAULT NULL,
  `sae203_categorie_id_categorie` int(11) NOT NULL,
  `sae203_client_id_client` int(11) UNSIGNED NOT NULL,
  `date_debut` varchar(45) NOT NULL,
  `date_fin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sae203_image`
--

CREATE TABLE `sae203_image` (
  `id_image` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `extension` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sae203_image`
--

INSERT INTO `sae203_image` (`id_image`, `nom`, `extension`) VALUES
(101, 'boitier_canon_eos_5d_mark_iv', 'jpg'),
(102, 'boitier_nikon_d850', 'jpg'),
(103, 'boitier_sony_alpha_a7_iii', 'jpg'),
(104, 'boitier_panasonic_lumix_gh5', 'jpg'),
(105, 'boitier_fujifilm_x_t4', 'jpg'),
(106, 'boitier_canon_eos_1d_x_mark_iii', 'jpg'),
(107, 'boitier_sony_alpha_a9_ii', 'jpg'),
(108, 'boitier_nikon_z7_ii', 'jpg'),
(201, 'carte_sd_sandisk_extreme_pro', 'jpg'),
(202, 'carte_sd_samsung_evo_plus', 'jpg'),
(203, 'carte_sd_lexar_professional', 'jpg'),
(204, 'carte_sd_kingston_canvas_select_plus', 'jpg'),
(205, 'carte_sd_sony_tough', 'jpg'),
(206, 'carte_sd_transcend_high_endurance', 'jpg'),
(207, 'carte_sd_samsung_pro_endurance', 'jpg'),
(208, 'carte_sd_sandisk_ultra', 'jpg'),
(301, 'accessoire_manfrotto_mk190x3_3w', 'jpg'),
(302, 'accessoire_lowepro_protactic_bp_450_aw_ii', 'jpg'),
(303, 'accessoire_joby_gorillapod_3k_kit', 'jpg'),
(304, 'accessoire_rode_videomic_pro_plus', 'jpg'),
(305, 'accessoire_think_tank_retrospective_30', 'jpg'),
(306, 'accessoire_peak_design_capture_pro', 'jpg'),
(307, 'accessoire_godox_tt685c', 'jpg'),
(308, 'accessoire_dji_ronin_s', 'jpg'),
(401, 'objectif_canon_ef_24_70mm_f_2_8l_ii_usm', 'jpg'),
(402, 'objectif_nikon_af_s_nikkor_70_200mm_f_2_8e_fl', 'jpg'),
(403, 'objectif_sony_fe_24_70mm_f_2_8_gm', 'jpg'),
(404, 'objectif_tamron_sp_70_200mm_f_2_8_di_vc_usd_g', 'jpg'),
(405, 'objectif_sigma_art_35mm_f_1_4_dg_hsm', 'jpg'),
(406, 'objectif_fujifilm_xf_16_55mm_f_2_8_r_lm_wr', 'jpg'),
(407, 'objectif_tokina_at_x_11_20mm_f_2_8_pro_dx', 'jpg'),
(408, 'objectif_samyang_af_85mm_f_1_4_rf', 'jpg'),
(2117722098, 'nom', 'extension');

-- --------------------------------------------------------

--
-- Structure de la table `sae203_objectif`
--

CREATE TABLE `sae203_objectif` (
  `id_objectif` int(11) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  `date_mise_en_service` date DEFAULT NULL,
  `sae203_categorie_id_categorie` int(11) NOT NULL,
  `sae203_image_id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sae203_objectif`
--

INSERT INTO `sae203_objectif` (`id_objectif`, `marque`, `modele`, `description`, `disponible`, `date_mise_en_service`, `sae203_categorie_id_categorie`, `sae203_image_id_image`) VALUES
(1, 'Canon', 'EF 24-70mm f/2.8L II USM', 'Objectif standard professionnel', 1, '2020-02-10', 2, 401),
(2, 'Nikon', 'AF-S NIKKOR 70-200mm f/2.8E FL ED VR', 'Objectif téléobjectif professionnel', 1, '2019-05-15', 2, 402),
(3, 'Sony', 'FE 24-70mm f/2.8 GM', 'Objectif standard professionnel', 1, '2021-01-20', 2, 403),
(4, 'Tamron', 'SP 70-200mm f/2.8 Di VC USD G2', 'Objectif téléobjectif professionnel', 1, '2018-08-05', 2, 404),
(5, 'Sigma', 'Art 35mm f/1.4 DG HSM', 'Objectif grand-angle artistique', 1, '2020-06-20', 2, 405),
(6, 'Fujifilm', 'XF 16-55mm f/2.8 R LM WR', 'Objectif standard professionnel', 1, '2021-10-30', 2, 406),
(7, 'Tokina', 'AT-X 11-20mm f/2.8 PRO DX', 'Objectif grand-angle pour appareils APS-C', 1, '2019-11-01', 2, 407),
(8, 'Samyang', 'AF 85mm f/1.4 RF', 'Objectif portrait autofocus pour Canon RF', 0, '2022-03-12', 2, 408);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sae203_accessoire`
--
ALTER TABLE `sae203_accessoire`
  ADD PRIMARY KEY (`id_accessoire`,`sae203_categorie_id_categorie`,`sae203_image_id_image`),
  ADD UNIQUE KEY `id_accessoire_UNIQUE` (`id_accessoire`),
  ADD KEY `fk_sae203_accessoire_sae203_categorie1_idx` (`sae203_categorie_id_categorie`),
  ADD KEY `fk_sae203_accessoire_sae203_image1_idx` (`sae203_image_id_image`);

--
-- Index pour la table `sae203_boitier`
--
ALTER TABLE `sae203_boitier`
  ADD PRIMARY KEY (`id_boitier`,`sae203_categorie_id_categorie`,`sae203_image_id_image`),
  ADD UNIQUE KEY `id_boitier_UNIQUE` (`id_boitier`),
  ADD KEY `fk_sae203_boitier_sae203_categorie_idx` (`sae203_categorie_id_categorie`),
  ADD KEY `fk_sae203_boitier_sae203_image1_idx` (`sae203_image_id_image`);

--
-- Index pour la table `sae203_carte_sd`
--
ALTER TABLE `sae203_carte_sd`
  ADD PRIMARY KEY (`id_carte_sd`,`sae203_categorie_id_categorie`,`sae203_image_id_image`),
  ADD UNIQUE KEY `id_carte_sd_UNIQUE` (`id_carte_sd`),
  ADD KEY `fk_sae203_carte_sd_sae203_categorie1_idx` (`sae203_categorie_id_categorie`),
  ADD KEY `fk_sae203_carte_sd_sae203_image1_idx` (`sae203_image_id_image`);

--
-- Index pour la table `sae203_categorie`
--
ALTER TABLE `sae203_categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `id_categorie_UNIQUE` (`id_categorie`);

--
-- Index pour la table `sae203_client`
--
ALTER TABLE `sae203_client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `idUtiisateur_UNIQUE` (`id_client`);

--
-- Index pour la table `sae203_emprunt`
--
ALTER TABLE `sae203_emprunt`
  ADD PRIMARY KEY (`id_emprunt`,`sae203_categorie_id_categorie`,`sae203_client_id_client`),
  ADD KEY `fk_sae203_categorie_has_sae203_client_sae203_client1_idx` (`sae203_client_id_client`),
  ADD KEY `fk_sae203_categorie_has_sae203_client_sae203_categorie_idx` (`sae203_categorie_id_categorie`);

--
-- Index pour la table `sae203_image`
--
ALTER TABLE `sae203_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `sae203_objectif`
--
ALTER TABLE `sae203_objectif`
  ADD PRIMARY KEY (`id_objectif`,`sae203_categorie_id_categorie`,`sae203_image_id_image`),
  ADD KEY `fk_sae203_objectif_sae203_categorie1_idx` (`sae203_categorie_id_categorie`),
  ADD KEY `fk_sae203_objectif_sae203_image1_idx` (`sae203_image_id_image`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sae203_accessoire`
--
ALTER TABLE `sae203_accessoire`
  MODIFY `id_accessoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sae203_boitier`
--
ALTER TABLE `sae203_boitier`
  MODIFY `id_boitier` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `sae203_carte_sd`
--
ALTER TABLE `sae203_carte_sd`
  MODIFY `id_carte_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sae203_categorie`
--
ALTER TABLE `sae203_categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sae203_client`
--
ALTER TABLE `sae203_client`
  MODIFY `id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `sae203_emprunt`
--
ALTER TABLE `sae203_emprunt`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sae203_image`
--
ALTER TABLE `sae203_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2117722099;

--
-- AUTO_INCREMENT pour la table `sae203_objectif`
--
ALTER TABLE `sae203_objectif`
  MODIFY `id_objectif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sae203_accessoire`
--
ALTER TABLE `sae203_accessoire`
  ADD CONSTRAINT `fk_sae203_accessoire_sae203_categorie1` FOREIGN KEY (`sae203_categorie_id_categorie`) REFERENCES `sae203_categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sae203_accessoire_sae203_image1` FOREIGN KEY (`sae203_image_id_image`) REFERENCES `sae203_image` (`id_image`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sae203_boitier`
--
ALTER TABLE `sae203_boitier`
  ADD CONSTRAINT `fk_sae203_boitier_sae203_categorie` FOREIGN KEY (`sae203_categorie_id_categorie`) REFERENCES `sae203_categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sae203_boitier_sae203_image1` FOREIGN KEY (`sae203_image_id_image`) REFERENCES `sae203_image` (`id_image`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sae203_carte_sd`
--
ALTER TABLE `sae203_carte_sd`
  ADD CONSTRAINT `fk_sae203_carte_sd_sae203_categorie1` FOREIGN KEY (`sae203_categorie_id_categorie`) REFERENCES `sae203_categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sae203_carte_sd_sae203_image1` FOREIGN KEY (`sae203_image_id_image`) REFERENCES `sae203_image` (`id_image`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sae203_emprunt`
--
ALTER TABLE `sae203_emprunt`
  ADD CONSTRAINT `fk_sae203_categorie_has_sae203_client_sae203_categorie` FOREIGN KEY (`sae203_categorie_id_categorie`) REFERENCES `sae203_categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sae203_categorie_has_sae203_client_sae203_client1` FOREIGN KEY (`sae203_client_id_client`) REFERENCES `sae203_client` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sae203_objectif`
--
ALTER TABLE `sae203_objectif`
  ADD CONSTRAINT `fk_sae203_objectif_sae203_categorie1` FOREIGN KEY (`sae203_categorie_id_categorie`) REFERENCES `sae203_categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sae203_objectif_sae203_image1` FOREIGN KEY (`sae203_image_id_image`) REFERENCES `sae203_image` (`id_image`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
