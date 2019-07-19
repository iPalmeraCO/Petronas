<?php
if (in_category(3)) {
include(TEMPLATEPATH . '/single-1.php');
} elseif (in_category(9)) {
include(TEMPLATEPATH . '/single-2.php');
} else {
include(TEMPLATEPATH . '/single-1.php');
}