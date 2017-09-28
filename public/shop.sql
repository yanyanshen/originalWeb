/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50521
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50521
File Encoding         : 65001

Date: 2016-12-05 17:33:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category_shop`
-- ----------------------------
DROP TABLE IF EXISTS `category_shop`;
CREATE TABLE `category_shop` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(100) NOT NULL,
  `pid` int(1) unsigned NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1' COMMENT '1 代表展示 0 代表下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_shop
-- ----------------------------
INSERT INTO `category_shop` VALUES ('1', '数码产品', '0', '1', '1');
INSERT INTO `category_shop` VALUES ('2', '影音娱乐', '1', '1,2', '1');
INSERT INTO `category_shop` VALUES ('3', 'MP3/MP4', '2', '1,2,3', '1');
INSERT INTO `category_shop` VALUES ('4', '麦克风', '2', '1,2,4', '1');
INSERT INTO `category_shop` VALUES ('5', '耳机/耳麦', '2', '1,2,5', '1');
INSERT INTO `category_shop` VALUES ('6', '相机', '1', '1,6', '1');
INSERT INTO `category_shop` VALUES ('7', '单反相机', '6', '1,6,7', '1');
INSERT INTO `category_shop` VALUES ('8', '卡片相机', '6', '1,6,8', '1');
INSERT INTO `category_shop` VALUES ('9', '电脑配件', '0', '9', '1');
INSERT INTO `category_shop` VALUES ('10', '品牌机', '9', '9,10', '1');
INSERT INTO `category_shop` VALUES ('11', '苹果系列', '10', '9,10,11', '1');
INSERT INTO `category_shop` VALUES ('12', '手机', '0', '12', '1');
INSERT INTO `category_shop` VALUES ('13', '苹果手机', '12', '12,13', '1');
INSERT INTO `category_shop` VALUES ('14', 'iphone1系列', '13', '12,13,14', '1');
INSERT INTO `category_shop` VALUES ('15', 'iphone2系列', '13', '12,13,15', '1');
INSERT INTO `category_shop` VALUES ('16', 'vivoX5', '20', '12,20,16', '1');
INSERT INTO `category_shop` VALUES ('17', 'vivoX5Max', '20', '12,20,17', '1');
INSERT INTO `category_shop` VALUES ('20', 'vivo', '12', '12,20', '1');
INSERT INTO `category_shop` VALUES ('21', 'vivoY23L', '20', '12,20,21', '1');
INSERT INTO `category_shop` VALUES ('22', '魅蓝', '28', '12,28,22', '1');
INSERT INTO `category_shop` VALUES ('24', '化妆品', '0', '24', '1');
INSERT INTO `category_shop` VALUES ('25', '百雀羚', '24', '24,25', '1');
INSERT INTO `category_shop` VALUES ('26', '九朵云', '24', '24,26', '1');
INSERT INTO `category_shop` VALUES ('27', 'OSM', '24', '24,27', '1');
INSERT INTO `category_shop` VALUES ('28', '其他', '12', '12,28', '1');
INSERT INTO `category_shop` VALUES ('29', '服装', '0', '29', '1');
INSERT INTO `category_shop` VALUES ('30', '女装', '29', '29,30', '1');
INSERT INTO `category_shop` VALUES ('31', '男装', '29', '29,31', '1');
INSERT INTO `category_shop` VALUES ('32', '儿童装', '29', '29,32', '1');
INSERT INTO `category_shop` VALUES ('33', '雅思兰黛', '24', '24,33', '1');
INSERT INTO `category_shop` VALUES ('34', '手机配件', '12', '12,34', '1');
INSERT INTO `category_shop` VALUES ('35', '面膜区', '24', '24,35', '1');
INSERT INTO `category_shop` VALUES ('36', '美食', '0', '36', '1');
INSERT INTO `category_shop` VALUES ('37', '干果', '36', '36,37', '1');
INSERT INTO `category_shop` VALUES ('38', '水果', '36', '36,38', '1');
INSERT INTO `category_shop` VALUES ('39', '百雀羚补水面膜', '25', '24,25,39', '1');
INSERT INTO `category_shop` VALUES ('40', '手机充电宝', '34', '12,34,40', '1');
INSERT INTO `category_shop` VALUES ('41', '升级水乳大礼盒', '26', '24,26,41', '1');
INSERT INTO `category_shop` VALUES ('42', '美白珍珠套装', '27', '24,27,42', '1');
INSERT INTO `category_shop` VALUES ('43', '眉笔专区', '33', '24,33,43', '1');
INSERT INTO `category_shop` VALUES ('44', '补水', '35', '24,35,44', '1');
INSERT INTO `category_shop` VALUES ('45', '美白', '35', '24,35,45', '1');
INSERT INTO `category_shop` VALUES ('46', '清洁', '35', '24,35,46', '1');
INSERT INTO `category_shop` VALUES ('47', '连衣裙', '30', '29,30,47', '1');
INSERT INTO `category_shop` VALUES ('48', '秋季新款', '31', '29,31,48', '1');
INSERT INTO `category_shop` VALUES ('49', '宝宝套装', '32', '29,32,49', '1');
INSERT INTO `category_shop` VALUES ('50', '新疆葡萄干', '37', '36,37,50', '1');
INSERT INTO `category_shop` VALUES ('51', '开心果', '37', '36,37,51', '1');
INSERT INTO `category_shop` VALUES ('52', '香蕉', '38', '36,38,52', '1');
INSERT INTO `category_shop` VALUES ('53', '蜜桔', '38', '36,38,53', '1');
INSERT INTO `category_shop` VALUES ('54', '音箱设备', '9', '9,54', '1');
INSERT INTO `category_shop` VALUES ('55', 'iphone3系列', '13', '12,13,55', '1');
INSERT INTO `category_shop` VALUES ('56', 'iphone4系列', '13', '12,13,56', '1');
INSERT INTO `category_shop` VALUES ('57', 'plus6', '13', '12,13,57', '1');
INSERT INTO `category_shop` VALUES ('58', '苹果4S', '13', '12,13,58', '1');
INSERT INTO `category_shop` VALUES ('59', '苹果5S', '13', '12,13,59', '1');
INSERT INTO `category_shop` VALUES ('60', '苹果6S', '13', '12,13,60', '1');
INSERT INTO `category_shop` VALUES ('61', 'DVD', '54', '9,54,61', '1');
INSERT INTO `category_shop` VALUES ('62', 'VCD', '54', '9,54,62', '1');
INSERT INTO `category_shop` VALUES ('63', '牛仔裤', '30', '29,30,63', '1');
INSERT INTO `category_shop` VALUES ('64', '哈伦裤', '30', '29,30,64', '1');
INSERT INTO `category_shop` VALUES ('65', '套头毛衣', '30', '29,30,65', '1');
INSERT INTO `category_shop` VALUES ('66', '休闲装', '30', '29,30,66', '1');
INSERT INTO `category_shop` VALUES ('67', '衬衫专区', '30', '29,30,67', '1');
INSERT INTO `category_shop` VALUES ('68', '西裤', '30', '29,30,68', '1');
INSERT INTO `category_shop` VALUES ('69', '乞丐裤', '30', '29,30,69', '1');
INSERT INTO `category_shop` VALUES ('70', '针织衫开衫', '30', '29,30,70', '1');
INSERT INTO `category_shop` VALUES ('71', '短袖', '30', '29,30,71', '1');
INSERT INTO `category_shop` VALUES ('72', '卫衣套头', '30', '29,30,72', '1');
INSERT INTO `category_shop` VALUES ('73', '短裙修身', '30', '29,30,73', '1');

-- ----------------------------
-- Table structure for `goods_pic_shop`
-- ----------------------------
DROP TABLE IF EXISTS `goods_pic_shop`;
CREATE TABLE `goods_pic_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned DEFAULT NULL COMMENT 'gid 是goods 里的 id',
  `picName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_pic_shop
-- ----------------------------
INSERT INTO `goods_pic_shop` VALUES ('1', '1', '3a73051ade3eb367bb8764751f050a5d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('2', '1', '214b482507b62ffc9bc69d754568e189.jpg');
INSERT INTO `goods_pic_shop` VALUES ('3', '1', 'e86c74e1e5993b35567819571266ecf9.jpg');
INSERT INTO `goods_pic_shop` VALUES ('4', '1', 'ec6ea2379179b759eb23d24749243f25.jpg');
INSERT INTO `goods_pic_shop` VALUES ('5', '2', 'd01369c9a05389fe99325ef46ec55127.jpg');
INSERT INTO `goods_pic_shop` VALUES ('6', '2', '5c66f183484961a50ab8d19d1d53f0eb.jpg');
INSERT INTO `goods_pic_shop` VALUES ('7', '2', '9cccd7875030c1aedac6c4fcfb067164.jpg');
INSERT INTO `goods_pic_shop` VALUES ('8', '2', '71e72724d02f70f9a0912811e3daba8a.jpg');
INSERT INTO `goods_pic_shop` VALUES ('9', '4', '8d6caacda424ea3db66172a3030424ee.jpg');
INSERT INTO `goods_pic_shop` VALUES ('10', '4', 'a7ea91596adfb9633d2c1a6093b8b8db.jpg');
INSERT INTO `goods_pic_shop` VALUES ('11', '4', '7d18335cbcf90b312cbd50d4da26dc8d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('12', '4', '471ed8c772833e592943ab8bb62be8f5.jpg');
INSERT INTO `goods_pic_shop` VALUES ('13', '5', '075244f76bf9524e3e5b62dfd024834d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('14', '5', '7f76f57af8dc4a3df2f43574c8547f5e.jpg');
INSERT INTO `goods_pic_shop` VALUES ('15', '5', '80f13686f0c9cae5ee95334d2e60abf4.jpg');
INSERT INTO `goods_pic_shop` VALUES ('16', '5', '4f0c7d4dc694f79cafa7be9eeec28b67.jpg');
INSERT INTO `goods_pic_shop` VALUES ('17', '6', 'da36bfafbbef3305f2d208ab952da0ce.jpg');
INSERT INTO `goods_pic_shop` VALUES ('18', '6', '868d772090db9d10be723bdf274c8d43.jpg');
INSERT INTO `goods_pic_shop` VALUES ('19', '6', '6684a2f0303bdcadcfbd3bea3869f9c5.jpg');
INSERT INTO `goods_pic_shop` VALUES ('20', '6', '5430708be1c36903cf2dbc920d0d6465.jpg');
INSERT INTO `goods_pic_shop` VALUES ('21', '7', 'a823495b1caae9d87248970b4588fbf0.jpg');
INSERT INTO `goods_pic_shop` VALUES ('22', '7', '84ee2e59f11ad2b8996864d222e16ea3.jpg');
INSERT INTO `goods_pic_shop` VALUES ('23', '7', 'd944a9edfb3f17bd3587e9d6044c12c0.jpg');
INSERT INTO `goods_pic_shop` VALUES ('24', '7', 'fe5685728b9af75578767285f76e1706.jpg');
INSERT INTO `goods_pic_shop` VALUES ('25', '8', 'bf6c23e158e8481a024c93cdd12842f0.jpg');
INSERT INTO `goods_pic_shop` VALUES ('26', '8', '15dede9d5ad48235a646119061a6f4ae.jpg');
INSERT INTO `goods_pic_shop` VALUES ('27', '8', '188f13d6f004843074a7ae36735a9c80.jpg');
INSERT INTO `goods_pic_shop` VALUES ('28', '8', '55f474f171350d0e69bf5fd9607a7ff2.jpg');
INSERT INTO `goods_pic_shop` VALUES ('29', '9', 'ddfc740974bb33fa78411ce2c2a1a063.jpg');
INSERT INTO `goods_pic_shop` VALUES ('30', '9', '695961c7d9edbd76068639af39c03524.jpg');
INSERT INTO `goods_pic_shop` VALUES ('31', '9', '871cd2e76e076d2d9a4fd1e33ce12c16.jpg');
INSERT INTO `goods_pic_shop` VALUES ('32', '10', 'fa9d5083208a16977b230c9c9fdbf974.jpg');
INSERT INTO `goods_pic_shop` VALUES ('33', '10', 'e0471612bf58159287208e531e00165a.jpg');
INSERT INTO `goods_pic_shop` VALUES ('34', '10', '8b433a350dcc4481326bac2cc27ee315.jpg');
INSERT INTO `goods_pic_shop` VALUES ('35', '10', '278cb1566bccda504178e08dd2e3b49b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('36', '11', 'c0ce2214276ee6095f1740f0d4f52316.jpg');
INSERT INTO `goods_pic_shop` VALUES ('37', '11', '75cc2ce5345864bd0dbf1ae6bb720dee.jpg');
INSERT INTO `goods_pic_shop` VALUES ('38', '11', 'c999d30db00596b73bbaf353aff7a744.jpg');
INSERT INTO `goods_pic_shop` VALUES ('39', '11', 'b83832a1c81de19fde0262ec65eab781.jpg');
INSERT INTO `goods_pic_shop` VALUES ('40', '12', '158090c84e0875e769e648b874baad8f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('41', '12', '1e15411f7655b3b4a04d687fb2a4ddc4.jpg');
INSERT INTO `goods_pic_shop` VALUES ('42', '12', '5edc082febbd7a6ac518e8579959635d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('43', '12', '1413d4701117855d64d5f11da0f1740c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('44', '13', '5e6bbdc21cb1cfc12940c9f83404e3f8.jpg');
INSERT INTO `goods_pic_shop` VALUES ('45', '13', 'df65aad932564a3b1fb9833d22e4023c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('46', '13', 'fc1c9550ecd49eda73d4f88f068b433b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('47', '13', '409c23bf4713f0860fc94c0e45dc8725.jpg');
INSERT INTO `goods_pic_shop` VALUES ('48', '14', '61f20631d9503822969fac5f6684598f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('49', '14', '315c4fb7e7fbf29ebd42022adf429cca.jpg');
INSERT INTO `goods_pic_shop` VALUES ('50', '14', 'b1501ec261b37d667176aa5e00b2793a.jpg');
INSERT INTO `goods_pic_shop` VALUES ('51', '15', '095e7896ec8d9ca3c1a469197f799e7f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('52', '15', '9b2e03bb58f770065652fb77ae947b81.jpg');
INSERT INTO `goods_pic_shop` VALUES ('53', '15', '44d1f9ae16f71c820b1b78497d8f5e7c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('54', '15', 'c359bb240aaf7feef23f7560efa08108.jpg');
INSERT INTO `goods_pic_shop` VALUES ('55', '16', '885bccb7f4a84ab42662647b96c3d1b4.jpg');
INSERT INTO `goods_pic_shop` VALUES ('56', '16', 'cf66c21be28edc8c00e638223622e35c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('57', '16', '98181e597ca8c2a2de20190690d9cf58.jpg');
INSERT INTO `goods_pic_shop` VALUES ('58', '16', '4692578961cdedf5762129857595ee7f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('59', '17', 'f0804beb738cf46450269758253426ed.jpg');
INSERT INTO `goods_pic_shop` VALUES ('60', '17', '20ea40e125a4f1814ed803238d781e2a.jpg');
INSERT INTO `goods_pic_shop` VALUES ('61', '17', '4b8b51441887dab1d2aea3305a6c6886.jpg');
INSERT INTO `goods_pic_shop` VALUES ('62', '17', 'f55821b3c8cb4d9b9b1fa06a4df6ce0e.jpg');
INSERT INTO `goods_pic_shop` VALUES ('63', '18', '42db2d369f05989c0550ade42041aae0.jpg');
INSERT INTO `goods_pic_shop` VALUES ('64', '18', '05b8337d49b76a1f7869759495615bcd.jpg');
INSERT INTO `goods_pic_shop` VALUES ('65', '18', '84ca505e208f29bceefb5e80efbad232.jpg');
INSERT INTO `goods_pic_shop` VALUES ('66', '18', 'c1f256d03084c38d3a7884ba0170dd67.jpg');
INSERT INTO `goods_pic_shop` VALUES ('67', '19', '41689749e83e28cc95d9315fb76a120b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('68', '19', 'f990499eda2889aa8f5f084a0faf9e1b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('69', '19', '807f7add28c6c4d7adf462a52e82d964.jpg');
INSERT INTO `goods_pic_shop` VALUES ('70', '19', '086fbae516e8df1de363fd21d3ab5666.jpg');
INSERT INTO `goods_pic_shop` VALUES ('71', '20', '5ed9233f201497edefe5ea7932f06571.jpg');
INSERT INTO `goods_pic_shop` VALUES ('72', '20', 'a0030cb0f21509b7d21d1f2dbd352368.jpg');
INSERT INTO `goods_pic_shop` VALUES ('73', '20', '2f57db356acccf12bc5b2cd1cb6fe80d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('74', '20', '10781dfd3afdca4d97b61e6df67aa3f5.jpg');
INSERT INTO `goods_pic_shop` VALUES ('75', '21', '22d83329cf40bb89398fbc299559423e.jpg');
INSERT INTO `goods_pic_shop` VALUES ('76', '21', '7065fed8c0a4b775f703663cc080afe9.jpg');
INSERT INTO `goods_pic_shop` VALUES ('77', '21', '1eced1a5f1331d3b91be569846cfd189.jpg');
INSERT INTO `goods_pic_shop` VALUES ('78', '21', '39e852368d574aa3c2176d7b0dbe6c5a.jpg');
INSERT INTO `goods_pic_shop` VALUES ('79', '22', '44ec5c38a95e1d442ff609cff4f7cb1b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('80', '22', 'fa6fb203c8b6adeb85f846b5369f24c5.jpg');
INSERT INTO `goods_pic_shop` VALUES ('81', '22', '8ef1ad1ca8c5b20b1bfadf6a05e402ad.jpg');
INSERT INTO `goods_pic_shop` VALUES ('82', '22', 'e9130059ff68138b19810d114b9d1872.jpg');
INSERT INTO `goods_pic_shop` VALUES ('83', '23', 'b956a9966a49cb23ea1556194a9feea1.jpg');
INSERT INTO `goods_pic_shop` VALUES ('84', '23', '77f88d9653e54691be27b2f53d5b890b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('85', '23', 'c62fc885d1c80ee7cfd1f24eab7436fc.jpg');
INSERT INTO `goods_pic_shop` VALUES ('86', '23', '5a3c2e05d8af1b245f7082d86662b0c0.jpg');
INSERT INTO `goods_pic_shop` VALUES ('87', '24', '710cf4011c4fb224f07b2eec0caf205a.jpg');
INSERT INTO `goods_pic_shop` VALUES ('88', '24', '01baedef97ef7796715d161570872913.jpg');
INSERT INTO `goods_pic_shop` VALUES ('89', '24', 'e0ab9a75911457f051470a0d90c11d11.jpg');
INSERT INTO `goods_pic_shop` VALUES ('90', '24', 'c5c2331ec3fe93757f766dfb06e5d3b3.jpg');
INSERT INTO `goods_pic_shop` VALUES ('91', '25', '71d1c8521b56848d6508a13a67079b08.jpg');
INSERT INTO `goods_pic_shop` VALUES ('92', '25', '423c81ca2eb32cdfce16c83dd4271640.jpg');
INSERT INTO `goods_pic_shop` VALUES ('93', '25', 'e96665bbbca7061c66074cc9310b2991.jpg');
INSERT INTO `goods_pic_shop` VALUES ('94', '25', '227f340e9df31dff52b1b98f8010fcc6.jpg');
INSERT INTO `goods_pic_shop` VALUES ('95', '26', 'aa151f60eaaea86f782bb2e64695b317.jpg');
INSERT INTO `goods_pic_shop` VALUES ('96', '26', 'd9e1361ff899d3243ef3877244c2a488.jpg');
INSERT INTO `goods_pic_shop` VALUES ('97', '26', 'c90274780653b9b9724b58564b045787.jpg');
INSERT INTO `goods_pic_shop` VALUES ('98', '26', '5ec8e00c6104a3e12ef9df52db6dca30.jpg');
INSERT INTO `goods_pic_shop` VALUES ('99', '27', '0d5a5ac074d03a4013191e08e071d626.jpg');
INSERT INTO `goods_pic_shop` VALUES ('100', '27', '7a192af682baa5e5b3bb69c5a713aab9.jpg');
INSERT INTO `goods_pic_shop` VALUES ('101', '28', 'cb181dfe74e29892d976aa4709f89511.jpg');
INSERT INTO `goods_pic_shop` VALUES ('102', '28', '274d0ccb9932885b6eb67040bdc9492a.jpg');
INSERT INTO `goods_pic_shop` VALUES ('103', '28', '821dbff25464519d3708b1b7307be576.jpg');
INSERT INTO `goods_pic_shop` VALUES ('104', '28', '9d93cc7e2c68352cd12dbc1d36a023f7.jpg');
INSERT INTO `goods_pic_shop` VALUES ('105', '28', '7e2def9f137f908a98b11bab59613c9f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('106', '29', 'd94a9223cfa99bc46b7257af5abd2c76.jpg');
INSERT INTO `goods_pic_shop` VALUES ('107', '29', '7f03ef485bf2bffc280fcab7b6cb3762.jpg');
INSERT INTO `goods_pic_shop` VALUES ('108', '29', 'bdb71c25fddf19af8682c59451fc7869.jpg');
INSERT INTO `goods_pic_shop` VALUES ('109', '29', 'dbd5dc41b055ed78b7dc36c6eaa59ecb.jpg');
INSERT INTO `goods_pic_shop` VALUES ('110', '29', 'cf879873fcf8e6aae6c56c23e29c90a7.jpg');
INSERT INTO `goods_pic_shop` VALUES ('111', '30', 'da03179cc24da76892067e199e5714bc.jpg');
INSERT INTO `goods_pic_shop` VALUES ('112', '30', '56a1209ac31e5adbacf6d04849da0975.jpg');
INSERT INTO `goods_pic_shop` VALUES ('113', '30', 'e1f1acd58a22dc3f18d7c18f702c312c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('114', '30', '14c75554d01accf78e4daecc9deda305.jpg');
INSERT INTO `goods_pic_shop` VALUES ('115', '30', 'cecf75027ec9ccbbfe857ce94ff385fe.jpg');
INSERT INTO `goods_pic_shop` VALUES ('116', '31', '91d133238bc5b52adea3d2775a7b1875.jpg');
INSERT INTO `goods_pic_shop` VALUES ('117', '31', 'bcbd309a395365a57fa64131e16f7430.jpg');
INSERT INTO `goods_pic_shop` VALUES ('118', '31', '1d5156618e2839289811a9c5394203b9.jpg');
INSERT INTO `goods_pic_shop` VALUES ('119', '31', '305cbbfe37c0bd478321fa731e8c7790.jpg');
INSERT INTO `goods_pic_shop` VALUES ('120', '31', 'cbbc5e9980cead779cc2a34b4a4df9df.jpg');
INSERT INTO `goods_pic_shop` VALUES ('121', '32', '3d4d637a694fffcbccb93f07a378f176.jpg');
INSERT INTO `goods_pic_shop` VALUES ('122', '32', 'e6a9a9312815ca6a1ea102f6fce9733d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('123', '32', '892fef2e0fbe1025281b5c88771f1e1e.jpg');
INSERT INTO `goods_pic_shop` VALUES ('124', '32', '8b0eefa7e58010aeeb7c98e39d249a00.jpg');
INSERT INTO `goods_pic_shop` VALUES ('125', '32', 'ee9646c91083462fb66cc51044e0aa5c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('126', '33', 'a233157489154275d7174b367ff71a9f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('127', '33', '7b612e25539344d1000e5a1281d7dfb7.jpg');
INSERT INTO `goods_pic_shop` VALUES ('128', '33', '1c2d1b9a6bf1eef28d8022422e8e0b4f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('129', '33', '5eb9a9f0ae12a9ac398b1430611581fa.jpg');
INSERT INTO `goods_pic_shop` VALUES ('130', '33', '0369954bf60396c4ee752d72379ab099.jpg');
INSERT INTO `goods_pic_shop` VALUES ('131', '34', '08d312f7f38d06c20aef363eb2fea402.jpg');
INSERT INTO `goods_pic_shop` VALUES ('132', '34', '25ce442caf5fde1220a9584cbda95923.jpg');
INSERT INTO `goods_pic_shop` VALUES ('133', '34', 'd8ab6e3f49f1932301cf9343ea8f0ea9.jpg');
INSERT INTO `goods_pic_shop` VALUES ('134', '34', '659797fa6c535f3ada3c11debacb5837.jpg');
INSERT INTO `goods_pic_shop` VALUES ('135', '34', '95c1a04d6e148800b0a35e2d16f7f9b8.jpg');
INSERT INTO `goods_pic_shop` VALUES ('136', '35', '1ea305dfefcf90b2ac57855ed2310b8b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('137', '35', 'ce0e950ecb4c0210e695936e1c43db2d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('138', '35', 'f361550326c16dc8f394491f970771f5.jpg');
INSERT INTO `goods_pic_shop` VALUES ('139', '35', '80b44da0be3d998508c9eeb06d1ae699.jpg');
INSERT INTO `goods_pic_shop` VALUES ('140', '35', '6608df48680250576bc3d0657764f0ea.jpg');
INSERT INTO `goods_pic_shop` VALUES ('141', '36', '0fead5bfb6b41dd7f8c4e9d5495c3bbd.jpg');
INSERT INTO `goods_pic_shop` VALUES ('142', '36', '4d3a273b47bb4afe644fb64d0c426472.jpg');
INSERT INTO `goods_pic_shop` VALUES ('143', '36', '6a609e5a3b9f5095038b47f65be53bc9.jpg');
INSERT INTO `goods_pic_shop` VALUES ('144', '36', '20fa971e54b0c0571d069b9846df2ff2.jpg');
INSERT INTO `goods_pic_shop` VALUES ('145', '36', '133c98dfd0bdf8618084ca327533f168.jpg');
INSERT INTO `goods_pic_shop` VALUES ('146', '37', '443e548ad0daaca50912af5a60468bdf.jpg');
INSERT INTO `goods_pic_shop` VALUES ('147', '37', '24263beb3dc240836615b5f488aa4dac.jpg');
INSERT INTO `goods_pic_shop` VALUES ('148', '37', 'cd00e46d1c05c45d15975f0df7fab6eb.jpg');
INSERT INTO `goods_pic_shop` VALUES ('149', '37', '9a6cac721efae0aa4ef5d70798f8548c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('150', '37', 'b86886baf532e4192d3f98144dd4b343.jpg');
INSERT INTO `goods_pic_shop` VALUES ('151', '38', 'bf5159feda5630958940618d6f94a018.jpg');
INSERT INTO `goods_pic_shop` VALUES ('152', '38', 'ee13c902bd5043d1b359d43b9e3e573c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('153', '38', '053b5f2157c09cb251e0a9f8e05f4c55.jpg');
INSERT INTO `goods_pic_shop` VALUES ('154', '38', '7f773f1518cada0a3c164daaab6f6f21.jpg');
INSERT INTO `goods_pic_shop` VALUES ('155', '38', 'a17fc0a3b5872f0931444f2ab495ceb6.jpg');
INSERT INTO `goods_pic_shop` VALUES ('156', '39', 'ee836e785494dba0bb16b7d775ab6ea0.jpg');
INSERT INTO `goods_pic_shop` VALUES ('157', '39', '0ee51bf84ec30a8577f6c1ee422fe5ba.jpg');
INSERT INTO `goods_pic_shop` VALUES ('158', '39', '7a41736d593b95c95e6581b5e04f91fd.jpg');
INSERT INTO `goods_pic_shop` VALUES ('159', '39', 'a193f473cf40c378d26d35a0d23475c2.jpg');
INSERT INTO `goods_pic_shop` VALUES ('160', '39', '5d6fdd24b4afc71cb649f9274322d9c8.jpg');
INSERT INTO `goods_pic_shop` VALUES ('161', '40', 'f98feff5a191ba841b33ef1c62703667.jpg');
INSERT INTO `goods_pic_shop` VALUES ('162', '40', '41a73999f1b479dd39624d0896517a5d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('163', '40', '46e2b6a52614774d637be6ee1263cdae.jpg');
INSERT INTO `goods_pic_shop` VALUES ('164', '40', 'b6c530cd48a838626d2ea266e10efb21.jpg');
INSERT INTO `goods_pic_shop` VALUES ('165', '40', '47681819add7149887c8975308634f9d.jpg');
INSERT INTO `goods_pic_shop` VALUES ('166', '41', 'fb6853fdf9a58f9e2c12f0986698f339.jpg');
INSERT INTO `goods_pic_shop` VALUES ('167', '41', '751ed164a933474c47f7deb0833c763e.jpg');
INSERT INTO `goods_pic_shop` VALUES ('168', '41', '3dce8e54331648249d5eeea8100420df.jpg');
INSERT INTO `goods_pic_shop` VALUES ('169', '41', 'ee8ae8301409e55a96d5f775b334871b.jpg');
INSERT INTO `goods_pic_shop` VALUES ('170', '41', '4890bff5c13e1a445cfba450f5de94e9.jpg');
INSERT INTO `goods_pic_shop` VALUES ('171', '42', '72eab8c8f920b46ffbdfb878dd8cf276.jpg');
INSERT INTO `goods_pic_shop` VALUES ('172', '42', 'fb85378b66a99e116a076a2f9a2096a6.jpg');
INSERT INTO `goods_pic_shop` VALUES ('173', '42', '1b002b0102ac4bdea59843edb5c8a979.jpg');
INSERT INTO `goods_pic_shop` VALUES ('174', '42', 'ff682e7b1f36cb8f7fd007ecbb9f8b32.jpg');
INSERT INTO `goods_pic_shop` VALUES ('175', '42', '65cddea6f873a22391345192fcd14b6c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('176', '43', 'a476ce114c3c307056aad0a1c9d7ab5f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('177', '43', '445037e994a9c7959157da619fe99eb6.jpg');
INSERT INTO `goods_pic_shop` VALUES ('178', '43', '388cedf8aa2b8f42ac274a6c6d4987c8.jpg');
INSERT INTO `goods_pic_shop` VALUES ('179', '43', 'e909d4741e24433f0dab9d8aa91e2e97.jpg');
INSERT INTO `goods_pic_shop` VALUES ('180', '43', '34b34baa322c4e0ae920081a74cc4cf4.jpg');
INSERT INTO `goods_pic_shop` VALUES ('181', '44', '49e5af99ae58e06166941ae397b08d8f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('182', '44', 'd1ec1074d3cd76979e522caaf3e8d588.jpg');
INSERT INTO `goods_pic_shop` VALUES ('183', '44', 'f9d0319a353bbdd31b65ba55eb76121f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('184', '44', '16f3904f8f7177e269a41ab3de883e03.jpg');
INSERT INTO `goods_pic_shop` VALUES ('185', '44', 'afcce6f458f5118144959abc8145bb90.jpg');
INSERT INTO `goods_pic_shop` VALUES ('186', '45', 'e0f6a57179f58454c8e27f2887e0a4dc.jpg');
INSERT INTO `goods_pic_shop` VALUES ('187', '45', '303101dcc58dd11ba0b8204ab2673413.jpg');
INSERT INTO `goods_pic_shop` VALUES ('188', '45', '3a18a1f933c50a92f4c9d909927d7358.jpg');
INSERT INTO `goods_pic_shop` VALUES ('189', '45', 'b69915a48fb69c32ae700f1ae3347551.jpg');
INSERT INTO `goods_pic_shop` VALUES ('190', '45', '75c1ef66143beb046eb3e71010db8c5f.png');
INSERT INTO `goods_pic_shop` VALUES ('191', '46', 'ec294544ec14b88bd4d6ffbc2a315c31.jpg');
INSERT INTO `goods_pic_shop` VALUES ('192', '46', 'af65986176c68045b2bbe1b06635df6f.jpg');
INSERT INTO `goods_pic_shop` VALUES ('193', '46', '60afd9282e49954bbbd9b0eb739eb3bf.jpg');
INSERT INTO `goods_pic_shop` VALUES ('194', '46', '3859e8c6da2191f27c6defdb603038e8.jpg');
INSERT INTO `goods_pic_shop` VALUES ('195', '46', '67504ab564fd855e4f227574470dbf19.jpg');
INSERT INTO `goods_pic_shop` VALUES ('196', '47', '0b207ed84e3fc33b20a30787381a6106.jpg');
INSERT INTO `goods_pic_shop` VALUES ('197', '47', '7871e90d01b93c926b5013275229eb09.jpg');
INSERT INTO `goods_pic_shop` VALUES ('198', '47', '87c6bb5a6c343c39eca98da31922f985.jpg');
INSERT INTO `goods_pic_shop` VALUES ('199', '47', 'b18ed8ca450c820210f35f28a5a4e4d0.jpg');
INSERT INTO `goods_pic_shop` VALUES ('200', '47', 'bbad1378b0a253f5e1fe3bb60f504ccd.jpg');
INSERT INTO `goods_pic_shop` VALUES ('201', '48', '21297d277a84c10395c45f71f1f6b633.jpg');
INSERT INTO `goods_pic_shop` VALUES ('202', '48', 'cac4af7e8302c1a02a279fe0be4b8e14.jpg');
INSERT INTO `goods_pic_shop` VALUES ('203', '48', '7f3d6aaf6711158f4faea3bb9d97fe8c.jpg');
INSERT INTO `goods_pic_shop` VALUES ('204', '48', '09425f73c4aebd74cbe1791f0f5945a7.jpg');
INSERT INTO `goods_pic_shop` VALUES ('205', '48', '548ca8ac78e9ef7334d9bdef168330a9.jpg');

-- ----------------------------
-- Table structure for `goods_shop`
-- ----------------------------
DROP TABLE IF EXISTS `goods_shop`;
CREATE TABLE `goods_shop` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goodsName` varchar(1000) DEFAULT NULL,
  `cid` smallint(5) unsigned DEFAULT NULL COMMENT '是category_shop里的id',
  `marketPrice` float(8,2) unsigned NOT NULL,
  `price` float(8,2) unsigned NOT NULL,
  `num` int(10) unsigned DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `pic` varchar(60) DEFAULT NULL,
  `display` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1代表展示  0代表下架',
  `addtime` int(10) unsigned DEFAULT NULL,
  `salenum` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_shop
