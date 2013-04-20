<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config["anchor_class"] = "class='btn btn-link'";
$config['full_tag_open'] = "<div class='pagination pagination-centered'><ul>";
$config['full_tag_close'] = "</ul></div>";

$config['cur_tag_open'] = "<li class='disabled'><a><strong>";
$config['cur_tag_close'] = "</strong></a></li>";

$config['num_tag_open'] = "<li class='active'>";
$config['num_tag_close'] = "</li>";

$config['prev_link'] = "&lt;";
$config['prev_tag_open'] = $config['num_tag_open'];
$config['prev_tag_close'] = $config['num_tag_close'];

$config['next_link'] = '&gt;';
$config['next_tag_open'] = $config['num_tag_open'];
$config['next_tag_close'] = $config['num_tag_close'];

$config['first_link'] = "&laquo;";
$config['first_tag_open'] = $config['num_tag_open'];
$config['first_tag_close'] = $config['num_tag_close'];

$config['last_link'] = "&raquo;";
$config['last_tag_open'] = $config['num_tag_open'];
$config['last_tag_close'] = $config['num_tag_close'];


