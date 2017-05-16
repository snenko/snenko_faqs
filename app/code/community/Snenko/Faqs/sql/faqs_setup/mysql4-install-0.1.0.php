<?php
$installer = $this;
$installer->startSetup();

$installer->run("
    CREATE TABLE `{$installer->getTable('faqs/faqs')}` (
      `faq_id` int(11) NOT NULL auto_increment,
      `question` varchar(500),
      `answer` text,
      `is_active` int not null,
      PRIMARY KEY  (`faq_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  ");

$installer->endSetup();
$installer->endSetup();
	 