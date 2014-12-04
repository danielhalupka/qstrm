    <?php
     
    $installer = $this;
     
    $installer->startSetup();
     
    $installer->run("
     
    -- DROP TABLE IF EXISTS {$this->getTable('mystream')};
    CREATE TABLE {$this->getTable('mystream')} (
      `mystream_id` int(11) unsigned NOT NULL auto_increment,
      `stream_url` varchar(255) NOT NULL default '',
      `stream_title` varchar(255) NOT NULL default '',
      `customer_id` int(11) unsigned NOT NULL default 0,
      `status` smallint(6) NOT NULL default '0',
      `created_time` datetime NULL,
      `update_time` datetime NULL,
      PRIMARY KEY (`mystream_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     
        ");
     
    $installer->endSetup();?>