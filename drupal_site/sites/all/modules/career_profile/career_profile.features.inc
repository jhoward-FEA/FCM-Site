<?php
/**
 * @file
 * career_profile.features.inc
 */

/**
 * Implements hook_node_info().
 */
function career_profile_node_info() {
  $items = array(
    'career_profile' => array(
      'name' => t('Career Profile'),
      'base' => 'node_content',
      'description' => t('A career profile, tied to a particular swimlane.'),
      'has_title' => '1',
      'title_label' => t('Career Overview Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