-- ----------------------------
INSERT INTO `goods_shop` VALUES ('1', '秋冬连衣裙', '30', '99.00', '30.00', '2588', '唯美秋冬连衣裙 &nbsp;适合这个季节的美美们哦', '3a73051ade3eb367bb8764751f050a5d.jpg', '1', '1473471296', '0');
INSERT INTO `goods_shop` VALUES ('2', '雪纺衬衫', '30', '99.00', '30.90', '247969', '品牌：100F1/百分之一', 'd01369c9a05389fe99325ef46ec55127.jpg', '1', '1473471424', '1');
INSERT INTO `goods_shop` VALUES ('4', '蕾丝', '30', '198.00', '98.00', '2620', '新款 品牌 哦', '8d6caacda424ea3db66172a3030424ee.jpg', '1', '1473472430', '0');
INSERT INTO `goods_shop` VALUES ('5', '【0首付分期】 蚂蚁摄影 单反数码相机 Canon/佳能 EOS 1300D 带 wifi', '6', '3298.00', '2598.00', '57', '', '075244f76bf9524e3e5b62dfd024834d.jpg', '1', '1473473151', '0');
INSERT INTO `goods_shop` VALUES ('6', 'Canon/佳能 EOS 760D套机', '6', '5799.00', '5499.00', '26', '', 'da36bfafbbef3305f2d208ab952da0ce.jpg', '1', '1473473487', '0');
INSERT INTO `goods_shop` VALUES ('7', '蚂蚁摄影联保单反数码相机', '7', '5728.00', '5499.00', '26', '单反级别: 入门级 屏幕尺寸: 3.0 像素: 2416万 储存介质: SD卡', 'a823495b1caae9d87248970b4588fbf0.jpg', '1', '1473474522', '0');
INSERT INTO `goods_shop` VALUES ('8', '长焦数码相机 高清卡片 家用 旅游Canon /佳能 PowerShot SX720', '8', '2299.00', '18900.00', '71', '产品名称：Canon/佳能 PowerShot SX...; 品牌:Canon/佳能 型号:PowerShot SX720 HS', 'bf6c23e158e8481a024c93cdd12842f0.jpg', '1', '1473474863', '0');
INSERT INTO `goods_shop` VALUES ('9', '青年男士修身直筒休闲牛仔长裤小脚裤子潮', '31', '368.00', '88.00', '276', '上市年份季节：2015年秋季\r\n    材质成分：棉79% 聚酯纤维13% 粘胶纤维(粘纤)7% 聚氨酯弹性纤维(氨纶)1%\r\n    货号：HDWK1260\r\n    销售渠道类型：纯电商(只在线上销售)\r\n    牛仔面料：常规牛仔布\r\n    品牌：翰代维\r\n    弹力：微弹\r\n    厚薄：常规\r\n    基础风格：时尚都市', 'ddfc740974bb33fa78411ce2c2a1a063.jpg', '1', '1473475309', '0');
INSERT INTO `goods_shop` VALUES ('10', '翰代维2016秋冬季新款男士毛衣 圆领套头韩版针织衫', '31', '128.00', '69.00', '11069', '毛线粗细：常规毛线 （10针，12针）\r\n    适用场景：休闲\r\n    适用对象：青年\r\n工艺/流行\r\n    工艺处理：免烫处理\r\n    图案：其他\r\n    细分风格：青春活力', 'fa9d5083208a16977b230c9c9fdbf974.jpg', '1', '1473475442', '0');
INSERT INTO `goods_shop` VALUES ('11', '黑尼木木男童2016秋装中大童韩版3-8岁休闲卡通图案长袖t恤潮', '32', '388.00', '69.00', '135', '上市年份季节: 2016年秋季\r\n功能: 吸汗\r\n品牌: 黑尼木木\r\n安全等级: B类\r\n材质成分: 棉95% 聚氨酯弹性纤维(氨纶)5%\r\n适用季节: 春秋&nbsp;', 'c0ce2214276ee6095f1740f0d4f52316.jpg', '1', '1473475811', '0');
INSERT INTO `goods_shop` VALUES ('12', '苹果笔记本电脑dp转vga视频投影仪转换器线', '11', '128.00', '68.00', '26', '品牌: 科乐多\r\n    型号: Mac vga\r\n    长度: 0.1m\r\n    颜色分类: 尊享版铝镁合金-限量蓝送耳机 尊享版铝镁合金-钛晶银 升级版抗干扰 普通版&nbsp;', '158090c84e0875e769e648b874baad8f.jpg', '1', '1473475992', '0');
INSERT INTO `goods_shop` VALUES ('13', '正品正品mp3/mp4/mp5播放器 5.5寸高清触摸屏安卓智能7寸wifi上网', '3', '1686.00', '1386.00', '999', '品牌:&nbsp;other/其他其他更多品牌:5fa', '5e6bbdc21cb1cfc12940c9f83404e3f8.jpg', '1', '1473486984', '0');
INSERT INTO `goods_shop` VALUES ('14', '图形工作站黑苹果i7 6700 K620 3D视频剪辑设计台式组装电脑主机', '11', '6666.00', '5555.00', '50', '图形工作站黑苹果i7 6700 K620 3D视频剪辑设计台式组装电脑主机', '095e7896ec8d9ca3c1a469197f799e7f.jpg', '1', '1473487783', '1');
INSERT INTO `goods_shop` VALUES ('15', '苹果笔记本外壳macbook air pro保护壳11 12 13寸电脑外壳配件15', '9', '52.00', '33.00', '101513', '产品参数：\r\n    品牌: 科迅之星\r\n    炫彩贴', '885bccb7f4a84ab42662647b96c3d1b4.jpg', '1', '1473489192', '5');
INSERT INTO `goods_shop` VALUES ('17', '苹果笔记本屏幕保护膜Macbook Air Pro 11 12 13寸高清贴膜防刮膜', '11', '30.00', '28.80', '1500', '该商品参与了公益宝贝计划，卖家承诺每笔成交将为壹乐园计划捐赠0.02元。该商品已累积捐赠21368笔。\r\n善款用途简介：基于游戏教育在儿童成长中的重要性，壹基金设立了“壹乐园计划”，帮助提供滑梯、攀爬架、跷跷板、秋千、乒乓球桌等，为灾后及贫困地区的孩子们搭建课', 'f0804beb738cf46450269758253426ed.jpg', '1', '1473491054', '0');
INSERT INTO `goods_shop` VALUES ('18', '爱乐贝兜儿男童秋装套装2016新款潮儿童运动服秋季中大童春秋童装', '32', '259.00', '159.00', '586', '上市年份季节: 2016年秋季\r\n    品牌: 爱乐·贝兜儿\r\n    安全等级: B类', '42db2d369f05989c0550ade42041aae0.jpg', '1', '1473491250', '0');
INSERT INTO `goods_shop` VALUES ('19', '爱乐贝兜儿 儿童裤子男 中大童秋季运动裤男童装春秋长裤2016秋款', '32', '219.00', '134.00', '999', '上市年份季节: 2016年秋季\r\n    品牌: 爱乐·贝兜儿\r\n    安全等级: B类', '41689749e83e28cc95d9315fb76a120b.jpg', '1', '1473491455', '0');
INSERT INTO `goods_shop` VALUES ('20', '手机壳sm-n9008s保护套n9009硅胶套N3外壳软9002女', '34', '33.00', '16.90', '7156', '保护套质地: 其他\r\n款式: 保护壳\r\n颜色分类: 电镀软土豪+粉花蝴蝶', '5ed9233f201497edefe5ea7932f06571.jpg', '1', '1473491905', '0');
INSERT INTO `goods_shop` VALUES ('21', '一叶子补水面膜贴女夏季保湿清洁控油祛痘收缩毛孔护肤品专柜正品', '35', '99.00', '89.90', '555', '详情：\r\n规格类型: 正常规格功效: 补水 保湿 控油 深层清洁 滋润化妆品净含量: 125ml 3片', '22d83329cf40bb89398fbc299559423e.jpg', '1', '1473681123', '1');
INSERT INTO `goods_shop` VALUES ('22', '蜗牛原液蚕丝面膜补水保湿美白祛痘淡斑防过敏男女孕妇秋冬贴30片', '35', '155.90', '108.90', '6663', '产品名称: 碧素堂 蜗牛保湿修护面膜上市时间: 2015年月份: 11月是否为特殊用途化妆品: 否面膜分类: 贴片式颜色分类: 蜗牛补水 蜗牛美白', '44ec5c38a95e1d442ff609cff4f7cb1b.jpg', '1', '1473681242', '0');
INSERT INTO `goods_shop` VALUES ('23', '面膜泥去黑头粉刺清洁美白补水去黄控油淡斑祛痘印撕拉式面膜膏', '35', '99.90', '59.00', '36', '产品名称: 萱晴 羊初奶蜂蜜面蜡上市时间: 2016年月份: 8月是否为特殊用途化妆品: 否面膜分类: 撕拉式规格类型: 正常规格功效: 美白 补水 保湿 提拉紧致 损伤修复 深度保湿 修护润透适合肤质: 任何肤质化妆品净含量: 100g/mL&nbsp;', 'b956a9966a49cb23ea1556194a9feea1.jpg', '1', '1473681342', '0');
INSERT INTO `goods_shop` VALUES ('24', 'DVZ朵色弥尚芦荟补水面膜贴倍水润 保湿控油祛痘收缩光滑紧致毛孔', '35', '299.00', '199.90', '107', '上市时间: 2016年月份: 7月是否为特殊用途化妆品: 否面膜分类: 贴片式规格类型: 正常规格功效: 保湿补水 提亮肤色 舒缓肌肤 祛痘/', '710cf4011c4fb224f07b2eec0caf205a.jpg', '1', '1473681403', '0');
INSERT INTO `goods_shop` VALUES ('25', '布兰朵芦荟保湿睡眠面膜免洗补水保湿晒后修复男女祛痘淡化去痘印', '35', '108.90', '99.90', '33', '规格类型: 正常规格功效: 保湿补水 紧致、有弹性 提亮肤色 保湿 控油 晒后修复 舒缓肌肤 抗痘适合肤质: 任何肤质化妆品净含量: 120g品牌: bRANdo/布兰朵单品: 芦荟保', '71d1c8521b56848d6508a13a67079b08.jpg', '0', '1473681491', '0');
INSERT INTO `goods_shop` VALUES ('26', 'Dteens苹果手机U盘64g两用64gU盘iPhone6/6s/5/5s/iPad内存扩容器', '11', '89.00', '66.90', '11', '即拍即存 超快读取 指纹加密 时尚迷你 官方认证', 'aa151f60eaaea86f782bb2e64695b317.jpg', '1', '1473682021', '1');
INSERT INTO `goods_shop` VALUES ('27', 'megoo 苹果手机U盘64G iPhone6/6s/5/5s/iPad内存扩容器电脑两用', '11', '26.90', '13.30', '94', '手机扩容神器 手机电脑三用 苹果手机U盘', '0d5a5ac074d03a4013191e08e071d626.jpg', '1', '1473682180', '5');
INSERT INTO `goods_shop` VALUES ('28', '正品百雀羚肌初赋活致臻套装抗皱补水保湿提拉紧致淡化细纹护肤品', '25', '598.00', '339.99', '200', '正品百雀羚肌初赋活致臻套装抗皱补水保湿提拉紧致淡化细纹护肤品', 'cb181dfe74e29892d976aa4709f89511.jpg', '1', '1474099919', '0');
INSERT INTO `goods_shop` VALUES ('29', '无盒百雀羚肌初赋活紧致抗皱套装5件套 水+乳+霜+精华液+眼部精华', '25', '398.00', '298.00', '245', '功效: 补水 保湿 抗皱 提拉紧致', 'd94a9223cfa99bc46b7257af5abd2c76.jpg', '1', '1474100176', '0');
INSERT INTO `goods_shop` VALUES ('30', '百雀羚护肤品男士焕活劲爽套装保湿爽肤水乳液面霜洁面清爽控油', '25', '124.00', '68.00', '1200', '百雀羚 男士焕活劲爽套装，补水、控油、清爽保湿，特价优惠，自用、送礼首选。', 'da03179cc24da76892067e199e5714bc.jpg', '1', '1474100265', '0');
INSERT INTO `goods_shop` VALUES ('31', '补水美白！百雀羚水嫩倍现2件套装精华水+乳液保湿细滑化妆品包邮', '25', '156.00', '98.00', '350', '产品外盒有防伪码，绝对诚信正品，本套装适合，中性 干性 混合性肤质，改善皮肤干燥 暗黄 缺水 细滑紧致 提高肤色 美白补水。', '91d133238bc5b52adea3d2775a7b1875.jpg', '1', '1474100340', '0');
INSERT INTO `goods_shop` VALUES ('32', '补水美白！百雀羚水嫩倍现2件套装精华水+乳液保湿细滑化妆品包邮', '25', '156.00', '98.00', '349', '产品外盒有防伪码，绝对诚信正品，本套装适合，中性 干性 混合性肤质，改善皮肤干燥 暗黄 缺水 细滑紧致 提高肤色 美白补水。', '3d4d637a694fffcbccb93f07a378f176.jpg', '1', '1474100345', '1');
INSERT INTO `goods_shop` VALUES ('33', '[天天特价]百雀羚化妆品 气韵臻白如玉套装 美白去黄保湿淡斑正品', '0', '458.00', '219.00', '348', '【专柜正品 防伪可查】【七天无理由退换货】【赠运费险】 臻白如玉四件套套装，百雀羚高端系列产品，原价458元，现219元特价销售，送长辈，送朋友，送自己！', 'a233157489154275d7174b367ff71a9f.jpg', '1', '1474100590', '0');
INSERT INTO `goods_shop` VALUES ('34', '百雀羚面膜 水嫩倍现盈采精华面膜 深层补水保湿滋润 舒养面膜贴', '25', '96.00', '39.00', '555', '更超值 一起使用 一套2盒（相当于买一盒送一盒）共10片 2套加送2片八杯水面膜', '08d312f7f38d06c20aef363eb2fea402.jpg', '1', '1474100797', '0');
INSERT INTO `goods_shop` VALUES ('35', '希芸鲨烷保湿水嫩面膜贴套装 深度补水天丝面膜收缩毛孔', '25', '88.00', '58.50', '678', '希芸鲨烷保湿水嫩面膜贴套装 深度补水天丝面膜收缩毛孔', '1ea305dfefcf90b2ac57855ed2310b8b.jpg', '1', '1474100869', '0');
INSERT INTO `goods_shop` VALUES ('36', '【专柜正品 防伪可查】【七天无理由退换货】【赠运费险】 臻白如玉四', '25', '458.00', '219.00', '889', '【专柜正品 防伪可查】【七天无理由退换货】【赠运费险】 臻白如玉四', '0fead5bfb6b41dd7f8c4e9d5495c3bbd.jpg', '1', '1474100944', '0');
INSERT INTO `goods_shop` VALUES ('37', '2016新款春秋季男童长袖中大童套装童装秋装儿童韩版潮两件套秋装', '32', '189.00', '79.00', '909', '品牌: 天依酷安全等级: B类货号: 5064适用性别: 中性颜色分类: 浅灰色 黑色 蓝色参考身高: 建议身高100-110CM 建议身', '443e548ad0daaca50912af5a60468bdf.jpg', '1', '1474101196', '0');
INSERT INTO `goods_shop` VALUES ('38', '2016春秋季新品韩版潮流时尚印花暗纹女童连衣裙休闲中大童A字裙', '32', '158.00', '79.00', '234', '2016春秋季新品韩版潮流时尚印花暗纹女童连衣裙休闲中大童A字裙', 'bf5159feda5630958940618d6f94a018.jpg', '1', '1474101337', '0');
INSERT INTO `goods_shop` VALUES ('39', '童装女童连衣裙夏2016新款韩版中大童170大女孩180儿童公主裙子潮', '32', '158.00', '79.00', '566', '童装女童连衣裙夏2016新款韩版中大童170大女孩180儿童公主裙子潮', 'ee836e785494dba0bb16b7d775ab6ea0.jpg', '1', '1474101414', '1');
INSERT INTO `goods_shop` VALUES ('40', '2016夏季新款童装中大童儿童吊带裙女孩背心裙韩版雪纺女童童装', '32', '160.00', '80.00', '776', '品牌: 鸭脚木安全等级: B类颜色分类: 火凤凰 蓝凤凰', 'f98feff5a191ba841b33ef1c62703667.jpg', '1', '1474101481', '1');
INSERT INTO `goods_shop` VALUES ('41', '童装女童秋装连衣裙2016新款宝宝3-4-5岁学院风长袖儿童连衣裙潮 130cm 藏青色（建议大一码）', '32', '98.00', '49.00', '399', '童装女童秋装连衣裙2016新款宝宝3-4-5岁学院风长袖儿童连衣裙潮 130cm 藏青色（建议大一码）', 'fb6853fdf9a58f9e2c12f0986698f339.jpg', '1', '1474101547', '0');
INSERT INTO `goods_shop` VALUES ('42', 'DIM/迪美 DIM G4+ 指纹解锁一体机5.5英寸大屏超薄移动4G智能手机', '12', '799.00', '488.00', '21957', 'DIM/迪美 DIM G4+ 指纹解锁一体机5.5英寸大屏超薄移动4G智能手机', '72eab8c8f920b46ffbdfb878dd8cf276.jpg', '1', '1474101896', '0');
INSERT INTO `goods_shop` VALUES ('43', '优迈Q5 摄像头 免驱高清电脑台式视频 笔记本夜视摄像头包邮', '9', '69.00', '15.90', '2365', '收藏宝贝 (4425人气) 分享\r\n优迈Q5 摄像头 免驱高清电脑台式视频 笔记本夜视摄像头包邮\r\n热销 即插即用 超强高清夜视 兼容系统', 'a476ce114c3c307056aad0a1c9d7ab5f.jpg', '1', '1474102313', '0');
INSERT INTO `goods_shop` VALUES ('44', 'steb赛特博T21高清笔记本台式电脑摄像头麦克风免驱夜视频头包邮', '9', '99.00', '39.00', '3236', 'steb赛特博T21高清笔记本台式电脑摄像头麦克风免驱夜视频头包邮', '49e5af99ae58e06166941ae397b08d8f.jpg', '1', '1474102468', '0');
INSERT INTO `goods_shop` VALUES ('45', '【国行正品】Casio/卡西欧EX-TR600自拍神器tr550美颜相机500 150', '6', '3888.00', '3388.00', '1172', '【国行正品】Casio/卡西欧EX-TR600自拍神器tr550美颜相机500 150', 'e0f6a57179f58454c8e27f2887e0a4dc.jpg', '1', '1474102858', '4');
INSERT INTO `goods_shop` VALUES ('46', '柯达 AZ501 50倍长焦数码相机媲美单反 正品联保', '6', '1379.00', '1279.00', '1479', '柯达 AZ501 50倍长焦数码相机媲美单反 正品联保', 'ec294544ec14b88bd4d6ffbc2a315c31.jpg', '1', '1474103073', '0');
INSERT INTO `goods_shop` VALUES ('47', '特价Canon/佳能 PowerShot SX520 HS高清长焦数码照相机单反外观', '7', '1298.00', '1198.00', '584', '特价Canon/佳能 PowerShot SX520 HS高清长焦数码照相机单反外观', '0b207ed84e3fc33b20a30787381a6106.jpg', '1', '1474103215', '2');
INSERT INTO `goods_shop` VALUES ('48', 'PowerShot SX60 HS长焦数码照相机高清微型单反备用机', '7', '5686.00', '3668.00', '11384', 'PowerShot SX60 HS长焦数码照相机高清微型单反备用机', '21297d277a84c10395c45f71f1f6b633.jpg', '1', '1474103361', '10');

