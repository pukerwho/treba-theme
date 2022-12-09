<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      // Field::make( 'text', 'crb_post_timetoread', 'Time to read'),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'company' )
    ->add_fields( array(
      Field::make( 'text', 'crb_company_subtitle', 'Subtitle' ),
      Field::make( 'text', 'crb_company_city', 'City' ),
      Field::make( 'text', 'crb_company_country', 'Country' ),
      Field::make( 'text', 'crb_company_address', 'Address' ),
      Field::make( 'text', 'crb_company_phone', 'Phone' ),
      Field::make( 'text', 'crb_company_website', 'Website' ),
      Field::make( 'text', 'crb_company_min_proj_size', 'Min project size' ),
      Field::make( 'text', 'crb_company_hortly_rate', 'Avg. hortly rate' ),
      Field::make( 'text', 'crb_company_employees', 'Employees' ),
      Field::make( 'text', 'crb_company_founded', 'Founded' ),
      Field::make( 'text', 'crb_company_social', 'Social' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'cases' )
    ->add_fields( array(
      Field::make( 'text', 'crb_case_category', 'Category'),
      Field::make( 'textarea', 'crb_case_description', 'Description'),
  ) );
}

?>