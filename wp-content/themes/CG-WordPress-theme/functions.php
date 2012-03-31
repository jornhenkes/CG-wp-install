<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );


function my_show_extra_profile_fields( $user ) { ?>

	<h3>Christengemeenschap aanvullende informatie</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Ik ben staf</label></th>
			<td>
			  <select name="staf_of_camp" id="staf_of_camp" size="1">
			    <?php
           global $post;
           $tmp_post = $post;
           $args = array( 'post_type' => 'kampen', 'numberposts' => 20 );
           $myposts = get_posts( $args );
           foreach( $myposts as $post ) : setup_postdata($post); ?>
           <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
           <?php endforeach; ?>
           <?php $post = $tmp_post; ?>
           <option value="<?php the_ID(); ?>">Ik ben geen staf</option>
           
			  </select>
				<span class="description">Vul aub het kamp in waarvan jij staf bent</span>
			</td>
		</tr>

	</table>
	
	
<?php }



// Custom HTML5 Comment Markup
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <nav>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </nav>
     </article>
    <!-- </li> is added by wordpress automatically -->
<?php
}

automatic_feed_links();

// Widgetized Sidebar HTML5 Markup
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}

function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}

add_theme_support( 'post-thumbnails' );
add_action('init', 'kampen');

function kampen() {
    register_post_type('kampen', array(
        'labels' => array(
            'name' => 'Kampen',
            'singular_name' => 'kampen',
            'add_new' => 'Voeg een kamp toe',
            'edit_item' => 'Bewerk kamp',
            'new_item' => 'Nieuw kamp',
            'view_item' => 'View kamp',
            'search_items' => 'Doorzoek kampen',
            'not_found' => 'Geen kampen gevonden',
            'not_found_in_trash' => 'Geen kampen gevonden in Trash'
        ),
        'public' => true,
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor',
            'custom-fields'
        ),
        'taxonomies' => array(
            'post_tag'
        ),
        'show_in_nav_menus' => true
    ));
    flush_rewrite_rules();
    register_taxonomy( 'leeftijden', 'kampen',
 		array(
             'hierarchical' => true,
 			 'label' => __('Leeftijden'),
 			 'query_var' => 'leeftijden',
 			 'rewrite' => array('slug' => 'leeftijden' )
 		)
 	);    flush_rewrite_rules();
    
}

add_action('init', 'kampen_add_default_boxes');

function kampen_add_default_boxes() {
    register_taxonomy_for_object_type('post_tag', 'kampen');
}

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'frontpage-top-row',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}
if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'frontpage-middle-row',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}
if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'frontpage-bottem-row',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'pagina-sidebar',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}

set_post_thumbnail_size( 140, 90, true );

$whitelist = array('localhost:8888', 'localhost');