-- ----------------------------
-- Table structure for `home_cart_shop`
-- ----------------------------
DROP TABLE IF EXISTS `home_cart_shop`;
CREATE TABLE `home_cart_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `buyNum` int(10) unsigned DEFAULT NULL,
  `addTime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_cart_shop
-- ----------------------------
INSERT INTO `home_cart_shop` VALUES ('18', '2', '17', '1', '1473751847');
INSERT INTO `home_cart_shop` VALUES ('19', '2', '19', '1', '1473759533');
INSERT INTO `home_cart_shop` VALUES ('57', '3', '37', '1', '1474105079');
INSERT INTO `home_cart_shop` VALUES ('60', '5', '34', '2', '1474106728');
INSERT INTO `home_cart_shop` VALUES ('72', '3', '11', '1', '1474117835');
INSERT INTO `home_cart_shop` VALUES ('83', '4', '30', '1', '1474179075');
INSERT INTO `home_cart_shop` VALUES ('84', '4', '45', '3', '1474179189');
INSERT INTO `home_cart_shop` VALUES ('85', '4', '8', '1', '1474179526');
INSERT INTO `home_cart_shop` VALUES ('88', '1', '39', '2', '1474461460');
INSERT INTO `home_cart_shop` VALUES ('89', '1', '29', '1', '1474461465');
INSERT INTO `home_cart_shop` VALUES ('90', '1', '19', '1', '1477301466');

