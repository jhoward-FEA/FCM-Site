<?php
/**
 * @file
 * career_map_ed_point.features.inc
 */

/**
 * Implements hook_node_info().
 */
function career_map_ed_point_node_info() {
  $items = array(
    'ed_point' => array(
      'name' => t('Ed Point'),
      'base' => 'node_content',
      'description' => t('Similar to a Job Point, an Ed Point is an education-based starting point. This point may lead to other points, or come from other points. '),
      'has_title' => '1',
      'title_label' => t('Education Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
