<?php

namespace Seed;

use Seed\Commons\CommonsClient;
use Seed\FolderA\FolderAClient;
use Seed\FolderB\FolderBClient;
use Seed\FolderC\FolderCClient;
use Seed\FolderD\FolderDClient;
use Seed\Foo\FooClient;
use GuzzleHttp\ClientInterface;
use Seed\Core\RawClient;
use GuzzleHttp\Client;

class SeedClient
{
    /**
     * @var CommonsClient $commons
     */
    public CommonsClient $commons;

    /**
     * @var FolderAClient $folderA
     */
    public FolderAClient $folderA;

    /**
     * @var FolderBClient $folderB
     */
    public FolderBClient $folderB;

    /**
     * @var FolderCClient $folderC
     */
    public FolderCClient $folderC;

    /**
     * @var FolderDClient $folderD
     */
    public FolderDClient $folderD;

    /**
     * @var FooClient $foo
     */
    public FooClient $foo;

    /**
     * @var ?array{baseUrl?: string, client?: ClientInterface} $options
     */
    private ?array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?array{baseUrl?: string, client?: ClientInterface} $options
     */
    public function __construct(
        ?array $options = null,
    ) {
        $defaultHeaders = ["X-Fern-Language" => "PHP","X-Fern-SDK-Name" => "Seed","X-Fern-SDK-Version" => "0.0.1"];
        $this->options = $options ?? [];
        $this->client = new RawClient(client: $this->options['client'] ?? new Client(), headers: $defaultHeaders);
        $this->commons = new CommonsClient($this->client);
        $this->folderA = new FolderAClient($this->client);
        $this->folderB = new FolderBClient($this->client);
        $this->folderC = new FolderCClient($this->client);
        $this->folderD = new FolderDClient($this->client);
        $this->foo = new FooClient($this->client);
    }
}
