<?php
namespace Seloger;

class Request
{
    private $params = [];

    const URL_API = 'http://ws.seloger.com';
    const USERAGENT = 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36';

    /**
     * Make request to SeLoger.com api
     * @return SimpleXMLElement
     */
    public function run()
    {
        // Prepare Url
        $query = http_build_query($this->params);
        $url = self::URL_API . '/' . $this->type . '.xml?' . $query;

        $curl = curl_init();

        // Prepare options
        $options = [
            CURLOPT_URL            => $url,
            CURLOPT_USERAGENT      => self::USERAGENT,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 5,
            CURLOPT_RETURNTRANSFER => true
        ];
        curl_setopt_array($curl, $options);

        // exec
        $response = curl_exec($curl);
        $headers = curl_getinfo($curl);

        if(curl_errno($curl))
            throw new \Exception('[SELOGER] ' . curl_error($curl));

        // Throw when not OK
        if ($headers['http_code'] !== 200)
            throw new \Exception("[SELOGER] failed to request " . $url . ". returning " . $headers['http_code']);

        curl_close($curl);

        // Get xml return stdClass
        $xml = new \SimpleXMLElement($response);
        $json = json_encode($xml);
        return json_decode($json);
    }

    /**
     * Set ulr params
     * @param string $name
     * @param string $value
     */
    public function setParams($name, $value, $append = false)
    {
        $this->params[$name] = $value;
    }

    /**
     * Reset url params
     */
    public function resetParams()
    {
        $this->params = [];
    }
}
