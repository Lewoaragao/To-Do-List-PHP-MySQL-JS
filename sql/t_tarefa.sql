CREATE TABLE IF NOT EXISTS `t_tarefa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_tarefa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flg_resolvido` tinyint(1) NOT NULL,
  `flg_ativo` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;