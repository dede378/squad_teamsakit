# Level 09 — SSRF

Difficulty: HARD

Goal: abuse a URL-fetch feature to reach the simulated internal service.

The backend is deliberately modeled after an SSRF sink, but it does not perform network requests. The only internal destination is the fictional host internal.squad.test.

Target:
host: internal.squad.test
path: /metadata

Flag: SQUAD{SSRF_INTERNAL_SERVICE_2026}

Defensive fix: use an allowlist, normalize and validate URLs, block private and link-local destinations, and perform outbound requests from a restricted network identity.