# Ledger Design

## Available vs reserved funds

Financial operations distinguish spendable funds from funds reserved for an in-progress operation.

A withdrawal or deal should not be able to spend the same balance concurrently in two independent operations.

## Ledger entries

A ledger entry records the financial effect of an operation and references its source.

A sanitized conceptual record looks like:

```text
account
asset
entry_type
reference_type
reference_id
idempotency_key
balance_delta
reserved_delta
balance_after
created_at
```

The production implementation has separate accounting paths for relevant asset types; this public case study intentionally avoids publishing its full schema.

## Invariants

Examples of invariants enforced by the application layer include:

- balances cannot be reduced below the allowed amount
- a unique operation cannot create the same ledger effect twice
- reserved funds are not simultaneously treated as available
- confirmed deposits are credited once
- withdrawal state transitions preserve the relationship between local and external operations

## Reconciliation

Current state should be independently checkable.

Reconciliation commands derive expected balances from unique confirmed financial events and compare them with stored account state. Corrections are explicit rather than silently applied during reads.
