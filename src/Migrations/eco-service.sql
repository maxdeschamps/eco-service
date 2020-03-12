INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Alimentaire'),
(2, 'Cosmétique'),
(3, 'Hygiène');


INSERT INTO `subject` (`id`, `name`) VALUES
(2, 'Problème de paiement'),
(3, 'Problème de devis'),
(4, 'Remarques générales'),
(5, 'Je souhaite collaborer avec vous'),
(6, 'Quelque chose ne marche pas'),
(7, 'Livraison'),
(8, 'Recettes'),
(9, 'Autre');

-- --------------------------------------------------------

INSERT INTO `unity` (`id`, `name`) VALUES
(1, 'sac poubelle 100L');

INSERT INTO `user` (`id`, `delivery_address_id`, `billing_address_id`, `username`, `email`, `password`, `first_name`, `last_name`, `company_name`, `phone`, `newsletter_acceptance`, `is_company`) VALUES
(3, NULL, NULL, NULL, 'hazel.grace@gmail.com', '$2y$13$1G0AdVERUSUZTUda0vu3ZOZwnFqGw2Na33X5BtgPA8gtgrCQpiGl.', 'Hazel', 'Grace', NULL, '0688953214', 0, 0),
(4, NULL, NULL, NULL, 'leo.valdez@gmail.com', '$2y$13$0yr2Mo3497awo.WYDDZJM.d7gQohvscahivdqL42fE74AfFTMtCyK', 'Léo', 'Valdez', 'Valdez société', '0688953214', 1, 1);

