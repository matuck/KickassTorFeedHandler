<?php
namespace matuck\TorFeed\Handler;

use matuck\TorFeed\Items;

class KickassTorFeedHandler
{
    public function __construct($xml, &$items)
    {
        $items = array();
        foreach($xml->xpath('channel/item') as $node)
        {
            $namespaces = $node->getNameSpaces(true);
            $torrent = $node->children($namespaces['torrent']);
            /* @var $node \SimpleXMLElement */
            $items[] = new Items((string) $node->title[0], (string)$node->enclosure->attributes()->url[0], (string) $torrent->magnetURI);
        }
    }
}