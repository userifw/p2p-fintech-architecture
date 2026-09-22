# Service Security

Blockchain operations are isolated behind a separate service boundary.

For sensitive internal API calls, the production design supports:

- client identity
- HMAC-SHA256 request signatures
- bounded timestamp validity
- one-time nonces within the replay window
- idempotency keys for mutating requests
- HTTPS enforcement in production
- restricted source networks / allowlists
- bounded request sizes
- rate limiting
- request audit records without storing secrets

## Canonical signing

The exact production canonical format is intentionally not reproduced here. Conceptually, the signature binds:

```text
HTTP method
request path
timestamp
nonce
request body digest
idempotency identity (when applicable)
```

A captured signed request should therefore not be reusable indefinitely or against an unrelated operation.

Secrets are generated from cryptographically secure randomness and are not stored in this public repository.
