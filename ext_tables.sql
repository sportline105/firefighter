#
# Table structure for table 'tx_firefighter_car'
#
CREATE TABLE tx_firefighter_domain_model_car (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    title varchar(255) DEFAULT '' NOT NULL,
    link varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
    starttime int(11) unsigned DEFAULT '0' NOT NULL,
    endtime int(11) unsigned DEFAULT '0' NOT NULL,

    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumblob,

    PRIMARY KEY (uid),
    KEY parent (pid)
);

#
# Table structure for table 'tx_firefighter_type'
#
CREATE TABLE tx_firefighter_domain_model_type (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    title varchar(255) DEFAULT '' NOT NULL,
    link varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
    starttime int(11) unsigned DEFAULT '0' NOT NULL,
    endtime int(11) unsigned DEFAULT '0' NOT NULL,

    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumblob,

    PRIMARY KEY (uid),
    KEY parent (pid)
);

#
# Table structure for table 'tx_firefighter_einsatz'
#

CREATE TABLE tx_firefighter_domain_model_einsatz (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    location varchar(255) DEFAULT '' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    description text NOT NULL,
    short_description varchar(255) DEFAULT '' NOT NULL,
    cars int(11) DEFAULT '0' NOT NULL,
    car int(11) DEFAULT '0' NOT NULL,
    type int(11) DEFAULT '0' NOT NULL,
    datefrom datetime DEFAULT NULL,
    dateto datetime DEFAULT NULL,
    
    stations text NOT NULL,
    geo_coords varchar(255) DEFAULT '' NOT NULL,
    number varchar(255) DEFAULT '' NOT NULL,
    mens int(11) DEFAULT '0' NOT NULL,
    
    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
    starttime int(11) unsigned DEFAULT '0' NOT NULL,
    endtime int(11) unsigned DEFAULT '0' NOT NULL,

    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumblob,

    PRIMARY KEY (uid),
    KEY parent (pid)
);

##Tabelle tx_firefighter_einsatz_cars_mm existiert nicht, Tabelle tx_firefighter_car anlegen
CREATE TABLE tx_firefighter_einsatz_cars_mm (
    uid_local int(11) DEFAULT '0' NOT NULL,
    uid_foreign int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);