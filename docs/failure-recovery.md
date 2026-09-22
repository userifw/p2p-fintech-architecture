# Failure Recovery

Financial workflows are designed around the assumption that partial failure is normal.

Examples:

- the application commits local state but the remote response is lost
- an external service accepts an operation but the caller times out
- a queue worker is restarted
- a blockchain event is delivered again
- the external service temporarily returns an error
- internal and external balances disagree

## Principles

1. Give each financial operation a durable local identity.
2. Use idempotency when calling external mutation endpoints.
3. Persist remote operation identifiers when they become known.
4. Never silently replace an existing remote identity with a different one.
5. Keep failure states visible.
6. Retry only operations known to be retry-safe.
7. Reconcile independently of the normal request path.

This turns many ambiguous failures into recoverable state instead of duplicate financial actions.
