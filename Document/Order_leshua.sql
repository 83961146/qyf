--乐刷订单表创建
DROP TABLE IF EXISTS `order_leshua`;
create TABLE `qyf_order_leshua`(
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`trading_time` char(10) NOT NULL COMMENT '交易时间',
	`brand` varchar(32) NOT NULL COMMENT '品牌',
	`agent` varchar(32) NOT NULL COMMENT '代理商',
	`merchant_no` int(10) UNSIGNED NOT NULL COMMENT '商户号',
	`terminal_no` varchar(32) COMMENT '终端号',
	`terminal_name` varchar(64) NOT NULL COMMENT '商户注册名',
	`amount` decimal(10.2) NOT NULL COMMENT '交易金额',
	`card_type` varchar(32) NOT NULL COMMENT '卡种',
	PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='乐刷交易详情表';