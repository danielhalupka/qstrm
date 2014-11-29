    <?php
     
    $installer = $this;
     
    $installer->startSetup();
     
    $installer->run("
     
    -- DROP TABLE IF EXISTS {$this->getTable('youtubeitem')};
    CREATE TABLE {$this->getTable('youtubeitem')} (
      `youtubeitem_id` int(11) unsigned NOT NULL auto_increment,
      `youtube_url` varchar(255) NOT NULL default '',
      `video_title` varchar(255) NOT NULL default '',
      `description` varchar(255) NOT NULL default '',
      `categoryvid_id` int(11) unsigned NOT NULL default 0,
      `status` smallint(6) NOT NULL default '0',
      `created_time` datetime NULL,
      `update_time` datetime NULL,
      PRIMARY KEY (`youtubeitem_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     
        ");
     
    $installer->endSetup();?>