<?php

namespace WPEssential\Theme;

if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

final class MenuWalker extends \Walker_Nav_Menu
{

	/**
	 * Starts the element output.
	 *
	 * @param string    $output            Used to append additional content (passed by reference).
	 * @param \WP_Post  $data_object       Menu item data object.
	 * @param int       $depth             Depth of menu item. Used for padding.
	 * @param \stdClass $args              An object of wp_nav_menu() arguments.
	 * @param int       $current_object_id Optional. ID of the current menu item. Default 0.
	 *
	 * @since       3.0.0
	 * @since       4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 * @since       5.9.0 Renamed `$item` to `$data_object` and `$id` to `$current_object_id`
	 *              to match parent class for PHP 8 named parameter support.
	 * @since       6.7.0 Removed redundant title attributes.
	 *
	 * @see         Walker::start_el()
	 *
	 */
	public function start_el ( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 )
	{
		// Restores the more descriptive, specific name for use within this method.
		$menu_item = $data_object;

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing )
		{
			$t = '';
		}
		else
		{
			$t = "\t";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $menu_item->classes ) ? [] : (array) $menu_item->classes;
		$classes[] = 'menu-item-' . $menu_item->ID;

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param \WP_Post $menu_item Menu item data object.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 *
		 * @since 4.4.0
		 *
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $menu_item, $depth );

		/**
		 * Filters the CSS classes applied to a menu item's list item element.
		 *
		 * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
		 * @param \WP_Post $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 */
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $menu_item, $args, $depth ) );

		/**
		 * Filters the ID attribute applied to a menu item's list item element.
		 *
		 * @param string   $menu_item_id The ID attribute applied to the menu item's `<li>` element.
		 * @param \WP_Post $menu_item    The current menu item.
		 * @param stdClass $args         An object of wp_nav_menu() arguments.
		 * @param int      $depth        Depth of menu item. Used for padding.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth );

		$li_atts            = [];
		$li_atts[ 'id' ]    = ! empty( $id ) ? $id : '';
		$li_atts[ 'class' ] = ! empty( $class_names ) ? $class_names : '';
		$li_atts[ 'class' ] .= ' wpe-fs-px-14 wpe-fw-medium wpe-position-rel';

		/**
		 * Filters the HTML attributes applied to a menu's list item element.
		 *
		 * @param array    $li_atts   {
		 *                            The HTML attributes applied to the menu item's `<li>` element, empty strings are ignored.
		 *
		 * @type string    $class     HTML CSS class attribute.
		 * @type string    $id        HTML id attribute.
		 *                            }
		 *
		 * @param \WP_Post $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 *
		 * @since 6.3.0
		 *
		 */
		$li_atts       = apply_filters( 'nav_menu_item_attributes', $li_atts, $menu_item, $args, $depth );
		$li_attributes = $this->build_atts( $li_atts );

		$output .= $indent . '<li' . $li_attributes . '>';

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );

		// Save filtered value before filtering again.
		$the_title_filtered = $title;

		/**
		 * Filters a menu item's title.
		 *
		 * @param string   $title     The menu item's title.
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 *
		 * @since 4.4.0
		 *
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );

		$atts             = [];
		$atts[ 'target' ] = ! empty( $menu_item->target ) ? $menu_item->target : '';
		$atts[ 'rel' ]    = ! empty( $menu_item->xfn ) ? $menu_item->xfn : '';

		if ( ! empty( $menu_item->url ) )
		{
			if ( get_privacy_policy_url() === $menu_item->url )
			{
				$atts[ 'rel' ] = empty( $atts[ 'rel' ] ) ? 'privacy-policy' : $atts[ 'rel' ] . ' privacy-policy';
			}

			$atts[ 'href' ] = $menu_item->url;
		}
		else
		{
			$atts[ 'href' ] = '';
		}

		$atts[ 'aria-current' ] = $menu_item->current ? 'page' : '';

		// Add title attribute only if it does not match the link text (before or after filtering).
		if ( ! empty( $menu_item->attr_title )
			&& trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $menu_item->title ) )
			&& trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $the_title_filtered ) )
			&& trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $title ) )
		)
		{
			$atts[ 'title' ] = $menu_item->attr_title;
		}
		else
		{
			$atts[ 'title' ] = '';
		}

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @param array    $atts      {
		 *                            The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 * @type string    $title     Title attribute.
		 * @type string    $target    Target attribute.
		 * @type string    $rel       The rel attribute.
		 * @type string    $href      The href attribute.
		 * @type string    $aria      -current The aria-current attribute.
		 *                            }
		 *
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 */
		$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );
		$attributes = $this->build_atts( $atts );

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $menu_item   Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 *
		 * @since 3.0.0
		 *
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
	}
}
