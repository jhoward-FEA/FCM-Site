<?php
/**
 * @file
 * career_map_ed_point.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function career_map_ed_point_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance: 'node-ed_point-body'
  $field_instances['node-ed_point-body'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Put the full education description in the "Ed Description" area. Expand the "Summary" section and enter the "sidebar text" to be used on the Mapping Page Sidebar. If you do not input an explicit summary, the sidebar text will be pulled form the Ed Description text. ',
    'display' => array(
      'default' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'hidden',
        'module' => 'text',
        'settings' => array(
          'trim_length' => 600,
        ),
        'type' => 'text_summary_or_trimmed',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'body',
    'label' => 'Education Description',
    'required' => 1,
    'settings' => array(
      'display_summary' => 1,
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 20,
        'summary_rows' => 5,
      ),
      'type' => 'text_textarea_with_summary',
      'weight' => 1,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_course_work'
  $field_instances['node-ed_point-field_course_work'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Describe the coursework for this educational point. Enter a summary if you\'d like it to appear on the sidebar',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 16,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_course_work',
    'label' => 'Course Work',
    'required' => 0,
    'settings' => array(
      'display_summary' => 1,
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 20,
        'summary_rows' => 5,
      ),
      'type' => 'text_textarea_with_summary',
      'weight' => 5,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_overview_of_degree'
  $field_instances['node-ed_point-field_overview_of_degree'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Give an overview of the degree. Enter a summary if you want it to appear in the mapping tool sidebar. ',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 14,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_overview_of_degree',
    'label' => 'Overview of Degree',
    'required' => 0,
    'settings' => array(
      'display_summary' => 1,
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 20,
        'summary_rows' => 5,
      ),
      'type' => 'text_textarea_with_summary',
      'weight' => 3,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_potential_occupations'
  $field_instances['node-ed_point-field_potential_occupations'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'List any potential occupations that may stem from this educational point. Be sure to enter a summary to appear on the sidebar.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 15,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_potential_occupations',
    'label' => 'Potential Occupations',
    'required' => 0,
    'settings' => array(
      'display_summary' => 1,
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 20,
        'summary_rows' => 5,
      ),
      'type' => 'text_textarea_with_summary',
      'weight' => 4,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_preset_filter'
  $field_instances['node-ed_point-field_preset_filter'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'If this Ed Point is also an "entry point", please select all filter lists it should appear in.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'list',
        'settings' => array(),
        'type' => 'list_default',
        'weight' => 11,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_preset_filter',
    'label' => 'Preset Filter',
    'required' => 0,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(),
      'type' => 'options_buttons',
      'weight' => 7,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_schools'
  $field_instances['node-ed_point-field_schools'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'List any schools offering this type of education. Add a summary if you\'d like it to appear on the mapping tool sidebar.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 17,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_schools',
    'label' => 'Schools',
    'required' => 0,
    'settings' => array(
      'display_summary' => 1,
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 20,
        'summary_rows' => 5,
      ),
      'type' => 'text_textarea_with_summary',
      'weight' => 6,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_swimlane'
  $field_instances['node-ed_point-field_swimlane'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Choose the swimlane the certification appears in',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'number',
        'settings' => array(
          'decimal_separator' => '.',
          'prefix_suffix' => TRUE,
          'scale' => 0,
          'thousand_separator' => ' ',
        ),
        'type' => 'number_integer',
        'weight' => 7,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_swimlane',
    'label' => 'Swimlane',
    'required' => 0,
    'settings' => array(
      'max' => '',
      'min' => '',
      'prefix' => '',
      'suffix' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 0,
      'module' => 'number',
      'settings' => array(),
      'type' => 'number',
      'weight' => 8,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_x_coordinate'
  $field_instances['node-ed_point-field_x_coordinate'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'The X-coordinate of this job on the mapping tool',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'number',
        'settings' => array(
          'decimal_separator' => '.',
          'prefix_suffix' => TRUE,
          'scale' => 0,
          'thousand_separator' => ' ',
        ),
        'type' => 'number_integer',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_x_coordinate',
    'label' => 'X Coordinate',
    'required' => 1,
    'settings' => array(
      'max' => '',
      'min' => '',
      'prefix' => '',
      'suffix' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 0,
      'module' => 'number',
      'settings' => array(),
      'type' => 'number',
      'weight' => 9,
    ),
  );

  // Exported field_instance: 'node-ed_point-field_y_coordinate'
  $field_instances['node-ed_point-field_y_coordinate'] = array(
    'bundle' => 'ed_point',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'The Y-coordinate of this job point on the mapping tool',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'number',
        'settings' => array(
          'decimal_separator' => '.',
          'prefix_suffix' => TRUE,
          'scale' => 0,
          'thousand_separator' => ' ',
        ),
        'type' => 'number_integer',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_y_coordinate',
    'label' => 'Y Coordinate',
    'required' => 1,
    'settings' => array(
      'max' => '',
      'min' => '',
      'prefix' => '',
      'suffix' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 0,
      'module' => 'number',
      'settings' => array(),
      'type' => 'number',
      'weight' => 10,
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Choose the swimlane the certification appears in');
  t('Course Work');
  t('Describe the coursework for this educational point. Enter a summary if you\'d like it to appear on the sidebar');
  t('Education Description');
  t('Give an overview of the degree. Enter a summary if you want it to appear in the mapping tool sidebar. ');
  t('If this Ed Point is also an "entry point", please select all filter lists it should appear in.');
  t('List any potential occupations that may stem from this educational point. Be sure to enter a summary to appear on the sidebar.');
  t('List any schools offering this type of education. Add a summary if you\'d like it to appear on the mapping tool sidebar.');
  t('Overview of Degree');
  t('Potential Occupations');
  t('Preset Filter');
  t('Put the full education description in the "Ed Description" area. Expand the "Summary" section and enter the "sidebar text" to be used on the Mapping Page Sidebar. If you do not input an explicit summary, the sidebar text will be pulled form the Ed Description text. ');
  t('Schools');
  t('Swimlane');
  t('The X-coordinate of this job on the mapping tool');
  t('The Y-coordinate of this job point on the mapping tool');
  t('X Coordinate');
  t('Y Coordinate');

  return $field_instances;
}
