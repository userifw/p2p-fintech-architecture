<?php

declare(strict_types=1);

namespace Showcase\FinTech;

final readonly class LedgerEntry
{
    public function __construct(
        public string $accountId,
        public string $asset,
        public string $entryType,
        public string $referenceType,
        public string $referenceId,
        public string $idempotencyKey,
        public string $balanceDelta,
        public string $reservedDelta,
        public string $balanceAfter,
    ) {}
}
