<?php

/**
 * Plugin Name: Xmedia Elementor Grid
 * Description: Add CSS Grid controls to Elementor
 * Plugin URI: https://xmedia.nl
 * Version: 1.0.0
 * Author: Xmedia
 * Author URI: https://xmedia.nl
 * Text Domain: xmedia-elementor-grid
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Tested up to: 5.7
 */

namespace Xmedia;

class ElementorGrid
{
    public function __construct()
    {
        add_action('elementor/element/before_section_end', [$this, 'elementor_grid_controls'], 10, 3);
    }

    public static function elementor_grid_controls($element, $section_id, $args)
    {

        if ('section_layout' === $section_id || '_section_style' === $section_id) {
            $element->add_control(
                'divider',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $element->add_control(
                'comment',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => __('CSS Grid controls by Xmedia:', 'xmedia-elementor-grid'),
                ]
            );
            $element->add_responsive_control(
                'grid_column',
                [
                    'label' => __('Grid Column', 'xmedia-elementor-grid'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => 'auto',
                    'default' => 'auto',
                    'selectors' => [
                        '{{WRAPPER}}' => 'grid-column: {{VALUE}};',
                    ],
                ]
            );
            $element->add_responsive_control(
                'grid_row',
                [
                    'label' => __('Grid Row', 'xmedia-elementor-grid'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => 'auto',
                    'default' => 'auto',
                    'selectors' => [
                        '{{WRAPPER}}' => 'grid-row: {{VALUE}};',
                    ],
                ]
            );
        }
    }
}
 

new ElementorGrid();