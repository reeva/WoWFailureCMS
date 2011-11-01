/*Table structure for table `logs` */

CREATE TABLE `logs` (                                     
          `id` int(10) unsigned NOT NULL auto_increment,          
          `code` int(11) default NULL,                            
          `date` datetime default NULL,                           
          `txn_id` varchar(32) default NULL,                      
          `payer_email` varchar(64) default NULL,                 
          `amount` float default NULL,                            
          `info` blob,                                            
          PRIMARY KEY  (`id`)                                     
        ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

		/*Table structure for table `rewards` */
		
CREATE TABLE `rewards` (                                 
           `id` int(10) unsigned NOT NULL auto_increment,         
           `server` int(10) unsigned NOT NULL,                    
           `name` varchar(32) NOT NULL,                           
           `item1` int(10) unsigned NOT NULL,                     
           `item2` int(10) unsigned NOT NULL,                     
           `item3` int(10) unsigned NOT NULL,                     
           `item4` int(10) unsigned NOT NULL,                     
           `item5` int(10) unsigned NOT NULL,                     
           `item6` int(10) unsigned NOT NULL,                     
           `item7` int(10) unsigned NOT NULL,                     
           `item8` int(10) unsigned NOT NULL,                     
           `gold` int(10) unsigned NOT NULL,                      
           `price` float unsigned NOT NULL,                       
           PRIMARY KEY  (`id`)                                    
         ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

		 /*Table structure for table `servers` */
		 
CREATE TABLE `servers` (                                 
           `id` int(10) unsigned NOT NULL auto_increment,         
           `name` varchar(32) NOT NULL,                           
           `host` varchar(32) NOT NULL,                           
           `username` varchar(32) NOT NULL,                       
           `password` varchar(32) NOT NULL,                       
           `database` varchar(32) NOT NULL,                       
           PRIMARY KEY  (`id`)                                    
         ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;