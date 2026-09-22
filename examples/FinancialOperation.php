<?php

declare(strict_types=1);

namespace Showcase\FinTech;

final readonly class FinancialOperation
{
    public function __construct(
        public string $publicId,
        public string $idempotencyKey,
        public string $asset,
        public string $amount,
        public string $status,
        public ?string $externalOperationId,
    ) {}
}
