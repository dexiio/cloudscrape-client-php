<?php

class CloudScrapeExecutions {

    /**
     * @var CloudScrapeClient
     */
    private $client;

    function __construct(CloudScrapeClient $client) {
        $this->client = $client;
    }

    /**
     * Get execution
     * @param string $executionId
     * @return CloudScrapeExecutionDTO
     */
    public function get($executionId) {
        return $this->client->requestJson("executions/$executionId");
    }

    /**
     * Delete execution permanently
     * @param string $executionId
     * @return boolean
     */
    public function remove($executionId) {
        return $this->client->requestBoolean("executions/$executionId",'DELETE');
    }

    /**
     * Get the entire result of an execution.
     * @param string $executionId
     * @return CloudScrapeResultDTO
     */
    public function getResult($executionId) {
        return $this->client->requestJson("executions/$executionId/result");
    }

    /**
     * Get a file from a result set
     * @param string $executionId
     * @param string $fileId
     * @return CloudScrapeFileDTO
     */
    public function getResultFile($executionId, $fileId) {
        $response = $this->client->request("executions/$executionId/file/$fileId");
        return new CloudScrapeFileDTO($response->headers['content-type'], $response->content);
    }

    /**
     * Stop running execution
     * @param string $executionId
     * @return bool
     */
    public function stop($executionId) {
        return $this->client->requestBoolean("executions/$executionId/stop",'POST');
    }

    /**
     * Resume stopped execution
     * @param string $executionId
     * @return bool
     */
    public function resume($executionId) {
        return $this->client->requestBoolean("executions/$executionId/continue",'POST');
    }
}
