<?php
/**
 * @package Frontend
 */

/**
 * This class handles the Twitter card functionality.
 */
class WPSEO_Twitter extends WPSEO_Frontend {

	/**
	 * @var array $options Holds the options for the Twitter Card functionality
	 */
	var $options;

	/**
	 * Class constructor
	 */
	public function __construct() {
		$this->options = get_option('wpseo_social');
		
		add_action( 'wpseo_head', array( $this, 'twitter' ) );
	}

	/**
	 * Outputs the Twitter Card code on singular pages.
	 *
	 * @return false Only shows on singular pages, false on non-singular pages.
	 */
	public function twitter() {
		if ( !is_singular() )
			return false;
		
		wp_reset_query();
		
		$this->type();
		$this->site_twitter();
		$this->author_twitter();
		// No need to show these when OpenGraph is also showing, as it'd be the same contents and Twitter
		// would fallback to OpenGraph anyway.
		if ( !isset( $options['opengraph'] ) ||  !$options['opengraph'] ) {
			$this->twitter_title();
			$this->twitter_description();
			$this->twitter_url();
			$this->image();
		}

		do_action('wpseo_twitter');
	}

	/**
	 * Display the Twitter card type.
	 *
	 * This defaults to summary but can be filtered using the <code>wpseo_twitter_card_type</code> filter.
	 */
	public function type() {
		echo '<meta name="twitter:card" content="' . apply_filters('wpseo_twitter_card_type','summary') . '">'."\n";
	}

	/**
	 * Displays the Twitter account for the site.
	 */
	public function site_twitter() {
		if ( isset( $this->options['twitter_site'] ) )
			echo '<meta name="twitter:site" content="@' . trim( $this->options['twitter_site'] ) . '">'."\n";
	}

	/**
	 * Displays the authors Twitter account.
	 */
	public function author_twitter() {
		$twitter = trim( get_the_author_meta( 'twitter' ) );

		if ( $twitter && !empty( $twitter ) )
			echo '<meta name="twitter:creator" content="@' . $twitter . '">'."\n";
	}

	/**
	 * Displays the title for Twitter.
	 *
	 * Only used when OpenGraph is inactive.
	 */
	public function twitter_title() {
		echo '<meta name="twitter:title" content="' . $this->title('') . '">'."\n";
	}

	/**
	 * Displays the description for Twitter.
	 *
	 * Only used when OpenGraph is inactive.
	 */
	public function twitter_description() {
		$metadesc = trim( $this->metadesc( false ) );
		if ( !$metadesc || empty( $metadesc ) )
			$metadesc = strip_tags( get_the_excerpt() );
			
		echo '<meta name="twitter:description" content="' . esc_attr( $metadesc ) . '">'."\n";
	}

	/**
	 * Displays the URL for Twitter.
	 *
	 * Only used when OpenGraph is inactive.
	 */
	public function twitter_url() {
		echo '<meta name="twitter:url" content="' . $this->canonical( false ) . '">'."\n";
	}

	/**
	 * Displays the image for Twitter
	 *
	 * Only used when OpenGraph is inactive.
	 */
	public function image() {
		global $post;
		
		if ( function_exists('has_post_thumbnail') && has_post_thumbnail( $post->ID ) ) {
			$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), apply_filters( 'wpseo_opengraph_image_size', 'medium' ) );
			
			if ( $featured_img ) {
				$img = apply_filters( 'wpseo_opengraph_image', $featured_img[0] );
				echo "<meta name='twitter:image' content='".esc_attr( $img )."'>\n";
			}
		} 
		
	}
}

$wpseo_twitter = new WPSEO_Twitter();