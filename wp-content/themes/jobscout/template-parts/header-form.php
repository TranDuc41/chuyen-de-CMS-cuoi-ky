<?php

/**
 *
 * Creating a custom job search form for homepage
 * The [jobs] shortcode is will use search_location and search_keywords variables from the query string.
 *
 * @link https://wpjobmanager.com/document/tutorial-creating-custom-job-search-form/
 *
 * @package JobScout
 */
$find_a_job_link = get_option('job_manager_jobs_page_id', 0);
$post_slug       = get_post_field('post_name', $find_a_job_link);
$ed_job_category = get_option('job_manager_enable_categories');

if ($post_slug) {
  $action_page =  home_url('/' . $post_slug);
} else {
  $action_page =  home_url('/');
}
?>

<div class="job_listings">

  <form class="jobscout_job_filters" method="GET" action="<?php echo esc_url($action_page) ?>">
    <div class="search_jobs">

      <div class="search_keywords">
        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
        <label for="search_keywords"><?php esc_html_e('Keywords', 'jobscout'); ?></label>
        <input type="text" id="search_keywords" name="search_keywords" placeholder="<?php esc_attr_e('Search for jobs, companies, skills', 'jobscout'); ?>">

      </div>

      <div class="search_location">
        <?php
        global $wpdb;
        $table  = $wpdb->prefix . 'postmeta';
        $sql = "SELECT DISTINCT SUBSTRING_INDEX(`meta_value`,',',-1) as location FROM `wp_postmeta` WHERE `meta_key` like '%location%' ORDER BY location";
        $data = $wpdb->get_results($wpdb->prepare($sql));
        ?>
        <span class="location-icon"><svg width="20px" height="20px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">

            <title>location</title>
            <desc>Created with Sketch Beta.</desc>
            <defs>

            </defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
              <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-104.000000, -411.000000)" fill="#000000">
                <path d="M116,426 C114.343,426 113,424.657 113,423 C113,421.343 114.343,420 116,420 C117.657,420 119,421.343 119,423 C119,424.657 117.657,426 116,426 L116,426 Z M116,418 C113.239,418 111,420.238 111,423 C111,425.762 113.239,428 116,428 C118.761,428 121,425.762 121,423 C121,420.238 118.761,418 116,418 L116,418 Z M116,440 C114.337,440.009 106,427.181 106,423 C106,417.478 110.477,413 116,413 C121.523,413 126,417.478 126,423 C126,427.125 117.637,440.009 116,440 L116,440 Z M116,411 C109.373,411 104,416.373 104,423 C104,428.018 114.005,443.011 116,443 C117.964,443.011 128,427.95 128,423 C128,416.373 122.627,411 116,411 L116,411 Z" id="location" sketch:type="MSShapeGroup">

                </path>
              </g>
            </g>
          </svg></span>
        <select id="search_location" name="search_location" value="Khu vực">

          <option value=""> Khu vực</option>
          <?php foreach ($data as $value) : ?>
            <option value="<?php echo $value->location; ?>"><?php echo $value->location; ?></option>
          <?php endforeach ?>
        </select>

      </div>

      <?php if ($ed_job_category) { ?>
        <div class="search_categories custom_search_categories">
          <label for="search_category"><?php esc_html_e('Job Category', 'jobscout'); ?></label>
          <select id="search_category" class="robo-search-category" name="search_category">
            <option value=""><?php _e('Select Job Category', 'jobscout'); ?></option>
            <?php foreach (get_job_listing_categories() as $jobcat) : ?>
              <option value="<?php echo esc_attr($jobcat->term_id); ?>"><?php echo esc_html($jobcat->name); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php } ?>

      <div class="search_submit">
        <button type="submit" value="<?php esc_attr_e('Search', 'jobscout'); ?>">SEARCH JOB</button>
      </div>

    </div>
  </form>

</div>