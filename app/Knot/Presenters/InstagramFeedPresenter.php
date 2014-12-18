<?php namespace Knot\Presenters;

use Carbon\Carbon;

class InstagramFeedPresenter {

    /**
     * Sets up the data to work in a better format.
     *
     * @param $images
     * @return array
     */
    public static function prepare($images)
    {
        $data = [];

        foreach($images as $key => $image)
        {
            $data[$key] = [
                'type'    => $image['type'],
                'created' => $image['caption']['created_time'],
                'caption' => $image['caption']['text'],
                'url'     => $image['type'] == 'image'
                    ? $image['images']['standard_resolution']['url']
                    : $image['videos']['standard_resolution']['url'],
                'tag'     => static::getItemTag($image),
                'comments'=> static::prepareComments($image['comments'])
            ];

            // Typecasting to an object for funsies.
            $data[$key] = (object) $data[$key];
        }

        return $data;
    }

    /**
     * Set up the comments array.
     *
     * @param array $comments
     * @return array
     */
    private static function prepareComments(array $comments)
    {
        if ( $comments['count'] === 0 ) return false;

        $comments = $comments['data'];

        foreach($comments as $key => $comment) {
            // Format the date using Carbon.
            $date = Carbon::createFromTimestamp($comment['created_time']);

            $data = [];
            $data['date'] = "{$date->month}/{$date->day}/{$date->year}";
            $data['text'] = $comment['text'];
            $data['name'] = $comment['from']['full_name'];
            $data['username'] = $comment['from']['username'];

            $comments[$key] = $data;
        }

        return $comments;
    }

    /**
     * Get the image or video tag depending on the type.
     *
     * @param $image
     * @return string
     */
    private static function getItemTag($image)
    {
        if ($image['type'] == 'image')
        {
            return "<img src=\"{$image['images']['standard_resolution']['url']}\" alt=\"\"/>";
        }

        return "<video src=\"{$image['videos']['standard_resolution']['url']}\"></video>";
    }
}