-- ----------------------------
-- Table structure for `home_ordergoods_shop`
-- ----------------------------
DROP TABLE IF EXISTS `home_ordergoods_shop`;
CREATE TABLE `home_ordergoods_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned DEFAULT NULL,
  `buyNum` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_ordergoods_shop
-- ----------------------------
INSERT INTO `home_ordergoods_shop` VALUES ('1', '1', '9', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('2', '2', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('3', '3', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('4', '4', '4', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('5', '5', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('6', '6', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('7', '6', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('8', '6', '4', '8');
INSERT INTO `home_ordergoods_shop` VALUES ('9', '6', '9', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('10', '7', '9', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('11', '8', '9', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('12', '9', '9', '3');
INSERT INTO `home_ordergoods_shop` VALUES ('13', '9', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('14', '9', '4', '8');
INSERT INTO `home_ordergoods_shop` VALUES ('15', '10', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('16', '11', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('17', '11', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('18', '12', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('19', '12', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('20', '13', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('21', '13', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('22', '14', '26', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('23', '15', '5', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('24', '16', '4', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('25', '16', '9', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('26', '16', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('27', '16', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('28', '16', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('29', '17', '10', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('30', '18', '10', '3');
INSERT INTO `home_ordergoods_shop` VALUES ('31', '18', '4', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('32', '18', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('33', '19', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('34', '20', '2', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('35', '20', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('36', '20', '4', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('37', '20', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('38', '21', '4', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('39', '21', '2', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('40', '21', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('41', '21', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('42', '22', '4', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('43', '22', '2', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('44', '22', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('45', '22', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('46', '23', '4', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('47', '23', '2', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('48', '23', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('49', '24', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('50', '25', '4', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('51', '25', '2', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('52', '25', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('53', '25', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('54', '26', '2', '3');
INSERT INTO `home_ordergoods_shop` VALUES ('55', '26', '4', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('56', '26', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('57', '26', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('58', '27', '15', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('59', '27', '2', '3');
INSERT INTO `home_ordergoods_shop` VALUES ('60', '27', '4', '3');
INSERT INTO `home_ordergoods_shop` VALUES ('61', '27', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('62', '28', '14', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('63', '29', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('64', '30', '2', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('65', '31', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('66', '32', '4', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('67', '32', '10', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('68', '33', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('69', '33', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('70', '34', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('71', '34', '10', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('72', '35', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('73', '35', '10', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('74', '36', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('75', '36', '10', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('76', '37', '21', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('77', '38', '10', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('78', '39', '22', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('79', '40', '22', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('80', '40', '4', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('81', '41', '5', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('82', '41', '22', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('83', '42', '25', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('84', '43', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('85', '44', '2', '4');
INSERT INTO `home_ordergoods_shop` VALUES ('86', '44', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('87', '44', '11', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('88', '44', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('89', '45', '4', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('90', '46', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('91', '47', '26', '3');
INSERT INTO `home_ordergoods_shop` VALUES ('92', '47', '1', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('93', '48', '27', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('94', '48', '5', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('95', '49', '22', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('96', '50', '22', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('97', '51', '22', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('98', '52', '24', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('99', '53', '27', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('100', '54', '27', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('101', '55', '27', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('102', '56', '26', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('103', '57', '26', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('104', '58', '8', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('105', '58', '1', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('106', '58', '10', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('107', '59', '21', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('108', '59', '2', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('109', '60', '28', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('110', '61', '32', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('111', '62', '40', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('112', '63', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('113', '64', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('114', '65', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('115', '66', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('116', '67', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('117', '68', '43', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('118', '69', '48', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('119', '70', '48', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('120', '71', '48', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('121', '72', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('122', '72', '27', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('123', '73', '40', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('124', '74', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('125', '75', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('126', '76', '48', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('127', '77', '48', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('128', '78', '48', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('129', '79', '14', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('130', '80', '48', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('131', '81', '45', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('132', '82', '45', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('133', '83', '47', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('134', '84', '45', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('135', '85', '45', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('136', '86', '45', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('137', '87', '45', '3');
INSERT INTO `home_ordergoods_shop` VALUES ('138', '88', '48', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('139', '89', '47', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('140', '89', '48', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('141', '91', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('142', '92', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('143', '93', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('144', '94', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('145', '95', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('146', '96', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('147', '97', '18', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('148', '98', '18', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('149', '99', '40', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('150', '100', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('151', '101', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('152', '102', '19', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('153', '103', '19', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('154', '104', '40', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('155', '105', '40', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('156', '106', '15', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('157', '107', '19', '2');
INSERT INTO `home_ordergoods_shop` VALUES ('158', '114', '14', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('159', '115', '14', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('160', '116', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('161', '117', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('162', '118', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('163', '119', '39', '1');
INSERT INTO `home_ordergoods_shop` VALUES ('164', '120', '39', '1');

-- ----------------------------
-- Table structure for `home_orderstatus_shop`
-- ----------------------------
DROP TABLE IF EXISTS `home_orderstatus_shop`;
CREATE TABLE `home_orderstatus_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statusName` varchar(255) NOT NULL COMMENT '1 是待付款 2是代发货  3是待确认发货 4 订单完成',
  `adminopt` varchar(60) DEFAULT NULL,
  `useropt` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_orderstatus_shop
-- ----------------------------
INSERT INTO `home_orderstatus_shop` VALUES ('1', '待付款', null, '付款');
INSERT INTO `home_orderstatus_shop` VALUES ('2', '已付款', '发货', null);
INSERT INTO `home_orderstatus_shop` VALUES ('3', '待收货', '', '确认收货');
INSERT INTO `home_orderstatus_shop` VALUES ('4', '订单完成', null, null);

-- ----------------------------
-- Table structure for `home_order_shop`
-- ----------------------------
DROP TABLE IF EXISTS `home_order_shop`;
CREATE TABLE `home_order_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordersyn` varchar(60) NOT NULL COMMENT '订单序列号',
  `mid` int(10) unsigned NOT NULL,
  `orderPrice` float(10,2) DEFAULT NULL,
  `orderStatus` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `addTime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_order_shop
