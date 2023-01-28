CREATE TABLE IF NOT EXISTS `t_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dsc_senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flg_ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;