INSERT INTO `article` (`id`, `author_id`, `category_id`, `name`, `content`, `ingredients`, `steps`, `difficulty`, `estimated_time`) VALUES
(1, 3, 3, 'Lessive en poudre - DIY', NULL, '<p>Du bicarbonate de soude technique</p>\r\n\r\n<p>Des cristaux de soude</p>\r\n\r\n<p>+ du percarbonate de soude en guise de d&eacute;tachant</p>\r\n\r\n<p>Pense &agrave; prendre des bocaux vides en allant les acheter, pour &eacute;viter d&rsquo;avoir &agrave; les transvaser : il est dangereux de respirer les vapeurs des cristaux et du percarbonate de soude.</p>\r\n\r\n<p>Attention, les cristaux de soude ne font pas bon m&eacute;nage avec les &eacute;lastiques ou les mati&egrave;res synth&eacute;tiques. Si tu as des culottes de couches lavables en PUL (ou des v&ecirc;tements de sport) &agrave; laver, utilise &agrave; la place 2 cuill&egrave;res &agrave; soupe de bicarbonate et 1 de percarbonate.</p>\r\n\r\n<p>NB : Il n&rsquo;y a pas d&rsquo;huiles essentielles dans cette recette car &agrave; partir de 40&ordm; elles perdent leur vertus.</p>', '<ol>\r\n	<li>Dans un bocal vide, m&eacute;lange 5 doses de bicarbonate pour 3 de cristaux de soude, et continue avec ces proportions jusqu&rsquo;&agrave; remplir le bocal. Tout d&eacute;pend de la taille de ton bouchon doseur : tu peux utiliser un bouchon de lessive en bouteille par exemple, ou une cuill&egrave;re doseuse sp&eacute;ciale, qui te servira ensuite &agrave; verser ta lessive dans le tambour. Pour un bocal d&rsquo;1kilo je met 6 bouchons doseurs de cristaux et 10 de bicarbonate.</li>\r\n	<li>M&eacute;lange le tout et laisse le bouchon dans le bocal pour t&rsquo;en servir comme doseur. Tu viens de te faire de la lessive pour 16 lavages !</li>\r\n	<li>Pour laver ton linge, verse une dose (1 bouchon) dans le tambour sur le linge puis ajoute 1 cuill&egrave;re &agrave; soupe de percarbonate en plus dans la machine, directement dans le tambour. Le percarbonate est d&eacute;graissant et d&eacute;crassant, mais il ne faut en mettre qu&rsquo;une cuill&egrave;re &agrave; soupe par machine de 4-5 kilos.</li>\r\n</ol>', 30, 1),
(2, 4, 3, 'Un déodorant naturel – DIY', NULL, '<p>Pour environ 200 ml. de produit</p>\r\n\r\n<p>100 g. [ 1/2 cup ] d&rsquo;huile de noix de coco liquide*</p>\r\n\r\n<p>60 g. [ 1/4 cup ] de bicarbonate de soude (ultra fin)</p>\r\n\r\n<p>40 g. de f&eacute;cule [ 1/4 cup ] ou d&rsquo;arrow-root</p>\r\n\r\n<p>10 gouttes d&rsquo;huile essentielle de lavande officinale</p>\r\n\r\n<p>10 gouttes d&rsquo;huile essentielle de palmarosa</p>\r\n\r\n<p>(opt.) 10 g de cire v&eacute;g&eacute;tale</p>\r\n\r\n<p>* Pour que l&rsquo;huile soit &agrave; l&rsquo;&eacute;tat liquide, il suffit juste de la laisser au soleil ou sur un radiateur 1/4 d&rsquo;heure, ou bien faites-la chauffer au bain-marie ou au micro-onde.</p>', '<ol>\r\n	<li>Versez l&rsquo;huile de noix de coco fondue dans un pot :</li>\r\n	<li>Ajoutez ensuite, cuill&egrave;re par cuill&egrave;re, le bicarbonate de soude et la f&eacute;cule, tout en fouettant vigoureusement avec une fourchette pour qu&rsquo;aucun grumeau ne se forme (si votre r&eacute;cipient est herm&eacute;tique, vous pouvez m&eacute;langer le tout en le secouant tr&egrave;s fort) :</li>\r\n	<li>Ajoutez ensuite les huiles essentielles :</li>\r\n	<li>M&eacute;langez une fois le tout et laissez le d&eacute;odorant se raffermir (au r&eacute;frig&eacute;rateur ou &agrave; l&rsquo;air ambiant s&rsquo;il ne fait pas trop chaud) avant de vous en servir.</li>\r\n</ol>', 50, 5),
(3, 3, 2, 'Baume à lèvres vanille - DIY', NULL, '<p><em>Pour 10 ml. de produit&nbsp;</em></p>\r\n\r\n<p>5 g&nbsp;ou 5&nbsp;ml&nbsp;[1/2 tsp]&nbsp;de beurre de karit&eacute;&nbsp;</p>\r\n\r\n<p>5 g/ml&nbsp;[1/2 tsp]&nbsp;d&rsquo;huile de noyau d&rsquo;abricot</p>\r\n\r\n<p>2 g.&nbsp;[1/2 tsp]&nbsp;de cire de candelilla&nbsp;<em>(ou autre cire v&eacute;g&eacute;tale)*</em></p>\r\n\r\n<p>2 gouttes d&rsquo;huile de germe de bl&eacute;<em>&nbsp;(ou vit. E)</em></p>\r\n\r\n<p>2-3 gouttes d&rsquo;HE de vanille</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>* Ces proportions sont id&eacute;ales&nbsp;pour un baume en stick, notamment. Si vous voulez un r&eacute;sultat plus cr&eacute;meux (proche du gloss),<strong>&nbsp;diminuez la part de cire v&eacute;g&eacute;tale.</strong></p>', '<ol>\r\n	<li>Faites fondre au bain-marie le karit&eacute;, l&rsquo;huile d&rsquo;abricot et la cire.</li>\r\n	<li>Une fois le tout fondu, ajoutez l&rsquo;huile de germe de bl&eacute; et l&rsquo;HE.&nbsp;Remuez &agrave; l&rsquo;aide d&rsquo;une spatule.</li>\r\n	<li>Versez le tout dans votre pot ou stick vide (attention, &ccedil;a se solidifie tr&egrave;s vite !).</li>\r\n	<li>Laissez refroidir votre baume et voil&agrave; le travail !</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>', 30, 20);

INSERT INTO `image` (`id`, `order_file`, `image`, `updated_at`) VALUES
(1, 1, 'qwetch-bouteille-isotherme-originals-inox-75cl.jpg', '2020-03-12 08:59:57'),
(2, 2, 'qwetch-bouteille-gourde-isotherme-granite-bleu-500-ml.jpg', '2020-03-12 09:00:13'),
(3, 1, 'cotons1.jpg', '2020-03-12 09:34:24'),
(4, 2, 'cotons2.jpg', '2020-03-12 09:34:40'),
(5, 3, 'cotons3.jpg', '2020-03-12 09:34:52'),
(6, 1, 'brosse1.jpg', '2020-03-12 09:40:23'),
(7, 2, 'brosse2.jpg', '2020-03-12 09:40:37'),
(8, 1, 'recette-lessive-maison.jpg', '2020-03-12 14:01:49'),
(9, 1, 'deo2.jpg', '2020-03-12 15:10:59'),
(10, 1, 'vanille baume.jpg', '2020-03-12 16:00:36');