-- ----------------------------
INSERT INTO `home_order_shop` VALUES ('1', '20160913cd81c30bdd89f03', '1', '88.00', '4', '1473764896');
INSERT INTO `home_order_shop` VALUES ('2', '201609132d76dfeb2c56644', '2', '134.00', '1', '1473764937');
INSERT INTO `home_order_shop` VALUES ('3', '20160913d77f71e882c189c', '2', '30.90', '1', '1473769298');
INSERT INTO `home_order_shop` VALUES ('4', '201609136d1647e43246928', '2', '98.00', '1', '1473769310');
INSERT INTO `home_order_shop` VALUES ('5', '201609142cd61fdd726aaa1', '1', '30.90', '4', '1473823968');
INSERT INTO `home_order_shop` VALUES ('6', '20160914531cdc3770f1197', '1', '1019.00', '4', '1473828422');
INSERT INTO `home_order_shop` VALUES ('7', '20160914323aacde15b44d3', '1', '88.00', '3', '1473828539');
INSERT INTO `home_order_shop` VALUES ('8', '20160914b2b12375348a334', '1', '88.00', '1', '1473828822');
INSERT INTO `home_order_shop` VALUES ('9', '20160914eb4b9c91cd6e9ec', '1', '1077.00', '3', '1473829273');
INSERT INTO `home_order_shop` VALUES ('10', '201609147f3f480e1d976e5', '1', '30.00', '3', '1473829394');
INSERT INTO `home_order_shop` VALUES ('11', '201609140b6c312156fb22f', '1', '164.00', '3', '1473829493');
INSERT INTO `home_order_shop` VALUES ('12', '20160914b8b109bc4d8502f', '1', '164.00', '1', '1473830916');
INSERT INTO `home_order_shop` VALUES ('13', '20160914c91648f3d23f562', '1', '164.00', '3', '1473834130');
INSERT INTO `home_order_shop` VALUES ('14', '20160914c6c2ec4725c8a82', '1', '66.90', '1', '1473834158');
INSERT INTO `home_order_shop` VALUES ('15', '20160914239bee1a3c7ddc5', '1', '5196.00', '3', '1473834199');
INSERT INTO `home_order_shop` VALUES ('16', '201609148d5e6285f99d0f1', '1', '471.00', '3', '1473840343');
INSERT INTO `home_order_shop` VALUES ('17', '20160914b87cd83d02d6c55', '1', '69.00', '1', '1473840771');
INSERT INTO `home_order_shop` VALUES ('18', '201609140542bb4c961be4e', '1', '338.00', '3', '1473840786');
INSERT INTO `home_order_shop` VALUES ('19', '2016091423888e361a883ac', '1', '30.90', '1', '1473841164');
INSERT INTO `home_order_shop` VALUES ('20', '201609149275083ac48d295', '1', '467.00', '3', '1473844838');
INSERT INTO `home_order_shop` VALUES ('21', '2016091599f23b8fa52d231', '1', '565.00', '1', '1473894911');
INSERT INTO `home_order_shop` VALUES ('22', '201609157eaadff14ecaf7d', '1', '565.00', '1', '1473895148');
INSERT INTO `home_order_shop` VALUES ('23', '20160915305ab170589f817', '1', '532.00', '3', '1473897798');
INSERT INTO `home_order_shop` VALUES ('24', '20160915c51b8b3f17be228', '1', '33.00', '1', '1473897817');
INSERT INTO `home_order_shop` VALUES ('25', '20160916dcf5ab23015af4f', '1', '565.00', '1', '1473991403');
INSERT INTO `home_order_shop` VALUES ('26', '20160916c93fcd7f4ed09c9', '1', '595.00', '3', '1473994097');
INSERT INTO `home_order_shop` VALUES ('27', '20160916da05ef93f4d5730', '1', '726.00', '1', '1473998731');
INSERT INTO `home_order_shop` VALUES ('28', '20160916a6e5d474dacad87', '1', '5555.00', '1', '1473998744');
INSERT INTO `home_order_shop` VALUES ('29', '20160916e4d5060744b33ed', '3', '134.00', '1', '1474023646');
INSERT INTO `home_order_shop` VALUES ('30', '20160917784b768109cdf1a', '3', '120.00', '1', '1474043115');
INSERT INTO `home_order_shop` VALUES ('31', '201609171a67b035a068be5', '1', '33.00', '2', '1474044549');
INSERT INTO `home_order_shop` VALUES ('32', '201609178908083f9117dec', '1', '167.00', '1', '1474044630');
INSERT INTO `home_order_shop` VALUES ('33', '20160917e216a1da41de293', '1', '305.00', '1', '1474045598');
INSERT INTO `home_order_shop` VALUES ('34', '201609173754e1846d904f2', '1', '98.00', '2', '1474045608');
INSERT INTO `home_order_shop` VALUES ('35', '20160917ec6e5478aa01daa', '1', '98.00', '1', '1474084327');
INSERT INTO `home_order_shop` VALUES ('36', '20160917f4a28dfd9c17871', '1', '98.00', '1', '1474084718');
INSERT INTO `home_order_shop` VALUES ('37', '201609173dc7296895cb6a1', '1', '89.00', '1', '1474086511');
INSERT INTO `home_order_shop` VALUES ('38', '20160917cd1ba61f6f7ba22', '1', '276.00', '2', '1474087779');
INSERT INTO `home_order_shop` VALUES ('39', '201609177e62198e686ff6d', '1', '108.90', '1', '1474090466');
INSERT INTO `home_order_shop` VALUES ('40', '2016091759f5434ce83a076', '1', '304.00', '1', '1474090490');
INSERT INTO `home_order_shop` VALUES ('41', '201609174370aea92dcc2d9', '1', '2706.00', '2', '1474091938');
INSERT INTO `home_order_shop` VALUES ('42', '2016091726357d2d317f676', '1', '99.90', '1', '1474094700');
INSERT INTO `home_order_shop` VALUES ('43', '2016091728a578936fd2df7', '1', '29.00', '1', '1474095081');
INSERT INTO `home_order_shop` VALUES ('44', '20160917427097394c9ebc9', '3', '352.00', '2', '1474095674');
INSERT INTO `home_order_shop` VALUES ('45', '201609177431047d653beba', '3', '98.00', '2', '1474097011');
INSERT INTO `home_order_shop` VALUES ('46', '20160917463ba7dec7fc9a0', '3', '30.00', '2', '1474097224');
INSERT INTO `home_order_shop` VALUES ('47', '201609178e52085e4dd3e4f', '3', '227.00', '2', '1474097278');
INSERT INTO `home_order_shop` VALUES ('48', '20160917a77b7727d1345dd', '3', '2611.00', '2', '1474097327');
INSERT INTO `home_order_shop` VALUES ('49', '201609178f6f1a33db0524d', '3', '108.00', '2', '1474097484');
INSERT INTO `home_order_shop` VALUES ('50', '20160917ccd6b976830c72b', '3', '108.00', '2', '1474097525');
INSERT INTO `home_order_shop` VALUES ('51', '201609178b31fe203d7a4b1', '3', '108.00', '2', '1474097955');
INSERT INTO `home_order_shop` VALUES ('52', '20160917b6a01687da9d6e9', '3', '199.00', '2', '1474097989');
INSERT INTO `home_order_shop` VALUES ('53', '20160917202097fb239c61e', '3', '13.30', '1', '1474098072');
INSERT INTO `home_order_shop` VALUES ('54', '2016091783fdf81353b4e34', '3', '13.00', '2', '1474098137');
INSERT INTO `home_order_shop` VALUES ('55', '20160917e927bc876a80f36', '3', '26.00', '2', '1474098201');
INSERT INTO `home_order_shop` VALUES ('56', '2016091745b748558f2332b', '3', '66.90', '1', '1474098220');
INSERT INTO `home_order_shop` VALUES ('57', '2016091756de06e03d65d07', '3', '66.00', '2', '1474098294');
INSERT INTO `home_order_shop` VALUES ('58', '20160917088e778ac64fdc4', '3', '19096.00', '1', '1474098332');
INSERT INTO `home_order_shop` VALUES ('59', '20160917bbbeba3a72607a2', '3', '119.00', '2', '1474099728');
INSERT INTO `home_order_shop` VALUES ('60', '20160917393c605703605de', '4', '339.99', '2', '1474106556');
INSERT INTO `home_order_shop` VALUES ('61', '20160917c2e4572e72404f2', '5', '98.00', '2', '1474106612');
INSERT INTO `home_order_shop` VALUES ('62', '201609173ae2c6d64cb9161', '5', '80.00', '2', '1474106663');
INSERT INTO `home_order_shop` VALUES ('63', '20160917a9d990a21b9dee0', '5', '33.00', '1', '1474106915');
INSERT INTO `home_order_shop` VALUES ('64', '201609176f3125fa0b0e50a', '5', '33.00', '2', '1474106925');
INSERT INTO `home_order_shop` VALUES ('65', '20160917910378304a0065d', '4', '33.00', '2', '1474122036');
INSERT INTO `home_order_shop` VALUES ('66', '20160917a385e01f8bb254e', '4', '33.00', '2', '1474122598');
INSERT INTO `home_order_shop` VALUES ('67', '2016091734dfc753de2073f', '4', '79.00', '2', '1474125028');
INSERT INTO `home_order_shop` VALUES ('68', '20160917eb1183b34f4d03f', '4', '15.90', '2', '1474125326');
INSERT INTO `home_order_shop` VALUES ('69', '201609176133d74b64a2223', '4', '3668.00', '2', '1474125382');
INSERT INTO `home_order_shop` VALUES ('70', '20160917d6b9bd480097b02', '4', '3668.00', '2', '1474126025');
INSERT INTO `home_order_shop` VALUES ('71', '20160918de9e6c1ed1ca73c', '4', '3668.00', '2', '1474128073');
INSERT INTO `home_order_shop` VALUES ('72', '20160918cc429036d505f14', '4', '105.00', '2', '1474170470');
INSERT INTO `home_order_shop` VALUES ('73', '2016091883c818398a21cc3', '4', '80.00', '1', '1474170620');
INSERT INTO `home_order_shop` VALUES ('74', '20160918a3fd067f7712b32', '4', '33.00', '2', '1474178183');
INSERT INTO `home_order_shop` VALUES ('75', '20160918cef940a1f8f5983', '4', '33.00', '2', '1474178199');
INSERT INTO `home_order_shop` VALUES ('76', '20160918b3905a863fc82da', '4', '3668.00', '2', '1474178420');
INSERT INTO `home_order_shop` VALUES ('77', '20160918301d3affd8f20c2', '4', '7336.00', '2', '1474178447');
INSERT INTO `home_order_shop` VALUES ('78', '2016091893c9d54de1ca852', '4', '7336.00', '2', '1474178470');
INSERT INTO `home_order_shop` VALUES ('79', '201609181828c68d3d48c61', '4', '5555.00', '2', '1474178700');
INSERT INTO `home_order_shop` VALUES ('80', '201609186a90cdecd8bcef9', '4', '3668.00', '2', '1474178837');
INSERT INTO `home_order_shop` VALUES ('81', '20160918d9480d7ace9bc44', '4', '3388.00', '2', '1474178849');
INSERT INTO `home_order_shop` VALUES ('82', '20160918c8f9ecde9a53330', '4', '3388.00', '2', '1474178952');
INSERT INTO `home_order_shop` VALUES ('83', '201609188f7aea2709aba86', '4', '1198.00', '2', '1474179022');
INSERT INTO `home_order_shop` VALUES ('84', '201609185b17f647113506d', '4', '3388.00', '2', '1474179090');
INSERT INTO `home_order_shop` VALUES ('85', '201609186d49f8257f68423', '4', '3388.00', '2', '1474179106');
INSERT INTO `home_order_shop` VALUES ('86', '20160918ade59346b66cf42', '4', '3388.00', '1', '1474179192');
INSERT INTO `home_order_shop` VALUES ('87', '20160918c30a8cd2a4dbb79', '4', '10164.00', '1', '1474179533');
INSERT INTO `home_order_shop` VALUES ('88', '2016091945384329b6f18fa', '1', '3668.00', '2', '1474290221');
INSERT INTO `home_order_shop` VALUES ('89', '20160919273dc7e46c8e6a8', '1', '4866.00', '2', '1474290413');
INSERT INTO `home_order_shop` VALUES ('90', '201609296c1ec6af87c6afb', '1', '0.00', '1', '1475125454');
INSERT INTO `home_order_shop` VALUES ('91', '20160929ddd82ff094e1a23', '1', '79.00', '1', '1475125550');
INSERT INTO `home_order_shop` VALUES ('92', '20160930325ec50b6c216f7', '1', '134.00', '1', '1475220220');
INSERT INTO `home_order_shop` VALUES ('93', '20160930d60843d0d24f4c6', '1', '134.00', '1', '1475220301');
INSERT INTO `home_order_shop` VALUES ('94', '2016093033b807f488fa106', '1', '134.00', '1', '1475220301');
INSERT INTO `home_order_shop` VALUES ('95', '20160930eb6013b36c652b1', '1', '134.00', '1', '1475220344');
INSERT INTO `home_order_shop` VALUES ('96', '2016093003201d21e90f777', '1', '134.00', '1', '1475220344');
INSERT INTO `home_order_shop` VALUES ('97', '20160930bddeed941c508a7', '1', '159.00', '1', '1475220452');
INSERT INTO `home_order_shop` VALUES ('98', '20160930108e255825f061d', '1', '159.00', '1', '1475220452');
INSERT INTO `home_order_shop` VALUES ('99', '20160930243195ee66b0d36', '1', '80.00', '1', '1475220784');
INSERT INTO `home_order_shop` VALUES ('100', '2016093009985d22001bb91', '1', '79.00', '1', '1475220834');
INSERT INTO `home_order_shop` VALUES ('101', '20160930b2bb8a300b8c60f', '1', '79.00', '1', '1475220834');
INSERT INTO `home_order_shop` VALUES ('102', '20160930a56d6493217cd99', '1', '268.00', '1', '1475224187');
INSERT INTO `home_order_shop` VALUES ('103', '20160930a713330ac2594ec', '1', '134.00', '1', '1475224224');
INSERT INTO `home_order_shop` VALUES ('104', '201609308776d25b87b4c75', '1', '80.00', '1', '1475224242');
INSERT INTO `home_order_shop` VALUES ('105', '20160930a828a4006271722', '1', '80.00', '1', '1475224242');
INSERT INTO `home_order_shop` VALUES ('106', '20160930997d5b7ce592540', '1', '33.00', '1', '1475224260');
INSERT INTO `home_order_shop` VALUES ('107', '2016093091bc8d439c92a55', '13', '268.00', '1', '1475225608');
INSERT INTO `home_order_shop` VALUES ('108', '20161012e73f5c787a4d985', '1', '0.00', '1', '1476246802');
INSERT INTO `home_order_shop` VALUES ('109', '20161012b79c817f1c19145', '1', '0.00', '1', '1476246807');
INSERT INTO `home_order_shop` VALUES ('110', '20161012e8ff9a0de88effc', '1', '0.00', '1', '1476246808');
INSERT INTO `home_order_shop` VALUES ('111', '20161012b8539150cbd72c5', '1', '0.00', '1', '1476246809');
INSERT INTO `home_order_shop` VALUES ('112', '201610120ff7ecec96223a2', '1', '0.00', '1', '1476246809');
INSERT INTO `home_order_shop` VALUES ('113', '20161012ffbd0b0895a5c97', '1', '0.00', '1', '1476246814');
INSERT INTO `home_order_shop` VALUES ('114', '2016101230af981e863ceae', '1', '5555.00', '1', '1476246991');
INSERT INTO `home_order_shop` VALUES ('115', '2016101242819961edab7c3', '1', '5555.00', '1', '1476246991');
INSERT INTO `home_order_shop` VALUES ('116', '20161012422996fe784f8b3', '1', '79.00', '1', '1476246997');
INSERT INTO `home_order_shop` VALUES ('117', '2016101201889204818da70', '1', '79.00', '1', '1476246998');
INSERT INTO `home_order_shop` VALUES ('118', '2016101210546ff6b7ea69d', '1', '79.00', '1', '1476247089');
INSERT INTO `home_order_shop` VALUES ('119', '20161012d12166c662ad900', '1', '79.00', '1', '1476247134');
INSERT INTO `home_order_shop` VALUES ('120', '201610120a0cef0bf808e4d', '1', '79.00', '1', '1476247134');

