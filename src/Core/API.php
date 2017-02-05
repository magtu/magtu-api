<?php

namespace LArtie\MagtuAPI\Core;

/**
 * Class API
 * @package LArtie\Magtu\Core
 */
class API
{
    private $magtuAPI = 'http://магту.рф/api/v1/';

    /**
     * Magtu constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $group
     * @return mixed
     */
    public function getSchedule($group)
    {
        $url = $this->generateUrl("groups/{$group}/schedule");

        return $this->execute($url);
    }

    /**
     * @param string $filter
     * @return mixed
     */
    public function getGroups($filter = '')
    {
        $args = [
            'q' => $filter,
        ];

        $url = $this->generateUrl('groups', $args);

        return $this->execute($url);
    }

    /**
     * @param $command
     * @param $args
     * @return string
     */
    private function generateUrl($command, $args = [])
    {
        $args = empty($args) ? '' :  "?" . http_build_query($args);
        return $this->magtuAPI . $command . $args;
    }

    /**
     * @param $url
     * @return mixed
     */
    private function execute($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);
        return $this->prepareData($output);
    }

    /**
     * @param $output
     * @return string
     */
    private function prepareData($output)
    {
        return \GuzzleHttp\json_decode($output);
    }
}