    <?php
     
    $installer = $this;
     
    $installer->startSetup();
     
    $installer->run("
     
    -- DROP TABLE IF EXISTS {$this->getTable('flashgames')};
    CREATE TABLE {$this->getTable('flashgames')} (
      `flashgames_id` int(11) unsigned NOT NULL auto_increment,
      `swf_url` varchar(255) NOT NULL default '',
      `game_title` varchar(255) NOT NULL default '',
      `description` varchar(255) NOT NULL default '',
      `instructions` varchar(255) NOT NULL default '',
      `status` smallint(6) NOT NULL default '0',
      `created_time` datetime NULL,
      `update_time` datetime NULL,
      PRIMARY KEY (`flashgames_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     
        ");
     
    $installer->endSetup();?>