INSERT INTO `message` (`id`, `subject_id`, `content`, `email`, `first_name`, `last_name`) VALUES
(1, 9, 'JKQHDJIFHDJFHSDJFHSD', 'manon.thivant@gmail.com', 'Manon', 'Thivant');

INSERT INTO `product` (`id`, `author_id`, `category_id`, `name`, `content`, `price_ht`, `price_ttc`, `quantity`) VALUES
(1, NULL, 1, 'Bouteille isotherme', '<p>Gardez vos boissons favorites au frais &amp; au chaud !</p>\r\n\r\n<p><strong>Description</strong></p>\r\n\r\n<ul>\r\n	<li>&Eacute;tanch&eacute;it&eacute; garantie.</li>\r\n	<li>750ml</li>\r\n	<li>Maintient 12h au Chaud / 24h au Froid.</li>\r\n	<li>Double paroi : paroi int&eacute;rieure et ext&eacute;rieure en inox 304 (18/8).</li>\r\n	<li>Extr&eacute;mit&eacute; du bouchon en inox 304 (18/8).</li>\r\n	<li>Paroi int&eacute;rieure sans rev&ecirc;tement ni vernis (contrairement aux contenants en aluminium).</li>\r\n	<li>N&rsquo;alt&egrave;re ni les go&ucirc;ts ni les saveurs.</li>\r\n	<li>Sans BPA.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Entretien et utilisation</strong></p>\r\n\r\n<p>Ne pas mettre au lave-vaisselle, au four &agrave; micro-ondes, au four traditionnel ou au cong&eacute;lateur</p>\r\n\r\n<p>Nettoyer avant chaque utilisation.</p>\r\n\r\n<p>Nettoyer avec de l&rsquo;eau chaude savonneuse et/ou du bicarbonate de soude. Utiliser un support non-abrasif.</p>\r\n\r\n<p>Faire s&eacute;cher t&ecirc;te en bas.</p>\r\n\r\n<p>Entreposer en laissant le contenant ouvert.</p>\r\n\r\n<p>Attention, les liquides ou aliments chauds peuvent br&ucirc;ler : utiliser le produit avec pr&eacute;caution.</p>\r\n\r\n<p>Ne pas d&eacute;passer la capacit&eacute; de remplissage. Remplir jusqu&rsquo;au-dessous du pas de vis.</p>\r\n\r\n<p>Pour &eacute;viter les &eacute;claboussures et les fuites, fermer correctement et compl&egrave;tement le bouchon/couvercle afin d&rsquo;assurer l&rsquo;&eacute;tanch&eacute;it&eacute; du produit. Le transport en position verticale est recommand&eacute;.</p>\r\n\r\n<p>Des frottements, chocs/chutes, etc&hellip; peuvent endommager le produit.</p>', '31', '35', 100),
(2, NULL, 2, 'Lot de 10 cotons réutilisables', '<p>10 cotons d&eacute;maquillants r&eacute;utilisables remplacent 4000 cotons jetables et permettent d&#39;&eacute;conomiser environ 40 &euro; par an.</p>\r\n\r\n<p><strong>Description</strong></p>\r\n\r\n<ul>\r\n	<li>Une face &eacute;ponge pour le d&eacute;maquillage du visage</li>\r\n	<li>Une face molleton pour le d&eacute;maquillage des yeux</li>\r\n	<li>Recommand&eacute; pour les peaux sensibles</li>\r\n	<li>R&eacute;utilisables plus de 300 fois</li>\r\n	<li>Lavables en machine de 30 &deg; C &agrave; 60 &deg; C</li>\r\n	<li>Textiles sans produits toxiques (label OEKO-TEX&reg;)</li>\r\n	<li>Fabrication fran&ccedil;aise</li>\r\n</ul>\r\n\r\n<p><strong>Entretien et utilisation</strong></p>\r\n\r\n<p>Pr&eacute;vus pour passer plus de 300 fois en machine de 30&deg;C &agrave; 60&deg;C, vos cotons lavables se glissent dans leur filet de lavage apr&egrave;s chaque utilisation. Lavez-les avec le reste de votre linge et si vous le souhaitez, le programme doux de votre s&egrave;che-linge donnera douceur, souplesse et gonflant &agrave; vos cotons.</p>', '20', '25', 100),
(3, NULL, 3, '4 brosses à dents en bambou', '<p>Nous faisons fabriquer nos brosses &agrave; dents en bambou &agrave; Asam en Inde. Le bambou moso y est cultiv&eacute; dans des fermes &agrave; petite &eacute;chelle et pousse sans engrais ni pesticides.</p>\r\n\r\n<p><strong>Description</strong></p>\r\n\r\n<ul>\r\n	<li>Le manche est con&ccedil;u en bambou moso (vari&eacute;t&eacute; de bambou non consomm&eacute;e par les pandas).</li>\r\n	<li>Il est ergonomique et fa&ccedil;onn&eacute;.</li>\r\n	<li>Il s&#39;adapte parfaitement &agrave; la main, ce qui permet une manipulation exceptionnelle de la brosse.</li>\r\n	<li>Le bambou est une fibre naturelle. Nous entendons cela &agrave; longueur de temps, mais c&#39;est une v&eacute;rit&eacute; ! Le bambou est techniquement une fibre de pelouse. En tant que tel, il se d&eacute;veloppe rapidement - tr&egrave;s vite.</li>\r\n	<li>Sans engrais ni pesticide. Cela rend le bambou un mat&eacute;riau id&eacute;al - durable pour fabriquer notre brosse &agrave; dents biod&eacute;gradable et vegan.</li>\r\n	<li>Les poils souples en nylon sans Bisph&eacute;nol A n&#39;agressent pas les dents ni les gencives sensibles et offrent un agr&eacute;able sentiment de propret&eacute;.</li>\r\n	<li>Produit &agrave; partir de mati&egrave;res premi&egrave;res 100% recyclables.</li>\r\n	<li>3 mois sont recommand&eacute;s par les dentistes pour changer vos brosses &agrave; dents.</li>\r\n	<li>Possibilit&eacute; d&rsquo;utilisation par les enfants &agrave; partir de 6 ans</li>\r\n	<li>Permets l&rsquo;&eacute;limination du tartre et des plaques dentaires</li>\r\n	<li>Brosse &agrave; dents pouvant &ecirc;tre compost&eacute;e apr&egrave;s usage</li>\r\n</ul>\r\n\r\n<p><strong>Entretien et utilisation</strong></p>\r\n\r\n<p>Pour aller jusqu&#39;au bout de la d&eacute;marche, utilisez cette brosse &agrave; dents avec un dentifrice solide, cependant, vous pouvez tout &agrave; fait l&#39;utiliser avec votre dentifrice habituel.</p>\r\n\r\n<p>Bien rincer apr&egrave;s usage.</p>\r\n\r\n<p>Remplacez votre brosse tous les 3 mois ou quand les poils sont us&eacute;s.</p>\r\n\r\n<p>Conservez votre brosse &agrave; dents au sec, &eacute;vitez de la mettre dans un verre o&ugrave; l&#39;eau stagnante pourrait l&#39;endommager pr&eacute;matur&eacute;ment.</p>', '13', '15', 100);

INSERT INTO `article_image` (`article_id`, `image_id`) VALUES
(1, 8),
(2, 9),
(3, 10);

-- --------------------------------------------------------



INSERT INTO `product_image` (`product_id`, `image_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 6),
(3, 7);
-- --------------------------------------------------------
--
-- Déchargement des données de la table `message`
--



-- --------------------------------------------------------


-- --------------------------------------------------------


INSERT INTO `service` (`id`, `author_id`, `unity_id`, `name`, `content`, `price_ht`, `price_ttc`) VALUES
(1, 4, 1, 'Collecte de restes alimentaires', '<p>Collecte des restes alimentaires de votre entreprise.</p>', '100', '150');
-- --------------------------------------------------------



-- --------------------------------------------------------




