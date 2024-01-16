<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $style = config_item('style') ? config_item('style') : 'tourism'; ?>
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/".$style.".css"); ?>">

<?php $widget = config_item('widget') ? config_item('widget') : 'w_slide'; ?>
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/".$widget.".css"); ?>">

<link href="<?= base_url("$this->theme_folder/$this->theme/assets/css/tourism.css"); ?>" rel="stylesheet alternate" title="tourism"/>
<link href="<?= base_url("$this->theme_folder/$this->theme/assets/css/gogreen.css"); ?>" rel="stylesheet alternate" title="gogreen"/>
<link href="<?= base_url("$this->theme_folder/$this->theme/assets/css/classic.css"); ?>" rel="stylesheet alternate" title="classic"/>

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61dcd6121c86b400120dae34&product=sop' async='async'></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61dcd6205c97350012899f5a&product=sop' async='async'></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=607468564d5573001844ff59&product=inline-reaction-buttons" async="async"></script>