if(!in_array($_SERVER['HTTP_HOST'], $whitelist)){
  $site_path = realpath(dirname(__FILE__));
  define ('__SITE_PATH', $site_path);

  define('FPDF_FONTPATH','PEAR/fpdf/font/');
  require 'PEAR/fpdf/fpdf.php';
  class PDF extends FPDF
  {
    public function Footer()
    {
    }
  
    public function CheckPageHeight( $height = null ) 
    {
      $y = $this->GetY();
      $factor = ! is_null( $height ) ? 270 - $height : 260;
      if ( $y > $factor ) $this->AddPage();
    }
  }

  add_action("gform_post_submission_1", "send_pdf", 10, 1);

  function send_pdf ( $entry, $form ) {
    $campChoice = $entry[1];
    $campSecondChoice = $entry[2];
    $choiceOptions = $entry[16];
    $swim = $entry[4];
    $firstName = $entry['5.3'];
    $surName = $entry['5.6'];
    $address = $entry['6.1'];
    $zip = $entry['6.3'];
    $place = $entry['6.5'];
    $country = $entry['6.6'];
    $birth = $entry[7];
    $gender = $entry[8];
    $phone = $entry[11];
    $email = $entry[10];
    $financialAgreement = $entry[12];
  
    /* Winterkamp */
    $workshop = $entry[13];
    $ownMaterial = $entry['14.1'];
    $snowboard = $entry['14.2'];
    $snowboardShoes = $entry['14.3'];
    $skis = $entry['14.4'];
    $skiShoes = $entry['14.5'];
    $helmet = $entry['14.6'];
    $choiceOptionsWinterkamp = $entry[15];
  
    $pdf =& new PDF();
  
    $pdf->AddPage();
    $pdf->SetMargins(20, 25);
    $pdf->SetAutoPageBreak( true, 5 );    
  
    $pdf->SetXY(20, 25);

    $pdf->SetFont('Helvetica','',25);
    $pdf->Write(12, 'Aanmelding');
    $pdf->Ln();
  
    $pdf->SetY(45);

    $pdf->SetFont('Helvetica','',10);
    $pdf->Write(7, 'Eerste keuze: ' . $campChoice );
    $pdf->Ln();
    $pdf->Write(7, 'Tweede keuze: ' . $campSecondChoice );
    $pdf->Ln();
    $pdf->Ln();
    if ( $campChoice == 'Zeilkamp' || $campChoice == 'Zeilzwerfkamp' || $campSecondChoice == 'Zeilkamp' || $campSecondChoice == 'Zeilzwerfkamp' )
    {
      $pdf->Write(7, 'Zwemdiploma: ' . $swim);
      $pdf->Ln();
    }
    if ( $campChoice == 'Winterkamp' || $campSecondChoice == 'Winterkamp' )
    {
      $pdf->Write(7, 'Workshop: ' . $workshop);
      $pdf->Ln();
      $pdf->Ln();
      $pdf->SetFont('Helvetica','B',10);
      $pdf->Write(7, 'Materiaal:');
      $pdf->Ln();
      $pdf->SetFont('Helvetica','',10);
      if ( strlen( $ownMaterial ) > 0 ) 
      {
        $pdf->Write(7, 'Ik neem mijn eigen materiaal mee');
        $pdf->Ln();
      }
      if ( strlen( $snowboard ) > 0 ) 
      {
        $pdf->Write(7, 'Snowboard huren + € 70,-');
        $pdf->Ln();
      }
      if ( strlen( $snowboardShoes ) > 0 ) 
      {
        $pdf->Write(7, 'Snowboardschoenen huren + € 45,-');
        $pdf->Ln();
      }
      if ( strlen( $skis ) > 0 ) 
      {
        $pdf->Write(7, 'Ski\'s huren + € 70,-');
        $pdf->Ln();
      }
      if ( strlen( $skiShoes ) > 0 ) 
      {
        $pdf->Write(7, 'Skischoenen huren + € 45,-');
        $pdf->Ln();
      }
      if ( strlen( $helmet ) > 0 ) 
      {
        $pdf->Write(7, 'Helm huren + € 35,-');
        $pdf->Ln();
      }
      $pdf->Ln();
      $pdf->Write(7, $choiceOptionsWinterkamp);
      $pdf->Ln();
      $pdf->Ln();
    }
    else 
    {
      $pdf->Write(7,$choiceOptions);  
      $pdf->Ln();
      $pdf->Ln();
    }
    $pdf->Write(7,'Voornaam: ' . $firstName);
    $pdf->Ln();
    $pdf->Write(7, 'Achternaam: ' . $surName);
    $pdf->Ln();
    $pdf->Write(7, 'Adres: ' . $address);
    $pdf->Ln();
    $pdf->Write(7, 'Postcode en plaats: ' . $zip . ' ' . $place );
    $pdf->Ln();
    $pdf->Write(7, 'Land: '. $country);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Write(7, 'Geboortedatum: ' . $birth);
    $pdf->Ln();
    $pdf->Write(7, 'Geslacht: ' . $gender);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Write(7, 'Telefoon: ' . $phone);
    $pdf->Ln();
    $pdf->Write(7, 'Email: ' . $email);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Write(7, 'Financiele regeling: ' . $financialAgreement);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Write('8', 'Formulier opsturen naar:');
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Write('8', 'Christengemeenschap Kinder- en Jeugdkampen, Secretariaat, Postbus 269, 3700 AG Zeist');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Write('8', 'Datum:');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Write('8', 'Ondertekening:');

    $fileName = str_replace( 'wwwroot\wp-content\themes\CG-WordPress-theme', 'Forms', __SITE_PATH ) . '/Form-entry-' . $entry['id'] . '.pdf';
    $pdf->Output( $fileName, 'F');
  
    include('PEAR/Mail.php');
    include('PEAR/Mail/mime.php');

    $crlf = "\n";
  
    $mime = new Mail_mime($crlf);
  
    $to  = $email;
    $subject = 'Aanmeldingsformulier';
  
    $body = 'Stuur bijgevoegd bestand ondertekend op naar: Christengemeenschap Kinder- en Jeugdkampen, Secretariaat, Postbus 269, 3700 AG Zeist';
  
    $hdrs = array(
                  'From'    => 'Christengemeenschap Kinder- en Jeugdkampen <info@christengemeenschapkampen.nl>',
                  'Subject' => $subject
                  );
                
    $mime->setTXTBody($body);
    $mime->setHTMLBody($body);
    $mime->addAttachment($fileName, 'application/pdf');
  
    $body = $mime->get();
    $hdrs = $mime->headers($hdrs);
  
    $mail =& Mail::factory('mail');
    $mail->send($to, $hdrs, $body);
  }

}
