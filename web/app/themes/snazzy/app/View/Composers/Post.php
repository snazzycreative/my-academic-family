<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
        'single',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        $post = get_post();

        $cardClasses = App\bgClasses(['colour'   =>'white']);
        $cardClasses[] = 'grid-post';

        $postType = get_post_type();
        $postTypeObj = get_post_type_object($postType);

        $id = get_the_ID();

        $tax = App\post_taxonomy($postType);
        $termID = get_post_meta($id, '_primary_term_' . $tax, true);
        $termIcon = get_field('fontawesome_solid', $tax . '_' . $termID);
        $termObject = get_term_by('id', $termID, $tax);
        $termLink = get_term_link((int)$termID);

        $postTerms = wp_get_post_terms($id, $tax, [
            'exclude' => $termID,
        ]);

        $tags = wp_get_post_terms($id, 'post_tag');

        $userProfile = get_field('snazzy_team_user', 'user_' . $post->post_author);

        $schedule = ($postType == 'event') ? $this->schedule_datetime($id) : ['date' => null];

        return [
            'title' => $this->title(),
            'card_classes' => $cardClasses,
            'image' => get_post_thumbnail_id(),
            'schedule' => $schedule,
            'singular' => @$postTypeObj->labels->singular_name,
            'profile' => $userProfile,
            'tags' => $tags,
            'terms' => $postTerms,
            'term' => [
                'id' => $termID,
                'icon' => $termIcon,
                'name' => @$termObject->name,
                'slug' => @$termObject->slug,
                'url' => $termLink,
                'taxonomy' => $tax,
            ],
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'sage');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

    public function schedule_datetime($id = null)
    {
        if(is_null($id)) $id = get_the_ID();

        $dateFormat = get_option('date_format');
        $timeFormat = get_option('time_format');
        $day = DAY_IN_SECONDS;

        $start = get_field('snazzy_timestamp_start', $id);
        $end = get_field('snazzy_timestamp_end', $id);
        $date = null;
        $epoch = null;
        $startTime = null;
        $time = null;

        if($end):
          $endEpoch = strtotime($end);
          $endDate = wp_date($dateFormat, $endEpoch);
          $date = $endDate;
          $epoch = $endEpoch;
        endif;

        if($start):
          $startEpoch = strtotime($start);
          $startDate = wp_date($dateFormat, $startEpoch);
          $date = $startDate;
          $epoch = $startEpoch;
          $time = wp_date($timeFormat, $epoch);
        endif;

        if($start && $end && ($start < $end)):
          $time .= (($endEpoch - $startEpoch) < $day) ?  ' - ' . wp_date($timeFormat, $endEpoch) : null;
        endif;

        return [
            'date' => $date,
            'time' => $time,
            'epoch' => $epoch,
        ];
    }
}
