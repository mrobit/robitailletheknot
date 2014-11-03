<?php namespace Knot\Presenters;

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
                'created' => $image['caption']['created_time'],
                'caption' => $image['caption']['text'],
                'url'     => $image['images']['standard_resolution']['url'],
            ];

            // Typecasting to an object for funsies.
            $data[$key] = (object) $data[$key];
        }

        return $data;
    }
}