-- ----------------------------
-- Table structure for `home_user_login`
-- ----------------------------
DROP TABLE IF EXISTS `home_user_login`;
CREATE TABLE `home_user_login` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastLoginIp` varchar(255) DEFAULT NULL,
  `lastTime` varchar(255) DEFAULT NULL,
  `registerTime` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `permission` tinyint(1) DEFAULT '1' COMMENT '1为激活 0 为禁止',
  `sex` enum('1','0') DEFAULT '1' COMMENT '1为女 0 为男',
  `moblie` varchar(255) DEFAULT NULL,
  `emil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_user_login
-- ----------------------------
INSERT INTO `home_user_login` VALUES ('1', 'shenyan', '123456', '127.0.0.1', '1477301543', '1473680232', '1932314889', '1', '1', '18736199128', '1932314889@qq.com');
INSERT INTO `home_user_login` VALUES ('2', 'beibei', '1932314889@qq.com', '127.0.0.1', '1473764931', '1473747059', '1932314889', '1', '1', '18736199128', '1932314889@qq.com');
INSERT INTO `home_user_login` VALUES ('3', 'shenyan1', 'shenyan', '127.0.0.1', '1474117803', '1474019358', '18736199128', '1', '1', '', '');
INSERT INTO `home_user_login` VALUES ('4', 'caozhe', 'caozhe', '127.0.0.1', '1474170456', '1474106447', null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('5', 'caozhe0394', 'caozhe0394', '127.0.0.1', '1474106658', '1474106532', null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('10', 'xiaoming', '123456', null, null, null, null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('11', 'shenyan11', 'shenyan11', null, null, null, null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('13', 'xiaoyan', 'xiaoyan', null, null, null, null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('14', 'xiaoyan', 'xiaoyan', null, null, null, null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('20', 'xioayan', 'xioayan', null, null, null, null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('21', 'xioayan', 'xioayan', null, null, null, null, '1', '1', null, null);
INSERT INTO `home_user_login` VALUES ('22', 'xioayan', 'xioayan', null, null, null, null, '1', '1', null, null);

-- ----------------------------
-- Table structure for `user_shop`
-- ----------------------------
DROP TABLE IF EXISTS `user_shop`;
CREATE TABLE `user_shop` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastlogin` int(11) DEFAULT NULL,
  `lastip` varchar(30) DEFAULT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 代表允许登录  0 代表机禁止登陆',
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_shop
-- ----------------------------
INSERT INTO `user_shop` VALUES ('1', 'admin', 'admin', '1477442641', '127.0.0.1', '1', '1473500898');
INSERT INTO `user_shop` VALUES ('2', 'yanyan', 'yanyan', null, null, '1', '1473500907');
INSERT INTO `user_shop` VALUES ('3', 'admin1', 'admin1', null, null, '1', '1473575364');
