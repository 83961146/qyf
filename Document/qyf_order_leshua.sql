#乐刷交易订单表

# Host: localhost  (Version: 5.5.53)
# Date: 2018-08-28 13:44:06
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "qyf_order_leshua"
#

DROP TABLE IF EXISTS `qyf_order_leshua`;
CREATE TABLE `qyf_order_leshua` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trading_time` char(10) NOT NULL COMMENT '交易时间',
  `brand` varchar(32) NOT NULL COMMENT '品牌',
  `agent` varchar(32) NOT NULL COMMENT '代理商',
  `merchant_no` int(10) unsigned NOT NULL COMMENT '商户号',
  `terminal_no` varchar(32) DEFAULT NULL COMMENT '终端号',
  `terminal_name` varchar(64) NOT NULL COMMENT '商户注册名',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '交易金额',
  `card_type` varchar(32) NOT NULL COMMENT '卡种',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='乐刷交易详情表';

#
# Data for table "qyf_order_leshua"
#

INSERT INTO `qyf_order_leshua` VALUES ('','2018-08-06','乐刷','韦艺超',4294967295,'','南宁市美客帝文汽配店',9677.12,'贷记卡');
