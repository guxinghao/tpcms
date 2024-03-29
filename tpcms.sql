/*
Navicat MySQL Data Transfer

Source Server         : 个人服务器
Source Server Version : 50564
Source Host           : localhost:3306
Source Database       : tpcms

Target Server Type    : MYSQL
Target Server Version : 50564
File Encoding         : 65001

Date: 2019-11-06 20:55:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_user`;
CREATE TABLE `tp_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `real_name` varchar(20) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `password` varchar(100) NOT NULL DEFAULT '' COMMENT '登录密码',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除 0 未删除 1 已删除',
  `role_id` int(10) NOT NULL DEFAULT '0' COMMENT '权限ID',
  `token` varchar(50) NOT NULL DEFAULT '' COMMENT 'token 存放session_id 判断 一个账号一个地方登录使用',
  `is_login` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已登录  0 未登录  1 已经登录',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin_user
-- ----------------------------
INSERT INTO `tp_admin_user` VALUES ('1', 'admin', '曹', '123456789', 'e10adc3949ba59abbe56e057f20f883e', '1572242451', '0', '1', '25d63130baf4f55e2fc9f96d7e2cd695', '1');
INSERT INTO `tp_admin_user` VALUES ('2', 'ceshi', '张三', '2345678918', 'e10adc3949ba59abbe56e057f20f883e', '1572352908', '0', '0', '13d7f3c9988c369d64a1db55368d6426', '1');


-- ----------------------------
-- Table structure for `tp_wx_chat`
-- ----------------------------
DROP TABLE IF EXISTS `tp_wx_chat`;
CREATE TABLE `tp_wx_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '公众号名称',
  `idendity` varchar(100) NOT NULL DEFAULT '' COMMENT '公众号ID',
  `main_body` varchar(100) NOT NULL DEFAULT '' COMMENT '公众号主体',
  `province` varchar(20) NOT NULL DEFAULT '' COMMENT '所在省',
  `city` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '所在市</label>',
  `district` varchar(20) NOT NULL DEFAULT '' COMMENT '所在区',
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '公众号类别',
  `fans_number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '粉丝数量',
  `first_money` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '首条成本',
  `second_money` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '次条成本',
  `more_money` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '3-N条成本',
  `order_number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'order_number',
  `channel` varchar(30) NOT NULL DEFAULT '' COMMENT '运营渠道',
  `quality` varchar(30) NOT NULL DEFAULT '' COMMENT '公众号属性',
  `classify` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '公众号分类 1订阅号 2 服务号',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `is_del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除 0 未删除 1已删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_wx_chat
-- ----------------------------
INSERT INTO `tp_wx_chat` VALUES ('1', '哈哈哈', 'aaa', 'ssss', '', '', '', '杀杀杀', '1111111', '0.00', '0.00', '0.00', '0', '', '', '0', '1572353879', '1');
INSERT INTO `tp_wx_chat` VALUES ('2', '颗粒一号', '', '', '', '', '', '', '0', '0.00', '0.00', '0.00', '0', '', '', '0', '1572356457', '1');
INSERT INTO `tp_wx_chat` VALUES ('3', '颗粒一号', '', '', '', '', '', '', '0', '0.00', '0.00', '0.00', '0', '', '', '0', '1572356459', '1');
INSERT INTO `tp_wx_chat` VALUES ('4', '爱奇艺', 'wqedsakfj', '姑娘', '山东省', '济南市', '市中区', '情感', '0', '1111.00', '222.00', '333.00', '0', '', '', '1', '1572356513', '1');
INSERT INTO `tp_wx_chat` VALUES ('5', '大道', '11', '11', '', '', '', '11', '11', '2.00', '2.00', '22.00', '0', '', '', '0', '1572356693', '1');
INSERT INTO `tp_wx_chat` VALUES ('6', '财务第一教室', 'cfoclass', '财务第一教室', '', '', '', '职场类', '0', '36100.00', '10000.00', '9000.00', '0', '曹', '', '1', '1572399501', '0');
INSERT INTO `tp_wx_chat` VALUES ('7', 'super health', '', 'super health', '', '', '', '健身', '76', '16000.00', '5800.00', '0.00', '0', '熊', '', '1', '1572400959', '0');
INSERT INTO `tp_wx_chat` VALUES ('8', 'Lee健身', 'leegym', 'Lee健身', '', '', '', '健身', '12', '4000.00', '0.00', '0.00', '0', '熊', '', '1', '1572403551', '0');
INSERT INTO `tp_wx_chat` VALUES ('9', '我的职场管家', 'zhichang_GJ', '学生时代-微猴科技', '', '', '', '职场', '28', '4500.00', '0.00', '0.00', '0', '熊', '', '1', '1572403687', '0');
INSERT INTO `tp_wx_chat` VALUES ('10', '金融第一教室', 'jrclass', '财务第一教室', '', '', '', '职场类', '0', '19000.00', '8000.00', '7000.00', '0', '曹', '', '1', '1572403717', '0');
INSERT INTO `tp_wx_chat` VALUES ('11', '税务大讲堂', 'shuiwu007', '财务第一教室', '', '', '', '职场类', '0', '2000.00', '8000.00', '7000.00', '0', '曹', '', '1', '1572403885', '0');
INSERT INTO `tp_wx_chat` VALUES ('12', '税务师', 'shuiwushi123', '财务第一教室', '', '', '', '职场类', '0', '8000.00', '5000.00', '4000.00', '0', '曹', '', '1', '1572403952', '0');
INSERT INTO `tp_wx_chat` VALUES ('13', '创业投资最前线', 'bigwise001', '财务第一教室', '', '', '', '职场类', '0', '5700.00', '3000.00', '2500.00', '0', '曹', '', '1', '1572404023', '0');
INSERT INTO `tp_wx_chat` VALUES ('14', '税台', 'kjshicao33', '财务第一教室', '', '', '', '职场类', '0', '5800.00', '5000.00', '4000.00', '0', '曹', '', '1', '1572404118', '1');
INSERT INTO `tp_wx_chat` VALUES ('15', '税台', 'kjshicao33', '财务第一教室', '', '', '', '职场类', '0', '5800.00', '5000.00', '4000.00', '0', '曹', '', '1', '1572404118', '0');
INSERT INTO `tp_wx_chat` VALUES ('16', '修行和旅行', 'licai9188', '财务第一教室', '', '', '', '职场类', '0', '2375.00', '0.00', '0.00', '0', '曹', '', '1', '1572404260', '0');
INSERT INTO `tp_wx_chat` VALUES ('17', 'excel', 'excel8866', '财务第一教室', '', '', '', '职场类', '0', '3800.00', '0.00', '0.00', '0', '曹', '', '1', '1572404337', '0');
INSERT INTO `tp_wx_chat` VALUES ('18', '财务经理人', 'FinManager', '财务第一教室', '', '', '', '职场类', '0', '3800.00', '0.00', '0.00', '0', '曹', '', '1', '1572404382', '0');
INSERT INTO `tp_wx_chat` VALUES ('19', '税务经理人', 'shuiwu886', '财务第一教室', '', '', '', '职场类', '0', '3000.00', '0.00', '0.00', '0', '曹', '', '1', '1572404451', '0');
INSERT INTO `tp_wx_chat` VALUES ('20', '硬汉', 'hardman55', '硬汉', '', '', '', '娱乐类', '0', '3000.00', '0.00', '0.00', '0', '曹', '', '1', '1572405388', '0');
INSERT INTO `tp_wx_chat` VALUES ('21', '肌肉构成', 'jirougc', '硬汉', '', '', '', '娱乐', '0', '16000.00', '0.00', '0.00', '0', '曹', '', '1', '1572405534', '0');
INSERT INTO `tp_wx_chat` VALUES ('22', '肌肉构成', 'jirougc', '硬汉', '', '', '', '娱乐', '0', '16000.00', '0.00', '0.00', '0', '曹', '', '1', '1572405535', '1');
INSERT INTO `tp_wx_chat` VALUES ('23', 'vv健身', 'vvsh028', '硬汉', '', '', '', '娱乐', '0', '6000.00', '0.00', '0.00', '0', '曹', '', '1', '1572405672', '0');
INSERT INTO `tp_wx_chat` VALUES ('24', 'ceshi', '122', '33', '山东省', '滨州市', '邹平县', '类别', '1', '2.00', '3.00', '4.00', '5', '6', '7', '1', '1572406483', '1');
INSERT INTO `tp_wx_chat` VALUES ('25', '福瑞迪是', '垫付', '', '', '', '', '', '0', '111.00', '0.00', '0.00', '0', '', '', '0', '1572406759', '1');
INSERT INTO `tp_wx_chat` VALUES ('26', '健身女王diana', 'jianshennv', '硬汉', '', '', '', '娱乐', '0', '7000.00', '0.00', '0.00', '0', '曹', '', '1', '1572407222', '0');
INSERT INTO `tp_wx_chat` VALUES ('27', '肌肉训练营', 'muscle-xly', '硬汉', '', '', '', '娱乐类', '0', '13000.00', '0.00', '0.00', '0', '曹', '', '1', '1572407382', '0');
INSERT INTO `tp_wx_chat` VALUES ('28', '健身兔姐', 'amsgirl', '硬汉', '', '', '', '娱乐', '0', '7200.00', '0.00', '0.00', '0', '曹', '', '1', '1572407622', '0');
INSERT INTO `tp_wx_chat` VALUES ('29', '健身路卡', 'coluka', '硬汉', '', '', '', '娱乐', '0', '4000.00', '0.00', '0.00', '0', '曹', '', '1', '1572407485', '0');
INSERT INTO `tp_wx_chat` VALUES ('30', '肌肉梦想', 'jiroumx', '硬汉', '', '', '', '娱乐', '0', '7000.00', '0.00', '0.00', '0', '曹', '', '1', '1572407818', '0');
INSERT INTO `tp_wx_chat` VALUES ('31', '囚徒健身fit', 'qiutufit', '硬汉', '', '', '', '娱乐', '0', '3500.00', '0.00', '0.00', '0', '曹', '', '1', '1572407870', '0');
INSERT INTO `tp_wx_chat` VALUES ('32', '弊有一技', 'byyj222', '弊有一技', '', '', '', '科技类', '0', '5000.00', '0.00', '0.00', '0', '曹', '', '1', '1572486162', '0');
INSERT INTO `tp_wx_chat` VALUES ('33', '意林', 'yilinzazhi', '意林', '', '', '', '文摘', '0', '63000.00', '34200.00', '22500.00', '0', '曹', '', '1', '1572488530', '0');
INSERT INTO `tp_wx_chat` VALUES ('34', '佳人', 'jiarenorg', '佳人小陌', '', '', '', '情感类', '0', '9000.00', '5000.00', '0.00', '0', '', '曹', '0', '1572491250', '0');
INSERT INTO `tp_wx_chat` VALUES ('35', '水母真探社', 'SMZTS88', '水母', '', '', '', '资讯', '0', '3800.00', '0.00', '0.00', '0', '曹', '', '1', '1572944530', '0');
INSERT INTO `tp_wx_chat` VALUES ('36', '遇见简爱', 'yujianjenny', '遇见简爱', '', '', '', '情感', '0', '6000.00', '0.00', '0.00', '0', '曹', '', '1', '1572947669', '0');
INSERT INTO `tp_wx_chat` VALUES ('37', '人力资源心理学', 'HRxinli', '人力资源心理学', '', '', '', '职场', '0', '7000.00', '4000.00', '0.00', '0', '曹', '', '1', '1572953012', '0');
INSERT INTO `tp_wx_chat` VALUES ('38', '壹姐有话说', 'TT-TingDu', '壹姐', '', '', '', '情感', '0', '21000.00', '0.00', '0.00', '0', '曹', '', '1', '1572953149', '0');
INSERT INTO `tp_wx_chat` VALUES ('39', '环球法研', 'LexAlliance', '环球法研', '', '', '', '职场', '0', '2500.00', '0.00', '0.00', '0', '曹', '', '1', '1572953194', '0');
INSERT INTO `tp_wx_chat` VALUES ('40', '壹读好书', 'yidu_haoshu', '壹读好书', '', '', '', '教育', '0', '10800.00', '5400.00', '0.00', '0', '曹', '', '1', '1572953388', '0');
INSERT INTO `tp_wx_chat` VALUES ('41', '唯美诗词家', 'weimeishicijia', '壹读好书', '', '', '', '教育', '0', '9900.00', '4950.00', '0.00', '0', '曹', '', '1', '1572953447', '0');
INSERT INTO `tp_wx_chat` VALUES ('42', '名雅读书', 'mingyadushu', '壹读好书', '', '', '', '情感', '0', '11700.00', '6300.00', '0.00', '0', '曹', '', '1', '1572953520', '0');
INSERT INTO `tp_wx_chat` VALUES ('43', '今夜青年', 'jinyeqingnian', '壹读好书', '', '', '', '娱乐', '0', '3600.00', '0.00', '0.00', '0', '曹', '', '1', '1572953562', '0');
INSERT INTO `tp_wx_chat` VALUES ('44', '好爸妈晨读', 'chendushushe', '壹读好书', '', '', '', '教育', '0', '7200.00', '0.00', '0.00', '0', '曹', '', '1', '1572953615', '0');
INSERT INTO `tp_wx_chat` VALUES ('45', '洞见智慧', 'idongjianzhihui', '壹读好书', '', '', '', '教育', '0', '2340.00', '0.00', '0.00', '0', '曹', '', '1', '1572953665', '0');
INSERT INTO `tp_wx_chat` VALUES ('46', '清晨早安祝福语', 'lizhishuo99', '壹读好书', '', '', '', '情感', '0', '5400.00', '0.00', '0.00', '0', '曹', '', '1', '1572953715', '0');
INSERT INTO `tp_wx_chat` VALUES ('47', '瓶里有故事', 'pingliyougushi', '瓶里有故事', '', '', '', '情感', '0', '7000.00', '0.00', '0.00', '0', '曹', '', '1', '1572954861', '0');
INSERT INTO `tp_wx_chat` VALUES ('48', '贰瓶子', 'pingzi-er', '瓶里有故事', '', '', '', '情感', '0', '7000.00', '0.00', '0.00', '0', '曹', '', '1', '1572954904', '0');
INSERT INTO `tp_wx_chat` VALUES ('49', '夜间学堂', 'shenyexuetang17', '夜间学堂', '', '', '', '科技', '0', '3800.00', '0.00', '0.00', '0', '曹', '', '1', '1572954959', '0');
INSERT INTO `tp_wx_chat` VALUES ('50', '轻罗小扇的耳朵', 'xiuse333', '风为裳', '', '', '', '情感', '0', '1500.00', '0.00', '0.00', '0', '曹', '', '1', '1572955096', '0');
INSERT INTO `tp_wx_chat` VALUES ('51', '风为裳', 'fwsjinwei', '风为裳', '', '', '', '情感', '0', '6000.00', '0.00', '0.00', '0', '曹', '', '1', '1572955138', '0');
INSERT INTO `tp_wx_chat` VALUES ('52', '英语四级英语六级', 'siliujiba', '英语四级', '', '', '', '教育', '0', '1000.00', '0.00', '0.00', '0', '曹', '', '1', '1572955358', '0');
INSERT INTO `tp_wx_chat` VALUES ('53', '苏州楼市情报', 'szls_real', '苏州楼市情报', '', '', '', '房产', '0', '50000.00', '30000.00', '4500.00', '0', '曹', '', '1', '1572955719', '0');
INSERT INTO `tp_wx_chat` VALUES ('54', '也楼', 'YL20080415', '也楼', '', '', '', '情感', '0', '2000.00', '0.00', '0.00', '0', '曹', '', '1', '1572955776', '0');
INSERT INTO `tp_wx_chat` VALUES ('55', '再深一点', 'deeperplease', '再深一点', '', '', '', '资讯', '0', '9000.00', '0.00', '0.00', '0', '曹', '', '1', '1572955869', '0');
INSERT INTO `tp_wx_chat` VALUES ('56', '知音真实故事', 'zsgszx118', '知音真实故事', '北京市', '北京市市辖区', '东城区', '文化', '0', '21000.00', '13500.00', '0.00', '0', '曹', '', '1', '1572955917', '0');
INSERT INTO `tp_wx_chat` VALUES ('57', '颗粒一号', 'kelixxx', '颗粒一号', '', '', '', '数码', '0', '5000.00', '0.00', '0.00', '0', '曹', '', '1', '1572956042', '0');
INSERT INTO `tp_wx_chat` VALUES ('58', '正能量', 'znl116', '正能量商务', '', '', '', '文摘', '0', '14000.00', '6500.00', '0.00', '0', '曹', '', '1', '1572956367', '0');
INSERT INTO `tp_wx_chat` VALUES ('59', '科学家庭育儿', 'kexueyuer2012', '科学家庭育儿', '', '', '', '教育', '0', '297500.00', '0.00', '0.00', '0', '曹', '', '1', '1572956898', '0');
INSERT INTO `tp_wx_chat` VALUES ('60', '我们心里都有病', 'staynormal', '我们心里都有病', '', '', '', '情感', '0', '33300.00', '13500.00', '0.00', '0', '曹', '', '1', '1572957013', '0');
INSERT INTO `tp_wx_chat` VALUES ('61', '爱蹦迪的小圣', 'Rave_XS', '爱蹦迪的小圣', '北京市', '北京市市辖区', '东城区', '', '0', '40000.00', '15000.00', '0.00', '0', '曹', '', '1', '1572957126', '0');
INSERT INTO `tp_wx_chat` VALUES ('62', '读书无界', 'idushu1984', '读书无界', '', '', '', '情感', '0', '6000.00', '0.00', '0.00', '0', '曹', '', '1', '1572957181', '0');
INSERT INTO `tp_wx_chat` VALUES ('63', 'Momself', 'momself', 'Momself', '', '', '', '', '0', '54000.00', '18900.00', '0.00', '0', '曹', '', '1', '1572957344', '0');
INSERT INTO `tp_wx_chat` VALUES ('64', '流沙推文', 'lstuiwen', '流沙推文', '', '', '', '文化', '0', '800.00', '0.00', '0.00', '0', '曹', '', '1', '1572957397', '0');
INSERT INTO `tp_wx_chat` VALUES ('65', '苏希西', 'bysunxixi', '苏希西', '', '', '', '情感', '0', '21000.00', '13000.00', '0.00', '0', '曹', '', '1', '1572957497', '0');
INSERT INTO `tp_wx_chat` VALUES ('66', '兑诚法律人', 'falvren888', '兑诚法律人', '', '', '', '资讯', '0', '9000.00', '0.00', '0.00', '0', '曹', '', '1', '1572957584', '0');
INSERT INTO `tp_wx_chat` VALUES ('67', 'TechTeam挞', '', 'TechTeam挞', '', '', '', '科技', '0', '1500.00', '0.00', '0.00', '0', '曹', '', '1', '1572957643', '0');
INSERT INTO `tp_wx_chat` VALUES ('68', '鸭鸭科技', 'zuiheiapp', '鸭鸭科技', '', '', '', '科技', '0', '3000.00', '0.00', '0.00', '0', '曹', '', '1', '1572957701', '0');
INSERT INTO `tp_wx_chat` VALUES ('69', '朱门大叔', 'ouba878', '朱门大叔', '', '', '', '情感', '0', '120000.00', '60000.00', '50000.00', '0', '曹', '', '1', '1572957745', '0');
INSERT INTO `tp_wx_chat` VALUES ('70', '水兄日志', 'tataaixuanxuan', '水兄日志', '', '', '', '情感', '0', '2700.00', '0.00', '0.00', '0', '曹', '', '1', '1572957926', '0');
INSERT INTO `tp_wx_chat` VALUES ('71', '龙门', 'Longmen518', '龙门', '', '', '', '财经', '0', '6500.00', '0.00', '0.00', '0', '曹', '', '1', '1572958057', '0');
INSERT INTO `tp_wx_chat` VALUES ('72', '知否大叔', 'zhifouds', '知否大叔', '', '', '', '科技', '0', '1920.00', '800.00', '0.00', '0', '曹', '', '1', '1572958113', '0');
INSERT INTO `tp_wx_chat` VALUES ('73', '科技鱼', 'kejiyuCN', '知否大叔', '', '', '', '科技', '0', '5600.00', '0.00', '0.00', '0', '曹', '', '1', '1572958181', '0');
INSERT INTO `tp_wx_chat` VALUES ('74', '手机熊', 'shoujixiangCN', '知否大叔', '', '', '', '科技', '0', '2040.00', '0.00', '0.00', '0', '曹', '', '1', '1572958241', '0');
INSERT INTO `tp_wx_chat` VALUES ('75', '七彩桌面', 'qicaizhuomian', '知否大叔', '', '', '', '健康', '0', '1600.00', '0.00', '0.00', '0', '曹', '', '1', '1572958294', '0');
INSERT INTO `tp_wx_chat` VALUES ('76', '飞鱼壁纸', 'FYbizhi', '知否大叔', '', '', '', '健康', '0', '800.00', '0.00', '0.00', '0', '曹', '', '1', '1572958351', '0');
INSERT INTO `tp_wx_chat` VALUES ('77', '募格科聘', 'mugekepin', '募格科聘', '', '', '', '招聘', '0', '7000.00', '0.00', '0.00', '0', '曹', '', '1', '1572958413', '0');
INSERT INTO `tp_wx_chat` VALUES ('78', '一零点五', '', '一零点五', '', '', '', '娱乐', '0', '2000.00', '0.00', '0.00', '0', '曹', '', '1', '1572958464', '0');
INSERT INTO `tp_wx_chat` VALUES ('79', '小丫头和老家伙的故事', 'nana2000518', '小丫头和老家伙的故事', '', '', '', '情感', '0', '1300.00', '0.00', '0.00', '0', '曹', '', '1', '1572958508', '0');
INSERT INTO `tp_wx_chat` VALUES ('80', '兼生活', 'R000E0', '兼生活', '', '', '', '招聘', '0', '1900.00', '0.00', '0.00', '0', '曹', '', '1', '1572958547', '0');
INSERT INTO `tp_wx_chat` VALUES ('81', '假装是天堂', 'xtt98668', '新90后', '', '', '', '情感', '0', '9000.00', '6400.00', '0.00', '0', '曹', '', '1', '1572958699', '0');
INSERT INTO `tp_wx_chat` VALUES ('82', '深悦会', 'AISHENYUEHUI', '深悦会', '', '', '', '房产', '0', '12000.00', '6000.00', '0.00', '0', '曹', '', '1', '1572958754', '0');
INSERT INTO `tp_wx_chat` VALUES ('83', '布说天下', 'bushuotianxia', '布说天下', '', '', '', '房产', '0', '12000.00', '0.00', '0.00', '0', '曹', '', '1', '1572958807', '0');
INSERT INTO `tp_wx_chat` VALUES ('84', 'smile大笑笑', '', '笑笑和达叔', '', '', '', '时尚', '0', '500.00', '0.00', '0.00', '0', '曹', '', '1', '1572958972', '0');
INSERT INTO `tp_wx_chat` VALUES ('85', '尸人', 'hishiren', '尸人', '北京市', '北京市市辖区', '东城区', '文摘', '0', '9500.00', '6000.00', '0.00', '0', '曹', '', '1', '1572959049', '0');
INSERT INTO `tp_wx_chat` VALUES ('86', '笑笑和达叔', 'smile201829', '笑笑和达叔', '', '', '', '情感', '0', '900.00', '0.00', '0.00', '0', '曹', '', '1', '1572959090', '0');
INSERT INTO `tp_wx_chat` VALUES ('87', '老尸常谈', 'laoshi2046', '尸人', '', '', '', '资讯', '0', '1400.00', '800.00', '0.00', '0', '曹', '', '1', '1572959188', '0');
INSERT INTO `tp_wx_chat` VALUES ('88', '人生如此狗血', 'gouxuelife', '尸人', '', '', '', '娱乐', '0', '1000.00', '500.00', '0.00', '0', '曹', '', '1', '1572959320', '0');
INSERT INTO `tp_wx_chat` VALUES ('89', '母婴高参', 'mygaocan', '母婴高参', '', '', '', '教育', '0', '4200.00', '0.00', '0.00', '0', '曹', '', '1', '1572959384', '0');
INSERT INTO `tp_wx_chat` VALUES ('90', '育儿心理', 'iyuerxinli', '育儿心理', '', '', '', '教育', '0', '7300.00', '0.00', '0.00', '0', '曹', '', '1', '1572959429', '0');
INSERT INTO `tp_wx_chat` VALUES ('91', '科技早发车', 'kejizaofache', '科技早发车', '', '', '', '科技', '0', '20000.00', '0.00', '0.00', '0', '曹', '', '1', '1572959508', '0');
INSERT INTO `tp_wx_chat` VALUES ('92', '告白故事', 'gbgs521', '告白故事', '北京市', '北京市市辖区', '东城区', '情感', '0', '10800.00', '5850.00', '0.00', '0', '曹', '', '1', '1572959566', '0');
INSERT INTO `tp_wx_chat` VALUES ('93', '深闺读物', 'sgdw58', '告白故事', '', '', '', '情感', '0', '4050.00', '0.00', '0.00', '0', '曹', '', '1', '1572959671', '0');
INSERT INTO `tp_wx_chat` VALUES ('94', '下班看', 'duwu189', '告白故事', '', '', '', '情感', '0', '2250.00', '0.00', '0.00', '0', '曹', '', '1', '1572959726', '0');
INSERT INTO `tp_wx_chat` VALUES ('95', '最二货', 'emmm38', '告白故事', '', '', '', '娱乐', '0', '6300.00', '0.00', '0.00', '0', '曹', '', '1', '1572959774', '0');
INSERT INTO `tp_wx_chat` VALUES ('96', '何手巫', 'wuyag55', '告白故事', '', '', '', '情感', '0', '5400.00', '0.00', '0.00', '0', '曹', '', '2', '1572959828', '0');
INSERT INTO `tp_wx_chat` VALUES ('97', '诡吓', 'gx5662', '告白故事', '', '', '', '资讯', '0', '6300.00', '0.00', '0.00', '0', '曹', '', '1', '1572959873', '0');
INSERT INTO `tp_wx_chat` VALUES ('98', '情商夜读', 'ieq365', '情商夜读', '', '', '', '情感', '0', '28000.00', '15000.00', '8000.00', '0', '曹', '', '1', '1572959957', '0');
INSERT INTO `tp_wx_chat` VALUES ('99', '铅笔头情商', '铅笔头情商', '情商夜读', '', '', '', '教育', '0', '13000.00', '6000.00', '2000.00', '0', '曹', '', '1', '1572960016', '0');
INSERT INTO `tp_wx_chat` VALUES ('100', '伴读书房', 'bandu2028', '伴读书房', '', '', '', '情感', '0', '0.00', '12000.00', '0.00', '0', '曹', '', '1', '1572960219', '0');
INSERT INTO `tp_wx_chat` VALUES ('101', '奥数网', 'aoshu_2003', '奥数网', '', '', '', '教育', '0', '23750.00', '19000.00', '14250.00', '0', '曹', '', '1', '1572960301', '0');
INSERT INTO `tp_wx_chat` VALUES ('102', '中考网', 'zhongkao_com', '奥数网', '北京市', '北京市市辖区', '东城区', '教育', '0', '28500.00', '23750.00', '19000.00', '0', '曹', '', '1', '1572960343', '0');
INSERT INTO `tp_wx_chat` VALUES ('103', '高考网', 'www_gaokao_com', '奥数网', '', '', '', '教育', '0', '23750.00', '19000.00', '14250.00', '0', '曹', '', '1', '1572960415', '0');
INSERT INTO `tp_wx_chat` VALUES ('104', '作文网', 'www_zuowen_com', '奥数网', '', '', '', '教育', '0', '14250.00', '9500.00', '7600.00', '0', '曹', '', '1', '1572960469', '0');
INSERT INTO `tp_wx_chat` VALUES ('105', '家长帮', 'eduujzb', '奥数网', '', '', '', '教育', '0', '5700.00', '28500.00', '20900.00', '0', '曹', '', '1', '1572960561', '0');
INSERT INTO `tp_wx_chat` VALUES ('106', '育儿百科', 'yuerbaike8', '育儿百科', '', '', '', '教育', '0', '4050.00', '2250.00', '0.00', '0', '曹', '', '1', '1572960648', '0');
INSERT INTO `tp_wx_chat` VALUES ('107', '哆哆育儿', 'dodoyuer', '育儿百科', '北京市', '北京市市辖区', '东城区', '情感', '0', '4050.00', '2700.00', '0.00', '0', '曹', '', '1', '1572960757', '0');
INSERT INTO `tp_wx_chat` VALUES ('108', '糖朵妈妈', 'tangduomm', '育儿百科', '', '', '', '', '0', '3420.00', '2250.00', '0.00', '0', '曹', '', '1', '1572960832', '0');
INSERT INTO `tp_wx_chat` VALUES ('109', '花瓣志', 'iihuacao', '花瓣志', '', '', '', '娱乐', '0', '20000.00', '0.00', '0.00', '0', '曹', '', '1', '1573007548', '0');
INSERT INTO `tp_wx_chat` VALUES ('110', 'SHOW范儿', 'ishowfaner', 'SHOW范儿', '', '', '', '情感', '0', '17000.00', '9700.00', '0.00', '0', '曹', '', '1', '1573008864', '0');
INSERT INTO `tp_wx_chat` VALUES ('111', '源姨', 'youyabenleida', 'Herm商务', '', '', '', '情感', '0', '9750.00', '0.00', '0.00', '0', '曹', '', '1', '1573009116', '0');
INSERT INTO `tp_wx_chat` VALUES ('112', '老李校长', 'w9148500', 'Herm商务', '', '', '', '职场', '0', '19500.00', '0.00', '0.00', '0', '曹', '', '1', '1573009221', '0');
INSERT INTO `tp_wx_chat` VALUES ('113', '老秘书', 'laoms6', 'Herm商务', '', '', '', '职场', '0', '7800.00', '0.00', '0.00', '0', '曹', '', '1', '1573009269', '0');
INSERT INTO `tp_wx_chat` VALUES ('114', 'Herm', 'hermfy', 'Herm商务', '', '', '', '其他', '0', '7800.00', '0.00', '0.00', '0', '曹', '', '1', '1573009403', '0');
INSERT INTO `tp_wx_chat` VALUES ('115', '爱折腾的壹休', 'zhichang365', '爱折腾的壹休', '', '', '', '职场管理', '0', '25200.00', '16200.00', '9900.00', '0', '曹', '', '1', '1573040073', '0');
INSERT INTO `tp_wx_chat` VALUES ('116', '告白鸭', 'tghw666', '告白鸭', '', '', '', '文化', '0', '2975.00', '0.00', '0.00', '0', '曹', '', '1', '1573040412', '0');
INSERT INTO `tp_wx_chat` VALUES ('117', '壁纸兔', 'bizhitu88', '告白鸭', '', '', '', '情感', '0', '2975.00', '0.00', '0.00', '0', '曹', '', '1', '1573040512', '0');
INSERT INTO `tp_wx_chat` VALUES ('118', '选书先生', 'xs-sir', '告白鸭', '', '', '', '情感', '0', '3060.00', '0.00', '0.00', '0', '曹', '', '1', '1573040954', '0');
INSERT INTO `tp_wx_chat` VALUES ('119', '表情兔', 'biaoqingtu6', '告白鸭', '', '', '', '情感', '0', '2550.00', '0.00', '0.00', '0', '曹', '', '1', '1573041220', '0');
INSERT INTO `tp_wx_chat` VALUES ('120', '遇见小雅', 'ixiaoya520', '寒江大叔', '', '', '', '情感', '0', '12000.00', '0.00', '0.00', '0', '曹', '', '1', '1573041575', '0');
