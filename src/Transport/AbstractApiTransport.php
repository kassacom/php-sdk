<?php

namespace KassaCom\SDK\Transport;


use GuzzleHttp\Psr7;
use KassaCom\SDK\Client;
use KassaCom\SDK\Exception\TransportException;
use KassaCom\SDK\Transport\Authorization\AuthorizationInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractApiTransport implements LoggerAwareInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    /**
     * Domain
     *
     * @var string
     */
    protected $apiUrl = 'https://api.kassa.com/v1';

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var AuthorizationInterface
     */
    protected $authorization;

    /**
     * @var string[]
     */
    protected $defaultHeaders;

    /**
     * AbstractApiTransport constructor.
     */
    public function __construct()
    {
        $this->defaultHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => 'Kassa.com PHP SDK v' . Client::VERSION,
            'X-Client-Name' => 'PHP SDK',
            'X-Client-Version' => Client::VERSION,
        ];
    }

    /**
     * @param Psr7\Request $request
     *
     * @return Psr7\Response
     */
    abstract protected function sendRequest(Psr7\Request $request);

    /**
     * @param string $path        Название метода из api
     * @param string $method      GET или POST
     * @param array  $queryParams GET параметры
     * @param mixed  $body
     * @param array  $headers
     *
     * @return Psr7\Response
     * @throws TransportException
     */
    public function send($path, $method, $queryParams = [], $body = null, $headers = [])
    {
        $uri = rtrim($this->apiUrl, '/') . '/' . ltrim($path, '/');

        if (is_array($queryParams) && count($queryParams)) {
            $uri .= '?' . http_build_query($queryParams);
        }

        if (!$this->authorization) {
            throw new TransportException('Please provide authorization data');
        }

        $headers = array_replace($this->defaultHeaders, $headers);

        if ($method == self::METHOD_GET) {
            $body = null;
        }

        if ($this->logger) {
            $this->logger->info('Send request', [
                'method' => $method,
                'uri' => $uri,
                'body' => $body,
                'headers' => $headers,
            ]);
        }

        $headers['Authorization'] = $this->authorization->getAuthorizationHeader();

        $request = new Psr7\Request(
            $method,
            $uri,
            $headers,
            $body
        );

        return $this->sendRequest($request);
    }

    /**
     * @param string $apiUrl
     *
     * @return AbstractApiTransport
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param AuthorizationInterface $authorization
     */
    public function setAuth(AuthorizationInterface $authorization)
    {
        $this->authorization = $authorization;
    }
}
