/*
Navicat MySQL Data Transfer

Source Server         : Beta
Source Server Version : 50520
Source Host           : 47.92.119.167:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2018-06-25 09:32:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wing_admin
-- ----------------------------
DROP TABLE IF EXISTS `wing_admin`;
CREATE TABLE `wing_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '管理员名称',
  `admin_aliasname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '管理员笔名',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `admin_is_super` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  `admin_gid` int(11) NOT NULL DEFAULT '0' COMMENT '权限组ID',
  `admin_last_logintime` datetime NOT NULL COMMENT '最后一次登陆时间',
  `admin_admin_loginnum` int(11) NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_admin
-- ----------------------------
INSERT INTO `wing_admin` VALUES ('1', 'administrator', '', '$2y$10$jGlMUIlWDP/aJTikKxypPuu2Z6mmuEoQIiwEd/lrJveZjOYkvNxU.', '', '0', '0', '0000-00-00 00:00:00', '0', null, null, null);
INSERT INTO `wing_admin` VALUES ('2', 'admin', '', '$2y$10$jGlMUIlWDP/aJTikKxypPuu2Z6mmuEoQIiwEd/lrJveZjOYkvNxU.', '', '0', '0', '0000-00-00 00:00:00', '0', null, null, null);

-- ----------------------------
-- Table structure for wing_article
-- ----------------------------
DROP TABLE IF EXISTS `wing_article`;
CREATE TABLE `wing_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章栏目ID',
  `article_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章标题',
  `article_shorttitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '短标题',
  `article_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `article_abstract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章简介',
  `article_seo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO Title',
  `article_seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO 描述',
  `article_seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO Keywords',
  `article_duty_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '责任编辑（JSON：管理员ID、笔名）',
  `article_from_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '投稿用户（JSON：用户ID、用户名）',
  `article_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章来源（JSON：来源网址、网站名称）',
  `article_tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章标签（标签名称）',
  `article_soft` int(11) NOT NULL DEFAULT '255' COMMENT '排序',
  `is_publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '是否发布（0草稿 1发布）',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_article
-- ----------------------------

-- ----------------------------
-- Table structure for wing_article_addition
-- ----------------------------
DROP TABLE IF EXISTS `wing_article_addition`;
CREATE TABLE `wing_article_addition` (
  `addition_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0' COMMENT '主表ID',
  `article_content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
  `article_clicks` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `article_last_click` datetime NOT NULL COMMENT '文章最后查看时间',
  `is_goods` int(11) NOT NULL DEFAULT '0' COMMENT '好评',
  `is_bads` int(11) NOT NULL DEFAULT '0' COMMENT '差评',
  `article_comment_counts` int(11) NOT NULL DEFAULT '0' COMMENT '文章评论总数',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`addition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_article_addition
-- ----------------------------

-- ----------------------------
-- Table structure for wing_article_type
-- ----------------------------
DROP TABLE IF EXISTS `wing_article_type`;
CREATE TABLE `wing_article_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `type_pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_article_type
-- ----------------------------

-- ----------------------------
-- Table structure for wing_banner
-- ----------------------------
DROP TABLE IF EXISTS `wing_banner`;
CREATE TABLE `wing_banner` (
  `banner_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `banner_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Banner图片说明',
  `banner_src` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Banner文件名',
  `banner_sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Banner排序0-255',
  `banner_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Banner图片链接',
  `banner_bgcolor` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Banner背景填充色',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of wing_banner
-- ----------------------------

-- ----------------------------
-- Table structure for wing_migrations
-- ----------------------------
DROP TABLE IF EXISTS `wing_migrations`;
CREATE TABLE `wing_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_migrations
-- ----------------------------
INSERT INTO `wing_migrations` VALUES ('1', '2017_06_30_060925_create_admin_table', '1');
INSERT INTO `wing_migrations` VALUES ('2', '2017_06_30_060925_create_article_addition_table', '1');
INSERT INTO `wing_migrations` VALUES ('3', '2017_06_30_060925_create_article_table', '1');
INSERT INTO `wing_migrations` VALUES ('4', '2017_06_30_060925_create_article_type_table', '1');
INSERT INTO `wing_migrations` VALUES ('5', '2017_06_30_060925_create_tv_classify_table', '1');
INSERT INTO `wing_migrations` VALUES ('6', '2017_06_30_060925_create_tv_special_many_table', '1');
INSERT INTO `wing_migrations` VALUES ('7', '2017_06_30_060925_create_tv_special_table', '1');
INSERT INTO `wing_migrations` VALUES ('8', '2017_06_30_060925_create_tv_table', '1');
INSERT INTO `wing_migrations` VALUES ('10', '2017_06_30_060925_create_user_table', '2');
INSERT INTO `wing_migrations` VALUES ('11', '2017_08_08_100000_create_msg_code_record_table', '3');
INSERT INTO `wing_migrations` VALUES ('12', '2017_08_08_100001_create_msg_tpl_table', '3');
INSERT INTO `wing_migrations` VALUES ('13', '2017_08_26_142859_create_wing_user_watch_table', '0');
INSERT INTO `wing_migrations` VALUES ('14', '2017_08_26_142859_create_wing_user_collect_table', '0');
INSERT INTO `wing_migrations` VALUES ('15', '2017_09_07_211306_create_wing_tv_class_table', '0');
INSERT INTO `wing_migrations` VALUES ('16', '2017_09_08_174411_create_wing_banner_table', '0');
INSERT INTO `wing_migrations` VALUES ('17', '2017_09_15_153452_create_wing_tv_feedback_table', '0');
INSERT INTO `wing_migrations` VALUES ('18', '2017_09_15_153452_create_wing_tv_seek_table', '0');

-- ----------------------------
-- Table structure for wing_msg_code_record
-- ----------------------------
DROP TABLE IF EXISTS `wing_msg_code_record`;
CREATE TABLE `wing_msg_code_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '校验码',
  `send_type` enum('email','phone','wechat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email' COMMENT '发送消息类型',
  `send_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '接收者的帐号（手机号/微信号/邮箱号）',
  `send_time` timestamp NULL DEFAULT NULL COMMENT '发送时间',
  `verify_time` timestamp NULL DEFAULT NULL COMMENT '验证时间',
  `send_content_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '发送消息类型',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '发送IP',
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_msg_code_record
-- ----------------------------
INSERT INTO `wing_msg_code_record` VALUES ('1', '370153', 'email', '158133434@qq.com', '2017-10-08 15:33:34', null, 'test', '47.92.119.167');

-- ----------------------------
-- Table structure for wing_msg_tpl
-- ----------------------------
DROP TABLE IF EXISTS `wing_msg_tpl`;
CREATE TABLE `wing_msg_tpl` (
  `msg_tpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '模板消息 key',
  `msg_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '模板消息标题',
  `email_tpl_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮件内容_模板名称',
  `phone_tpl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手机短信内容',
  `wechat_tpl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '微信消息内容',
  PRIMARY KEY (`msg_tpl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_msg_tpl
-- ----------------------------

-- ----------------------------
-- Table structure for wing_tv
-- ----------------------------
DROP TABLE IF EXISTS `wing_tv`;
CREATE TABLE `wing_tv` (
  `tv_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '影视名称',
  `tv_alias_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '影视原名',
  `tv_brief` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '简短的广告',
  `tv_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '剧情介绍',
  `tv_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10' COMMENT '影视类型（10-电影 20-电视剧 30-动漫 40-综艺 50-音乐MV 60-公开课 70-其它短片）',
  `tv_cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '影视封面',
  `tv_grade` double(3,1) NOT NULL DEFAULT '0.0' COMMENT '影视评分',
  `tv_show_date` date NOT NULL COMMENT '上影日期',
  `tv_show_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '影视年代',
  `tv_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '语言（0-国语 10粤语 20-英语 30-韩语 40-日语 50-法语 60-其它）',
  `tv_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '地区',
  `tv_actors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '演员（JSON）',
  `tv_director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '导演',
  `tv_minute` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '片长（分钟）',
  `tv_baidu_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '百度分享链接',
  `tv_baidu_pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '百度分享密码',
  `is_push` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '是否推荐',
  `tv_sort` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '影视排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_tv
-- ----------------------------
INSERT INTO `wing_tv` VALUES ('1', '羞羞的铁拳', '羞羞的铁拳', '《羞羞的铁拳》是开心麻花影业、新丽电影和猫眼影业联合出品，由导演宋阳、张迟昱联合编剧并执导，由马丽、艾伦', '《羞羞的铁拳》是开心麻花影业、新丽电影和猫眼影业联合出品，由导演宋阳、张迟昱联合编剧并执导，由马丽、艾伦、沈腾主演的一部喜剧电影。《羞羞的铁拳》根据同名话剧改编，主要讲述了一个搏击选手艾迪生和一个体育女记者马小，因为一场意外的电击灵魂互换的搞笑爱情故事。', '10', 'tv/izCCEFWO32jdFx4eIv3X9fyhDlAwYFacdd5yeD03.jpeg', '8.3', '2017-09-30', '2017', '10', '1', '{\"actors\":[\"马丽\"]}', '宋阳；张迟昱', '99', 'https://pan.baidu.com/share/init?surl=mhUAZIo', 'kala', '1', '2', '2017-10-07 11:05:47', '2017-11-18 11:23:14', null);
INSERT INTO `wing_tv` VALUES ('2', '缝纫机乐队', '缝纫机乐队', '《缝纫机乐队》是由他城影业、儒意影业、青春光线、万达影业、乐合影业出品，由董成鹏执导，大鹏、乔杉、娜扎、李鸿其、韩童生、曲隽希等主演的喜剧电影', '讲述了程宫的家乡小镇集安，几个背景各异的小人物为了追寻共同的音乐梦想，组建了一支与众不同的摇滚乐队的故事。', '10', 'tv/NzB6hufuTasCWMzWrJ5SCdcQO5CzVKSIR0jxTkGm.jpeg', '6.8', '2017-10-07', '2017', '10', '1', '{\"actors\":[]}', '董成鹏', '140', 'http://suo.im/tuUE5', '', '1', '2', '2017-10-07 11:51:18', '2017-10-07 11:51:18', null);
INSERT INTO `wing_tv` VALUES ('3', '空天猎', '空天猎', '《空天猎》这部电影让普通人更加全面的了解飞行员，了解国内的主流战斗机。让大众了解到空军的军事力量、协调作战能力。《空天猎》把原本对空军以及军人的严肃形象，增添了一些烟火味，更拉近了普通人与现代化空军的心理距离。影片在特效、空战、配乐以及情绪渲染方面还挺到位', '《空天猎》这部电影让普通人更加全面的了解飞行员，了解国内的主流战斗机。让大众了解到空军的军事力量、协调作战能力。《空天猎》把原本对空军以及军人的严肃形象，增添了一些烟火味，更拉近了普通人与现代化空军的心理距离。影片在特效、空战、配乐以及情绪渲染方面还挺到位', '10', 'tv/j34UJUiSbqNHejsYvrQS3GssGlVjMxZrVnm4FHm0.jpeg', '6.4', '2017-10-07', '2017', '10', '1', '{\"actors\":[\"李晨\"]}', '李晨', '115', 'https://pan.baidu.com/share/init?surl=qXETL5i', 'kala', '1', '3', '2017-10-07 11:54:31', '2017-10-16 11:30:06', null);
INSERT INTO `wing_tv` VALUES ('4', '英伦对决', '英伦对决', '《英伦对决》是由中国、英国联合制作的动作惊悚片，由新西兰导演马丁·坎贝尔执导，成龙、皮尔斯·布鲁斯南领衔主演。', '《英伦对决》是由中国、英国联合制作的动作惊悚片，由新西兰导演马丁·坎贝尔执导，成龙、皮尔斯·布鲁斯南领衔主演。该片于2017年9月30日在中国内地上映。《英伦对决》根据史蒂芬·莱瑟1992年出版的小说《中国人》改编，讲述了生活在英国的越南华裔关玉明的女儿在恐怖袭击中不幸遇难，为了给女儿讨回公道，独自踏上向恐怖组织复仇之路的故事', '10', 'tv/lS72jf82TwLKT64Ocmli7GNQSkrk0BuTK8hEG1Hy.jpeg', '7.4', '2017-10-07', '2017', '10', '3', '{\"actors\":[\"成龙\",\"皮尔斯·布鲁斯南\"]}', '马丁·坎贝尔', '116', 'https://pan.baidu.com/share/link?uk=3292980635&shareid=1139034186&third=0', '', '1', '4', '2017-10-07 11:56:32', '2017-10-07 11:56:32', null);
INSERT INTO `wing_tv` VALUES ('5', '太阳的后裔', '太阳的后裔', '应联合国之邀，驻扎在OURCQ首都的联合国维和部队所属部队特战警备队大尉刘时镇（宋仲基饰），和外科医生姜暮烟（宋慧乔饰）去到战争硝烟弥漫、疾病', '', '20', 'tv/fX2qF58rSQdmg1MZqhrE2hJyZOnxuu8APqfpcGS9.jpeg', '8.4', '2016-10-13', '2016', '10', '104', '{\"actors\":[\"宋仲基\"]}', '', '0', 'http://suo.im/o5Yja', '', '1', '6', '2017-10-07 15:45:40', '2017-10-07 15:45:40', null);
INSERT INTO `wing_tv` VALUES ('6', '爸爸去哪儿', '爸爸去哪儿', '大型亲子真人秀《爸爸去哪儿》翻起了不小的收视率。帅气的爸爸和可爱的萌娃通过不断的挑战给观众们展示了明星们生活的另外一面。这部真人秀不知不觉已经拍摄了', '大型亲子真人秀《爸爸去哪儿》翻起了不小的收视率。帅气的爸爸和可爱的萌娃通过不断的挑战给观众们展示了明星们生活的另外一面。这部真人秀不知不觉已经拍摄了', '40', 'tv/UUwwtelCO5b8npl5eyC2Jr9EZXMpKsolT9S7c6Kk.jpeg', '1.0', '2017-10-07', '2017', '10', '0', '{\"actors\":[]}', '', '0', 'https://pan.baidu.com/share/link?uk=4162539356&shareid=2652695085&third=0#list/path=%2F', 'kala', '1', '6', '2017-10-07 16:07:15', '2017-10-16 11:26:12', null);
INSERT INTO `wing_tv` VALUES ('7', '大话西游', '大话西游', '曾经有一份真诚的爱情放在我面前,我没有珍惜,等我失去的时候我才后悔莫及,人世间最痛苦的事莫过于此...', '至尊宝被月光宝盒带回到五百年前，遇见紫霞仙子，被对方打上烙印成为对方的人，并发觉自己已变成孙悟空。 紫霞与青霞本是如来佛祖座前日月神灯的灯..', '10', 'tv/MMqYSBc8CNPqXida0bNIguKXRyfH37ghcEUZ5ndo.png', '8.3', '1995-08-01', '1995', '10', '1', '{\"actors\":[\"周星驰\"]}', '刘镇伟', '90', 'https://pan.baidu.com/share/link?uk=121430799&shareid=846375371&adapt=pc&fr=ftw#list/path=%2F', '', '1', '6', '2017-10-08 14:15:36', '2017-10-08 14:17:47', null);
INSERT INTO `wing_tv` VALUES ('8', '大护法', '大护法', '奕卫国大护法为了寻找失踪的太子，追到花生镇，这里半空中悬浮着一颗巨大的黑色花生，因此而得名。镇子上住着外形酷似花生的居民也被分为群众和执法者，一起都处于强权统治之下，一位名为吉安的人类在这里只手遮天，把花生人变得麻木且愚昧，互相出卖。大护法在寻找太子的过程中发现了一些秘密——当这些花生人长出黑色蘑菇的时候就会被执法者枪决，而且统治者吉安有一个巨大的阴谋。这些秘密让大护法成为被追杀的目标，好不容易被找出来的太子也身陷险境', '奕卫国大护法为了寻找失踪的太子，追到花生镇，这里半空中悬浮着一颗巨大的黑色花生，因此而得名。镇子上住着外形酷似花生的居民也被分为群众和执法者，一起都处于强权统治之下，一位名为吉安的人类在这里只手遮天，把花生人变得麻木且愚昧，互相出卖。大护法在寻找太子的过程中发现了一些秘密——当这些花生人长出黑色蘑菇的时候就会被执法者枪决，而且统治者吉安有一个巨大的阴谋。这些秘密让大护法成为被追杀的目标，好不容易被找出来的太子也身陷险境', '30', 'tv/XBtpTHwVp0FbdT6Xr7Y3kunSP13tpBHhiHuThss2.jpeg', '7.6', '2017-07-13', '2017', '10', '0', '{\"actors\":[]}', '不思凡', '93', 'https://pan.baidu.com/share/link?uk=914220725&shareid=285080138&third=0&url_flag=share_gggNB_DLJAiB_SBnsa_1506334423', '', '1', '255', '2017-10-08 14:52:15', '2017-10-08 14:58:35', null);
INSERT INTO `wing_tv` VALUES ('9', '精灵旅社2', '精灵旅社2', '该片讲述人类青年乔纳森与吸血鬼梅维斯结婚生下了混血儿子丹尼斯后，展开了一段有笑又有泪的温暖故事。', '该片讲述人类青年乔纳森与吸血鬼梅维斯结婚生下了混血儿子丹尼斯后，展开了一段有笑又有泪的温暖故事。', '30', 'tv/IDFuQTijp0ehbDGMEKmttoWDQ8cDl4QLlIeqlJmi.jpeg', '7.8', '2015-10-08', '2017', '20', '0', '{\"actors\":[]}', '格恩迪·塔塔科夫斯基', '89', 'https://pan.baidu.com/share/link?uk=2235429783&shareid=2550582178&adapt=pc&fr=ftw', '', '1', '6', '2017-10-08 15:02:00', '2017-10-08 15:03:35', null);
INSERT INTO `wing_tv` VALUES ('10', '父子雄兵', '父子雄兵', '《父子雄兵》不同于大部分为搞笑而搞笑电影，它把喜剧放进小市民的日常生活，把小市民生活中的无奈放大，把这些情绪做喜剧化的处理，不管处理是否得当，这都是一部喜剧电影好的开始。用喜剧手段掩盖掉生活的心酸，呈现出窘迫的丑态，观影者喜欢看着别人的狼狈大笑，笑着笑着又变得若有所思', '梦想靠大项目咸鱼翻身的范小兵（大鹏饰）始终无法摆脱一个阴影，那就是退伍军人出身的老爹范英雄（范伟饰）。小兵油嘴滑舌爱忽悠，英雄刚正不阿会武术，小兵斗英雄，天雷勾地火。卤煮店小老板刘雯（张天爱饰）与小兵相识十年，两人友达之上恋爱未满，她是小兵唯一愿意吐露真心的港湾。范小兵欠下大老板OK哥（任达华饰）的钱，被追债小弟方健（乔杉饰）一路折磨，倒霉不断，还面临凶狠狗哥（梁龙饰）的生命威胁。范小兵不得已将弄钱对象转向老爹，不知情的范英雄此时正躲闪着邻居邬仙仙（邬君梅饰）如狼似虎的猛烈追求，殊不知儿子范小兵已经针对自', '10', 'tv/IfSxQqEoNQUwWp6PyztP3txoFLGH2KpwkUqfO5ve.jpeg', '7.1', '2017-07-17', '2017', '10', '1', '{\"actors\":[]}', '袁卫东', '90', 'https://pan.baidu.com/share/link?uk=2090859133&shareid=1079804326&third=0&url_flag=share_ZMANB_nHoMnI_NJpyWB_1504963724', '', '1', '8', '2017-10-08 15:08:10', '2017-10-08 15:08:10', null);
INSERT INTO `wing_tv` VALUES ('11', '侏罗纪公园', '侏罗纪公园', '《侏罗纪公园》（Jurassic Park）是一部1993年的科幻冒险电影，改编自迈克尔·克莱顿于1990年发表的同名小说，由史蒂文·斯皮尔伯格执导，环球电影公司出品', '影片主要讲述了哈蒙德博士召集大批科学家利用凝结在琥珀中的史前蚊子体内的恐龙血液提取出恐龙的遗传基因，将已绝迹6500万年的史前庞然大物复生，使整个努布拉岛成为恐龙的乐园，即“侏罗纪公园”。但在哈蒙德带孙子孙女首次游览时，恐龙发威了。', '10', 'tv/1WWn5TKjougbXul9DbGq9WyWbsWF8fkmGMMQurIB.jpeg', '8.0', '1993-06-11', '1993', '20', '0', '{\"actors\":[]}', '史蒂文·斯皮尔伯格', '127', 'https://pan.baidu.com/wap/link?uk=2553408718&shareid=442417065', '', '1', '255', '2017-10-08 15:51:37', '2017-10-08 16:10:57', null);
INSERT INTO `wing_tv` VALUES ('12', '千与千寻', '千与千寻', '《千与千寻》是宫崎骏执导、编剧，吉卜力工作室制作的动画电影，影片于2001年7月20日在日本正式上映，讲述了少女千寻意外来到神灵异世界后发生的故事', '年仅10岁的荻野千寻是一个看起来非常普通的四年级小学生，她随父母搬家来到一个陌生的城镇准备开始一个全新的生活。\n然而，因为途中迷路，她和父母误闯入了一个人类不应该进入的灵异小镇。小镇的主管是当地一家叫“油屋”的澡堂的巫婆：汤婆婆；而“油屋”则是服侍日本八百万天神洗澡的地方。\n镇上有一条规定：在镇上凡是没有工作的人，都要被变成猪被吃掉。 千寻的父母由于贪吃，未经过店员允许就随便触碰食物，而遭到惩罚变成了猪。\n千寻为了拯救父母，在汤婆婆的助手“白龙”的帮助下，进入澡堂，并成功的获得了一份工作。作为代价，她被汤', '30', 'tv/ipihJ3dSUZx4jRzKiFySVZGledisSGySSt1CaRiO.jpeg', '9.1', '2001-07-20', '2001', '10', '0', '{\"actors\":[]}', '', '125', 'https://pan.baidu.com/s/1eSfCPPo', 'x4vh', '1', '7', '2017-10-08 16:17:21', '2017-10-08 16:17:21', null);
INSERT INTO `wing_tv` VALUES ('13', '当怪物来敲门', '当怪物来敲门', '自从妈妈进行化疗开始，少年康纳就每天晚上都做噩梦。梦中总是漆黑阴暗的天气，狂风大作，尖叫声和无论怎么努力都不能紧握的双手让他倍受折磨。他总是做着同样内容的噩梦，直到有一天家里出现了一个不速之客，拥有古老气息的恶魔对康纳说它是由他召唤而来，它要以三个故事交换一个康纳自己真实的故事。康纳并不害怕恶魔，因为他在面对的事——最心爱的妈妈正一步步走向死亡，这是更加恐怖的事情。夜晚让康纳感觉诡异，而他白天的生活也十分难熬。康纳的爸爸离开了他们母子，前来照料他们生活的外婆又与康纳相处的不甚愉快。除此之外，他还必须忍受学', '自从妈妈进行化疗开始，少年康纳就每天晚上都做噩梦。梦中总是漆黑阴暗的天气，狂风大作，尖叫声和无论怎么努力都不能紧握的双手让他倍受折磨。他总是做着同样内容的噩梦，直到有一天家里出现了一个不速之客，拥有古老气息的恶魔对康纳说它是由他召唤而来，它要以三个故事交换一个康纳自己真实的故事。康纳并不害怕恶魔，因为他在面对的事——最心爱的妈妈正一步步走向死亡，这是更加恐怖的事情。夜晚让康纳感觉诡异，而他白天的生活也十分难熬。康纳的爸爸离开了他们母子，前来照料他们生活的外婆又与康纳相处的不甚愉快。除此之外，他还必须忍受学', '10', 'tv/6ouLuz0ptS9K15Fi20AKOPDMveOWp4H3eLDCtlIS.jpeg', '7.2', '2017-05-19', '2016', '20', '3', '{\"actors\":[]}', '胡安·安东尼奥·巴亚纳', '108', 'https://pan.baidu.com/share/link?uk=609021507&shareid=3959277762&adapt=pc&fr=ftw#list/path=%2F', '', '1', '235', '2017-10-10 12:23:18', '2017-10-10 12:25:24', null);
INSERT INTO `wing_tv` VALUES ('14', '绝世高手', '绝世高手', '一个先天没有知觉，挨揍不疼却冒充高手的小混混（卢正雨 饰），一个人称女张飞的暴力少女（郭采洁 饰），一个醉心于织毛衣的过气大师（范伟 饰），一个只会做黑暗料理的美食大亨（蔡国庆 饰），一个可以用汤操纵情绪的当代孟婆（陈冲 饰），一个身患强迫症的日本武士（仓田保昭 饰），为了一本失传的秘笈，引发了一场绝世高手的爆笑对决。', '小混混花式撩妹骗取秘籍，女张飞真情流露感化新食神。 一个先天没有知觉，挨揍不疼却冒充高手的小混混，一个人称女张飞的暴力少女，一个醉心于织毛衣的过气大师，一个只会做黑暗料理的美食大亨，一个可以用汤操纵情绪的当代孟婆，一个身患强迫症的日本武士，为了一本失传的秘笈，引发了一场绝世高手的爆笑对决。', '10', 'tv/b30LKrf627CQOWeTSprgYKCJylS6Moi1dWwx7lGC.jpeg', '6.2', '2017-07-07', '2017', '10', '1', '{\"actors\":[]}', '卢正雨', '140', 'https://pan.baidu.com/share/link?uk=3242663843&shareid=911495240&third=0&url_flag=share_teGNB_eGanpb_EZphFB_1504721136#list/path=%2F', '', '1', '253', '2017-10-10 13:19:09', '2017-10-10 13:19:09', null);
INSERT INTO `wing_tv` VALUES ('15', '变形金刚4：绝迹重生', '变形金刚4：绝迹重生', '《变形金刚4：绝迹重生》是《变形金刚》系列电影第四部，是由美国派拉蒙影业公司出品的科幻电影，由迈克尔·贝导演，马克·沃尔伯格、妮可拉·佩尔茨、杰克·莱诺、李冰冰、斯坦利·图齐联合主演。 该片讲述了一群富商巨贾和科学精英试图利用变形金刚的技术来发展人类科技，但他们所取得的成就足以蚕食和毁灭整个世界，与此同时，一个古老而又强大的变形金刚力量正把目标瞄向了地球。', '惨烈的芝加哥大战，汽车人虽然成功击退了霸天虎的入侵，却也让地球人对他们失去了应有的信任与尊重。由美国中情局组建的墓风部队对所有的变形金刚进行无差别的猎杀，一时间汽车人和霸天虎全都在地球不见了踪影。某天，居住在得州的落魄机械发明家凯德·伊格（马克·沃尔伯格饰）买回来一辆破旧的卡车车头，谁知那竟是处在休眠中的汽车人首领擎天柱。嗅到气息的墓风部队蜂拥而至，苏醒后的擎天柱救走了凯德一家，也和散落在各个角落的汽车人相继取得联系。另一方面，疯狂的人类科学家从变形金刚的残骸中获知了他们变形的秘密，并企图借此制造出人造金', '10', 'tv/j3AHQXBQSCNpRXLFiOgC5wVPlvoXDrC8ho8se4rP.jpeg', '6.5', '2014-06-27', '2014', '20', '3', '{\"actors\":[]}', '迈克尔·贝', '165', 'https://pan.baidu.com/share/link?uk=3692570264&shareid=4138747741&adapt=pc&fr=ftw', '', '1', '250', '2017-10-10 13:46:09', '2017-10-10 13:46:09', null);
INSERT INTO `wing_tv` VALUES ('16', '博物馆奇妙夜', '博物馆奇妙夜', '影片讲述一个倒霉的博物馆保安不知不觉触动了一件文物，导致一个被禁锢几千年的生物被释放了出来，带来全城的混乱。', '位于纽约的自然历史博物馆庄严的大厅里，陈列着这个世界让人惊奇的所有事物：狂暴的史前生物、野蛮的古代战士、被时间的流沙埋掉的原始部落、非洲的草原动物以及改变了历史的传奇英雄。当然，它们到了这里都变成了栩栩如生的塑像和标本，不过却是浓缩了整个地球的生态圈，来到这里的参观者总能深切地感受到自己对于世界是多么得渺小。然而对于赖瑞·戴利——博物馆的新守夜人来说，这只是一个能够争取到儿子的抚养权的谋生手段。赖瑞认为自己生来就是“做大事”的人，然而大半辈子的“怀才不遇”，让他连填\n饱肚子都成问题。他的前妻即将再婚，为了', '10', 'tv/LWhK4P0fLpASPITDWJ4Rl8nZMjbnD2LLOVjLccyF.jpeg', '7.2', '2006-12-22', '2006', '20', '3', '{\"actors\":[]}', '肖恩·利维', '108', 'https://pan.baidu.com/share/link?uk=2052407361&shareid=1990404693&adapt=pc&fr=ftw#list/path=%2F', '', '1', '246', '2017-10-10 17:43:51', '2017-10-10 17:43:51', null);
INSERT INTO `wing_tv` VALUES ('17', '战狼', '战狼', '《战狼》是由吴京执导的现代军事战争片，该片由吴京、余男、倪大红、斯科特·阿金斯 、周晓鸥等主演。 该影片属于国内首部3D动作战争电影，历时七年全力打造，《战狼》真实呈现了一场中外边境战争，也让堪称“东方之狼”的特种兵战队及高能战士首次登陆大银幕。讲述的是小人物成长为拯救国家和民族命运的孤胆英雄的传奇故事', '痞性十足的冷锋（吴京饰）屡屡惹祸，有人说他是流氓，是痞子， 也有人说他是英雄，是传奇，在一次行动中冷锋违抗军令打死了恐怖分子，要被开除出队，却意外得到了神秘部队战狼的接纳，但本想换个地方继续惹祸的他却跳进了另外一个深渊，冷傲的战狼副队长，擦出暧昧火花的性感女队长（余男饰），心计颇深腹黑的毒枭，枉死的队友，雇佣兵跨过边境线入侵中国，一切都使他陷入了麻烦中。一切都在考验这个团队的毒瘤冷锋，他不知该何去何从。[6]', '10', 'tv/1pSPcvY06XfhxfigLgdmoOr8MIcq8rVvYagDoyYY.jpeg', '6.8', '2015-04-02', '2015', '10', '1', '{\"actors\":[]}', '吴京', '96', 'https://pan.baidu.com/share/link?uk=2201898363&shareid=2169188473&adapt=pc&fr=ftw#list/path=%2F', '', '1', '223', '2017-10-11 13:40:18', '2017-10-11 13:40:18', null);
INSERT INTO `wing_tv` VALUES ('18', '澳门风云2', '澳门风云2', '合家欢贺岁喜剧《澳门风云2》由博纳影业集团出品，王晶导演，刘伟强监制，由周润发、张家辉 、刘嘉玲、余文乐、王诗龄、 胡然、吴樾、金巧巧、黄德斌、袁泉、孟瑶等联袂主演[1]  。 《澳门风云2》延续了前作《澳门风云》的故事，讲述外号“赢尽天下无敌手”的石一坚退隐江湖之后的故事', '随着澳门赌侠石一坚（周润发饰）协助国际刑警大破洗钱集团DOA后便退隐江湖，可是DOA首席会计师小马（张家辉饰）从网上盗取DOA一百伍十亿美元，与女儿初一（王诗龄饰）潜逃泰国。坚之大弟子阿乐（余文乐饰）加入国际刑警，并邀请坚协助捉拿DOA真正幕后主脑苍井女士，两人前赴泰国寻找小马成为控方证人，追查过程中坚重遇了一生最爱的莫愁（刘嘉玲饰演）。', '10', 'tv/g7gOru23pCR6TpncrLVWd8UKxfUx3t3iUQYrwboi.jpeg', '5.6', '2015-02-19', '2015', '10', '1', '{\"actors\":[]}', '王晶', '110', 'https://pan.baidu.com/share/link?uk=1080462661&shareid=4001283278&adapt=pc&fr=ftw', '', '1', '216', '2017-10-11 18:04:36', '2017-10-11 18:04:36', null);
INSERT INTO `wing_tv` VALUES ('19', '长城', '长城', '　　电影《长城》讲述了在古代，一支中国精英部队为保卫人类，在举世闻名的长城上与怪兽饕餮进行生死决战的故事。欧洲雇佣军威廉（马特·达蒙 Matt Damon 饰）与同伴佩罗·托瓦尔（佩德罗·帕斯卡 Pedro Pascal 饰）不远万里来到中国盗取火药配方，意外发现了长城是为抵御60年降临人间一次的饕餮所建。长城内部机关重重，宛如“陆上航母”，由无影禁军世代镇守。在这里，威廉见识了饕餮的凶残，也见证了无影禁军的精锐和勇敢，并被这群战士之间的信任和牺牲所感动，义无反顾地加入到了共同守护人类的战斗当中。', '　　电影《长城》讲述了在古代，一支中国精英部队为保卫人类，在举世闻名的长城上与怪兽饕餮进行生死决战的故事。欧洲雇佣军威廉（马特·达蒙 Matt Damon 饰）与同伴佩罗·托瓦尔（佩德罗·帕斯卡 Pedro Pascal 饰）不远万里来到中国盗取火药配方，意外发现了长城是为抵御60年降临人间一次的饕餮所建。长城内部机关重重，宛如“陆上航母”，由无影禁军世代镇守。在这里，威廉见识了饕餮的凶残，也见证了无影禁军的精锐和勇敢，并被这群战士之间的信任和牺牲所感动，义无反顾地加入到了共同守护人类的战斗当中。', '10', 'tv/bvxhMnGX6DRtlg9Yiw1yIb61Z0eP8Udfp9WqGc5J.jpeg', '4.9', '2016-12-16', '2016', '10', '1', '{\"actors\":[]}', '张艺谋', '104', 'https://pan.baidu.com/share/link?uk=4178307514&shareid=2264408940&adapt=pc&fr=ftw', '', '1', '176', '2017-10-12 13:36:55', '2017-10-12 13:36:55', null);
INSERT INTO `wing_tv` VALUES ('20', '魔兽', '魔兽', '这是一个人类和兽人共存，和谐相处，互不侵犯的世界。人类生活在艾泽拉斯大陆中，兽人则在德拉诺劳作繁衍。某日，邪恶的兽人古尔丹（吴彦祖 饰）出现了，它打开了黑暗之门，肆意屠戮手无寸铁的人类，将艾泽拉斯大陆变为了一片地狱的火海。与此同时，曾经与世无争的兽人们如今变得凶猛残暴，他们来到人类的领地，在这里烧杀抢掠，无恶不作。  　　杜隆坦（托比·凯贝尔 Toby Kebbell 饰）是霜狼氏族的酋长，他发现了古尔丹的野心和阴谋，于是带领着自己的部族千里迢迢来到了艾泽拉斯，在此处，人类领袖洛萨（崔维斯·费米尔 Tra', '这是一个人类和兽人共存，和谐相处，互不侵犯的世界。人类生活在艾泽拉斯大陆中，兽人则在德拉诺劳作繁衍。某日，邪恶的兽人古尔丹（吴彦祖 饰）出现了，它打开了黑暗之门，肆意屠戮手无寸铁的人类，将艾泽拉斯大陆变为了一片地狱的火海。与此同时，曾经与世无争的兽人们如今变得凶猛残暴，他们来到人类的领地，在这里烧杀抢掠，无恶不作。 \n　　杜隆坦（托比·凯贝尔 Toby Kebbell 饰）是霜狼氏族的酋长，他发现了古尔丹的野心和阴谋，于是带领着自己的部族千里迢迢来到了艾泽拉斯，在此处，人类领袖洛萨（崔维斯·费米尔 Tra', '10', 'tv/NBKg5FsqzbAAa2xQ1qOI7U4pVzFSGTi3PJOEVFco.jpeg', '7.7', '2016-06-08', '2016', '20', '3', '{\"actors\":[]}', '邓肯·琼斯', '124', 'https://pan.baidu.com/share/link?uk=1598412575&shareid=391772287&adapt=pc&fr=ftw', '', '1', '134', '2017-10-12 13:54:05', '2017-10-12 13:54:05', null);
INSERT INTO `wing_tv` VALUES ('21', '天泪传奇之凤凰无双', '天泪传奇之凤凰无双', '凤凰星，因过度武装破坏生态，变作冰川。圣女季柔桑（母其弥雅饰）带能量石“天泪”逃走，被国师鬼姣（管轩饰）及半人半机械的姣童（南笙饰）追击，逃至另一蔚蓝的星球。这正是魏晋后南北分裂的乱世，这夜天放异光，凤凰出现，五光宝石从天而降，传是“至尊宝藏”，谁能夺宝便统一南北。梁王萧煜（朱泳腾饰）守猎，遇季柔桑，惊为天人，与之生下五子萧凤青（郑元畅饰）。季柔桑为逃避鬼姣追踪，以假死沉睡，将“天泪”交给一五岁遇溺的女孩缪芊芊（王丽坤饰）。二十年后缪芊芊被灭门，坠江后被梁国睿王萧凤青所救，“天泪”再现，令她体内的能量提升', '凤凰星，因过度武装破坏生态，变作冰川。圣女季柔桑（母其弥雅饰）带能量石“天泪”逃走，被国师鬼姣（管轩饰）及半人半机械的姣童（南笙饰）追击，逃至另一蔚蓝的星球。这正是魏晋后南北分裂的乱世，这夜天放异光，凤凰出现，五光宝石从天而降，传是“至尊宝藏”，谁能夺宝便统一南北。梁王萧煜（朱泳腾饰）守猎，遇季柔桑，惊为天人，与之生下五子萧凤青（郑元畅饰）。季柔桑为逃避鬼姣追踪，以假死沉睡，将“天泪”交给一五岁遇溺的女孩缪芊芊（王丽坤饰）。二十年后缪芊芊被灭门，坠江后被梁国睿王萧凤青所救，“天泪”再现，令她体内的能量提升', '20', 'tv/Z9Q9s5JEE380scdOiNS54kDT6OxQYWlEQzGlRo5A.jpeg', '6.5', '2017-10-04', '2016', '10', '101', '{\"actors\":[]}', '郑伟文、何振华', '45', 'http://pan.baidu.com/s/1dEKa3bb', 'zmys', '1', '227', '2017-10-12 14:24:01', '2017-10-12 14:24:01', null);
INSERT INTO `wing_tv` VALUES ('22', '追龙', '追龙', '《追龙》是由银都机构有限公司出品的动作犯罪片，由王晶、关智耀执导，甄子丹领衔主演、刘德华特别演出、郑则仕、姜皓文、刘浩龙、胡然、徐冬冬等联合主演。该片于2017年9月30日在中国内地上映[1]  。 该片讲述了能打敢拼的伍世豪偷渡来到香港为了长久生存之道，他与心思缜密的探长雷洛联手制霸香港的故事', '二十世纪六七十年代，香港由英国殖民，权势腐败、社会混乱。1963年，穷困潦倒的青年阿豪（甄子丹饰）偷渡至香港，抱着生死有命、富贵在天之心决意一搏人生。阿豪带着几个兄弟，从九龙城寨底层开始一路刀刃舔血，爬上香港毒品霸主之位，一手掌控香港十大黑帮，江湖人称跛豪。而雷洛（刘德华饰）则从一位普通探长一步步爬上华人总探长高位，统领全香港三万警察，手握香港治安潜规则。为垄断香港黄赌毒三大经济产业，跛豪与雷洛结拜为兄弟，两人一黑一白两手遮天，权势滔天，家财亿万，独霸香港岛', '10', 'tv/SMPJffbq0g19qjtKdi7fQWzcOimH7Ip0b2d3YDsE.jpeg', '7.5', '2017-09-30', '2017', '10', '1', '{\"actors\":[]}', '关智耀、王晶', '128', 'http://pan.baidu.com/s/1kV5lp47', '', '1', '207', '2017-10-12 14:53:18', '2017-10-12 14:53:18', null);
INSERT INTO `wing_tv` VALUES ('23', '金刚', '金刚', '影片《金刚》是2005年上映的一部冒险电影，重拍1933年经典同名电影《金刚》，由彼得·杰克逊执导，娜奥米·沃茨、杰克·布莱克、阿德里安·布劳迪和安迪·瑟金斯等领衔演出。影片于2005年12月24日在中国内地上映 。 电影讲述1933年的美国，一名勇于冒险的企业家及电影制作者，率领摄制队伍到荒岛拍摄，其中包括女主角安及编剧杰克，他们遇到恐龙及当地土著的袭击，安发出的尖叫声换来金刚的回应。这只巨大无比的猩猩，连凶悍的恐龙也惧怕它几分，偏偏它却钟情于安。安其后将金刚由荒岛带回纽约，但却是它悲剧命运的开始', '1933年美国， 经济大萧条和盲目的探险精神激励着每个人去探索陌生的领域，开拓未知的生存空间。漂亮的女演员安·达罗（娜奥米·沃茨饰）日益感觉到自己正处于纽约沮丧的气氛之中，就在事业低落的时候，一位野心勃勃的电影制作人卡尔（杰克·布莱克饰）将好运带给了她，她将成为一部最新制作影片的主演，并且影片将会在Skull岛上完成拍摄，安希望这座靠近苏门答腊岛的世外桃源会带给她一个充满刺激和兴奋的旅程。\n意外加偶然，轮船最终搁浅在了卡尔的理想目的地——骷髅岛。可还没等卡尔激动地想开始自己的巨制拍摄，一群突如其来的土著野', '10', 'tv/GbNrXOrGi2BVLKm5nPk2OtMH0ZyqNzEodscomiVy.jpeg', '7.8', '2005-12-14', '2005', '20', '3', '{\"actors\":[]}', '彼得·杰克逊', '187', 'http://pan.baidu.com/s/1cLIKsI', '', '1', '191', '2017-10-12 18:13:08', '2017-10-14 13:35:58', null);
INSERT INTO `wing_tv` VALUES ('24', '侠盗联盟', '侠盗联盟', '影片讲述了江洋大盗张丹（刘德华饰）重出江湖，联手搭档小宝（杨祐宁饰）与叶红（舒淇饰），在追捕自己多年的法国警探皮埃尔（让·雷诺饰）的穷追猛打下，跨越欧洲盗取稀世珍宝的故事。', '江洋大盗张丹（刘德华 饰）在一次行动中遭遇黑吃黑，失手被擒入狱。五年后，出狱的张丹会合老搭档小宝（杨祐宁 饰），与新入伙的叶红（舒淇 饰）联手，在追捕自己多年的法国警探皮埃尔（让·雷诺 饰）眼皮底下盗窃得手。\n小试身手之后，张丹找到宝物的买家——与自己情同父子的犯罪组织头目金刚（曾志伟 饰），二人重逢之后，张丹接到新的任务。与此同时，为将张丹一伙人捉拿归案，皮埃尔说服对张丹因爱生恨的前女友Amber（张静初 饰）加入追捕行动。\n从戛纳到布拉格，跨越欧洲大陆的猫鼠游戏正激烈上演。几次短兵相接后，张丹的行踪逐', '10', 'tv/fudo9ZHOgzuTf290LU1mhV3T0P9YgFISg8F4UMgn.jpeg', '7.6', '2017-10-13', '2017', '10', '1', '{\"actors\":[]}', '冯德伦', '108', '侠盗联盟', '', '1', '6', '2017-10-13 17:23:21', '2017-10-13 17:23:35', null);
INSERT INTO `wing_tv` VALUES ('25', '白夜追凶', '白夜追凶', '一场灭门惨案，让原本逍遥浪荡的关宏宇成了在逃的通缉嫌犯', '一场灭门惨案，让原本逍遥浪荡的关宏宇成了在逃的通缉嫌犯。\n剧照\n剧照(6张)\n 身为刑侦支队队长的双胞胎哥哥关宏峰，誓要查出真相，但出于亲属回避的原则，警队禁止关宏峰参与灭门案的调查工作，关宏峰义愤辞职。调任了代支队长的周巡处于破案压力，也为了追寻关宏宇的下落，他设计让离职的关宏峰以“编外顾问”的身份继续参与各大重案要案的调查，而警队所有人都被隐瞒了。由于罹患“黑暗恐惧症”，白天和黑夜出现 在警队的“顾问关宏峰”，其实是由孪生兄弟二人白夜分饰，性格迥异的兄弟两人在警队中马脚不断，背负着随时被周巡及各路人马', '20', 'tv/EVsuXp2MMHu1UCOSUJyQsPWewU4qrRscENIw87pA.jpeg', '7.6', '2017-10-13', '2017', '10', '101', '{\"actors\":[]}', '', '45', 'https://pan.baidu.com/share/init?surl=c2xsoFI', 'kala', '1', '255', '2017-10-13 17:32:11', '2017-11-18 11:21:38', null);
INSERT INTO `wing_tv` VALUES ('26', '新木乃伊', '新木乃伊', '《新木乃伊》是环球电影公司在2017年推出的动作冒险片，由艾里克斯·库兹曼执导，并且由汤姆·克鲁斯、索菲亚·宝特拉、安娜贝拉·沃丽丝和罗素·克劳主演。 该片讲述了复活的“埃及公主”安玛奈特为了复仇，选定了军人尼克，并想方设法将其变成埃及死神塞特的故事。该片也是1999年版本《木乃伊》的重启版，是环球电影公司旗下“黑暗宇宙”的首部电影，于2017年6月9日在美国与中国同步上映', '一名叫尼克·摩顿（汤姆·克鲁斯饰）的海豹突击队成员，在执行任务期间，意外地带着自己的小队闯入一个地下古墓，队员经过重重磨难全部丧生，只剩下尼克·摩顿一个人。木乃伊公主安玛奈特（索菲亚·宝特拉饰），遗恨千年后重返人间，誓要在新世界再建属于她的埃及王朝。后来尼克与珍妮·哈尔西（安娜贝拉·沃丽丝饰）及一班军人坐上运送棺木的飞机。飞机突然被一大群鸟袭击失事，千钧一发之际尼克·摩顿为珍妮戴上降落伞，英雄救美最后牺牲了自己', '10', 'tv/1TpMZ7yuijoO003yJz8O9ltOa31rWuseHdbpLaJr.jpeg', '4.7', '2017-06-09', '2017', '20', '3', '{\"actors\":[]}', 'http://pan.baidu.com/s/1i4DMJzR', '107', 'http://pan.baidu.com/s/1i4DMJzR', '', '1', '101', '2017-10-14 13:27:16', '2017-10-14 13:27:16', null);
INSERT INTO `wing_tv` VALUES ('27', '爱丽丝梦游仙境', '爱丽丝梦游仙境', '影片讲述了发生在爱丽丝上次梦游仙境的十三年后的故事，已经19岁的爱丽丝去一个庄园参加一个聚会，爱丽丝选择了逃跑，她跟着一只白兔钻进了一个洞，再次来到“仙境”。', '距离那一次历险奇遇已经过去了十年。曾经漫游奇境的爱丽丝（米娅·华希科沃斯卡饰），已经19岁的她生活在一个华丽富庶的大庄园里，衣食无忧，生活奢靡，在社会风气的带动下，渐渐的成长为家庭心目中所冀望的那种贵族女子，却早已忘却自己在9岁时的那些奇妙无比的经历。时光荏苒，在家族为她举办的19岁的生日宴会上，一位富豪的儿子向他求婚，对方是哈米什·爱斯科特（利奥·比尔饰），哈米什虽然家财万贯，性格却愚笨而木讷，跟爱丽丝根本不是一路人。爱丽丝发觉到自己并不想要这样的生活，渴望改变现状的她在小白兔的带领下，爱丽丝再次步入仙', '10', 'tv/G9BXDoMGIa4f3HpgbbHbAWYdIj4Vjdf4XxI6t4fm.jpeg', '7.0', '2010-03-05', '2010', '20', '3', '{\"actors\":[]}', '蒂姆·波顿', '108', 'http://pan.baidu.com/s/1kVDsZrD', '', '1', '102', '2017-10-14 13:49:36', '2017-10-14 13:49:36', null);
INSERT INTO `wing_tv` VALUES ('28', '爱丽丝梦游仙境2：镜中奇遇记', '爱丽丝梦游仙境2：镜中奇遇记', '《爱丽丝梦游仙境2：镜中奇遇记》是《爱丽丝梦游仙境》的续篇，是由迪士尼影业出品，詹姆斯·波宾执导，米娅·华希科沃斯卡、约翰尼·德普、海伦娜·伯翰·卡特、安妮·海瑟薇等主演的魔幻冒险电影。[1]  影片根据刘易斯·卡罗尔的幻想小说改编，讲述了女船长爱丽丝受到召唤重返仙境，为了拯救朋友疯帽匠而偷走“超时光魔球”，并因此展开了一段关于爱与寻找的冒险故事。[2]  影片于2016年5月27日以2D、3D、IMAX 3D等版本在中国大陆、北美同步上映。[3]  2017年1月，一年一度的金酸莓奖公布各大奖项的候初选', '爱丽丝·金斯利（米娅·华希科沃斯卡饰）作为船长纵横四海3年后回到伦敦，却发现对于女性社会角色的陈腐观念依然盛行，她为自己所设想的未来可能无法成为现实。此时白皇后（安妮·海瑟薇饰）希望她借助时空魔球回到过去去拯救疯帽子匠（约翰尼·德普饰）全家。而被流放外域的红皇后（海伦娜·伯翰·卡特饰）也与“时间”（萨莎·拜伦·科恩饰）结盟，并暗中计划偷取时空魔球。爱丽丝回到过去，与各个朋友和敌人在不同的时间点上交错，并且与红皇后和时间本人在时间的海洋上展开了一场奇妙的追逐。', '10', 'tv/CPfmZOkeij1DXgP9TTOTQtdsDKQj0qgzCASV8frL.jpeg', '6.6', '2016-05-27', '2016', '20', '3', '{\"actors\":[]}', '詹姆斯·波宾', '115', 'http://pan.baidu.com/s/1pKEWxdD', '', '1', '103', '2017-10-14 13:57:17', '2017-10-14 13:57:17', null);
INSERT INTO `wing_tv` VALUES ('29', '午夜凶铃3', '午夜凶铃3', '《午夜凶铃3》是由美国派拉蒙影业公司发行，由西班牙导演F·贾维尔·古铁雷斯执导，玛蒂尔达·鲁茨、亚历克斯·罗伊-布朗领衔主演的剧情恐怖片。该片于2017年2月3日在美国上映[1]  。 《午夜凶铃3》翻拍自日本同名电影，讲述了一盘被诅咒的录像带，看过录像带的人都在七日之内死掉的故事', '在飞机上，一个年轻人被杀。几年后，虽然已经是数码时代了，但大学教授Gabriel Brown（约翰尼·盖尔克奇饰）却跑到旧货摊买了一盘录像带，因为他喜欢那些复古的玩意儿。他看录像带的时候，带子卡在了机器里，紧接着奇怪的事情也接连而来。\n学校的校草霍尔特（亚历克斯·罗伊-布朗饰）要上大学去了，女友茱莉娅（玛蒂尔达·鲁茨饰）跟他告别。但此后许多天里，她再也没听到他的消息，于是她决定到霍尔特家去看看。到了那儿她才发现霍尔特和其他几个人都被录像带诅咒了，唯一的解决方法就是拷贝一份副本录像给别人看，茱莉娅和霍尔特来', '10', 'tv/FOVqPu5ASjdMwJzvk9GTniP105TWH2PSCRDqBDWm.jpeg', '4.7', '2017-02-03', '2017', '20', '3', '{\"actors\":[]}', 'F·贾维尔·古铁雷斯', '102', 'http://pan.baidu.com/s/1c1ECUbu', '', '1', '104', '2017-10-14 15:07:59', '2017-10-14 15:07:59', null);
INSERT INTO `wing_tv` VALUES ('30', '那年花开月正圆', '那年花开月正圆', '1884年，周滢跟着养父周老四来到关中，输光钱财的周老四将周滢卖到沈家当丫头。周滢逃跑时躲进吴家东院大少爷吴聘的轿中，颇具商业头脑的周滢得到了吴蔚文的赏识，被获许留在吴家。沈星移怀疑沈家大少爷被吴聘暗杀，出手将其打伤。为救昏迷的吴聘，周滢嫁入吴家冲喜。吴聘身亡，吴家处境困窘，周滢决定要重振吴家东院。周滢入股陕西织布局，却遭受了朝廷反对洋务运动势力的打击，陕西机器织布局面临重建。为救深陷牢狱的周滢，吴家交出陕西机器织布局的所有股份以及与洋商的生丝合同换得周滢一命。出狱后的周滢重燃斗志建立泾阳布厂，吴家产业再', '1884年，周滢跟着养父周老四来到关中，输光钱财的周老四将周滢卖到沈家当丫头。周滢逃跑时躲进吴家东院大少爷吴聘的轿中，颇具商业头脑的周滢得到了吴蔚文的赏识，被获许留在吴家。沈星移怀疑沈家大少爷被吴聘暗杀，出手将其打伤。为救昏迷的吴聘，周滢嫁入吴家冲喜。吴聘身亡，吴家处境困窘，周滢决定要重振吴家东院。周滢入股陕西织布局，却遭受了朝廷反对洋务运动势力的打击，陕西机器织布局面临重建。为救深陷牢狱的周滢，吴家交出陕西机器织布局的所有股份以及与洋商的生丝合同换得周滢一命。出狱后的周滢重燃斗志建立泾阳布厂，吴家产业再', '20', 'tv/SPZx0w89vYguIkXMYWa6eJBMJq8gpO2GB1yACuJw.jpeg', '7.4', '2017-08-30', '2016', '10', '101', '{\"actors\":[]}', '丁黑', '45', 'http://pan.baidu.com/s/1hrQaayS', '', '1', '101', '2017-10-14 15:24:53', '2017-10-14 15:24:53', null);
INSERT INTO `wing_tv` VALUES ('31', '天才枪手', '天才枪手', '该片讲述了天才高中生小琳在国际会考上跨国为富家公子作弊来牟取暴利，并与另一名记忆力极佳的天才学生班克，策划了一场跨时区的完美作弊', '出生平凡的天才少女小琳（茱蒂蒙·琼查容苏因饰）在进入贵族学校后，结识了富二代同学葛瑞丝（依莎亚·贺苏汪饰）与阿派（披纳若·苏潘平佑饰），从此开始了考场作弊生涯，与此同时，另一名记忆力极佳的天才学霸班克（查侬·散顶腾古饰）发现了小琳不为人知的“交易”。经过多场险象环生的“作弊战争”后，小琳接下最后一单在国际考场上为富家子弟作弊的天价委托。一场横跨两大洲的完美作弊方案横空出世，然而一切并不像他们想的那么简单', '10', 'tv/BWAAebJecpEB9h1STSz80dvVd9F6AQqUubgK6g5k.jpeg', '8.1', '2017-10-16', '2017', '10', '8', '{\"actors\":[]}', '纳塔吾·彭皮里亚', '130', 'https://pan.baidu.com/share/link?uk=3826095323&shareid=1267675382&third=0', '', '1', '1', '2017-10-16 11:23:31', '2017-10-16 11:28:21', null);
INSERT INTO `wing_tv` VALUES ('32', '美女与野兽', '美女与野兽', '贝儿（艾玛·沃森 Emma Watson 饰）和小镇上的其他女孩不同，是一个热爱阅读和幻想的姑娘，孔武有力英俊强壮的加斯顿（卢克·伊万斯 Luke Evans 饰）发誓要娶贝儿为妻，但贝儿却一眼看穿了他的自私和虚伪，拒不从命。某日，贝儿的父亲莫里斯（凯文·克莱恩 Kevin Kline 饰）迷路误打误撞之下来到了一座荒凉破败的城堡中，那里居住着样貌可怖半人半兽的野兽（丹·史蒂文斯 Dan Stevens 饰）。 因为偷摘了城堡里种植的玫瑰，莫里斯被野兽囚禁了起来，得知此消息的贝儿赶到城堡，要求和父亲作交换', '贝儿（艾玛·沃森 Emma Watson 饰）和小镇上的其他女孩不同，是一个热爱阅读和幻想的姑娘，孔武有力英俊强壮的加斯顿（卢克·伊万斯 Luke Evans 饰）发誓要娶贝儿为妻，但贝儿却一眼看穿了他的自私和虚伪，拒不从命。某日，贝儿的父亲莫里斯（凯文·克莱恩 Kevin Kline 饰）迷路误打误撞之下来到了一座荒凉破败的城堡中，那里居住着样貌可怖半人半兽的野兽（丹·史蒂文斯 Dan Stevens 饰）。 因为偷摘了城堡里种植的玫瑰，莫里斯被野兽囚禁了起来，得知此消息的贝儿赶到城堡，要求和父亲作交换', '10', 'tv/pBFIH9HpiGgen5EpiTQCRjRr5VzAPMntKtlW8nSc.jpeg', '7.2', '2017-03-17', '2017', '20', '3', '{\"actors\":[]}', '比尔·康顿', '129', 'http://pan.baidu.com/s/1jItImP4', '', '1', '105', '2017-10-16 18:07:40', '2017-10-16 18:07:40', null);
INSERT INTO `wing_tv` VALUES ('33', '蜘蛛侠：英雄归来', '蜘蛛侠：英雄归来', '《蜘蛛侠：英雄归来》（Spider-Man:Homecoming）是2017年漫威影业与哥伦比亚影业联合出品，索尼电影娱乐公司发行的一部科幻动作电影，由乔恩·沃茨执导，汤姆·赫兰德、迈克尔·基顿、小罗伯特·唐尼、玛丽莎·托梅等主演  。 该片取材自漫威漫画，是漫威电影宇宙的第十六部电影。讲述了彼得·帕克在超级英雄身份与高中生活之间面临的抉择。该片于2017年7月7日在北美公映，9月8日在中国大陆公映', '在英雄内战机场大战落幕后，彼得·帕克（汤姆·赫兰德饰）在恩师托尼·斯塔克（小罗伯特·唐尼饰）的协助下，试图在一名普通高中生和打击犯罪的超级英雄蜘蛛侠间保持平衡，但反派秃鹫（迈克尔·基顿饰）的崛起让人们面临新的威胁。钢铁侠作为蜘蛛侠的导师再次出现，做为引导他踏上英雄之路的关键人物，确保他在未来有资格成为复仇者联盟的一分子', '10', 'tv/QUQIM2e474ejzfb5ge6HtgLrw29BGu9P7a6ZtVET.jpeg', '7.4', '2017-07-07', '2017', '20', '3', '{\"actors\":[]}', '乔恩·沃茨', '133', 'http://pan.baidu.com/s/1i4Ucded', '', '1', '106', '2017-10-19 12:00:53', '2017-10-19 12:01:04', null);
INSERT INTO `wing_tv` VALUES ('34', '斗破苍穹  第一季', '斗破苍穹  第一季', '萧炎（刘三木 配音）曾是家族里公认的斗气天才，年仅11岁便已经抵达了常人穷尽一生都无法修炼到的境界。可12岁那年，一场意外让萧炎的全部努力都化为了乌有，失去一切的他体会到了人情的冷暖和世态的炎凉，之后，萧炎和纳兰嫣然（鬼月 配音）许下了决斗的三年之约，来到魔兽山脉，在身世神秘的药老（黑石稔 配音）手下修炼。  　　三年间，萧炎的身影穿梭在塔戈尔大沙漠和加玛帝国黑岩城等地，结识了云芝、小医仙（醋醋 配音）等志同道合的好友，并且最终获得了强大的力量。三年一晃眼就过去了，萧炎毫无悬念的战胜了纳兰嫣然，却没想到，', '萧炎（刘三木 配音）曾是家族里公认的斗气天才，年仅11岁便已经抵达了常人穷尽一生都无法修炼到的境界。可12岁那年，一场意外让萧炎的全部努力都化为了乌有，失去一切的他体会到了人情的冷暖和世态的炎凉，之后，萧炎和纳兰嫣然（鬼月 配音）许下了决斗的三年之约，来到魔兽山脉，在身世神秘的药老（黑石稔 配音）手下修炼。 \n　　三年间，萧炎的身影穿梭在塔戈尔大沙漠和加玛帝国黑岩城等地，结识了云芝、小医仙（醋醋 配音）等志同道合的好友，并且最终获得了强大的力量。三年一晃眼就过去了，萧炎毫无悬念的战胜了纳兰嫣然，却没想到，', '30', 'tv/biKzKZ5pK0aQ7xOrrG4TznSNMkk8XaHQU26CVuxw.jpeg', '5.6', '2017-01-07', '2017', '10', '0', '{\"actors\":[]}', '丁磊', '25', 'http://pan.baidu.com/s/1b7VEG2', '', '1', '101', '2017-10-19 12:20:28', '2017-10-19 12:20:28', null);
INSERT INTO `wing_tv` VALUES ('35', '恶魔的浪漫', '恶魔的浪漫', '　年轻帅气的Cho（Tomo Visava Thaiyanont饰）不仅仅带着痞气，喜欢在女生面前展现自我，而Yiwha（Maengmum Pimnitchakun Bumrungkit）一直认为他是Gay，在不知不觉的挑逗中，Cho已经对Yiwha产生了好感，Korn（Max Nattapol Diloknawarit饰）和Kncok（Tul Pakorn Thanasrivanitchai饰）本是一对未公开出柜的男同志情侣，因为Cho的出现，Korn总以为自己的男朋友Knock出轨，于是拜托Yiwha', '　年轻帅气的Cho（Tomo Visava Thaiyanont饰）不仅仅带着痞气，喜欢在女生面前展现自我，而Yiwha（Maengmum Pimnitchakun Bumrungkit）一直认为他是Gay，在不知不觉的挑逗中，Cho已经对Yiwha产生了好感，Korn（Max Nattapol Diloknawarit饰）和Kncok（Tul Pakorn Thanasrivanitchai饰）本是一对未公开出柜的男同志情侣，因为Cho的出现，Korn总以为自己的男朋友Knock出轨，于是拜托Yiwha', '20', 'tv/oH9tqWpPVSl9T4Pqci2Umf0swYrxeUwq6npLhjOQ.jpeg', '6.5', '2016-07-08', '2016', '10', '110', '{\"actors\":[]}', 'เจตษ์ ปุณโยประการ', '105', 'http://pan.baidu.com/s/1bp73QaV', '', '1', '101', '2017-10-19 12:31:38', '2017-10-19 12:31:38', null);
INSERT INTO `wing_tv` VALUES ('36', '战狼2', '战狼2', '被开除军籍的冷锋（吴京饰演）本是因找寻龙小云（余男饰演）来到非洲，但是却突然被卷入一场非洲国家的叛乱。因为国家之间政治立场的关系，中国军队无法在非洲实行武装行动撤离华侨。而作为退伍老兵的冷锋无法忘记曾经为军人的使命，本来可以安全撤离的他毅然决然地回到了沦陷区，孤身一人带领身陷屠杀中的同胞和难民，展开生死逃亡。随着斗争的持续，体内的狼性逐渐复苏，最终闯入战乱区域，为同胞而战斗', '被开除军籍的冷锋（吴京饰演）本是因找寻龙小云（余男饰演）来到非洲，但是却突然被卷入一场非洲国家的叛乱。因为国家之间政治立场的关系，中国军队无法在非洲实行武装行动撤离华侨。而作为退伍老兵的冷锋无法忘记曾经为军人的使命，本来可以安全撤离的他毅然决然地回到了沦陷区，孤身一人带领身陷屠杀中的同胞和难民，展开生死逃亡。随着斗争的持续，体内的狼性逐渐复苏，最终闯入战乱区域，为同胞而战斗', '10', 'tv/O0EXkJu3VPFZiHneLbTB4FUyiz7NNBZ2W1AZibwe.jpeg', '7.4', '2017-07-27', '2017', '10', '1', '{\"actors\":[]}', '吴京', '123', 'http://pan.baidu.com/s/1i4DNaSX', '', '1', '107', '2017-10-19 12:36:41', '2017-10-19 12:36:41', null);
INSERT INTO `wing_tv` VALUES ('37', '当你沉睡时', '当你沉睡时', '没有厉害的父母做靠山，没有了不起的学历和人脉，同时也没有伟大使命感的检察官，用一句话说就是“放升检”，这个放弃升职的检察官是丁宰璨（李钟硕饰）。突然有一天，一个疯子一样的女人出现了，对宰璨说你是世界上最正义又有能力的检察官，如果诺贝尔奖有检察官部门一定要属于宰璨，这个丁宰璨的迷妹就是南洪珠（裴秀智饰）。 所有人都不相信宰璨时，只有洪珠相信他，认为他是对的，宰璨对于洪珠这样的崇拜心既感到负担又感觉这其实还不错。洪珠的期待越大，宰璨越不希望她的期待变成失望，想要填补自己不足的能力而开始有了使命感。', '没有厉害的父母做靠山，没有了不起的学历和人脉，同时也没有伟大使命感的检察官，用一句话说就是“放升检”，这个放弃升职的检察官是丁宰璨（李钟硕饰）。突然有一天，一个疯子一样的女人出现了，对宰璨说你是世界上最正义又有能力的检察官，如果诺贝尔奖有检察官部门一定要属于宰璨，这个丁宰璨的迷妹就是南洪珠（裴秀智饰）。\n所有人都不相信宰璨时，只有洪珠相信他，认为他是对的，宰璨对于洪珠这样的崇拜心既感到负担又感觉这其实还不错。洪珠的期待越大，宰璨越不希望她的期待变成失望，想要填补自己不足的能力而开始有了使命感。', '20', 'tv/jxCmVAQ7LpferlM2Btx91ZxAhkrwEFPNsq3dVH7p.jpeg', '8.8', '2017-09-27', '2017', '10', '104', '{\"actors\":[]}', '吴忠焕', '35', 'http://pan.baidu.com/s/1nuPQlJz', '', '1', '102', '2017-10-19 13:15:18', '2017-10-19 13:15:18', null);
INSERT INTO `wing_tv` VALUES ('38', '暮光之城', '暮光之城', '《暮光之城》是《暮光之城》系列电影的第一部，由狮门电影公司旗下的顶峰娱乐公司出品的一部爱情电影。影片由凯瑟琳·哈德威克执导，克里斯汀·斯图尔特、罗伯特·帕丁森、凯姆·吉甘戴和泰勒·洛特纳等联袂出演。影片于2008年11月21日在美国上映[1]  。 影片讲述了爱德华·卡伦作为吸血鬼和人类女子伊莎贝拉·斯旺相识相爱的过程', '在美国一个名叫福克斯的地方，住着一位英俊帅气的男青年爱德华。他出没神秘，与世无争，他的家人同样低调神秘，原因在于他是一只永远不会衰老，更不会死亡的吸血鬼。爱德华生于20世纪的第一年，自从1918年发育成长为十七岁的翩翩少年之后，他便再也没有衰老，永远保持着年轻俊朗的外形。时光飞梭，过了近百年后，他已经不再靠吸人血为生，因为爱德华和同是吸血鬼的家人都秉持着素食主义，只吸食动物的血。\n十七岁的少女伊莎贝拉从小与母亲相依为命，因为父母的感情破裂，母亲带着她去了另一个城市。但当她长大的时候，母亲却决定再婚，由于继', '10', 'tv/NAu6z3NUojR66kpKx4t4vT2RxdOKTriyDNRIX4Hl.jpeg', '7.3', '2009-11-25', '2017', '20', '3', '{\"actors\":[]}', '凯瑟琳·哈德威克', '117', 'http://pan.baidu.com/s/1kUTsmRd', '', '1', '108', '2017-10-22 13:43:23', '2017-10-24 13:53:20', null);
INSERT INTO `wing_tv` VALUES ('39', '暮光之城：新月', '暮光之城：新月', '影片《暮光之城：新月》是暮光之城系列电影的第二部，改编于斯蒂芬妮·梅尔的同名小说。由克里斯·韦兹执导，克里斯汀·斯图尔特、罗伯特·帕丁森和泰勒·洛特纳等联袂出演。影片于2009年11月20日在美国上映。 影片讲述吸血鬼的魔爪中逃生的贝拉和爱德华谈起了恋爱，在她18岁生日宴会中，贝拉割破了手指受到攻击。爱德华因此带领家族离开。狼人雅各布出现在贝拉身边。贝拉和爱德华的爱情出现了分裂', '爱德华深深迷上贝拉，也喜欢上了她身上独特的香味。无奈欢乐时光总是短暂的，在她十八岁生日派对上发生了一件非常不愉快的事件——笨拙的贝拉在拆礼物包装纸的时候不小心割破了手指，鲜血滴落的一刹那，自控力最差的贾斯帕扑向了她。为了保护自己心爱的人，爱德华和他的家族离开了福克斯小镇。\n爱德华走后，贝拉的世界彻底坍塌了，她开始尝试各种冒险的行径，因为她发现，只要她一做危险的事情，爱德华的声音就会出现在她的脑海里。贝拉自虐式的疯狂举动并没有让爱德华回心转意，这时年少不羁的雅各布出现在她苍白的世界里，他虽知贝拉心中另有他人', '10', 'tv/AYSLfwmcBipLE0Ep8udxPcGWqyTRGrJA9W3haFEi.jpeg', '7.6', '2009-11-20', '2009', '20', '3', '{\"actors\":[]}', '克里斯·韦兹', '100', 'http://pan.baidu.com/s/1bo46dxP', '', '1', '109', '2017-10-22 13:50:33', '2017-10-22 13:50:33', null);
INSERT INTO `wing_tv` VALUES ('40', '暮光之城：月食', '暮光之城：月食', '影片《暮光之城：月食》是续《暮光之城》和《暮光之城：新月》之后的第三部。根据美国作家斯蒂芬妮·梅尔的同名小说改编而成，由大卫·斯雷执导，克里斯汀·斯图尔特、罗伯特·帕丁森和泰勒·洛特纳等联袂出演，影片于2010年6月30日在美国上映。 电影讲述在第一部里痛失恋人的流浪吸血僵尸维多利亚以贝拉为目标，逐步展开复仇计划。吸血僵尸与狼人的世仇仍未化解，贝拉夹在爱德华与雅各布之间，更面临生与死的抉择', '即将中学毕业的贝拉陷入两难的境地：她要在爱德华和雅各布中选择一个恋人，而这个选择极有可能引发卡伦家族和狼人族群之间的一场血腥战争。热血沸腾的贝拉宁愿选择死亡以便与爱德华长相厮守，但是在他们结婚之前，爱德华不允许她这样做。另一方面，雅各布的介入让他们两人的感情差点亮起红灯。一次去雅各布的探访，雅各布听到贝拉所说的“毕业后就不再见面”，知道自己和贝拉相处的时间只有几个月，愤怒的当面诅咒了血族，这点贝拉对雅各布有点失望。当贝拉和爱德华共度在家时，爱德华发现有吸血鬼从贝拉的房间偷了东西。谁也不知道他们的目的是要循', '10', 'tv/LMLi3Kay0egrOMymQqGztsSYW9fkwwGSfKSP9M0O.jpeg', '6.4', '2010-06-30', '2010', '20', '3', '{\"actors\":[]}', '大卫·斯雷德', '124', 'http://pan.baidu.com/s/1bpwENvD', '', '1', '110', '2017-10-24 13:52:05', '2017-10-24 14:01:37', null);
INSERT INTO `wing_tv` VALUES ('41', '暮光之城：破晓（上）', '暮光之城：破晓（上）', '影片根据美国女作家斯蒂芬妮·梅尔的同名小说《暮光之城：破晓》改编，篇为暮光系列电影的第4部，由于篇幅过长被分为了上下两部，该部电影是《暮光之城》系列在大陆上映的第二部作品，也是比尔·康顿作品首次登陆大陆的电影。影片由克里斯汀·斯图尔特，罗伯特·帕丁森，泰勒·洛特纳等联袂出演。影片于2012年7月25日在中国内地上映。 影片讲述贝拉和爱德华结婚后，在蜜月的途中两个人正式地发生关系。贝拉怀了孕、生下他们的孩子，而孩子的到来却并没有成为这对夫妻的开心事，这个疾速成长的小女孩反倒成为了吸血鬼和狼人的眼中钉。', '历经了千辛万苦之后，贝拉和爱德华终于结婚了，名正言顺地呆在一起。从两人第一次牵手的那一刻起，贝拉和爱德华就明白对方是自己要找的另一半，爱情就像雨后的阳光一样温润着他们的灵魂。幸福让人觉得温暖，却又让人如履薄冰。来自于不同世界的两个人的禁忌之爱，像狂躁的风暴蹂躏折磨着两颗脆弱的心。作为新婚的一对夫妻，他们来到了巴西的里约热内卢度蜜月。在蜜月的途中，两个人正式地发生了关系。很快贝拉便发现自己怀了孕，而且她肚子里的胎儿正在以惊人的速度成长。这种成长的速度几乎要摧毁作为人类的贝拉。\n为了不让贝拉难产而死，爱德华完', '10', 'tv/KP4WZhI60uKdIpWvGOhpVbthJsuZysmrWNaaJ2nq.jpeg', '6.1', '2011-11-18', '2011', '20', '3', '{\"actors\":[]}', '比尔·康顿', '117', 'http://pan.baidu.com/s/1gfBzNMj', '', '1', '111', '2017-10-24 14:01:12', '2017-10-24 14:01:12', null);
INSERT INTO `wing_tv` VALUES ('42', '暮光之城 ：破晓( 下 )', '暮光之城 ：破晓( 下 )', '《暮光之城：破晓（下）》是由比尔·康顿执导，克里斯汀·斯图尔特、罗伯特·帕丁森和泰勒·洛特纳等联袂出演的奇幻爱情电影，影片于2012年11月16日在美国上映。 该片根据斯蒂芬妮·梅耶的同名小说改编而成，是《暮光之城》系列电影的最后一部，讲述贝拉终于变成了吸血鬼之后的故事，她与罗伯特-帕丁森饰演爱德华共同拥有的女儿蕾妮斯梅却成了沃图里家族的眼中钉，一场家庭保卫战在所难免', '当在分娩的过程中差点死去的贝拉·斯万（克里斯汀·斯图尔特饰)再一次醒过来的时候，她的身体已经发生了一些难以置信的转变——如今，她不仅是一位母亲，最终还成为了一个真正的吸血鬼。在她的丈夫爱德华·卡伦（罗伯特·帕丁森饰）的保护和引导下，贝拉的力量和速度都得到了空前的飞越，而且最最不可思议的是，她对这些新能力以及嗜血的欲望有着超凡的自我控制.得到了新生之后，贝拉也意识到自己走进的是一个全新的世界，摆在她面前的是各种各样的可能性。然而，作为吸血鬼的首领，沃尔图里家族却认为贝拉和爱德华的孩子的出生威胁到了他们的生存', '10', 'tv/bSaWEH30SbmRVZEZDDtCjrQS61inb4FVIsnb6J0c.jpeg', '6.5', '2012-11-16', '2017', '20', '3', '{\"actors\":[]}', '比尔·康顿', '110', 'http://pan.baidu.com/s/1geIB8hd', '', '1', '112', '2017-11-01 13:20:15', '2017-11-01 13:21:50', null);
INSERT INTO `wing_tv` VALUES ('43', '猎场', '猎场', '该剧以都市社会为背景，讲述了郑秋冬职场颠沛、商海沉浮、十年蝶变，成为专业猎头的成长故事', '郑秋冬是个为了理想坚持不懈的人，在好友老白和女友罗伊人的帮助下，事业逐渐有了起色，不想老白突然的去世与自己事业的一夜挫败，让郑秋冬危机重重，然而郑秋冬并不甘心，发愤图强，且在罗伊人的帮助下，平安度过难关，郑也因此对罗伊人产生情愫，只可惜两人缘分未到，遗憾擦肩而过。时间慢慢流逝，林拜的出现，给郑秋冬带来了非凡的机遇，而郑秋冬诚信为本的原则，让林拜更加刮目相看。机缘巧合，郑秋冬发现对手袁昆急功近利，准备使用极其不道德的手段达到目的，而郑秋冬面对自己的诚信与良知无法容忍袁昆将要给他人带来的伤害，于是通过各种手段', '20', 'tv/pEy1sSkPsDnDWP3KavpFvn7tyUCMfghrO0Ou9YGM.jpeg', '8.4', '2017-11-18', '2017', '10', '101', '{\"actors\":[]}', '', '45', 'https://pan.baidu.com/share/init?surl=mhFJMek', '885e', '1', '255', '2017-11-18 10:45:04', '2017-11-18 10:45:04', null);
INSERT INTO `wing_tv` VALUES ('44', '致我们单纯的小美好', '致我们单纯的小美好', '该片是根据作家赵乾乾同名小说改编，讲述了陈小希一直追逐着邻家男孩江辰脚步、并与他19年间共同成长，从青梅竹马到女追男，从拥有爱情到错失后又再次牵手的青春爱情故事', '陈小希与江辰19年间共同成长，\n 从青梅竹马到错失后的再次牵手的爱情故事。腹黑傲娇的天才医生，蠢萌逗比的元气少女，全剧气质俏皮幽默，通过展现陈小希倒追江辰一路上啼笑皆非的日常，记录了青春时光里最美好的心动时刻，将专属17岁少男少女之间的青涩感情呈现出来，带领观众重返好时光', '20', 'tv/qFArGypedMwsQOT4gzd7fIwLixc1raGYIuka3bgh.jpeg', '1.0', '2017-11-18', '2017', '10', '101', '{\"actors\":[]}', '', '45', 'https://pan.baidu.com/share/init?surl=pLeGQuR', '5mid', '1', '255', '2017-11-18 11:16:27', '2017-11-18 11:16:27', null);
INSERT INTO `wing_tv` VALUES ('45', '你好，旧时光', '你好，旧时光', '该剧讲述了女孩余周周在经历了与陪伴一同成长的童年好友林杨分分合合、振华中学中的波折以及繁杂的家庭琐事后不断成长的故事', '余周周与妈妈相依为命。上小学的第一天，余周周因为一次跌倒结识了一个叫林杨的男孩。在林杨的帮助下，她度过了初期对学校的不适，两人也成为了好朋友。然而因为一些流言，林杨却被父母要求远离余周周。对于林杨的疏远，余周周学会了假装不在乎。\n初中，余周周逃离了林杨和曾经的同学，逐渐放开手脚如鱼得水，最终如愿考上省重点振华高中。与林杨在振华的重逢，不知道是悲是喜。因为林杨巧合的一个电话，余周周的命运再次被改变。林杨的愧疚、急于弥补以及说不清的感情，都让余周周不知如何应对。而对大哥哥陈桉的关怀，重点高中内部因为保送名额的', '20', 'tv/HxY3Aa9hEGnvg2SKxbShTsshoZzOuaGC0KplIwZJ.jpeg', '1.0', '2017-11-18', '2017', '10', '101', '{\"actors\":[]}', '', '45', 'https://pan.baidu.com/share/init?surl=qYiI3Fm', '52mp', '1', '255', '2017-11-18 11:20:41', '2017-11-18 11:20:41', null);

-- ----------------------------
-- Table structure for wing_tv_class
-- ----------------------------
DROP TABLE IF EXISTS `wing_tv_class`;
CREATE TABLE `wing_tv_class` (
  `tv_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_class_name` varchar(255) NOT NULL DEFAULT '' COMMENT '类型名称',
  `tv_type` tinyint(255) NOT NULL DEFAULT '10' COMMENT '影视类型',
  PRIMARY KEY (`tv_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wing_tv_class
-- ----------------------------
INSERT INTO `wing_tv_class` VALUES ('1', '喜剧', '10');
INSERT INTO `wing_tv_class` VALUES ('2', '恐怖', '10');
INSERT INTO `wing_tv_class` VALUES ('3', '惊悚', '10');
INSERT INTO `wing_tv_class` VALUES ('4', '动作', '10');
INSERT INTO `wing_tv_class` VALUES ('5', '犯罪', '10');
INSERT INTO `wing_tv_class` VALUES ('6', '悬疑', '10');
INSERT INTO `wing_tv_class` VALUES ('7', '科幻', '10');
INSERT INTO `wing_tv_class` VALUES ('8', '爱情', '10');

-- ----------------------------
-- Table structure for wing_tv_classify
-- ----------------------------
DROP TABLE IF EXISTS `wing_tv_classify`;
CREATE TABLE `wing_tv_classify` (
  `classify_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_class_id` int(11) NOT NULL DEFAULT '0' COMMENT '类型Key',
  `tv_class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '类型名称',
  `tv_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`classify_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_tv_classify
-- ----------------------------
INSERT INTO `wing_tv_classify` VALUES ('1', '1', '喜剧', '2', '2017-10-07 11:51:18', '2017-10-07 11:51:18');
INSERT INTO `wing_tv_classify` VALUES ('2', '1', '喜剧', '7', '2017-10-08 14:18:04', '2017-10-08 14:18:04');
INSERT INTO `wing_tv_classify` VALUES ('3', '1', '喜剧', '10', '2017-10-08 15:08:10', '2017-10-08 15:08:10');
INSERT INTO `wing_tv_classify` VALUES ('4', '7', '科幻', '11', '2017-10-08 15:51:37', '2017-10-08 15:51:37');
INSERT INTO `wing_tv_classify` VALUES ('5', '3', '惊悚', '11', '2017-10-08 15:51:37', '2017-10-08 15:51:37');
INSERT INTO `wing_tv_classify` VALUES ('6', '6', '悬疑', '13', '2017-10-10 12:23:18', '2017-10-10 12:23:18');
INSERT INTO `wing_tv_classify` VALUES ('7', '1', '喜剧', '14', '2017-10-10 13:19:09', '2017-10-10 13:19:09');
INSERT INTO `wing_tv_classify` VALUES ('8', '4', '动作', '14', '2017-10-10 13:19:09', '2017-10-10 13:19:09');
INSERT INTO `wing_tv_classify` VALUES ('9', '4', '动作', '15', '2017-10-10 13:46:09', '2017-10-10 13:46:09');
INSERT INTO `wing_tv_classify` VALUES ('10', '7', '科幻', '15', '2017-10-10 13:46:09', '2017-10-10 13:46:09');
INSERT INTO `wing_tv_classify` VALUES ('11', '1', '喜剧', '16', '2017-10-10 17:43:51', '2017-10-10 17:43:51');
INSERT INTO `wing_tv_classify` VALUES ('12', '4', '动作', '17', '2017-10-11 13:40:18', '2017-10-11 13:40:18');
INSERT INTO `wing_tv_classify` VALUES ('13', '1', '喜剧', '18', '2017-10-11 18:04:36', '2017-10-11 18:04:36');
INSERT INTO `wing_tv_classify` VALUES ('14', '4', '动作', '18', '2017-10-11 18:04:36', '2017-10-11 18:04:36');
INSERT INTO `wing_tv_classify` VALUES ('15', '4', '动作', '19', '2017-10-12 13:36:55', '2017-10-12 13:36:55');
INSERT INTO `wing_tv_classify` VALUES ('16', '4', '动作', '20', '2017-10-12 13:54:05', '2017-10-12 13:54:05');
INSERT INTO `wing_tv_classify` VALUES ('17', '4', '动作', '22', '2017-10-12 14:53:18', '2017-10-12 14:53:18');
INSERT INTO `wing_tv_classify` VALUES ('18', '4', '动作', '23', '2017-10-12 18:13:08', '2017-10-12 18:13:08');
INSERT INTO `wing_tv_classify` VALUES ('19', '4', '动作', '24', '2017-10-13 17:23:21', '2017-10-13 17:23:21');
INSERT INTO `wing_tv_classify` VALUES ('20', '4', '动作', '26', '2017-10-14 13:27:16', '2017-10-14 13:27:16');
INSERT INTO `wing_tv_classify` VALUES ('21', '3', '惊悚', '27', '2017-10-14 13:49:36', '2017-10-14 13:49:36');
INSERT INTO `wing_tv_classify` VALUES ('22', '3', '惊悚', '28', '2017-10-14 13:57:17', '2017-10-14 13:57:17');
INSERT INTO `wing_tv_classify` VALUES ('23', '2', '恐怖', '29', '2017-10-14 15:07:59', '2017-10-14 15:07:59');
INSERT INTO `wing_tv_classify` VALUES ('24', '5', '犯罪', '31', '2017-10-16 11:23:31', '2017-10-16 11:23:31');
INSERT INTO `wing_tv_classify` VALUES ('25', '4', '动作', '3', '2017-10-16 11:30:06', '2017-10-16 11:30:06');
INSERT INTO `wing_tv_classify` VALUES ('26', '8', '爱情', '32', '2017-10-16 18:07:40', '2017-10-16 18:07:40');
INSERT INTO `wing_tv_classify` VALUES ('27', '4', '动作', '33', '2017-10-19 12:00:53', '2017-10-19 12:00:53');
INSERT INTO `wing_tv_classify` VALUES ('28', '7', '科幻', '33', '2017-10-19 12:00:53', '2017-10-19 12:00:53');
INSERT INTO `wing_tv_classify` VALUES ('29', '4', '动作', '36', '2017-10-19 12:36:41', '2017-10-19 12:36:41');
INSERT INTO `wing_tv_classify` VALUES ('30', '8', '爱情', '38', '2017-10-22 13:43:23', '2017-10-22 13:43:23');
INSERT INTO `wing_tv_classify` VALUES ('31', '8', '爱情', '39', '2017-10-22 13:50:33', '2017-10-22 13:50:33');
INSERT INTO `wing_tv_classify` VALUES ('32', '8', '爱情', '40', '2017-10-24 13:52:05', '2017-10-24 13:52:05');
INSERT INTO `wing_tv_classify` VALUES ('33', '8', '爱情', '41', '2017-10-24 14:01:12', '2017-10-24 14:01:12');
INSERT INTO `wing_tv_classify` VALUES ('34', '8', '爱情', '42', '2017-11-01 13:20:15', '2017-11-01 13:20:15');

-- ----------------------------
-- Table structure for wing_tv_feedback
-- ----------------------------
DROP TABLE IF EXISTS `wing_tv_feedback`;
CREATE TABLE `wing_tv_feedback` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_id` int(11) NOT NULL DEFAULT '0',
  `tv_name` varchar(255) NOT NULL DEFAULT '' COMMENT '影视名称',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '反馈人',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '反馈类型 0百度云 1在线播放 2下载中心',
  `is_handle` tinyint(255) NOT NULL DEFAULT '0' COMMENT '是否已解决 0 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wing_tv_feedback
-- ----------------------------
INSERT INTO `wing_tv_feedback` VALUES ('3', '7', '大话西游', '0', '', '1', '1', '2017-10-08 14:18:39', '2017-10-08 14:18:48');
INSERT INTO `wing_tv_feedback` VALUES ('4', '31', '天才枪手', '0', '', '2', '0', '2017-11-09 19:57:02', '2017-11-09 19:57:02');
INSERT INTO `wing_tv_feedback` VALUES ('5', '6', '爸爸去哪儿', '0', '', '2', '0', '2017-11-17 10:29:21', '2017-11-17 10:29:21');
INSERT INTO `wing_tv_feedback` VALUES ('6', '4', '英伦对决', '0', '', '2', '0', '2017-12-09 17:31:37', '2017-12-09 17:31:37');
INSERT INTO `wing_tv_feedback` VALUES ('7', '4', '英伦对决', '0', '', '1', '0', '2017-12-25 23:47:28', '2017-12-25 23:47:28');
INSERT INTO `wing_tv_feedback` VALUES ('8', '34', '斗破苍穹  第一季', '0', '', '2', '0', '2018-01-20 17:59:02', '2018-01-20 17:59:02');
INSERT INTO `wing_tv_feedback` VALUES ('9', '42', '暮光之城 ：破晓( 下 )', '0', '', '1', '0', '2018-05-29 10:05:36', '2018-05-29 10:05:36');

-- ----------------------------
-- Table structure for wing_tv_seek
-- ----------------------------
DROP TABLE IF EXISTS `wing_tv_seek`;
CREATE TABLE `wing_tv_seek` (
  `sk_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_name` varchar(255) NOT NULL DEFAULT '' COMMENT '影视名称',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '反馈人',
  `is_handle` tinyint(255) NOT NULL DEFAULT '0' COMMENT '是否已解决 0 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wing_tv_seek
-- ----------------------------

-- ----------------------------
-- Table structure for wing_tv_special
-- ----------------------------
DROP TABLE IF EXISTS `wing_tv_special`;
CREATE TABLE `wing_tv_special` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '专题名称',
  `sp_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '专题简介',
  `sp_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '专题封面图片',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_tv_special
-- ----------------------------

-- ----------------------------
-- Table structure for wing_tv_special_many
-- ----------------------------
DROP TABLE IF EXISTS `wing_tv_special_many`;
CREATE TABLE `wing_tv_special_many` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_id` int(11) DEFAULT NULL,
  `sp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_tv_special_many
-- ----------------------------

-- ----------------------------
-- Table structure for wing_user
-- ----------------------------
DROP TABLE IF EXISTS `wing_user`;
CREATE TABLE `wing_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '头像',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '手机 ',
  `last_login` datetime NOT NULL COMMENT '最后登陆时间',
  `last_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '最后登陆IP',
  `register_time` datetime NOT NULL COMMENT '注册时间',
  `register_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '注册IP',
  `login_num` int(11) NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `register_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pc',
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '真实姓名',
  `real_sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '真实性别',
  `real_birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `real_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'QQ号',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wing_user
-- ----------------------------

-- ----------------------------
-- Table structure for wing_user_collect
-- ----------------------------
DROP TABLE IF EXISTS `wing_user_collect`;
CREATE TABLE `wing_user_collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tv_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wing_user_collect
-- ----------------------------

-- ----------------------------
-- Table structure for wing_user_watch
-- ----------------------------
DROP TABLE IF EXISTS `wing_user_watch`;
CREATE TABLE `wing_user_watch` (
  `watch_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `tv_id` int(11) NOT NULL DEFAULT '0',
  `watch_nums` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`watch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wing_user_watch
-- ----------------------------
