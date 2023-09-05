<?php
/**
 * @file
 * career_map_content_types.features.inc
 */

/**
 * Implements hook_node_info().
 */
function career_map_content_types_node_info() {
  $items = array(
    'career_path' => array(
      'name' => t('Career Path'),
      'base' => 'node_content',
      'description' => t('A bridge between two job points. '),
      'has_title' => '1',
      'title_label' => t('Path Name'),
      'help' => '',
    ),
    'certification' => array(
      'name' => t('Certification'),
      'base' => 'node_content',
      'description' => t('Describes a professional certification.'),
      'has_title' => '1',
      'title_label' => t('Certification Name'),
      'help' => '',
    ),
    'job_point' => array(
      'name' => t('Job Point'),
      'base' => 'node_content',
      'description' => t('Job Point is information about a single job found within the mapping tool. This job may lead to other job points, or come from other job points. '),
      'has_title' => '1',
      'title_label' => t('Job Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
