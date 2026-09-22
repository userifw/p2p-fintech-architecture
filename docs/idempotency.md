# Idempotency

Distributed financial workflows must assume that requests and events can be delivered more than once.

The platform uses idempotency identities at API and domain boundaries so a retry can resolve to an existing operation rather than repeating the financial effect.

## Typical flow

```text
request/event
    |
    v
validate identity
    |
    +--> already processed --> return existing result
    |
    v
lock relevant state
    |
    v
apply transition
    |
    v
write ledger / operation record
    |
    v
commit
```

Database constraints remain important: application-level checks alone are not sufficient protection against concurrent duplicate processing.

Idempotency keys are treated as identifiers, not authentication secrets.
