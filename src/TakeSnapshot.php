<?php
/*
 * This file is part of prooph/snapshotter.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Date: 11/02/15 - 04:22 PM
 */

namespace Prooph\Snapshotter;

use Assert\Assertion;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

/**
 * Class TakeSnapshot
 * @package Prooph\Snapshotter
 */
final class TakeSnapshot extends Command implements SnapshotCommand
{
    use PayloadTrait;

    /**
     * @param string $aggregateType
     * @param string $aggregateId
     * @return TakeSnapshot
     */
    public static function withData($aggregateType, $aggregateId)
    {
        Assertion::string($aggregateType);
        Assertion::string($aggregateId);

        return new self([
            'aggregate_type' => $aggregateType,
            'aggregate_id' => $aggregateId,
        ]);
    }

    /**
     * @return string
     */
    public function aggregateType()
    {
        return $this->payload['aggregate_type'];
    }

    /**
     * @return string
     */
    public function aggregateId()
    {
        return $this->payload['aggregate_id'];
    }
}
